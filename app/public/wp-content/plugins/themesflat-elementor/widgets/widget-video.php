<?php

class TFVideo_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'tf_video_popup';
	}

	public function get_title()
	{
		return esc_html__('TF Video', 'themesflat-elementor');
	}

	public function get_icon()
	{
		return 'eicon-youtube';
	}

	public function get_categories()
	{
		return ['themesflat_addons'];
	}

	public function get_style_depends()
	{
		return ['magnific-popup', 'tf-video'];
	}

	public function get_script_depends()
	{
		return ['magnific-popup', 'tf-video'];
	}

	protected function register_controls()
	{
		// Start Tab Video        
		$this->start_controls_section('section_video',
			[
				'label' => esc_html__('Video', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'video_type',
			[
				'label' => esc_html__('Source', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'youtube' => esc_html__('YouTube', 'themesflat-elementor'),
					'vimeo' => esc_html__('Vimeo', 'themesflat-elementor'),
				],
			]
		);
		$this->add_control(
			'youtube_url',
			[
				'label' => esc_html__('Link', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Enter your URL', 'themesflat-elementor') . ' (YouTube)',
				'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				'label_block' => true,
				'condition' => [
					'video_type' => 'youtube',
				],
			]
		);

		$this->add_control(
			'vimeo_url',
			[
				'label' => esc_html__('Link', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Enter your URL', 'themesflat-elementor') . ' (Vimeo)',
				'default' => 'https://vimeo.com/235215203',
				'label_block' => true,
				'condition' => [
					'video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-play',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'position_icon',
			[
				'label' => esc_html__('Position Icon', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'before',
				'options' => [
					'before' => esc_html__('Before Text', 'themesflat-elementor'),
					'after' => esc_html__('After Text', 'themesflat-elementor'),
				],
			]
		);

		$this->add_control(
			'text_button',
			[
				'label' => esc_html__('Text Button', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Play', 'themesflat-elementor'),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
		// /.End Tab Video

		// Start General
		$this->start_controls_section('section_general',
			[
				'label' => esc_html__('General', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__('Left', 'themesflat-elementor'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'themesflat-elementor'),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__('Right', 'themesflat-elementor'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup' => 'justify-content: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'video_width',
			[
				'label' => esc_html__('Width', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .popup-video' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'video_height',
			[
				'label' => esc_html__('Height', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .popup-video' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tf_animation',
			[
				'label' => esc_html__('Animation', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'tf_ani-default',
				'options' => [
					'tf_ani-default' => esc_html__('Default', 'themesflat-elementor'),
					'tf_ani-linear-gradient' => esc_html__('Linear Gradient', 'themesflat-elementor'),
					'tf_ani-pulsebox-1' => esc_html__('Pulse Box 1', 'themesflat-elementor'),
				]
			]
		);
		$this->end_controls_section();
		// /.End General
		$this->start_controls_section('section_video_content',
			[
				'label' => esc_html__('Content', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_margin',
			[
				'label' => esc_html__('Margin', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .video-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// Start Button
		$this->start_controls_section('section_text_button',
			[
				'label' => esc_html__('Button', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_button_typography',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-video-popup .popup-video',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border Radius', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .popup-video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs('video_btn_tabs');

		$this->start_controls_tab(
			'video_btn_normal_tab',
			[
				'label' => esc_html__('Normal', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' => esc_html__('Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .video-icon' => 'color: {{VALUE}}; fill: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn_background',
				'label' => esc_html__('Background', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-video-popup .video-icon',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tf_border',
				'label' => esc_html__('Border', 'ube'),
				'selector' => '{{WRAPPER}} .tf-video-popup .popup-video',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'video_btn_hover_tab',
			[
				'label' => esc_html__('Hover', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'video_btn_color_hover',
			[
				'label' => esc_html__('Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .video-icon:hover' => 'color: {{VALUE}}; fill: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn_background_hover',
				'label' => esc_html__('Background', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-video-popup .video-icon:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tf_border_hover',
				'label' => esc_html__('Border', 'ube'),
				'selector' => '{{WRAPPER}} .tf-video-popup .popup-video:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// /.End Button

		// Start Icon Video
		$this->start_controls_section('section_icon_video',
			[
				'label' => esc_html__('Icon Video', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Icon Size', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .video-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tf-video-popup .video-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_icon',
			[
				'label' => esc_html__('Margin', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-video-popup .video-icon svg, {{WRAPPER}} .tf-video-popup .video-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('tf_video_popup', ['id' => "tf-video-popup-{$this->get_id()}", 'class' => ['tf-video-popup'], 'data-tabid' => $this->get_id()]);

		$text_button = $icon = $video_url = '';

		$video_url = $settings[$settings['video_type'] . '_url'];

		$icon = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon($settings['icon'], ['aria-hidden' => 'true']);

		if ($settings['text_button'] != '') {
			$text_button = $settings['text_button'];
		}

		$content = $icon . $text_button;
		if ($settings['position_icon'] == 'after') {
			$content = $text_button . $icon;
		}
		echo sprintf(
			'<div %1$s>
				<div class="wrap-icon">				
					<a class="video-icon popup-video %4$s %5$s" href="%2$s">
					<span class="video-content">%3$s</span>
					</a>
				</div>				
            </div>',
			$this->get_render_attribute_string('tf_video_popup'),
			$video_url,
			$content,
			$settings['tf_animation'],
			'icon-' . $settings['position_icon']
		);

	}

}