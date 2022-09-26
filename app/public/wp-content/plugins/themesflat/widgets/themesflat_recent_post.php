<?php

class Themesflat_Recent_Post extends WP_Widget {
	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor
	 *
	 * @return Themesflat_Recent_Post
	 */
	function __construct() {
		$this->defaults = array(
			'title'          => 'Recent News',
			'category'       => '',
			'ids'            => '',
			'count'          => 4,
			'show_thumbnail' => true,
			'show_content'   => false,
			'show_date'      => true,
			'show_comment'   => true
		);
		parent::__construct(
			'widget_recent_post',
			esc_html__( 'Themesflat - Recent News', 'themesflat' ),
			array(
				'classname'   => 'widget-recent-news',
				'description' => esc_html__( 'Recent News.', 'themesflat' )
			)
		);
	}

	/**
	 * Display widget
	 */
	function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		extract( $instance );
		extract( $args );
		$query_args = array(
			'post_type'      => 'post',
			'posts_per_page' => intval( $count )
		);
		if ( ! empty( $category ) ) {
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'terms'    => $category,
				),
			);
		}
		if ( $ids != '' ) {
			$query_args['post__in'] = explode( ",", $ids );
			$query_args['orderby']  = 'post__in';
		}
		$flat_post = new WP_Query( $query_args );
		$classes[] = 'recent-news';
		$classes[] = $show_thumbnail != 1 ? 'no-thumbnail' : '';
		echo wp_kses_post( $before_widget );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $before_title ) . esc_html( $title ) . wp_kses_post( $after_title );
		} ?>
        <ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?> clearfix">
			<?php if ( $flat_post->have_posts() ) : ?>
				<?php while ( $flat_post->have_posts() ) : $flat_post->the_post(); ?>
                    <li>
						<?php if ( has_post_thumbnail() && $show_thumbnail == 1 ) : ?>
                            <div class="thumb">
								<?php themesflat_render_thumbnail_markup( array(
									'image_size'  => 'full',
									'image_ratio' => '1x1',
									'image_mode'  => 'background',
									'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
								) ); ?>
                            </div>
						<?php endif; ?>
                        <div class="post-content">
							<?php the_title( sprintf( '<h6 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
							<?php if ( $show_content ) : ?>
                                <p class="desc"><?php echo wp_trim_words( get_the_content(), 8, '...' ); ?></p>
							<?php endif; ?>
                            <div class="post-meta">
		                        <?php
		                        if ( $show_author ) {
			                        echo '<span class="item-meta post-author">';
			                        printf(
				                        esc_html__( 'by', 'lowlead' ) . '<a class="meta-text" href="%s" title="%s" rel="author">%s</a>',
				                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				                        esc_attr( sprintf( esc_html__( 'View all posts by %s', 'lowlead' ), get_the_author() ) ), get_the_author() );
			                        echo '</span>';
		                        }
		                        if ( $show_date) {
			                        echo '<span class="item-meta post-date">';
			                        $archive_year  = get_the_time( 'Y' );
			                        $archive_month = get_the_time( 'm' );
			                        $archive_day   = get_the_time( 'd' );
			                        echo '<a class="meta-text" href="' . get_day_link( $archive_year, $archive_month, $archive_day ) . '">' . get_the_date() . '</a>';
			                        echo '</span>';
		                        }
		                        if ( $show_category ) {
			                        echo '<span class="item-meta post-categories">';
			                        the_category( ', ' );
			                        echo '</span>';
		                        }
		                        if ( $show_comment ) {
			                        echo '<span class="item-meta post-comments"><span class="meta-text">';
			                        comments_number();
			                        echo '<span></span>';
		                        }
		                        ?>
                            </div>
                        </div><!-- /.text -->

                    </li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<?php printf( '<li>%s</li>', esc_html__( 'Oops, category not found.', 'themesflat' ) ); ?>
			<?php endif; ?>
        </ul>
		<?php echo wp_kses_post( $after_widget );
	}

	/**
	 * Update widget
	 */
	function update( $new_instance, $old_instance ) {
		$instance                   = $old_instance;
		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['ids']            = ( $new_instance['ids'] );
		$instance['count']          = intval( $new_instance['count'] );
		$instance['show_thumbnail'] = (bool) $new_instance['show_thumbnail'];
		$instance['show_date']      = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_content']   = isset( $new_instance['show_content'] ) ? (bool) $new_instance['show_content'] : false;
		$instance['show_comment']   = isset( $new_instance['show_comment'] ) ? (bool) $new_instance['show_comment'] : false;
		$instance['show_author']    = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
		$instance['show_category']    = isset( $new_instance['show_category'] ) ? (bool) $new_instance['show_category'] : false;
		$instance['category']       = array_filter( $new_instance['category'] );

		return $instance;
	}

	/**
	 * Widget setting
	 */
	function form( $instance ) {
		$instance       = wp_parse_args( $instance, $this->defaults );
		$show_content   = isset( $instance['show_content'] ) ? (bool) $instance['show_content'] : false;
		$show_thumbnail = isset( $instance['show_thumbnail'] ) ? (bool) $instance['show_thumbnail'] : true;
		$show_date      = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_comment   = isset( $instance['show_comment'] ) ? (bool) $instance['show_comment'] : false;
		$show_author    = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;
		$show_category  = isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : false;

		if ( empty( $instance['category'] ) ) {
			$instance['category'] = array( "1" );
		}
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'themesflat' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]">
                <option value=""<?php selected( empty( $instance['category'] ) ); ?>><?php esc_html_e( 'All', 'themesflat' ); ?></option>
				<?php
				$categories = get_categories();
				foreach ( $categories as $category ) {
					printf( '<option value="%1$s" %4$s>%2$s (%3$s)</option>', esc_attr( $category->term_id ), esc_attr( $category->name ), esc_attr( $category->count ), ( in_array( $category->term_id, $instance['category'] ) ) ? 'selected="selected"' : '' );
				}
				?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"><?php esc_html_e( 'Get Post by IDS EX:1,2,3', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $instance['ids'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Count:', 'themesflat' ); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>"
                   value="<?php echo esc_attr( $instance['count'] ); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_thumbnail ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>"><?php esc_html_e( 'Show Thumbnail ?', 'themesflat' ) ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_content ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_content' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_content' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_content' ) ); ?>"><?php esc_html_e( 'Show Content ?', 'themesflat' ) ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_date ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Show Date ?', 'themesflat' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_comment ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_comment' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>"><?php esc_html_e( 'Show Comment ?', 'themesflat' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_author ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_author' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>"><?php esc_html_e( 'Show Author ?', 'themesflat' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_category ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_category' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_category' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_category' ) ); ?>"><?php esc_html_e( 'Show Category ?', 'themesflat' ); ?></label>
        </p>
		<?php
	}
}

add_action( 'widgets_init', 'themesflat_register_recent_post' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_recent_post() {
	register_widget( 'Themesflat_Recent_Post' );
}