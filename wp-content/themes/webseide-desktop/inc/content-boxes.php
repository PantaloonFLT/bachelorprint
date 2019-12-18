<?php
/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 26-02-16
 * Time: 17:48
 */

if ( ! function_exists('pb_content_box') ) {

// Register Custom Post Type
    function pb_content_box() {

        $labels = array(
            'name'                  => _x( 'Content Box', 'Post Type General Name', 'bachelorpint' ),
            'singular_name'         => _x( 'Content Box', 'Post Type Singular Name', 'bachelorpint' ),
            'menu_name'             => __( 'Content Boxes', 'bachelorpint' ),
            'name_admin_bar'        => __( 'Content Box', 'bachelorpint' ),
            'archives'              => __( 'Content Boxes', 'bachelorpint' ),
            'parent_item_colon'     => __( 'Parent Item:', 'bachelorpint' ),
            'all_items'             => __( 'All Boxes', 'bachelorpint' ),
            'add_new_item'          => __( 'Add Box', 'bachelorpint' ),
            'add_new'               => __( 'Add Box', 'bachelorpint' ),
            'new_item'              => __( 'New Box', 'bachelorpint' ),
            'edit_item'             => __( 'Edit Box', 'bachelorpint' ),
            'update_item'           => __( 'Update Box', 'bachelorpint' ),
            'view_item'             => __( 'View Box', 'bachelorpint' ),
            'search_items'          => __( 'Search Box', 'bachelorpint' ),
            'not_found'             => __( 'Not found', 'bachelorpint' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'bachelorpint' ),
            'featured_image'        => __( 'Featured Image', 'bachelorpint' ),
            'set_featured_image'    => __( 'Set featured image', 'bachelorpint' ),
            'remove_featured_image' => __( 'Remove featured image', 'bachelorpint' ),
            'use_featured_image'    => __( 'Use as featured image', 'bachelorpint' ),
            'insert_into_item'      => __( 'Insert into item', 'bachelorpint' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'bachelorpint' ),
            'items_list'            => __( 'Box list', 'bachelorpint' ),
            'items_list_navigation' => __( 'Box list navigation', 'bachelorpint' ),
            'filter_items_list'     => __( 'Filter Box list', 'bachelorpint' ),
        );
        $args = array(
            'label'                 => __( 'Content Box', 'bachelorpint' ),
            'description'           => __( 'Content Boxes for Display on Home or Sub Pages', 'bachelorpint' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail','editor' ),
            'taxonomies'            => array( 'custom_box_page' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'content_box', $args );

    }
    add_action( 'init', 'pb_content_box', 0 );

}

if ( ! function_exists( 'bp_add_custom_box_page' ) ) {

// Register Custom Taxonomy
    function bp_add_custom_box_page() {

        $labels = array(
            'name'                       => _x( 'Custom Box Displays', 'Taxonomy General Name', 'bachelorprint' ),
            'singular_name'              => _x( 'Custom Box Display', 'Taxonomy Singular Name', 'bachelorprint' ),
            'menu_name'                  => __( 'Box Page', 'bachelorprint' ),
            'all_items'                  => __( 'Box Pages', 'bachelorprint' ),
            'parent_item'                => __( 'Parent', 'bachelorprint' ),
            'parent_item_colon'          => __( 'Parent Item:', 'bachelorprint' ),
            'new_item_name'              => __( 'New Box Cat', 'bachelorprint' ),
            'add_new_item'               => __( 'Add Box Cat', 'bachelorprint' ),
            'edit_item'                  => __( 'Edit Box Cat', 'bachelorprint' ),
            'update_item'                => __( 'Update Box Cat', 'bachelorprint' ),
            'view_item'                  => __( 'View Box Cat', 'bachelorprint' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'bachelorprint' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'bachelorprint' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'bachelorprint' ),
            'popular_items'              => __( 'Popular Items', 'bachelorprint' ),
            'search_items'               => __( 'Search Items', 'bachelorprint' ),
            'not_found'                  => __( 'Not Found', 'bachelorprint' ),
            'no_terms'                   => __( 'No items', 'bachelorprint' ),
            'items_list'                 => __( 'Items list', 'bachelorprint' ),
            'items_list_navigation'      => __( 'Items list navigation', 'bachelorprint' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'custom_box_page', array( 'content_box' ), $args );

    }
    add_action( 'init', 'bp_add_custom_box_page', 0 );

}