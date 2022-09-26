<?php

class TFTestimonialTypeGroupCarousel_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'tf-testimonial-carousel-type-group';
	}

	public function get_title()
	{
		return esc_html__('TF Testimonial Type Group Carousel', 'themesflat-elementor');
	}

	public function get_icon()
	{
		return 'eicon-slider-push';
	}

	public function get_categories()
	{
		return ['themesflat_addons'];
	}

	public function get_style_depends()
	{
		return ['owl-carousel', 'tf-testimonial'];
	}

	public function get_script_depends()
	{
		return ['owl-carousel', 'tf-testimonial'];
	}

	protected function register_controls()
	{
		// Start Carousel Setting
		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__('Testimonial Carousel', 'themesflat-elementor'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'avatar',
			[
				'label' => esc_html__('Choose Avatar', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . "assets/img/placeholder-2.jpg",
				],
			]
		);

		$repeater->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Faustino D. Bennett', 'themesflat-elementor'),
			]
		);

		$repeater->add_control(
			'position',
			[
				'label' => esc_html__('Position', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Senior Manager', 'themesflat-elementor'),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__('“ Quis ipsum suspendisse ultrices gravie Risus commodo viverra maeces accumsan lacus vel facilisis. Sede perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque ”', 'themesflat-elementor'),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image (Only Style 1)', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . "assets/img/placeholder-group.png",
				],
			]
		);

		$this->add_control(
			'carousel_list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'name' => 'Faustino D. Bennett',
						'position' => 'Senior Manager',
						'description' => '“ Quis ipsum suspendisse ultrices gravie Risus commodo viverra maeces accumsan lacus vel facilisis. Sede perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque ”',
					],
					[
						'name' => 'Donald C. Mitchell',
						'position' => 'Senior Manager',
						'description' => '“ Quis ipsum suspendisse ultrices gravie Risus commodo viverra maeces accumsan lacus vel facilisis. Sede perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque ”',
					],
					[
						'name' => 'Teodoro D. Williams',
						'position' => 'Senior Manager',
						'description' => '“ Quis ipsum suspendisse ultrices gravie Risus commodo viverra maeces accumsan lacus vel facilisis. Sede perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque ”',
					],
				],
			]
		);

		$this->add_control(
			'h_image_size_avatar',
			[
				'label' => esc_html__('Image Size Avatar', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail_avatar',
				'default' => 'thumbnail',
			]
		);
		$this->add_control(
			'h_image_size_Image',
			[
				'label' => esc_html__('Image Size Image', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail_image',
				'default' => 'full',
			]
		);

		$this->end_controls_section();
		// /.End Carousel

		// Start Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'h_general',
			[
				'label' => esc_html__('General', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'background',
			[
				'label' => esc_html__('Background Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'h_name',
			[
				'label' => esc_html__('Name', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .name',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => esc_html__('Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'h_position',
			[
				'label' => esc_html__('Position', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .position',
			]
		);
		$this->add_control(
			'position_color',
			[
				'label' => esc_html__('Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .position' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'h_description',
			[
				'label' => esc_html__('Description', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .description',
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style

		// Start Setting
		$this->start_controls_section(
			'section_setting',
			[
				'label' => esc_html__('Setting', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__('Loop', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'themesflat-elementor'),
				'label_off' => esc_html__('Off', 'themesflat-elementor'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'carousel_auto',
			[
				'label' => esc_html__('Auto Play', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'themesflat-elementor'),
				'label_off' => esc_html__('Off', 'themesflat-elementor'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'carousel_spacer',
			[
				'label' => esc_html__('Spacer', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'navigation_arrow_offset',
			[
				'label'      => esc_html__( 'Arrow Offset Bottom', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => - 500,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav' => 'bottom:  {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'navigation_arrow_offset_right',
			[
				'label'      => esc_html__( 'Arrow Offset Left', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => - 500,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav' => 'left:  {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();
		// /.End Setting
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings_for_display();


		?>
        <div class="tf-testimonial-carousel-type-group" data-arrow="yes"
             data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>"
             data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>"
             data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>"
             data-bullets="">
            <div class="inner-testimonial">
                <div class="testimonial-content">
                    <div class="owl-carousel owl-theme testimonial-group testimonial">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>
                            <div class="item">
                                <div class="item-testimonial">
                                    <div class="description"><?php echo sprintf('%1$s', $carousel['description']); ?></div>
                                    <div class="image-thumbs">
                                        <div class="icon-quote text-center">
                                            <i class="icon-bulterquote"></i>
                                        </div>
		                                <?php if ($carousel['avatar']['id']): ?>
                                            <img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src($carousel['avatar']['id'], 'thumbnail_avatar', $settings)); ?>"
                                                 alt="avatar">
		                                <?php else: ?>
                                            <img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="avatar">
		                                <?php endif ?>
                                        <div class="info">
                                            <h4 class="name"><?php echo esc_attr($carousel['name']); ?></h4>
                                            <div class="position"><?php echo esc_attr($carousel['position']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}

}