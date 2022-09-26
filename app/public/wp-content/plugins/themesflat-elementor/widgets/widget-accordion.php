<?php

class TFAccordion_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tfaccordion';
	}

	public function get_title() {
		return esc_html__( 'TF Accordion', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_style_depends() {
		return [ 'tf-accordion' ];
	}

	public function get_script_depends() {
		return [ 'tf-accordion' ];
	}

	protected function register_controls() {
		// Start Accordion
		$this->start_controls_section(
			'section_accordion',
			[
				'label' => esc_html__( 'Accordion', 'themesflat-elementor' ),
			]
		);

		$this->add_control( 'heading_icon',
			[
				'label' => esc_html__( 'Icon', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control( 'icon_style',
			[
				'label'   => esc_html__( 'Icon Style', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'none'  => [
						'title' => esc_html__( 'None', 'themesflat-elementor' ),
						'icon'  => 'fa fa-ban',
					],
					'icon'  => [
						'title' => esc_html__( 'Icon', 'themesflat-elementor' ),
						'icon'  => 'eicon-favorite',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'themesflat-elementor' ),
						'icon'  => 'eicon-image',
					],
				],
				'default' => 'icon',
			]
		);

		$this->add_control(
			'icon_position',
			[
				'label'     => esc_html__( 'Icon Position', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'icon_after',
				'options'   => [
					'icon_before'       => esc_html__( 'Left', 'themesflat-elementor' ),
					'icon_after'        => esc_html__( 'Right', 'themesflat-elementor' ),
					'icon_before_after' => esc_html__( 'Both side', 'themesflat-elementor' ),
				],
				'condition' => [
					'icon_style!' => 'none',
				],
			]
		);

		$this->add_control( 'icon_accodion',
			[
				'label'            => esc_html__( 'Left Icon', 'themesflat-elementor' ),
				'type'             => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_accodion4',
				'condition'        => [
					'icon_style'    => 'icon',
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);

		$this->add_control( 'image_accodion',
			[
				'label'     => esc_html__( 'Left Icon Image', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_style'    => 'image',
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);

		$this->add_control( 'icon_accodion_active',
			[
				'label'            => esc_html__( 'Left Icon Active', 'themesflat-elementor' ),
				'type'             => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_accodion_active4',
				'condition'        => [
					'icon_style'    => 'icon',
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);

		$this->add_control( 'image_accodion_active',
			[
				'label'     => esc_html__( 'Left Icon Image Active', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_style'    => 'image',
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);


		$this->add_control( 'icon_accodion_right',
			[
				'label'            => esc_html__( 'Right Icon', 'themesflat-elementor' ),
				'type'             => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_accodion4_right',
				'default' => [
					'value' => 'fas fa-angle-down',
					'library' => 'fa-solid',
				],
				'condition'        => [
					'icon_style'    => 'icon',
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$this->add_control( 'image_accodion_right',
			[
				'label'     => esc_html__( 'Right Icon Image', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_style'    => 'image',
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$this->add_control( 'icon_accodion_right_active',
			[
				'label'            => esc_html__( 'Right Icon Active', 'themesflat-elementor' ),
				'type'             => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_accodion_active4_right',
				'default' => [
					'value' => 'fas fa-angle-down',
					'library' => 'fa-solid',
				],
				'condition'        => [
					'icon_style'    => 'icon',
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$this->add_control( 'image_accodion_right_active',
			[
				'label'     => esc_html__( 'Right Icon Image Active', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_style'    => 'image',
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'set_active',
			[
				'label'        => esc_html__( 'Set Active Item', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'No', 'themesflat-elementor' ),
				'return_value' => 'active',
				'default'      => 'inactive',
			]
		);
		$repeater->add_control( 'list_title', [
				'label'       => esc_html__( 'Nav text', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'What Are The Most Common Tech Questions?', 'themesflat-elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control( 'heading_content',
			[
				'label'     => esc_html__( 'Content', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater->add_control( 'list_content_text_type',
			[
				'label'   => esc_html__( 'Content type', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'editor',
				'options' => [
					'editor'   => esc_html__( 'Editor', 'themesflat-elementor' ),
					'template' => esc_html__( 'Template', 'themesflat-elementor' ),
				],
			]
		);
		$repeater->add_control( 'list_content', [
				'label'       => esc_html__( 'Content text', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'default'     => esc_html__( 'Proin Lobortis, Orci Quis Congue Scelerisque, Justo Massa Varius Velit, Eu Vestibulum Nulla Risus Ac Ex. Phasellus Volutpat, Leo Eu Varius Viverra,', 'themesflat-elementor' ),
				'label_block' => true,
				'condition'   => [
					'list_content_text_type' => 'editor',
				],
			]
		);
		$repeater->add_control( 'list_content_template',
			[
				'label'     => esc_html__( 'Choose Template', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => ThemesFlat_Addon_For_Elementor_Bulter::tf_get_template_elementor(),
				'condition' => [
					'list_content_text_type' => 'template',
				],
			]
		);
		$this->add_control( 'accordion_list',
			[
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'set_active'   => 'inactive',
						'list_title'   => esc_html__( 'What Are The Most Common Tech Questions?', 'themesflat-elementor' ),
						'list_content' => esc_html__( "Proin Lobortis, Orci Quis Congue Scelerisque, Justo Massa Varius Velit, Eu Vestibulum Nulla Risus Ac Ex. Phasellus Volutpat, Leo Eu Varius Viverra," ),
					],
					[
						'set_active'   => 'active',
						'list_title'   => esc_html__( 'What Should I Ask Interviewer?', 'themesflat-elementor' ),
						'list_content' => esc_html__( "Proin Lobortis, Orci Quis Congue Scelerisque, Justo Massa Varius Velit, Eu Vestibulum Nulla Risus Ac Ex. Phasellus Volutpat, Leo Eu Varius Viverra," ),
					],
					[
						'set_active'   => 'inactive',
						'list_title'   => esc_html__( 'What Is The Future Of Information Technology?', 'themesflat-elementor' ),
						'list_content' => esc_html__( "Proin Lobortis, Orci Quis Congue Scelerisque, Justo Massa Varius Velit, Eu Vestibulum Nulla Risus Ac Ex. Phasellus Volutpat, Leo Eu Varius Viverra," ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
		// /.End Accordion

		// Start General Style
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => esc_html__( 'General', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'wrap_align',
			[
				'label'     => esc_html__( 'Alignment', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'    => [
						'title' => esc_html__( 'Left', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .tf-accordion' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control( 'title_style',
			[
				'label'   => esc_html__( 'Style', 'bixos' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'style 1', 'bixos' ),
					'style2' => esc_html__( 'style 2', 'bixos' ),
				],
			]
		);

		$this->end_controls_section();
		// /.End General Style

		// Start Item Style
		$this->start_controls_section(
			'section_style_item',
			[
				'label' => esc_html__( 'Item', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'item_padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'item_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control( 'item_background',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'item_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .tf-accordion-item',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'item_border',
				'label'    => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .tf-accordion-item',
			]
		);

		$this->add_control(
			'item_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Item Style

		// Start Icon Style
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size_w',
			[
				'label'      => esc_html__( 'Icon Size Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon'          => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tf-accordion .accordion-title .title-text'                   => 'width: calc(100% - {{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .title-text' => 'width: calc(100% - 2 * {{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size_h',
			[
				'label'      => esc_html__( 'Icon Size Height', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border',
				'label'    => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon',
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_icon_left',
			[
				'label'     => esc_html__( 'Icon Left', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);

		$this->add_responsive_control(
			'icon_font_size',
			[
				'label'      => esc_html__( 'Icon Font Size', 'themesflat-elementor' ),
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
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left'           => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left img'       => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left svg'       => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left'     => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);

		$this->start_controls_tabs(
			'icon_style_accordion', [
				'condition' => [
					'icon_position' => [ 'icon_before', 'icon_before_after' ],
				],
			]
		);

		$this->start_controls_tab(
			'icon_style_normal_accordion',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			] );

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left i'         => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left svg'       => 'fill: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'fill: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left '       => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left ' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_style_hover_accordion',
			[
				'label' => esc_html__( 'Active', 'themesflat-elementor' ),
			] );

		$this->add_control(
			'icon_color_hover',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left i'         => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left svg'       => 'fill: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'fill: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'icon_background_color_hover',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left '      => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'heading_icon_right',
			[
				'label'     => esc_html__( 'Icon Right', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$this->add_responsive_control(
			'icon_font_size_right',
			[
				'label'      => esc_html__( 'Icon Font Size', 'themesflat-elementor' ),
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
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right '           => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$this->start_controls_tabs(
			'icon_style_right_accordion', [
				'condition' => [
					'icon_position' => [ 'icon_after', 'icon_before_after' ],
				],
			]
		);

		$this->start_controls_tab(
			'icon_style_right_normal_accordion',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			] );

		$this->add_control(
			'icon_right_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right i'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right svg'        => 'fill: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'fill: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'icon_right_background_color',
			[
				'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right'        => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_style_right_hover_accordion',
			[
				'label' => esc_html__( 'Active', 'themesflat-elementor' ),
			] );

		$this->add_control(
			'icon_right_color_hover',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right i'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right svg'        => 'fill: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'fill: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'icon_right_background_color_hover',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right'        => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// /.End Icon Style

		// Start Title Style
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-title .title-text',
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title .title-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'title_style_accordion', [
			]
		);

		$this->start_controls_tab(
			'title_style_normal_accordion',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			] );

		$this->add_control( 'title_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title .title-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control( 'title_background',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'title_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'title_border',
				'label'    => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',
			]
		);

		$this->add_control(
			'title_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_style_hover_accordion',
			[
				'label' => esc_html__( 'Active', 'themesflat-elementor' ),
			] );

		$this->add_control( 'title_color_active',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.active .title-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control( 'title_background_active',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'title_box_shadow_active',
				'label'    => esc_html__( 'Box Shadow', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-title.active',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'title_border_active',
				'label'    => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-title.active',
			]
		);

		$this->add_control(
			'title_border_radius_active',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// /.End Title Style

		// Start Content Style
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Content', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'content_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control( 'content_background',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .accordion-content' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control( 'content_background_active',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-accordion .tf-accordion-item.active .accordion-content' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'content_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'content_border',
				'label'    => esc_html__( 'Border', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',
			]
		);

		$this->add_control(
			'content_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-accordion .accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Content Style
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();

		$accordion_item = $html_title = $icon_title = $icon_accodion_close = $icon_accodion_open = $icon_accodion_right_close = $icon_accodion_right_open = $html_content = $set_active = '';


		foreach ( $settings['accordion_list'] as $key => $value ) {

			if ( $settings['icon_style'] == 'icon' ) {
				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_close = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( $settings['icon_accodion'] );
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_close = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( $settings['icon_accodion_right'] );
				}

				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_open = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( $settings['icon_accodion_active'] );
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_open = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( $settings['icon_accodion_right_active'] );
				}

			} else if ( $settings['icon_style'] == 'image' ) {
				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_close = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion']['url'] );
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_close = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion_right']['url'] );
				}

				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_open = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion_active']['url'] );
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_open = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion_right_active']['url'] );
				}
			}

			if ( $settings['icon_style'] != 'none' ) {
				$icon_title = sprintf( '		
				<span class="wrap-accordion-icon wrap-accordion-icon-left">		
				<span class="accordion-icon accordion-icon-close">%1$s</span>
				<span class="accordion-icon accordion-icon-open">%2$s</span>
				</span>'
					, $icon_accodion_close, $icon_accodion_open );

				$icon_title_right = sprintf( '		
				<span class="wrap-accordion-icon wrap-accordion-icon-right">		
				<span class="accordion-icon accordion-icon-close">%1$s</span>
				<span class="accordion-icon accordion-icon-open">%2$s</span>
				</span>'
					, $icon_accodion_right_close, $icon_accodion_right_open );
			}

			if ( $value['list_title'] != '' ) {
				if ( $settings['icon_position'] == 'icon_before_after' ) {
					$html_title = sprintf( '<div class="accordion-title %4$s %5$s">%2$s<span class="title-text">%1$s</span> %3$s</div>', $value['list_title'], $icon_title, $icon_title_right, $settings['icon_position'], $value['set_active'] );
				} else if ( $settings['icon_position'] == 'icon_before' ) {
					$html_title = sprintf( '<div class="accordion-title %3$s %4$s">%2$s<span class="title-text">%1$s</span></div>', $value['list_title'], $icon_title, $settings['icon_position'], $value['set_active'] );
				} else {
					$html_title = sprintf( '<div class="accordion-title %3$s %4$s"><span class="title-text">%1$s</span> %2$s</div>', $value['list_title'], $icon_title_right, $settings['icon_position'], $value['set_active'] );
				}

			}


			if ( $value['list_content_text_type'] == 'template' ) {

				if ( ! empty( $value['list_content_template'] ) ) {
					$frontend     = new \Elementor\Frontend;
					$html_content = sprintf( '<div class="accordion-content">%1$s</div>', $frontend->get_builder_content_for_display( $value['list_content_template'], true ) );
				}
			} else {
				$html_content = sprintf( '<div class="accordion-content">%1$s</div>', do_shortcode( $value['list_content'] ) );
			}

			$accordion_item .= sprintf( '<div class="tf-accordion-item %3$s">%1$s %2$s</div>', $html_title, $html_content, $value['set_active'] );
		}


		echo sprintf(
			'<div class="tf-accordion %2$s"> 
				%1$s
            </div>',
			$accordion_item, $settings['title_style']
		);
	}

}