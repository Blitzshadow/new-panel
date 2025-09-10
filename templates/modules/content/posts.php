<?php
/**
 * Podmoduł Posts - Zarządzanie wpisami dla klientów
 * Wyświetla listę wpisów z pełną funkcjonalnością zarządzania
 */

if (!defined('ABSPATH')) exit;

// DEBUG: Check if file is being loaded
echo '<div style="background:#ff6b6b;color:#fff;padding:10px;margin:10px;border-radius:5px;font-weight:bold;">';
echo 'DEBUG: posts.php file loaded successfully!';
echo '</div>';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Funkcja renderująca sekcję posts z pełną funkcjonalnością
 */
function render_posts_section() {
    // BASIC DEBUG: Check if function is being called at all
    echo '<div style="background:#ff6b6b;color:#fff;padding:10px;margin:10px;border-radius:5px;font-weight:bold;">';
    echo 'DEBUG: render_posts_section() function called successfully!';
    echo '</div>';

    // Check database connection
    global $wpdb;
    if (!$wpdb) {
        echo '<div style="background:#ff4757;color:#fff;padding:10px;margin:10px;border-radius:5px;">';
        echo 'ERROR: No database connection ($wpdb is null)';
        echo '</div>';
        return;
    }

    // Check table prefix
    $prefix = $wpdb->prefix;
    echo '<div style="background:#3742fa;color:#fff;padding:10px;margin:10px;border-radius:5px;">';
    echo 'DEBUG: Table prefix detected: ' . htmlspecialchars($prefix);
    echo '</div>';

    // Check if posts table exists
    $posts_table = $prefix . 'posts';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$posts_table'");
    echo '<div style="background:#2f3542;color:#fff;padding:10px;margin:10px;border-radius:5px;">';
    echo 'DEBUG: Posts table ' . htmlspecialchars($posts_table) . ' exists: ' . ($table_exists ? 'YES' : 'NO');
    echo '</div>';

    // Try a simple query to test database access
    try {
        $test_posts = $wpdb->get_results("SELECT ID, post_title FROM $posts_table WHERE post_type = 'post' LIMIT 3");
        echo '<div style="background:#ffa502;color:#000;padding:10px;margin:10px;border-radius:5px;">';
        echo 'DEBUG: Simple query test - Found ' . count($test_posts) . ' posts:';
        if (!empty($test_posts)) {
            echo '<ul>';
            foreach ($test_posts as $post) {
                echo '<li>ID: ' . intval($post->ID) . ' - Title: ' . htmlspecialchars($post->post_title) . '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';
    } catch (Exception $e) {
        echo '<div style="background:#ff3838;color:#fff;padding:10px;margin:10px;border-radius:5px;">';
        echo 'ERROR: Database query failed: ' . htmlspecialchars($e->getMessage());
        echo '</div>';
    }

    // Continue with normal function logic...

    // Pobierz parametry z URL lub ustaw domyślne
    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $posts_per_page = 10;
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $status_filter = isset($_GET['status']) ? trim($_GET['status']) : '';
    $category_filter = isset($_GET['category']) ? intval($_GET['category']) : '';
    $orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : 'date';
    $order = isset($_GET['order']) ? trim($_GET['order']) : 'DESC';

    // Pobierz ID użytkownika z WP lub fallback do sesji
    if (function_exists('get_current_user_id')) {
        $user_id = get_current_user_id();
    } else {
        $user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 1;
    }

    // Przygotuj argumenty dla bezpośredniego zapytania SQL
    $args = array(
        'post_type' => 'post',
        'post_status' => array('publish', 'draft', 'pending', 'future'),
        'posts_per_page' => $posts_per_page,
        'paged' => $current_page,
        'orderby' => $orderby,
        'order' => $order,
        'author' => $user_id // Tylko wpisy bieżącego użytkownika
    );

    // Dodaj wyszukiwanie
    if (!empty($search)) {
        $args['s'] = $search;
    }

    // Dodaj filtr statusu
    if (!empty($status_filter)) {
        $args['post_status'] = $status_filter;
    }

    // Dodaj filtr kategorii
    if (!empty($category_filter)) {
        $args['cat'] = $category_filter;
    }

    global $wpdb;

    // DEBUG: Sprawdź połączenie z bazą danych
    if (!$wpdb) {
        error_log("DEBUG: Brak połączenia z bazą danych");
        echo "<div class='bg-red-900 text-red-100 p-4 rounded'>Błąd: Brak połączenia z bazą danych</div>";
        return;
    }

    $prefix = $wpdb->prefix;

    /**
     * Helper: bezpieczne przygotowanie zapytań z dynamiczną liczbą parametrów.
     * Jeśli nie ma parametrów, zwraca surowe zapytanie (bez prepare).
     */
    function wpap_prepare_query($query, $params = array()) {
        global $wpdb;
        if (empty($params)) {
            return $query;
        }
        return call_user_func_array(array($wpdb, 'prepare'), array_merge(array($query), $params));
    }

    // DEBUG: Sprawdź prefix tabeli
    error_log("DEBUG: WordPress table prefix: " . $prefix);
    $expected_prefix = 'wp_724689f_';
    error_log("DEBUG: Expected prefix: " . $expected_prefix);
    error_log("DEBUG: Prefix matches expected: " . ($prefix === $expected_prefix ? 'YES' : 'NO'));

    // DEBUG: Testuj połączenie z bazą danych
    try {
        $test_query = $wpdb->get_var("SELECT 1");
        if ($test_query !== "1") {
            error_log("DEBUG: Database connection test failed");
            echo "<div class='bg-red-900 text-red-100 p-4 rounded'>Błąd: Problem z połączeniem do bazy danych</div>";
            return;
        }
    } catch (Exception $e) {
        error_log("DEBUG: Database error: " . $e->getMessage());
        echo "<div class='bg-red-900 text-red-100 p-4 rounded'>Błąd bazy danych: " . $e->getMessage() . "</div>";
        return;
    }
    $posts_table = $prefix . 'posts';
    $postmeta_table = $prefix . 'postmeta';
    $term_relationships = $prefix . 'term_relationships';
    $term_taxonomy = $prefix . 'term_taxonomy';
    $terms = $prefix . 'terms';

    // ensure $user_id is integer
    $user_id = intval($user_id);

    // DEBUG: Testuj proste zapytanie bez filtrów
    $simple_posts = $wpdb->get_results("SELECT ID, post_title, post_author FROM $posts_table WHERE post_type = 'post' LIMIT 5");
    error_log("DEBUG: Simple query results count: " . count($simple_posts));
    if (!empty($simple_posts)) {
        error_log("DEBUG: First post: " . print_r($simple_posts[0], true));
    }

    // DEBUG: Sprawdź wpisy konkretnego użytkownika
    $user_posts_count = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $posts_table WHERE post_author = %d AND post_type = 'post'",
        $user_id
    ));
    error_log("DEBUG: Posts for user $user_id: " . $user_posts_count);

    // Buduj zapytanie SQL - temporarily show ALL posts for debugging
    $where_conditions = array();
    // $where_conditions[] = "p.post_author = %d"; // Temporarily disable author filter
    $where_conditions[] = "p.post_type = 'post'";
    $where_conditions[] = "p.post_status IN ('publish', 'draft', 'pending', 'future')";

    $params = array(); // Remove user_id param temporarily

    // Dodaj wyszukiwanie
    if (!empty($search)) {
        $where_conditions[] = "(p.post_title LIKE %s OR p.post_content LIKE %s OR p.post_excerpt LIKE %s)";
        $search_param = '%' . $wpdb->esc_like($search) . '%';
        $params = array_merge($params, array($search_param, $search_param, $search_param));
    }

    // Dodaj filtr statusu
    if (!empty($status_filter)) {
        $where_conditions[] = "p.post_status = %s";
        $params[] = $status_filter;
    }

    // Dodaj filtr kategorii
    if (!empty($category_filter)) {
        $where_conditions[] = "EXISTS (
            SELECT 1 FROM $term_relationships tr
            INNER JOIN $term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
            WHERE tr.object_id = p.ID AND tt.term_id = %d AND tt.taxonomy = 'category'
        )";
        $params[] = $category_filter;
    }

    $where_clause = implode(' AND ', $where_conditions);

    // Pobierz całkowitą liczbę wpisów
        if (empty($params)) {
            $total_query = "SELECT COUNT(*) FROM $posts_table p WHERE $where_clause";
        } else {
            $total_query = wpap_prepare_query("SELECT COUNT(*) FROM $posts_table p WHERE $where_clause", $params);
        }
        $total_posts = $wpdb->get_var($total_query);

    // Pobierz wpisy z paginacją
    $offset = ($current_page - 1) * $posts_per_page;

    // Dodaj sortowanie
    $order_by = 'p.post_date DESC'; // domyślne
    if ($orderby === 'title') {
        $order_by = 'p.post_title ' . $order;
    } elseif ($orderby === 'date') {
        $order_by = 'p.post_date ' . $order;
    } elseif ($orderby === 'modified') {
        $order_by = 'p.post_modified ' . $order;
    }

    $limit_offset_params = array_merge($params, array($posts_per_page, $offset));
    $query_template = "SELECT p.ID, p.post_title, p.post_date, p.post_modified, p.post_status, p.post_author, p.comment_count
        FROM $posts_table p
        WHERE $where_clause
        ORDER BY $order_by
        LIMIT %d OFFSET %d";
    $posts_query_sql = wpap_prepare_query($query_template, $limit_offset_params);

    // DEBUG: Sprawdź połączenie z bazą danych
    if (!$wpdb) {
        error_log("DEBUG: Brak połączenia z bazą danych");
        $posts = array();
        $total_posts = 0;
    } else {
        // Sprawdź czy tabela posts istnieje
        $posts_table_exists = $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $posts_table));
        error_log("DEBUG: Posts table exists: " . ($posts_table_exists ? 'YES' : 'NO'));

        if (!$posts_table_exists) {
            error_log("DEBUG: Table $posts_table does not exist!");
            $posts = array();
            $total_posts = 0;
        } else {
            $posts = $wpdb->get_results($posts_query_sql);
        }
    }

    // DEBUG: Sprawdź czy zapytanie działa
    error_log("DEBUG: Total posts found: " . $total_posts);
    error_log("DEBUG: Posts array count: " . count($posts));
    error_log("DEBUG: User ID: " . $user_id);
    error_log("DEBUG: Table prefix: " . $prefix);
    error_log("DEBUG: SQL Query: " . $posts_query_sql);

    // Symuluj obiekt WP_Query dla kompatybilności z resztą kodu
    $posts_query = new stdClass();
    $posts_query->posts = $posts;
    $posts_query->found_posts = $total_posts;
    $posts_query->max_num_pages = ceil($total_posts / $posts_per_page);

    // Pobierz statystyki
    $stats = get_posts_stats();

    // Pobierz kategorie bezpośrednio z bazy danych
    global $wpdb;
    $prefix = $wpdb->prefix;
    $terms_table = $prefix . 'terms';
    $term_taxonomy_table = $prefix . 'term_taxonomy';

    $categories = $wpdb->get_results(
        "SELECT t.term_id, t.name, t.slug, tt.count
         FROM $terms_table t
         INNER JOIN $term_taxonomy_table tt ON t.term_id = tt.term_id
         WHERE tt.taxonomy = 'category'
         ORDER BY t.name ASC"
    );
    // Prepare a WP nonce for secure AJAX requests
    $ajax_nonce = function_exists('wp_create_nonce') ? wp_create_nonce('cd_posts_nonce') : '';
    $ajax_url = function_exists('admin_url') ? admin_url('admin-ajax.php') : '/wp-admin/admin-ajax.php';
    ?>
    <section id="posts" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Wpisy</div>
            <div id="posts-content">

                <!-- Statystyki wpisów -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Wszystkie wpisy</p>
                                <p class="text-2xl font-bold text-gray-100"><?php echo $stats['total']; ?></p>
                            </div>
                            <div class="p-3 bg-gradient-primary rounded-modern">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Opublikowane</p>
                                <p class="text-2xl font-bold text-green-400"><?php echo $stats['publish']; ?></p>
                            </div>
                            <div class="p-3 bg-gradient-success rounded-modern">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Wersje robocze</p>
                                <p class="text-2xl font-bold text-yellow-400"><?php echo $stats['draft']; ?></p>
                            </div>
                            <div class="p-3 bg-gradient-warning rounded-modern">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Oczekujące</p>
                                <p class="text-2xl font-bold text-blue-400"><?php echo $stats['pending']; ?></p>
                            </div>
                            <div class="p-3 bg-gradient-secondary rounded-modern">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Przyciski akcji i filtry -->
                <div class="mb-6 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                    <div class="flex gap-3">
                        <a href="post-new.php" class="btn bg-gradient-primary hover:shadow-glow">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Dodaj nowy wpis
                        </a>

                        <button id="bulk-actions-btn" class="btn bg-gray-700 hover:bg-gray-600" disabled>
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                            Akcje masowe
                        </button>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 w-full lg:w-auto">
                        <div class="relative flex-1 lg:flex-initial">
                            <input type="text"
                                   id="posts-search"
                                   placeholder="Szukaj wpisów..."
                                   value="<?php echo htmlspecialchars($search); ?>"
                                   class="w-full lg:w-64 px-4 py-2 pl-10 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        <select id="status-filter" class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Wszystkie statusy</option>
                            <option value="publish" <?php echo $status_filter === 'publish' ? 'selected' : ''; ?>>Opublikowane</option>
                            <option value="draft" <?php echo $status_filter === 'draft' ? 'selected' : ''; ?>>Wersje robocze</option>
                            <option value="pending" <?php echo $status_filter === 'pending' ? 'selected' : ''; ?>>Oczekujące</option>
                            <option value="future" <?php echo $status_filter === 'future' ? 'selected' : ''; ?>>Zaplanowane</option>
                        </select>

                        <select id="category-filter" class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Wszystkie kategorie</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category->term_id); ?>" <?php echo $category_filter == $category->term_id ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Tabela wpisów (desktop) -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <input type="checkbox" id="select-all-posts" class="rounded border-gray-600 text-blue-600 focus:ring-blue-500">
                                </th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="title">
                                    Tytuł
                                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                    </svg>
                                </th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="author">Autor</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="categories">Kategorie</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="comments">Komentarze</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="date">Data</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="status">Status</th>
                                <th scope="col" class="px-6 py-3">Akcje</th>
                            </tr>
                        </thead>
                        <tbody id="posts-table-body">
                            <!-- DEBUG: Wyświetl informacje debugowania -->
                            <tr>
                                <td colspan="8" class="px-6 py-4 bg-yellow-900 text-yellow-100">
                                    <strong>DEBUG INFO (showing ALL posts - author filter disabled for testing):</strong><br>
                                    Total posts: <?php echo $total_posts; ?><br>
                                    Posts in array: <?php echo count($posts_query->posts); ?><br>
                                    User ID: <?php echo $user_id; ?><br>
                                    Table prefix: <?php echo $prefix; ?><br>
                                    Expected prefix: wp_724689f_<br>
                                    Prefix correct: <?php echo ($prefix === 'wp_724689f_') ? 'YES' : 'NO'; ?><br>
                                    Current page: <?php echo $current_page; ?><br>
                                    Posts per page: <?php echo $posts_per_page; ?><br>
                                    <?php
                                    $all_posts_count = $wpdb->get_var("SELECT COUNT(*) FROM $posts_table WHERE post_type = 'post'");
                                    $user_posts_count = $wpdb->get_var($wpdb->prepare(
                                        "SELECT COUNT(*) FROM $posts_table WHERE post_author = %d AND post_type = 'post'",
                                        $user_id
                                    ));
                                    $simple_posts = $wpdb->get_results("SELECT ID, post_title, post_author FROM $posts_table WHERE post_type = 'post' LIMIT 5");
                                    ?>
                                    All posts in DB: <?php echo $all_posts_count; ?><br>
                                    User posts in DB: <?php echo $user_posts_count; ?><br>
                                    Simple query results: <?php echo count($simple_posts); ?><br>
                                    <?php
                                    // Temporary fallback debug: fetch a few posts without filters to verify DB/table/prefix
                                    $fallback_posts = array();
                                    try {
                                        $fallback_posts = $wpdb->get_results("SELECT ID, post_title, post_status, post_author FROM $posts_table WHERE post_type = 'post' LIMIT 10");
                                    } catch (Exception $e) {
                                        error_log('DEBUG: Fallback query failed: ' . $e->getMessage());
                                    }
                                    ?>
                                    Fallback posts (no filters): <?php echo count($fallback_posts); ?><br>
                                    <?php if (!empty($fallback_posts)): ?>
                                        <ul class="text-sm list-disc pl-6">
                                            <?php foreach ($fallback_posts as $fp): ?>
                                                <li><?php echo htmlspecialchars($fp->post_title ?: '(brak tytułu)') ; ?> (ID: <?php echo intval($fp->ID); ?>, status: <?php echo htmlspecialchars($fp->post_status); ?>)</li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (!empty($simple_posts)): ?>
                                        First post: <?php echo htmlspecialchars($simple_posts[0]->post_title); ?> (ID: <?php echo $simple_posts[0]->ID; ?>)<br>
                                    <?php endif; ?>
                                    <!-- Show the final posts query used (prepared SQL) -->
                                    <?php if (isset($posts_query_sql)): ?>
                                        <strong>Executed SQL:</strong> <?php echo htmlspecialchars($posts_query_sql); ?><br>
                                    <?php endif; ?>
                                    Session user_id: <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'NOT SET'; ?><br>
                                    <?php
                                    // Show ALL posts in database for diagnosis
                                    $all_posts_debug = $wpdb->get_results("SELECT ID, post_title, post_author, post_status FROM $posts_table WHERE post_type = 'post' LIMIT 5");
                                    if (!empty($all_posts_debug)) {
                                        echo '<strong>All posts in DB (first 5):</strong><br>';
                                        foreach ($all_posts_debug as $ap) {
                                            echo '- ID: ' . intval($ap->ID) . ', Title: ' . htmlspecialchars($ap->post_title) . ', Author: ' . intval($ap->post_author) . ', Status: ' . htmlspecialchars($ap->post_status) . '<br>';
                                        }
                                    } else {
                                        echo '<strong>No posts found in database!</strong><br>';
                                    }
                                    ?>
                                </td>
                            </tr>

                            <?php
                                // If the main prepared query returned no posts, but our fallback (no-filters) query found rows,
                                // use the fallback rows to display something for debugging.
                                $using_fallback = false;
                                if (empty($posts_query->posts) && !empty($fallback_posts)) {
                                    $posts_query->posts = $fallback_posts;
                                    $posts_query->found_posts = count($fallback_posts);
                                    $posts_query->max_num_pages = 1;
                                    $using_fallback = true;
                                }

                                // Developer toggle: force debug display and show DB errors. Use ?force_posts_debug=1 in URL.
                                if (isset($_GET['force_posts_debug']) && $_GET['force_posts_debug'] === '1') {
                                    $dbg_count = count($posts_query->posts);
                                    $dbg_total = intval($total_posts);
                                    $dbg_sql = isset($posts_query_sql) ? $posts_query_sql : '(none)';
                                    $dbg_err = isset($wpdb) ? $wpdb->last_error : '(no wpdb)';
                                    echo '<tr><td colspan="8" class="px-6 py-4 bg-red-900 text-white">'
                                        . '<strong>FORCE DEBUG ON:</strong> posts_count=' . intval($dbg_count)
                                        . '; total_posts=' . intval($dbg_total)
                                        . '; wpdb_last_error=' . htmlspecialchars($dbg_err)
                                        . '<br><strong>Executed SQL:</strong> ' . htmlspecialchars($dbg_sql)
                                        . '</td></tr>';

                                    // If we have fallback rows, force-assign them so something is visible
                                    if (!empty($fallback_posts)) {
                                        $posts_query->posts = $fallback_posts;
                                        $posts_query->found_posts = count($fallback_posts);
                                        $posts_query->max_num_pages = 1;
                                        $using_fallback = true;
                                    }
                                }
                            ?>
                            <?php if (!empty($posts_query->posts)): ?>
                                <?php if ($using_fallback): ?>
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 bg-yellow-800 text-yellow-100">
                                            Pokazywane są wpisy z fallbacku (bez filtrów) — główne zapytanie nie zwróciło wyników.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach ($posts_query->posts as $post): ?>
                                    <?php
                                    $post_id = $post->ID;
                                    $post_status = $post->post_status;
                                    $post_title = $post->post_title;
                                    $post_date = $post->post_date;
                                    $comment_count = $post->comment_count;

                                    // Pobierz kategorie dla tego wpisu
                                        $post_categories = $wpdb->get_results($wpdb->prepare(
                                            "SELECT t.name
                                             FROM {$prefix}term_relationships tr
                                             INNER JOIN {$prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                                             INNER JOIN {$prefix}terms t ON tt.term_id = t.term_id
                                             WHERE tr.object_id = %d",
                                            $post_id
                                        ));

                                    $status_badge = get_status_badge($post_status);
                                    ?>
                                    <tr class="bg-gray-900 border-b border-gray-700 hover:bg-gray-800">
                                        <td class="px-4 py-4">
                                            <input type="checkbox" name="post_ids[]" value="<?php echo htmlspecialchars($post_id); ?>" class="post-checkbox rounded border-gray-600 text-blue-600 focus:ring-blue-500">
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-100 max-w-xs truncate" title="<?php echo htmlspecialchars($post_title); ?>">
                                                <?php echo htmlspecialchars($post_title); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4"><?php
                                            global $wpdb;
                                            $author_name = $wpdb->get_var($wpdb->prepare(
                                                "SELECT display_name FROM {$wpdb->prefix}users WHERE ID = %d",
                                                $post->post_author
                                            ));
                                            echo htmlspecialchars($author_name ?: 'Nieznany');
                                        ?></td>
                                        <td class="px-6 py-4">
                                            <?php if (!empty($post_categories)): ?>
                                                <div class="flex flex-wrap gap-1">
                                                    <?php foreach (array_slice($post_categories, 0, 2) as $category): ?>
                                                        <span class="badge badge-info text-xs"><?php echo htmlspecialchars($category->name); ?></span>
                                                    <?php endforeach; ?>
                                                    <?php if (count($post_categories) > 2): ?>
                                                        <span class="text-xs text-gray-400">+<?php echo count($post_categories) - 2; ?> więcej</span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-gray-500">Brak kategorii</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-gray-100"><?php echo htmlspecialchars($comment_count); ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-400">
                                            <?php echo htmlspecialchars(date('Y-m-d', strtotime($post_date))); ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $status_badge; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex gap-2">
                                                <a href="<?php echo htmlspecialchars('post.php?post=' . $post_id . '&action=edit'); ?>" class="text-blue-400 hover:text-blue-300" title="Edytuj">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>
                                                <a href="<?php echo htmlspecialchars('?p=' . $post_id); ?>" target="_blank" class="text-green-400 hover:text-green-300" title="Podgląd">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </a>
                                                <button class="text-purple-400 hover:text-purple-300 duplicate-post" data-post-id="<?php echo htmlspecialchars($post_id); ?>" title="Duplikuj">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                    </svg>
                                                </button>
                                                <button class="text-red-400 hover:text-red-300 delete-post" data-post-id="<?php echo htmlspecialchars($post_id); ?>" title="Usuń">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p>Brak wpisów do wyświetlenia</p>
                                        <p class="text-sm">Rozpocznij od dodania pierwszego wpisu</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Widok mobilny (kafelki) -->
                <div class="lg:hidden space-y-4" id="posts-mobile-view">
                    <?php if (!empty($posts_query->posts)): ?>
                        <?php foreach ($posts_query->posts as $post): ?>
                            <?php
                            $post_id = $post->ID;
                            $post_status = $post->post_status;
                            $post_title = $post->post_title;
                            $post_date = $post->post_date;
                            $comment_count = $post->comment_count;

                            // Pobierz kategorie dla tego wpisu
                            $post_categories = $wpdb->get_results($wpdb->prepare(
                                "SELECT t.name FROM {$prefix}terms t
                                 INNER JOIN {$prefix}term_relationships tr ON t.term_id = tr.term_taxonomy_id
                                 WHERE tr.object_id = %d",
                                $post_id
                            ));

                            // Pobierz autora
                            $author_name = $wpdb->get_var($wpdb->prepare(
                                "SELECT display_name FROM {$prefix}users WHERE ID = %d",
                                $post->post_author
                            ));

                            $status_badge = get_status_badge($post_status);
                            ?>
                            <div class="bg-gray-800 rounded-modern p-4 border border-gray-700">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-medium text-gray-100 truncate" title="<?php echo htmlspecialchars($post_title); ?>">
                                            <?php echo htmlspecialchars($post_title); ?>
                                        </h3>
                                        <p class="text-sm text-gray-400 mt-1">
                                            <?php echo htmlspecialchars($author_name); ?> • <?php echo htmlspecialchars(date('Y-m-d', strtotime($post_date))); ?>
                                        </p>
                                    </div>
                                    <input type="checkbox" name="post_ids[]" value="<?php echo htmlspecialchars($post_id); ?>" class="post-checkbox rounded border-gray-600 text-blue-600 focus:ring-blue-500">
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <?php echo $status_badge; ?>
                                        <span class="text-sm text-gray-400">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                            </svg>
                                            <?php echo htmlspecialchars($comment_count); ?>
                                        </span>
                                    </div>
                                </div>

                                <?php if (!empty($post_categories)): ?>
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        <?php foreach (array_slice($post_categories, 0, 3) as $category): ?>
                                            <span class="badge badge-info text-xs"><?php echo htmlspecialchars($category->name); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="flex gap-2">
                                    <a href="<?php echo htmlspecialchars('post.php?post=' . $post_id . '&action=edit'); ?>" class="btn btn-sm bg-blue-600 hover:bg-blue-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <a href="<?php echo htmlspecialchars('?p=' . $post_id); ?>" target="_blank" class="btn btn-sm bg-green-600 hover:bg-green-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm bg-purple-600 hover:bg-purple-700 duplicate-post" data-post-id="<?php echo htmlspecialchars($post_id); ?>">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-sm bg-red-600 hover:bg-red-700 delete-post" data-post-id="<?php echo htmlspecialchars($post_id); ?>">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-12 text-gray-400">
                            <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p>Brak wpisów do wyświetlenia</p>
                            <p class="text-sm">Rozpocznij od dodania pierwszego wpisu</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Paginacja -->
                <?php if ($posts_query->max_num_pages > 1): ?>
                    <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-400">
                            Wyświetlanie <?php echo ($current_page - 1) * $posts_per_page + 1; ?>-
                            <?php echo min($current_page * $posts_per_page, $posts_query->found_posts); ?> z
                            <?php echo $posts_query->found_posts; ?> wpisów
                        </div>

                        <div class="flex gap-2">
                            <?php if ($current_page > 1): ?>
                                <a href="?paged=<?php echo $current_page - 1; ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                    Poprzednia
                                </a>
                            <?php else: ?>
                                <span class="btn bg-gray-800 text-gray-500 cursor-not-allowed">Poprzednia</span>
                            <?php endif; ?>

                            <?php
                            $start_page = max(1, $current_page - 2);
                            $end_page = min($posts_query->max_num_pages, $current_page + 2);

                            if ($start_page > 1): ?>
                                <a href="?paged=1" class="btn bg-gray-700 hover:bg-gray-600">1</a>
                                <?php if ($start_page > 2): ?>
                                    <span class="px-2 py-2 text-gray-400">...</span>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                <?php if ($i == $current_page): ?>
                                    <span class="btn bg-gradient-primary text-white"><?php echo $i; ?></span>
                                <?php else: ?>
                                    <a href="?paged=<?php echo $i; ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                        <?php echo $i; ?>
                                    </a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($end_page < $posts_query->max_num_pages): ?>
                                <?php if ($end_page < $posts_query->max_num_pages - 1): ?>
                                    <span class="px-2 py-2 text-gray-400">...</span>
                                <?php endif; ?>
                                <a href="?paged=<?php echo $posts_query->max_num_pages; ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                    <?php echo $posts_query->max_num_pages; ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($current_page < $posts_query->max_num_pages): ?>
                                <a href="?paged=<?php echo $current_page + 1; ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                    Następna
                                </a>
                            <?php else: ?>
                                <span class="btn bg-gray-800 text-gray-500 cursor-not-allowed">Następna</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- Modal dla akcji masowych -->
    <div id="bulk-actions-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50" style="display: none;">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-gray-800 rounded-modern p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Akcje masowe</h3>
                <div class="space-y-3">
                    <button class="w-full btn bg-red-600 hover:bg-red-700" id="bulk-delete">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Usuń zaznaczone
                    </button>
                    <button class="w-full btn bg-yellow-600 hover:bg-yellow-700" id="bulk-draft">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Przenieś do wersji roboczych
                    </button>
                    <button class="w-full btn bg-green-600 hover:bg-green-700" id="bulk-publish">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Opublikuj zaznaczone
                    </button>
                </div>
                <div class="mt-6 flex gap-3">
                    <button class="flex-1 btn bg-gray-700 hover:bg-gray-600" id="cancel-bulk">Anuluj</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('posts-search');
        const statusFilter = document.getElementById('status-filter');
        const categoryFilter = document.getElementById('category-filter');
        const selectAllCheckbox = document.getElementById('select-all-posts');
        const postCheckboxes = document.querySelectorAll('.post-checkbox');
        const bulkActionsBtn = document.getElementById('bulk-actions-btn');
        const bulkModal = document.getElementById('bulk-actions-modal');
        const cancelBulkBtn = document.getElementById('cancel-bulk');

        let searchTimeout;

        // Funkcja do aktualizacji URL z parametrami
        function updateFilters() {
            const params = new URLSearchParams(window.location.search);

            const search = searchInput.value.trim();
            const status = statusFilter.value;
            const category = categoryFilter.value;

            if (search) {
                params.set('search', search);
            } else {
                params.delete('search');
            }

            if (status) {
                params.set('status', status);
            } else {
                params.delete('status');
            }

            if (category) {
                params.set('category', category);
            } else {
                params.delete('category');
            }

            // Resetuj stronę przy zmianie filtrów
            params.delete('paged');

            window.location.search = params.toString();
        }

        // Live search z opóźnieniem
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(updateFilters, 500);
        });

        // Filtry natychmiastowe
        statusFilter.addEventListener('change', updateFilters);
        categoryFilter.addEventListener('change', updateFilters);

        // Sortowanie
        document.querySelectorAll('[data-sort]').forEach(header => {
            header.addEventListener('click', function() {
                const sortBy = this.dataset.sort;
                const params = new URLSearchParams(window.location.search);
                const currentOrder = params.get('order') || 'DESC';
                const newOrder = currentOrder === 'DESC' ? 'ASC' : 'DESC';

                params.set('orderby', sortBy);
                params.set('order', newOrder);
                params.delete('paged');

                window.location.search = params.toString();
            });
        });

        // Zaznaczanie wszystkich checkboxów
        selectAllCheckbox.addEventListener('change', function() {
            postCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActionsButton();
        });

        // Aktualizacja przycisku akcji masowych
        postCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
                selectAllCheckbox.checked = checkedBoxes.length === postCheckboxes.length;
                selectAllCheckbox.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < postCheckboxes.length;
                updateBulkActionsButton();
            });
        });

        function updateBulkActionsButton() {
            const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
            bulkActionsBtn.disabled = checkedBoxes.length === 0;
            bulkActionsBtn.textContent = checkedBoxes.length === 0 ? 'Akcje masowe' : `Akcje masowe (${checkedBoxes.length})`;
        }

        // Modal akcji masowych
        bulkActionsBtn.addEventListener('click', function() {
            bulkModal.style.display = 'flex';
        });

        cancelBulkBtn.addEventListener('click', function() {
            bulkModal.style.display = 'none';
        });

        // Zamykanie modala przy kliknięciu w tło
        bulkModal.addEventListener('click', function(e) {
            if (e.target === bulkModal) {
                bulkModal.style.display = 'none';
            }
        });

        // Akcje masowe
        document.getElementById('bulk-delete').addEventListener('click', function() {
            if (confirm('Czy na pewno chcesz usunąć zaznaczone wpisy?')) {
                const selectedPosts = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
                bulkAction('delete', selectedPosts);
            }
        });

        document.getElementById('bulk-draft').addEventListener('click', function() {
            const selectedPosts = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
            bulkAction('draft', selectedPosts);
        });

        document.getElementById('bulk-publish').addEventListener('click', function() {
            const selectedPosts = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
            bulkAction('publish', selectedPosts);
        });

        function bulkAction(action, postIds) {
            const formData = new FormData();
            formData.append('action', 'bulk_posts');
            formData.append('bulk_action', action);
            formData.append('post_ids', JSON.stringify(postIds));
            // attach WP nonce if available, otherwise keep legacy token for fallback
            formData.append('security', '<?php echo $ajax_nonce; ?>');

            fetch('<?php echo $ajax_url; ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    const msg = data.message || data.data || 'Nieznany błąd';
                    alert('Wystąpił błąd: ' + msg);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Wystąpił błąd podczas przetwarzania żądania.');
            });
        }

        // Szybkie akcje pojedynczych wpisów
        document.querySelectorAll('.delete-post').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Czy na pewno chcesz usunąć ten wpis?')) {
                    const postId = this.dataset.postId;
                    quickAction('delete', postId);
                }
            });
        });

        document.querySelectorAll('.duplicate-post').forEach(btn => {
            btn.addEventListener('click', function() {
                const postId = this.dataset.postId;
                quickAction('duplicate', postId);
            });
        });

        function quickAction(action, postId) {
            const formData = new FormData();
            formData.append('action', 'quick_post');
            formData.append('quick_action', action);
            formData.append('post_id', postId);
            // attach WP nonce if available
            formData.append('security', '<?php echo $ajax_nonce; ?>');

            fetch('<?php echo $ajax_url; ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    const msg = data.message || data.data || 'Nieznany błąd';
                    alert('Wystąpił błąd: ' + msg);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Wystąpił błąd podczas przetwarzania żądania.');
            });
        }
    });
    </script>
    <?php
}

