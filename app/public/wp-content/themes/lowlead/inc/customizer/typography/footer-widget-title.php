<?php
// Footer Widget Title Font
$wp_customize->add_setting(
	'typography_footer_widget_title',
	array(
		'default'           => themesflat_customize_default( 'typography_footer_widget_title' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_footer_widget_title',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_footer_widget_title',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 1
		) )
);

// Footer text title color
$wp_customize->add_setting(
	'footer_title_widget_color',
	array(
		'default'           => themesflat_customize_default( 'footer_title_widget_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_title_widget_color',
		array(
			'label'    => esc_html__( 'Title Widget Color', 'lowlead' ),
			'section'  => 'section_typo_footer_widget_title',
			'settings' => 'footer_title_widget_color',
			'priority' => 2
		)
	)
); 