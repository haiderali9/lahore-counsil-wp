<?php
get_header();
$custom_layout = '';
if ( isset( $_GET['practise_layout'] ) ) {
	$custom_layout = $_GET['practise_layout'];
}
$sidebar    = themesflat_get_opt( 'practise_area_single_sidebar_list' );
$main_class = 'col-lg-8 mx-auto';
if ( themesflat_get_opt( 'practise_area_single_layout' ) == 'sidebar-left' || themesflat_get_opt( 'practise_area_single_layout' ) == 'sidebar-right' || $custom_layout == 'sidebar-right' || $custom_layout == 'sidebar-left' ) {
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
                        <main id="main" class="main-content" role="main">
                            <div class="entry-content">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php if ( themesflat_get_opt( 'practise_area_single_layout' ) == 'fullwidth' && ( $custom_layout == '' || $custom_layout == 'fullwidth' ) ) : ?>
                                        <div class="featured-post">
                                            <div class="image">
												<?php the_post_thumbnail( 'themesflat-practise-area-image' ); ?>
                                            </div>
                                        </div>
									<?php endif; ?>
                                    <div class="row">
                                        <div class="<?php echo esc_attr( $main_class ) ?> content-wrap">
                                            <div class="practise-area-content-top">
                                                <div class="practise-area-meta practise-area-categories">
													<?php echo the_terms( get_the_ID(), 'practise_area_category', '', ' , ', '' ); ?>
                                                </div>
												<?php
												$title        = get_the_title();
												$first_letter = substr( $title, 0, 1 );
												$rest_str     = substr( $title, 1 );
												?>
                                                <h1 class="post-title">
                                                <span
                                                        class="title-first-letter"><?php echo esc_html( $first_letter ) ?></span>
                                                    <span
                                                            class="title-rest-letter"><?php echo esc_html( $rest_str ) ?></span>
                                                </h1>
                                            </div>
											<?php the_content(); ?>
											<?php
											if ( themesflat_get_opt( 'show_entry_footer_content' ) == 1 ) :
												?>
                                                <div class="entry-footer">
													<?php
													$terms = wp_get_post_terms( get_the_ID(), 'practise_area_tag' );
													if ( $terms ) :
														?>
                                                        <div class="divider"></div>
														<?php
														$terms_list = array();
														foreach ( $terms as $term ) {
															$term_name    = $term->name;
															$term_url     = get_term_link( $term );
															$terms_list[] = '<a href="' . esc_attr( $term_url ) . '" rel="tag">' . esc_html( $term_name ) . '</a>';
														}
														$terms_list = implode( '', $terms_list );
														echo sprintf( __( '<div class="tags-links"><span class="themesflat-tags-lable">Tags : </span> %1$s</div>', 'themesflat' ), $terms_list );
														?>
													<?php
													endif;
													?>
                                                </div>
											<?php

											endif;
											?>
											<?php
											// If comments are open or we have at least one comment, load up the comment template
											if ( comments_open() || get_comments_number() ) :
												comments_template();
											endif;
											?>
											<?php if ( themesflat_get_opt( 'practise_area_show_post_navigator' ) == 1 ): ?>
                                                <!-- Navigation  -->
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12"><?php themesflat_post_navigation(); ?></div>
                                                    </div>
                                                </div>
											<?php endif; ?>
                                        </div>
										<?php
										if ( themesflat_get_opt( 'practise_area_single_layout' ) == 'sidebar-left' || themesflat_get_opt( 'practise_area_single_layout' ) == 'sidebar-right' || $custom_layout == 'sidebar-right' || $custom_layout == 'sidebar-left' ) :
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
								<?php endwhile; // end of the loop. ?>
                            </div><!-- ./entry-content -->


                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div>
            </div>
        </div>
    </div>
    <!-- Related -->
<?php if ( themesflat_get_opt( 'practise_area_show_related' ) == 1 ) { ?>
    <div class="container">
		<?php
		$grid_columns = themesflat_get_opt( 'practise_area_related_grid_columns' );
		$layout       = 'practise-area-grid';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		$terms = get_the_terms( $post->ID, 'practise_area_category' );
		if ( $terms != '' ) {
			$term_ids = wp_list_pluck( $terms, 'term_id' );
			$args     = array(
				'post_type'           => 'practise_area',
				'tax_query'           => array(
					array(
						'taxonomy' => 'practise_area_category',
						'field'    => 'term_id',
						'terms'    => $term_ids,
						'operator' => 'IN'
					)
				),
				'posts_per_page'      => themesflat_get_opt( 'number_related_post_practise_area' ),
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
			?>
            <div class="related-post related-posts-box">
                <div class="box-wrapper">
                    <h3 class="box-title"><?php esc_html_e( 'Related Practise Area', 'themesflat' ) ?></h3>
                    <div class="themesflat-practise-area-taxonomy">
                        <div class="<?php echo esc_attr( implode( ' ', $class ) ) ?> wrap-practise-area-post has-carousel"
                             data-slick-options="<?php echo esc_attr( json_encode( $slick_options ) ) ?>">
							<?php
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div class="item tf-practise-area-style1">
                                        <div class="tf-practise-area-post tf-practise-area-post-<?php the_ID(); ?>">
                                            <div class="featured-post">
												<?php
												themesflat_render_thumbnail_markup( array(
													'image_size'  => '740x400',
													'image_mode'  => 'background',
													'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
												) );
												?>
                                                <div class="hover-icon">
                                                    <div class="icon">
                                                        <img src="<?php echo esc_url( THEMESFLAT_URL . 'assets/img/practise-hover-icon.png' ) ?>"
                                                             alt="<?php esc_attr_e( 'Hover Icon', 'lowlead' ) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
												<?php $title  = get_the_title();
												$first_letter = substr( $title, 0, 1 );
												$rest_str     = substr( $title, 1 );
												?>
                                                <div class="content-wrap">
                                                    <div class="practise-area-meta practise-area-categories">
														<?php echo get_the_term_list( $id, 'practise_area_category', '', ', ', '' ); ?>
                                                    </div>
                                                    <h2 class="title">
                                                        <a href="<?php echo get_the_permalink(); ?>"
                                                           class="title-first-letter"><?php echo esc_html( $first_letter ) ?></a>
                                                        <a href="<?php echo get_the_permalink(); ?>"
                                                           class="title-rest-letter"><?php echo esc_html( $rest_str ) ?></a>
                                                    </h2>
                                                </div>
                                                <a href="<?php echo get_the_permalink(); ?>"
                                                   class="practise-area-view-more">
                                                    <i class="fal fa-long-arrow-right"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
								<?php
								endwhile;
							}
							wp_reset_postdata();
							?>
                        </div>
                    </div>
                </div>
            </div>
		<?php } ?>
    </div>
<?php } ?>

<?php get_footer(); ?>