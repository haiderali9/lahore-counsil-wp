<?php
if (!defined('ABSPATH')) {
	exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Icons_Manager;

class TFButton_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'tf-button';
	}

	public function get_title()
	{
		return esc_html__('TF Button', 'themesflat-elementor');
	}

	public function get_icon()
	{
		return 'eicon-button';
	}

	public function get_categories()
	{
		return ['themesflat_addons'];
	}

	private function register_section_content()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Button', 'themesflat-elementor')
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'themesflat-elementor'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => esc_html__('Click here', 'themesflat-elementor'),
				'placeholder' => esc_html__('Click here', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__('Link', 'themesflat-elementor'),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__('https://your-link.com', 'themesflat-elementor'),
				'default' => [
					'url' => '#',
				],
			]
		);


		$this->add_control(
			'type',
			[
				'label' => esc_html__('Type', 'themesflat-elementor'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'separator' => 'before',
				'options' => $this->tf_get_button_styles(),
			]
		);

		$this->add_control(
			'scheme',
			[
				'label' => esc_html__('Scheme', 'themesflat-elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => array(
					'accent' => __('Accent', 'themesflat-elementor'),
					'primary' => __('Primary', 'themesflat-elementor'),
					'secondary' => __('Secondary', 'themesflat-elementor'),
					'light' => __('Light', 'themesflat-elementor'),
					'dark' => __('Dark', 'themesflat-elementor'),
				),
				'default' => 'primary',
				'condition' => [
					'type[value]!' => 'link',
				],
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => esc_html__('Shape', 'themesflat-elementor'),
				'type' => Controls_Manager::SELECT,
				'default' => 'square',
				'options' => $this->tf_get_button_shape(),
				'condition' => [
					'type[value]!' => 'link',
				],
			]
		);


		$this->add_control(
			'size',
			[
				'label' => esc_html__('Size', 'themesflat-elementor'),
				'type' => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => $this->tf_get_button_sizes(),
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'themesflat-elementor'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__('Icon Position', 'themesflat-elementor'),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__('Before', 'themesflat-elementor'),
					'right' => esc_html__('After', 'themesflat-elementor'),
				],
				'condition' => [
					'icon[value]!' => '',
				],
			]
		);


		$this->add_control(
			'button_css_id',
			[
				'label' => esc_html__('Button ID', 'themesflat-elementor'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
				'default' => '',
				'title' => esc_html__('Add your custom id WITHOUT the Pound key. e.g: my-id', 'themesflat-elementor'),
				'description' => wp_kses_post(__('Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'themesflat-elementor')),
			]
		);

		$this->end_controls_section();
	}

	private function register_section_wrap_style()
	{
		$this->start_controls_section(
			'section_wrap_style',
			[
				'label' => esc_html__('Button', 'themesflat-elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .tf-btn',
			]
		);

		$this->add_control(
			'button_gradient_background',
			[
				'label' => esc_html__('Use Gradient Background', 'themesflat-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'themesflat-elementor'),
				'label_off' => esc_html__('Hide', 'themesflat-elementor'),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'type!' => 'link',
				],
			]
		);

		$this->start_controls_tabs('tabs_button_style');

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__('Normal', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__('Text Color', 'themesflat-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => esc_html__('Border Color', 'themesflat-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-btn' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'type!' => 'link',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__('Background Color', 'themesflat-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'type!' => ['link', 'outline'],
					'button_gradient_background' => ''
				],
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_gradient_color',
				'types' => ['gradient', 'classic'],
				'selector' => '{{WRAPPER}} .tf-btn',
				'condition' => [
					'type!' => ['link', 'outline'],
					'button_gradient_background' => 'yes'
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__('Hover', 'themesflat-elementor'),
			]
		);


		$this->add_control(
			'button_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'themesflat-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-btn:hover' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color_hover',
			[
				'label' => esc_html__('Border Color', 'themesflat-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'type!' => 'link',
				],
			]
		);

		$this->add_control(
			'button_background_color_hover',
			[
				'label' => esc_html__('Background Color', 'themesflat-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'type!' => ['link'],
					'button_gradient_background' => ''
				],
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_gradient_color_hover',
				'types' => ['gradient', 'classic'],
				'selector' => '{{WRAPPER}} .tf-btn:hover',
				'condition' => [
					'type!' => ['link'],
					'button_gradient_background' => 'yes'
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__('Hover Animation', 'themesflat-elementor'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .tf-btn',
				'separator' => 'before',
			]
		);


		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border Radius', 'themesflat-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-btn' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'themesflat-elementor'),
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
				'default' => '',
				'prefix_class' => 'elementor%s-align-',
			]
		);

		$this->add_responsive_control(
			'button_width',
			[
				'label' => esc_html__('Width', 'themesflat-elementor'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .tf-btn',
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label' => esc_html__('Padding', 'themesflat-elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .tf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);


		$this->end_controls_section();
	}

	private function register_section_icon_style()
	{
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__('Icon', 'themesflat-elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon[value]!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => esc_html__('Icon Spacing', 'themesflat-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-btn-icon-right .tf-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-btn-icon-left .tf-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'themesflat-elementor'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-btn-icon' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_section_content();
		$this->register_section_wrap_style();
		$this->register_section_icon_style();
	}

	function tf_get_button_sizes()
	{
		return apply_filters('tf_button_sizes', [
			'xs' => esc_html__('Extra Small', 'themesflat-elementor'),
			'sm' => esc_html__('Small', 'themesflat-elementor'),
			'md' => esc_html__('Medium', 'themesflat-elementor'),
			'lg' => esc_html__('Large', 'themesflat-elementor'),
			'xl' => esc_html__('Extra Large', 'themesflat-elementor'),
		]);
	}

	function tf_get_button_styles()
	{
		return apply_filters('tf_button_styles', [
			'' => esc_html__('Classic', 'themesflat-elementor'),
			'outline' => esc_html__('Outline', 'themesflat-elementor'),
		]);
	}

	function tf_get_button_shape()
	{
		return apply_filters('tf_button_shape', array(
			'rounded' => esc_html__('Rounded', 'themesflat-elementor'),
			'square' => esc_html__('Square', 'themesflat-elementor'),
			'round' => esc_html__('Round', 'themesflat-elementor'),
		));
	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		$wrapper_classes = array(
			'tf-btn',
			'btn',
			"btn-{$settings['size']}",
			"btn-{$settings['shape']}",
		);

		if ($settings['type'] !== '') {
			$wrapper_classes[] = "btn-{$settings['type']}";
		}

		if ($settings['type'] === '' || $settings['type'] === '3d') {
			$wrapper_classes[] = "btn-{$settings['scheme']}";
		}

		if ($settings['type'] === 'outline') {
			$wrapper_classes[] = "btn-outline-{$settings['scheme']}";
			$wrapper_classes[] = "btn-{$settings['scheme']}";
		}

		if ($settings['hover_animation']) {
			$wrapper_classes[] = "elementor-animation-{$settings['hover_animation']}";
		}


		if (!empty($settings['icon']) && !empty($settings['icon']['value'])) {
			$wrapper_classes[] = "tf-btn-icon-{$settings['icon_align']}";
		}

		$this->add_render_attribute('wrapper', 'class', $wrapper_classes);

		$this->add_render_attribute('text', 'class', 'tf-btn-text');
		$this->add_inline_editing_attributes('text', 'none');

		if (!empty($settings['link']['url'])) {
			$this->add_link_attributes('wrapper', $settings['link']);
		}

		if (!empty($settings['button_css_id'])) {
			$this->add_render_attribute('wrapper', 'id', $settings['button_css_id']);
		}

		?>
        <a <?php echo $this->get_render_attribute_string('wrapper') ?>>
			<?php if (!empty($settings['icon']) && !empty($settings['icon']['value']) && ($settings['icon_align'] === 'left')): ?>
                <span class="tf-btn-icon"><?php Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?></span>
			<?php endif; ?>
            <span <?php echo $this->get_render_attribute_string('text') ?>><?php echo esc_html($settings['text']); ?></span>
			<?php if (!empty($settings['icon']) && !empty($settings['icon']['value']) && ($settings['icon_align'] === 'right')): ?>
                <span class="tf-btn-icon"><?php Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?></span>
			<?php endif; ?>
        </a>
	<?php }
}