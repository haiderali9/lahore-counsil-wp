<?php
add_action('init', 'themesflat_register_practise_area_post_type');
/**
  * Register practise_area post type
*/
function themesflat_register_practise_area_post_type() {
    /*practise_area*/
    $practise_area_slug = 'practise-area';
    $labels = array(
        'name'                  => esc_html__( 'Practise Area', 'themesflat' ),
        'singular_name'         => esc_html__( 'Practise Area', 'themesflat' ),
        'menu_name'             => esc_html__( 'Practise Area', 'themesflat' ),
        'add_new'               => esc_html__( 'New Practise Area', 'themesflat' ),
        'add_new_item'          => esc_html__( 'Add New Practise Area', 'themesflat' ),
        'new_item'              => esc_html__( 'New Practise Area Item', 'themesflat' ),
        'edit_item'             => esc_html__( 'Edit Practise Area Item', 'themesflat' ),
        'view_item'             => esc_html__( 'View Practise Area', 'themesflat' ),
        'all_items'             => esc_html__( 'All Practise Area', 'themesflat' ),
        'search_items'          => esc_html__( 'Search Practise Area', 'themesflat' ),
        'not_found'             => esc_html__( 'No Practise Area Items Found', 'themesflat' ),
        'not_found_in_trash'    => esc_html__( 'No Practise Area Items Found In Trash', 'themesflat' ),
        'parent_item_colon'     => esc_html__( 'Parent Practise Area:', 'themesflat' )

    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $practise_area_slug ),        
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor','comments' ),
        'public'        => true,
        'show_in_rest' => true,
        'has_archive' => true
    );
    register_post_type( 'practise_area', $args );
    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_practise_area_updated_messages' );
/**
  * practise_area update messages.
*/
function themesflat_practise_area_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'practise_area' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Practise Area Updated. <a href="%s">View Practise Area</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),
        3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),
        4  => esc_html__( 'Practise Area Updated.', 'themesflat' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Practise Area Restored To Revision From %s', 'themesflat' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Practise Area Published. <a href="%s">View Practise Area</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Practise Area Saved.', 'themesflat' ),
        8  => sprintf( esc_html__('Practise Area Submitted. <a target="_blank" href="%s">Preview Practise Area</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Practise Area Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Practise Area</a>', 'themesflat' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Practise Area Draft Updated. <a target="_blank" href="%s">Preview Practise Area</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_practise_area_taxonomy' );
/**
  * Register practise_area taxonomy
*/
function themesflat_register_practise_area_taxonomy() {
    /*practise_area Categories*/
    $practise_area_cat_slug = 'practise_area_category';    
    $labels = array(
        'name'                       => esc_html__( 'Practise Area Categories', 'themesflat' ),
        'singular_name'              => esc_html__( 'Categories', 'themesflat' ),
        'search_items'               => esc_html__( 'Search Categories', 'themesflat' ),
        'menu_name'                  => esc_html__( 'Categories', 'themesflat' ),
        'all_items'                  => esc_html__( 'All Categories', 'themesflat' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'themesflat' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'themesflat' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'themesflat' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'themesflat' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'themesflat' ),
        'update_item'                => esc_html__( 'Update Categories', 'themesflat' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'themesflat' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'themesflat' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$practise_area_cat_slug),
        'hierarchical'  => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'practise_area_category', 'practise_area', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'themesflat_register_practise_area_tag' );
/**
 * Register tag taxonomy
 */
function themesflat_register_practise_area_tag() {
    $practise_area_tag_slug = 'practise_area_tag';

    $labels = array(
        'name'                       => esc_html__( 'Practise Area Tags', 'themesflat' ),
        'singular_name'              => esc_html__( 'Practise Area Tags', 'themesflat' ),
        'search_items'               => esc_html__( 'Search Tags', 'themesflat' ),        
        'all_items'                  => esc_html__( 'All Tags', 'themesflat' ),
        'new_item_name'              => esc_html__( 'Add New Tag', 'themesflat' ),
        'add_new_item'               => esc_html__( 'New Tag Name', 'themesflat' ),
        'edit_item'                  => esc_html__( 'Edit Tag', 'themesflat' ),
        'update_item'                => esc_html__( 'Update Tag', 'themesflat' ),
        'menu_name'                  => esc_html__( 'Tags' ),
    );
    $args = array(
        'labels'       => $labels,
        'rewrite'       => array('slug'=>$practise_area_tag_slug),
        'hierarchical' => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'practise_area_tag', 'practise_area', $args );
    flush_rewrite_rules();
}