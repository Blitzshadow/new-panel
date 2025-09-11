<?php
// inc/posts/class-posts-controller.php
if (!defined('ABSPATH')) exit;

class NP_Posts_Controller {
    public function init() {
        add_action('rest_api_init', [$this, 'register_routes']);
        add_action('wp_ajax_np_posts_bulk', [$this, 'ajax_bulk_action']);
    }

    public function register_routes() {
        register_rest_route('np/v1', '/posts', [
            'methods' => 'GET',
            'callback' => [$this, 'get_posts'],
            'permission_callback' => function() { return current_user_can('edit_posts'); }
        ]);
    }

    public function get_posts($request) {
        $paged = max(1, intval($request->get_param('paged')));
        $per_page = max(1, min(50, intval($request->get_param('per_page') ?: 10)));
        $search = $request->get_param('s');
        $args = [
            'post_type' => 'post',
            'post_status' => ['publish','draft'],
            'posts_per_page' => $per_page,
            'paged' => $paged,
            'author' => get_current_user_id()
        ];
        if (!empty($search)) {
            $args['s'] = sanitize_text_field($search);
        }
        $q = new WP_Query($args);
        $items = [];
        foreach ($q->posts as $p) {
            $items[] = [
                'id' => $p->ID,
                'title' => get_the_title($p),
                'date' => get_the_date('c', $p),
                'status' => $p->post_status
            ];
        }
        return [
            'success' => true,
            'data' => $items,
            'total' => (int) $q->found_posts
        ];
    }

    public function ajax_bulk_action() {
        check_ajax_referer('np_posts_nonce', 'security');
        if (!current_user_can('edit_posts')) wp_send_json(['success'=>false,'message'=>'No permission'],403);
        $action = isset($_POST['action_type']) ? sanitize_text_field($_POST['action_type']) : '';
        $ids = isset($_POST['ids']) ? array_map('intval', (array) $_POST['ids']) : [];
        if (empty($ids)) wp_send_json(['success'=>false,'message'=>'No ids']);
        foreach ($ids as $id) {
            if ($action === 'delete') wp_delete_post($id, true);
            if ($action === 'draft') wp_update_post(['ID'=>$id,'post_status'=>'draft']);
        }
        wp_send_json(['success'=>true,'message'=>'Done']);
    }
}
