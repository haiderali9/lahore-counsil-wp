<?php
//Header Style
$wp_customize->add_setting(
	'style_header',
	array(
		'default'           => themesflat_customize_default( 'style_header' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_RadioImages( $wp_customize,
		'style_header',
		array(
			'type'     => 'radio-images',
			'section'  => 'section_options',
			'priority' => 5,
			'label'    => esc_html__( 'Header Style', 'lowlead' ),
			'choices'  => array(
				'header-default' => array(
					'tooltip' => esc_html__( 'Header Default', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/header-default.jpg'
				),
				'header-01'      => array(
					'tooltip' => esc_html__( 'Header 01', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/header01.jpg'
				),
				'header-02'      => array(
					'tooltip' => esc_html__( 'Header 02', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/header02.jpg'
				),
			),
		) )
);

// Enable Header Absolute
$wp_customize->add_setting(
	'header_absolute',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'header_absolute' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'header_absolute',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Header Absolute ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_options',
			'priority' => 10,
		) )
);

// Enable Header Sticky
$wp_customize->add_setting(
	'header_sticky',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'header_sticky' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'header_sticky',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Header Sticky ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_options',
			'priority' => 15,
		) )
);

// Show search 
$wp_customize->add_setting(
	'header_search_box',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'header_search_box' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'header_search_box',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Search Box ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_options',
			'priority' => 20,
		) )
);

// Show search 
$wp_customize->add_setting(
	'header_sidebar_toggler',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'header_sidebar_toggler' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'header_sidebar_toggler',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Sidebar Toggler ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_options',
			'priority' => 25,
		) )
);

// Show search
$wp_customize->add_setting(
	'header_custom_html_enable',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'header_custom_html_enable' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'header_custom_html_enable',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( ' Custom html ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_options',
			'priority' => 30,
		) )
);

$wp_customize->add_setting(
	'header_custom_html',
	array(
		'default'           => themesflat_customize_default( 'header_custom_html' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'header_custom_html',
	array(
		'label'           => esc_html__( 'Custom HTML', 'lowlead' ),
		'section'         => 'section_options',
		'type'            => 'textarea',
		'priority'        => 35,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'header_custom_html_enable' )->value();
		},

	)
);