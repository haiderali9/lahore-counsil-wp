<?php

class TFTitle_Section_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-title-section';
	}

	public function get_title() {
		return esc_html__( 'TF Title Section', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_style_depends() {
		return [ 'tf-title-section' ];
	}

	protected function register_controls() {
		// Start Tab Setting        
		$this->start_controls_section( 'section_tabs',
			[
				'label' => esc_html__( 'Title Section', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label'   => esc_html__( 'HTML Tag', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'   => esc_html__( 'H1', 'themesflat-elementor' ),
					'h2'   => esc_html__( 'H2', 'themesflat-elementor' ),
					'h3'   => esc_html__( 'H3', 'themesflat-elementor' ),
					'h4'   => esc_html__( 'H4', 'themesflat-elementor' ),
					'h5'   => esc_html__( 'H5', 'themesflat-elementor' ),
					'h6'   => esc_html__( 'H6', 'themesflat-elementor' ),
					'span' => esc_html__( 'span', 'themesflat-elementor' ),
					'p'    => esc_html__( 'p', 'themesflat-elementor' ),
					'div'  => esc_html__( 'div', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Style', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '01',
				'options' => [
					'01' => esc_html__( 'Style 01', 'themesflat-elementor' ),
					'02' => esc_html__( 'Style 02', 'themesflat-elementor' ),
					'03' => esc_html__( 'Style 03', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'before_heading',
			[
				'label'       => esc_html__( 'Before Heading', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'What we do', 'themesflat-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => esc_html__( 'Heading', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'True Healthcare For Your Family', 'themesflat-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => esc_html__( 'Sub Title', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'default'     => esc_html__( '', 'themesflat-elementor' ),
				'label_block' => true,
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
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .tf-title-section .title-section' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label'      => esc_html__( 'Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1600,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => '',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'position',
			[
				'label'     => esc_html__( 'Position', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'themesflat-elementor' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center'     => [
						'title' => esc_html__( 'Center', 'themesflat-elementor' ),
						'icon'  => 'eicon-h-align-center',
					],
					'flex-end'   => [
						'title' => esc_html__( 'Right', 'themesflat-elementor' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .tf-title-section' => 'display: flex; justify-content: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Tab Setting

		// Start Style
		$this->start_controls_section( 'section_style',
			[
				'label' => esc_html__( 'Style', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'h_before_heading',
			[
				'label'     => esc_html__( 'Before Heading', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'  => 'before_heading_typography',
				'label' => esc_html__( 'Typography', 'themesflat-elementor' ),

				'selector' => '{{WRAPPER}} .tf-title-section .title-section .before-heading',
			]
		);
		$this->add_control(
			'before_heading_text_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-title-section .title-section .before-heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'before_heading_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section .before-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'h_heading',
			[
				'label'     => esc_html__( 'Heading', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'label'    => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-title-section .title-section .heading',
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-title-section' => '--tf-heading-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'heading_mark_color',
			[
				'label'     => esc_html__( 'Mark Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-title-section .heading mark' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'heading_padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'heading_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'heading_width',
			[
				'label'      => esc_html__( 'Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1600,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section .heading' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'h_sub_title',
			[
				'label'     => esc_html__( 'Sub Title', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_sub_title',
				'label'    => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-title-section .title-section .sub-title',
			]
		);
		$this->add_control(
			'color_sub_title',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'padding_sub_title',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'margin_sub_title',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'separate_bg_color',
			[
				'label'     => esc_html__( 'Separate Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-title-section .heading-separate' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();
		$class    = array( 'tf-title-section', 'tf-title-section-style-' . $settings['style'] );

		$this->add_render_attribute( 'tf_title_section', [
			'id'         => "tf-title-section-{$this->get_id()}",
			'class'      => $class,
			'data-tabid' => $this->get_id()
		] );

		$animation = ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . esc_attr( $settings['hover_animation'] . ' inline-block' ) : '';

		$heading = $before_heading = $sub_title = $separate = '';

		if ( $settings['heading'] != '' ) {
			$heading = sprintf( '<%1$s class="heading">%2$s</%1$s>', $settings['html_tag'], $settings['heading'] );
		}

		if ( $settings['before_heading'] != '' ) {
			$before_heading = sprintf( '<div class="before-heading">%1$s</div>', $settings['before_heading'] );
		}

		if ( $settings['sub_title'] != '' ) {
			$sub_title = sprintf( '<div class="sub-title">%1$s</div>', $settings['sub_title'] );
		}
		if ( $settings['style'] == '01' || $settings['style'] == '03' ) {
			$separate = '<div class="heading-separate"></div>';
		}

		$content = sprintf( '
			<div class="title-section">
				%2$s
				%1$s
				%3$s
				%4$s
			</div>', $heading, $before_heading, $separate, $sub_title );

		echo sprintf(
			'<div %1$s> 
				%2$s                
            </div>',
			$this->get_render_attribute_string( 'tf_title_section' ),
			$content
		);

	}

}