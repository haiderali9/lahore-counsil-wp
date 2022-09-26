<?php
$wp_customize->add_setting(
	'show_action_box',
	array(
		'default'           => themesflat_customize_default( 'show_action_box' ),
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_action_box',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Action Box ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_action_box',
			'priority' => 1
		)
	)
);

$wp_customize->add_setting(
	'action_box_style',
	array(
		'default'           => themesflat_customize_default( 'action_box_style' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	'action_box_style',
	array(
		'type'            => 'select',
		'section'         => 'section_action_box',
		'priority'        => 2,
		'label'           => esc_html__( 'Styles', 'lowlead' ),
		'choices'         => array(
			'style1' => esc_html__( 'Style 1', 'lowlead' ),
			'style2' => esc_html__( 'Style 2', 'lowlead' ),
		),
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_action_box' )->value();
		},
	)
);

$wp_customize->add_setting(
	'heading_action_box',
	array(
		'default'           => themesflat_customize_default( 'heading_action_box' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'heading_action_box',
	array(
		'type'            => 'textarea',
		'label'           => esc_html__( 'Heading Action Box', 'lowlead' ),
		'section'         => 'section_action_box',
		'priority'        => 3,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_action_box' )->value();
		},
	)
);

$wp_customize->add_setting(
	'text_action_box',
	array(
		'default'           => themesflat_customize_default( 'text_action_box' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'text_action_box',
	array(
		'type'            => 'textarea',
		'label'           => esc_html__( 'Text Action Box', 'lowlead' ),
		'section'         => 'section_action_box',
		'priority'        => 4,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_action_box' )->value() && 'style1' === $wp_customize->get_setting( 'action_box_style' )->value();
		},
	)
);

$wp_customize->add_setting(
	'action_box_content_right',
	array(
		'default'           => themesflat_customize_default( 'action_box_content_right' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'action_box_content_right',
	array(
		'type'            => 'textarea',
		'section'         => 'section_action_box',
		'label'           => esc_html__( 'Content Right', 'lowlead' ),
		'description'     => esc_html__( 'shorcode or button link ex: [mc4wp_form id="237"] or <a href="#" class="themesflat-button">Read More</a>', 'lowlead' ),
		'priority'        => 5,
		'active_callback' => function () use ( $wp_customize ) {
			return 1 === $wp_customize->get_setting( 'show_action_box' )->value();
		},
	)
);

$wp_customize->add_setting(
	'action_box_controls',
	array(
		'default'           => themesflat_customize_default( 'action_box_controls' ),
		'sanitize_callback' => 'themesflat_sanitize_text',
	)
);
$wp_customize->add_control( new themesflat_BoxControls( $wp_customize,
		'action_box_controls',
		array(
			'label'           => esc_html__( 'Box Controls (px)', 'lowlead' ),
			'section'         => 'section_action_box',
			'type'            => 'box-controls',
			'priority'        => 6,
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'show_action_box' )->value();
			},
		) )
);