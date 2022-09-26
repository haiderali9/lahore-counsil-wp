<?php

if ( ! function_exists( 'flat_get_post_page_content' ) ) {
	function flat_get_post_page_content( $slug ) {
		$content_post = get_posts( array(
			'name'           => $slug,
			'posts_per_page' => 1,
			'post_type'      => 'elementor_library',
			'post_status'    => 'publish'
		) );
		if ( array_key_exists( 0, $content_post ) == true ) {
			$id = $content_post[0]->ID;

			return $id;
		}
	}
}

if ( ! function_exists( 'tf_header_enabled' ) ) {
	function tf_header_enabled() {
		$header_id = ThemesFlat_Addon_For_Elementor_Bulter::get_settings( 'type_header', '' );
		$status    = false;

		if ( '' !== $header_id ) {
			$status = true;
		}

		return apply_filters( 'tf_header_enabled', $status );
	}
}

if ( ! function_exists( 'tf_footer_enabled' ) ) {
	function tf_footer_enabled() {
		$header_id = ThemesFlat_Addon_For_Elementor_Bulter::get_settings( 'type_footer', '' );
		$status    = false;

		if ( '' !== $header_id ) {
			$status = true;
		}

		return apply_filters( 'tf_footer_enabled', $status );
	}
}

if ( ! function_exists( 'get_header_content' ) ) {
	function get_header_content() {
		$tf_get_header_id = ThemesFlat_Addon_For_Elementor_Bulter::tf_get_header_id();
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $tf_get_header_id );
	}
}

if ( ! function_exists( 'tf_get_template_widget' ) ) {
	function tf_get_template_widget( $template_name, $args = null, $return = false ) {
		$template_file  = $template_name . '.php';
		$default_folder = plugin_dir_path( __FILE__ ) . 'templates/';
		$theme_folder   = apply_filters( 'tf_templates_folder', dirname( plugin_basename( __FILE__ ) ) );
		$template       = locate_template( $theme_folder . '/' . $template_file );
		if ( ! $template ) {
			$template = $default_folder . $template_file;
		}
		if ( $args && is_array( $args ) ) {
			extract( $args );
		}
		if ( $return ) {
			ob_start();
		}
		if ( file_exists( $template ) ) {
			include $template;
		}
		if ( $return ) {
			return ob_get_clean();
		}

		return null;
	}
}

function tf_kses_post( $s ) {
	$s = wp_filter_kses( $s );
	$s = str_replace( '&amp;', '&', $s );

	return $s;
}

function tf_recursive_sanitize_text_field( $data ) {
	if ( is_array( $data ) ) {
		foreach ( $data as $key => $value ) {
			$data[ $key ] = tf_recursive_sanitize_text_field( $data[ $key ] );
		}
	} else if ( is_object( $data ) ) {
		foreach ( $data as $key => $value ) {
			$data->{$key} = tf_recursive_sanitize_text_field( $data->{$key} );
		}
	} else if ( is_string( $data ) ) {
		$data = sanitize_text_field( $data );
	}

	return $data;
}

function tf_get_query_args( $settings = [] ) {
	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}
	$query_args = array(
		'post_type'           => 'project',
		'posts_per_page'      => $settings['posts_per_page'],
		'paged'               => $paged,
		'ignore_sticky_posts' => 1,
		'post_status'         => 'publish',
	);

	if ( ! empty( $settings['posts_categories'] ) ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'project_category',
				'field'    => 'term_id',
				'terms'    => $settings['posts_categories']
			),
		);
	}
	if ( ! empty( $settings['exclude'] ) ) {
		if ( ! is_array( $settings['exclude'] ) ) {
			$exclude = explode( ',', $settings['exclude'] );
		}

		$query_args['post__not_in'] = $exclude;
	}

	$query_args['orderby'] = $settings['order_by'];
	$query_args['order']   = $settings['order'];

	if ( $settings['sort_by_id'] != '' ) {
		$sort_by_id             = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );
		$query_args['post__in'] = $sort_by_id;
		$query_args['orderby']  = 'post__in';
	}

	return $query_args;
}

function tf_get_img_meta( $id ) {
	$attachment = get_post( $id );
	if ( $attachment == null || $attachment->post_type != 'attachment' ) {
		return null;
	}

	$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
	if ( '' === $alt ) {
		$alt = $attachment->post_title;
	}

	return [
		'alt'         => $alt,
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href'        => get_permalink( $attachment->ID ),
		'src'         => $attachment->guid,
		'title'       => $attachment->post_title
	];
}

function tf_get_color_schemes( $allow_default = true ) {
	$schemes = array();
	if ( $allow_default ) {
		$schemes[''] = esc_html__( 'Default', 'ube' );
	}

	foreach ( tf_color_schemes_configs() as $k => $v ) {
		$schemes[ $k ] = $v['label'];
	}

	return $schemes;
}

function tf_color_schemes_configs() {
	$schemes = apply_filters( 'tf_color_schemes_configs', array(
		"accent"    => array(
			'label' => __( 'Accent', 'ube' ),
			'color' => '#007bff'
		),
		"primary"   => array(
			'label' => __( 'Primary', 'ube' ),
			'color' => '#007bff'
		),
		"secondary" => array(
			'label' => __( 'Secondary', 'ube' ),
			'color' => '#6c757d'
		),
		"light"     => array(
			'label' => __( 'Light', 'ube' ),
			'color' => '#f8f9fa'
		),
		"dark"      => array(
			'label' => __( 'Dark', 'ube' ),
			'color' => '#343a40'
		),
		"success"   => array(
			'label' => __( 'Success', 'ube' ),
			'color' => '#28a745'
		),
		"danger"    => array(
			'label' => __( 'Danger', 'ube' ),
			'color' => '#dc3545'
		),
		"warning"   => array(
			'label' => __( 'Warning', 'ube' ),
			'color' => '#ffc107'
		),
		"info"      => array(
			'label' => __( 'Info', 'ube' ),
			'color' => '#17a2b8'
		),
	) );

	foreach ( tf_get_system_colors() as $k => $v ) {
		if ( isset( $schemes[ $v['_id'] ] ) ) {
			$schemes[ $v['_id'] ]['color'] = $v['color'];
		}
	}

	return $schemes;
}

function tf_get_system_colors() {

	if ( isset( $GLOBALS['tf_system_colors'] ) ) {
		return $GLOBALS['tf_system_colors'];
	}
	$kit_id = Elementor\Plugin::$instance->kits_manager->get_active_id();

	$kit      = Elementor\Plugin::$instance->documents->get( $kit_id );
	$meta_key = Elementor\Core\Settings\Page\Manager::META_KEY;

	$kit_raw_settings            = $kit->get_meta( $meta_key );
	$GLOBALS['tf_system_colors'] = isset( $kit_raw_settings['system_colors'] ) ? $kit_raw_settings['system_colors'] : array();

	return $GLOBALS['tf_system_colors'];
}

