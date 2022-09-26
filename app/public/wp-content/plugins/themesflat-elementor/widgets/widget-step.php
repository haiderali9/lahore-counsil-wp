<?php
class TFStep_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-step';
    }
    
    public function get_title() {
        return esc_html__( 'TF Step', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-step'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-elementor'),
	            ]
	        );

	        $this->add_control(
				'styles',
				[
					'label' => esc_html__( 'Style', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'label_block' => true,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1 ( Max 3 Steps )', 'themesflat-elementor' ),
						'style2' => esc_html__( 'Style 2 ( Max 3 Steps )', 'themesflat-elementor' ),
						'style3' => esc_html__( 'Style 3 ( Max 4 Steps )', 'themesflat-elementor' ),
					],
				]
			);

	        $repeater = new \Elementor\Repeater();

	        $repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder-2.jpg",
					],
				]
			);
			$repeater->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'medium',
				]
			);
	        $repeater->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Set Design Planning', 'themesflat-elementor' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'text',
				[
					'label' => esc_html__( 'Text', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Amet consectetur adipiscineli sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-elementor' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'button_text',
				[
					'label' => esc_html__( 'Button Text', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Read More', 'themesflat-elementor' ),
					'label_block' => true,
				]
			);
			$repeater->add_responsive_control( 'margin_item',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
	                'selectors' => [
	                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );
	        $repeater->add_control(
				'item_color',
				[
					'label' => esc_html__( 'Color Number', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'default',
					'options' => [
						'default' => esc_html__( 'Official Color', 'themesflat-elementor' ),
						'custom' => esc_html__( 'Custom', 'themesflat-elementor' ),
					],
				]
			);
	        $repeater->add_control(
				'item_number_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step {{CURRENT_ITEM}} .number' => 'color: {{VALUE}}',
					],
					'condition' => [
	                	'item_color' => 'custom',
	                ],
				]
			);
			$repeater->add_control(
				'item_number_color_bg',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step  {{CURRENT_ITEM}} .number' => 'background-color: {{VALUE}}',
					],
					'condition' => [
	                	'item_color' => 'custom',
	                ],
				]
			);
			$repeater->add_control(
				'icon_content',
				[
					'label' => esc_html__( 'Icon Content ( Only Style 3 )', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'zingbox-icon-001-solar-panels',
						'library' => 'zingbox_icon_solar_energy',
					],
				]
			);
			$this->add_control(
				'list_step',
				[
					'label' => esc_html__( 'List Step', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'show_label' => true,
					'fields' => $repeater->get_controls(),
					'default' => [
						[								
							'heading' => esc_html__( 'Set Design Planning', 'themesflat-elementor' ),
							'text' => esc_html__( 'Amet consectetur adipiscineli sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-elementor' ),
							'button_text' => esc_html__( 'Read More', 'themesflat-elementor' ),
						],
						[							
							'heading' => esc_html__( 'Design Analysis', 'themesflat-elementor' ),
							'text' => esc_html__( 'Amet consectetur adipiscineli sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-elementor' ),
							'button_text' => esc_html__( 'Read More', 'themesflat-elementor' ),
						],
						[
							'heading' => esc_html__( 'Got Final Results', 'themesflat-elementor' ),
							'text' => esc_html__( 'Amet consectetur adipiscineli sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-elementor' ),
							'button_text' => esc_html__( 'Read More', 'themesflat-elementor' ),
						],
					],
					'title_field' => '{{{ heading }}}',
				]
			);			
	        
			$this->end_controls_section();
        // /.End List Setting  

	    // Start Style Style
			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'themesflat-elementor' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_responsive_control( 'padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .item-step' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );			
			$this->add_control(
				'background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'h_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                	'styles' => 'style1',
	                ],
				]
			);
			$this->add_responsive_control( 'border_radius_s1',
	            [
	                'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'default' => [
						'top' => '50',
						'right' => '50',
						'bottom' => '50',
						'left' => '50',
						'unit' => '%',
						'isLinked' => false,
					],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step.style1 .item-step .image, {{WRAPPER}} .tf-step.style1 .item-step .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
	                	'styles' => 'style1',
	                ],
	            ]
	        );

	        $this->add_control(
				'h_number',
				[
					'label' => esc_html__( 'Number', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'number_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .number' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-step.style3 .step .number' => '-webkit-text-stroke-color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'number_color_bg',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#57b33c',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .number' => 'background-color: {{VALUE}}',
					],
					'condition' => [
	                	'styles' => ['style1','style2'],
	                ],
				]
			);
			$this->add_control(
				'number_border_color',
				[
					'label' => esc_html__( 'Border Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .number' => 'border-color: {{VALUE}}',
					],
					'condition' => [
	                	'styles' => ['style1','style2'],
	                ],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'number_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Teko',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
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
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-step .step .number',
					'condition' => [
	                	'styles' => ['style1','style2'],
	                ],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'number_typography_s3',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Teko',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '250',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '0.75',
				            ],
				        ],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-step.style3 .step .number',
					'condition' => [
	                	'styles' => 'style3',
	                ],
				]
			);

			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#232323',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .heading' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Teko',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '24',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1.3',
				            ],
				        ],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-step .step .heading',
				]
			);

			$this->add_control(
				'h_text',
				[
					'label' => esc_html__( 'Text', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#616161',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .text' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '16',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '32',
				            ],
				        ],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-step .step .text',
				]
			);

			$this->add_control(
				'h_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                	'styles' => 'style3',
	                ],
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#616161',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .button-step' => 'color: {{VALUE}}',
					],
					'condition' => [
	                	'styles' => 'style3',
	                ],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '15',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '600',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
				            ],
				        ],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-step .step .button-banner',
					'condition' => [
	                	'styles' => 'style3',
	                ],
				]
			);

			$this->add_control(
				'h_icon_content',
				[
					'label' => esc_html__( 'Icon Content', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                	'styles' => 'style3',
	                ],
				]
			);
			$this->add_control(
				'icon_content_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff7029',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .icon i' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-step .step .icon svg' => 'fill: {{VALUE}}',
					],
					'condition' => [
	                	'styles' => 'style3',
	                ],
				]
			);

			$this->end_controls_section();
		// /.End Style 
	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_step', ['id' => "tf-step-{$this->get_id()}", 'class' => ['tf-step', $settings['styles']], 'data-tabid' => $this->get_id() ] );
		
        ?>
        <div <?php echo $this->get_render_attribute_string('tf_step') ?>>
	       	<div class="step">
	       		<?php foreach ( $settings['list_step'] as $key => $step ): ++$key; ?>
	       			<?php 
	       				if($key > 4){ 
	       					break; 
	       				}elseif ($settings['styles'] == "style1" && $key > 3) {
	       					break;
	       				}elseif ($settings['styles'] == "style2" && $key > 3) {
	       					break;
	       				} 
	       			?>	       		
	       		<div class="elementor-repeater-item-<?php echo esc_attr($step['_id']); ?> item-step item-step-<?php echo esc_attr($key) ?>">	       			
	       			<?php if ($settings['styles'] == "style1"): ?>
	       				<div class="inner">
			       			<div class="image">
			       				<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $step, 'thumbnail', 'image'); ?>
			       				<span class="number"><?php echo '0'.esc_attr($key); ?></span>
		       				</div>
			       			<h2 class="heading"><?php echo esc_attr($step['heading']); ?></h2>
			       			<div class="text"><?php printf($step['text']); ?></div>
		       			</div>
			       	<?php elseif ($settings['styles'] == "style2"): ?>
			       		<div class="inner">
			       			<div class="image">
			       				<div class="inner-image">
			       					<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $step, 'thumbnail', 'image'); ?>
			       				</div>
			       				<span class="number"><?php echo '0'.esc_attr($key); ?></span>
		       				</div>
		       				<div class="content">
				       			<h2 class="heading"><?php echo esc_attr($step['heading']); ?></h2>
				       			<div class="text"><?php printf($step['text']); ?></div>
			       			</div>
		       			</div>
		       		<?php elseif ($settings['styles'] == "style3"): ?>
		       			<div class="inner">
			       			<div class="image">
			       				<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $step, 'thumbnail', 'image'); ?>
			       				<span class="number"><?php echo '0'.esc_attr($key); ?></span>
		       				</div>
		       				<div class="content">
		       					<div class="icon"><?php \Elementor\Icons_Manager::render_icon( $step['icon_content'], [ 'aria-hidden' => 'true' ] ); ?></div>
		       					<div class="inner-content">
					       			<h2 class="heading"><?php echo esc_attr($step['heading']); ?></h2>
					       			<div class="content-hide">
						       			<div class="text"><?php printf($step['text']); ?></div>
					       				<a href="#" class="button-step"><?php echo esc_attr($step['button_text']); ?><i class="zingbox-icon-long-arrow-right2"></i></a>
				       				</div>
				       			</div>
			       			</div>
		       			</div>
			       	<?php endif; ?>
	       		</div>		       	
	       		<?php endforeach; ?>
	        </div>
	    </div>
        <?php 		
	}

}