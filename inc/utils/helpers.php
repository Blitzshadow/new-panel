<?php
// inc/utils/helpers.php
if (!defined('ABSPATH')) exit;

function np_render_template($path, $data = []) {
    $file = plugin_dir_path(__DIR__ . '/..') . "templates/" . $path . '.php';
    if (!file_exists($file)) return '';
    extract($data, EXTR_SKIP);
    ob_start();
    include $file;
    return ob_get_clean();
}

function np_json_response($success, $message = '', $data = []) {
    wp_send_json([ 'success' => $success, 'message' => $message, 'data' => $data ]);
}

function np_verify_nonce_or_die($nonce, $action) {
    if (!function_exists('wp_verify_nonce') || !wp_verify_nonce($nonce, $action)) {
        wp_send_json(['success' => false, 'message' => 'Invalid nonce'], 403);
    }
}
