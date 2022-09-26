<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class themesflat_options_elementor
{
    public function __construct()
    {
        add_action('elementor/documents/register_controls', [$this, 'themesflat_elementor_register_options'], 10);
        add_action('elementor/editor/before_enqueue_scripts', function () {
            wp_enqueue_script('elementor-preview-load', THEMESFLAT_LINK . 'js/elementor/elementor-preview-load.js', array('jquery'), null, true);
        }, 10, 3);
    }

    public function themesflat_elementor_register_options($element)
    {
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);

        $this->themesflat_options_color($element);
        if (($post_type !== 'post') && ($post_type !== 'portfolios') && ($post_type !== 'services') && ($post_type !== 'doctor')) {
            $this->themesflat_options_topbar($element);
            $this->themesflat_options_page_header($element);
        }

        $this->themesflat_options_page($element);
        $this->themesflat_options_page_pagetitle($element);

        if ($post_type == 'practise_area') {
            $this->themesflat_options_practise_area($element);
        }
    }

    public function themesflat_options_color($element)
    {

        // TF Services
        $element->start_controls_section(
            'themesflat_color_options',
            [
                'label' => esc_html__('TF Color', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'secondary_color',
            [
                'label' => esc_html__('Secondary Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-secondary-color: {{VALUE}};',
                ],
            ]
        );

        $element->add_control(
            'primary_color',
            [
                'label' => esc_html__('Primary Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-primary-color: {{VALUE}};',
                ],
            ]
        );
        $element->add_control(
            'accent_color',
            [
                'label' => esc_html__('Accent Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-accent-color: {{VALUE}};',
                ],
            ]
        );

        $element->add_control(
            'body_background_color',
            [
                'label' => esc_html__('Body Background Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-background-color-main: {{VALUE}};',
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_header($element)
    {
        // TF Header
        $element->start_controls_section(
            'themesflat_header_options',
            [
                'label' => esc_html__('TF Header', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'h_options_header',
            [
                'label' => esc_html__('Header', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $element->add_control(
            'style_header',
            [
                'label' => esc_html__('Header Style', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    'header-default' => esc_html__('Header Default', 'lowlead'),
                    'header-01' => esc_html__('Header 01', 'lowlead'),
                    'header-02' => esc_html__('Header 02', 'lowlead'),
                ],
            ]
        );
        // Logo
        $element->add_control(
            'site_logo',
            [
                'label' => esc_html__('Custom Logo', 'lowlead'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $element->add_control(
            'site_logo_sticky',
            [
                'label' => esc_html__('Custom Logo Sticky', 'lowlead'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
	    $element->add_control(
		    'site_logo_mobile',
		    [
			    'label' => esc_html__('Custom Logo Mobile', 'lowlead'),
			    'type' => Controls_Manager::MEDIA,
		    ]
	    );
        $element->add_responsive_control(
            'logo_width',
            [
                'label' => esc_html__('Logo Width', 'lowlead'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #header #logo a img, {{WRAPPER}} .modal-menu__panel-footer .logo-panel a img' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $element->add_control(
            'header_absolute',
            [
                'label' => esc_html__('Header Absolute', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('No', 'lowlead'),
                    1 => esc_html__('Yes', 'lowlead'),
                ],
                'condition' => ['style_header!' => ''],
            ]
        );
        $element->add_control(
            'header_sticky',
            [
                'label' => esc_html__('Header Sticky', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('No', 'lowlead'),
                    1 => esc_html__('Yes', 'lowlead'),
                ],
                'condition' => ['style_header!' => ''],
            ]
        );
        $element->add_control(
            'header_search_box',
            [
                'label' => esc_html__('Search Box', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                ],
                'condition' => ['style_header!' => ''],
            ]
        );
        $element->add_control(
            'header_sidebar_toggler',
            [
                'label' => esc_html__('Sidebar Toggler', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                ],
                'condition' => ['style_header!' => ''],
            ]
        );

        $element->add_control(
            'header_custom_html_enable',
            [
                'label' => esc_html__('Custom HTML', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                ],
            ]
        );

        $element->add_control(
            'header_custom_html',
            [
                'label' => esc_html__('Enter Custom HTML', 'lowlead'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'condition' => [
                    'header_custom_html_enable!' => '0',
                ],
            ]
        );

        $element->add_control(
            'header_backgroundcolor',
            [
                'label' => esc_html__('Header Background', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header' => 'background: {{VALUE}};',
                ],
                'condition' => ['style_header!' => ''],
            ]
        );

        $element->add_control(
            'header_backgroundcolor_sticky',
            [
                'label' => esc_html__('Header Background Sticky', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} header .header-sticky ' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => ['style_header!' => ''],
            ]
        );

        $element->add_control(
            'header_color_main_nav',
            [
                'label' => esc_html__('Navigation Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-color-main-navigation: {{VALUE}};',
                ],
                'condition' => ['style_header!' => ''],
            ]
        );

        $element->add_control(
            'header_color_hover_main_nav',
            [
                'label' => esc_html__('Header Navigation Hover Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-color-hover-main-navigation: {{VALUE}};',
                ],
                'condition' => ['style_header!' => ''],
            ]
        );

        $element->add_control(
            'header_sticky_color_main_nav',
            [
                'label' => esc_html__('Header Sticky Navigation Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--theme-header-sticky-color-main-navigation: {{VALUE}};',
                ],
                'condition' => ['style_header!' => ''],
            ]
        );

        $element->add_control(
            'header_sticky_color_hover_main_nav',
            [
                'label' => esc_html__('Header Sticky Navigation Hover Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ' --theme-header-sticky-color-hover-main-navigation: {{VALUE}};',
                ],
                'condition' => ['style_header!' => ''],
            ]
        );


        $element->add_control(
            'header_height',
            [
                'label' => esc_html__('Header Height', 'lowlead'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a, {{WRAPPER}} #header .show-search, {{WRAPPER}} header .block a, {{WRAPPER}} #header .mini-cart-header .cart-count, {{WRAPPER}} #header .mini-cart .cart-count, {{WRAPPER}} .button-menu' => 'line-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #header .header-wrap' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
	    $element->add_control(
		    'header_menu_spacing',
		    [
			    'label' => esc_html__('Menu Item Spacing', 'lowlead'),
			    'type' => Controls_Manager::SLIDER,
			    'size_units' => ['px'],
			    'range' => [
				    'px' => [
					    'min' => 50,
					    'max' => 200,
					    'step' => 1,
				    ],
			    ],
			    'selectors' => [
				    '{{WRAPPER}} #mainnav > ul > li' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: {{SIZE}}{{UNIT}};',
			    ],
		    ]
	    );

        //Extra Classes Header
        $element->add_control(
            'extra_classes_header',
            [
                'label' => esc_html__('Extra Classes', 'lowlead'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_topbar_info($element)
    {
        $element->add_control(
            'infoLeft_topbar_enabled',
            [
                'label' => esc_html__('Info Left ( OFF | ON )', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                ],
            ]
        );

        $element->add_control(
            'infoLeft_topbar',
            [
                'label' => esc_html__('info Left Topbar', 'lowlead'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $element->add_control(
            'infoRight_topbar_enabled',
            [
                'label' => esc_html__('Info Right ( OFF | ON )', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                ],
            ]
        );

        $element->add_control(
            'infoRight_topbar',
            [
                'label' => esc_html__('info Right  Topbar', 'lowlead'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
    }

    public function themesflat_options_topbar($element)
    {
        $element->start_controls_section(
            'themesflat_topbar_options',
            [
                'label' => esc_html__('TF Topbar', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'h_options_topbar',
            [
                'label' => esc_html__('Topbar', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'topbar_enabled',
            [
                'label' => esc_html__('Enable Topbar', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                ],
            ]
        );

        $element->add_responsive_control(
            'topbar_padding',
            [
                'label' => esc_html__('Padding', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top', 'bottom'],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .container-inside' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $element->add_control(
            'topbar_background_color',
            [
                'label' => esc_html__('Background', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'background: {{VALUE}};',
                ],
            ]
        );
        $element->add_control(
            'topbar_textcolor',
            [
                'label' => esc_html__('Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'color: {{VALUE}};',
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color',
            [
                'label' => esc_html__('Link Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color_hover',
            [
                'label' => esc_html__('Link Hover Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.header-04 .themesflat-top ul.flat-information li > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.header-default .themesflat-top ul.flat-information li > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themesflat-top .wrap-btn-topbar .btn-topbar:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'topbar_typography',
                'label' => esc_html__('Typography', 'lowlead'),
                'selector' => '{{WRAPPER}} .themesflat-top',
            ]
        );

        $this->themesflat_topbar_info($element);

        $element->end_controls_section();
    }

    public function themesflat_options_page_pagetitle($element)
    {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_pagetitle_options',
            [
                'label' => esc_html__('TF Page Title', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'hide_pagetitle',
            [
                'label' => esc_html__('Hide Page Title', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => 'block',
                'options' => [
                    'none' => esc_html__('Yes', 'lowlead'),
                    'block' => esc_html__('No', 'lowlead'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'display: {{VALUE}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'pagetitle_padding',
            [
                'label' => esc_html__('Padding', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'allowed_dimensions' => ['top', 'bottom'],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => ['hide_pagetitle' => 'block']
            ]
        );

        $element->add_responsive_control(
            'pagetitle_margin',
            [
                'label' => esc_html__('Margin', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'allowed_dimensions' => ['top', 'bottom'],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => ['hide_pagetitle' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagetitle_bg',
                'label' => esc_html__('Background', 'lowlead'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .page-title',
                'condition' => ['hide_pagetitle' => 'block']
            ]
        );

        $element->add_control(
            'pagetitle_overlay_color',
            [
                'label' => esc_html__('Overlay Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-title .overlay' => 'background: {{VALUE}}; opacity: 100%;filter: alpha(opacity=100);',
                ],
                'condition' => ['hide_pagetitle' => 'block']
            ]
        );

        //Extra Classes Page Title
        $element->add_control(
            'extra_classes_pagetitle',
            [
                'label' => esc_html__('Extra Classes', 'lowlead'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_footer($element)
    {
        // TF Footer
        $element->start_controls_section(
            'themesflat_footer_options',
            [
                'label' => esc_html__('TF Footer', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'footer_heading',
            [
                'label' => esc_html__('Footer', 'lowlead'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'hide_footer',
            [
                'label' => esc_html__('Hide Footer', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => 'block',
                'options' => [
                    'none' => esc_html__('Yes', 'lowlead'),
                    'block' => esc_html__('No', 'lowlead'),
                ],
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'display: {{VALUE}};',
                    '{{WRAPPER}} .info-footer' => 'display: {{VALUE}};'
                ],
            ]
        );

        $element->add_responsive_control(
            'footer_padding',
            [
                'label' => esc_html__('Padding', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'allowed_dimensions' => ['top', 'bottom'],
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_control(
            'footer_color',
            [
                'label' => esc_html__('Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'color: {{VALUE}}',
                    '{{WRAPPER}} #footer, #footer input, #footer select, {{WRAPPER}} #footer textarea, {{WRAPPER}} #footer a, {{WRAPPER}} footer .widget.widget-recent-news li .text .post-date, {{WRAPPER}} footer .widget.widget_latest_news li .text .post-date, {{WRAPPER}} #footer .footer-widgets .widget.widget_themesflat_socials ul li a, {{WRAPPER}} #footer .wp-block-latest-posts__post-date, {{WRAPPER}} #footer .wp-block-latest-posts__post-date:before, {{WRAPPER}} footer a' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_control(
            'footer_accent_color',
            [
                'label' => esc_html__('Accent Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer a:hover, {{WRAPPER}} #footer .footer-widgets .widget.widget_themesflat_socials ul li a:hover, {{WRAPPER}} footer a:hover, {{WRAPPER}} .footer a:hover' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} #footer input:focus, {{WRAPPER}} footer input:focus' => 'border-color: {{VALUE}} !important',
                    '{{WRAPPER}} #footer input[type="submit"], {{WRAPPER}} footer input[type="submit"], {{WRAPPER}} footer .elementor-widget-container .mc4wp-form input[type="submit"]' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'footer_bg',
                'label' => esc_html__('Background', 'lowlead'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer_background',
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_control(
            'footer_bg_overlay',
            [
                'label' => esc_html__('Background Overlay', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer_background' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_control(
            'footer_style',
            [
                'label' => esc_html__('Styles', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    'footer-style1' => esc_html__('Style 1', 'lowlead'),
                    'footer-style2' => esc_html__('Style 2', 'lowlead'),
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_control(
            'h_footer_widget',
            [
                'label' => esc_html__('Widget', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'footer_color_heading_widget',
            [
                'label' => esc_html__('Color Heading Widget', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer h1, {{WRAPPER}} #footer h2, {{WRAPPER}} #footer h3, {{WRAPPER}} #footer h4, {{WRAPPER}} #footer h5, {{WRAPPER}} #footer h6' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_widget_typography',
                'selector' => '{{WRAPPER}} #footer h1, {{WRAPPER}} #footer h2, {{WRAPPER}} #footer h3, {{WRAPPER}} #footer h4, {{WRAPPER}} #footer h5, {{WRAPPER}} #footer h6',
            ]
        );

        $element->add_control(
            'h_footer_action_box',
            [
                'label' => esc_html__('Action Box', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'show_action_box',
            [
                'label' => esc_html__('Footer Action Box', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_style',
            [
                'label' => esc_html__('Action Box Styles', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    'style1' => esc_html__('Style 1', 'lowlead'),
                    'style2' => esc_html__('Style 2', 'lowlead'),
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_background_color',
            [
                'label' => esc_html__('Backgound Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box .overlay' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_heading_color',
            [
                'label' => esc_html__('Heading Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box .heading, {{WRAPPER}} .themesflat-action-box h2, {{WRAPPER}} .themesflat-action-box h3, {{WRAPPER}} .themesflat-action-box h4, {{WRAPPER}} .themesflat-action-box h5, {{WRAPPER}} .themesflat-action-box h6' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_text_color',
            [
                'label' => esc_html__('Text Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box, {{WRAPPER}} .themesflat-action-box p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input:-moz-placeholder, {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input::-moz-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input:-ms-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_button_text_color_hover',
            [
                'label' => esc_html__('Button Text Hover Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]:hover' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'action_box_button_background_color_hover',
            [
                'label' => esc_html__('Button Hover Background Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        $element->add_control(
            'h_footer_info',
            [
                'label' => esc_html__('Footer Info', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $element->add_control(
            'show_footer_info',
            [
                'label' => esc_html__('Footer Info', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    1 => esc_html__('Show', 'lowlead'),
                    0 => esc_html__('Hide', 'lowlead'),
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'footer_info_background',
            [
                'label' => esc_html__('Backgound Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-footer .wrap-info-item' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'footer_info_color_icon',
            [
                'label' => esc_html__('Icon Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-footer .wrap-info .icon-info, {{WRAPPER}} .info-footer .wrap-info .icon-info svg' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );
        $element->add_control(
            'footer_info_color_text',
            [
                'label' => esc_html__('Text Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-footer .wrap-info .content' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_footer' => 'block']
            ]
        );

        // Bottom
        $element->add_control(
            'bottom_heading',
            [
                'label' => esc_html__('Bottom', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_control(
            'hide_bottom',
            [
                'label' => esc_html__('Hide?', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => 'block',
                'options' => [
                    'none' => esc_html__('Yes', 'lowlead'),
                    'block' => esc_html__('No', 'lowlead'),
                ],
                'selectors' => [
                    '{{WRAPPER}} #bottom' => 'display: {{VALUE}};'
                ],
            ]
        );

        $element->add_control(
            'bottom_style',
            [
                'label' => esc_html__('Styles', 'lowlead'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Theme Setting', 'lowlead'),
                    'bottom-style1' => esc_html__('Style 1', 'lowlead'),
                    'bottom-style2' => esc_html__('Style 2', 'lowlead'),
                ],
                'condition' => ['hide_bottom' => 'block']
            ]
        );

        $element->add_control(
            'bottom_color',
            [
                'label' => esc_html__('Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bottom *' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bottom, {{WRAPPER}} .bottom a' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_bottom' => 'block']
            ]
        );

        $element->add_control(
            'bottom_accent_color',
            [
                'label' => esc_html__('Accent Color', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bottom a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => ['hide_bottom' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bottom_bg',
                'label' => esc_html__('Background', 'lowlead'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} #bottom',
                'condition' => ['hide_bottom' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bottom_border',
                'label' => esc_html__('Border', 'lowlead'),
                'selector' => '{{WRAPPER}} #bottom .container-inside',
                'condition' => ['hide_bottom' => 'block']
            ]
        );

        $element->add_responsive_control(
            'bottom_padding',
            [
                'label' => esc_html__('Padding', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'allowed_dimensions' => ['top', 'bottom'],
                'selectors' => [
                    '{{WRAPPER}} #bottom .container-inside' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => ['hide_bottom' => 'block']
            ]
        );

        //Extra Classes Footer
        $element->add_control(
            'extra_classes_footer',
            [
                'label' => esc_html__('Extra Classes', 'lowlead'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page($element)
    {
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);

        // TF Page
        $element->start_controls_section(
            'themesflat_page_options',
            [
                'label' => esc_html__('TF Page', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        if (($post_type !== 'post') && ($post_type !== 'portfolios') && ($post_type !== 'services') && ($post_type !== 'doctor')) {
            $element->add_control(
                'page_sidebar_layout',
                [
                    'label' => esc_html__('Sidebar Position', 'lowlead'),
                    'type' => Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        '' => esc_html__('No Sidebar', 'lowlead'),
                        'sidebar-right' => esc_html__('Sidebar Right', 'lowlead'),
                        'sidebar-left' => esc_html__('Sidebar Left', 'lowlead'),
                        'fullwidth' => esc_html__('Full Width', 'lowlead'),
                        'fullwidth-small' => esc_html__('Full Width Small', 'lowlead'),
                        'fullwidth-center' => esc_html__('Full Width Center', 'lowlead'),
                    ],
                ]
            );
        }

        $element->add_control(
            'main_content_background',
            [
                'label' => esc_html__('Background', 'lowlead'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-boxed' => 'background: {{VALUE}};',
                ],
            ]
        );

        $element->add_control(
            'main_content_heading',
            [
                'label' => esc_html__('Main Content', 'lowlead'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_responsive_control(
            'main_content_padding',
            [
                'label' => esc_html__('Padding', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'allowed_dimensions' => ['top', 'bottom'],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'main_content_margin',
            [
                'label' => esc_html__('Margin', 'lowlead'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'allowed_dimensions' => ['top', 'bottom'],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_practise_area($element)
    {
        // TF Services
        $element->start_controls_section(
            'themesflat_practise_area_options',
            [
                'label' => esc_html__('TF Practise Area', 'lowlead'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'practise_area_post_heading',
            [
                'label' => esc_html__('Practise Area Post', 'lowlead'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'practise_area_post_icon',
            [
                'label' => esc_html__('Post Icon', 'lowlead'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => '',
                    'library' => 'lowlead_icon',
                ],
            ]
        );

        $element->end_controls_section();
    }
}

new themesflat_options_elementor();