<?php
/*
Plugin Name: Themesflat Elementor
Description: The theme's components
Author: Themesflat
Version: 1.0.0
Text Domain: themesflat-elementor
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class ThemesFlat_Addon_For_Elementor_Bulter {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '5.2';

	private static $_instance = null;
	private static $meta_option;
	private static $current_page_type = null;
	private static $current_page_data = array();
	private static $user_selection;
	private static $location_selection;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
		define( 'URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME', plugins_url( '/', __FILE__ ) );

		add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ], 100 );
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ], 100 );

		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'widget_styles_editor' ], 100 );

		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ], 100 );
		add_action( 'admin_action_edit', array( $this, 'initialize_options' ) );
		add_action( 'wp_ajax_tfhf_get_posts_by_query', array( $this, 'tfhf_get_posts_by_query' ) );
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
	}

	public function i18n() {
		load_plugin_textdomain( 'themesflat-elementor', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'tf_admin_notice_missing_main_plugin' ] );

			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );

			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );

			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

		add_action( 'elementor/elements/categories_registered', function () {
			$elementsManager = \Elementor\Plugin::instance()->elements_manager;
			$elementsManager->add_category(
				'themesflat_addons',
				array(
					'title' => 'THEMESFLAT ADDONS',
					'icon'  => 'fonts',
				) );

			$elementsManager->add_category(
				'themesflat_addons_header_footer',
				array(
					'title' => 'THEMESFLAT ADDONS HEADER FOOTER',
					'icon'  => 'fonts',
				) );

			$elementsManager->add_category(
				'themesflat_addons_single_post',
				array(
					'title' => 'THEMESFLAT ADDONS SINGLE POST',
					'icon'  => 'fonts',
				) );

			$elementsManager->add_category(
				'themesflat_addons_wc',
				array(
					'title' => 'THEMESFLAT ADDONS WOO',
					'icon'  => 'fonts',
				) );
		} );

		require_once plugin_dir_path( __FILE__ ) . 'shortcode.php';
		require_once plugin_dir_path( __FILE__ ) . 'pagination.php';
		require_once plugin_dir_path( __FILE__ ) . 'tf-function.php';
		require_once plugin_dir_path( __FILE__ ) . 'addon-elementor-icon-manager.php';
		require_once plugin_dir_path( __FILE__ ) . 'tf-post-format.php';
		require_once plugin_dir_path( __FILE__ ) . 'tf-icons.php';

		add_action( 'init', [ $this, 'tf_header_footer_post_type' ] );
		add_action( 'add_meta_boxes', [ $this, 'tf_header_footer_register_metabox' ] );
		add_action( 'save_post', [ $this, 'tf_header_footer_save_meta' ] );
		add_filter( 'single_template', [ $this, 'tf_header_footer_load_canvas_template' ] );
		add_action( 'wp', [ $this, 'hooks' ], 100 );
		add_action( 'elementor/element/section/section_background/before_section_end', [
			$this,
			'tf_add_section_parallax'
		] );
		add_action( 'elementor/frontend/section/before_render', [ $this, 'tf_render_section_parallax' ] );
	}

	public function tf_admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'themesflat-elementor' ),
			'<strong>' . esc_html__( 'Themesflat Addons For Elementor', 'themesflat-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'themesflat-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themesflat-elementor' ),
			'<strong>' . esc_html__( 'Themesflat Addons For Elementor', 'themesflat-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'themesflat-elementor' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themesflat-elementor' ),
			'<strong>' . esc_html__( 'Themesflat Addons For Elementor', 'themesflat-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'themesflat-elementor' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {
		require_once( __DIR__ . '/widgets/widget-title-section.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFTitle_Section_Widget() );

		require_once( __DIR__ . '/widgets/widget-google-maps.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TF_Google_Maps_Widget() );

		require_once( __DIR__ . '/widgets/widget-counter.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFCounter_Widget() );

		require_once( __DIR__ . '/widgets/widget-team.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFTeam_Widget() );

		require_once( __DIR__ . '/widgets/widget-imagebox.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFImageBox_Widget() );

		require_once( __DIR__ . '/widgets/widget-testimonial-carousel.php' );
		 \Elementor\Plugin::instance()->widgets_manager->register( new \TFTestimonialCarousel_Widget() );

		require_once( __DIR__ . '/widgets/widget-testimonial-type-group-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFTestimonialTypeGroupCarousel_Widget() );

		require_once( __DIR__ . '/widgets/widget-practise-area.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFPractiseArea_Widget() );

		require_once( __DIR__ . '/widgets/widget-case-study.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFCaseStudy_Widget() );

		require_once( __DIR__ . '/widgets/widget-attorney.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFAttorney_Widget() );

		require_once( __DIR__ . '/widgets/widget-posts.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFPosts_Widget() );

		require_once( __DIR__ . '/widgets/widget-price-table.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFPriceTable_Widget() );

		require_once( __DIR__ . '/widgets/widget-tabs.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFTabs_Widget() );

		require_once( __DIR__ . '/widgets/widget-accordion.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFAccordion_Widget() );

		require_once( __DIR__ . '/widgets/widget-piechart.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFPieChart_Widget() );

		require_once( __DIR__ . '/widgets/widget-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFList_Widget() );

		// require_once( __DIR__ . '/widgets/widget-countdown.php' );
		// \Elementor\Plugin::instance()->widgets_manager->register( new \TFCountdown_Widget() );

		require_once( __DIR__ . '/widgets/widget-iconbox.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFIconBox_Widget() );

		require_once( __DIR__ . '/widgets/widget-progress-bar.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFProgressBars_Widget() );

		require_once( __DIR__ . '/widgets/widget-video.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFVideo_Widget() );


		require_once( __DIR__ . '/widgets/widget-navmenu.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFNavMenu_Widget() );

		require_once( __DIR__ . '/widgets/widget-button.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFButton_Widget() );

		require_once( __DIR__ . '/widgets/widget-social-icon.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFSocialIcon_Widget() );

		require_once( __DIR__ . '/widgets/widget-text-editor.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFTextEditor_Widget() );

		require_once( __DIR__ . '/widgets/widget-gallery.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFGallery_Widget() );

		require_once( __DIR__ . '/widgets/widget-quote.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFQuote_Widget() );

		require_once( __DIR__ . '/widgets/widget-latest-blog.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \TFLatest_Blog_Widget() );
	}

	public function init_controls() {
	}

	public function widget_styles() {
		if ( did_action( 'elementor/loaded' ) ) {
			wp_register_style( 'tf-font-awesome', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css', __FILE__ );
			wp_register_style( 'tf-regular', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/regular.min.css', __FILE__ );
		}

		//3rd
		wp_register_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) );
		wp_register_style( 'magnific-popup', plugins_url( '/assets/css/magnific.popup.css', __FILE__ ) );
		wp_register_style( 'parallax', plugins_url( '/assets/css/parallax.css', __FILE__ ) );
		wp_enqueue_style( 'parallax' );
		wp_register_style( 'jquery-justified', plugins_url( '/assets/css/jquery.justified.css', __FILE__ ) );
		wp_register_style( 'tf-animated', plugins_url( '/assets/css/tf-animated.css', __FILE__ ) );
		wp_enqueue_style( 'tf-animated' );
		wp_register_style( 'ladda', plugins_url( '/assets/vendor/ladda/ladda-themeless.min.css', __FILE__ ) );
		wp_enqueue_style( 'ladda' );

		//widget
		wp_register_style( 'tf-title-section', plugins_url( '/assets/css/title-section/tf-title-section.css', __FILE__ ) );

		wp_register_style( 'tf-counter', plugins_url( '/assets/css/counter/tf-counter.css', __FILE__ ) );
		wp_register_style( 'tf-team', plugins_url( '/assets/css/team/tf-team.css', __FILE__ ) );
		wp_register_style( 'tf-imagebox', plugins_url( '/assets/css/imagebox/tf-imagebox.css', __FILE__ ) );
		wp_register_style( 'tf-testimonial', plugins_url( '/assets/css/testimonial/tf-testimonial.css', __FILE__ ) );
		wp_register_style( 'tf-posts', plugins_url( '/assets/css/posts/tf-posts.css', __FILE__ ) );
		wp_register_style( 'tf-pricetable', plugins_url( '/assets/css/pricetable/tf-pricetable.css', __FILE__ ) );
		wp_register_style( 'tf-tabs', plugins_url( '/assets/css/tabs/tf-tabs.css', __FILE__ ) );
		wp_register_style( 'tf-accordion', plugins_url( '/assets/css/accordion/tf-accordion.css', __FILE__ ) );
		wp_register_style( 'tf-piechart', plugins_url( '/assets/css/piechart/tf-piechart.css', __FILE__ ) );
		wp_register_style( 'tf-list', plugins_url( '/assets/css/list/tf-list.css', __FILE__ ) );
		wp_register_style( 'tf-product', plugins_url( '/assets/css/product/tf-product.css', __FILE__ ) );
		wp_register_style( 'tf-product-categories', plugins_url( '/assets/css/product-categories/tf-product-categories.css', __FILE__ ) );
		wp_register_style( 'tf-iconbox', plugins_url( '/assets/css/iconbox/tf-iconbox.css', __FILE__ ) );
		wp_register_style( 'tf-navmenu', plugins_url( '/assets/css/navmenu/tf-navmenu.css', __FILE__ ) );
		wp_register_style( 'tf-video', plugins_url( '/assets/css/video/tf-video.css', __FILE__ ) );
		wp_register_style( 'tf-latest-blog', plugins_url( '/assets/css/latest-blog/latest-blog.css', __FILE__ ) );


		if ( is_rtl() ) {
			wp_style_add_data( 'tf-team', 'rtl', 'replace' );
			wp_style_add_data( 'tf-testimonial', 'rtl', 'replace' );
			wp_style_add_data( 'tf-posts', 'rtl', 'replace' );
			wp_style_add_data( 'tf-pricetable', 'rtl', 'replace' );
			wp_style_add_data( 'tf-iconbox', 'rtl', 'replace' );
			wp_style_add_data( 'tf-imagebox', 'rtl', 'replace' );
		}
	}

	public function widget_styles_editor() {
		if ( did_action( 'elementor/loaded' ) ) {
			wp_enqueue_style( 'tf-font-awesome', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css', __FILE__ );
		}
	}

	public function widget_scripts() {

		//3rd
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'jquery-easing', plugins_url( '/assets/js/jquery.easing.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'imagesloaded-pkgd', plugins_url( '/assets/js/imagesloaded.pkgd.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'jquery-isotope', plugins_url( '/assets/js/jquery.isotope.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'owl-carousel', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'appear', plugins_url( '/assets/js/appear.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'piechart', plugins_url( '/assets/js/piechart.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'magnific-popup', plugins_url( '/assets/js/magnific.popup.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'parallax', plugins_url( '/assets/js/parallax.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'jquery-justified', plugins_url( '/assets/js/jquery.justified.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'tf-animated', plugins_url( '/assets/js/tf-animated.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'ladda-spin', plugins_url( '/assets/vendor/ladda/spin.min.js', __FILE__ ), [ 'jquery' ], '1.0.5', true );
		wp_enqueue_script( 'ladda', plugins_url( '/assets/vendor/ladda/ladda.min.js', __FILE__ ), [
			'jquery',
			'ladda-spin'
		], '1.0.5', true );
		wp_enqueue_script( 'ladda-jquery', plugins_url( '/assets/vendor/ladda/ladda.jquery.min.js', __FILE__ ), [
			'jquery',
			'ladda'
		], '1.0.5', true );

		//widget
		wp_register_script( 'tf-counter', plugins_url( '/assets/js/counter/tf-counter.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-testimonial', plugins_url( '/assets/js/testimonial/tf-testimonial.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-posts', plugins_url( '/assets/js/posts/tf-posts.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-tabs', plugins_url( '/assets/js/tabs/tf-tabs.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-accordion', plugins_url( '/assets/js/accordion/tf-accordion.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-piechart', plugins_url( '/assets/js/piechart/tf-piechart.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-case-study', plugins_url( '/assets/js/case-study/tf-case-study.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-practise-area', plugins_url( '/assets/js/practise-area/practise-area.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-attorney', plugins_url( '/assets/js/attorney/attorney.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-product', plugins_url( '/assets/js/product/tf-product.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-progress-bar', plugins_url( '/assets/js/progress-bar/tf-progress-bar.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-video', plugins_url( '/assets/js/video/tf-video.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-doctor', plugins_url( '/assets/js/doctor/tf-doctor.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tf-portfolio', plugins_url( '/assets/js/portfolio/tf-portfolio.js', __FILE__ ), [ 'jquery' ], false, true );
		$ajax_url = admin_url( 'admin-ajax.php' );
		wp_localize_script( 'tf-project', 'ajaxAdminUrl', array(
			'url' => $ajax_url
		) );
	}

	public function admin_scripts() {
		wp_register_style( 'tf-select2', plugins_url( '/assets/css/admin/select2.css', __FILE__ ) );
		wp_enqueue_style( 'tf-select2' );
		wp_register_style( 'tf-admin', plugins_url( '/assets/css/admin/admin.css', __FILE__ ) );
		wp_enqueue_style( 'tf-admin' );

		wp_register_script( 'tf-select2', plugins_url( '/assets/js/admin/select2.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'tf-select2' );
		wp_register_script( 'tf-admin', plugins_url( '/assets/js/admin/admin.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'tf-admin' );
		wp_register_script( 'tf-admin-rule', plugins_url( '/assets/js/admin/admin-rule.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'tf-admin-rule' );
		$tfhf_localize_vars = array(
			'ajaxurl'    => admin_url( 'admin-ajax.php' ),
			'search'     => esc_html__( 'Search pages / post / categories', 'themesflat-elementor' ),
			'ajax_nonce' => wp_create_nonce( 'tfhf-get-posts-by-query' ),
		);
		wp_localize_script( 'tf-admin-rule', 'tfhf_localize_vars', $tfhf_localize_vars );
	}

	static function tf_get_template_elementor( $type = null ) {
		$args = [
			'post_type'      => 'elementor_library',
			'posts_per_page' => - 1,
		];
		if ( $type ) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'elementor_library_type',
					'field'    => 'slug',
					'terms'    => $type,
				],
			];
		}
		$template = get_posts( $args );
		$tpl      = array();
		if ( ! empty( $template ) && ! is_wp_error( $template ) ) {
			foreach ( $template as $post ) {
				$tpl[ $post->post_name ] = $post->post_title;
			}
		}

		return $tpl;
	}

	/*=========================================
	Post type header footer
	========================================= */
	public function tf_header_footer_post_type() {
		$labels = array(
			'name'               => esc_html__( 'TF Header - Footer Template', 'themesflat-elementor' ),
			'singular_name'      => esc_html__( 'TF Header - Footer Template', 'themesflat-elementor' ),
			'rewrite'            => array( 'slug' => esc_html__( 'TF Header - Footer Template' ) ),
			'menu_name'          => esc_html__( 'TF Header - Footer Template', 'themesflat-elementor' ),
			'add_new'            => esc_html__( 'Add New', 'themesflat-elementor' ),
			'add_new_item'       => esc_html__( 'Add New Template', 'themesflat-elementor' ),
			'new_item'           => esc_html__( 'New Template Item', 'themesflat-elementor' ),
			'edit_item'          => esc_html__( 'Edit Template Item', 'themesflat-elementor' ),
			'view_item'          => esc_html__( 'View Template', 'themesflat-elementor' ),
			'all_items'          => esc_html__( 'All Template', 'themesflat-elementor' ),
			'search_items'       => esc_html__( 'Search Template', 'themesflat-elementor' ),
			'not_found'          => esc_html__( 'No Template Items Found', 'themesflat-elementor' ),
			'not_found_in_trash' => esc_html__( 'No Template Items Found In Trash', 'themesflat-elementor' ),
			'parent_item_colon'  => esc_html__( 'Parent Template:', 'themesflat-elementor' ),

		);
		$args   = array(
			'labels'      => $labels,
			'supports'    => array( 'title', 'thumbnail', 'elementor' ),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => get_theme_mod( 'tf_header_footer_slug', 'tf_header_footer' ) ),
			'menu_icon'   => 'dashicons-admin-page',
		);
		register_post_type( 'tf_header_footer', $args );

		flush_rewrite_rules();
	}

	public function tf_header_footer_register_metabox() {
		add_meta_box(
			'tfhf-meta-box',
			esc_html__( 'TF Header Or Footer Options', 'themesflat-elementor' ),
			[ $this, 'tf_header_footer_metabox_render' ],
			'tf_header_footer', 'normal', 'high' );
	}

	public function tf_header_footer_metabox_render( $post ) {
		$values        = get_post_custom( $post->ID );
		$template_type = isset( $values['tfhf_template_type'] ) ? esc_attr( $values['tfhf_template_type'][0] ) : '';
		wp_nonce_field( 'tfhf_meta_nounce', 'tfhf_meta_nounce' );
		?>
        <table class="tfhf-options-table widefat">
            <tbody>
                <tr class="tfhf-options-row type-of-template">
                    <td class="tfhf-options-row-heading">
                        <label for="tfhf_template_type"><?php esc_html_e( 'Type of Template', 'themesflat-elementor' ); ?></label>
                    </td>
                    <td class="tfhf-options-row-content">
                        <select name="tfhf_template_type" id="tfhf_template_type">
                            <option value="" <?php selected( $template_type, '' ); ?>><?php esc_html_e( 'Select Option', 'themesflat-elementor' ); ?></option>
                            <option value="type_header" <?php selected( $template_type, 'type_header' ); ?>><?php esc_html_e( 'Header', 'themesflat-elementor' ); ?></option>
                            <option value="type_footer" <?php selected( $template_type, 'type_footer' ); ?>><?php esc_html_e( 'Footer', 'themesflat-elementor' ); ?></option>
                        </select>
                    </td>
                </tr>

				<?php $this->tf_header_footer_metabox_rule(); ?>
            </tbody>
        </table>
		<?php
	}

	public function tf_header_footer_metabox_rule() {
		$include_locations = get_post_meta( get_the_id(), 'tfhf_template_include_locations', true );
		$exclude_locations = get_post_meta( get_the_id(), 'tfhf_template_exclude_locations', true );
		?>
        <tr class="tfhf-target-rules-row tfhf-options-row">
            <td class="tfhf-target-rules-row-heading tfhf-options-row-heading">
                <label><?php esc_html_e( 'Display On', 'themesflat-elementor' ); ?></label>
            </td>
            <td class="tfhf-target-rules-row-content tfhf-options-row-content">
				<?php
				self::target_rule_settings_field(
					'tfhf-target-rules-location',
					[
						'title'          => esc_html__( 'Display Rules', 'themesflat-elementor' ),
						'value'          => '[{"type":"basic-global","specific":null}]',
						'tags'           => 'site,enable,target,pages',
						'rule_type'      => 'display',
						'add_rule_label' => esc_html__( 'Add Display Rule Group', 'themesflat-elementor' ),
					],
					$include_locations
				);
				?>
            </td>
        </tr>
        <tr class="tfhf-target-rules-row tfhf-options-row">
            <td class="tfhf-target-rules-row-heading tfhf-options-row-heading">
                <label><?php esc_html_e( 'Do Not Display On', 'themesflat-elementor' ); ?></label>
            </td>
            <td class="tfhf-target-rules-row-content tfhf-options-row-content">
				<?php
				self::target_rule_settings_field(
					'tfhf-target-rules-exclusion',
					[
						'title'          => esc_html__( 'Exclude On', 'themesflat-elementor' ),
						'value'          => '[]',
						'tags'           => 'site,enable,target,pages',
						'add_rule_label' => esc_html__( 'Add Exclusion Rule Group', 'themesflat-elementor' ),
						'rule_type'      => 'exclude',
					],
					$exclude_locations
				);
				?>
            </td>
        </tr>
		<?php
	}

	public function tf_header_footer_save_meta( $post_id ) {

		if ( isset( $_POST['tfhf_template_type'] ) ) {
			update_post_meta( $post_id, 'tfhf_template_type', esc_attr( $_POST['tfhf_template_type'] ) );
		}

		if ( ! isset( $_POST['tfhf_meta_nounce'] ) || ! wp_verify_nonce( $_POST['tfhf_meta_nounce'], 'tfhf_meta_nounce' ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}
		$target_locations = self::get_format_rule_value( $_POST, 'tfhf-target-rules-location' );
		update_post_meta( $post_id, 'tfhf_template_include_locations', $target_locations );
		$target_exclusion = self::get_format_rule_value( $_POST, 'tfhf-target-rules-exclusion' );
		update_post_meta( $post_id, 'tfhf_template_exclude_locations', $target_exclusion );

		return false;
	}

	public function tf_header_footer_load_canvas_template( $single_template ) {
		global $post;

		if ( 'tf_header_footer' == $post->post_type ) {
			$elementor_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

			if ( file_exists( $elementor_canvas ) ) {
				return $elementor_canvas;
			} else {
				return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
			}
		}

		return $single_template;
	}

	public static function tf_get_header_id() {
		$header_id = self::get_template_id( 'type_header' );

		if ( '' === $header_id ) {
			$header_id = false;
		}

		return apply_filters( 'tf_get_header_id', $header_id );
	}

	public static function tf_get_footer_id() {
		$footer_id = self::get_template_id( 'type_footer' );

		if ( '' === $footer_id ) {
			$footer_id = false;
		}

		return apply_filters( 'tf_get_footer_id', $footer_id );
	}

	public static function get_template_id( $type ) {
		$option = [
			'location'  => 'tfhf_template_include_locations',
			'exclusion' => 'tfhf_template_exclude_locations',
		];

		$tfhf_templates = ThemesFlat_Addon_For_Elementor_Bulter::instance()->get_posts_by_conditions( 'tf_header_footer', $option );

		foreach ( $tfhf_templates as $template ) {
			if ( get_post_meta( absint( $template['id'] ), 'tfhf_template_type', true ) === $type ) {
				return $template['id'];
			}
		}

		return '';

	}

	public static function get_settings( $setting = '', $default = '' ) {
		if ( 'type_header' == $setting || 'type_footer' == $setting ) {
			$templates = self::get_template_id( $setting );
			$template  = ! is_array( $templates ) ? $templates : $templates[0];

			return $template;
		}
	}

	public function hooks() {
		if ( tf_header_enabled() ) {
			add_action( 'get_header', [ $this, 'tf_override_header' ] );
			add_action( 'tf_header', [ $this, 'tf_render_header' ] );
		}

		if ( tf_footer_enabled() ) {
			add_action( 'get_footer', [ $this, 'tf_override_footer' ] );
			add_action( 'tf_footer', [ $this, 'tf_render_footer' ] );
		}
	}

	public function tf_override_header() {
		require_once plugin_dir_path( __FILE__ ) . 'tf-header.php';
		$templates   = [];
		$templates[] = 'header.php';
		remove_all_actions( 'wp_head' );
		ob_start();
		locate_template( $templates, true );
		ob_get_clean();
	}

	public function tf_override_footer() {
		require_once plugin_dir_path( __FILE__ ) . 'tf-footer.php';
		$templates   = [];
		$templates[] = 'footer.php';
		remove_all_actions( 'wp_footer' );
		ob_start();
		locate_template( $templates, true );
		ob_get_clean();
	}

	public static function get_header_content() {
		$tf_get_header_id = self::tf_get_header_id();
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $tf_get_header_id );
	}

	public static function get_footer_content() {
		$tf_get_footer_id = self::tf_get_footer_id();
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $tf_get_footer_id );
	}

	public function tf_render_header() {
		?>
        <section class="site-header tf-custom-header" role="banner">
            <div class="tf-container">
                <div class="tf-row">
                    <div class="tf-col">
						<?php echo self::get_header_content(); ?>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}

	public function tf_render_footer() {
		?>
        <section class="site-footer tf-custom-footer">
            <div class="tf-container">
                <div class="tf-row">
                    <div class="tf-col">
						<?php echo self::get_footer_content(); ?>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}

	/*=========================================
	post
	======================================== */
	static function tf_get_post_types() {
		$post_type_args = [
			'show_in_nav_menus' => true,
		];
		$post_types     = get_post_types( $post_type_args, 'objects' );

		foreach ( $post_types as $post_type ) {
			$post_type_name[ $post_type->name ] = $post_type->label;
		}

		return $post_type_name;
	}

	static function tf_get_taxonomies( $category = 'category' ) {
		$category_posts_name = array();
		$category_posts      = get_terms(
			array(
				'taxonomy' => $category,
			)
		);
		if ( $category_posts ) {
			foreach ( $category_posts as $category_post ) {
				if ( isset( $category_post->slug ) ) {
					$category_posts_name[ $category_post->slug ] = $category_post->name;
				}

			}
		}

		return $category_posts_name;
	}

	/*=========================================
	Rule Template
	======================================== */
	public function initialize_options() {
		self::$location_selection = self::get_location_selections();
	}

	public static function get_location_selections() {
		$args = array(
			'public'   => true,
			'_builtin' => true,
		);

		$post_types = get_post_types( $args, 'objects' );
		unset( $post_types['attachment'] );

		$args['_builtin'] = false;
		$custom_post_type = get_post_types( $args, 'objects' );

		$post_types = apply_filters( 'tfhf_location_rule_post_types', array_merge( $post_types, $custom_post_type ) );

		$special_pages = array(
			'special-404'    => esc_html__( '404 Page', 'themesflat-elementor' ),
			'special-search' => esc_html__( 'Search Page', 'themesflat-elementor' ),
			'special-blog'   => esc_html__( 'Blog / Posts Page', 'themesflat-elementor' ),
			'special-front'  => esc_html__( 'Front Page', 'themesflat-elementor' ),
			'special-date'   => esc_html__( 'Date Archive', 'themesflat-elementor' ),
			'special-author' => esc_html__( 'Author Archive', 'themesflat-elementor' ),
		);

		if ( class_exists( 'WooCommerce' ) ) {
			$special_pages['special-woo-shop'] = esc_html__( 'WooCommerce Shop Page', 'themesflat-elementor' );
		}

		$selection_options = array(
			'basic' => array(
				'label' => esc_html__( 'Basic', 'themesflat-elementor' ),
				'value' => array(
					'basic-global'    => esc_html__( 'Entire Website', 'themesflat-elementor' ),
					'basic-singulars' => esc_html__( 'All Singulars', 'themesflat-elementor' ),
					'basic-archives'  => esc_html__( 'All Archives', 'themesflat-elementor' ),
				),
			),

			'special-pages' => array(
				'label' => esc_html__( 'Special Pages', 'themesflat-elementor' ),
				'value' => $special_pages,
			),
		);

		$args = array(
			'public' => true,
		);

		$taxonomies = get_taxonomies( $args, 'objects' );

		if ( ! empty( $taxonomies ) ) {
			foreach ( $taxonomies as $taxonomy ) {

				if ( 'post_format' == $taxonomy->name ) {
					continue;
				}

				foreach ( $post_types as $post_type ) {
					$post_opt = self::get_post_target_rule_options( $post_type, $taxonomy );

					if ( isset( $selection_options[ $post_opt['post_key'] ] ) ) {
						if ( ! empty( $post_opt['value'] ) && is_array( $post_opt['value'] ) ) {
							foreach ( $post_opt['value'] as $key => $value ) {
								if ( ! in_array( $value, $selection_options[ $post_opt['post_key'] ]['value'] ) ) {
									$selection_options[ $post_opt['post_key'] ]['value'][ $key ] = $value;
								}
							}
						}
					} else {
						$selection_options[ $post_opt['post_key'] ] = array(
							'label' => $post_opt['label'],
							'value' => $post_opt['value'],
						);
					}
				}
			}
		}

		$selection_options['specific-target'] = array(
			'label' => esc_html__( 'Specific Target', 'themesflat-elementor' ),
			'value' => array(
				'specifics' => esc_html__( 'Specific Pages / Posts / Taxonomies, etc.', 'themesflat-elementor' ),
			),
		);

		return apply_filters( 'tfhf_display_on_list', $selection_options );
	}

	public static function get_location_by_key( $key ) {
		if ( ! isset( self::$location_selection ) || empty( self::$location_selection ) ) {
			self::$location_selection = self::get_location_selections();
		}
		$location_selection = self::$location_selection;

		foreach ( $location_selection as $location_grp ) {
			if ( isset( $location_grp['value'][ $key ] ) ) {
				return $location_grp['value'][ $key ];
			}
		}

		if ( strpos( $key, 'post-' ) !== false ) {
			$post_id = (int) str_replace( 'post-', '', $key );

			return get_the_title( $post_id );
		}

		if ( strpos( $key, 'tax-' ) !== false ) {
			$tax_id = (int) str_replace( 'tax-', '', $key );
			$term   = get_term( $tax_id );

			if ( ! is_wp_error( $term ) ) {
				$term_taxonomy = ucfirst( str_replace( '_', ' ', $term->taxonomy ) );

				return $term->name . ' - ' . $term_taxonomy;
			} else {
				return '';
			}
		}

		return $key;
	}

	public static function target_rule_settings_field( $name, $settings, $value ) {
		$input_name     = $name;
		$type           = isset( $settings['type'] ) ? $settings['type'] : 'target_rule';
		$class          = isset( $settings['class'] ) ? $settings['class'] : '';
		$rule_type      = isset( $settings['rule_type'] ) ? $settings['rule_type'] : 'target_rule';
		$add_rule_label = isset( $settings['add_rule_label'] ) ? $settings['add_rule_label'] : esc_html__( 'Add Rule', 'themesflat-elementor' );
		$saved_values   = $value;
		$output         = '';

		if ( isset( self::$location_selection ) || empty( self::$location_selection ) ) {
			self::$location_selection = self::get_location_selections();
		}
		$selection_options = self::$location_selection;

		$output .= '<script type="text/html" id="tmpl-tfhf-target-rule-' . $rule_type . '-condition">';
		$output .= '<div class="tfhf-target-rule-condition tfhf-target-rule-{{data.id}}" data-rule="{{data.id}}" >';
		$output .= '<span class="target_rule-condition-delete dashicons dashicons-dismiss"></span>';

		$output .= '<div class="target_rule-condition-wrap" >';
		$output .= '<select name="' . esc_attr( $input_name ) . '[rule][{{data.id}}]" class="target_rule-condition form-control tfhf-input">';
		$output .= '<option value="">' . esc_html__( 'Select', 'themesflat-elementor' ) . '</option>';

		foreach ( $selection_options as $group => $group_data ) {
			$output .= '<optgroup label="' . $group_data['label'] . '">';
			foreach ( $group_data['value'] as $opt_key => $opt_value ) {
				$output .= '<option value="' . $opt_key . '">' . $opt_value . '</option>';
			}
			$output .= '</optgroup>';
		}
		$output .= '</select>';
		$output .= '</div>';

		$output .= '</div>';

		$output .= '<div class="target_rule-specific-page-wrap" style="display:none">';
		$output .= '<select name="' . esc_attr( $input_name ) . '[specific][]" class="target-rule-select2 target_rule-specific-page form-control tfhf-input " multiple="multiple">';
		$output .= '</select>';
		$output .= '</div>';

		$output .= '</script>';

		$output .= '<div class="tfhf-target-rule-wrapper tfhf-target-rule-' . $rule_type . '-on-wrap" data-type="' . $rule_type . '">';
		$output .= '<div class="tfhf-target-rule-selector-wrapper tfhf-target-rule-' . $rule_type . '-on">';
		$output .= self::generate_target_rule_selector( $rule_type, $selection_options, $input_name, $saved_values, $add_rule_label );
		$output .= '</div>';

		$output .= '</div>';

		echo $output;
	}

	public static function get_post_target_rule_options( $post_type, $taxonomy ) {
		$post_key    = str_replace( ' ', '-', strtolower( $post_type->label ) );
		$post_label  = ucwords( $post_type->label );
		$post_name   = $post_type->name;
		$post_option = array();

		$all_posts                          = sprintf( esc_html__( 'All %s', 'themesflat-elementor' ), $post_label );
		$post_option[ $post_name . '|all' ] = $all_posts;

		if ( 'pages' != $post_key ) {

			$all_archive                                = sprintf( esc_html__( 'All %s Archive', 'themesflat-elementor' ), $post_label );
			$post_option[ $post_name . '|all|archive' ] = $all_archive;
		}

		if ( in_array( $post_type->name, $taxonomy->object_type ) ) {
			$tax_label = ucwords( $taxonomy->label );
			$tax_name  = $taxonomy->name;

			$tax_archive = sprintf( esc_html__( 'All %s Archive', 'themesflat-elementor' ), $tax_label );

			$post_option[ $post_name . '|all|taxarchive|' . $tax_name ] = $tax_archive;
		}

		$post_output['post_key'] = $post_key;
		$post_output['label']    = $post_label;
		$post_output['value']    = $post_option;

		return $post_output;
	}

	public static function generate_target_rule_selector( $type, $selection_options, $input_name, $saved_values, $add_rule_label ) {
		$output = '<div class="target_rule-builder-wrap">';

		if ( ! is_array( $saved_values ) || ( is_array( $saved_values ) && empty( $saved_values ) ) ) {
			$saved_values                = array();
			$saved_values['rule'][0]     = '';
			$saved_values['specific'][0] = '';
		}

		$index = 0;

		foreach ( $saved_values['rule'] as $index => $data ) {
			$output .= '<div class="tfhf-target-rule-condition tfhf-target-rule-' . $index . '" data-rule="' . $index . '" >';

			$output .= '<span class="target_rule-condition-delete dashicons dashicons-dismiss"></span>';
			$output .= '<div class="target_rule-condition-wrap" >';
			$output .= '<select name="' . esc_attr( $input_name ) . '[rule][' . $index . ']" class="target_rule-condition form-control tfhf-input">';
			$output .= '<option value="">' . esc_html__( 'Select', 'themesflat-elementor' ) . '</option>';

			foreach ( $selection_options as $group => $group_data ) {
				$output .= '<optgroup label="' . $group_data['label'] . '">';
				foreach ( $group_data['value'] as $opt_key => $opt_value ) {

					$selected = '';

					if ( $data == $opt_key ) {
						$selected = 'selected="selected"';
					}

					$output .= '<option value="' . $opt_key . '" ' . $selected . '>' . $opt_value . '</option>';
				}
				$output .= '</optgroup>';
			}
			$output .= '</select>';
			$output .= '</div>';

			$output .= '</div>';

			$output .= '<div class="target_rule-specific-page-wrap" style="display:none">';
			$output .= '<select name="' . esc_attr( $input_name ) . '[specific][]" class="target-rule-select2 target_rule-specific-page form-control tfhf-input " multiple="multiple">';

			if ( 'specifics' == $data && isset( $saved_values['specific'] ) && null != $saved_values['specific'] && is_array( $saved_values['specific'] ) ) {
				foreach ( $saved_values['specific'] as $data_key => $sel_value ) {

					if ( strpos( $sel_value, 'post-' ) !== false ) {
						$post_id    = (int) str_replace( 'post-', '', $sel_value );
						$post_title = get_the_title( $post_id );
						$output     .= '<option value="post-' . $post_id . '" selected="selected" >' . $post_title . '</option>';
					}

					if ( strpos( $sel_value, 'tax-' ) !== false ) {
						$tax_data = explode( '-', $sel_value );

						$tax_id    = (int) str_replace( 'tax-', '', $sel_value );
						$term      = get_term( $tax_id );
						$term_name = '';

						if ( ! is_wp_error( $term ) ) {
							$term_taxonomy = ucfirst( str_replace( '_', ' ', $term->taxonomy ) );

							if ( isset( $tax_data[2] ) && 'single' === $tax_data[2] ) {
								$term_name = 'All singulars from ' . $term->name;
							} else {
								$term_name = $term->name . ' - ' . $term_taxonomy;
							}
						}

						$output .= '<option value="' . $sel_value . '" selected="selected" >' . $term_name . '</option>';
					}
				}
			}
			$output .= '</select>';
			$output .= '</div>';
		}

		$output .= '</div>';

		$output .= '<div class="target_rule-add-rule-wrap">';
		$output .= '<a href="#" class="button" data-rule-id="' . absint( $index ) . '" data-rule-type="' . $type . '">' . $add_rule_label . '</a>';
		$output .= '</div>';

		if ( 'display' == $type ) {

			$output .= '<div class="target_rule-add-exclusion-rule">';
			$output .= '<a href="#" class="button">' . esc_html__( 'Add Exclusion Rule Group', 'themesflat-elementor' ) . '</a>';
			$output .= '</div>';
		}

		return $output;
	}

	public static function get_format_rule_value( $save_data, $key ) {
		$meta_value = array();

		if ( isset( $save_data[ $key ]['rule'] ) ) {
			$save_data[ $key ]['rule'] = array_unique( $save_data[ $key ]['rule'] );
			if ( isset( $save_data[ $key ]['specific'] ) ) {
				$save_data[ $key ]['specific'] = array_unique( $save_data[ $key ]['specific'] );
			}

			$index = array_search( '', $save_data[ $key ]['rule'] );
			if ( false !== $index ) {
				unset( $save_data[ $key ]['rule'][ $index ] );
			}
			$index = array_search( 'specifics', $save_data[ $key ]['rule'] );
			if ( false !== $index ) {
				unset( $save_data[ $key ]['rule'][ $index ] );

				if ( isset( $save_data[ $key ]['specific'] ) && is_array( $save_data[ $key ]['specific'] ) ) {
					array_push( $save_data[ $key ]['rule'], 'specifics' );
				}
			}

			foreach ( $save_data[ $key ] as $meta_key => $value ) {
				if ( ! empty( $value ) ) {
					$meta_value[ $meta_key ] = array_map( 'esc_attr', $value );
				}
			}
			if ( ! isset( $meta_value['rule'] ) || ! in_array( 'specifics', $meta_value['rule'] ) ) {
				$meta_value['specific'] = array();
			}

			if ( empty( $meta_value['rule'] ) ) {
				$meta_value = array();
			}
		}

		return $meta_value;
	}

	public function get_current_page_type() {
		if ( null === self::$current_page_type ) {
			$page_type  = '';
			$current_id = false;

			if ( is_404() ) {
				$page_type = 'is_404';
			} elseif ( is_search() ) {
				$page_type = 'is_search';
			} elseif ( is_archive() ) {
				$page_type = 'is_archive';

				if ( is_category() || is_tag() || is_tax() ) {
					$page_type = 'is_tax';
				} elseif ( is_date() ) {
					$page_type = 'is_date';
				} elseif ( is_author() ) {
					$page_type = 'is_author';
				} elseif ( function_exists( 'is_shop' ) && is_shop() ) {
					$page_type = 'is_woo_shop_page';
				}
			} elseif ( is_home() ) {
				$page_type = 'is_home';
			} elseif ( is_front_page() ) {
				$page_type  = 'is_front_page';
				$current_id = get_the_id();
			} elseif ( is_singular() ) {
				$page_type  = 'is_singular';
				$current_id = get_the_id();
			} else {
				$current_id = get_the_id();
			}

			self::$current_page_data['ID'] = $current_id;
			self::$current_page_type       = $page_type;
		}

		return self::$current_page_type;
	}

	public static function get_meta_option_post( $post_type, $option ) {
		$page_meta = ( isset( $option['page_meta'] ) && '' != $option['page_meta'] ) ? $option['page_meta'] : false;

		if ( false !== $page_meta ) {
			$current_post_id = isset( $option['current_post_id'] ) ? $option['current_post_id'] : false;
			$meta_id         = get_post_meta( $current_post_id, $option['page_meta'], true );

			if ( false !== $meta_id && '' != $meta_id ) {
				self::$current_page_data[ $post_type ][ $meta_id ] = array(
					'id'       => $meta_id,
					'location' => '',
				);

				return self::$current_page_data[ $post_type ];
			}
		}

		return false;
	}

	function tfhf_get_posts_by_query() {

		check_ajax_referer( 'tfhf-get-posts-by-query', 'nonce' );

		$search_string = isset( $_POST['q'] ) ? sanitize_text_field( $_POST['q'] ) : '';
		$data          = array();
		$result        = array();

		$args = array(
			'public'   => true,
			'_builtin' => false,
		);

		$output     = 'names';
		$operator   = 'and';
		$post_types = get_post_types( $args, $output, $operator );

		unset( $post_types['tf_header_footer'] );

		$post_types['Posts'] = 'post';
		$post_types['Pages'] = 'page';

		foreach ( $post_types as $key => $post_type ) {
			$data = array();

			add_filter( 'posts_search', array( $this, 'search_only_titles' ), 10, 2 );

			$query = new \WP_Query(
				array(
					's'              => $search_string,
					'post_type'      => $post_type,
					'posts_per_page' => - 1,
				)
			);

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$title  = get_the_title();
					$title  .= ( 0 != $query->post->post_parent ) ? ' (' . get_the_title( $query->post->post_parent ) . ')' : '';
					$id     = get_the_id();
					$data[] = array(
						'id'   => 'post-' . $id,
						'text' => $title,
					);
				}
			}

			if ( is_array( $data ) && ! empty( $data ) ) {
				$result[] = array(
					'text'     => $key,
					'children' => $data,
				);
			}
		}

		$data = array();

		wp_reset_postdata();

		$args = array(
			'public' => true,
		);

		$output     = 'objects';
		$operator   = 'and';
		$taxonomies = get_taxonomies( $args, $output, $operator );

		foreach ( $taxonomies as $taxonomy ) {
			$terms = get_terms(
				$taxonomy->name,
				array(
					'orderby'    => 'count',
					'hide_empty' => 0,
					'name__like' => $search_string,
				)
			);

			$data = array();

			$label = ucwords( $taxonomy->label );

			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$term_taxonomy_name = ucfirst( str_replace( '_', ' ', $taxonomy->name ) );

					$data[] = array(
						'id'   => 'tax-' . $term->term_id,
						'text' => $term->name . ' archive page',
					);

					$data[] = array(
						'id'   => 'tax-' . $term->term_id . '-single-' . $taxonomy->name,
						'text' => 'All singulars from ' . $term->name,
					);
				}
			}

			if ( is_array( $data ) && ! empty( $data ) ) {
				$result[] = array(
					'text'     => $label,
					'children' => $data,
				);
			}
		}

		wp_send_json( $result );
	}

	function search_only_titles( $search, $wp_query ) {
		if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
			global $wpdb;

			$q = $wp_query->query_vars;
			$n = ! empty( $q['exact'] ) ? '' : '%';

			$search = array();

			foreach ( (array) $q['search_terms'] as $term ) {
				$search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );
			}

			if ( ! is_user_logged_in() ) {
				$search[] = "$wpdb->posts.post_password = ''";
			}

			$search = ' AND ' . implode( ' AND ', $search );
		}

		return $search;
	}

	public function parse_layout_display_condition( $post_id, $rules ) {
		$display           = false;
		$current_post_type = get_post_type( $post_id );

		if ( isset( $rules['rule'] ) && is_array( $rules['rule'] ) && ! empty( $rules['rule'] ) ) {
			foreach ( $rules['rule'] as $key => $rule ) {
				if ( strrpos( $rule, 'all' ) !== false ) {
					$rule_case = 'all';
				} else {
					$rule_case = $rule;
				}

				switch ( $rule_case ) {
					case 'basic-global':
						$display = true;
						break;

					case 'basic-singulars':
						if ( is_singular() ) {
							$display = true;
						}
						break;

					case 'basic-archives':
						if ( is_archive() ) {
							$display = true;
						}
						break;

					case 'special-404':
						if ( is_404() ) {
							$display = true;
						}
						break;

					case 'special-search':
						if ( is_search() ) {
							$display = true;
						}
						break;

					case 'special-blog':
						if ( is_home() ) {
							$display = true;
						}
						break;

					case 'special-front':
						if ( is_front_page() ) {
							$display = true;
						}
						break;

					case 'special-date':
						if ( is_date() ) {
							$display = true;
						}
						break;

					case 'special-author':
						if ( is_author() ) {
							$display = true;
						}
						break;

					case 'special-woo-shop':
						if ( function_exists( 'is_shop' ) && is_shop() ) {
							$display = true;
						}
						break;

					case 'all':
						$rule_data = explode( '|', $rule );

						$post_type     = isset( $rule_data[0] ) ? $rule_data[0] : false;
						$archieve_type = isset( $rule_data[2] ) ? $rule_data[2] : false;
						$taxonomy      = isset( $rule_data[3] ) ? $rule_data[3] : false;
						if ( false === $archieve_type ) {
							$current_post_type = get_post_type( $post_id );

							if ( false !== $post_id && $current_post_type == $post_type ) {
								$display = true;
							}
						} else {
							if ( is_archive() ) {
								$current_post_type = get_post_type();
								if ( $current_post_type == $post_type ) {
									if ( 'archive' == $archieve_type ) {
										$display = true;
									} elseif ( 'taxarchive' == $archieve_type ) {
										$obj              = get_queried_object();
										$current_taxonomy = '';
										if ( '' !== $obj && null !== $obj ) {
											$current_taxonomy = $obj->taxonomy;
										}

										if ( $current_taxonomy == $taxonomy ) {
											$display = true;
										}
									}
								}
							}
						}
						break;

					case 'specifics':
						if ( isset( $rules['specific'] ) && is_array( $rules['specific'] ) ) {
							foreach ( $rules['specific'] as $specific_page ) {
								$specific_data = explode( '-', $specific_page );

								$specific_post_type = isset( $specific_data[0] ) ? $specific_data[0] : false;
								$specific_post_id   = isset( $specific_data[1] ) ? $specific_data[1] : false;
								if ( 'post' == $specific_post_type ) {
									if ( $specific_post_id == $post_id ) {
										$display = true;
									}
								} elseif ( isset( $specific_data[2] ) && ( 'single' == $specific_data[2] ) && 'tax' == $specific_post_type ) {
									if ( is_singular() ) {
										$term_details = get_term( $specific_post_id );

										if ( isset( $term_details->taxonomy ) ) {
											$has_term = has_term( (int) $specific_post_id, $term_details->taxonomy, $post_id );

											if ( $has_term ) {
												$display = true;
											}
										}
									}
								} elseif ( 'tax' == $specific_post_type ) {
									$tax_id = get_queried_object_id();
									if ( $specific_post_id == $tax_id ) {
										$display = true;
									}
								}
							}
						}
						break;

					default:
						break;
				}

				if ( $display ) {
					break;
				}
			}
		}

		return $display;
	}

	public function get_posts_by_conditions( $post_type, $option ) {
		global $wpdb;
		global $post;

		$post_type = $post_type ? esc_sql( $post_type ) : esc_sql( $post->post_type );

		if ( is_array( self::$current_page_data ) && isset( self::$current_page_data[ $post_type ] ) ) {
			return apply_filters( 'tfhf_get_display_posts_by_conditions', self::$current_page_data[ $post_type ], $post_type );
		}

		$current_page_type = $this->get_current_page_type();

		self::$current_page_data[ $post_type ] = array();

		$option['current_post_id'] = self::$current_page_data['ID'];
		$meta_header               = self::get_meta_option_post( $post_type, $option );

		if ( false === $meta_header ) {
			$current_post_type = esc_sql( get_post_type() );
			$current_post_id   = false;
			$q_obj             = get_queried_object();

			$location = isset( $option['location'] ) ? esc_sql( $option['location'] ) : '';

			$query = "SELECT p.ID, pm.meta_value FROM {$wpdb->postmeta} as pm
                            INNER JOIN {$wpdb->posts} as p ON pm.post_id = p.ID
                            WHERE pm.meta_key = '{$location}'
                            AND p.post_type = '{$post_type}'
                            AND p.post_status = 'publish'";

			$orderby = ' ORDER BY p.post_date DESC';

			$meta_args = "pm.meta_value LIKE '%\"basic-global\"%'";

			switch ( $current_page_type ) {
				case 'is_404':
					$meta_args .= " OR pm.meta_value LIKE '%\"special-404\"%'";
					break;
				case 'is_search':
					$meta_args .= " OR pm.meta_value LIKE '%\"special-search\"%'";
					break;
				case 'is_archive':
				case 'is_tax':
				case 'is_date':
				case 'is_author':
					$meta_args .= " OR pm.meta_value LIKE '%\"basic-archives\"%'";
					$meta_args .= " OR pm.meta_value LIKE '%\"{$current_post_type}|all|archive\"%'";

					if ( 'is_tax' == $current_page_type && ( is_category() || is_tag() || is_tax() ) ) {
						if ( is_object( $q_obj ) ) {
							$meta_args .= " OR pm.meta_value LIKE '%\"{$current_post_type}|all|taxarchive|{$q_obj->taxonomy}\"%'";
							$meta_args .= " OR pm.meta_value LIKE '%\"tax-{$q_obj->term_id}\"%'";
						}
					} elseif ( 'is_date' == $current_page_type ) {
						$meta_args .= " OR pm.meta_value LIKE '%\"special-date\"%'";
					} elseif ( 'is_author' == $current_page_type ) {
						$meta_args .= " OR pm.meta_value LIKE '%\"special-author\"%'";
					}
					break;
				case 'is_home':
					$meta_args .= " OR pm.meta_value LIKE '%\"special-blog\"%'";
					break;
				case 'is_front_page':
					$current_id      = esc_sql( get_the_id() );
					$current_post_id = $current_id;
					$meta_args       .= " OR pm.meta_value LIKE '%\"special-front\"%'";
					$meta_args       .= " OR pm.meta_value LIKE '%\"{$current_post_type}|all\"%'";
					$meta_args       .= " OR pm.meta_value LIKE '%\"post-{$current_id}\"%'";
					break;
				case 'is_singular':
					$current_id      = esc_sql( get_the_id() );
					$current_post_id = $current_id;
					$meta_args       .= " OR pm.meta_value LIKE '%\"basic-singulars\"%'";
					$meta_args       .= " OR pm.meta_value LIKE '%\"{$current_post_type}|all\"%'";
					$meta_args       .= " OR pm.meta_value LIKE '%\"post-{$current_id}\"%'";

					$taxonomies = get_object_taxonomies( $q_obj->post_type );
					$terms      = wp_get_post_terms( $q_obj->ID, $taxonomies );

					foreach ( $terms as $key => $term ) {
						$meta_args .= " OR pm.meta_value LIKE '%\"tax-{$term->term_id}-single-{$term->taxonomy}\"%'";
					}

					break;
				case 'is_woo_shop_page':
					$meta_args .= " OR pm.meta_value LIKE '%\"special-woo-shop\"%'";
					break;
				case '':
					$current_post_id = get_the_id();
					break;
			}

			$posts = $wpdb->get_results( $query . ' AND (' . $meta_args . ')' . $orderby );

			foreach ( $posts as $local_post ) {
				self::$current_page_data[ $post_type ][ $local_post->ID ] = array(
					'id'       => $local_post->ID,
					'location' => unserialize( $local_post->meta_value ),
				);
			}

			$option['current_post_id'] = $current_post_id;

			$this->remove_exclusion_rule_posts( $post_type, $option );
		}

		return apply_filters( 'tfhf_get_display_posts_by_conditions', self::$current_page_data[ $post_type ], $post_type );
	}

	public function remove_exclusion_rule_posts( $post_type, $option ) {
		$exclusion       = isset( $option['exclusion'] ) ? $option['exclusion'] : '';
		$current_post_id = isset( $option['current_post_id'] ) ? $option['current_post_id'] : false;

		foreach ( self::$current_page_data[ $post_type ] as $c_post_id => $c_data ) {
			$exclusion_rules = get_post_meta( $c_post_id, $exclusion, true );
			$is_exclude      = $this->parse_layout_display_condition( $current_post_id, $exclusion_rules );

			if ( $is_exclude ) {
				unset( self::$current_page_data[ $post_type ][ $c_post_id ] );
			}
		}
	}

	/*=========================================
	WOO
	======================================== */
	static function tf_get_taxonomies_product( $category = 'product_cat' ) {
		$category_posts = get_terms( array(
			'taxonomy'   => $category,
			'hide_empty' => true,
		) );

		foreach ( $category_posts as $category_post ) {
			$category_posts_name[ $category_post->slug ] = $category_post->name;
		}

		return $category_posts_name;
	}

	static function themesflat_mini_cart_count() {
		if ( class_exists( 'woocommerce' ) ) {
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				if ( ! empty( WC()->cart ) ) {
					$count = WC()->cart->cart_contents_count;

					return $count;
				} else {
					$count = 0;

					return $count;
				}
			}
		}
	}

	/*=========================================
	Parallax
	======================================== */
	public function tf_add_section_parallax( \Elementor\Element_Section $section ) {
		$section->add_control(
			'h_tf_section_parallax',
			[
				'label'     => esc_html__( 'TF Parallax', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$section->add_control(
			'tf_section_parallax',
			[
				'label'        => esc_html__( 'Parallax', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'default'      => 'no',
				'prefix_class' => 'tf-parallax-',
				'conditions'   => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'background_image[url]',
							'operator' => '!==',
							'value'    => '',
						]
					],
				],
			]
		);
		$section->add_control(
			'tf_position_parallax',
			[
				'label'       => esc_html__( 'Position', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'This is analogous to the background-position css property. Specify coordinates as top, bottom, right, left, center, or pixel values (e.g. -10px 0px). The parallax image will be positioned as close to these values as possible while still covering the target element.', 'themesflat-elementor' ),
				'default'     => '',
				'options'     => [
					''              => esc_html__( 'Default', 'themesflat-elementor' ),
					'center center' => esc_html__( 'Center Center', 'themesflat-elementor' ),
					'center left'   => esc_html__( 'Center Left', 'themesflat-elementor' ),
					'center right'  => esc_html__( 'Center Right', 'themesflat-elementor' ),
					'top center'    => esc_html__( 'Top Center', 'themesflat-elementor' ),
					'top left'      => esc_html__( 'Top Left', 'themesflat-elementor' ),
					'top right'     => esc_html__( 'Top Right', 'themesflat-elementor' ),
					'bottom center' => esc_html__( 'Bottom Center', 'themesflat-elementor' ),
					'bottom left'   => esc_html__( 'Bottom Left', 'themesflat-elementor' ),
					'bottom right'  => esc_html__( 'Bottom Right', 'themesflat-elementor' ),
					'custom'        => esc_html__( 'Custom', 'themesflat-elementor' ),
				],
				'condition'   => [
					'tf_section_parallax' => 'yes'
				],
			]
		);
		$section->add_control(
			'tf_position_parallax_x',
			[
				'label'      => esc_html__( 'X Position', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => - 800,
						'max'  => 800,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 0,
				],
				'condition'  => [
					'tf_section_parallax'  => 'yes',
					'tf_position_parallax' => 'custom',
				],
			]
		);
		$section->add_control(
			'tf_position_parallax_y',
			[
				'label'      => esc_html__( 'Y Position', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => - 800,
						'max'  => 800,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 0,
				],
				'condition'  => [
					'tf_section_parallax'  => 'yes',
					'tf_position_parallax' => 'custom',
				],
			]
		);
		$section->add_control(
			'tf_speed_parallax',
			[
				'label'       => esc_html__( 'Speed', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::SLIDER,
				'description' => esc_html__( 'The speed at which the parallax effect runs. 0 means the image will appear fixed in place, and 1 the image will flow at the same speed as the page content.', 'themesflat-elementor' ),
				'size_units'  => [ 'px' ],
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 1,
						'step' => 0.1,
					],
				],
				'default'     => [
					'unit' => 'px',
					'size' => 0.2,
				],
				'condition'   => [
					'tf_section_parallax' => 'yes',
				],
			]
		);
		$section->add_control(
			'tf_bleed_parallax',
			[
				'label'       => esc_html__( 'Bleed', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'description' => esc_html__( 'You can optionally set the parallax mirror element to extend a few pixels above and below the mirrored element. This can hide slow or stuttering scroll events in certain browsers.', 'themesflat-elementor' ),
				'min'         => 0,
				'condition'   => [
					'tf_section_parallax' => 'yes',
				],
			]
		);

	}

	public function tf_render_section_parallax( \Elementor\Element_Base $element ) {
		if ( 'section' === $element->get_name() ) {
			if ( 'yes' === $element->get_settings_for_display( 'tf_section_parallax' ) ) {

				$tf_background     = $element->get_settings_for_display( 'background_image' );
				$tf_background_URL = $tf_background['url'];
				$element->add_render_attribute( '_wrapper', [
					'class'          => 'tf-parallax',
					'data-parallax'  => 'scroll',
					'data-image-src' => $tf_background_URL,
					'data-zIndex'    => '-100',
				] );

				$tf_position_parallax = $element->get_settings_for_display( 'tf_position_parallax' );
				if ( $tf_position_parallax == 'custom' ) {
					$tf_position_parallax_x = $element->get_settings_for_display( 'tf_position_parallax_x' );
					$tf_position_parallax_x = $tf_position_parallax_x['size'];
					$tf_position_parallax_y = $element->get_settings_for_display( 'tf_position_parallax_y' );
					$tf_position_parallax_y = $tf_position_parallax_y['size'];
					$element->add_render_attribute( '_wrapper', [
						'data-positionX' => $tf_position_parallax_x,
						'data-positionY' => $tf_position_parallax_y,
					] );
				} else {
					$element->add_render_attribute( '_wrapper', [
						'data-position' => $tf_position_parallax,
					] );
				}

				$tf_speed_parallax = $element->get_settings_for_display( 'tf_speed_parallax' );
				$tf_speed_parallax = $tf_speed_parallax['size'];
				$element->add_render_attribute( '_wrapper', [
					'data-speed' => $tf_speed_parallax,
				] );

				$tf_bleed_parallax = $element->get_settings_for_display( 'tf_bleed_parallax' );
				if ( $tf_bleed_parallax ) {
					$element->add_render_attribute( '_wrapper', [
						'data-bleed' => $tf_bleed_parallax,
					] );
				}
			}
		}
	}

}

ThemesFlat_Addon_For_Elementor_Bulter::instance();