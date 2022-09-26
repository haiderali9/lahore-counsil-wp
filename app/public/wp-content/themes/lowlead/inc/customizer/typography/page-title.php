<?php
$wp_customize->add_setting( 'themesflat_options[info]', array(
		'type'              => 'info_control',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-page-title', array(
		'label'    => esc_html__( 'Page Title', 'lowlead' ),
		'section'  => 'section_typo_page_title',
		'settings' => 'themesflat_options[info]',
		'priority' => 1
	) )
);

// Page Title Font
$wp_customize->add_setting(
	'typography_page_title',
	array(
		'default'           => themesflat_customize_default( 'typography_page_title' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_page_title',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_page_title',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 2
		) )
);

// Page Title Color
$wp_customize->add_setting(
	'page_title_text_color',
	array(
		'default'           => themesflat_customize_default( 'page_title_text_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'page_title_text_color',
		array(
			'label'    => esc_html__( 'Heading Text Color', 'lowlead' ),
			'section'  => 'section_typo_page_title',
			'priority' => 6
		)
	)
);

// Mobile
$wp_customize->add_setting( 'themesflat_options[info]', array(
		'type'              => 'info_control',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography_page_title_mobile', array(
		'label'    => esc_html__( 'Mobile', 'lowlead' ),
		'section'  => 'section_typo_page_title',
		'settings' => 'themesflat_options[info]',
		'priority' => 10
	) )
);

// Page Title Font
$wp_customize->add_setting(
	'typography_page_title_mobile',
	array(
		'default'           => themesflat_customize_default( 'typography_page_title_mobile' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_page_title_mobile',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_page_title',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 11
		) )
);

// Breadcrumb Font
$wp_customize->add_setting( 'themesflat_options[info]', array(
		'type'              => 'info_control',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-breadcrumb', array(
		'label'    => esc_html__( 'Breadcrumb', 'lowlead' ),
		'section'  => 'section_typo_page_title',
		'settings' => 'themesflat_options[info]',
		'priority' => 20
	) )
);

$wp_customize->add_setting(
	'typography_breadcrumb',
	array(
		'default'           => themesflat_customize_default( 'typography_breadcrumb' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_breadcrumb',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_page_title',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 21
		) )
);

// Breadcrumb
$wp_customize->add_setting(
	'breadcrumb_color',
	array(
		'default'           => themesflat_customize_default( 'breadcrumb_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'breadcrumb_color',
		array(
			'label'    => esc_html__( 'Text Color', 'lowlead' ),
			'section'  => 'section_typo_page_title',
			'priority' => 22
		)
	)
);
