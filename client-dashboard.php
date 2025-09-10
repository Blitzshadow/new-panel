<?php
/*
Plugin Name: Client SaaS Dashboard
Description: Nowoczesny, customowy panel administracyjny dla klientów WordPress/WooCommerce.
Version: 1.0
Author: Twoja Firma
*/

if (!defined('ABSPATH')) exit;

// 1. Ładowanie zasobów (CSS/JS)
add_action('admin_enqueue_scripts', function() {
    if (is_user_logged_in() && current_user_can('klient')) {
        wp_enqueue_style('client-dashboard-tailwind', plugin_dir_url(__FILE__).'assets/tailwind.min.css');
        wp_enqueue_script('client-dashboard-alpine', plugin_dir_url(__FILE__).'assets/alpine.min.js', [], false, true);
        wp_enqueue_script('client-dashboard-main', plugin_dir_url(__FILE__).'assets/dashboard.js', ['jquery'], false, true);
    }
});

// 2. Dodanie menu panelu
add_action('admin_menu', function() {
    if (current_user_can('klient')) {
        add_menu_page(
            'Panel Klienta',
            'Panel Klienta',
            'read',
            'client-dashboard',
            'client_dashboard_render',
            'dashicons-admin-users',
            2
        );
    }
});

// 3. Renderowanie panelu (HTML + sekcje)
function client_dashboard_render() {
    if (!current_user_can('klient')) {
        wp_die('Brak dostępu.');
    }
    include plugin_dir_path(__FILE__).'templates/dashboard.php';
}

// 4. Ograniczenie dostępu do niepotrzebnych sekcji WP
add_action('admin_init', function() {
    if (current_user_can('klient')) {
        remove_menu_page('plugins.php');
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php');
        remove_menu_page('edit-comments.php');
        // ...dodaj inne niepotrzebne sekcje
    }
});

// 5. REST API/AJAX endpointy do obsługi sekcji (zamówienia, produkty, wpisy, kupony, raporty, kontakt, zgłoszenia)
require_once plugin_dir_path(__FILE__).'inc/rest-endpoints.php';

// 6. Obsługa powiadomień systemowych
require_once plugin_dir_path(__FILE__).'inc/notifications.php';

// 7. Obsługa personalizacji dashboardu
require_once plugin_dir_path(__FILE__).'inc/widgets.php';

// 8. Bezpieczeństwo: nonce, walidacja, sanitizacja
require_once plugin_dir_path(__FILE__).'inc/security.php';

// 9. Responsywny, nowoczesny CSS/JS (Tailwind, Alpine, dashboard.js)
