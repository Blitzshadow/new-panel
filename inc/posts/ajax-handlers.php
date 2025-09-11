<?php
// inc/posts/ajax-handlers.php
if (!defined('ABSPATH')) exit;

// Backwards-compatible AJAX endpoints for posts (migrating to NP_Posts_Controller)
add_action('wp_ajax_bulk_posts', function() {
    check_ajax_referer('np_posts_nonce', 'security');
    if (!current_user_can('edit_posts')) wp_send_json(['success'=>false,'message'=>'No permission'],403);
    $ids = isset($_POST['post_ids']) ? json_decode(stripslashes($_POST['post_ids']), true) : [];
    if (empty($ids)) wp_send_json(['success'=>false,'message'=>'Brak zaznaczonych wpisów']);
    foreach ($ids as $id) {
        wp_delete_post(intval($id), true);
    }
    wp_send_json(['success'=>true,'message'=>'Usunięto wpisy']);
});

add_action('wp_ajax_quick_post', function(){
    check_ajax_referer('np_posts_nonce', 'security');
    if (!current_user_can('edit_posts')) wp_send_json(['success'=>false,'message'=>'No permission'],403);
    $action = isset($_POST['quick_action']) ? sanitize_text_field($_POST['quick_action']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    if (!$post_id) wp_send_json(['success'=>false,'message'=>'Invalid id']);
    switch ($action) {
        case 'delete': wp_delete_post($post_id, true); wp_send_json(['success'=>true]); break;
        default: wp_send_json(['success'=>false,'message'=>'Unknown action']); break;
    }
});
