<?php
// Bezpieczeństwo: nonce, walidacja, sanitizacja
function cd_verify_nonce($nonce, $action) {
    return wp_verify_nonce($nonce, $action);
}
function cd_sanitize($data) {
    return sanitize_text_field($data);
}
