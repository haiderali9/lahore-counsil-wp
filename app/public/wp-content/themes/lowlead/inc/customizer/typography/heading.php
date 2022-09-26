<?php
$wp_customize->add_setting(
	'typography_headings',
	array(
		'default'           => themesflat_customize_default( 'typography_headings' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_headings',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_heading',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'line_height', 'letter_spacing' ),
			'priority' => 1
		) )
);

// H1 size
$wp_customize->add_setting(
	'h1_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => themesflat_customize_default( 'h1_size' ),
	)
);
$wp_customize->add_control( 'h1_size', array(
	'type'        => 'number',
	'priority'    => 2,
	'section'     => 'section_typo_heading',
	'label'       => esc_html__( 'H1 font size (px)', 'lowlead' ),
	'input_attrs' => array(
		'min'   => 10,
		'max'   => 60,
		'step'  => 1,
		'style' => 'margin-bottom: 15px; padding: 10px;',
	),
) );

// H2 size
$wp_customize->add_setting(
	'h2_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => themesflat_customize_default( 'h2_size' ),
	)
);
$wp_customize->add_control( 'h2_size', array(
	'type'        => 'number',
	'priority'    => 3,
	'section'     => 'section_typo_heading',
	'label'       => esc_html__( 'H2 font size (px)', 'lowlead' ),
	'input_attrs' => array(
		'min'   => 10,
		'max'   => 60,
		'step'  => 1,
		'style' => 'margin-bottom: 15px; padding: 10px;',
	),
) );

// H3 size
$wp_customize->add_setting(
	'h3_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => themesflat_customize_default( 'h3_size' ),
	)
);
$wp_customize->add_control( 'h3_size', array(
	'type'        => 'number',
	'priority'    => 4,
	'section'     => 'section_typo_heading',
	'label'       => esc_html__( 'H3 font size (px)', 'lowlead' ),
	'input_attrs' => array(
		'min'   => 10,
		'max'   => 60,
		'step'  => 1,
		'style' => 'margin-bottom: 15px; padding: 10px;',
	),
) );

// H4 size
$wp_customize->add_setting(
	'h4_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => themesflat_customize_default( 'h4_size' ),
	)
);
$wp_customize->add_control( 'h4_size', array(
	'type'        => 'number',
	'priority'    => 5,
	'section'     => 'section_typo_heading',
	'label'       => esc_html__( 'H4 font size (px)', 'lowlead' ),
	'input_attrs' => array(
		'min'   => 10,
		'max'   => 60,
		'step'  => 1,
		'style' => 'margin-bottom: 15px; padding: 10px;',
	),
) );

// H5 size
$wp_customize->add_setting(
	'h5_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => themesflat_customize_default( 'h5_size' ),
	)
);
$wp_customize->add_control( 'h5_size', array(
	'type'        => 'number',
	'priority'    => 6,
	'section'     => 'section_typo_heading',
	'label'       => esc_html__( 'H5 font size (px)', 'lowlead' ),
	'input_attrs' => array(
		'min'   => 10,
		'max'   => 60,
		'step'  => 1,
		'style' => 'margin-bottom: 15px; padding: 10px;',
	),
) );

// H6 size
$wp_customize->add_setting(
	'h6_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => themesflat_customize_default( 'h6_size' ),
	)
);
$wp_customize->add_control( 'h6_size', array(
	'type'        => 'number',
	'priority'    => 7,
	'section'     => 'section_typo_heading',
	'label'       => esc_html__( 'H6 font size (px)', 'lowlead' ),
	'input_attrs' => array(
		'min'   => 10,
		'max'   => 60,
		'step'  => 1,
		'style' => 'margin-bottom: 15px; padding: 10px;',
	),
) );