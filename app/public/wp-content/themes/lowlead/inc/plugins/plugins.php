<?php
// Register action to declare required plugins
add_action( 'tgmpa_register', 'themesflat_recommend_plugin' );
function themesflat_recommend_plugin() {

	$plugins = array(
		array(
			'name'     => esc_html__( 'Elementor', 'lowlead' ),
			'slug'     => 'elementor',
			'required' => true
		),
		array(
			'name'     => esc_html__( 'ThemesFlat', 'lowlead' ),
			'slug'     => 'themesflat',
			'source'   => THEMESFLAT_DIR . 'inc/plugins/themesflat.zip',
			'required' => true
		),
		array(
			'name'     => esc_html__( 'Themesflat Elementor', 'lowlead' ),
			'slug'     => 'themesflat-elementor',
			'source'   => THEMESFLAT_DIR . 'inc/plugins/themesflat-elementor.zip',
			'required' => true
		),
		array(
			'name'     => esc_html__( 'Revslider', 'lowlead' ),
			'slug'     => 'revslider',
			'source'   => THEMESFLAT_DIR . 'inc/plugins/revslider.zip',
			'required' => true
		),
		array(
			'name'     => esc_html__( 'Contact Form 7', 'lowlead' ),
			'slug'     => 'contact-form-7',
			'required' => true
		),
		array(
			'name'     => esc_html__( 'Mailchimp', 'lowlead' ),
			'slug'     => 'mailchimp-for-wp',
			'required' => true
		),
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'lowlead' ),
			'slug'     => 'one-click-demo-import',
			'required' => false
		),

	);

	tgmpa( $plugins );
}

