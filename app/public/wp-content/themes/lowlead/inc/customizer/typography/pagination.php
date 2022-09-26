<?php
// Buttons Font
$wp_customize->add_setting(
	'typography_pagination',
	array(
		'default'           => themesflat_customize_default( 'typography_pagination' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_pagination',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_pagination',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 1
		) )
);