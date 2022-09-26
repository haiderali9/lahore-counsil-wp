<?php
// Enable Smooth Scroll
$wp_customize->add_setting(
	'enable_smooth_scroll',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'enable_smooth_scroll' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'enable_smooth_scroll',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Smooth Scroll ( OFF | ON )', 'lowlead' ),
			'section'  => 'general_panel',
			'priority' => 1,
		) )
);

// Enable Preload
$wp_customize->add_setting(
	'enable_preload',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'enable_preload' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'enable_preload',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Preload ( OFF | ON )', 'lowlead' ),
			'section'  => 'general_panel',
			'priority' => 2,
		) )
);

// Preload
$wp_customize->add_setting(
	'preload',
	array(
		'default'           => themesflat_customize_default( 'preload' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_RadioImages( $wp_customize,
		'preload',
		array(
			'type'     => 'radio-images',
			'section'  => 'general_panel',
			'priority' => 3,
			'label'    => esc_html__( 'Preload', 'lowlead' ),
			'choices'  => array(
				'preload-1' => array(
					'tooltip' => esc_html__( 'Circle Loaders 1', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-1.png'
				),
				'preload-2' => array(
					'tooltip' => esc_html__( 'Circle Loaders 2', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-2.png'
				),
				'preload-3' => array(
					'tooltip' => esc_html__( 'Circle Loaders 3', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-3.png'
				),
				'preload-4' => array(
					'tooltip' => esc_html__( 'Circle Loaders 4', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-4.png'
				),
				'preload-5' => array(
					'tooltip' => esc_html__( 'Spinner Loaders', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-5.png'
				),
				'preload-6' => array(
					'tooltip' => esc_html__( 'Pulse Loaders', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-6.png'
				),
				'preload-7' => array(
					'tooltip' => esc_html__( 'Square Loaders', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-7.png'
				),
				'preload-8' => array(
					'tooltip' => esc_html__( 'Line Loaders', 'lowlead' ),
					'src'     => THEMESFLAT_LINK . 'images/controls/preload-8.png'
				),
			),
		) )
);

//Socials
$wp_customize->add_setting(
	'social_links',
	array(
		'sanitize_callback' => 'esc_attr',
		'default'           => themesflat_customize_default( 'social_links' ),
	)
);
$wp_customize->add_control( new themesflat_SocialIcons( $wp_customize,
		'social_links',
		array(
			'type'     => 'social-icons',
			'section'  => 'general_panel',
			'priority' => 4,
		) )
);

// Social Share
$wp_customize->add_setting(
	'show_social_share',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'show_social_share' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'show_social_share',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Social Share  ( OFF | ON )', 'lowlead' ),
			'description' => esc_html__( 'Social share only visible on detail pages', 'lowlead' ),
			'section'     => 'general_panel',
			'priority'    => 6,
		) )
);

// Go To Button
$wp_customize->add_setting(
	'go_top',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'go_top' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'go_top',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Go To Button ( OFF | ON )', 'lowlead' ),
			'section'  => 'general_panel',
			'priority' => 8,
		) )
);

