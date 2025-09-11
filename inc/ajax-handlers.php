<?php
/**
 * AJAX handlers for client dashboard posts actions
 */
if (!defined('ABSPATH')) exit;

// Register AJAX actions for logged-in and non-logged-in (fallback) clients
if (function_exists('add_action')) {
    add_action('wp_ajax_bulk_posts', 'cd_ajax_bulk_posts');
    add_action('wp_ajax_quick_post', 'cd_ajax_quick_post');
    // Optional: allow nopriv for setups that don't strictly use WP auth for testing
    add_action('wp_ajax_nopriv_bulk_posts', 'cd_ajax_bulk_posts');
    add_action('wp_ajax_nopriv_quick_post', 'cd_ajax_quick_post');
}

function cd_current_user_id_fallback() {
    // Prefer WP user if available, otherwise fall back to session-based id used in template
    if (function_exists('get_current_user_id')) {
        $id = get_current_user_id();
        if ($id) return $id;
    }
    if (session_status() == PHP_SESSION_NONE) session_start();
    return isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;
}

function cd_check_permission_or_die() {
    // Require either a logged-in user with role 'klient'/'administrator' or a session user
    if (function_exists('is_user_logged_in') && is_user_logged_in()) {
        if (function_exists('current_user_can') && (current_user_can('klient') || current_user_can('administrator'))) {
            return true;
        }
    }
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['user_id'])) {
        wp_send_json_error('Brak dostępu', 403);
    }
    return true;
}

function cd_ajax_bulk_posts() {
    global $wpdb;
    $prefix = $wpdb->prefix;

    cd_check_permission_or_die();

    // Prefer WP nonce verification
    if (isset($_POST['security']) && function_exists('check_ajax_referer')) {
        // check_ajax_referer will die on failure by default; we pass false to return instead
        if (!check_ajax_referer('cd_posts_nonce', 'security', false)) {
            wp_send_json_error('Nieprawidłowy nonce bezpieczeństwa', 403);
        }
    } else {
        // Legacy token fallback
        if (!isset($_POST['token']) || $_POST['token'] !== 'bulk_posts_token_123') {
            wp_send_json_error('Nieprawidłowy token bezpieczeństwa');
        }
    }

    $user_id = cd_current_user_id_fallback();
    $action = isset($_POST['bulk_action']) ? trim($_POST['bulk_action']) : '';
    $post_ids = isset($_POST['post_ids']) ? json_decode(stripslashes($_POST['post_ids']), true) : [];

    if (empty($post_ids) || !is_array($post_ids)) {
        wp_send_json_error('Brak zaznaczonych wpisów');
    }

    $updated = 0;
    $posts_table = $prefix . 'posts';

    foreach ($post_ids as $post_id) {
        $post_id = intval($post_id);
        $post_author = $wpdb->get_var($wpdb->prepare("SELECT post_author FROM $posts_table WHERE ID = %d", $post_id));
        if (!$post_author || $post_author != $user_id) continue;

        switch ($action) {
            case 'delete':
                if ($wpdb->delete($posts_table, ['ID' => $post_id], ['%d'])) $updated++;
                break;
            case 'draft':
                if ($wpdb->update($posts_table, ['post_status' => 'draft'], ['ID' => $post_id], ['%s'], ['%d'])) $updated++;
                break;
            case 'publish':
                if ($wpdb->update($posts_table, ['post_status' => 'publish'], ['ID' => $post_id], ['%s'], ['%d'])) $updated++;
                break;
        }
    }

    if ($updated > 0) {
        wp_send_json_success("Zaktualizowano $updated wpisów");
    }

    wp_send_json_error('Nie udało się zaktualizować żadnego wpisu');
}

