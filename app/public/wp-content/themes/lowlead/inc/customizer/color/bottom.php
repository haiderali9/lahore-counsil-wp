<?php
// Bottom background color    
$wp_customize->add_setting(
	'bottom_background_color',
	array(
		'default'           => themesflat_customize_default( 'bottom_background_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'bottom_background_color',
		array(
			'label'    => esc_html__( 'Backgound Color', 'lowlead' ),
			'section'  => 'color_bottom',
			'settings' => 'bottom_background_color',
			'priority' => 17
		)
	)
);