<?php
class TFRainDrop_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-raindrop';
    }
    
    public function get_title() {
        return esc_html__( 'TF Rain Drop', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-align-stretch-v';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-raindrop'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_raindrop',
	            [
	                'label' => esc_html__('Rain Drop', 'themesflat-elementor'),
	            ]
	        );
	        $this->add_responsive_control(
	            'line_rain_drop_width',
	            [
	                'label' => esc_html__( 'Width', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::SLIDER,
	                'size_units' => [ 'px', '%' ],
	                'range' => [
	                	'px' => [
	                        'min' => 0,
	                        'max' => 1920,
	                        'step' => 1,
	                    ],
	                    '%' => [
	                        'min' => 0,
	                        'max' => 100,
	                    ],
	                ],
	                'default' => [
	                    'unit' => '%',
	                    'size' => 100,
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap' => 'max-width: {{SIZE}}{{UNIT}};',
	                ],
	            ]
	        );
	        $this->add_responsive_control(
	            'line_rain_drop_height',
	            [
	                'label' => esc_html__( 'Height', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::SLIDER,
	                'size_units' => [ 'px', '%' ],
	                'range' => [
	                    'px' => [
	                        'min' => 0,
	                        'max' => 5000,
	                        'step' => 1,
	                    ],
	                    '%' => [
	                        'min' => 0,
	                        'max' => 100,
	                    ],
	                ],
	                'default' => [
	                    'unit' => '%',
	                    'size' => 100,
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap' => 'height: {{SIZE}}{{UNIT}};',
	                ],
	            ]
	        );
	        $this->add_control(
	            'line_rain_drop_color',
	            [
	                'label' => esc_html__( 'Line Color', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => 'rgba(232, 232, 232, 1)',
	                'selectors' => [
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap' => 'border-left-color: {{VALUE}};',
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap .line_item' => 'border-right-color: {{VALUE}};',                  
	                ],
	            ]
	        );
	        $this->add_control(
	            'rain_drop_color',
	            [
	                'label' => esc_html__( 'Rain Drop Color', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#000000',
	                'selectors' => [
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap:before' => 'background-image: linear-gradient(0deg, {{VALUE}}, transparent);',
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap .line_item:nth-child(even):before' => 'background-image: linear-gradient(0deg, {{VALUE}}, transparent);',
	                    '{{WRAPPER}} .tf-line-wrap .line_wrap .line_item:nth-child(odd):before' => 'background-image: linear-gradient(0deg, transparent, {{VALUE}});',
	                ],
	            ]
	        );
	        
			$this->end_controls_section();
        // /.End Tab Setting
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_line_wrap', ['id' => "tf-line-wrap-{$this->get_id()}", 'class' => ['tf-line-wrap'], 'data-tabid' => $this->get_id()] );	
		
		?>
		<div <?php echo $this->get_render_attribute_string('tf_line_wrap'); ?>>
			<div class="line_wrap">
		        <div class="line_item"></div>
		        <div class="line_item"></div>
		        <div class="line_item"></div>
		        <div class="line_item"></div>
	        </div>
	     </div>
		<?php 	
		
	}

}