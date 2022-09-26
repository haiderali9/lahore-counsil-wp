<?php

use Elementor\Controls_Manager;

class TFPractiseArea_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-practise-area';
	}

	public function get_title() {
		return esc_html__( 'TF Practise Area', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_style_depends() {
		return [ 'owl-carousel' ];
	}

	public function get_script_depends() {
		return [ 'owl-carousel', 'tf-practise-area' ];
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	protected function register_controls() {
		$this->register_query();
		$this->register_style();
		$this->register_style_01();
		$this->register_style_carousel();
		$this->register_style_item();
	}

	public function register_query() {
		// Start Posts Query
		$this->start_controls_section(
			'section_posts_query',
			[
				'label' => esc_html__( 'Query', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Posts Per Page', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => '6',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__( 'Order By', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'  => esc_html__( 'Date', 'themesflat-elementor' ),
					'ID'    => esc_html__( 'Post ID', 'themesflat-elementor' ),
					'title' => esc_html__( 'Title', 'themesflat-elementor' )
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'desc' => esc_html__( 'Descending', 'themesflat-elementor' ),
					'asc'  => esc_html__( 'Ascending', 'themesflat-elementor' )
				],
			]
		);

		$this->add_control(
			'posts_categories',
			[
				'label'       => esc_html__( 'Categories', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'options'     => ThemesFlat_Addon_For_Elementor_Bulter::tf_get_taxonomies( 'practise_area_category' ),
				'label_block' => true,
				'multiple'    => true,
			]
		);

		$this->add_control(
			'exclude',
			[
				'label'       => esc_html__( 'Exclude', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-elementor' ),
				'default'     => '',
				'label_block' => true,
			]
		);

		$this->add_control(
			'sort_by_id',
			[
				'label'       => esc_html__( 'Sort By ID', 'themesflat-elementor' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-elementor' ),
				'default'     => '',
				'label_block' => true,
			]
		);


		$this->add_control(
			'excerpt_lenght',
			[
				'label'   => esc_html__( 'Excerpt Length', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'default' => 20,
			]
		);

		$this->add_responsive_control(
			'layout',
			[
				'label'   => esc_html__( 'Columns', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1 => esc_html__( '1', 'themesflat-elementor' ),
					2 => esc_html__( '2', 'themesflat-elementor' ),
					3 => esc_html__( '3', 'themesflat-elementor' ),
					4 => esc_html__( '4', 'themesflat-elementor' ),
				],
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Styles', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'Style 1', 'themesflat-elementor' ),
					'style2' => esc_html__( 'Style 2', 'themesflat-elementor' ),
					'style3' => esc_html__( 'Style 3', 'themesflat-elementor' ),
				],
			]
		);
		$this->add_control(
			'show_image',
			[
				'label'        => esc_html__( 'Show Image', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'style' => 'style1'
				]
			]
		);
		$this->add_responsive_control(
			'image_width',
			[
				'label'     => esc_html__( 'Image Width', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 0,
				'step'      => 1,
				'condition' => [
					'show_image' => 'yes'
				]
			]
		);
		$this->add_responsive_control(
			'image_height',
			[
				'label'     => esc_html__( 'Image Height', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 0,
				'step'      => 1,
				'condition' => [
					'show_image' => 'yes'
				]
			]
		);
		$this->add_responsive_control( 'spacing_item', [
			'label'     => esc_html__( 'Space Between Items', 'themesflat-elementor' ),
			'type'      => Controls_Manager::NUMBER,
			'min'       => 0,
			'max'       => 200,
			'step'      => 1,
			'default'   => 30,
			'selectors' => [
				'{{WRAPPER}} .tf-practise-area-wrap .wrap-practise-area-post' => '--tf-practise-area-gap: {{VALUE}}px;',
			],
		] );

		$this->add_control(
			'carousel',
			[
				'label'        => esc_html__( 'Carousel', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'    => 'before',
			]
		);

		$this->add_control(
			'disable_animation',
			[
				'label'        => esc_html__( 'Disable Animation', 'themesflat-elementor' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Off', 'themesflat-elementor' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'    => 'before',
			]
		);
		$this->add_responsive_control(
			'navigation_arrow',
			[
				'label'     => esc_html__( 'Navigation Arrow', 'themesflat-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'on'  => esc_html__( 'Show', 'themesflat-elementor' ),

				],
				'default'   => 'off',
				'condition' => [
					'carousel' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'navigation_dots',
			[
				'label'     => esc_html__( 'Navigation Dots', 'themesflat-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'on'  => esc_html__( 'Show', 'themesflat-elementor' ),

				],
				'default'   => 'on',
				'condition' => [
					'carousel' => 'yes'
				]
			]
		);

		$this->add_control(
			'center_mode',
			[
				'label'        => esc_html__( 'Center Mode', 'themesflat-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Enable', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Disable', 'themesflat-elementor' ),
				'return_value' => 'on',
				'default'      => '',
				'condition'    => [
					'carousel' => 'yes'
				]
			]
		);
		$this->add_responsive_control(
			'center_padding',
			[
				'label'       => esc_html__( 'Center Padding', 'themesflat-elementor' ),
				'description' => esc_html__( 'Side padding when in center mode (px/%)', 'themesflat-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '50px',
				'conditions'  => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'center_mode',
							'operator' => '==',
							'value'    => 'on'
						],
						[
							'name'     => 'carousel',
							'operator' => '==',
							'value'    => 'yes'
						],
					]
				],
			]
		);

		$this->add_control(
			'autoplay_enable',
			[
				'label'        => esc_html__( 'Autoplay Slides', 'themesflat-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Enable', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Disable', 'themesflat-elementor' ),
				'return_value' => 'on',
				'default'      => '',
				'condition'    => [
					'carousel' => 'yes'
				]
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'label'      => esc_html__( 'Autoplay Speed', 'themesflat-elementor' ),
				'type'       => Controls_Manager::NUMBER,
				'step'       => 500,
				'default'    => 5000,
				'conditions' => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'autoplay_enable',
							'operator' => '==',
							'value'    => 'on'
						],
						[
							'name'     => 'carousel',
							'operator' => '==',
							'value'    => 'yes'
						],
					]
				],
			]
		);
		$this->add_control(
			'loop',
			[
				'label'        => esc_html__( 'Loop', 'themesflat-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Enable', 'themesflat-elementor' ),
				'label_off'    => esc_html__( 'Disable', 'themesflat-elementor' ),
				'return_value' => 'on',
				'default'      => '',
				'condition'    => [
					'carousel' => 'yes'
				]
			]
		);

		$this->add_control(
			'grid_mode',
			[
				'label'        => esc_html__( 'Enabled Grid Mode', 'ube' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Enable', 'ube' ),
				'label_off'    => esc_html__( 'Disable', 'ube' ),
				'return_value' => 'on',
				'default'      => '',
				'condition'    => [
					'carousel' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'slide_rows',
			[
				'label'      => esc_html__( 'Slide Rows', 'ube' ),
				'type'       => Controls_Manager::NUMBER,
				'conditions' => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'grid_mode',
							'operator' => '==',
							'value'    => 'on'
						],
						[
							'name'     => 'carousel',
							'operator' => '==',
							'value'    => 'yes'
						],
					]
				],
				'default'    => 2
			]
		);

		$this->add_responsive_control( 'slides_per_row', [
			'label'      => esc_html__( 'Slides Per Row', 'ube' ),
			'type'       => Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 12,
			'step'       => 1,
			'default'    => 1,
			'conditions' => [
				'relation' => 'and',
				'terms'    => [
					[
						'name'     => 'grid_mode',
						'operator' => '==',
						'value'    => 'on'
					],
					[
						'name'     => 'carousel',
						'operator' => '==',
						'value'    => 'yes'
					],
				]
			],
		] );

		$this->end_controls_section();

		// /.End Posts Query
	}

	public function register_style() {
		$this->start_controls_section(
			'general_style', [
				'label'     => esc_html__( 'Style', 'ube' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style3'
				]
			]
		);
		$this->add_responsive_control(
			'wrapper_padding',
			[
				'label'      => esc_html__( 'Padding', 'ube' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-practise-area-post-style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'wrapper_style_tabs'
		);
		$this->start_controls_tab(
			'wrapper_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ube' ),
			]
		);
		$this->add_control(
			'background_color_normal', [
				'label'     => esc_html__( 'Background Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color_normal', [
				'label'     => esc_html__( 'Border Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'wrapper_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ube' ),
			]
		);
		$this->add_control(
			'background_color_hover', [
				'label'     => esc_html__( 'Background Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color_hover', [
				'label'     => esc_html__( 'Border Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control( 'title_heading', [
			'label'     => esc_html__( 'Title', 'ube' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .tf-practise-area-post-style3 .practise-area-title',
			]
		);
		$this->start_controls_tabs(
			'title_style_tabs'
		);
		$this->start_controls_tab(
			'title_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ube' ),
			]
		);
		$this->add_control(
			'title_color_normal', [
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3 .practise-area-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ube' ),
			]
		);
		$this->add_control(
			'title_color_hover', [
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3:hover .practise-area-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control( 'icon_heading', [
			'label'     => esc_html__( 'Icon', 'ube' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'icon_typography',
				'selector' => '{{WRAPPER}} .tf-practise-area-post-style3 .practise-area-icon',
			]
		);
		$this->start_controls_tabs(
			'icon_style_tabs'
		);
		$this->start_controls_tab(
			'icon_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ube' ),
			]
		);
		$this->add_control(
			'icon_color_normal', [
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3 .practise-area-icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'icon_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ube' ),
			]
		);
		$this->add_control(
			'icon_color_hover', [
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style3:hover .practise-area-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function register_style_01() {
		$this->start_controls_section(
			'general_style_01', [
				'label'     => esc_html__( 'Style', 'ube' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style1'
				]
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Content Padding', 'ube' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-practise-area-style1 .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'content_style_tabs'
		);
		$this->start_controls_tab(
			'content_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ube' ),
			]
		);
		$this->add_control(
			'bg_color_normal', [
				'label'     => esc_html__( 'Background Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1 .content' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'meta_color_normal', [
				'label'     => esc_html__( 'Meta Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1 .practise-area-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'first_letter_color_normal', [
				'label'     => esc_html__( 'First Letter Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1 .practise-area-title .title-first-letter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title01_color_normal', [
				'label'     => esc_html__( 'Title Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1 .practise-area-title .title-rest-letter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon01_color_normal', [
				'label'     => esc_html__( 'Read More Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1 .practise-area-view-more' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_color_bg', [
				'label'     => esc_html__( 'Read More Background Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1 .practise-area-view-more' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'content_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ube' ),
			]
		);

		$this->add_control(
			'bg_color_hover', [
				'label'     => esc_html__( 'Background Color Hover', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1:hover .content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'meta_color_hover', [
				'label'     => esc_html__( 'Meta Hover Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1:hover .practise-area-meta a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'first_letter_color_hover', [
				'label'     => esc_html__( 'First Letter Hover Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1:hover .practise-area-title .title-first-letter' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title01_color_hover', [
				'label'     => esc_html__( 'Title Hover Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1:hover .practise-area-title .title-rest-letter' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon01_color_hover', [
				'label'     => esc_html__( 'Read More Color Hover', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1:hover .practise-area-view-more' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color_bg_hover', [
				'label'     => esc_html__( 'Read More Background Color Hover', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-style1:hover .practise-area-view-more' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function register_style_item() {
		$this->start_controls_section( 'section_item_style',
			[
				'label' => esc_html__( 'Item', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'item_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-practise-area-wrap .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'feature_margin',
			[
				'label'      => esc_html__( 'Feature Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-practise-area-post .featured-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'meta_margin',
			[
				'label'      => esc_html__( 'Meta Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-practise-area-post .practise-area-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bg_item_color',
			[
				'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style2' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style2',
				],
			]
		);
		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Icon Border Color', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style2 .tf-practise-area-post .practise-area-icon' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style2',
				],
			]
		);
		$this->add_control(
			'icon_border_color_hover',
			[
				'label' => esc_html__( 'Icon Border Hover Color', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .tf-practise-area-post-style2 .tf-practise-area-post:hover .practise-area-icon' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style2',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_carousel() {
		// Start Style
		$this->start_controls_section( 'section_carousel_style',
			[
				'label'     => esc_html__( 'Carousel', 'themesflat-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'dots_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .slick-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'dots_color',
			[
				'label' => esc_html__( 'Dots Color', 'themesflat-elementor' ),
				'type'  => \Elementor\Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .slick-dots li.slick-active span'         => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .slick-dots li.slick-active span::before' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_section();
		// /.End Style
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_practise_area_wrap', [
			'id'         => "tf-practise-area-{$this->get_id()}",
			'class'      => [
				'tf-practise-area-wrap',
				'themesflat-practise-area-taxonomy',
				$settings['style']
			],
			'data-tabid' => $this->get_id()
		] );

		$class_carousel = $data_carousel = $row = '';
		$item_classes   = '';
		if ( $settings['carousel'] == 'yes' ) {
			$class_carousel = 'themesflat-practise-area-slider';
			$slides_to_show = empty( $settings['layout'] ) ? 1 : $settings['layout'];
			if ( isset( $settings['layout_tablet'] ) && $settings['layout_tablet'] != '' ) {
				$slides_to_show_tablet = $settings['layout_tablet'];
			} else {
				$slides_to_show_tablet = $slides_to_show;
			}
			if ( isset( $settings['layout_mobile'] ) && $settings['layout_mobile'] != '' ) {
				$slides_to_show_mobile = $settings['layout_mobile'];
			} else {
				$slides_to_show_mobile = $slides_to_show_tablet;
			}

			$navigation_arrow = $settings['navigation_arrow'];

			if ( isset( $settings['navigation_arrow_tablet'] ) && $settings['navigation_arrow_tablet'] != '' ) {
				$navigation_arrow_tablet = $settings['navigation_arrow_tablet'];
			} else {
				$navigation_arrow_tablet = $navigation_arrow;
			}
			if ( isset( $settings['navigation_arrow_mobile'] ) && $settings['navigation_arrow_mobile'] != '' ) {
				$navigation_arrow_mobile = $settings['navigation_arrow_mobile'];
			} else {
				$navigation_arrow_mobile = $navigation_arrow_tablet;
			}


			$navigation_dots = $settings['navigation_dots'];
			if ( isset( $settings['navigation_dots_tablet'] ) && $settings['navigation_dots_tablet'] != '' ) {
				$navigation_dots_tablet = $settings['navigation_dots_tablet'];
			} else {
				$navigation_dots_tablet = $navigation_dots;
			}
			if ( isset( $settings['navigation_dots_mobile'] ) && $settings['navigation_dots_mobile'] != '' ) {
				$navigation_dots_mobile = $settings['navigation_dots_mobile'];
			} else {
				$navigation_dots_mobile = $navigation_dots_tablet;
			}

			$center_padding = $settings['center_padding'];
			if ( isset( $settings['center_padding_tablet'] ) && $settings['center_padding_tablet'] != '' ) {
				$center_padding_tablet = $settings['center_padding_tablet'];
			} else {
				$center_padding_tablet = $center_padding;
			}
			if ( isset( $settings['center_padding_mobile'] ) && $settings['center_padding_mobile'] != '' ) {
				$center_padding_mobile = $settings['center_padding_mobile'];
			} else {
				$center_padding_mobile = $center_padding_tablet;
			}

			$slide_rows = $settings['slide_rows'];
			if ( isset( $settings['slide_rows_tablet'] ) && $settings['slide_rows_tablet'] != '' ) {
				$slide_rows_tablet = $settings['slide_rows_tablet'];
			} else {
				$slide_rows_tablet = $slide_rows;
			}
			if ( isset( $settings['slide_rows_mobile'] ) && $settings['slide_rows_mobile'] != '' ) {
				$slide_rows_mobile = $settings['slide_rows_mobile'];
			} else {
				$slide_rows_mobile = $slide_rows_tablet;
			}

			$slides_per_row = $settings['slides_per_row'];
			if ( isset( $settings['slides_per_row_tablet'] ) && $settings['slides_per_row_tablet'] != '' ) {
				$slides_per_row_tablet = $settings['slides_per_row_tablet'];
			} else {
				$slides_per_row_tablet = $slides_per_row;
			}
			if ( isset( $settings['slides_per_row_mobile'] ) && $settings['slides_per_row_mobile'] != '' ) {
				$slides_per_row_mobile = $settings['slides_per_row_mobile'];
			} else {
				$slides_per_row_mobile = $slides_per_row_tablet;
			}
			$slick_options           = array(
				'slidesToShow'  => intval( $settings['layout'] ),
				'centerMode'    => $settings['center_mode'] === 'on',
				'centerPadding' => $settings['center_padding'],
				'arrows'        => $settings['navigation_arrow'] === 'on',
				'dots'          => $settings['navigation_dots'] === 'on',
				'infinite'      => ( $settings['center_mode'] === 'on' ) ? true : ( $settings['loop'] === 'on' ),
				'autoplay'      => $settings['autoplay_enable'] === 'on',
				'autoplaySpeed' => intval( $settings['autoplay_speed'] )
			);
			$mobile_breakpoint_value = \Elementor\Plugin::$instance->breakpoints->get_breakpoints( 'mobile' )->get_value();
			$tablet_breakpoint_value = \Elementor\Plugin::$instance->breakpoints->get_breakpoints( 'tablet' )->get_value();

			$tablet_settings = array(
				'slidesToShow'  => intval( $slides_to_show_tablet ),
				'centerPadding' => $center_padding_tablet,
				'arrows'        => $navigation_arrow_tablet === 'on',
				'dots'          => $navigation_dots_tablet === 'on',
			);

			$mobile_settings = array(
				'slidesToShow'  => intval( $slides_to_show_mobile ),
				'centerPadding' => $center_padding_mobile,
				'arrows'        => $navigation_arrow_mobile === 'on',
				'dots'          => $navigation_dots_mobile === 'on',
			);

			if ( $settings['grid_mode'] === 'on' ) {
				$slick_options['rows']         = intval( $slide_rows );
				$slick_options['slidesPerRow'] = intval( $slides_per_row );

				$tablet_settings['rows']         = intval( $slide_rows_tablet );
				$tablet_settings['slidesPerRow'] = intval( $slides_per_row_tablet );

				$mobile_settings['rows']         = intval( $slide_rows_mobile );
				$mobile_settings['slidesPerRow'] = intval( $slides_per_row_mobile );
			}
			if ( $settings['grid_mode'] === 'on' ) {
				$slick_options['rows']         = intval( $slide_rows );
				$slick_options['slidesPerRow'] = intval( $slides_per_row );

				$tablet_settings['rows']         = intval( $slide_rows_tablet );
				$tablet_settings['slidesPerRow'] = intval( $slides_per_row_tablet );

				$mobile_settings['rows']         = intval( $slide_rows_mobile );
				$mobile_settings['slidesPerRow'] = intval( $slides_per_row_mobile );
			}
			$responsive = array(
				array(
					'breakpoint' => ( $tablet_breakpoint_value + 1 ),
					'settings'   => $tablet_settings
				),
				array(
					'breakpoint' => ( $mobile_breakpoint_value + 1 ),
					'settings'   => $mobile_settings
				)
			);

			$slick_options['responsive'] = $responsive;
			$this->add_render_attribute( 'tf_case_study_container', 'data-slick-options', json_encode( $slick_options ) );
		} else {
			$row     = 'row';
			$columns = empty( $settings['layout'] ) ? 1 : $settings['layout'];
			if ( isset( $settings['layout_tablet'] ) && $settings['layout_tablet'] != '' ) {
				$columns_tb = $settings['layout_tablet'];
			} else {
				$columns_tb = $columns;
			}
			if ( isset( $settings['layout_mobile'] ) && $settings['layout_mobile'] != '' ) {
				$columns_mb = $settings['layout_mobile'];
			} else {
				$columns_mb = $columns_tb;
			}
			$item_classes = themesflat_create_columns( $columns, $columns_tb, $columns_mb );
		}
		$container_class = array(
			'wrap-practise-area-post',
			$row,
			'column-' . $settings['layout'],
			$class_carousel

		);

		if ( $settings['disable_animation'] == 'yes' ) {
			$container_class[] = 'disable_animation';
		}
		$this->add_render_attribute( 'tf_case_study_container', [
			'class' => $container_class,
			'id'    => "tf-case-study-list-" . $this->get_id()
		] );
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		$query_args = array(
			'post_type'      => 'practise_area',
			'posts_per_page' => $settings['posts_per_page'],
			'paged'          => $paged
		);

		if ( ! empty( $settings['posts_categories'] ) ) {
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'practise_area_category',
					'field'    => 'slug',
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
		$image_size = '740x400';
		if ( ! empty( $settings['image_width'] ) && ! empty( $settings['image_height'] ) ) {
			$image_size = $settings['image_width'] . 'x' . $settings['image_height'];
		}

		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) :
			?>
            <div <?php echo $this->get_render_attribute_string( 'tf_practise_area_wrap' ); ?>>
                <div <?php echo $this->get_render_attribute_string( 'tf_case_study_container' ) ?>>
					<?php while ( $query->have_posts() ) : $query->the_post();
						$id                      = get_the_ID();
						$practise_area_post_icon = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( themesflat_get_opt_elementor( 'practise_area_post_icon' ), [ 'aria-hidden' => 'true' ] );
						?>
                        <div class="item <?php echo esc_attr( $item_classes ) ?>">
							<?php if ( $settings['style'] == 'style1' ) : ?>
                                <div class="tf-practise-area-post tf-practise-area-style1 tf-practise-area-post-<?php the_ID(); ?>">
									<?php if ( $settings['show_image'] == 'yes' ): ?>
                                        <div class="featured-post">
											<?php
											themesflat_render_thumbnail_markup( array(
												'image_size'  => $image_size,
												'image_mode'  => 'background',
												'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
											) );
											?>
                                            <a href="<?php echo get_the_permalink(); ?>" class="hover-icon">
                                                <div class="icon">
                                                    <img src="<?php echo esc_url( THEMESFLAT_URL . 'assets/img/practise-hover-icon.png' ) ?>"
                                                         alt="<?php esc_attr_e( 'Hover Icon', 'lowlead' ) ?>">
                                                </div>
                                            </a>
                                        </div>
									<?php endif; ?>
                                    <div class="content">
										<?php $title  = get_the_title();
										$first_letter = substr( $title, 0, 1 );
										$rest_str     = substr( $title, 1 );
										?>
                                        <div class="content-wrap">
                                            <div class="practise-area-meta practise-area-categories">
												<?php echo get_the_term_list( $id, 'practise_area_category', '', ', ', '' ); ?>
                                            </div>
                                            <h2 class="practise-area-title">
                                                <a href="<?php echo get_the_permalink(); ?>"
                                                   class="title-first-letter"><?php echo esc_html( $first_letter ) ?></a>
                                                <a href="<?php echo get_the_permalink(); ?>"
                                                   class="title-rest-letter"><?php echo esc_html( $rest_str ) ?></a>
                                            </h2>
                                        </div>
                                        <a href="<?php echo get_the_permalink(); ?>"
                                           class="practise-area-view-more">
                                            <i class="fal fa-long-arrow-right"></i>
                                        </a>

                                    </div>
                                </div>
							<?php elseif ( $settings['style'] == 'style2' ) : ?>
                                <div class="tf-practise-area-post tf-practise-area-post-style2 practise-area-post-<?php the_ID(); ?>">
                                    <div class="tf-practise-area-post tf-practise-area-post-<?php the_ID(); ?>">
										<?php if ( ! empty( $practise_area_post_icon ) ): ?>
                                            <div class="practise-area-icon">
												<?php echo wp_kses_post( $practise_area_post_icon ) ?>
                                            </div>
										<?php endif; ?>
                                        <div class="content">
                                            <a href="<?php echo get_the_permalink(); ?>" class="practise-area-title">
												<?php echo get_the_title(); ?>
                                            </a>
                                            <a href="<?php echo get_the_permalink(); ?>"
                                               class="practise-area-view-more">
                                                <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
							<?php elseif ( $settings['style'] == 'style3' ) : ?>
                                <div class="tf-practise-area-post tf-practise-area-post-style3 practise-area-post-<?php the_ID(); ?>">
									<?php if ( ! empty( $practise_area_post_icon ) ): ?>
                                        <div class="practise-area-icon">
											<?php echo wp_kses_post( $practise_area_post_icon ) ?>
                                        </div>
									<?php endif; ?>
                                    <div class="content">
                                        <h2 class="practise-area-title">
                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h2>
                                        <div class="desc"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
                                    </div>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                </div>
            </div>
		<?php
		else:
			esc_html_e( 'No posts found', 'themesflat-elementor' );
		endif;

	}

}