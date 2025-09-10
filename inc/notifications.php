<?php
// System powiadomień/toastów dla dashboardu
if (!defined('ABSPATH')) exit;
function cd_add_notification($msg, $type = 'info') {
    echo "<script>window.showToast('".addslashes($msg)."', '".addslashes($type)."');</script>";
}
