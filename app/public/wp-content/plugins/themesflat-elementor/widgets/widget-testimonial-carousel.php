<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class TFTestimonialCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-testimonial-carousel';
	}

	public function get_title() {
		return esc_html__( 'TF Testimonial Carousel', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_style_depends() {
		return [ 'owl-carousel', 'tf-testimonial' ];
	}

	public function get_script_depends() {
		return [ 'owl-carousel', 'tf-testimonial' ];
	}

	protected function register_controls() {
		// Start Carousel Setting
		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Testimonial Carousel', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Layout Style', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'Style 1', 'themesflat-elementor' ),
					'style2' => esc_html__( 'Style 2', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_responsive_control(
			'testimonial_text_align',
			[
				'label'        => esc_html__( 'Alignment', 'themesflat-elementor' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
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
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => 'center',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'avatar',
			[
				'label'   => esc_html__( 'Choose Avatar', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . "assets/img/default-team.jpg",
				],
			]
		);

		$repeater->add_control(
			'name',
			[
				'label'   => esc_html__( 'Name', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Eugene Freeman', 'themesflat-elementor' ),
			]
		);

		$repeater->add_control(
			'date',
			[
				'label'   => esc_html__( 'Date', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '12 April, 2022', 'themesflat-elementor' ),
			]
		);

		$repeater->add_control(
			'enable_rate',
			[
				'label'        => esc_html__( 'Enable Rate', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$repeater->add_control(
			'rate',
			[
				'label'     => esc_html__( 'Rate', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => '5',
				'options'   => [
					'1' => esc_html__( '1', 'themesflat-elementor' ),
					'2' => esc_html__( '2', 'themesflat-elementor' ),
					'3' => esc_html__( '3', 'themesflat-elementor' ),
					'4' => esc_html__( '4', 'themesflat-elementor' ),
					'5' => esc_html__( '5', 'themesflat-elementor' ),
				],
				'condition' => [
					'enable_rate' => 'yes',
				]
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'rows'    => 10,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo luctus gravida a in ipsum.', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'carousel_list',
			[
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'name'        => 'Eugene Freeman',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo luctus gravida a in ipsum.',
					],
					[
						'name'        => 'Kelly Coleman',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo luctus gravida a in ipsum.',
					],
					[
						'name'        => 'Philip Mendez',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo luctus gravida a in ipsum.',
					],
				],
			]
		);

		$this->end_controls_section();
		// /.End Carousel
		$this->setting();
		$this->arrow();
		$this->bullets();
		$this->styleItem();
		$this->styleName();
		$this->styleDate();
		$this->styleRate();
		$this->styleDesc();
	}

	protected function arrow() {

		// Start Arrow
		$this->start_controls_section(
			'section_arrow',
			[
				'label'     => esc_html__( 'Arrow', 'themesflat-elementor' ),
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_arrow',
			[
				'label'        => esc_html__( 'Arrow', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Hide', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'description'  => 'Just show when you have two slide',
				'separator'    => 'before',
			]
		);

		$this->add_responsive_control(
			'carousel_arrow_fontsize',
			[
				'label'      => esc_html__( 'Font Size', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'w_size_carousel_arrow',
			[
				'label'      => esc_html__( 'Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'h_size_carousel_arrow',
			[
				'label'      => esc_html__( 'Height', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_arrow_horizontal_position_prev',
			[
				'label'      => esc_html__( 'Horizontal Position Previous', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => - 2000,
						'max'  => 2000,
						'step' => 1,
					],
					'%'  => [
						'min' => - 100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_arrow_horizontal_position_next',
			[
				'label'      => esc_html__( 'Horizontal Position Next', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => - 2000,
						'max'  => 2000,
						'step' => 1,
					],
					'%'  => [
						'min' => - 100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_arrow_vertical_position',
			[
				'label'      => esc_html__( 'Vertical Position', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => - 1000,
						'max'  => 1000,
						'step' => 1,
					],
					'%'  => [
						'min' => - 100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => '',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->start_controls_tabs(
			'carousel_arrow_tabs',
			[
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			] );

		$this->start_controls_tab(
			'carousel_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'carousel_arrow_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_control(
			'carousel_arrow_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'carousel_arrow_border',
				'label'     => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector'  => '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next',
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_arrow_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'carousel_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'carousel_arrow_color_hover',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover'       => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_control(
			'carousel_arrow_hover_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover'       => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'carousel_arrow_border_hover',
				'label'     => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector'  => '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled',
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_arrow_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_arrow' => 'yes',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// /.End Arrow
	}

	protected function bullets() {
		// Start Bullets
		$this->start_controls_section(
			'section_bullets',
			[
				'label'     => esc_html__( 'Bullets', 'themesflat-elementor' ),
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_bullets',
			[
				'label'        => esc_html__( 'Bullets', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Hide', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => '',
				'separator'    => 'before',
			]
		);

		$this->add_responsive_control(
			'carousel_bullets_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);


		$this->add_responsive_control(
			'carousel_bullets_spacing',
			[
				'label'      => esc_html__( 'Dots Spacing', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_bullets_active_margin',
			[
				'label'      => esc_html__( 'Spacing Active', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'margin: 0 {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->start_controls_tabs(
			'carousel_bullets_tabs',
			[
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			] );
		$this->start_controls_tab(
			'carousel_bullets_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			]
		);

		$this->add_responsive_control(
			'w_size_carousel_bullets',
			[
				'label'      => esc_html__( 'Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'h_size_carousel_bullets',
			[
				'label'      => esc_html__( 'Height', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_control(
			'carousel_bullets_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'carousel_bullets_border',
				'label'     => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector'  => '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot',
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_bullets_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'carousel_bullets_hover_tab',
			[
				'label' => esc_html__( 'Active', 'themesflat-elementor' ),
			]
		);

		$this->add_responsive_control(
			'w_size_carousel_bullets_active',
			[
				'label'      => esc_html__( 'Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'h_size_carousel_bullets_active',
			[
				'label'      => esc_html__( 'Height', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_control(
			'size_carousel_bullets_active_scale_hover',
			[
				'label'      => esc_html__( 'Scale', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 1,
						'max'  => 2,
						'step' => 0.1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',
				],
			]
		);

		$this->add_control(
			'carousel_bullets_hover_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:after'                                                                 => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'carousel_bullets_border_hover',
				'label'     => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector'  => '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active',
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'carousel_bullets_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'carousel_bullets' => 'yes',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// /.End Bullets
	}

	protected function setting() {
		// Start Setting
		$this->start_controls_section(
			'section_setting',
			[
				'label' => esc_html__( 'Setting', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'carousel',
			[
				'label'        => esc_html__( 'Carousel', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'carousel_loop',
			[
				'label'        => esc_html__( 'Loop', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_auto',
			[
				'label'        => esc_html__( 'Auto Play', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_spacer',
			[
				'label'     => esc_html__( 'Spacer', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 0,
				'max'       => 100,
				'step'      => 1,
				'default'   => 0,
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_column_desk',
			[
				'label'   => esc_html__( 'Columns Desktop', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__( '1', 'themesflat-elementor' ),
					'2' => esc_html__( '2', 'themesflat-elementor' ),
					'3' => esc_html__( '3', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'carousel_column_tablet',
			[
				'label'   => esc_html__( 'Columns Tablet', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => esc_html__( '1', 'themesflat-elementor' ),
					'2' => esc_html__( '2', 'themesflat-elementor' ),
					'3' => esc_html__( '3', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'carousel_column_mobile',
			[
				'label'   => esc_html__( 'Columns Mobile', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( '1', 'themesflat-elementor' ),
					'2' => esc_html__( '2', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'index_active',
			[
				'label'     => esc_html__( 'Index Active', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => '0',
				'options'   => [
					'0' => esc_html__( '1', 'themesflat-elementor' ),
					'1' => esc_html__( '2', 'themesflat-elementor' ),
					'2' => esc_html__( '3', 'themesflat-elementor' ),
					'3' => esc_html__( '4', 'themesflat-elementor' ),
					'4' => esc_html__( '5', 'themesflat-elementor' ),
					'5' => esc_html__( '6', 'themesflat-elementor' ),
				],
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		// /.End Setting
	}

	protected function styleItem() {
		$this->start_controls_section(
			'section_style_item',
			[
				'label' => esc_html__( 'Items', 'themesflat-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'testimonial_item_padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .item-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function styleName() {
		$this->start_controls_section(
			'section_style_name',
			[
				'label' => esc_html__( 'Name', 'themesflat-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'testimonial_name_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_name_typography',
				'selector' => '{{WRAPPER}} .name',
			]
		);

		$this->add_responsive_control(
			'testimonial_name_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function styleDate() {
		$this->start_controls_section( 'section_style_date', [
			'label' => esc_html__( 'Date', 'themesflat-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'testimonial_date_text_color',
			[
				'label'     => esc_html__( 'Text color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-date' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_date_typography',
				'selector' => '{{WRAPPER}} .testimonial-date',
			]
		);

		$this->add_responsive_control(
			'testimonial_date_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function styleRate() {
		$this->start_controls_section( 'section_style_rating', [
			'label' => esc_html__( 'Rating', 'themesflat-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'testimonial_rating_color',
			[
				'label'     => esc_html__( 'Rating Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-rate' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_responsive_control(
			'testimonial_rating_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-rate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function styleDesc() {
		$this->start_controls_section( 'section_style_quote', [
			'label' => esc_html__( 'Description', 'themesflat-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'testimonial_desc_typography',
				'selector' => '{{WRAPPER}} .description',
			]
		);

		$this->add_responsive_control(
			'testimonial_quote_padding',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function get_html_rating( $rate ) {
		$html_rating = array();
		if ( $rate !== '' ) {
			$rate = absint( $rate );
			for ( $i = 1; $i <= 5; $i ++ ) {
				$html_rating[] = ( $i <= $rate ) ? '<i class="fas fa-star"></i>' : '<i class="fal fa-star"></i>';
			}
		}

		return join( '', $html_rating );
	}

	protected
	function render(
		$instance = []
	) {
		$settings = $this->get_settings_for_display();

		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}

		$carousel_bullets = 'no-bullets';
		if ( $settings['carousel_bullets'] == 'yes' ) {
			$carousel_bullets = 'has-bullets';
		}
		$has_carousel = '';
		$columns      = '';
		if ( $settings['carousel'] != 'yes' ) {
			if ( $settings['carousel_column_desk'] != '' ) {
				$columns .= 'column-' . $settings['carousel_column_desk'];
			}

			if ( $settings['carousel_column_tablet'] != '' ) {
				$columns .= ' column-md-' . $settings['carousel_column_tablet'];
			}

			if ( $settings['carousel_column_mobile'] != '' ) {
				$columns .= ' column-sm-' . $settings['carousel_column_mobile'];
			}
		}

		$column = 'row ' . $columns;
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
			$column       = '';
		}

		?>
        <div class="tf-testimonial-carousel <?php echo esc_attr( $column ) ?> <?php echo esc_attr( $settings['style'] ) ?> <?php echo esc_attr( $has_carousel ) ?> <?php echo esc_attr( $carousel_arrow ); ?> <?php echo esc_attr( $carousel_bullets ); ?>"
             data-loop="<?php echo esc_attr( $settings['carousel_loop'] ); ?>"
             data-auto="<?php echo esc_attr( $settings['carousel_auto'] ); ?>"
             data-column="<?php echo esc_attr( $settings['carousel_column_desk'] ); ?>"
             data-column2="<?php echo esc_attr( $settings['carousel_column_tablet'] ); ?>"
             data-column3="<?php echo esc_attr( $settings['carousel_column_mobile'] ); ?>"
             data-spacer="<?php echo esc_attr( $settings['carousel_spacer'] ); ?>"
             data-arrow="<?php echo esc_attr( $settings['carousel_arrow'] ) ?>"
             data-bullets="<?php echo esc_attr( $settings['carousel_bullets'] ) ?>"
             data-index_active="<?php echo esc_attr( $settings['index_active'] ) ?>">
			<?php if ( $settings['carousel'] == 'yes' ): ?>
            <div class="owl-carousel owl-theme">
				<?php endif; ?>
				<?php
				$attr['settings'] = $settings;
				?>
				<?php foreach ( $settings['carousel_list'] as $carousel ): ?>
                    <div class="item">
                        <div class="item-testimonial">
							<?php if ( $carousel['avatar']['url'] ): ?>
                                <div class="avatar"><img src="<?php echo esc_attr( $carousel['avatar']['url'] ); ?>">
									<?php if ( $settings['style'] == 'style2' ): ?>
                                        <span class="icon"><i class="fas fa-quote-right"></i></span>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
							<?php if ( $carousel['description'] ): ?>
                                <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
							<?php endif; ?>
                            <div class="testimonial-info">
								<?php if ( $carousel['enable_rate'] == "yes" ): ?>
                                    <div class="testimonial-rate">
										<?php echo $this->get_html_rating( $carousel['rate'] ) ?>
                                    </div>
								<?php endif; ?>
								<?php if ( $carousel['date'] ): ?>
                                    <div class="testimonial-date">
										<?php echo esc_attr( $carousel['date'] ); ?>
                                    </div>
								<?php endif; ?>
                            </div>
							<?php if ( $carousel['name'] ): ?>
                                <div class="name"><?php echo esc_attr( $carousel['name'] ); ?></div>
							<?php endif; ?>
                        </div>
                    </div>
				<?php endforeach; ?>
				<?php if ( $settings['carousel'] == 'yes' ): ?>
            </div>
		<?php endif; ?>
        </div>
		<?php
	}

}