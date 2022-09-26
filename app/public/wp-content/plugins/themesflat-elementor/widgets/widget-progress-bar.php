<?php

class TFProgressBars_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-progress-bar';
	}

	public function get_title() {
		return esc_html__( 'TF Progress Bar', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_script_depends() {
		return [ 'appear', 'tf-progress-bar' ];
	}

	protected function register_controls() {
		// Start Tab Setting        
		$this->start_controls_section( 'section_setting',
			[
				'label' => esc_html__( 'Progress Bar', 'themesflat-elementor' ),
			]
		);
		$this->add_control(
			'progress_style',
			[
				'label'   => esc_html__( 'Style', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => esc_html__( 'Horizontal Bar', 'themesflat-elementor' ),
					'circle'     => esc_html__( 'Circle', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Experience Staff', 'themesflat-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'percent',
			[
				'label'      => esc_html__( 'Percentage', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => 97,
				],
			]
		);
		$this->add_control(
			'show_percent',
			[
				'label'        => esc_html__( 'Show Value', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->end_controls_section();
		// /.End Tab Setting

		$this->register_style();

	}

	protected function register_style() {
		// Start Style Progress Bar
		$this->start_controls_section( 'section_style_progress',
			[
				'label' => esc_html__( 'Progress Bar', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'height_progress',
			[
				'label'      => esc_html__( 'Height', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-progress-bar .progress-wrap' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .tf-progress-bar .progress-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tf-progress-bar .perc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'progress_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-progress-bar-horizontal .progress-animate' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-progress-bar-circle .progress-wrap::after' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'progress_background',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-progress-bar-horizontal .progress-wrap' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-progress-bar-circle .progress-bar'      => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_radius_progress',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-progress-bar .progress-wrap'    => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-progress-bar .progress-animate' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Progress Bar

		// Start Style Text
		$this->start_controls_section( 'section_style_title',
			[
				'label' => esc_html__( 'Text', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'h_title',
			[
				'label' => esc_html__( 'Title', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'title_typography',
				'label'          => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector'       => '{{WRAPPER}} .tf-progress-bar .title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#091D3E',
				'selectors' => [
					'{{WRAPPER}} .tf-progress-bar .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'h_percentage',
			[
				'label'     => esc_html__( 'Percentage', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'percentage_typography',
				'label'          => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector'       => '{{WRAPPER}} .tf-progress-bar .number-perc',
			]
		);
		$this->add_control(
			'percentage_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#091D3E',
				'selectors' => [
					'{{WRAPPER}} .tf-progress-bar .progress-value' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Text
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_progress_bar', [
			'id'         => "tf-progress-bar-{$this->get_id()}",
			'class'      => [
				'tf-progress-bar',
				'tf-progress-bar-' . $settings['progress_style'],
			],
			'data-tabid' => $this->get_id()
		] );

		$title = '<span class="title">' . esc_html( $settings['title'] ) . '</span>';
		$value = '';
		if ( $settings['show_percent'] == 'yes' ) {
			$value = '<span class="progress-value">' . $settings['percent']['size'] . '%</span>';
		}

		$percent = '<div class="wrap-perc-title">
						<div class="perc">' . $title . $value . '</div>
					</div>';

		if ( $settings['progress_style'] == 'horizontal' ) {
			$content = sprintf( '
			%1$s
			<div class="progress-wrap progress">				
				<div class="progress-animate progress-bar" data-valuemax="100" data-valuemin="0" data-valuenow="%2$s"></div>
			</div>', $percent, $settings['percent']['size'] );
		} else {
			$content = sprintf( '
			<div class="progress-wrap" data-value="%1$s">
			          <span class="progress-left">
			                        <span class="progress-bar"></span>
			          </span>
				<span class="progress-right">
                             <span class="progress-bar"></span>
					</span>
				<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
					%2$s
				</div>
		   </div>%3$s', $settings['percent']['size'], $settings['percent']['size'] . '%', $title );
		}
		echo sprintf(
			'<div %1$s> 
				%2$s                
            </div>',
			$this->get_render_attribute_string( 'tf_progress_bar' ),
			$content
		);

	}

}