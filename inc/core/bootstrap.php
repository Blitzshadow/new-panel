<?php
// inc/core/bootstrap.php
// Bootstrap dla modularnego pluginu New Panel
if (!defined('ABSPATH')) exit;

// Autoload simple (PSR-4 not required here) - prefer manual includes for clarity
require_once plugin_dir_path(__FILE__) . '../utils/helpers.php';

// Load module loaders
$modules = [
    'posts',
    'users',
    'woocommerce',
    'notifications'
];
foreach ($modules as $m) {
    $loader = plugin_dir_path(__FILE__) . "../$m/loader.php";
    if (file_exists($loader)) require_once $loader;
}

// Load assets helper
require_once plugin_dir_path(__FILE__) . 'assets.php';
