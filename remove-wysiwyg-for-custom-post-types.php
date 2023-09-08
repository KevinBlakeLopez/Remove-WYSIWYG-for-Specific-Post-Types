<?php
/*
Plugin Name: Remove WYSIWYG for Specific Post Types
Description: Removes the WYSIWYG editor for user selected post types.
Version: 1.0
Author: Life Sciences Web Studio
*/

// Action to add admin menu
add_action('admin_menu', 'rwfpt_admin_menu');

function rwfpt_admin_menu() {
    add_options_page('Remove WYSIWYG Settings', 'Remove WYSIWYG', 'manage_options', 'rwfpt-settings', 'rwfpt_admin_settings_page');
}

// Admin settings page
function rwfpt_admin_settings_page() {
    $post_types = get_post_types(['public' => true], 'names');
    $disabled_types = get_option('rwfpt_disabled_post_types', []);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $disabled_types = isset($_POST['post_types']) ? $_POST['post_types'] : [];
        update_option('rwfpt_disabled_post_types', $disabled_types);
    }
    include dirname(__FILE__) . '/settings-page.php';
}

// Action to remove WYSIWYG
add_action('init', 'remove_wysiwyg_for_post_types');

function remove_wysiwyg_for_post_types() {
    $disabled_types = get_option('rwfpt_disabled_post_types', []);
    foreach ($disabled_types as $type) {
        remove_post_type_support($type, 'editor');
    }
}
