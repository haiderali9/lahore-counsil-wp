<?php
// Topbar fonts
$wp_customize->add_setting(
	'typography_topbar',
	array(
		'default'           => themesflat_customize_default( 'typography_topbar' ),
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new themesflat_Typography( $wp_customize,
		'typography_topbar',
		array(
			'label'    => esc_html__( 'Font name/style/sets', 'lowlead' ),
			'section'  => 'section_typo_topbar',
			'type'     => 'typography',
			'fields'   => array( 'family', 'style', 'line_height', 'size', 'letter_spacing' ),
			'priority' => 1
		) )
);


