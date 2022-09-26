<?php
// Get Settings options of elementor
use Elementor\Core\Settings\Manager;

function themesflat_get_opt_elementor( $settings ) {
	if ( did_action( 'elementor/loaded' ) ) {
		// Get the current post id
		$post_id = get_the_ID();

		// Get the page settings manager
		$page_settings_manager = Manager::get_settings_managers( 'page' );

		// Get the settings model for current post
		$page_settings_model = $page_settings_manager->get_model( $post_id );

		$page_settings = $page_settings_model->get_settings( $settings );

		return $page_settings;

	}
}