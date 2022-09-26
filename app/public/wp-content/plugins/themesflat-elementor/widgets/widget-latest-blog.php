<?php

use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;

class TFLatest_Blog_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'tf_latest_blog';
	}

	public function get_title() {
		return esc_html__( 'TF Latest Blogs', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_keywords() {
		return [ 'Blogs, Posst' ];
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	public function get_style_depends() {
		return [ 'tf-latest-blog' ];
	}

	protected function register_controls() {
		$this->general_section();
		$this->register_style_wrap();
		$this->register_style_title();
		$this->register_style_read_more();

	}

	protected function general_section() {
		$this->start_controls_section(
			'section_posts_query',
			[
				'label' => esc_html__( 'General', 'themesflat-elementor' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Posts Per Page', 'themesflat-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => '6',
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_wrap() {
		$this->start_controls_section('style_wrap', [
			'label' => esc_html__('Wrapper', 'ube'),
			'tab' => Controls_Manager::TAB_STYLE,
		]);

		$this->add_responsive_control('spacing_item', [
			'label' => esc_html__('Spacing', 'ube'),
			'type' => Controls_Manager::SLIDER,
			'default' => [
				'unit' => 'px',
			],
			'tablet_default' => [
				'unit' => 'px',
			],
			'mobile_default' => [
				'unit' => 'px',
			],
			'size_units' => ['px'],
			'range' => [
				'px' => [
					'min' => 1,
					'max' => 1000,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .tf-latest-blog-item' => '--tf-spacing-latest-blog-item: {{SIZE}}{{UNIT}};',
			],
		]);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__('Separator Color', 'ube'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-latest-blog-item + .tf-latest-blog-item' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_title() {
		$this->start_controls_section('style_title', [
			'label' => esc_html__('Title', 'ube'),
			'tab' => Controls_Manager::TAB_STYLE,
		]);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->start_controls_tabs('title_style_tabs');

		$this->start_controls_tab('title_style_normal_tab', [
			'label' => esc_html__('Normal', 'ube'),
		]);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('title Color', 'ube'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab('title_style_hover_tab', [
			'label' => esc_html__('Hover', 'ube'),
		]);

		$this->add_control(
			'title_color_hover',
			[
				'label' => esc_html__('title Color Hover', 'ube'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function register_style_read_more() {
		$this->start_controls_section('style_read_more', [
			'label' => esc_html__('Read More', 'ube'),
			'tab' => Controls_Manager::TAB_STYLE,
		]);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'read_more_typography',
				'selector' => '{{WRAPPER}} .link-post',
			]
		);

		$this->start_controls_tabs('read_more_style_tabs');

		$this->start_controls_tab('read_more_style_normal_tab', [
			'label' => esc_html__('Normal', 'ube'),
		]);

		$this->add_control(
			'read_more_color',
			[
				'label' => esc_html__('Read More Color', 'ube'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .link-post' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab('read_more_style_hover_tab', [
			'label' => esc_html__('Hover', 'ube'),
		]);

		$this->add_control(
			'read_more_color_hover',
			[
				'label' => esc_html__('Read More Color Hover', 'ube'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .link-post:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$wrap_classes = array(
			'tf-latest-blog',
		);

		$this->add_render_attribute( 'post_attr', 'class', $wrap_classes );
		$query_args = array(
			'post_type'           => 'post',
			'ignore_sticky_posts' => 1,
			'post_status' => 'publish',
		);

		if ( $settings['posts_per_page'] !== '' ) {
			$query_args['posts_per_page'] = intval( $settings['posts_per_page'] );
		}

		$flat_post = new WP_Query( $query_args );
		?>
        <div <?php echo $this->get_render_attribute_string( 'post_attr' ) ?>>
            <ul class="tf-latest-blog-inner">
				<?php if ( $flat_post->have_posts() ) : ?>
					<?php while ( $flat_post->have_posts() ) : $flat_post->the_post(); ?>
                        <li class="clearfix tf-latest-blog-item">
                            <div class="thumb">
								<?php
								echo themesflat_render_thumbnail_markup( array(
									'image_size' => '70x70',
									'image_mode' => 'background',
								) );
								?>
                            </div>
                            <div class="info">
                                <h6 class="title"><a href="<?php echo esc_url( get_permalink() ); ?>"
                                                     rel="bookmark"><?php the_title(); ?></a></h6>
                                <a class="link-post"
                                   href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'themesflat-elementor' ) ?></a>
                            </div><!-- /.text -->
                        </li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<?php printf( '<li>%s</li>', esc_html__( 'Oops, category not found.', 'themesflat-elementor' ) ); ?>
				<?php endif; ?>
            </ul>
        </div>
		<?php
	}
}