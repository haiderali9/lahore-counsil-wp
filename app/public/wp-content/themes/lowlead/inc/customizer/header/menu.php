<?php
$wp_customize->add_setting(
	'menu_distance_between',
	array(
		'default'           => themesflat_customize_default( 'menu_distance_between' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_Slide_Control( $wp_customize,
		'menu_distance_between',
		array(
			'type'        => 'slide-control',
			'section'     => 'section_menu',
			'label'       => 'Distance Between (px)',
			'priority'    => 1,
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)

	)
);