/**
 * Funkcja pomocnicza do pobierania statystyk wpisów
 */
function get_posts_stats() {
    global $wpdb;

    // Pobierz prefix tabeli z konfiguracji WordPress
    $prefix = $wpdb->prefix; // To automatycznie użyje właściwego prefixu (wp_724689f)

    // Get user ID with same logic as main function
    if (function_exists('get_current_user_id')) {
        $user_id = get_current_user_id();
    } else {
        $user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 1;
    }

    // Bezpośrednie zapytania SQL dla lepszej kompatybilności
    $stats = array(
        'total' => 0,
        'publish' => 0,
        'draft' => 0,
        'pending' => 0
    );

    try {
        // Sprawdź czy tabela istnieje i pobierz dane
        $posts_table = $prefix . 'posts';

        if ($wpdb->get_var("SHOW TABLES LIKE '$posts_table'") == $posts_table) {
            // Wszystkie wpisy użytkownika
            $stats['total'] = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM $posts_table WHERE post_author = %d AND post_type = 'post' AND post_status IN ('publish', 'draft', 'pending', 'future')",
                $user_id
            ));

            // Opublikowane
            $stats['publish'] = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM $posts_table WHERE post_author = %d AND post_type = 'post' AND post_status = 'publish'",
                $user_id
            ));

            // Wersje robocze
            $stats['draft'] = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM $posts_table WHERE post_author = %d AND post_type = 'post' AND post_status = 'draft'",
                $user_id
            ));

            // Oczekujące
            $stats['pending'] = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM $posts_table WHERE post_author = %d AND post_type = 'post' AND post_status = 'pending'",
                $user_id
            ));
        }
    } catch (Exception $e) {
        // W przypadku błędu, zwróć zera
        error_log('Błąd podczas pobierania statystyk wpisów: ' . $e->getMessage());
    }

    return $stats;
}

