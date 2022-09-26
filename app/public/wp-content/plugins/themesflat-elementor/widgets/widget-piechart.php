<?php
use \Elementor\Controls_Manager;
class TFPieChart_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfpiechart';
    }
    
    public function get_title() {
        return esc_html__( 'TF Pie Chart', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-counter-circle';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
        return ['tf-piechart'];
    }

    public function get_script_depends() {
        return ['appear', 'piechart', 'tf-piechart'];
    }

	protected function register_controls() {
        // Start Setting
            $this->start_controls_section( 
                    'section_setting',
                    [
                        'label' => esc_html__('Setting', 'themesflat-elementor'),
                    ]
                );

                $this->add_control(
                    'piechart_style',
                    [
                        'label' => esc_html__( 'Pie Chart Style', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'simple',
                        'options' => [
                            'simple'  => esc_html__( 'Simple', 'themesflat-elementor' ),
                            'withcontent' => esc_html__( 'With Content', 'themesflat-elementor' ),
                        ],
                    ]
                );

                $this->add_control(
                    'style',
                    [
                        'label' => esc_html__( 'Style', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'style1',
                        'options' => [
                            'style1'  => esc_html__( 'Style 1', 'themesflat-elementor' ),
                            'style2' => esc_html__( 'Style 2', 'themesflat-elementor' ),
                        ],
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ]
                    ]
                );

                $this->add_control(
                    'piechart_percentage',
                    [
                        'label' => esc_html__( 'Percentage', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                        'default' => 90,
                    ]
                );

		$this->add_responsive_control(
			'heading_align',
			[
				'label' => esc_html__('Text Align', 'themesflat-elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'themesflat-elementor'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'themesflat-elementor'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'themesflat-elementor'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
				'condition' => [
					'piechart_style' => 'simple'
				]
			]
		);

                $this->add_control(
                    'piechart_title',
                    [
                        'label' => esc_html__( 'Title', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Flexible Solutions', 'themesflat-elementor' ),
                        'placeholder' => esc_html__( 'Type your title here', 'themesflat-elementor' ),
                        'label_block' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ]
                    ]
                );

                $this->add_control(
                    'piechart_title_2',
                    [
                        'label' => esc_html__( 'Title 2', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Flexible Solutions', 'themesflat-elementor' ),
                        'placeholder' => esc_html__( 'Type your title here', 'themesflat-elementor' ),
                        'label_block' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent',
                            'style' => 'style2',
                        ]
                    ]
                );

                $this->add_control(
                    'piechart_description',
                    [
                        'label' => esc_html__( 'Description', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'rows' => 10,
                        'default' => esc_html__( 'Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit,', 'themesflat-elementor' ),
                        'placeholder' => esc_html__( 'Type your description here', 'themesflat-elementor' ),
                        'label_block' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ]
                    ]
                );

                $this->add_control(
                    'pie_chart_position',
                    [
                        'label' => esc_html__( 'Pie Chart Position', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'position-left' => [
                                'title' => esc_html__( 'Left', 'themesflat-elementor' ),
                                'icon' => 'eicon-h-align-left',
                            ],
                            'position-top' => [
                                'title' => esc_html__( 'Top', 'themesflat-elementor' ),
                                'icon' => 'eicon-v-align-top',
                            ],
                            'position-right' => [
                                'title' => esc_html__( 'Right', 'themesflat-elementor' ),
                                'icon' => 'eicon-h-align-right',
                            ],
                        ],
                        'default' => 'position-left',
                        'toggle' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent',
                            'style' => 'style1',
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'spacing',
                    [
                        'label' => esc_html__( 'Spacing', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 20,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tf-pie-chart.position-left .pie-chart-content' => 'margin-left: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .tf-pie-chart.position-right .pie-chart-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                            '.rtl {{WRAPPER}} .tf-pie-chart.position-left .pie-chart-content' => 'margin-right: {{SIZE}}{{UNIT}};margin-left:0;',
                            '.rtl {{WRAPPER}} .tf-pie-chart.position-right .pie-chart-content' => 'margin-left: {{SIZE}}{{UNIT}};margin-right:0;',
                        ],
                        'condition' => [
                            'piechart_style' => 'withcontent',
                            'style' => 'style1',
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'piechart_spacing',
                    [
                        'label' =>esc_html__( 'Piechart Spacing', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', 'em', '%' ],
                        'default' =>    [
                            'top' => '0',
                            'right' => '30',
                            'bottom' => '0',
                            'left' => '20',
                            'unit' => 'px',
                            'isLinked' => false,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tf-pie-chart.style2 .pie-chart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'condition' => [
                            'piechart_style' => 'withcontent',
                            'style' => 'style2',
                        ]
                    ]
                );

            $this->end_controls_section();
        // /.End Setting

        // Start Style Chart
            $this->start_controls_section( 
                    'section_style_chart',
                    [
                        'label' => esc_html__('Chart', 'themesflat-elementor'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );

            $this->add_responsive_control(
                'piechart_size',
                [
                    'label' => esc_html__( 'Piechart Size', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 50,
                            'max' => 250,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'size' => 90,
                    ],
                ]
            );
            $this->add_responsive_control(
                'piechart_border_size',
                [
                    'label' => esc_html__( 'Border Size', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 30,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 7,
                    ],
                ]
            );  

            $this->add_responsive_control(
                'piechart_line_color',
                [
                    'label' => esc_html__( 'Bar Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#33B9CB',
                ]
            );

            $this->add_responsive_control(
                'piechart_bar_color_bg',
                [
                    'label' => esc_html__( 'Bar Background Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#f1fafb',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'number_typography',
                    'label' => esc_html__( 'Typography Number', 'themesflat-elementor' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Jost',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '30',
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
                    'selector' => '{{WRAPPER}} .tf-pie-chart .pie-chart .percent',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'percent_typography',
                    'label' => esc_html__( 'Typography Percent', 'themesflat-elementor' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Jost',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '16',
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
                    'selector' => '{{WRAPPER}} .tf-pie-chart .percent:after',
                ]
            );

            $this->add_responsive_control(
                'number_color',
                [
                    'label' => esc_html__( 'Number Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#091d3e',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pie-chart .pie-chart .percent' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();
        // /.End Style Chart

        // Start Style Title
            $this->start_controls_section( 
                    'section_style_title',
                    [
                        'label' => esc_html__('Title', 'themesflat-elementor'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ],
                    ]
                );

                $this->add_control(
                    'piechart_title_color',
                    [
                        'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'piechart_title_typography',
                        'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
                        'fields_options' => [
                            'typography' => ['default' => 'yes'],
                            'font_family' => [
                                'default' => 'Jost',
                            ],
                            'font_size' => [
                                'default' => [
                                    'unit' => 'px',
                                    'size' => '24',
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
                        'selector' => '{{WRAPPER}} .tf-piechart-title',
                    ]
                );

                $this->add_responsive_control(
                    'piechart_title_margin',
                    [
                        'label' =>esc_html__( 'Margin', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', 'em', '%' ],
                        'default' =>    [
                            'top' => '6',
                            'right' => '0',
                            'bottom' => '10',
                            'left' => '0',
                            'unit' => 'px',
                            'isLinked' => false,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();
        // /.End Style Title

        // Start Style Title 2
            $this->start_controls_section( 
                    'section_style_title_2',
                    [
                        'label' => esc_html__('Title 2', 'themesflat-elementor'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'piechart_style' => 'withcontent',
                            'style' => 'style2',
                        ],
                    ]
                );

                $this->add_control(
                    'piechart_title_color_2',
                    [
                        'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title2' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'piechart_title_typography_2',
                        'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
                        'fields_options' => [
                            'typography' => ['default' => 'yes'],
                            'font_family' => [
                                'default' => 'Jost',
                            ],
                            'font_size' => [
                                'default' => [
                                    'unit' => 'px',
                                    'size' => '24',
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
                        'selector' => '{{WRAPPER}} .tf-piechart-title2',
                    ]
                );

                $this->add_responsive_control(
                    'piechart_title_margin_2',
                    [
                        'label' =>esc_html__( 'Margin', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', 'em', '%' ],
                        'default' =>    [
                            'top' => '6',
                            'right' => '0',
                            'bottom' => '10',
                            'left' => '0',
                            'unit' => 'px',
                            'isLinked' => false,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();
        // /.End Style Title 2

        // Start Style Description
            $this->start_controls_section( 
                    'section_style_description',
                    [
                        'label' => esc_html__('Description', 'themesflat-elementor'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ],
                    ]
                );

                $this->add_control(
                    'piechart_description_color',
                    [
                        'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-description' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'piechart_description_typography',
                        'label' => esc_html__( 'Description Typography', 'themesflat-elementor' ),
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
                                    'size' => '30',
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
                        'selector' => '{{WRAPPER}} .tf-piechart-description',
                    ]
                );

            $this->end_controls_section();
        // /.End Style Description
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'tf_pie_chart', ['id' => "tf-pie-chart-{$this->get_id()}", 'class' => ['tf-pie-chart',$settings['piechart_style'],$settings['pie_chart_position'], $settings['style']], 'data-tabid' => $this->get_id()] );

		?>
        <div <?php echo $this->get_render_attribute_string('tf_pie_chart'); ?>>
            <div class="tf-pie-chart-inner">

                <?php if ($settings['piechart_style'] == 'withcontent'): ?>
                    <?php if ($settings['style'] == 'style2'): ?>
                        <div class="pie-chart-content">
                            <h2 class="tf-piechart-title"><?php echo esc_attr($settings['piechart_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="pie-chart">
                    <div class="chart-percent">
                        <span class="chart" data-percent="<?php echo esc_attr($settings['piechart_percentage']); ?>" data-width="<?php echo esc_attr($settings['piechart_border_size']['size']); ?>" data-size="<?php echo esc_attr($settings['piechart_size']['size']); ?>" data-color="<?php echo esc_attr($settings['piechart_line_color']); ?>" data-trackcolor="<?php echo esc_attr($settings['piechart_bar_color_bg']); ?>">
                            <span class="percent"></span>
                        </span>
                    </div>
                </div>

                <?php if ($settings['piechart_style'] == 'withcontent'): ?>
                    <?php if ($settings['style'] == 'style1'): ?>
                        <div class="pie-chart-content">
                            <h2 class="tf-piechart-title"><?php echo esc_attr($settings['piechart_title']); ?></h2>
                            <p class="tf-piechart-description"><?php echo esc_attr($settings['piechart_description']); ?></p>
                        </div>
                    <?php elseif($settings['style'] == 'style2'): ?>
                        <div class="pie-chart-content">
                            <h2 class="tf-piechart-title2"><?php echo esc_attr($settings['piechart_title_2']); ?></h2>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
	}

}