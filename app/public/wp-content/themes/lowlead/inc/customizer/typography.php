<?php
// ADD SECTION BODY
$wp_customize->add_section( 'section_typo_body', array(
	'title'    => 'Body',
	'priority' => 1,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/body.php";

// ADD SECTION TOPBAR
$wp_customize->add_section( 'section_typo_topbar', array(
	'title'    => 'Topbar',
	'priority' => 2,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/topbar.php";

// ADD SECTION MENU
$wp_customize->add_section( 'section_typo_menu', array(
	'title'    => 'Menu',
	'priority' => 3,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/menu.php";

// ADD SECTION PAGE TITLE
$wp_customize->add_section( 'section_typo_page_title', array(
	'title'    => 'Page Title',
	'priority' => 4,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/page-title.php";

// ADD SECTION BLOG POST
$wp_customize->add_section( 'panel_typo_blog_post', array(
	'title'    => 'Blog Post',
	'priority' => 5,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/blog-post.php";

// ADD SECTION SIDEBAR WIDGET TITLE
$wp_customize->add_section( 'section_typo_sidebar_widget_title', array(
	'title'    => 'Sidebar Widget Title',
	'priority' => 6,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/sidebar-widget-title.php";

// ADD SECTION PAGINATION
$wp_customize->add_section( 'section_typo_pagination', array(
	'title'    => 'Pagination',
	'priority' => 12,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/pagination.php";

// ADD SECTION HEADING
$wp_customize->add_section( 'section_typo_heading', array(
	'title'    => 'Heading H1 - H6',
	'priority' => 10,
	'panel'    => 'typography_panel',
) );
require THEMESFLAT_DIR . "inc/customizer/typography/heading.php";