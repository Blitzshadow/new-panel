<?php
// inc/utils/security.php
if (!defined('ABSPATH')) exit;

function np_verify_nonce($nonce, $action) {
    if (function_exists('wp_verify_nonce')) return wp_verify_nonce($nonce, $action);
    return false;
}

function np_sanitize($data) {
    if (function_exists('sanitize_text_field')) return sanitize_text_field($data);
    return $data;
}
