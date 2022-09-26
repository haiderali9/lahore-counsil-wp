<?php
class TFPriceTable_Widget extends \Elementor\Widget_Base {

  public function get_name() {
        return 'tf-pricetable';
    }
    
    public function get_title() {
        return esc_html__( 'TF Price Table', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
        return ['tf-pricetable'];
    }

    protected function register_controls() {
        // Start Price Table Header  
            $this->start_controls_section( 
                'section_price_header',
                [
                    'label' => esc_html__('Header', 'themesflat-elementor'),
                ]
            );

            $this->add_control(
                'price',
                [
                    'label' => esc_html__( 'Price', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '$45.00', 'themesflat-elementor' ),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Small business', 'themesflat-elementor' ),
                ]
            );

            $this->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'carenow-medical-icon-medical-insurance',
                        'library' => 'carenow_icon_extend',
                    ],
                ]
            );

            $this->end_controls_section();
        // /.End Price Table Header

        // Start Price Table Content  
            $this->start_controls_section( 
                'section_price_content',
                [
                    'label' => esc_html__('Content', 'themesflat-elementor'),
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'item',
                [
                    'label' => esc_html__( 'Item', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'solid',
                    ],
                ]
            );

            $repeater->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#33B9CB',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );            

            $repeater->add_control(
                'text',
                [
                    'label' => esc_html__( 'Text', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Web devolopment', 'themesflat-elementor' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'text_color',
                [
                    'label' => esc_html__( 'Text Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#565872',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'items',
                [
                    'label' => esc_html__( 'Items', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'show_label' => true,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [   
                            'icon' => [
                                'value' => 'fas fa-check',
                                'library' => 'fa-solid',
                            ],
                            'text' => esc_html__( 'Branding graphics design', 'themesflat-elementor' ),
                            'icon_color' => '#5CCA7A',
                            'text_color' => '#565872',
                        ],
                        [   
                            'icon' => [
                                'value' => 'fas fa-check',
                                'library' => 'fa-solid',
                            ],
                            'text' => esc_html__( 'Lifetime free support', 'themesflat-elementor' ),
                            'icon_color' => '#5CCA7A',
                            'text_color' => '#565872',
                        ],
                        [   
                            'icon' => [
                                'value' => 'fas fa-check',
                                'library' => 'fa-solid',
                            ],
                            'text' => esc_html__( 'Web devolopment course', 'themesflat-elementor' ),
                            'icon_color' => '#5CCA7A',
                            'text_color' => '#565872',
                        ],
                        [   
                            'icon' => [
                                'value' => 'fas fa-check',
                                'library' => 'fa-solid',
                            ],
                            'text' => esc_html__( 'Unlimited free revision', 'themesflat-elementor' ),
                            'icon_color' => '#5CCA7A',
                            'text_color' => '#565872',
                        ],
                        [   
                            'icon' => [
                                'value' => 'fas fa-times',
                                'library' => 'fa-solid',
                            ],
                            'text' => esc_html__( 'Web Lifetime devolopment', 'themesflat-elementor' ),
                            'icon_color' => '#BFBFBF',
                            'text_color' => '#565872',
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );            

            $this->end_controls_section();
        // /.End Price Table Content

        // Start Price Table Button  
            $this->start_controls_section( 
                'section_price_button',
                [
                    'label' => esc_html__('Button', 'themesflat-elementor'),
                ]
            );
            $this->add_control(
                'button_text',
                [
                    'label' => esc_html__( 'Button Text', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Get Started', 'themesflat-elementor' ),
                ]
            );

            $this->add_control(
                'link',
                [
                    'label' => esc_html__( 'Link', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-elementor' ),
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                ]
            );
            $this->end_controls_section();
        // /.End Price Table Button

        // Start Style General
            $this->start_controls_section( 'section_style_general',
                [
                    'label' => esc_html__( 'General', 'themesflat-elementor' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            ); 

            $this->add_responsive_control(
                'padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => esc_html__( 'Box Shadow', 'themesflat-elementor' ),
                    'selector' => '{{WRAPPER}} .tf-pricetable',
                    'fields_options' => [
                        'box_shadow_type' => [ 'default' =>'yes' ],
                        'box_shadow' => [
                            'default' => [
                                'horizontal' => 0,
                                'vertical' => 0,
                                'blur' => 20,
                                'spread' => 0,
                                'color' => 'rgba(91, 91, 91, 0.1)'
                            ]
                        ]
                    ],
                ]
            );  

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => esc_html__( 'Border', 'themesflat-elementor' ),                    
                    'selector' => '{{WRAPPER}} .tf-pricetable',
                ]
            ); 

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '5',
                        'right' => '5',
                        'bottom' => '5',
                        'left' => '5',
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->start_controls_tabs( 'background_style_tabs' );
                $this->start_controls_tab( 
                    'background_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
                    ] ); 
                    $this->add_control( 
                        'overlay_bg_color',
                        [
                            'label' => esc_html__( 'Background Overlay', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable' => 'background-color: {{VALUE}};',              
                            ],
                        ]
                    );
                    $this->add_control(
                        'background_blend_mode',
                        [
                            'label' => esc_html__( 'Background Blend Mode', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'normal',
                            'options' => [
                                'normal'  => esc_html__( 'Normal', 'themesflat-elementor' ),
                                'multiply' => esc_html__( 'Multiply', 'themesflat-elementor' ),
                                'screen' => esc_html__( 'Screen', 'themesflat-elementor' ),
                                'overlay' => esc_html__( 'Overlay', 'themesflat-elementor' ),
                                'darken' => esc_html__( 'Darken', 'themesflat-elementor' ),
                                'lighten' => esc_html__( 'Lighten', 'themesflat-elementor' ),
                                'color-dodge' => esc_html__( 'Color Dodge', 'themesflat-elementor' ),
                                'saturation' => esc_html__( 'Saturation', 'themesflat-elementor' ),
                                'color' => esc_html__( 'Color', 'themesflat-elementor' ),
                                'luminosity' => esc_html__( 'Luminosity', 'themesflat-elementor' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable' => 'background-blend-mode: {{VALUE}};',              
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'bg_image',
                            'label' => esc_html__( 'Background', 'themesflat-elementor' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .tf-pricetable',
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Css_Filter::get_type(),
                        [
                            'name' => 'bg_image_css_filters',
                            'selector' => '{{WRAPPER}} .tf-pricetable',
                        ]
                    );
                $this->end_controls_tab();

                $this->start_controls_tab( 
                    'background_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
                    ] );
                    $this->add_control( 
                        'overlay_bg_color_hover',
                        [
                            'label' => esc_html__( 'Background Overlay', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#091D3E',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable:hover' => 'background-color: {{VALUE}};',              
                            ],
                        ]
                    );
                    $this->add_control(
                        'background_blend_mode_hover',
                        [
                            'label' => esc_html__( 'Background Blend Mode', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'normal',
                            'options' => [
                                'normal'  => esc_html__( 'Normal', 'themesflat-elementor' ),
                                'multiply' => esc_html__( 'Multiply', 'themesflat-elementor' ),
                                'screen' => esc_html__( 'Screen', 'themesflat-elementor' ),
                                'overlay' => esc_html__( 'Overlay', 'themesflat-elementor' ),
                                'darken' => esc_html__( 'Darken', 'themesflat-elementor' ),
                                'lighten' => esc_html__( 'Lighten', 'themesflat-elementor' ),
                                'color-dodge' => esc_html__( 'Color Dodge', 'themesflat-elementor' ),
                                'saturation' => esc_html__( 'Saturation', 'themesflat-elementor' ),
                                'color' => esc_html__( 'Color', 'themesflat-elementor' ),
                                'luminosity' => esc_html__( 'Luminosity', 'themesflat-elementor' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable:hover' => 'background-blend-mode: {{VALUE}};',              
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'bg_image_hover',
                            'label' => esc_html__( 'Background', 'themesflat-elementor' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .tf-pricetable:hover',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                

            $this->end_controls_section();    
        // /.End Style General

        // Start Style Header
            $this->start_controls_section( 'section_style_header',
                [
                    'label' => esc_html__( 'Header', 'themesflat-elementor' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'h_general',
                [
                    'label' => esc_html__( 'General', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'header_padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '0',
                        'right' => '20',
                        'bottom' => '3',
                        'left' => '20',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .header-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'h_icon',
                [
                    'label' => esc_html__( 'Icon', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'icon_width',
                [
                    'label' => esc_html__( 'Icon Width', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 134,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .icon' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_height',
                [
                    'label' => esc_html__( 'Icon Height', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 118,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .icon' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_spacing',
                [
                    'label' => esc_html__( 'Icon Spacing', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 27,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control( 
                'icon_color',
                [
                    'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#33B9CB',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .icon' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'icon_bgcolor',
                [
                    'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'rgba(51,185,203, 0.1)',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .icon' => 'background-color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'icon_color_hover',
                [
                    'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .icon' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'icon_bgcolor_hover',
                [
                    'label' => esc_html__( 'Background Color Hover', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#33B9CB',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .icon' => 'background-color: {{VALUE}}',              
                    ],
                ]
            );

            $this->add_control(
                'h_price',
                [
                    'label' => esc_html__( 'Price', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Jost',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '40',
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .price',
                ]
            );
            $this->add_control( 
                'price_color',
                [
                    'label' => esc_html__( ' Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#091D3E',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .price' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'price_color_hover',
                [
                    'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FFFFFF',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .price' => 'color: {{VALUE}}',               
                    ],
                ]
            );

            $this->add_control(
                'h_title',
                [
                    'label' => esc_html__( 'Title', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Rubik',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '20',
                            ],
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .title',
                ]
            );
            $this->add_control( 
                'title_color',
                [
                    'label' => esc_html__( ' Color', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#091D3E',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .title' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'title_color_hover',
                [
                    'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FFFFFF',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .title' => 'color: {{VALUE}}',               
                    ],
                ]
            );

            $this->end_controls_section();    
        // /.End Style Header

        // Start Style Content List
            $this->start_controls_section( 'section_style_content',
                [
                    'label' => esc_html__( 'Content', 'themesflat-elementor' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'h_general_content',
                [
                    'label' => esc_html__( 'General', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'content_position',
                [
                    'label' => esc_html__( 'Position', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => esc_html__( 'Left', 'themesflat-elementor' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'themesflat-elementor' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'flex-end' => [
                            'title' => esc_html__( 'Right', 'themesflat-elementor' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => false,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list' => 'display: flex; justify-content: {{VALUE}}',
                        '{{WRAPPER}} .tf-pricetable .content-price' => 'display: flex; justify-content: {{VALUE}};align-items: flex-end;',              
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_text_align',
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
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list .inner-content-list' => 'display: inline-block;text-align: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'content_bg_color',
                [
                    'label' => esc_html__( 'Background', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list' => 'background-color: {{VALUE}}',               
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '59',
                        'right' => '15',
                        'bottom' => '59',
                        'left' => '15',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'h_content_list',
                [
                    'label' => esc_html__( 'List', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'space_between',
                [
                    'label' => esc_html__( 'Space Between', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 9,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list .item' => 'padding-top: {{SIZE}}{{UNIT}};padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );            
            $this->add_control(
                'icon_size',
                [
                    'label' => esc_html__( 'Icon Size', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 14,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-icon i' => 'font-size: {{SIZE}}{{UNIT}};',                        
                        '{{WRAPPER}} .tf-pricetable .wrap-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .tf-pricetable.style1 .wrap-icon' => 'width: calc( {{SIZE}}{{UNIT}} + 5px );display: inline-block;',
                    ],
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'label' => esc_html__( 'Typography Text', 'themesflat-elementor' ),
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .text',
                ]
            );
            $this->add_control(
                'icon_list_color_hover',
                [
                    'label' => esc_html__( 'Icon Color Hover', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .wrap-icon i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .tf-pricetable:hover .wrap-icon svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_list_color_hover',
                [
                    'label' => esc_html__( 'Text Color Hover', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_indent',
                [
                    'label' => esc_html__( 'Text Indent', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list .text' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );             

            $this->end_controls_section();    
        // /.End Style Content List

        // Start Style Button
            $this->start_controls_section( 'section_style_button',
                [
                    'label' => esc_html__( 'Button', 'themesflat-elementor' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                'wrap_btn_padding',
                [
                    'label' => esc_html__( 'Wrap Padding', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '0',
                        'right' => '18',
                        'bottom' => '0',
                        'left' => '18',
                        'unit' => '%',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_text_align',
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
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button' => 'text-align: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'btn_typography',
                    'label' => esc_html__( 'Typography Text', 'themesflat-elementor' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Rubik',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '18',
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .wrap-button a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '21',
                        'right' => '10',
                        'bottom' => '21',
                        'left' => '10',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_margin',
                [
                    'label' => esc_html__( 'Margin', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '0',
                        'right' => '0',
                        'bottom' => '50',
                        'left' => '0',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            ); 
            $this->add_responsive_control(
                'btn_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '5',
                        'right' => '5',
                        'bottom' => '5',
                        'left' => '5',
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->start_controls_tabs( 'tabs_btn' );
                $this->start_controls_tab( 'tab_btn_normal', [ 'label' => esc_html__( 'Normal', 'themesflat-elementor' ) ] );
                    $this->add_control( 
                        'btn_color',
                        [
                            'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#FFFFFF',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'color: {{VALUE}}',              
                            ],
                        ]
                    ); 
                    $this->add_control( 
                        'btn_bgcolor',
                        [
                            'label' => esc_html__( 'Background', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#33B9CB',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'background-color: {{VALUE}}',              
                            ],
                        ]
                    );                      
                    $this->add_control(
                        'btn_border_width',
                        [
                            'label' => esc_html__( 'Border Width', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                            ],
                        ]
                    ); 
                    $this->add_control( 
                        'btn_border_color',
                        [
                            'label' => esc_html__( 'Border Color', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'border-color: {{VALUE}}',              
                            ],
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab( 'tab_btn_hover', [ 'label' => esc_html__( 'Hover', 'themesflat-elementor' ) ] );
                    $this->add_control( 
                        'btn_color_hover',
                        [
                            'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#FFFFFF',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a:hover' => 'color: {{VALUE}}',              
                            ],
                        ]
                    );
                    $this->add_control( 
                        'btn_bgcolor_hover',
                        [
                            'label' => esc_html__( 'Background', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#33B9CB',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a:not(.btn):hover, {{WRAPPER}} .tf-pricetable .wrap-button a.btn:before' => 'background-color: {{VALUE}}',              
                            ],
                        ]
                    );   
                    $this->add_control( 
                        'btn_border_color_hover',
                        [
                            'label' => esc_html__( 'Border Color', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a:hover' => 'border-color: {{VALUE}}',              
                            ],
                        ]
                    );  
                    $this->add_control(
                        'button_animation_options',
                        [
                            'label' => esc_html__( 'Effect Type', 'themesflat-elementor' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__( 'Default', 'themesflat-elementor' ),
                                'button-overlay' => esc_html__( 'TF Effect', 'themesflat-elementor' ),
                            ]
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();    
        // /.End Style Button

    }

    protected function render($instance = []) {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'tf_pricetable', ['id' => "tf-pricetable-{$this->get_id()}", 'class' => ['tf-pricetable'], 'data-tabid' => $this->get_id()] );  

        $header = $content = $button = $icon = $item_list = $time = '';

        $btn_animation = 'hover-default';
        if ($settings['button_animation_options'] == 'button-overlay') {
            $btn_animation = 'btn ';
        }

        foreach ( $settings['items'] as $index => $item ) {
            $item_list .= '<div class="item elementor-repeater-item-' . $item['_id'] . '">
                            <span class="wrap-icon">'.\Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( $item['icon'] ).'</span>
                            <span class="text">'.$item['text'].'</span>
                        </div>';
        }

        $price = $settings['price'] ? '<div class="price">'.$settings['price'].'</div>' : '';
        $title = $settings['price'] ? '<div class="title">'.$settings['title'].'</div>' : '';   

        $icon = '<div class="icon">'.\Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ).'</div>';

        $header = sprintf( '<div class="header-price">
                                %1$s %2$s %3$s
                            </div>',$icon, $price, $title);

        $content = sprintf( '<div class="content-list">
                                <div class="inner-content-list">%1$s</div>
                            </div>',$item_list);

        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        $button = sprintf( '<div class="wrap-button">
                                <a class="%5$s" href="%2$s" %3$s %4$s>%1$s</a>
                            </div>',$settings['button_text'], $settings['link']['url'], $target, $nofollow, $btn_animation);

        echo sprintf ( 
            '<div %1$s>
                %2$s
                %3$s
                %4$s
            </div>',
                $this->get_render_attribute_string('tf_pricetable'),
                $header,
                $content,
                $button
        );
    }

}