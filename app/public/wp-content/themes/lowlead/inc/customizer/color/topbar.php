<?php
$wp_customize->add_setting( 'themesflat_options[info]', array(
		'type'              => 'info_control',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'color_topbar_desktop', array(
		'label'    => esc_html__( 'Desktop', 'lowlead' ),
		'section'  => 'color_topbar',
		'settings' => 'themesflat_options[info]',
		'priority' => 1
	) )
);

// Top bar Background
$wp_customize->add_setting(
	'topbar_background_color',
	array(
		'default'           => themesflat_customize_default( 'topbar_background_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_background_color',
		array(
			'label'    => esc_html__( 'Background', 'lowlead' ),
			'section'  => 'color_topbar',
			'priority' => 2
		)
	)
);

// Top bar text color
$wp_customize->add_setting(
	'topbar_textcolor',
	array(
		'default'           => themesflat_customize_default( 'topbar_textcolor' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_textcolor',
		array(
			'label'    => esc_html__( 'Text Color', 'lowlead' ),
			'section'  => 'color_topbar',
			'settings' => 'topbar_textcolor',
			'priority' => 3
		)
	)
);

// Topbar Link Color Hover
$wp_customize->add_setting(
	'topbar_link_color',
	array(
		'default'           => themesflat_customize_default( 'topbar_link_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_link_color',
		array(
			'label'    => esc_html__( 'Link Color', 'lowlead' ),
			'section'  => 'color_topbar',
			'settings' => 'topbar_link_color',
			'priority' => 4
		)
	)
);

// Topbar Link Color Hover
$wp_customize->add_setting(
	'topbar_link_color_hover',
	array(
		'default'           => themesflat_customize_default( 'topbar_link_color_hover' ),
		'sanitize_callback' => 'esc_attr',
		'priority'          => 5
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_link_color_hover',
		array(
			'label'    => esc_html__( 'Link Color Hover', 'lowlead' ),
			'section'  => 'color_topbar',
			'settings' => 'topbar_link_color_hover',
			'priority' => 6
		)
	)
);

//Mobile
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'color_topbar_mobile', array(
		'label'    => esc_html__( 'Mobile', 'lowlead' ),
		'section'  => 'color_topbar',
		'settings' => 'themesflat_options[info]',
		'priority' => 10
	) )
);

$wp_customize->add_setting(
	'topbar_mobile_background_color',
	array(
		'default'           => themesflat_customize_default( 'topbar_mobile_background_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_mobile_background_color',
		array(
			'label'    => esc_html__( 'Background', 'lowlead' ),
			'section'  => 'color_topbar',
			'priority' => 13
		)
	)
);

$wp_customize->add_setting(
	'topbar_mobile_textcolor',
	array(
		'default'           => themesflat_customize_default( 'topbar_mobile_textcolor' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_mobile_textcolor',
		array(
			'label'    => esc_html__( 'Text Color', 'lowlead' ),
			'section'  => 'color_topbar',
			'settings' => 'topbar_mobile_textcolor',
			'priority' => 14
		)
	)
);

// Topbar Link Color Hover
$wp_customize->add_setting(
	'topbar_mobile_link_color',
	array(
		'default'           => themesflat_customize_default( 'topbar_mobile_link_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_mobile_link_color',
		array(
			'label'    => esc_html__( 'Link Color', 'lowlead' ),
			'section'  => 'color_topbar',
			'settings' => 'topbar_mobile_link_color',
			'priority' => 15
		)
	)
);

// Topbar Link Color Hover
$wp_customize->add_setting(
	'topbar_mobile_link_color_hover',
	array(
		'default'           => themesflat_customize_default( 'topbar_mobile_link_color_hover' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'topbar_mobile_link_color_hover',
		array(
			'label'    => esc_html__( 'Link Color Hover', 'lowlead' ),
			'section'  => 'color_topbar',
			'settings' => 'topbar_mobile_link_color_hover',
			'priority' => 16
		)
	)
);