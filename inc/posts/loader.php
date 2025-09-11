<?php
// inc/posts/loader.php
if (!defined('ABSPATH')) exit;

// REST routes and AJAX handlers for posts module
require_once __DIR__ . '/class-posts-controller.php';
$np_posts_controller = new NP_Posts_Controller();
$np_posts_controller->init();
