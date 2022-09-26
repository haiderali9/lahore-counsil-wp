<?php
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header-mobile', array(
		'label'    => esc_html__( 'Header Mobile', 'lowlead' ),
		'section'  => 'section_header_mobile',
		'settings' => 'themesflat_options[info]',
		'priority' => 1
	) )
);

$wp_customize->add_setting(
	'enable_search_box_mobile',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'enable_search_box_mobile' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'enable_search_box_mobile',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Enable Search Box ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_header_mobile',
			'priority' => 3,
			'settings' => 'enable_search_box_mobile',
		) )
);

$wp_customize->add_control( new themesflat_Info( $wp_customize, 'topbar-mobile', array(
		'label'    => esc_html__( 'TopBar', 'lowlead' ),
		'section'  => 'section_header_mobile',
		'settings' => 'themesflat_options[info]',
		'priority' => 10
	) )
);

// Topbar Mobile
$wp_customize->add_setting(
	'enable_topbar_mobile',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'enable_topbar_mobile' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'enable_topbar_mobile',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Enable ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_header_mobile',
			'priority' => 11,
			'settings' => 'enable_topbar_mobile',
		) )
);

$wp_customize->add_setting(
	'menu_topbar_mobile',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'menu_topbar_mobile' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'menu_topbar_mobile',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Menu ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_header_mobile',
			'priority' => 12,
			'settings' => 'menu_topbar_mobile',
		) )
);

$wp_customize->add_setting(
	'social_topbar_mobile',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'social_topbar_mobile' ),
	)
);

$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'social_topbar_mobile',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Social ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_header_mobile',
			'priority' => 13,
			'settings' => 'social_topbar_mobile',
		) )
);