function cd_ajax_quick_post() {
    global $wpdb;
    $prefix = $wpdb->prefix;

    cd_check_permission_or_die();

    if (isset($_POST['security']) && function_exists('check_ajax_referer')) {
        if (!check_ajax_referer('cd_posts_nonce', 'security', false)) {
            wp_send_json_error('Nieprawidłowy nonce bezpieczeństwa', 403);
        }
    } else {
        if (!isset($_POST['token']) || $_POST['token'] !== 'quick_post_token_123') {
            wp_send_json_error('Nieprawidłowy token bezpieczeństwa');
        }
    }

    $user_id = cd_current_user_id_fallback();
    $action = isset($_POST['quick_action']) ? trim($_POST['quick_action']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    if (!$post_id) wp_send_json_error('Nieprawidłowy ID wpisu');

    $posts_table = $prefix . 'posts';

    $post = $wpdb->get_row($wpdb->prepare("SELECT * FROM $posts_table WHERE ID = %d", $post_id));
    if (!$post || $post->post_author != $user_id) wp_send_json_error('Brak dostępu do tego wpisu');

    switch ($action) {
        case 'delete':
            if ($wpdb->delete($posts_table, ['ID' => $post_id], ['%d'])) {
                wp_send_json_success('Wpis został usunięty');
            } else {
                wp_send_json_error('Nie udało się usunąć wpisu');
            }
            break;
        case 'duplicate':
            $new_post_data = [
                'post_title' => $post->post_title . ' (kopia)',
                'post_content' => $post->post_content,
                'post_excerpt' => $post->post_excerpt,
                'post_status' => 'draft',
                'post_type' => $post->post_type,
                'post_author' => $post->post_author,
                'post_date' => current_time('mysql'),
                'post_date_gmt' => current_time('mysql', 1),
                'post_modified' => current_time('mysql'),
                'post_modified_gmt' => current_time('mysql', 1)
            ];

            if ($wpdb->insert($posts_table, $new_post_data)) {
                $new_post_id = $wpdb->insert_id;
                $term_relationships_table = $prefix . 'term_relationships';
                $categories = $wpdb->get_results($wpdb->prepare("SELECT term_taxonomy_id FROM $term_relationships_table WHERE object_id = %d", $post_id));
                foreach ($categories as $category) {
                    $wpdb->insert($term_relationships_table, [
                        'object_id' => $new_post_id,
                        'term_taxonomy_id' => $category->term_taxonomy_id
                    ]);
                }
                wp_send_json_success('Wpis został zduplikowany');
            }
            wp_send_json_error('Nie udało się zduplikować wpisu');
            break;
        default:
            wp_send_json_error('Nieprawidłowa akcja');
            break;
    }
}

// Dynamic module loader for the modular dashboard
add_action('wp_ajax_np_load_module', function(){
    if (!defined('ABSPATH')) exit;
    // simple permission check: require edit_posts for posts-related modules, otherwise allow logged-in
    if (isset($_POST['module']) && is_string($_POST['module'])) {
        $module = preg_replace('/[^a-z0-9\-_]/i','', $_POST['module']);
    } else {
        wp_send_json_error('Brak modułu', 400);
    }

    // Allowed modules mapping to template files under templates/modules/content
    $allowed = [
        'posts' => 'templates/posts/list.php',
        'add-post' => 'templates/modules/content/add-post.php',
        'edit-post' => 'templates/modules/content/edit-post.php',
        'pages-list' => 'templates/modules/content/pages-list.php'
    ];

    if (!array_key_exists($module, $allowed)) {
        wp_send_json_error('Nieznany moduł', 404);
    }

    // permission for posts
    if (strpos($module, 'post') !== false || $module === 'posts') {
        if (function_exists('current_user_can') && !current_user_can('edit_posts')) {
            wp_send_json_error('Brak uprawnień', 403);
        }
    }

    $path = ABSPATH ? ABSPATH : __DIR__ . '/..';
    $file = trailingslashit(dirname(__FILE__) . '/..') . $allowed[$module];

    ob_start();
    if (function_exists('np_render_template')) {
        // use helper to render safely
        echo np_render_template($allowed[$module]);
    } else if (file_exists($file)) {
        include $file;
    } else {
        ob_end_clean();
        wp_send_json_error('Plik modułu nie znaleziony', 500);
    }
    $html = ob_get_clean();
    wp_send_json_success(['html' => $html]);
});
