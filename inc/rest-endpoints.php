<?php
// REST API endpoints for dashboard sections
if (!defined('ABSPATH')) exit;
if (function_exists('add_action')) {
    add_action('rest_api_init', function() {
        // Zamówienia WooCommerce
        register_rest_route('client-dashboard/v1', '/orders', [
            'methods' => 'GET',
            'callback' => 'cd_get_orders',
            'permission_callback' => 'cd_permission_client'
        ]);
        // Produkty WooCommerce
        register_rest_route('client-dashboard/v1', '/products', [
            'methods' => 'GET',
            'callback' => 'cd_get_products',
            'permission_callback' => 'cd_permission_client'
        ]);
        // Kupony WooCommerce
        register_rest_route('client-dashboard/v1', '/coupons', [
            'methods' => 'GET',
            'callback' => 'cd_get_coupons',
            'permission_callback' => 'cd_permission_client'
        ]);
        // Raporty/statystyki
        register_rest_route('client-dashboard/v1', '/reports', [
            'methods' => 'GET',
            'callback' => 'cd_get_reports',
            'permission_callback' => 'cd_permission_client'
        ]);
        // Wpisy
        register_rest_route('client-dashboard/v1', '/posts', [
            'methods' => 'GET',
            'callback' => 'cd_get_posts',
            'permission_callback' => 'cd_permission_client'
        ]);
        // Kontakt
        register_rest_route('client-dashboard/v1', '/contact', [
            'methods' => 'POST',
            'callback' => 'cd_send_contact',
            'permission_callback' => 'cd_permission_client'
        ]);
        // Zgłoszenia
        register_rest_route('client-dashboard/v1', '/issue', [
            'methods' => 'POST',
            'callback' => 'cd_send_issue',
            'permission_callback' => 'cd_permission_client'
        ]);
    });
}

function cd_permission_client() {
    return function_exists('current_user_can') && current_user_can('klient');
}

// Przykładowe callbacki (do uzupełnienia logiką WooCommerce/WP)
function cd_get_orders($request) {
    // Pobierz zamówienia WooCommerce dla użytkownika
    return [];
}
function cd_get_products($request) {
    // Pobierz produkty WooCommerce
    return [];
}
function cd_get_coupons($request) {
    // Pobierz kupony WooCommerce
    return [];
}
function cd_get_reports($request) {
    // Pobierz raporty/statystyki
    return [];
}
function cd_get_posts($request) {
    // Pobierz wpisy użytkownika
    return [];
}
function cd_send_contact($request) {
    // Wyślij wiadomość do admina
    return ['success' => true];
}
function cd_send_issue($request) {
    // Wyślij zgłoszenie z załącznikiem
    return ['success' => true];
}
