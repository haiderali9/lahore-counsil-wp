<?php
// Sidebar Widget Title Font
$wp_customize->add_setting(
	'typography_sidebar_widget_title',
	array(
		'default'           => themesflat_customize_default( 'typography_sidebar_widget_title' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_sidebar_widget_title',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_sidebar_widget_title',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'size', 'line_height', 'letter_spacing' ),
			'priority' => 1
		) )
);