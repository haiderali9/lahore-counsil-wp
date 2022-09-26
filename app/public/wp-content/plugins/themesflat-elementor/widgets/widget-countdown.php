<?php
class TFCountdown_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-countdown';
    }
    
    public function get_title() {
        return esc_html__( 'TF Countdown', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-countdown';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-countdown'];
	}

    public function get_script_depends() {
		return [ 'countdown', 'tf-countdown' ];
	}

	protected function register_controls() {
		// Start Countdown        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Countdown', 'themesflat-elementor'),
	            ]
	        );

			$this->add_control(
				'due_date',
				[
					'label' => esc_html__( 'Due Date', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DATE_TIME,
					'default' => gmdate( 'Y-m-d H:i', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
					'description' => sprintf( esc_html__( 'Date set according to your timezone: %s.', 'themesflat-elementor' ), \Elementor\Utils::get_timezone_string() ),
				]
			);

			$this->add_control(
				'show_days',
				[
					'label' => esc_html__( 'Days', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_hours',
				[
					'label' => esc_html__( 'Hours', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_minutes',
				[
					'label' => esc_html__( 'Minutes', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_seconds',
				[
					'label' => esc_html__( 'Seconds', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_labels',
				[
					'label' => esc_html__( 'Show Label', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'default' => 'yes',
					'separator' => 'before',
				]
			);

			$this->add_control(
				'custom_labels',
				[
					'label' => esc_html__( 'Custom Label', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'condition' => [
						'show_labels!' => '',
					],
				]
			);

			$this->add_control(
				'label_days',
				[
					'label' => esc_html__( 'Days', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Days', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Days', 'themesflat-elementor' ),
					'condition' => [
						'show_labels!' => '',
						'custom_labels!' => '',
						'show_days' => 'yes',
					],
				]
			);

			$this->add_control(
				'label_hours',
				[
					'label' => esc_html__( 'Hours', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Hours', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Hours', 'themesflat-elementor' ),
					'condition' => [
						'show_labels!' => '',
						'custom_labels!' => '',
						'show_hours' => 'yes',
					],
				]
			);

			$this->add_control(
				'label_minutes',
				[
					'label' => esc_html__( 'Minutes', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Minutes', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Minutes', 'themesflat-elementor' ),
					'condition' => [
						'show_labels!' => '',
						'custom_labels!' => '',
						'show_minutes' => 'yes',
					],
				]
			);

			$this->add_control(
				'label_seconds',
				[
					'label' => esc_html__( 'Seconds', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Seconds', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Seconds', 'themesflat-elementor' ),
					'condition' => [
						'show_labels!' => '',
						'custom_labels!' => '',
						'show_seconds' => 'yes',
					],
				]
			);
	        
			$this->end_controls_section();
        // /.End Countdown

		// Start Boxes
	        $this->start_controls_section(
				'section_box_style',
				[
					'label' => esc_html__( 'Boxes', 'themesflat-elementor' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);  

			$this->add_responsive_control(
				'container_width',
				[
					'label' => esc_html__( 'Container Width', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' => [ '%', 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'container_height',
				[
					'label' => esc_html__( 'Padding Top & Bottom', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' => [ '%', 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-countdown .tf-countdown-item' => 'padding-top: {{SIZE}}{{UNIT}};padding-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'position_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'themesflat-elementor' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-elementor' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-elementor' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
					'toggle' => false,
				]
			);

			$this->add_control(
				'box_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff7029',
					'selectors' => [
						'{{WRAPPER}} .tf-countdown-item' => 'background-color: {{VALUE}};',
						'{{WRAPPER}}.coundown-shop .tf-countdown' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'selector' => '{{WRAPPER}} .tf-countdown-item',
					'separator' => 'before',
				]
			);

			$this->add_control(
				'box_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-countdown-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'box_spacing',
				[
					'label' => esc_html__( 'Space Between', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'size' => 10,
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'body:not(.rtl) {{WRAPPER}} .tf-countdown-item:not(:first-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
						'body:not(.rtl) {{WRAPPER}} .tf-countdown-item:not(:last-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
						'body.rtl {{WRAPPER}} .tf-countdown-item:not(:first-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
						'body.rtl {{WRAPPER}} .tf-countdown-item:not(:last-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
					],
				]
			);

			$this->add_responsive_control(
				'box_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-countdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_section();
		// /.End Boxes

		// Start Content
			$this->start_controls_section(
				'section_content_style',
				[
					'label' => esc_html__( 'Content', 'themesflat-elementor' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'label_display',
				[
					'label' => esc_html__( 'View', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'view-block' => esc_html__( 'Block', 'themesflat-elementor' ),
						'view-inline' => esc_html__( 'Inline', 'themesflat-elementor' ),
					],
					'default' => 'view-block',
				]
			);

			$this->add_control(
				'heading_digits',
				[
					'label' => esc_html__( 'Digits', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'digits_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-countdown-digits' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'digits_typography',
					'fields_options' => [
				        'typography' => ['default' => 'yes'],				        
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '26',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-countdown-digits',
				]
			);

			$this->add_control(
				'heading_label',
				[
					'label' => esc_html__( 'Label', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'label_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-countdown-label' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'label_typography',
					'fields_options' => [
				        'typography' => ['default' => 'yes'],				        
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '13',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
				            ],
				        ],
				        'text_transform' => [
							'default' => 'uppercase',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-countdown-label',
				]
			);

			$this->end_controls_section();
		// /.End Content
	}

	private $_default_countdown_labels;

	private function init_default_countdown_labels() {
		$this->_default_countdown_labels = [
			'label_months' => esc_html__( 'Months', 'themesflat-elementor' ),
			'label_weeks' => esc_html__( 'Weeks', 'themesflat-elementor' ),
			'label_days' => esc_html__( 'Days', 'themesflat-elementor' ),
			'label_hours' => esc_html__( 'Hours', 'themesflat-elementor' ),
			'label_minutes' => esc_html__( 'Minutes', 'themesflat-elementor' ),
			'label_seconds' => esc_html__( 'Seconds', 'themesflat-elementor' ),
		];
	}

	public function get_default_countdown_labels() {
		if ( ! $this->_default_countdown_labels ) {
			$this->init_default_countdown_labels();
		}

		return $this->_default_countdown_labels;
	}

	private function render_countdown_item( $instance, $label, $part_class ) {
		$string = '<div class="tf-countdown-item"><span class="tf-countdown-digits ' . $part_class . '"></span>';

		if ( $instance['show_labels'] ) {
			$default_labels = $this->get_default_countdown_labels();
			$label = ( $instance['custom_labels'] ) ? $instance[ $label ] : $default_labels[ $label ];
			$string .= ' <span class="tf-countdown-label">' . $label . '</span>';
		}

		$string .= '</div>';

		return $string;
	}

	private function get_strftime( $settings ) {
		$string = '';
		if ( $settings['show_days'] ) {
			$string .= $this->render_countdown_item( $settings, 'label_days', 'tf-countdown-days' );
		}
		if ( $settings['show_hours'] ) {
			$string .= $this->render_countdown_item( $settings, 'label_hours', 'tf-countdown-hours' );
		}
		if ( $settings['show_minutes'] ) {
			$string .= $this->render_countdown_item( $settings, 'label_minutes', 'tf-countdown-minutes' );
		}
		if ( $settings['show_seconds'] ) {
			$string .= $this->render_countdown_item( $settings, 'label_seconds', 'tf-countdown-seconds' );
		}

		return $string;
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$due_date = $settings['due_date'];
		$content = $this->get_strftime( $settings );

		$this->add_render_attribute( 'tf_countdown', ['id' => "tf-countdown-{$this->get_id()}", 'class' => ['tf-countdown', $settings['label_display'], 'position-align-'.$settings['position_align'] ], 'data-tabid' => $this->get_id(), 'data-date' => $due_date ] );

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_countdown'),
            $content
        );	
		
	}

}