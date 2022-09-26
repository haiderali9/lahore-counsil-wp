<?php
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => themesflat_customize_default( 'primary_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => esc_html__( 'Primary Color', 'lowlead' ),
			'section'  => 'color_general',
			'settings' => 'primary_color',
			'priority' => 3
		)
	)
);

$wp_customize->add_setting(
	'secondary_color',
	array(
		'default'           => themesflat_customize_default( 'secondary_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'secondary_color',
		array(
			'label'    => esc_html__( 'Secondary Color', 'lowlead' ),
			'section'  => 'color_general',
			'settings' => 'secondary_color',
			'priority' => 4
		)
	)
);

$wp_customize->add_setting(
	'accent_color',
	array(
		'default'           => themesflat_customize_default( 'accent_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'accent_color',
		array(
			'label'    => esc_html__( 'Accent Color', 'lowlead' ),
			'section'  => 'color_general',
			'settings' => 'accent_color',
			'priority' => 5
		)
	)
);