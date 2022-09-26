<?php
// Top bar
$wp_customize->add_setting(
    'topbar_enabled',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default'           => themesflat_customize_default( 'topbar_enabled' ),
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'topbar_enabled',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Enable Topbar ( OFF | ON )', 'lowlead' ),
            'section'  => 'section_topbar',
            'priority' => 5,
            'settings' => 'topbar_enabled',
        ) )
);

$wp_customize->add_setting(
	'social_topbar',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'social_topbar' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'social_topbar',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Social ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_topbar',
			'priority' => 10,
			'settings' => 'social_topbar',
		) )
);

// Info Topbar
$wp_customize->add_setting(
	'infoLeft_topbar_enabled',
	array(
		'sanitize_callback' => 'themesflat_sanitize_checkbox',
		'default'           => themesflat_customize_default( 'infoLeft_topbar_enabled' ),
	)
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
		'infoLeft_topbar_enabled',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Info Left ( OFF | ON )', 'lowlead' ),
			'section'  => 'section_topbar',
			'priority' => 15,
			'settings' => 'infoLeft_topbar_enabled',
		) )
);

$wp_customize->add_setting(
    'infoLeft_topbar',
    array(
        'default'           => themesflat_customize_default( 'infoLeft_topbar' ),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'infoLeft_topbar',
    array(
        'type'            => 'text',
        'label'           => esc_html__( 'Enter info Left Topbar', 'lowlead' ),
        'section'         => 'section_topbar',
        'priority'        => 20,
        'active_callback' => function () use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'infoLeft_topbar_enabled' )->value();
        },
    )
);


$wp_customize->add_setting(
    'infoRight_topbar_enabled',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default'           => themesflat_customize_default( 'infoRight_topbar_enabled' ),
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'infoRight_topbar_enabled',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Info Right ( OFF | ON )', 'lowlead' ),
            'section'  => 'section_topbar',
            'priority' => 25,
            'settings' => 'infoRight_topbar_enabled',
        ) )
);

$wp_customize->add_setting(
    'infoRight_topbar',
    array(
        'default'           => themesflat_customize_default( 'infoRight_topbar' ),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'infoRight_topbar',
    array(
        'type'            => 'text',
        'label'           => esc_html__( 'Enter info Right  Topbar', 'lowlead' ),
        'section'         => 'section_topbar',
        'priority'        => 30,
        'active_callback' => function () use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'infoRight_topbar_enabled' )->value();
        },
    )
);

// Topbar Box control
$wp_customize->add_setting(
	'topbar_controls',
	array(
		'default'           => themesflat_customize_default( 'topbar_controls' ),
		'sanitize_callback' => 'themesflat_sanitize_text',
	)
);
$wp_customize->add_control( new themesflat_BoxControls( $wp_customize,
		'topbar_controls',
		array(
			'label'    => esc_html__( 'Box Controls (px)', 'lowlead' ),
			'section'  => 'section_topbar',
			'type'     => 'box-controls',
			'priority' => 35,

		) )
);