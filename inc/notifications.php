<?php
// System powiadomień/toastów dla dashboardu
function cd_add_notification($msg, $type = 'info') {
    echo "<script>window.showToast('".addslashes($msg)."', '".addslashes($type)."');</script>";
}
