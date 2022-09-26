<?php
// Breadcrumb
$wp_customize->add_setting(
	'breadcrumb_type',
	array(
		'default'           => themesflat_customize_default( 'breadcrumb_type' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	'breadcrumb_type',
	array(
		'type'     => 'select',
		'section'  => 'section_breadcrumb',
		'priority' => 1,
		'label'    => esc_html__( 'Select Breadcrumb Type', 'lowlead' ),
		'choices'  => array(
			''              => esc_html__( 'Turn Off', 'lowlead' ),
			'breadcrumb-01' => esc_html__( 'Breadcrumb 01', 'lowlead' ),
			'breadcrumb-02' => esc_html__( 'Breadcrumb 02', 'lowlead' ),
		)
	)
);

$wp_customize->add_setting(
	'bread_crumb_prefix',
	array(
		'default'           => themesflat_customize_default( 'bread_crumb_prefix' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'bread_crumb_prefix',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Breadcrumb Prefix', 'lowlead' ),
		'section'         => 'section_breadcrumb',
		'priority'        => 2,
		'active_callback' => function () use ( $wp_customize ) {
			return 'breadcrumb-01' === $wp_customize->get_setting( 'breadcrumb_type' )->value();
		},
	)
);

$wp_customize->add_setting(
	'breadcrumb_separator',
	array(
		'default'           => themesflat_customize_default( 'breadcrumb_separator' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'breadcrumb_separator',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Breadcrumb Separator', 'lowlead' ),
		'section'         => 'section_breadcrumb',
		'priority'        => 3,
		'active_callback' => function () use ( $wp_customize ) {
			return 'breadcrumb-01' === $wp_customize->get_setting( 'breadcrumb_type' )->value();
		},
	)
);