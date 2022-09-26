<?php
//Action box Background
$wp_customize->add_setting(
	'action_box_background_image',
	array(
		'default'           => themesflat_customize_default( 'action_box_background_image' ),
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'action_box_background_image',
		array(
			'label'    => esc_html__( 'Upload Your Background Image', 'lowlead' ),
			'type'     => 'image',
			'section'  => 'color_action_box',
			'priority' => 12,
		)
	)
);

// Action Box background color    
$wp_customize->add_setting(
	'action_box_background_color',
	array(
		'default'           => themesflat_customize_default( 'action_box_background_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'action_box_background_color',
		array(
			'label'    => esc_html__( 'Action Box Backgound', 'lowlead' ),
			'section'  => 'color_action_box',
			'settings' => 'action_box_background_color',
			'priority' => 12
		)
	)
);

// Action Box Heading color    
$wp_customize->add_setting(
	'action_box_heading_color',
	array(
		'default'           => themesflat_customize_default( 'action_box_heading_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'action_box_heading_color',
		array(
			'label'    => esc_html__( 'Action Box Heading Color', 'lowlead' ),
			'section'  => 'color_action_box',
			'settings' => 'action_box_heading_color',
			'priority' => 12
		)
	)
);

// Action Box Text color    
$wp_customize->add_setting(
	'action_box_text_color',
	array(
		'default'           => themesflat_customize_default( 'action_box_text_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'action_box_text_color',
		array(
			'label'    => esc_html__( 'Action Box Text Color', 'lowlead' ),
			'section'  => 'color_action_box',
			'settings' => 'action_box_text_color',
			'priority' => 12
		)
	)
);

// Action Box Button Text Color    
$wp_customize->add_setting(
	'action_box_button_text_color',
	array(
		'default'           => themesflat_customize_default( 'action_box_button_text_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'action_box_button_text_color',
		array(
			'label'    => esc_html__( 'Action Box Button Text Color', 'lowlead' ),
			'section'  => 'color_action_box',
			'settings' => 'action_box_button_text_color',
			'priority' => 12
		)
	)
);

// Action Box Button Background Color    
$wp_customize->add_setting(
	'action_box_button_background_color',
	array(
		'default'           => themesflat_customize_default( 'action_box_button_background_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'action_box_button_background_color',
		array(
			'label'    => esc_html__( 'Action Box Button Background Color', 'lowlead' ),
			'section'  => 'color_action_box',
			'settings' => 'action_box_button_background_color',
			'priority' => 12
		)
	)
);