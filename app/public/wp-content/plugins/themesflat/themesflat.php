<?php
/**
 * Plugin Name: ThemesFlat
 * Description: The theme's components
 * Author:      ThemesFlat
 * Version:     1.0.0
 */

define( 'THEMESFLAT_PATH', plugin_dir_path( __FILE__ ) );
define( 'THEMESFLAT_URL', plugin_dir_url( __FILE__ ) );
define( 'THEMESFLAT_ICON', plugin_dir_url( __FILE__ ) . 'assets/img/logo.png' );

$theme = wp_get_theme();
if ( 'Lowlead' == $theme->name || 'Lowlead' == $theme->parent_theme ) {
	require_once THEMESFLAT_PATH . '/poststype/init-posts-type.php';
	require_once THEMESFLAT_PATH . '/includes/options.php';
	require_once THEMESFLAT_PATH . '/includes/metabox-options.php';
	require THEMESFLAT_PATH . "widgets/themesflat_recent_post.php";
	require THEMESFLAT_PATH . "widgets/themesflat_latest_news.php";
	require THEMESFLAT_PATH . "widgets/themesflat_practise_area.php";
	require THEMESFLAT_PATH . "widgets/themesflat_case_study_details.php";
}

function themesflat_shortcode_register_assets() {
	wp_enqueue_style( 'iziModal', plugins_url( 'assets/css/iziModal.css', __FILE__ ), array(), true );
	wp_enqueue_style( 'tf-main-post-type', plugins_url( 'assets/css/tf-main-post-type.css', __FILE__ ), array(), true );

	wp_enqueue_script( 'iziModal', plugins_url( 'assets/js/iziModal.js', __FILE__ ), array(), '1.0', true );
	wp_enqueue_script( 'tf-main-post-type', plugins_url( 'assets/js/tf-main-post-type.js', __FILE__ ), array(), '1.0', true );
	wp_enqueue_script( 'jquery-isotope' );
	wp_enqueue_script( 'imagesloaded-pkgd' );

	wp_enqueue_style( 'tf-font-awesome' );
	wp_enqueue_style( 'tf-regular' );

	if ( is_rtl() ) {
		wp_style_add_data( 'tf-main-post-type', 'rtl', 'replace' );
	}
}

add_action( 'wp_enqueue_scripts', 'themesflat_shortcode_register_assets', 999999 );

function themesflat_admin_script_meta_box() {
	$screen = get_current_screen();
	wp_enqueue_script( 'themesflat-meta-box', plugins_url( 'assets/js/meta-boxes.js', __FILE__ ), array(), true );

}

add_action( 'admin_enqueue_scripts', 'themesflat_admin_script_meta_box' );

// Add image sizes post type
add_action( 'after_setup_theme', 'add_image_sizes' );
function add_image_sizes() {
	add_image_size( 'themesflat-portfolio-image', 750, 730, true );
	add_image_size( 'themesflat-portfolio-image-single', 1170, 553, true );
	add_image_size( 'themesflat-service-image', 1170, 759, true );
	add_image_size( 'themesflat-doctor-image', 640, 640, true );
}


if ( function_exists( 'themesflat_register_practise_area_post_type' ) ) {
	function sidebar_widgets_practise_area() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Practise Area', 'themesflat' ),
			'id'            => 'practise-area-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar Practise Area Sidebar.', 'themesflat' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

	add_action( 'widgets_init', 'sidebar_widgets_practise_area', 10 );
}
if ( function_exists( 'themesflat_register_case_study_post_type' ) ) {
	function sidebar_widgets_case_study() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Case Study', 'themesflat' ),
			'id'            => 'case-study-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar Case Study Sidebar.', 'themesflat' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

	add_action( 'widgets_init', 'sidebar_widgets_case_study', 10 );
}

add_action( 'bulter_before_post_single', 'themesflat_post_views_count' );
function themesflat_post_views_count( $postID ) {
	$count_key = 'tf_post_view_counts';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}

function themesflat_get_post_views_count( $postID ) {
	return get_post_meta( $postID, 'tf_post_view_counts', true );
}

function themesflat_mime_types_svg( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'themesflat_mime_types_svg' );
add_filter( 'mime_types', 'themesflat_mime_types_svg' );