<?php
// Show Bottom
$wp_customize->add_setting(
	'show_bottom',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'show_bottom' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_bottom',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Bottom ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_bottom',
			'priority' => 1
		) )
);

// Show Bottom
$wp_customize->add_setting(
	'show_divider',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'show_divider' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_divider',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Divider ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_bottom',
			'priority' => 2
		) )
);

$wp_customize->add_setting(
	'bottom_style',
	array(
		'default'           => themesflat_customize_default( 'bottom_style' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	'bottom_style',
	array(
		'type'            => 'select',
		'section'         => 'section_bottom',
		'priority'        => 3,
		'label'           => esc_html__( 'Styles', 'lowlead' ),
		'choices'         => array(
			'bottom-style1' => esc_html__( 'Style 1', 'lowlead' ),
			'bottom-style2' => esc_html__( 'Style 2', 'lowlead' ),
			'bottom-style3' => esc_html__( 'Style 3', 'lowlead' ),
		),
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_bottom' )->value();
		},
	)
);

$wp_customize->add_setting(
	'bottom_logo',
	array(
		'default'           => themesflat_customize_default( 'bottom_logo' ),
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'bottom_logo',
		array(
			'label'           => esc_html__( 'Upload Your Logo', 'lowlead' ),
			'type'            => 'image',
			'section'         => 'section_bottom',
			'priority'        => 4,
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'show_bottom' )->value();
			},
		)
	)
);

// Footer Copyright
$wp_customize->add_setting(
	'footer_copyright',
	array(
		'default'           => themesflat_customize_default( 'footer_copyright' ),
		'sanitize_callback' => 'themesflat_sanitize_text',
	)
);
$wp_customize->add_control(
	'footer_copyright',
	array(
		'label'           => esc_html__( 'Copyright', 'lowlead' ),
		'section'         => 'section_bottom',
		'type'            => 'textarea',
		'priority'        => 5,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_bottom' )->value();
		},
	)
);