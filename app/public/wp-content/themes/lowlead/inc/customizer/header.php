<?php
// ADD SECTION TOPBAR
$wp_customize->add_section( 'section_topbar', array(
	'title'    => 'Topbar',
	'priority' => 1,
	'panel'    => 'header_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/header/topbar.php";

// ADD SECTION LOGO
$wp_customize->add_section( 'section_logo', array(
	'title'    => 'Logo',
	'priority' => 2,
	'panel'    => 'header_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/header/logo.php";

// ADD SECTION MENU
$wp_customize->add_section( 'section_menu', array(
	'title'    => 'Menu',
	'priority' => 3,
	'panel'    => 'header_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/header/menu.php";

// ADD SECTION HEADER OPTION
$wp_customize->add_section( 'section_options', array(
	'title'    => 'Header Options',
	'priority' => 4,
	'panel'    => 'header_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/header/header-options.php";

// ADD SECTION HEADER BUTTON
$wp_customize->add_section( 'section_header_mobile', array(
	'title'    => 'Header Mobile',
	'priority' => 6,
	'panel'    => 'header_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/header/header-mobile.php";

// ADD SECTION HEADER BUTTON
$wp_customize->add_section( 'section_info', array(
	'title'           => 'Info',
	'priority'        => 7,
	'panel'           => 'header_panel',
	'active_callback' => function () use ( $wp_customize ) {
		return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
	},
) );
require THEMESFLAT_DIR . "inc/customizer/header/info.php";