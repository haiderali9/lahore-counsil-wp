<?php
use Elementor\Modules\DynamicTags\Module as TagsModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TF_Google_Maps_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-google_maps';
	}

	public function get_title() {
		return esc_html__( 'TF Google Maps', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'google', 'map', 'embed', 'location' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_map',
			[
				'label' => esc_html__( 'Map', 'themesflat-elementor' ),
			]
		);

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			$api_key = get_option( 'elementor_google_maps_api_key' );

			if ( ! $api_key ) {
				$this->add_control(
					'api_key_notification',
					[
						'type' => \Elementor\Controls_Manager::RAW_HTML,
						'raw' => sprintf(
							/* translators: 1: Link to integrations settings tab, 2: Link to google maps api key documentation. */
							esc_html__( 'Set your Google Maps API Key in Elementor\'s <a href="%1$s" target="_blank">Integrations Settings</a> page. Create your key <a href="%2$s" target="_blank">here.', 'themesflat-elementor' ),
                            \Elementor\Settings::get_url() . '#tab-integrations',
							'https://developers.google.com/maps/documentation/embed/get-api-key'
						),
						'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
					]
				);
			}
		}

		$default_address = esc_html__( 'London Eye, London, United Kingdom', 'themesflat-elementor' );
		$this->add_control(
			'address',
			[
				'label' => esc_html__( 'Location', 'themesflat-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
					],
				],
				'placeholder' => $default_address,
				'default' => $default_address,
				'label_block' => true,
			]
		);

		$this->add_control(
			'zoom',
			[
				'label' => esc_html__( 'Zoom', 'themesflat-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'themesflat-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 40,
						'max' => 1440,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'themesflat-elementor' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_map_style',
			[
				'label' => esc_html__( 'Map', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'map_filter' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			]
		);

		$this->add_group_control(
            \Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} iframe',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
			]
		);

		$this->add_group_control(
            \Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover iframe',
			]
		);

		$this->add_control(
			'hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'themesflat-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} iframe' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['address'] ) ) {
			return;
		}

		if ( 0 === absint( $settings['zoom']['size'] ) ) {
			$settings['zoom']['size'] = 10;
		}

		$api_key = esc_html( get_option( 'elementor_google_maps_api_key' ) );

		$params = [
			rawurlencode( $settings['address'] ),
			absint( $settings['zoom']['size'] ),
		];

		if ( $api_key ) {
			$params[] = $api_key;

			$url = 'https://www.google.com/maps/embed/v1/place?key=%3$s&q=%1$s&amp;zoom=%2$d';
		} else {
			$url = 'https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near';
		}

		?>
		<div class="elementor-custom-embed">
			<iframe
					src="<?php echo esc_url( vsprintf( $url, $params ) ); ?>"
					title="<?php echo esc_attr( $settings['address'] ); ?>"
					aria-label="<?php echo esc_attr( $settings['address'] ); ?>"
			></iframe>
		</div>
		<?php
	}	
}