/**
 * Funkcja pomocnicza do generowania badge statusu
 */
function get_status_badge($status) {
    $badges = array(
        'publish' => '<span class="badge badge-success">Opublikowany</span>',
        'draft' => '<span class="badge badge-warning">Wersja robocza</span>',
        'pending' => '<span class="badge badge-info">Oczekujący</span>',
        'future' => '<span class="badge badge-secondary">Zaplanowany</span>',
        'private' => '<span class="badge badge-dark">Prywatny</span>',
        'trash' => '<span class="badge badge-danger">W koszu</span>'
    );

    return isset($badges[$status]) ? $badges[$status] : '<span class="badge badge-light">' . ucfirst($status) . '</span>';
}

/**
 * AJAX handler dla akcji masowych - wersja dla samodzielnego systemu
 */
function handle_bulk_posts_action() {
    global $wpdb;
    $prefix = $wpdb->prefix;

    // Proste sprawdzenie tokena bezpieczeństwa
    if (!isset($_POST['token']) || $_POST['token'] !== 'bulk_posts_token_123') {
        die(json_encode(['success' => false, 'message' => 'Nieprawidłowy token bezpieczeństwa']));
    }

    // Pobierz ID użytkownika z sesji
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

    $action = isset($_POST['bulk_action']) ? trim($_POST['bulk_action']) : '';
    $post_ids = isset($_POST['post_ids']) ? json_decode($_POST['post_ids'], true) : [];

    if (empty($post_ids) || !is_array($post_ids)) {
        die(json_encode(['success' => false, 'message' => 'Brak zaznaczonych wpisów']));
    }

    $updated = 0;
    $posts_table = $prefix . 'posts';

    foreach ($post_ids as $post_id) {
        $post_id = intval($post_id);

        // Sprawdź czy użytkownik jest właścicielem wpisu
        $post_author = $wpdb->get_var($wpdb->prepare(
            "SELECT post_author FROM $posts_table WHERE ID = %d",
            $post_id
        ));

        if (!$post_author || $post_author != $user_id) {
            continue;
        }

        switch ($action) {
            case 'delete':
                if ($wpdb->delete($posts_table, ['ID' => $post_id], ['%d'])) {
                    $updated++;
                }
                break;

            case 'draft':
                if ($wpdb->update($posts_table, ['post_status' => 'draft'], ['ID' => $post_id], ['%s'], ['%d'])) {
                    $updated++;
                }
                break;

            case 'publish':
                if ($wpdb->update($posts_table, ['post_status' => 'publish'], ['ID' => $post_id], ['%s'], ['%d'])) {
                    $updated++;
                }
                break;
        }
    }

    if ($updated > 0) {
        die(json_encode(['success' => true, 'message' => "Zaktualizowano $updated wpisów"]));
    } else {
        die(json_encode(['success' => false, 'message' => 'Nie udało się zaktualizować żadnego wpisu']));
    }
}

