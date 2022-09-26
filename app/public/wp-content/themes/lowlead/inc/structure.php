<?php
if ( ! function_exists( 'themesflat_body_classes' ) ) {
	add_filter( 'body_class', 'themesflat_body_classes' );

	function themesflat_body_classes( $classes ) {
		$custom_page_class = themesflat_meta( 'custom_page_class' );

		$classes[] = $custom_page_class;

		/**
		 * layout version
		 */
		/**
		 * Header Absolute
		 */
		$header_absolute = themesflat_get_opt( 'header_absolute' );
		if ( themesflat_get_opt_elementor( 'header_absolute' ) != '' ) {
			$header_absolute = themesflat_get_opt_elementor( 'header_absolute' );
		}
		if ( $header_absolute == 1 ) {
			$classes[] = 'header-absolute';
		}

		/**
		 * Header Sticky
		 */
		$header_sticky = themesflat_get_opt( 'header_sticky' );
		if ( themesflat_get_opt_elementor( 'header_sticky' ) != '' ) {
			$header_sticky = themesflat_get_opt_elementor( 'header_sticky' );
		}
		if ( $header_sticky == 1 ) {
			$classes[] = 'header_sticky';
		}

		/**
		 * Header Style
		 */
		$style_header = themesflat_get_opt( 'style_header' );
		if ( themesflat_get_opt_elementor( 'style_header' ) != '' ) {
			$style_header = themesflat_get_opt_elementor( 'style_header' );
		}
		$classes[] = $style_header;

		/**
		 * Name Page
		 */
		$slug = get_post_field( 'post_name', get_post() );
		if ( $slug != '' ) {
			$classes[] = 'class-name-page-' . $slug;
		}

		/**
		 * No Sidebar
		 */
		$sidebar = themesflat_get_opt( 'blog_sidebar_list' );
		switch ( $sidebar ) {
			case 'blog-sidebar':
				if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
					$classes[] = 'no-sidebar';
				}
				break;
			case 'footer-1':
				if ( ! is_active_sidebar( 'footer-1' ) ) {
					$classes[] = 'no-sidebar';
				}
				break;
			case 'footer-2':
				if ( ! is_active_sidebar( 'footer-2' ) ) {
					$classes[] = 'no-sidebar';
				}
				break;
			case 'footer-3':
				if ( ! is_active_sidebar( 'footer-3' ) ) {
					$classes[] = 'no-sidebar';
				}
				break;
			case 'footer-4':
				if ( ! is_active_sidebar( 'footer-4' ) ) {
					$classes[] = 'no-sidebar';
				}
				break;
		}
		switch ( get_post_type() ) {
			case 'product':
				if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
					$classes[] = 'no-sidebar';
				}
				break;
		}

		return $classes;
	}
}