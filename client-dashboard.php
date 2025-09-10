<?php
/*
Plugin Name: Client SaaS Dashboard
Description: Nowoczesny, customowy panel administracyjny dla klientów WordPress/WooCommerce.
Version: 1.0
Author: Twoja Firma
*/

if (!defined('ABSPATH')) exit;

// Ładowanie zasobów (CSS/JS) na stronie z panelem
function client_dashboard_enqueue_assets() {
    if (function_exists('wp_enqueue_style') && function_exists('wp_enqueue_script') && function_exists('plugin_dir_url')) {
        wp_enqueue_style('client-dashboard-tailwind', plugin_dir_url(__FILE__).'assets/tailwind.min.css');
        wp_enqueue_script('client-dashboard-alpine', plugin_dir_url(__FILE__).'assets/alpine.min.js', [], false, true);
        wp_enqueue_script('client-dashboard-main', plugin_dir_url(__FILE__).'assets/dashboard.js', ['jquery'], false, true);
    }
}


// Automatyczne tworzenie strony "Panel Klienta" przy aktywacji pluginu
if (function_exists('register_activation_hook')) {
    register_activation_hook(__FILE__, 'client_dashboard_create_page');
}

function client_dashboard_create_page() {
    if (!function_exists('wp_insert_post') || !function_exists('get_page_by_path') || !function_exists('update_post_meta')) {
        return;
    }

    $panel_page = array(
        'post_title'    => 'Panel Klienta',
        'post_name'     => 'panel',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'page',
    );
    $existing = get_page_by_path('panel');
    if (!$existing) {
        $page_id = wp_insert_post($panel_page);
        if ($page_id) {
            // Ustaw szablon strony na nasz customowy
            update_post_meta($page_id, '_wp_page_template', 'templates/page-client-dashboard.php');
        }
    } else {
        // Jeśli strona istnieje, wymuś nasz szablon
        update_post_meta($existing->ID, '_wp_page_template', 'templates/page-client-dashboard.php');
    }
}

// Wyświetlanie panelu na stronie /panel

// Wyświetlanie panelu klienta na stronie /panel w trybie fullscreen (bez motywu WP)

// Wymuszenie dedykowanego szablonu fullscreen dla /panel
if (function_exists('add_filter')) {
    add_filter('template_include', function($template) {
        if (function_exists('is_page') && function_exists('is_user_logged_in') && function_exists('current_user_can') && function_exists('wp_die') && function_exists('plugin_dir_path')) {
            if (is_page('panel')) {
                if (!is_user_logged_in() || !(current_user_can('klient') || current_user_can('administrator'))) {
                    wp_die('<div class="bg-red-600 text-white p-4 rounded">Brak dostępu do panelu klienta.</div>');
                }
                return plugin_dir_path(__FILE__).'templates/dashboard-fullscreen.php';
            }
        }
        return $template;
    });

    // Wymuszenie dedykowanego szablonu panelu dla strony o slug 'panel-administratora-weblu'
    add_filter('template_include', function($template) {
        global $post;
        if (function_exists('is_page') && function_exists('is_user_logged_in') && function_exists('current_user_can') && function_exists('wp_die') && function_exists('plugin_dir_path')) {
            if (is_page() && isset($post) && $post->post_name === 'panel-administratora-weblu') {
                if (!is_user_logged_in() || !(current_user_can('klient') || current_user_can('administrator'))) {
                    wp_die('<div class="bg-red-600 text-white p-4 rounded">Brak dostępu do panelu klienta.</div>');
                }
                return plugin_dir_path(__FILE__).'templates/page-client-dashboard.php';
            }
        }
        return $template;
    });
}

// REST API/AJAX endpointy do obsługi sekcji (zamówienia, produkty, wpisy, kupony, raporty, kontakt, zgłoszenia)
require_once __DIR__ . '/inc/rest-endpoints.php';

// Obsługa powiadomień systemowych
require_once __DIR__ . '/inc/notifications.php';

// Obsługa personalizacji dashboardu
require_once __DIR__ . '/inc/widgets.php';

// Bezpieczeństwo: nonce, walidacja, sanitizacja
require_once __DIR__ . '/inc/security.php';
