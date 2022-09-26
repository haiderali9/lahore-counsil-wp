<?php
use \Elementor\Group_Control_Background;
class TFTextEditor_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tftexteditor';
	}

	public function get_title() {
		return esc_html__( 'TF Text Editor', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}


	protected function register_controls() {
		// Start Accordion
		$this->start_controls_section(
			'section_text_editor',
			[
				'label' => esc_html__( 'Text Editor', 'themesflat-elementor' ),
			]
		);
		$this->add_control(
			'widget_title', [
				'label'       => esc_html__( 'Title', 'ube' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Our Expertise', 'themesflat-elementor' )
			]
		);
		$this->add_control(
			'text_content',
			[
				'label' => esc_html__( 'Content', 'ube' ),
				'type'  => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->end_controls_section();
		$this->style_general_section();
		$this->style_title_section();
		$this->style_desc_section();
		// /.End Content Style
	}

	protected function style_general_section() {
		$this->start_controls_section(
			'style_general_label',
			[
				'label' => esc_html__( 'General_', 'themesflat-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'           => 'bacground',
				'types'          => [ 'classic' ],
				'selector'       => '{{WRAPPER}} .tf-elementor-widget',
			]
		);

		$this->add_responsive_control(
			'heading_width',
			[
				'label'      => esc_html__( 'Max Width', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1600,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-elementor-widget' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-elementor-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
	protected function style_title_section() {
		$this->start_controls_section(
			'style_title_label',
			[
				'label' => esc_html__( 'Title', 'themesflat-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'selector' => '{{WRAPPER}} .widget-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'     => esc_html__( 'Color Divider', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-title:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_title',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
	protected function style_desc_section() {

		$this->start_controls_section(
			'style_desc_label',
			[
				'label' => esc_html__( 'Description', 'themesflat-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_desc',
				'selector' => '{{WRAPPER}} .widget-content',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();

		?>
		<div class="tf-elementor-widget tf-widget-text-editor">
			<h3 class="widget-title">
				<?php echo esc_html( $settings['widget_title'] ) ?>
			</h3>
			<div class="widget-content">
				<?php echo $this->parse_text_editor( $settings['text_content'] ) ?>
			</div>
		</div>
		<?php
	}

}