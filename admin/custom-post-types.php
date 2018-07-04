<?php
/*
Plugin Name: My Custom Post Types
Description: Add post types
*/

/**
* Native Publisher Teams Post Type
*/
add_action( 'init', 'a2_custom_native_publishers' );
function a2_custom_native_publishers() {
    
    $labels = array(
        'name'               => __( 'Native Publishers' ),
        'singular_name'      => __( 'Native Publisher' ),
        'add_new'            => __( 'Add Native Publisher' ),
        'add_new_item'       => __( 'Add Native Publisher' ),
        'edit_item'          => __( 'Edit Publisher' ),
        'new_item'           => __( 'New Publisher' ),
        'all_items'          => __( 'All Publishers' ),
        'view_item'          => __( 'View Publisher' ),
        'search_items'       => __( 'Search Publishers' )
    );
    
    $args = array(
        'labels'            => $labels,
        'description'       => 'Native advertisers and publishers',
        'public'            => true,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-businessman',
        'supports'          => array( 'title' ),
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'has_archive'       => true,
        'query_var'         => 'native-publishers'
    );
    
    // Register
    register_post_type( 'native-publishers', $args);
}

?>