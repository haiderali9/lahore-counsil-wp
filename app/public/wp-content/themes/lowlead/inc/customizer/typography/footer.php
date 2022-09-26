<?php
// Footer
$wp_customize->add_setting(
	'typography_footer',
	array(
		'default'           => themesflat_customize_default( 'typography_footer' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_footer',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_footer',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 1
		) )
);

// Footer text color
$wp_customize->add_setting(
	'footer_text_color',
	array(
		'default'           => themesflat_customize_default( 'footer_text_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_text_color',
		array(
			'label'    => esc_html__( 'Color', 'lowlead' ),
			'section'  => 'section_typo_footer',
			'settings' => 'footer_text_color',
			'priority' => 14
		)
	)
);

// Footer text color Hover
$wp_customize->add_setting(
	'footer_text_color_hover',
	array(
		'default'           => themesflat_customize_default( 'footer_text_color_hover' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_text_color_hover',
		array(
			'label'    => esc_html__( 'Color Hover', 'lowlead' ),
			'section'  => 'section_typo_footer',
			'settings' => 'footer_text_color_hover',
			'priority' => 15
		)
	)
);