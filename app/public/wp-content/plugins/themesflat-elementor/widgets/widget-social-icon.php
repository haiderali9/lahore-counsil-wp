<?php

class TFSocialIcon_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tfsocialicon';
	}

	public function get_title() {
		return esc_html__( 'TF Attorneys Social', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-social-icons';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	protected function register_controls() {
		// Start Accordion
		$this->start_controls_section(
			'section_social_icon',
			[
				'label' => esc_html__( 'Social Icon', 'themesflat-elementor' ),
			]
		);
		$this->add_control(
			'widget_title', [
				'label'       => esc_html__( 'Title', 'ube' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Social Media', 'themesflat-elementor' )
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'social_icon_section_general_style', [
				'label' => esc_html__( 'General Setting', 'themesflat-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'icon_typography',
				'label'    => esc_html__( 'Typography', 'themesflat-elementor' ),
				'selector' => '{{WRAPPER}} .tf-social-icon-list .social-icon-item a',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-social-icon-list .social-icon-item a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_color_hover',
			[
				'label'     => esc_html__( 'Author Color', 'themesflat-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-social-icon-list .social-icon-item a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// /.End Content Style
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();
		global $post;
		$facebook  = get_post_meta( $post->ID, 'tf_attorney_facebook', true );
		$instagram = get_post_meta( $post->ID, 'tf_attorney_instagram', true );
		$dribble   = get_post_meta( $post->ID, 'tf_attorney_dribble', true );
		$behance   = get_post_meta( $post->ID, 'tf_attorney_behance', true );
		?>
        <div class="tf-elementor-widget tf-widget-social-icon">
            <h3 class="widget-title">
				<?php echo esc_html( $settings['widget_title'] ) ?>
            </h3>
            <ul class="tf-social-icon-list">
				<?php if ( ! empty( $facebook ) ): ?>
                    <li class="social-icon-item">
                        <a href="<?php echo esc_url( $facebook ) ?>"><i class="fab fa-facebook-f"></i></a>
                    </li>
				<?php endif; ?>
				<?php if ( ! empty( $instagram ) ): ?>
                    <li class="social-icon-item">
                        <a href="<?php echo esc_url( $instagram ) ?>"><i class="fab fa-instagram"></i></a>
                    </li>
				<?php endif; ?>
				<?php if ( ! empty( $dribble ) ): ?>
                    <li class="social-icon-item">
                        <a href="<?php echo esc_url( $dribble ) ?>"><i class="fab fa-dribbble"></i></a>
                    </li>
				<?php endif; ?>
				<?php if ( ! empty( $behance ) ): ?>
                    <li class="social-icon-item">
                        <a href="<?php echo esc_url( $behance ) ?>"><i class="fab fa-behance"></i></a>
                    </li>
				<?php endif; ?>
            </ul>
        </div>

		<?php

	}

}