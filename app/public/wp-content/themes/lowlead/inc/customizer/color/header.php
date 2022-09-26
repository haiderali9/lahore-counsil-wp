<?php
// Header
$wp_customize->add_setting( 'themesflat_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'label_header_color', array(
        'label'    => esc_html__( 'Header', 'lowlead' ),
        'section'  => 'color_header',
        'settings' => 'themesflat_options[info]',
        'priority' => 1
    ) )
);

$wp_customize->add_setting(
    'header_backgroundcolor',
    array(
        'default'           => themesflat_customize_default( 'header_backgroundcolor' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'header_backgroundcolor',
        array(
            'label'       => esc_html__( 'Header Background', 'lowlead' ),
            'description' => esc_html__( ' Opacity =1 for Background Color', 'lowlead' ),
            'section'     => 'color_header',
            'priority'    => 5
        )
    )
);

// Color Navigation
$wp_customize->add_setting(
    'header_color_main_nav',
    array(
        'default'           => themesflat_customize_default( 'header_color_main_nav' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'header_color_main_nav',
        array(
            'label'    => esc_html__( 'Color Navigation', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 10
        )
    )
);

$wp_customize->add_setting(
    'header_color_hover_main_nav',
    array(
        'default'           => themesflat_customize_default( 'header_color_hover_main_nav' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'header_color_hover_main_nav',
        array(
            'label'    => esc_html__( 'Color Hover Navigation', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 15
        )
    )
);

$wp_customize->add_control( new themesflat_Info( $wp_customize, 'label_header_color_sticky', array(
        'label'    => esc_html__( 'Header Sticky', 'lowlead' ),
        'section'  => 'color_header',
        'settings' => 'themesflat_options[info]',
        'priority' => 30
    ) )
);

// Header Background sticky
$wp_customize->add_setting(
	'header_backgroundcolor_sticky',
	array(
		'default'           => themesflat_customize_default( 'header_backgroundcolor_sticky' ),
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control( new themesflat_ColorOverlay(
		$wp_customize,
		'header_backgroundcolor_sticky',
		array(
			'label'    => esc_html__( 'Header Background', 'lowlead' ),
			'section'  => 'color_header',
			'priority' => 35
		)
	)
);

$wp_customize->add_setting(
    'header_sticky_color_main_nav',
    array(
        'default'           => themesflat_customize_default( 'header_sticky_color_main_nav' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'header_sticky_color_main_nav',
        array(
            'label'    => esc_html__( 'Color Navigation', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 40
        )
    )
);

$wp_customize->add_setting(
    'header_sticky_color_hover_main_nav',
    array(
        'default'           => themesflat_customize_default( 'header_sticky_color_hover_main_nav' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'header_sticky_color_hover_main_nav',
        array(
            'label'    => esc_html__( 'Color Hover Navigation', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 45
        )
    )
);

$wp_customize->add_control( new themesflat_Info( $wp_customize, 'label_header_color_submenu', array(
        'label'    => esc_html__( 'Sub Menu', 'lowlead' ),
        'section'  => 'color_header',
        'settings' => 'themesflat_options[info]',
        'priority' => 50
    ) )
);

// Sub menu a color
$wp_customize->add_setting(
    'sub_nav_color',
    array(
        'default'           => themesflat_customize_default( 'sub_nav_color' ),
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'sub_nav_color',
        array(
            'label'    => esc_html__( 'Regular', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 55
        )
    )
);

// Sub nav background hover
$wp_customize->add_setting(
    'sub_nav_color_hover',
    array(
        'default'           => themesflat_customize_default( 'sub_nav_color_hover' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'sub_nav_color_hover',
        array(
            'label'    => esc_html__( 'Hover & Active', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 56
        )
    )
);

// Sub nav background
$wp_customize->add_setting(
    'sub_nav_background',
    array(
        'default'           => themesflat_customize_default( 'sub_nav_background' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'sub_nav_background',
        array(
            'label'    => esc_html__( 'Background', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 57
        )
    )
);


// Sub nav line color between link
$wp_customize->add_setting(
    'sub_nav_border_color',
    array(
        'default'           => themesflat_customize_default( 'sub_nav_border_color' ),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'sub_nav_border_color',
        array(
            'label'    => esc_html__( 'Border Line', 'lowlead' ),
            'section'  => 'color_header',
            'priority' => 59
        )
    )
);