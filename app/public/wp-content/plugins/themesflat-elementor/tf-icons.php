<?php
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );

function themesflat_iconpicker_register( $icons = array() ) {
	$icons['law_and_justice_outline_icon'] = array(
		'name'          => 'law_and_justice_outline_icon',
		'label'         => esc_html__( 'Law and Justice Outline Icons', 'themesflat-elementor' ),
		'labelIcon'     => 'icon-judge',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-law-and-justice-outline.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/icon_law_and_justice_outline.json',
		'ver'           => '1.0.0',
	);
	$icons['tf-law'] = array(
		'name'          => 'Law',
		'label'         => esc_html__( 'Law Icons', 'themesflat-elementor' ),
		'labelIcon'     => 'tf-icon-law tf-icon-law-constitution',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/tf-law.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/tf_law_icons.json',
		'ver'           => '1.0.0',
	);

	return $icons;
}