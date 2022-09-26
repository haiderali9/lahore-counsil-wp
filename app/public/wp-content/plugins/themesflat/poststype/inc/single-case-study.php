<?php
get_header();
$sidebar    = themesflat_get_opt( 'case_study_single_sidebar_list' );
$main_class = 'col-12';
if ( themesflat_get_opt( 'case_study_single_layout' ) == 'sidebar-left' || themesflat_get_opt( 'case_study_single_layout' ) == 'sidebar-right' ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$main_class = 'col-lg-8';
	}
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div id="primary" class="content-area">
                        <div class="row">
                            <div class="<?php echo esc_attr( $main_class ) ?> content-wrap">
                                <main id="main" class="main-content" role="main">
                                    <div class="entry-content">
										<?php while ( have_posts() ) : the_post();
											$id = get_the_ID();
											?>
                                            <div class="featured-post"><?php the_post_thumbnail( 'full' ); ?></div>
                                            <div class="post-meta attorneys-meta attorneys-categories">
												<?php echo the_terms( get_the_ID(), 'case_study_category', '', ' , ', '' ); ?>
                                            </div>
                                            <h1 class="post-title"><?php the_title(); ?></h1>
											<?php the_content(); ?>
										<?php endwhile; // end of the loop. ?>
                                    </div><!-- ./entry-content -->
									<?php if ( themesflat_get_opt( 'case_study_show_post_navigator' ) == 1 ): ?>
                                        <!-- Navigation  -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12"><?php themesflat_post_navigation(); ?></div>
                                            </div>
                                        </div>
									<?php endif; ?>
                                </main><!-- #main -->
                            </div>
							<?php
							if ( themesflat_get_opt( 'case_study_single_layout' ) == 'sidebar-left' || themesflat_get_opt( 'case_study_single_layout' ) == 'sidebar-right' ) :
								if ( is_active_sidebar( $sidebar ) ):
									?>
                                    <div class="col-lg-4 tf-sidebar">
										<?php get_sidebar(); ?>
                                    </div>
								<?php
								endif;
							endif;
							?>
                        </div>

                    </div><!-- #primary -->

                </div>
            </div>
        </div>
    </div>
    <!-- Related -->
<?php
if ( themesflat_get_opt( 'case_study_show_related' ) == 1 ) { ?>
    <div class="container">
		<?php
		$grid_columns = themesflat_get_opt( 'case_study_related_grid_columns' );
		$layout       = 'case-study-grid';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		$terms    = get_the_terms( $post->ID, 'case_study_category' );
		if ( $terms != '' ) :
			$term_ids = wp_list_pluck( $terms, 'term_id' );
			$args = array(
				'post_type'           => 'case_study',
				'tax_query'           => array(
					array(
						'taxonomy' => 'case_study_category',
						'field'    => 'term_id',
						'terms'    => $term_ids,
						'operator' => 'IN'
					)
				),
				'posts_per_page'      => themesflat_get_opt( 'number_related_post_case_study' ),
				'ignore_sticky_posts' => 1,
				'post__not_in'        => array( $post->ID )
			);

			if ( $layout != '' ) {
				$class[] = $layout;
			}
			if ( $grid_columns != '' ) {
				$class[] = 'column-' . $grid_columns;
			}
			$slick_options   = array(
				'slidesToShow' => intval( $grid_columns ),
			);
			$tablet_settings = array(
				'slidesToShow' => 2,
			);
			$mobile_settings = array(
				'slidesToShow' => 1,
			);
			$responsive      = array(
				array(
					'breakpoint' => '768',
					'settings'   => $tablet_settings
				),
				array(
					'breakpoint' => '576',
					'settings'   => $mobile_settings
				)
			);

			$slick_options['responsive'] = $responsive;

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				?>
                <div class="related-post related-posts-box">
                    <div class="box-wrapper">
                        <h3 class="box-title"><?php esc_html_e( 'Related Case Study', 'themesflat' ) ?></h3>
                        <div class="themesflat-case-study-taxonomy">
                            <div class="<?php echo esc_attr( implode( ' ', $class ) ) ?> wrap-case-study-post has-carousel"
                                 data-slick-options="<?php echo esc_attr( json_encode( $slick_options ) ) ?>">
								<?php
								while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div class="item">
                                        <div class="case-study-post case-study-post-<?php the_ID(); ?>">
                                            <div class="featured-post">
												<?php
												themesflat_render_thumbnail_markup( array(
													'image_size'  => '740x400',
													'image_mode'  => 'background',
													'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
												) );
												?>
                                            </div>
                                            <div class="content">
                                                <div class="post-meta case-study-meta case-study-categories">
													<?php the_terms( get_the_ID(), 'case_study_category', '', ' , ', '' ); ?>
                                                </div>
                                                <h2 class="title">
                                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
								<?php
								endwhile;
								?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php
			endif;
			wp_reset_postdata();
		endif; ?>
    </div>
<?php } ?>

<?php get_footer(); ?>