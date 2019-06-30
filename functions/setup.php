<?php

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

function create_post_type() {
    $faqs_labels = array(
        'name'               => 'FAQs',
        'singular_name'      => 'FAQ',
        'menu_name'          => 'FAQs',
        'name_admin_bar'     => 'FAQs',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New FAQ',
        'new_item'           => 'New FAQ',
        'edit_item'          => 'Edit FAQ',
        'view_item'          => 'View FAQ',
        'all_items'          => 'All FAQs',
        'search_items'       => 'Search FAQs',
        'parent_item_colon'  => 'Parent FAQ',
        'not_found'          => 'No FAQs Found',
        'not_found_in_trash' => 'No FAQs Found in Trash'
    );

    $faqs_args = array(
        'labels'              => $faqs_labels,
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-appearance',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'faqs' ),
        'query_var'           => true
    );

    register_post_type( 'faqs', $faqs_args );

    $case_studies_labels = array(
        'name'               => 'Case Studies',
        'singular_name'      => 'Study',
        'menu_name'          => 'Case Studies',
        'name_admin_bar'     => 'Case Studies',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Study',
        'new_item'           => 'New Study',
        'edit_item'          => 'Edit Study',
        'view_item'          => 'View Study',
        'all_items'          => 'All Case Studies',
        'search_items'       => 'Search Case Studies',
        'parent_item_colon'  => 'Parent Study',
        'not_found'          => 'No Case Studies Found',
        'not_found_in_trash' => 'No Case Studies Found in Trash'
    );

    $case_studies_args = array(
        'labels'              => $case_studies_labels,
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-appearance',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'case-studies' ),
        'query_var'           => true
    );

    register_post_type( 'case-studies', $case_studies_args );

    $partner_labels = array(
        'name'               => 'Partners',
        'singular_name'      => 'Partner',
        'menu_name'          => 'Partners',
        'name_admin_bar'     => 'Partners',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Partner',
        'new_item'           => 'New Partner',
        'edit_item'          => 'Edit Partner',
        'view_item'          => 'View Partner',
        'all_items'          => 'All Partners',
        'search_items'       => 'Search Partners',
        'parent_item_colon'  => 'Parent Partner',
        'not_found'          => 'No Partners Found',
        'not_found_in_trash' => 'No Partners Found in Trash'
    );

    $partner_args = array(
        'labels'              => $partner_labels,
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-appearance',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'partners' ),
        'query_var'           => true
    );

    register_post_type( 'partners', $partner_args );
}
add_action( 'init', 'create_post_type' );
