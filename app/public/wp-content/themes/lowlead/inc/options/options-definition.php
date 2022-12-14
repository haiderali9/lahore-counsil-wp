<?php
/**
 * Return the default options of the theme
 *
 * @return  void
 */

function themesflat_customize_default( $key ) {
	$primary_font = 'Cormorant';
	$body_font    = 'Open Sans';

	$primary_color   = '#091D3E';
	$secondary_color = '#B14233';
	$accent_color    = '#232629';
	$default         = array(
		'social_links'                       => array(
			"facebook-f" => '#',
			"instagram"  => '#',
			"dribbble"   => '#',
			"behance"    => '#'
		),
		'show_social_share'                  => 0,
		'go_top'                             => 1,
		'enable_smooth_scroll'               => 0,
		'enable_preload'                     => 1,
		'preload'                            => 'preload-6',
		//topbar
		'topbar_background_color'            => '',
		'topbar_textcolor'                   => '',
		'topbar_link_color'                  => '',
		'topbar_link_color_hover'            => $secondary_color,
		'social_topbar'                      => 0,
		'topbar_enabled'                     => 0,
		'infoLeft_topbar_enabled'            => 1,
		'infoLeft_topbar'                    => __( 'Welcome Drop The Card. <span class="tf-secondary-color">Free Case Evaluation.</span>', 'lowlead' ),
		'infoRight_topbar_enabled'           => 1,
		'infoRight_topbar'                   => esc_html__( 'Phone: +55 (121) 234 444', 'lowlead' ),
		'typography_topbar'                  => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '16',
			'line_height'    => '',
			'letter_spacing' => '',
		),
		'topbar_controls'                    => array( 'padding-top' => '', 'padding-bottom' => '' ),

		//topbar_mobile
		'enable_topbar_mobile'               => 0,
		'menu_topbar_mobile'                 => 0,
		'social_topbar_mobile'               => 0,
		'topbar_mobile_background_color'     => '',
		'topbar_mobile_textcolor'            => '#fff',
		'topbar_mobile_link_color'           => '#fff',
		'topbar_mobile_link_color_hover'     => $accent_color,

		//Header
		'style_header'                       => 'header-default',
		'header_sticky'                      => 1,
		'header_search_box'                  => 0,
		'header_custom_html_enable'          => 1,
		'header_custom_html'                 => '',
		'header_absolute'                    => 0,
		'header_sidebar_toggler'             => 0,
		'show_post_navigator'                => 0,
		'show_entry_footer_content'          => 1,
		'logo_width'                         => 147,
		'menu_location_primary'              => 'primary',
		'site_logo'                          => THEMESFLAT_LINK . 'images/logo.png',
		'site_logo_sticky'                   => '',
		'site_logo_mobile'                   => THEMESFLAT_LINK . 'images/logo.png',
		'show_bottom'                        => 1,
		'header_backgroundcolor'             => '',
		'header_backgroundcolor_sticky'      => '',
		'header_color_main_nav'              => '',
		'header_color_hover_main_nav'        => '',
		'header_sticky_color_main_nav'       => '',
		'header_sticky_color_hover_main_nav' => '',
		'primary_color'                      => $primary_color,
		'secondary_color'                    => $secondary_color,
		'accent_color'                       => $accent_color,
		'typography_body'                    => array(
			'family'         => $body_font,
			'style'          => 'regular',
			'size'           => '14',
			'line_height'    => '2.14',
			'letter_spacing' => '',
		),

		//header info
		'header_info_time_label'             => esc_html__( 'Sat - Sun Off Day.', 'lowlead' ),
		'header_info_time'                   => esc_html__( 'Mon - Fri 8:00 - 19:00', 'lowlead' ),
		'header_info_phone_number'           => '00 121 211 222',
		'header_info_email_label'            => esc_html__( 'Lowlead Gmail Here', 'lowlead' ),
		'header_info_email'                  => 'info.lowlead@gmail.com',

		//header mobile
		'enable_search_box_mobile'           => 1,

		//menu
		'menu_distance_between'              => 27.5,
		'typography_sub_menu'                => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '18',
			'line_height'    => '1.3',
			'letter_spacing' => '',
		),
		'sub_nav_color'                      => '',
		'sub_nav_color_hover'                => '',
		'sub_nav_background'                 => '#ffffff',
		'sub_nav_border_color'               => '#E8E8E8',

		'body_text_color'       => '#777777',
		'body_background_color' => '#fff',
		'page_sidebar_layout'   => 'fullwidth',
		'layout_version'        => 'wide',
		'content_controls'      => array( 'padding-top' => 80, 'padding-bottom' => 80 ),
		'typography_menu'       => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '18',
			'line_height'    => '105px',
			'letter_spacing' => '',
		),

		'typography_headings'        => array(
			'family'         => $primary_font,
			'style'          => '700',
			'line_height'    => '1.2',
			'letter_spacing' => ''
		),
		'h1_size'                    => 72,
		'h2_size'                    => 48,
		'h3_size'                    => 32,
		'h4_size'                    => 28,
		'h5_size'                    => 24,
		'h6_size'                    => 20,
		'typography_blog_post_title' => array(
			'family'         => $primary_font,
			'style'          => '',
			'size'           => '',
			'line_height'    => '',
			'letter_spacing' => '',
		),
		'typography_blog_post_meta'  => array(
			'family'         => $primary_font,
			'style'          => '',
			'size'           => '',
			'line_height'    => '',
			'letter_spacing' => '',
		),

		'typography_blog_single_title'         => array(
			'family'         => $primary_font,
			'style'          => '',
			'size'           => '',
			'line_height'    => '',
			'letter_spacing' => '',
		),
		'typography_blog_single_comment_title' => array(
			'family'         => $primary_font,
			'style'          => '',
			'size'           => '',
			'line_height'    => '',
			'letter_spacing' => '',
		),
		'typography_sidebar_widget_title'      => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '24',
			'line_height'    => '1.25',
			'letter_spacing' => '',
		),
		//Page Title
		'page_title_styles'                    => 'default',
		'page_title_alignment'                 => 'text-left',
		'page_title_video_url'                 => THEMESFLAT_PROTOCOL . '://www.youtube.com/watch?v=JyMeGpvpjas',
		'typography_page_title'                => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '72',
			'line_height'    => '1',
			'letter_spacing' => '',
		),
		'typography_page_title_mobile'         => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '60',
			'line_height'    => '1',
			'letter_spacing' => '',
		),
		'page_title_background_color'          => '',
		'page_title_background_color_opacity'  => '100',
		'page_title_text_color'                => '#fff',
		'page_title_controls'                  => array( 'padding-top' => 179, 'padding-bottom' => 181 ),
		'page_title_controls_mobile'           => array( 'padding-top' => 100, 'padding-bottom' => 100 ),
		'page_title_background_image'          => '',
		'page_title_image_size'                => 'cover',
		'page_title_heading_enabled'           => 1,
		'typography_breadcrumb'                => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '16',
			'line_height'    => '1.66',
			'letter_spacing' => '',
		),

		'bread_crumb_prefix'   => '',
		'breadcrumb_separator' => wp_kses( '<i class="far fa-angle-right"></i>', themesflat_kses_allowed_html() ),
		'breadcrumb_color'     => '',


		'typography_pagination'               => array(
			'family'         => $primary_font,
			'style'          => '700',
			'size'           => '20',
			'line_height'    => '1',
			'letter_spacing' => '',
		),
		'typography_bottom_menu'              => array(
			'family'         => $primary_font,
			'style'          => '400',
			'size'           => '14',
			'line_height'    => '1.5',
			'letter_spacing' => '',
		),
		'breadcrumb_type'                     => 'breadcrumb-01',
		//Blog
		'show_post_paginator'                 => 0,
		'blog_grid_columns'                   => 1,
		'blog_grid_columns_tablet'            => 1,
		'blog_grid_columns_mobile'            => 1,
		'post_content_elements'               => 'meta,title,excerpt_content,readmore',
		'meta_elements'                       => 'author,category',
		'blog_archive_exclude'                => '',
		'blog_featured_title'                 => '',
		'sidebar_layout'                      => 'sidebar-right',
		'blog_archive_layout'                 => 'blog-list',
		'related_post_style'                  => 'blog-grid',
		'grid_columns_post_related'           => 3,
		'number_related_post'                 => 9,
		'blog_sidebar_list'                   => 'blog-sidebar',
		'blog_archive_readmore'               => 1,
		'blog_archive_post_excepts_length'    => 27,
		'blog_archive_readmore_text'          => esc_html__( 'Discover More', 'lowlead' ),
		'blog_archive_pagination_style'       => 'pager-numeric',
		'blog_posts_per_page'                 => 9,
		'blog_order_by'                       => 'date',
		'blog_order_direction'                => 'DESC',
		'page_sidebar_list'                   => 'blog-sidebar',
		'single_sidebar_layout'               => 'sidebar-right',
		'blog_single_sidebar_list'            => 'blog-sidebar',
		//Practise Area
		'practise_area_slug'                  => '',
		'practise_area_name'                  => '',
		'practise_area_show_filter'           => 0,
		'practise_area_grid_columns'          => 3,
		'practise_area_grid_columns_tablet'   => 1,
		'practise_area_grid_columns_mobile'   => 1,
		'practise_area_number_post'           => 9,
		'practise_area_order_by'              => 'date',
		'practise_area_order_direction'       => 'DESC',
		'practise_area_exclude'               => '',
		'practise_area_layout'                => 'fullwidth',
		'practise_area_single_layout'         => 'sidebar-right',
		'practise_area_show_post_navigator'   => 0,
		'practise_area_show_related'          => 0,
		'practise_area_related_grid_columns'  => 3,
		'practise_area_sidebar_list'          => 'practise-area-sidebar',
		'practise_area_single_sidebar_list'   => 'practise-area-sidebar',
		'practise_area_featured_title'        => 'Practise Area Details',
		'number_related_post_practise_area'   => 3,
		//Case Study
		'case_study_slug'                     => 'case-study',
		'case_study_name'                     => esc_html__( "Case Study", "lowlead" ),
		'case_study_show_heading'             => 1,
		'case_study_before_heading'           => esc_html__( 'CASES WE SOLVED', 'lowlead' ),
		'case_study_heading'                  => __( 'Recent <mark>Case</mark> Studies', 'lowlead' ),
		'case_study_grid_columns'             => 3,
		'case_study_grid_columns_tablet'      => 1,
		'case_study_grid_columns_mobile'      => 1,
		'case_study_number_post'              => 6,
		'case_study_archive_pagination_style' => 'pager-numeric',
		'case_study_order_by'                 => 'date',
		'case_study_order_direction'          => 'DESC',
		'case_study_exclude'                  => '',
		'case_study_layout'                   => 'fullwidth',
		'case_study_sidebar_list'             => 'case-study-sidebar',
		'case_study_show_post_navigator'      => 0,
		'case_study_show_related'             => 0,
		'case_study_related_grid_columns'     => 3,
		'number_related_post_case_study'      => 3,
		'case_study_featured_title'           => '',
		'case_study_single_layout'            => 'fullwidth',
		'case_study_single_sidebar_list'      => 'case-study-sidebar',
		//Attorneys
		'attorneys_slug'                      => '',
		'attorneys_name'                      => '',
		'attorneys_show_filter'               => 0,
		'attorneys_grid_columns'              => 3,
		'attorneys_grid_columns_tablet'       => 1,
		'attorneys_grid_columns_mobile'       => 1,
		'attorneys_number_post'               => 6,
		'attorneys_archive_pagination_style'  => 'pager-numeric',
		'attorneys_order_by'                  => 'date',
		'attorneys_order_direction'           => 'DESC',
		'attorneys_exclude'                   => '',
		'attorneys_layout'                    => 'fullwidth',
		'attorneys_sidebar_list'              => 'blog-sidebar',
		'attorneys_show_post_navigator'       => 0,
		'attorneys_show_related'              => 0,
		'attorneys_related_grid_columns'      => 3,
		'number_related_post_attorneys'       => 3,
		'attorneys_featured_title'            => esc_html__( 'Attorneys Details', 'lowlead' ),
		'attorneys_single_layout'             => 'fullwidth',
		'attorneys_single_sidebar_list'       => 'blog-sidebar',
		//Gallery
		'gallery_slug'                        => '',
		'gallery_name'                        => '',
		'gallery_show_heading'                => 1,
		'gallery_before_heading'              => esc_html__( 'CASES WE SOLVED', 'lowlead' ),
		'gallery_heading'                     => __( 'Our <mark>Photo</mark> Gallery', 'lowlead' ),
		'gallery_grid_columns'                => 3,
		'gallery_grid_columns_tablet'         => 2,
		'gallery_grid_columns_mobile'         => 1,
		'gallery_number_post'                 => 6,
		'gallery_archive_pagination_style'    => 'pager-numeric',
		'gallery_order_by'                    => 'date',
		'gallery_order_direction'             => 'DESC',
		'gallery_exclude'                     => '',
		'gallery_layout'                      => 'fullwidth',
		'gallery_sidebar_list'                => 'blog-sidebar',

	);

	return $default[ $key ];
}