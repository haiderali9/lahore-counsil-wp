<?php
// Footer background color    
$wp_customize->add_setting(
	'footer_background_color',
	array(
		'default'           => themesflat_customize_default( 'footer_background_color' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new themesflat_ColorOverlay(
		$wp_customize,
		'footer_background_color',
		array(
			'label'    => esc_html__( 'Backgound Color', 'lowlead' ),
			'section'  => 'color_footer',
			'settings' => 'footer_background_color',
			'priority' => 1
		)
	)
);

//Page Title Background
$wp_customize->add_setting(
	'footer_background_image',
	array(
		'default'           => themesflat_customize_default( 'footer_background_image' ),
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'footer_background_image',
		array(
			'label'    => esc_html__( 'Upload Background Image', 'lowlead' ),
			'type'     => 'image',
			'section'  => 'color_footer',
			'priority' => 2,
		)
	)
);
