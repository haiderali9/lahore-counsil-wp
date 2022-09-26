<?php
// Customize Blog Featured Title
$wp_customize->add_setting(
	'blog_featured_title',
	array(
		'default'           => themesflat_customize_default( 'blog_featured_title' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'blog_featured_title',
	array(
		'type'     => 'text',
		'label'    => esc_html__( 'Customize Blog Featured Title', 'lowlead' ),
		'section'  => 'section_content_blog_single',
		'priority' => 1
	)
);

$wp_customize->add_setting(
	'single_sidebar_layout',
	array(
		'default'           => themesflat_customize_default( 'single_sidebar_layout' ),
		'sanitize_callback' => 'esc_attr',
	)
);

$wp_customize->add_control(
	'single_sidebar_layout',
	array(
		'type'     => 'select',
		'section'  => 'section_content_blog_single',
		'priority' => 2,
		'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
		'choices'  => array(
			'sidebar-right'    => esc_html__( 'Sidebar Right', 'lowlead' ),
			'sidebar-left'     => esc_html__( 'Sidebar Left', 'lowlead' ),
			'fullwidth'        => esc_html__( 'Full Width', 'lowlead' ),
			'fullwidth-small'  => esc_html__( 'Full Width Small', 'lowlead' ),
			'fullwidth-center' => esc_html__( 'Full Width Center', 'lowlead' ),
		),
	)
);

$wp_customize->add_setting(
	'blog_single_sidebar_list',
	array(
		'default'           => themesflat_customize_default( 'blog_single_sidebar_list' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
		'blog_single_sidebar_list',
		array(
			'type'            => 'dropdown',
			'section'         => 'section_content_blog_single',
			'priority'        => 3,
			'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
			'active_callback' => function () use ( $wp_customize ) {
				return 'sidebar-left' === $wp_customize->get_setting( 'single_sidebar_layout' )->value() || 'sidebar-right' === $wp_customize->get_setting( 'single_sidebar_layout' )->value();
			},
		) )
);

// Show Post Navigator
$wp_customize->add_setting(
	'show_post_navigator',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'show_post_navigator' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_post_navigator',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Post Navigator ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_content_blog_single',
			'priority' => 4
		) )
);

// Enable Entry Footer Content
$wp_customize->add_setting(
	'show_entry_footer_content',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'show_entry_footer_content' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_entry_footer_content',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Entry Footer ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_content_blog_single',
			'priority' => 5,
		) )
);

// Show Related Posts
$wp_customize->add_setting(
	'show_related_post',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => 0,
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_related_post',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Related Posts ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_content_blog_single',
			'priority' => 6
		) )
);

//Related Posts Style
$wp_customize->add_setting(
	'related_post_style',
	array(
		'default'           => themesflat_customize_default( 'related_post_style' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	'related_post_style',
	array(
		'type'            => 'select',
		'section'         => 'section_content_blog_single',
		'priority'        => 7,
		'label'           => esc_html__( 'Related Posts Style', 'lowlead' ),
		'choices'         => array(
			'blog-list' => esc_html__( 'Blog List', 'lowlead' ),
			'blog-grid' => esc_html__( 'Blog Grid', 'lowlead' ),
		),
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_related_post' )->value();
		},
	)
);

// Gird columns Related Posts
$wp_customize->add_setting(
	'grid_columns_post_related',
	array(
		'default'           => themesflat_customize_default( 'grid_columns_post_related' ),
		'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
	)
);
$wp_customize->add_control(
	'grid_columns_post_related',
	array(
		'type'            => 'select',
		'section'         => 'section_content_blog_single',
		'priority'        => 8,
		'label'           => esc_html__( 'Columns Of Related Posts', 'lowlead' ),
		'choices'         => array(
			2 => esc_html__( '2 Columns', 'lowlead' ),
			3 => esc_html__( '3 Columns', 'lowlead' ),
			4 => esc_html__( '4 Columns', 'lowlead' ),
		),
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_related_post' )->value();
		},
	)
);

// Number Of Related Posts
$wp_customize->add_setting(
	'number_related_post',
	array(
		'default'           => themesflat_customize_default( 'number_related_post' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'number_related_post',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Number Of Related Posts', 'lowlead' ),
		'section'         => 'section_content_blog_single',
		'priority'        => 9,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_related_post' )->value();
		},
	)
);