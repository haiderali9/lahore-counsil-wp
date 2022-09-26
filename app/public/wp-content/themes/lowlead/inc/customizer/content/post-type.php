<?php

if ( function_exists( 'themesflat_register_case_study_post_type' ) ) {

	/* Case Study Archive
	===============================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'case_study', array(
			'label'    => esc_html__( 'CASE STUDY ARCHIVE', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 5
		) )
	);

	// Case Study Slug
	$wp_customize->add_setting(
		'case_study_slug',
		array(
			'default'           => themesflat_customize_default( 'case_study_slug' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_slug',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Case Study Slug', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 10
		)
	);

	// Case Study Name
	$wp_customize->add_setting(
		'case_study_name',
		array(
			'default'           => themesflat_customize_default( 'case_study_name' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_name',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Case Study Name', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 15
		)
	);

	$wp_customize->add_setting(
		'case_study_layout',
		array(
			'default'           => themesflat_customize_default( 'case_study_layout' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_layout',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 20,
			'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
			'choices'  => array(
				'sidebar-right'    => esc_html__( 'Sidebar Right', 'lowlead' ),
				'sidebar-left'     => esc_html__( 'Sidebar Left', 'lowlead' ),
				'fullwidth'        => esc_html__( 'Full Width', 'lowlead' ),
				'fullwidth-small'  => esc_html__( 'Full Width Small', 'lowlead' ),
				'fullwidth-center' => esc_html__( 'Full Width Center', 'lowlead' ),
			),
		)
	);

	$wp_customize->add_setting(
		'case_study_sidebar_list',
		array(
			'default'           => themesflat_customize_default( 'case_study_sidebar_list' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
			'case_study_sidebar_list',
			array(
				'type'            => 'dropdown',
				'section'         => 'section_content_post_type',
				'priority'        => 25,
				'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
				'active_callback' => function () use ( $wp_customize ) {
					return 'sidebar-right' === $wp_customize->get_setting( 'case_study_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'case_study_layout' )->value();
				},
			) )
	);

	// Number Posts Service
	$wp_customize->add_setting(
		'case_study_number_post',
		array(
			'default'           => themesflat_customize_default( 'case_study_number_post' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_number_post',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Show Number Posts', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 30
		)
	);

	// Gird columns portfolio
	$wp_customize->add_setting(
		'case_study_grid_columns',
		array(
			'default'           => themesflat_customize_default( 'case_study_grid_columns' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_grid_columns',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 35,
			'label'    => esc_html__('Grid Columns', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Gird columns Case study tablet
	$wp_customize->add_setting(
		'case_study_grid_columns_tablet',
		array(
			'default'           => themesflat_customize_default( 'case_study_grid_columns_tablet' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_grid_columns_tablet',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 40,
			'label'    => esc_html__('Grid Columns Tablet', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Gird columns Case study mobile
	$wp_customize->add_setting(
		'case_study_grid_columns_mobile',
		array(
			'default'           => themesflat_customize_default( 'case_study_grid_columns_mobile' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_grid_columns_mobile',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 45,
			'label'    => esc_html__('Grid Columns Mobile', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Order By case_study
	$wp_customize->add_setting(
		'case_study_order_by',
		array(
			'default'           => themesflat_customize_default( 'case_study_order_by' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_order_by',
		array(
			'type'     => 'select',
			'label'    => esc_html__('Order By', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 50,
			'choices'  => array(
				'date'          => esc_html__('Date', 'lowlead' ),
				'id'            => esc_html__('Id', 'lowlead' ),
				'author'        => esc_html__('Author', 'lowlead' ),
				'title'         => esc_html__('Title', 'lowlead' ),
				'modified'      => esc_html__('Modified', 'lowlead' ),
				'comment_count' => esc_html__('Comment Count', 'lowlead' ),
				'menu_order'    => esc_html__('Menu Order', 'lowlead' )
			)
		)
	);

	// Order Direction case_study
	$wp_customize->add_setting(
		'case_study_order_direction',
		array(
			'default'           => themesflat_customize_default( 'case_study_order_direction' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_order_direction',
		array(
			'type'     => 'select',
			'label'    => esc_html__('Order Direction', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 55,
			'choices'  => array(
				'DESC' => esc_html__('Descending', 'lowlead' ),
				'ASC'  => esc_html__('Assending', 'lowlead' )
			)
		)
	);

	// case_study Exclude Post
	$wp_customize->add_setting(
		'case_study_exclude',
		array(
			'default'           => themesflat_customize_default( 'case_study_exclude' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_exclude',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Post Ids Will Be Inorged. Ex: 1,2,3', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 60
		)
	);

	$wp_customize->add_setting(
		'case_study_show_heading',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'case_study_show_heading' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'case_study_show_heading',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Show Heading ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 61
			) )
	);

	$wp_customize->add_setting(
		'case_study_before_heading',
		array(
			'default'           => themesflat_customize_default( 'case_study_before_heading' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_before_heading',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Case Study Before Heading', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 62
		)
	);

	$wp_customize->add_setting(
		'case_study_heading',
		array(
			'default'           => themesflat_customize_default( 'case_study_heading' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_heading',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Case Study Heading', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 63
		)
	);

	/* Case Study Single
	==============================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'case_study_single', array(
			'label'    => esc_html__( 'CASE STUDY SINGLE', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 75
		) )
	);

	// Customize Case Study Featured Title
	$wp_customize->add_setting(
		'case_study_featured_title',
		array(
			'default'           => themesflat_customize_default( 'case_study_featured_title' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'case_study_featured_title',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Customize Case Study Featured Title', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 80
		)
	);

	$wp_customize->add_setting(
		'case_study_single_layout',
		array(
			'default'           => themesflat_customize_default( 'case_study_single_layout' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control(
		'case_study_single_layout',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 85,
			'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
			'choices'  => array(
				'sidebar-right' => esc_html__( 'Sidebar Right', 'lowlead' ),
				'sidebar-left'  => esc_html__( 'Sidebar Left', 'lowlead' ),
				'fullwidth'     => esc_html__( 'Full Width', 'lowlead' ),
			),
		)
	);

	$wp_customize->add_setting(
		'case_study_single_sidebar_list',
		array(
			'default'           => themesflat_customize_default( 'case_study_single_sidebar_list' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
			'case_study_single_sidebar_list',
			array(
				'type'            => 'dropdown',
				'section'         => 'section_content_post_type',
				'priority'        => 90,
				'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
				'active_callback' => function () use ( $wp_customize ) {
					return 'sidebar-right' === $wp_customize->get_setting( 'case_study_single_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'case_study_single_layout' )->value();
				},

			) )
	);

	// Show Post Navigator case_study
	$wp_customize->add_setting(
		'case_study_show_post_navigator',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'case_study_show_post_navigator' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'case_study_show_post_navigator',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Single Navigator ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 95
			) )
	);

	// Show Related case_study
	$wp_customize->add_setting(
		'case_study_show_related',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'case_study_show_related' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'case_study_show_related',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Related Case Study ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 100
			) )
	);

	// Number Of Related Posts Service
	$wp_customize->add_setting(
		'number_related_post_case_study',
		array(
			'default'           => themesflat_customize_default( 'number_related_post_case_study' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'number_related_post_case_study',
		array(
			'type'            => 'text',
			'label'           => esc_html__( 'Number Of Related Posts', 'lowlead' ),
			'section'         => 'section_content_post_type',
			'priority'        => 105,
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'case_study_show_related' )->value();
			},
		)
	);

	// Gird columns case_study related
	$wp_customize->add_setting(
		'case_study_related_grid_columns',
		array(
			'default'           => themesflat_customize_default( 'case_study_related_grid_columns' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'case_study_related_grid_columns',
		array(
			'type'            => 'select',
			'section'         => 'section_content_post_type',
			'priority'        => 110,
			'label'           => esc_html__( 'Columns Related', 'lowlead' ),
			'choices'         => array(
				2 => esc_html__( '2 Columns', 'lowlead' ),
				3 => esc_html__( '3 Columns', 'lowlead' ),
				4 => esc_html__( '4 Columns', 'lowlead' )
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 1 === $wp_customize->get_setting( 'case_study_show_related' )->value();
			},
		)
	);
}

if ( function_exists( 'themesflat_register_practise_area_post_type' ) ) {

	/* Practise area Archive
	=================================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'practies_area', array(
			'label'    => esc_html__( 'PRACTISE AREA ARCHIVE', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 115
		) )
	);

	// Practise area Slug
	$wp_customize->add_setting(
		'practise_area_slug',
		array(
			'default'           => themesflat_customize_default( 'practise_area_slug' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'practise_area_slug',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Practise area Slug', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 120
		)
	);

	// practise_area Name
	$wp_customize->add_setting(
		'practise_area_name',
		array(
			'default'           => themesflat_customize_default( 'practise_area_name' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'practise_area_name',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Practise area Name', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 125
		)
	);

	$wp_customize->add_setting(
		'practise_area_layout',
		array(
			'default'           => themesflat_customize_default( 'practise_area_layout' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_layout',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 130,
			'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
			'choices'  => array(
				'sidebar-right'    => esc_html__( 'Sidebar Right', 'lowlead' ),
				'sidebar-left'     => esc_html__( 'Sidebar Left', 'lowlead' ),
				'fullwidth'        => esc_html__( 'Full Width', 'lowlead' ),
				'fullwidth-small'  => esc_html__( 'Full Width Small', 'lowlead' ),
				'fullwidth-center' => esc_html__( 'Full Width Center', 'lowlead' ),
			),
		)
	);

	$wp_customize->add_setting(
		'practise_area_sidebar_list',
		array(
			'default'           => themesflat_customize_default( 'practise_area_sidebar_list' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
			'practise_area_sidebar_list',
			array(
				'type'            => 'dropdown',
				'section'         => 'section_content_post_type',
				'priority'        => 135,
				'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
				'active_callback' => function () use ( $wp_customize ) {
					return 'sidebar-right' === $wp_customize->get_setting( 'practise_area_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'practise_area_layout' )->value();
				},

			) )
	);

	// Number Posts practise_area
	$wp_customize->add_setting(
		'practise_area_number_post',
		array(
			'default'           => themesflat_customize_default( 'practise_area_number_post' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'practise_area_number_post',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Show Number Posts', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 140
		)
	);

	// Gird columns practise_area
	$wp_customize->add_setting(
		'practise_area_grid_columns',
		array(
			'default'           => themesflat_customize_default( 'practise_area_grid_columns' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_grid_columns',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 145,
			'label'    => esc_html__('Grid Columns', 'lowlead' ),
			'choices'  => array(
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Gird columns practise_area tablet
	$wp_customize->add_setting(
		'practise_area_grid_columns_tablet',
		array(
			'default'           => themesflat_customize_default( 'practise_area_grid_columns_tablet' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_grid_columns_tablet',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 150,
			'label'    => esc_html__('Grid Columns Tablet', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Gird columns practise_area mobile
	$wp_customize->add_setting(
		'practise_area_grid_columns_mobile',
		array(
			'default'           => themesflat_customize_default( 'practise_area_grid_columns_mobile' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_grid_columns_mobile',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 155,
			'label'    => esc_html__('Grid Columns Mobile', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Order By practise_area
	$wp_customize->add_setting(
		'practise_area_order_by',
		array(
			'default'           => themesflat_customize_default( 'practise_area_order_by' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_order_by',
		array(
			'type'     => 'select',
			'label'    => esc_html__('Order By', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 160,
			'choices'  => array(
				'date'          => esc_html__('Date', 'lowlead' ),
				'id'            => esc_html__('Id', 'lowlead' ),
				'author'        => esc_html__('Author', 'lowlead' ),
				'title'         => esc_html__('Title', 'lowlead' ),
				'modified'      => esc_html__('Modified', 'lowlead' ),
				'comment_count' => esc_html__('Comment Count', 'lowlead' ),
				'menu_order'    => esc_html__('Menu Order', 'lowlead' )
			)
		)
	);

	// Order Direction practise_area
	$wp_customize->add_setting(
		'practise_area_order_direction',
		array(
			'default'           => themesflat_customize_default( 'practise_area_order_direction' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_order_direction',
		array(
			'type'     => 'select',
			'label'    => esc_html__('Order Direction', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 165,
			'choices'  => array(
				'DESC' => esc_html__('Descending', 'lowlead' ),
				'ASC'  => esc_html__('Assending', 'lowlead' )
			)
		)
	);

	// practise_area Exclude Post
	$wp_customize->add_setting(
		'practise_area_exclude',
		array(
			'default'           => themesflat_customize_default( 'practise_area_exclude' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'practise_area_exclude',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Post Ids Will Be Inorged. Ex: 1,2,3', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 170
		)
	);

	/* Practise area Single
	=================================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'practise_area_single', array(
			'label'    => esc_html__( 'PRACTISE AREA SINGLE', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 175
		) )
	);

	// Customize Practise area Featured Title
	$wp_customize->add_setting(
		'practise_area_featured_title',
		array(
			'default'           => themesflat_customize_default( 'practise_area_featured_title' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'practise_area_featured_title',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Customize Practise area Featured Title', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 180
		)
	);
	$wp_customize->add_setting(
		'practise_area_single_layout',
		array(
			'default'           => themesflat_customize_default( 'practise_area_single_layout' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control(
		'practise_area_single_layout',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 185,
			'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
			'choices'  => array(
				'sidebar-right' => esc_html__( 'Sidebar Right', 'lowlead' ),
				'sidebar-left'  => esc_html__( 'Sidebar Left', 'lowlead' ),
				'fullwidth'     => esc_html__( 'Full Width', 'lowlead' ),
			),
		)
	);

	$wp_customize->add_setting(
		'practise_area_single_sidebar_list',
		array(
			'default'           => themesflat_customize_default( 'practise_area_single_sidebar_list' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
			'practise_area_single_sidebar_list',
			array(
				'type'            => 'dropdown',
				'section'         => 'section_content_post_type',
				'priority'        => 190,
				'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
				'active_callback' => function () use ( $wp_customize ) {
					return 'sidebar-right' === $wp_customize->get_setting( 'practise_area_single_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'practise_area_single_layout' )->value();
				},
			) )
	);

	// Show Post Navigator Practise area
	$wp_customize->add_setting(
		'practise_area_show_post_navigator',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'practise_area_show_post_navigator' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'practise_area_show_post_navigator',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Single Navigator ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 195
			) )
	);

	// Show Related practise_area
	$wp_customize->add_setting(
		'practise_area_show_related',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'practise_area_show_related' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'practise_area_show_related',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Related practise_area ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 200
			) )
	);

	// Gird columns Practise area related
	$wp_customize->add_setting(
		'practise_area_related_grid_columns',
		array(
			'default'           => themesflat_customize_default( 'practise_area_related_grid_columns' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'practise_area_related_grid_columns',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 205,
			'label'    => esc_html__( 'Columns Related', 'lowlead' ),
			'choices'  => array(
				2 => esc_html__( '2 Columns', 'lowlead' ),
				3 => esc_html__( '3 Columns', 'lowlead' ),
				4 => esc_html__( '4 Columns', 'lowlead' )
			)
		)
	);

	// Number Of Related Posts practise_area
	$wp_customize->add_setting(
		'number_related_post_practise_area',
		array(
			'default'           => themesflat_customize_default( 'number_related_post_practise_area' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'number_related_post_practise_area',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Number Of Related Posts', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 210
		)
	);
}

if ( function_exists( 'themesflat_register_attorneys_post_type' ) ) {

	/* Attorneys Archive
	=================================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'attorneys', array(
			'label'    => esc_html__( 'ATTORNEYS ARCHIVE', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 215
		) )
	);

	// Attorneys Slug
	$wp_customize->add_setting(
		'attorneys_slug',
		array(
			'default'           => themesflat_customize_default( 'attorneys_slug' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'attorneys_slug',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Attorneys Slug', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 220
		)
	);

	// Attorney Name
	$wp_customize->add_setting(
		'attorneys_name',
		array(
			'default'           => themesflat_customize_default( 'attorneys_name' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'attorneys_name',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Attorneys Name', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 225
		)
	);

	$wp_customize->add_setting(
		'attorneys_layout',
		array(
			'default'           => themesflat_customize_default( 'attorneys_layout' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_layout',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 230,
			'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
			'choices'  => array(
				'sidebar-right'    => esc_html__( 'Sidebar Right', 'lowlead' ),
				'sidebar-left'     => esc_html__( 'Sidebar Left', 'lowlead' ),
				'fullwidth'        => esc_html__( 'Full Width', 'lowlead' ),
				'fullwidth-small'  => esc_html__( 'Full Width Small', 'lowlead' ),
				'fullwidth-center' => esc_html__( 'Full Width Center', 'lowlead' ),
			),
		)
	);

	$wp_customize->add_setting(
		'attorneys_sidebar_list',
		array(
			'default'           => themesflat_customize_default( 'attorneys_sidebar_list' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
			'attorneys_sidebar_list',
			array(
				'type'            => 'dropdown',
				'section'         => 'section_content_post_type',
				'priority'        => 235,
				'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
				'active_callback' => function () use ( $wp_customize ) {
					return 'sidebar-right' === $wp_customize->get_setting( 'attorneys_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'attorneys_layout' )->value();
				},

			) )
	);

	// Number Posts practise_area
	$wp_customize->add_setting(
		'attorneys_number_post',
		array(
			'default'           => themesflat_customize_default( 'attorneys_number_post' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'attorneys_number_post',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Show Number Posts', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 240
		)
	);

	// Gird columns attorneys
	$wp_customize->add_setting(
		'attorneys_grid_columns',
		array(
			'default'           => themesflat_customize_default( 'attorneys_grid_columns' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_grid_columns',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 245,
			'label'    => esc_html__('Grid Columns', 'lowlead' ),
			'choices'  => array(
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Gird columns attorneys tablet
	$wp_customize->add_setting(
		'attorneys_grid_columns_tablet',
		array(
			'default'           => themesflat_customize_default( 'attorneys_grid_columns_tablet' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_grid_columns_tablet',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 250,
			'label'    => esc_html__('Grid Columns Tablet', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Gird columns attorneys mobile
	$wp_customize->add_setting(
		'attorneys_grid_columns_mobile',
		array(
			'default'           => themesflat_customize_default( 'attorneys_grid_columns_mobile' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_grid_columns_mobile',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 255,
			'label'    => esc_html__('Grid Columns Mobile', 'lowlead' ),
			'choices'  => array(
				1 => esc_html__('1 Columns', 'lowlead' ),
				2 => esc_html__('2 Columns', 'lowlead' ),
				3 => esc_html__('3 Columns', 'lowlead' ),
				4 => esc_html__('4 Columns', 'lowlead' )
			)
		)
	);

	// Order By attorneys
	$wp_customize->add_setting(
		'attorneys_order_by',
		array(
			'default'           => themesflat_customize_default( 'attorneys_order_by' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_order_by',
		array(
			'type'     => 'select',
			'label'    => esc_html__('Order By', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 260,
			'choices'  => array(
				'date'          => esc_html__('Date', 'lowlead' ),
				'id'            => esc_html__('Id', 'lowlead' ),
				'author'        => esc_html__('Author', 'lowlead' ),
				'title'         => esc_html__('Title', 'lowlead' ),
				'modified'      => esc_html__('Modified', 'lowlead' ),
				'comment_count' => esc_html__('Comment Count', 'lowlead' ),
				'menu_order'    => esc_html__('Menu Order', 'lowlead' )
			)
		)
	);

	// Order Direction attorneys
	$wp_customize->add_setting(
		'attorneys_order_direction',
		array(
			'default'           => themesflat_customize_default( 'attorneys_order_direction' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_order_direction',
		array(
			'type'     => 'select',
			'label'    => esc_html__('Order Direction', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 265,
			'choices'  => array(
				'DESC' => esc_html__('Descending', 'lowlead' ),
				'ASC'  => esc_html__('Assending', 'lowlead' )
			)
		)
	);

	// attorneys Exclude Post
	$wp_customize->add_setting(
		'attorneys_exclude',
		array(
			'default'           => themesflat_customize_default( 'attorneys_exclude' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'attorneys_exclude',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Post Ids Will Be Inorged. Ex: 1,2,3', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 270
		)
	);

	/* Attorneys Single
	=================================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'attorneys_single', array(
			'label'    => esc_html__( 'ATTORNEYS SINGLE', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 275
		) )
	);

	// Customize Attorneys Featured Title
	$wp_customize->add_setting(
		'attorneys_featured_title',
		array(
			'default'           => themesflat_customize_default( 'attorneys_featured_title' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'attorneys_featured_title',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Customize Attorneys Featured Title', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 280
		)
	);
	$wp_customize->add_setting(
		'attorneys_single_layout',
		array(
			'default'           => themesflat_customize_default( 'attorneys_single_layout' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control(
		'attorneys_single_layout',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 285,
			'label'    => esc_html__( 'Sidebar Position', 'lowlead' ),
			'choices'  => array(
				'sidebar-right' => esc_html__( 'Sidebar Right', 'lowlead' ),
				'sidebar-left'  => esc_html__( 'Sidebar Left', 'lowlead' ),
				'fullwidth'     => esc_html__( 'Full Width', 'lowlead' ),
			),
		)
	);

	$wp_customize->add_setting(
		'attorneys_single_sidebar_list',
		array(
			'default'           => themesflat_customize_default( 'attorneys_single_sidebar_list' ),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars( $wp_customize,
			'attorneys_single_sidebar_list',
			array(
				'type'            => 'dropdown',
				'section'         => 'section_content_post_type',
				'priority'        => 290,
				'label'           => esc_html__( 'List Sidebar', 'lowlead' ),
				'active_callback' => function () use ( $wp_customize ) {
					return 'sidebar-right' === $wp_customize->get_setting( 'attorneys_single_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'attorneys_single_layout' )->value();
				},

			) )
	);

	// Show Post Navigator Attorneys
	$wp_customize->add_setting(
		'attorneys_show_post_navigator',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'attorneys_show_post_navigator' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'attorneys_show_post_navigator',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Single Navigator ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 295
			) )
	);

	// Show Related attorneys
	$wp_customize->add_setting(
		'attorneys_show_related',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'attorneys_show_related' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'attorneys_show_related',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Related attorneys ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 300
			) )
	);

	// Gird columns Attorneys related
	$wp_customize->add_setting(
		'attorneys_related_grid_columns',
		array(
			'default'           => themesflat_customize_default( 'attorneys_related_grid_columns' ),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'attorneys_related_grid_columns',
		array(
			'type'     => 'select',
			'section'  => 'section_content_post_type',
			'priority' => 305,
			'label'    => esc_html__( 'Columns Related', 'lowlead' ),
			'choices'  => array(
				2 => esc_html__( '2 Columns', 'lowlead' ),
				3 => esc_html__( '3 Columns', 'lowlead' ),
				4 => esc_html__( '4 Columns', 'lowlead' )
			)
		)
	);

	// Number Of Related Posts attorneys
	$wp_customize->add_setting(
		'number_related_post_attorneys',
		array(
			'default'           => themesflat_customize_default( 'number_related_post_attorneys' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'number_related_post_attorneys',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Number Of Related Posts', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 310
		)
	);
}

if (function_exists('themesflat_register_gallery_post_type')) {

	/* Gallery Archive
	===============================================*/
	$wp_customize->add_control( new themesflat_Info( $wp_customize, 'gallery', array(
			'label' => esc_html__('GALLERY ARCHIVE', 'lowlead'),
			'section' => 'section_content_post_type',
			'settings' => 'themesflat_options[info]',
			'priority' => 300
		) )
	);

	// Gallery Slug
	$wp_customize->add_setting (
		'gallery_slug',
		array(
			'default' =>  themesflat_customize_default('gallery_slug'),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'gallery_slug',
		array(
			'type'      => 'text',
			'label'     => esc_html__('Gallery Slug', 'lowlead'),
			'section'   => 'section_content_post_type',
			'priority'  => 301
		)
	);

	// Services Name
	$wp_customize->add_setting (
		'gallery_name',
		array(
			'default' =>  themesflat_customize_default('gallery_name'),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'gallery_name',
		array(
			'type'      => 'text',
			'label'     => esc_html__('Gallery Name', 'lowlead'),
			'section'   => 'section_content_post_type',
			'priority'  => 302
		)
	);

	$wp_customize->add_setting(
		'gallery_layout',
		array(
			'default'           => themesflat_customize_default('gallery_layout'),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'gallery_layout',
		array (
			'type'      => 'select',
			'section'   => 'section_content_post_type',
			'priority'  => 303,
			'label'         => esc_html__('Sidebar Position', 'lowlead'),
			'choices'   => array (
				'sidebar-right'     => esc_html__( 'Sidebar Right','lowlead' ),
				'sidebar-left'      =>  esc_html__( 'Sidebar Left','lowlead' ),
				'fullwidth'         =>   esc_html__( 'Full Width','lowlead' ),
				'fullwidth-small'   =>   esc_html__( 'Full Width Small','lowlead' ),
				'fullwidth-center'  =>   esc_html__( 'Full Width Center','lowlead' ),
			),
		)
	);

	$wp_customize->add_setting (
		'gallery_sidebar_list',
		array(
			'default'           => themesflat_customize_default('gallery_sidebar_list'),
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( new themesflat_DropdownSidebars($wp_customize,
			'gallery_sidebar_list',
			array(
				'type'      => 'dropdown',
				'section'   => 'section_content_post_type',
				'priority'  => 304,
				'label'         => esc_html__('List Sidebar', 'lowlead'),

			))
	);

	// Number Posts Portfolios
	$wp_customize->add_setting (
		'gallery_number_post',
		array(
			'default' => themesflat_customize_default('gallery_number_post'),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'gallery_number_post',
		array(
			'type'      => 'text',
			'label'     => esc_html__('Show Number Posts', 'lowlead'),
			'section'   => 'section_content_post_type',
			'priority'  => 305
		)
	);

	// Gird columns portfolio
	$wp_customize->add_setting(
		'gallery_grid_columns',
		array(
			'default'           => themesflat_customize_default('gallery_grid_columns'),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'gallery_grid_columns',
		array(
			'type'      => 'select',
			'section'   => 'section_content_post_type',
			'priority'  => 306,
			'label'     => esc_html__('Grid Columns', 'lowlead'),
			'choices'   => array(
				2     => esc_html__( '2 Columns', 'lowlead' ),
				3     => esc_html__( '3 Columns', 'lowlead' ),
				4     => esc_html__( '4 Columns', 'lowlead' )
			)
		)
	);

	// Order By Gallery
	$wp_customize->add_setting(
		'gallery_order_by',
		array(
			'default' => themesflat_customize_default('gallery_order_by'),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'gallery_order_by',
		array(
			'type'      => 'select',
			'label'     => esc_html__('Order By', 'lowlead'),
			'section'   => 'section_content_post_type',
			'priority'  => 307,
			'choices' => array(
				'date'          => esc_html__( 'Date', 'lowlead' ),
				'id'            => esc_html__( 'Id', 'lowlead' ),
				'author'        => esc_html__( 'Author', 'lowlead' ),
				'title'         => esc_html__( 'Title', 'lowlead' ),
				'modified'      => esc_html__( 'Modified', 'lowlead' ),
				'comment_count' => esc_html__( 'Comment Count', 'lowlead' ),
				'menu_order'    => esc_html__( 'Menu Order', 'lowlead' )
			)
		)
	);

	// Order Direction Gallery
	$wp_customize->add_setting(
		'gallery_order_direction',
		array(
			'default' => themesflat_customize_default('gallery_order_direction'),
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'gallery_order_direction',
		array(
			'type'      => 'select',
			'label'     => esc_html__('Order Direction', 'lowlead'),
			'section'   => 'section_content_post_type',
			'priority'  => 308,
			'choices' => array(
				'DESC' => esc_html__( 'Descending', 'lowlead' ),
				'ASC'  => esc_html__( 'Assending', 'lowlead' )
			)
		)
	);

	// Gallery Exclude Post
	$wp_customize->add_setting (
		'gallery_exclude',
		array(
			'default' =>  themesflat_customize_default('gallery_exclude'),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'gallery_exclude',
		array(
			'type'      => 'text',
			'label'     => esc_html__('Post Ids Will Be Inorged. Ex: 1,2,3', 'lowlead'),
			'section'   => 'section_content_post_type',
			'priority'  => 309
		)
	);
	$wp_customize->add_setting(
		'gallery_show_heading',
		array(
			'sanitize_callback' => 'themesflat_sanitize_checkbox',
			'default'           => themesflat_customize_default( 'gallery_show_heading' ),
		)
	);
	$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
			'gallery_show_heading',
			array(
				'type'     => 'checkbox',
				'label'    => esc_html__( 'Show Heading ( OFF | ON )', 'lowlead' ),
				'section'  => 'section_content_post_type',
				'priority' => 310
			) )
	);
	$wp_customize->add_setting(
		'gallery_before_heading',
		array(
			'default'           => themesflat_customize_default( 'gallery_before_heading' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'gallery_before_heading',
		array(
			'type'     => 'text',
			'label'    => esc_html__('Gallery Before Heading', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' =>311
		)
	);

	$wp_customize->add_setting(
		'gallery_heading',
		array(
			'default'           => themesflat_customize_default( 'gallery_heading' ),
			'sanitize_callback' => 'themesflat_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'gallery_heading',
		array(
			'type'     => 'text',
			'label'    => esc_html__( 'Gallery Heading', 'lowlead' ),
			'section'  => 'section_content_post_type',
			'priority' => 312
		)
	);

}