/**
 * AJAX handler dla szybkich akcji - wersja dla samodzielnego systemu
 */
function handle_quick_post_action() {
    global $wpdb;
    $prefix = $wpdb->prefix;

    // Proste sprawdzenie tokena bezpieczeństwa
    if (!isset($_POST['token']) || $_POST['token'] !== 'quick_post_token_123') {
        die(json_encode(['success' => false, 'message' => 'Nieprawidłowy token bezpieczeństwa']));
    }

    // Pobierz ID użytkownika z sesji
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

    $action = isset($_POST['quick_action']) ? trim($_POST['quick_action']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    if (!$post_id) {
        die(json_encode(['success' => false, 'message' => 'Nieprawidłowy ID wpisu']));
    }

    $posts_table = $prefix . 'posts';

    // Sprawdź czy użytkownik jest właścicielem wpisu
    $post = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $posts_table WHERE ID = %d",
        $post_id
    ));

    if (!$post || $post->post_author != $user_id) {
        die(json_encode(['success' => false, 'message' => 'Brak dostępu do tego wpisu']));
    }

    switch ($action) {
        case 'delete':
            if ($wpdb->delete($posts_table, ['ID' => $post_id], ['%d'])) {
                die(json_encode(['success' => true, 'message' => 'Wpis został usunięty']));
            } else {
                die(json_encode(['success' => false, 'message' => 'Nie udało się usunąć wpisu']));
            }

        case 'duplicate':
            $new_post_data = [
                'post_title' => $post->post_title . ' (kopia)',
                'post_content' => $post->post_content,
                'post_excerpt' => $post->post_excerpt,
                'post_status' => 'draft',
                'post_type' => $post->post_type,
                'post_author' => $post->post_author,
                'post_date' => date('Y-m-d H:i:s'),
                'post_date_gmt' => gmdate('Y-m-d H:i:s'),
                'post_modified' => date('Y-m-d H:i:s'),
                'post_modified_gmt' => gmdate('Y-m-d H:i:s')
            ];

            if ($wpdb->insert($posts_table, $new_post_data)) {
                $new_post_id = $wpdb->insert_id;

                // Skopiuj kategorie
                $term_relationships_table = $prefix . 'term_relationships';
                $categories = $wpdb->get_results($wpdb->prepare(
                    "SELECT term_taxonomy_id FROM $term_relationships_table WHERE object_id = %d",
                    $post_id
                ));

                foreach ($categories as $category) {
                    $wpdb->insert($term_relationships_table, [
                        'object_id' => $new_post_id,
                        'term_taxonomy_id' => $category->term_taxonomy_id
                    ]);
                }

                die(json_encode(['success' => true, 'message' => 'Wpis został zduplikowany']));
            } else {
                die(json_encode(['success' => false, 'message' => 'Nie udało się zduplikować wpisu']));
            }

        default:
            die(json_encode(['success' => false, 'message' => 'Nieprawidłowa akcja']));
    }
}

// Obsługa AJAX dla samodzielnego systemu
if (isset($_POST['action'])) {
    if ($_POST['action'] === 'bulk_posts') {
        handle_bulk_posts_action();
    } elseif ($_POST['action'] === 'quick_post') {
        handle_quick_post_action();
    }
}
?>
