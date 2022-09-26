<?php

// Email
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_info_label_email', array(
		'label'    => esc_html__( 'Email', 'lowlead' ),
		'section'  => 'section_info',
		'settings' => 'themesflat_options[info]',
		'priority' => 5
	) )
);

$wp_customize->add_setting(
	'header_info_email_label',
	array(
		'default'           => themesflat_customize_default( 'header_info_email_label' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'header_info_email_label',
	array(
		'label'    => esc_html__( 'Label', 'lowlead' ),
		'section'  => 'section_info',
		'type'     => 'text',
		'priority' => 10
	)
);

$wp_customize->add_setting(
	'header_info_email',
	array(
		'default'           => themesflat_customize_default( 'header_info_email' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'header_info_email',
	array(
		'label'    => esc_html__( 'email Number', 'lowlead' ),
		'section'  => 'section_info',
		'type'     => 'text',
		'priority' => 15
	)
);

// Time
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_info_label_time', array(
		'label'    => esc_html__( 'Time', 'lowlead' ),
		'section'  => 'section_info',
		'settings' => 'themesflat_options[info]',
		'priority' => 19
	) )
);

$wp_customize->add_setting(
	'header_info_time_label',
	array(
		'default'           => themesflat_customize_default( 'header_info_time_label' ),
		'sanitize_callback' => 'themesflat_sanitize_text',
	)
);
$wp_customize->add_control(
	'header_info_time_label',
	array(
		'label'    => esc_html__( 'Label', 'lowlead' ),
		'section'  => 'section_info',
		'type'     => 'text',
		'priority' => 20
	)
);

$wp_customize->add_setting(
	'header_info_time',
	array(
		'default'           => themesflat_customize_default( 'header_info_time' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'header_info_time',
	array(
		'label'    => esc_html__( 'Phone Number', 'lowlead' ),
		'section'  => 'section_info',
		'type'     => 'text',
		'priority' => 25
	)
);


// Phone
$wp_customize->add_setting(
	'header_info_phone_number',
	array(
		'default'           => themesflat_customize_default( 'header_info_phone_number' ),
		'sanitize_callback' => 'themesflat_sanitize_text'
	)
);
$wp_customize->add_control(
	'header_info_phone_number',
	array(
		'label'    => esc_html__( 'Phone Number', 'lowlead' ),
		'section'  => 'section_info',
		'type'     => 'text',
		'priority' => 40
	)
);
