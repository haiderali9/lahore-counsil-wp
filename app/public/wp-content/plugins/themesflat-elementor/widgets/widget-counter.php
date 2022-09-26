<?php

use \Elementor\Group_Control_Background;

class TFCounter_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-counter';
	}

	public function get_title() {
		return esc_html__( 'TF Counter', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_style_depends() {
		return [ 'tf-counter' ];
	}

	public function get_script_depends() {
		return [ 'elementor-waypoints', 'jquery-numerator', 'tf-counter' ];
	}

	protected function register_controls() {
		// Start Counter        
		$this->start_controls_section( 'section_tabs',
			[
				'label' => esc_html__( 'Counter', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Style', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'themesflat-elementor' ),
					'style1'  => esc_html__( 'Style 1', 'themesflat-elementor' ),
					'style2'  => esc_html__( 'Style 2', 'themesflat-elementor' ),
					'style3'  => esc_html__( 'Style 3', 'themesflat-elementor' ),
				],
			]
		);


		$this->add_control(
			'starting_number',
			[
				'label'   => esc_html__( 'Starting Number', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
			]
		);

		$this->add_control(
			'ending_number',
			[
				'label'   => esc_html__( 'Ending Number', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 25,
			]
		);

		$this->add_control(
			'collapse_number',
			[
				'label'   => esc_html__( 'Collapse Number', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
			]
		);

		$this->add_control(
			'rounding',
			[
				'label'   => esc_html__( 'Rounding', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'step'    => 10,
			]
		);

		$this->add_control(
			'prefix',
			[
				'label'       => esc_html__( 'Number Prefix', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 1,
				'condition'   => [
					'style!' => 'style2',
				],
			]
		);

		$this->add_control(
			'suffix',
			[
				'label'       => esc_html__( 'Number Suffix', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Plus', 'themesflat-elementor' ),
				'condition'   => [
					'style!' => 'style2',
				],
			]
		);

		$this->add_control(
			'duration',
			[
				'label'   => esc_html__( 'Animation Duration', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 2000,
				'min'     => 100,
				'step'    => 100,
			]
		);

		$this->add_control(
			'thousand_separator_char',
			[
				'label'   => esc_html__( 'Separator', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''  => 'Default',
					',' => 'Commas',
					'.' => 'Dot',
					' ' => 'Space',
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Happy Customers', 'themesflat-elementor' ),
			]
		);

		$this->end_controls_section();
		// /.End Counter

		// Start General
		$this->start_controls_section( 'section_style_general',
			[
				'label' => esc_html__( 'General', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'align',
			[
				'label'     => esc_html__( 'Alignment', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'themesflat-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'themesflat-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'themesflat-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .tf-counter' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'style!' => 'style2',
				],
			]
		);

		$this->add_control(
			'backround-wrap',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-counter:not(.style1)' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .tf-counter.style1'       => 'background: linear-gradient(to right, {{VALUE}} 0%, rgba(243, 243, 244, 1) 25%);',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-counter',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End General

		// Start Style Number
		$this->start_controls_section( 'section_style_number',
			[
				'label' => esc_html__( 'Number', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_color',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_number',
				'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'number_shadow',
				'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
			]
		);

		$this->add_responsive_control(
			'margin_number',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Number

		// Start Style Title
		$this->start_controls_section( 'section_style_title',
			[
				'label' => esc_html__( 'Title', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style!' => 'style2',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'           => 'title_background',
				'types'          => [ 'classic' ],
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
					'color'      => [
						'default' => '#ff7506',
					],
				],
				'selector'       => '{{WRAPPER}} .counter-number-wrapper',
				'condition'      => [
					'style' => 'style2',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'selector' => '{{WRAPPER}} .tf-counter .counter-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'title_shadow',
				'selector' => '{{WRAPPER}} .tf-counter .counter-title',
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-counter .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Title
	}

	protected function render( $instance = [] ) {
		$settings       = $this->get_settings_for_display();
		$counter_prefix = '';
		$counter_suffix = '';
		$this->add_render_attribute( 'tf_counter', [
			'id'         => "tf-counter-{$this->get_id()}",
			'class'      => [ 'tf-counter', $settings['style'] ],
			'data-tabid' => $this->get_id()
		] );

		if ( $settings['prefix'] ) {
			$counter_prefix = sprintf( '<span class="counter-number-prefix">%1$s</span>', $settings['prefix'] );
		}
		if ( $settings['collapse_number'] != "" && $settings['collapse_number'] > 0 ) {

			$settings['ending_number'] = $settings['ending_number'] / $settings['collapse_number'];
		}

		$counter_number = sprintf( '<span class="counter-number" data-from_value="%1$s" data-to_value="%2$s" data-duration="%3$s" data-delimiter="%4$s" data-rounding="%5$s">%1$s</span>', $settings['starting_number'], $settings['ending_number'], $settings['duration'], $settings['thousand_separator_char'],$settings['rounding'] );

		if ( $settings['suffix'] ) {
			$counter_suffix = sprintf( '<span class="counter-number-suffix">%1$s</span>', $settings['suffix'] );
		}

		if ( $settings['title'] ) {
			$counter_title = sprintf( '<div class="counter-title">%1$s</div>', $settings['title'] );
		}

		$content = sprintf( '<div class="wrap-counter">
							
								<div class="counter-number-wrapper">									
									%1$s%2$s%3$s
								</div>
								%4$s
							</div>', $counter_prefix, $counter_number, $counter_suffix, $counter_title );

		if ( $settings['style'] == "style2" ) {
			$content = sprintf( '<div class="wrap-counter">
								<div class="wrap-icon-title">
									<div class="counter-number-wrapper">
										%1$s%2$s%3$s
									</div>
								</div>
								%4$s
							</div>', $counter_prefix, $counter_number, $counter_suffix, $counter_title );
		}


		echo sprintf(
			'<div %1$s> 
				%2$s                
            </div>',
			$this->get_render_attribute_string( 'tf_counter' ),
			$content
		);

	}

}