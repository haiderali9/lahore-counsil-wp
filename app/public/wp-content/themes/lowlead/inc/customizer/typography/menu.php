<?php
// Menu fonts
$wp_customize->add_setting( 'themesflat_options[info]', array(
		'type'              => 'info_control',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'menu_fonts', array(
		'label'    => esc_html__( 'Menu', 'lowlead' ),
		'section'  => 'section_typo_menu',
		'settings' => 'themesflat_options[info]',
		'priority' => 1
	) )
);

$wp_customize->add_setting(
	'typography_menu',
	array(
		'default'           => themesflat_customize_default( 'typography_menu' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_menu',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_menu',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'line_height', 'size', 'letter_spacing' ),
			'priority' => 2
		) )
);

// Sub Menu fonts
$wp_customize->add_setting( 'themesflat_options[info]', array(
		'type'              => 'info_control',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'sub_menu_fonts', array(
		'label'    => esc_html__( 'Sub Menu', 'lowlead' ),
		'section'  => 'section_typo_menu',
		'settings' => 'themesflat_options[info]',
		'priority' => 20
	) )
);

$wp_customize->add_setting(
	'typography_sub_menu',
	array(
		'default'           => themesflat_customize_default( 'typography_sub_menu' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_sub_menu',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_menu',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'line_height', 'size', 'letter_spacing' ),
			'priority' => 21
		) )
);
