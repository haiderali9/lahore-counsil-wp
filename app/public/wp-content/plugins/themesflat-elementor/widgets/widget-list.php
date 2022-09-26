<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;

class TFList_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-list';
	}

	public function get_title() {
		return esc_html__( 'TF List', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_style_depends() {
		return [ 'tf-font-awesome', 'tf-regular', 'tf-list' ];
	}

	protected function register_controls() {
		$this->register_section_content();
		$this->register_section_list_style();

		// /.End Style
	}

	private function register_section_content() {

		$this->start_controls_section(
			'list_content_settings',
			[
				'label' => esc_html__( 'Content Settings', 'themesflat-elementor' )
			]
		);


		$this->add_control(
			'list_icon_layout',
			[
				'label'   => esc_html__( 'Layout', 'themesflat-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'list-column',
				'options' => [
					'list-column' => [
						'title' => esc_html__( 'Column', 'themesflat-elementor' ),
						'icon'  => 'eicon-editor-list-ul',
					],
					'list-inline' => [
						'title' => esc_html__( 'Inline', 'themesflat-elementor' ),
						'icon'  => 'eicon-ellipsis-h',
					],
				],
			]
		);

		$this->add_control(
			'list_icon_view',
			[
				'label'          => esc_html__( 'Style', 'themesflat-elementor' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'list-icon-icon',
				'options'        => [
					'list-icon-icon' => esc_html__( 'List Icon', 'themesflat-elementor' ),
					'list-type-icon' => esc_html__( 'List Style', 'themesflat-elementor' ),
				],
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'list_icon_type_icon',
			[
				'label'            => esc_html__( 'Icon', 'themesflat-elementor' ),
				'type'             => Controls_Manager::ICONS,
				'label_block'      => true,
				'default'          => [
					'value'   => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
				'condition'        => [
					'list_icon_view' => 'list-icon-icon',
				],
			]
		);

		$this->add_control(
			'list_icon_type',
			[
				'label'          => esc_html__( 'Type', 'themesflat-elementor' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'circle',
				'options'        => [
					'square' => esc_html__( 'List Square', 'themesflat-elementor' ),
					'circle' => esc_html__( 'List Circle', 'themesflat-elementor' ),
					'roman'  => esc_html__( 'List Roman', 'themesflat-elementor' ),
					'alpha'  => esc_html__( 'List Alpha', 'themesflat-elementor' ),
					'number' => esc_html__( 'List Number', 'themesflat-elementor' ),
					''       => esc_html__( 'None', 'themesflat-elementor' ),
				],
				'style_transfer' => true,
				'condition'      => [
					'list_icon_view' => 'list-type-icon',
				],
			]
		);

		$this->add_control(
			'list_icon_number',
			[
				'label'      => esc_html__( 'Start auto number', 'themesflat-elementor' ),
				'type'       => Controls_Manager::NUMBER,
				'min'        => 1,
				'max'        => 100,
				'step'       => 1,
				'conditions' => [
					'terms' => [
						[
							'name'     => 'list_icon_type',
							'operator' => 'in',
							'value'    => [
								'roman',
								'alpha',
								'number'
							]
						]
					]
				]
			]
		);

		$this->add_control(
			'list_icon_scheme',
			[
				'label'   => esc_html__( 'Scheme', 'themesflat-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => tf_get_color_schemes(),
				'default' => '',
			]
		);

		$this->add_control(
			'list_icon_size',
			[
				'label'   => esc_html__( 'Size', 'themesflat-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => [
					'xs' => esc_html__( 'Extra Small', 'themesflat-elementor' ),
					'sm' => esc_html__( 'Small', 'themesflat-elementor' ),
					'md' => esc_html__( 'Medium', 'themesflat-elementor' ),
					'lg' => esc_html__( 'Large', 'themesflat-elementor' ),
					'xl' => esc_html__( 'Extra Large', 'themesflat-elementor' ),
				],
			]

		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_icon_title',
			[
				'label'       => esc_html__( 'Text', 'themesflat-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'List Item', 'themesflat-elementor' ),
				'default'     => esc_html__( 'List Item', 'themesflat-elementor' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);


		$repeater->add_control(
			'list_icon_link',
			[
				'label'       => esc_html__( 'Link', 'themesflat-elementor' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [
					'active' => true,
				],
				'label_block' => true,
				'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-elementor' ),
			]
		);

		$repeater->add_control(
			'list_icon_selected_icon',
			[
				'label'            => esc_html__( 'Icon', 'themesflat-elementor' ),
				'type'             => Controls_Manager::ICONS,
				'label_block'      => true,
				'default'          => [
					'value'   => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);

		$this->add_control(
			'list_icon_repeater',
			[
				'label'       => '',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'list_icon_title'         => esc_html__( 'List Item #1', 'themesflat-elementor' ),
						'list_icon_selected_icon' => [
							'value'   => '',
							'library' => '',
						],
					],
					[
						'list_icon_title'         => esc_html__( 'List Item #2', 'themesflat-elementor' ),
						'list_icon_selected_icon' => [
							'value'   => '',
							'library' => '',
						],
					],
					[
						'list_icon_title'         => esc_html__( 'List Item #3', 'themesflat-elementor' ),
						'list_icon_selected_icon' => [
							'value'   => '',
							'library' => '',
						],
					],
				],
				'title_field' => '{{{ list_icon_title }}}',
			]
		);
		$this->end_controls_section();
	}

	private function register_section_list_style() {

		$this->start_controls_section(
			'list_icon_style',
			[
				'label' => esc_html__( 'List', 'themesflat-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control( 'list_icon_space_between',
			[
				'label'      => esc_html__( 'Space Between', 'themesflat-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'em' => [
						'min'  => 1,
						'step' => 0.1,
						'max'  => 10,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .list-inline .list-inline-item:not(:first-child)' => 'margin-left: calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .list-inline .list-inline-item:not(:last-child)'  => 'margin-right: calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .list-inline .list-inline-item:after'             => 'left: calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .list-unstyled .list-icon-item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2);',
				],
			]
		);

		$this->add_responsive_control(
			'list_icon_align',
			[
				'label'                => esc_html__( 'Alignment', 'themesflat-elementor' ),
				'type'                 => Controls_Manager::CHOOSE,
				'options'              => [
					'left'   => [
						'title' => esc_html__( 'Left', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'themesflat-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors_dictionary' => [
					'left'   => 'flex-start',
					'center' => 'center',
					'right'  => 'end',
				],
				'selectors'            => [
					'{{WRAPPER}} .list-icon-item' => 'justify-content: {{VALUE}}',
				],
				'prefix_class'         => 'elementor%s-align-',
			]
		);

		$this->start_controls_tabs( 'tabs_icon_list' );

		$this->start_controls_tab(
			'tab_icon_list_normal',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'list_icon_title_color',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'list_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'list_icon_title_typography',
				'selector' => '{{WRAPPER}} li',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_icon_list_hover',
			[
				'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
			]
		);
		$this->add_control(
			'list_bg_color_hover',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'list_icon_title_color_hover',
			[
				'label'     => esc_html__( 'Text Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'list_icon_title_typography_hover',
				'selector' => '{{WRAPPER}} li:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'heading_list_icon',
			[
				'label'     => esc_html__( 'Icon', 'themesflat-elementor' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'icon_typography',
				'selector' => '{{WRAPPER}} li .tf-list-icon-icon,{{WRAPPER}} li:before',
			]
		);

		$this->start_controls_tabs( 'tabs_icon_list_icon' );

		$this->start_controls_tab(
			'tab_icon_list__iconnormal',
			[
				'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'list_icon_color_icon',
			[
				'label'     => esc_html__( 'Icon Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-list-icon-icon' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} li:before'          => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-list-icon-icon' => 'background-color: {{VALUE}} !important;',
					'{{WRAPPER}} li:before'          => 'background-color: {{VALUE}} !important;',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_icon_list_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'list_icon_color_hover',
			[
				'label'     => esc_html__( 'Icon Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li:hover .tf-list-icon-icon' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} li:hover:before'             => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'list_icon_padding',
			[
				'label'      => esc_html__( 'Padding', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-list-icon-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} li:before'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'list_icon_margin',
			[
				'label'      => esc_html__( 'Margin', 'themesflat-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tf-list-icon-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} li:before'          => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'list_icon_divider',
			[
				'label'     => esc_html__( 'Divider', 'themesflat-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'themesflat-elementor' ),
				'label_on'  => esc_html__( 'On', 'themesflat-elementor' ),
				'selectors' => [
					'{{WRAPPER}} .tf-list-icon li:after' => 'content: "";',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'list_icon_divider_style',
			[
				'label'     => esc_html__( 'Style', 'themesflat-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'solid'  => esc_html__( 'Solid', 'themesflat-elementor' ),
					'double' => esc_html__( 'Double', 'themesflat-elementor' ),
					'dotted' => esc_html__( 'Dotted', 'themesflat-elementor' ),
					'dashed' => esc_html__( 'Dashed', 'themesflat-elementor' ),
				],
				'default'   => 'solid',
				'condition' => [
					'list_icon_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .list-inline .list-inline-item:not(:last-child):after' => 'border-left-style: {{VALUE}};',
					'{{WRAPPER}} .list-unstyled .list-icon-item:not(:last-child):after' => 'border-bottom-style: {{VALUE}};display: block;',
				],
			]
		);


		$this->add_responsive_control(
			'list_icon_divider_weight',
			[
				'label'     => esc_html__( 'Weight', 'themesflat-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 1,
				],
				'range'     => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'condition' => [
					'list_icon_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .tf-list-icon li:after' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'list_icon_width',
			[
				'label'     => esc_html__( 'Width', 'themesflat-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'unit' => '%',
				],
				'condition' => [
					'list_icon_divider' => 'yes',
					'list_icon_layout!' => 'list-inline',
				],
				'selectors' => [
					'{{WRAPPER}} .tf-list-icon li:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'list_icon_divider_height',
			[
				'label'      => esc_html__( 'Height', 'themesflat-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'default'    => [
					'unit' => '%',
				],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
				],
				'condition'  => [
					'list_icon_divider' => 'yes',
					'list_icon_layout'  => 'list-inline',
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-list-icon li:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'list_icon_divider_color',
			[
				'label'     => esc_html__( 'Color', 'themesflat-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .tf-list-icon li:after' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'list_icon_divider' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		$settings      = $this->get_settings_for_display();
		$list_icon_tag = 'span';

		$list_icon_classes = array(
			'tf-list-icon',
		);

		if ( $settings['list_icon_size'] !== '' ) {
			$list_icon_classes[] = 'tf-list-icon-' . $settings['list_icon_size'];
		}

		if ( $settings['list_icon_scheme'] !== '' ) {
			$list_icon_classes[] = 'text-' . $settings['list_icon_scheme'];
		}

		if ( ! empty( $settings['list_icon_type'] ) && $settings['list_icon_view'] === 'list-type-icon' ) {
			$list_icon_classes[] = 'tf-list-icon-' . $settings['list_icon_type'];
		}

		$this->add_render_attribute( 'list_icon', 'class', $list_icon_classes );

		if ( $settings['list_icon_layout'] === 'list-column' ) {
			$this->add_render_attribute( 'list_icon', 'class', 'list-unstyled' );
			$this->add_render_attribute( 'list_icon_item', 'class', 'list-icon-item' );

		} else {
			$this->add_render_attribute( 'list_icon', 'class', 'list-inline' );
			$this->add_render_attribute( 'list_icon_item', 'class', 'list-inline-item' );
		}

		$auto_number       = (int) $settings['list_icon_number'] - 1;
		$list_number_start = 'item ' . $auto_number;

		if ( $settings['list_icon_number'] > 0 ) {
			$this->add_render_attribute( 'list_icon', 'style', 'counter-reset:' . $list_number_start );
		}
		?>
        <ul <?php echo $this->get_render_attribute_string( 'list_icon' ); ?>>
			<?php foreach ( $settings['list_icon_repeater'] as $index => $item ) { ?>
				<?php
				$list_items_classes = $this->get_repeater_setting_key( 'list_icon_content_classes', 'list_icon_repeater', $index );
				$link_list_icon     = $this->get_repeater_setting_key( 'link-list', 'list_icon_repeater', $index );

				if ( ! empty( $item['list_icon_link']['url'] ) ) {
					$this->add_link_attributes( $link_list_icon, $item['list_icon_link'] );
					$list_icon_tag = 'a';
				}
				$this->add_render_attribute( $link_list_icon, 'class', 'tf-list-icon-title' );

				$list_icon_content_classes = array( 'tf-list-icon-icon' );

				$this->add_render_attribute( $list_items_classes, 'class', $list_icon_content_classes );

				?>
                <li <?php echo $this->get_render_attribute_string( 'list_icon_item' ); ?>>
					<?php if ( ! empty( $settings['list_icon_type_icon']['value'] ) && $item['list_icon_selected_icon']['value'] === "" && $settings['list_icon_view'] === 'list-icon-icon' ) : ?>
                        <span <?php echo $this->get_render_attribute_string( $list_items_classes ); ?>>
					<?php Icons_Manager::render_icon( $settings['list_icon_type_icon'] ); ?>
				</span>
					<?php endif; ?>
					<?php if ( ! empty( $item['list_icon_selected_icon']['value'] ) && $settings['list_icon_view'] === 'list-icon-icon' ) : ?>
                        <span <?php echo $this->get_render_attribute_string( $list_items_classes ); ?>>
					<?php Icons_Manager::render_icon( $item['list_icon_selected_icon'] ); ?>
				</span>
					<?php endif; ?>
					<?php if ( ! empty( $item['list_icon_title'] ) ) : ?>
						<?php
						printf( '<%1$s %2$s>', $list_icon_tag, $this->get_render_attribute_string( $link_list_icon ) );
						echo wp_kses_post( $item['list_icon_title'] );
						printf( '</%1$s>', $list_icon_tag ); ?>
					<?php endif; ?>
                </li>
			<?php } ?>
        </ul>
		<?php
	}

}