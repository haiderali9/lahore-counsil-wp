<?php
$wp_customize->add_setting(
	'show_footer_info',
	array(
		'default'           => themesflat_customize_default( 'show_footer_info' ),
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_footer_info',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Info Box ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_info_footer',
			'priority' => 2
		)
	)
);

$wp_customize->add_setting(
	'footer_info_text_address',
	array(
		'default'           => themesflat_customize_default( 'footer_info_text_address' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_text_address',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Text Address', 'lowlead' ),
		'section'         => 'section_info_footer',
		'priority'        => 3,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);
$wp_customize->add_setting(
	'footer_info_address',
	array(
		'default'           => themesflat_customize_default( 'footer_info_address' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_address',
	array(
		'type'            => 'text',
		'section'         => 'section_info_footer',
		'label'           => esc_html__( 'Address', 'lowlead' ),
		'priority'        => 4,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);

$wp_customize->add_setting(
	'footer_info_text_phone',
	array(
		'default'           => themesflat_customize_default( 'footer_info_text_phone' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_text_phone',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Text Phone', 'lowlead' ),
		'section'         => 'section_info_footer',
		'priority'        => 5,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);
$wp_customize->add_setting(
	'footer_info_phone',
	array(
		'default'           => themesflat_customize_default( 'footer_info_phone' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_phone',
	array(
		'type'            => 'text',
		'section'         => 'section_info_footer',
		'label'           => esc_html__( 'Phone', 'lowlead' ),
		'priority'        => 6,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);

$wp_customize->add_setting(
	'footer_info_text_phone',
	array(
		'default'           => themesflat_customize_default( 'footer_info_text_phone' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_text_phone',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Text Phone', 'lowlead' ),
		'section'         => 'section_info_footer',
		'priority'        => 5,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);
$wp_customize->add_setting(
	'footer_info_phone',
	array(
		'default'           => themesflat_customize_default( 'footer_info_phone' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_phone',
	array(
		'type'            => 'text',
		'section'         => 'section_info_footer',
		'label'           => esc_html__( 'Phone', 'lowlead' ),
		'priority'        => 6,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);

$wp_customize->add_setting(
	'footer_info_text_mail',
	array(
		'default'           => themesflat_customize_default( 'footer_info_text_mail' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_text_mail',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Text Mail', 'lowlead' ),
		'section'         => 'section_info_footer',
		'priority'        => 7,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);
$wp_customize->add_setting(
	'footer_info_mail',
	array(
		'default'           => themesflat_customize_default( 'footer_info_mail' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'footer_info_mail',
	array(
		'type'            => 'text',
		'section'         => 'section_info_footer',
		'label'           => esc_html__( 'Mail', 'lowlead' ),
		'priority'        => 8,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
		},
	)
);
$wp_customize->add_setting(
	'footer_info_background',
	array(
		'default'           => themesflat_customize_default( 'footer_info_background' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_info_background',
		array(
			'label'           => esc_html__( 'Backgound Color', 'lowlead' ),
			'section'         => 'section_info_footer',
			'priority'        => 9,
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
			},
		)
	)
);
$wp_customize->add_setting(
	'footer_info_color_icon',
	array(
		'default'           => themesflat_customize_default( 'footer_info_color_icon' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_info_color_icon',
		array(
			'label'           => esc_html__( 'Icon Color', 'lowlead' ),
			'section'         => 'section_info_footer',
			'priority'        => 10,
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
			},
		)
	)
);
$wp_customize->add_setting(
	'footer_info_color_text',
	array(
		'default'           => themesflat_customize_default( 'footer_info_color_text' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_info_color_text',
		array(
			'label'           => esc_html__( 'Text Color', 'lowlead' ),
			'section'         => 'section_info_footer',
			'priority'        => 11,
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'show_footer_info' )->value();
			},
		)
	)
);