<?php
// inc/core/assets.php
if (!defined('ABSPATH')) exit;

function np_enqueue_assets() {
    if (!function_exists('is_page')) return;
    // Load only on panel pages
    if (is_page('panel')) {
        $base = plugin_dir_url(__DIR__ . '/..');
        wp_enqueue_style('np-tailwind', $base . 'assets/css/tailwind.min.css', [], '1.0.0');
        wp_enqueue_script('np-dashboard', $base . 'assets/js/dashboard.js', ['jquery'], '1.0.0', true);
        wp_localize_script('np-dashboard', 'np_vars', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('np_nonce')
        ]);
    }
}
add_action('wp_enqueue_scripts', 'np_enqueue_assets');
add_action('admin_enqueue_scripts', 'np_enqueue_assets');
