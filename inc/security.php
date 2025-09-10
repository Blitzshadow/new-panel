<?php
// Bezpieczeństwo: nonce, walidacja, sanitizacja
if (!defined('ABSPATH')) exit;
function cd_verify_nonce($nonce, $action) {
    if (function_exists('wp_verify_nonce')) {
        return wp_verify_nonce($nonce, $action);
    }
    return false;
}
function cd_sanitize($data) {
    if (function_exists('sanitize_text_field')) {
        return sanitize_text_field($data);
    }
    return $data;
}
