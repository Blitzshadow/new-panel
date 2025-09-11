<?php
// inc/notifications/notifications.php
if (!defined('ABSPATH')) exit;

function np_add_notification($msg, $type = 'info') {
    // Prefer returning structured notification data instead of echoing script directly
    // UI should render notifications from JS using localized data or REST responses
    // For backward compatibility, keep a simple echo if needed
    echo "<script>if(window && window.showToast){ window.showToast('".esc_js($msg)."', '".esc_js($type)."'); }</script>";
}
