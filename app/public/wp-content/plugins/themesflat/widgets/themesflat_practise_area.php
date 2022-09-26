<?php

class Themesflat_Practise_Area extends WP_Widget {
	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor
	 *
	 * @return Themesflat_Practise_Area
	 */
	function __construct() {
		$this->defaults = array(
			'title'      => 'Themesflate Practise Area',
			'count'      => 10,
			'custom_ids' => '',
			'child_of'   => 'false',
			'show_count' => 0
		);
		parent::__construct(
			'practise_area',
			esc_html__( 'Themesflat - Pratise Area', 'themesflat' )
		);
	}

	/**
	 * Display widget
	 */
	function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		extract( $instance );
		extract( $args );
		$classes[] = 'tf-practise-area-wrapper';

		echo wp_kses_post( $before_widget );
		?>
        <div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
            <ul>
				<?php $args = array(
					'post_type'      => 'practise_area',
					'posts_per_page' => $count,
					'post_status'    => 'publish'
				);
				$query      = new WP_Query( $args );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post();
						global $post;
						$practise_area_post_icon = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( themesflat_get_opt_elementor( 'practise_area_post_icon' ), [ 'aria-hidden' => 'true' ] );
						?>
                        <li class="item">
                            <div class="tf-practise-area-post tf-practise-area-post-<?php the_ID(); ?>">
								<?php if ( ! empty( $practise_area_post_icon )): ?>
                                    <div class="practise-area-icon">
										<?php echo wp_kses_post( $practise_area_post_icon ) ?>
                                    </div>
								<?php endif; ?>
                                <div class="content">
                                    <a href="<?php echo get_the_permalink(); ?>" class="practise-area-title">
										<?php echo get_the_title(); ?>
                                    </a>
                                    <a href="<?php echo get_the_permalink(); ?>" class="practise-area-view-more">
                                        <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
					<?php
					endwhile;
				} else {
					esc_html_e( 'No Practise Area found', 'lowlead' );
				}
				?>
            </ul>
        </div>
		<?php echo wp_kses_post( $after_widget );
	}

	/**
	 * Update widget
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['count'] = intval($new_instance['count']);

		return $instance;
	}

	/**
	 * Widget setting
	 */
	function form($instance)
	{
		$instance = wp_parse_args($instance, $this->defaults);
		?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Count:', 'themesflat'); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('count')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('count')); ?>"
                   value="<?php echo esc_attr($instance['count']); ?>">
        </p>
		<?php
	}
}

add_action( 'widgets_init', 'themesflat_register_practise_area' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_practise_area() {
	register_widget( 'Themesflat_Practise_Area' );
}