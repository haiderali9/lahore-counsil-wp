<?php
get_header();
$sidebar    = themesflat_get_opt( 'attorneys_single_sidebar_list' );
$main_class = 'col-12';
if ( themesflat_get_opt( 'attorneys_single_layout' ) == 'sidebar-left' || themesflat_get_opt( 'attorneys_single_layout' ) == 'sidebar-right' ) {
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
								<?php while ( have_posts() ) :
									the_post();
									$id            = get_the_ID();
									$language      = get_post_meta( $id, 'tf_attorney_language', true );
									$position      = get_post_meta( $id, 'tf_attorney_position', true );
									$office        = get_post_meta( $id, 'tf_attorney_office', true );
									$experience    = get_post_meta( $id, 'tf_attorney_experience', true );
									$practise_meta = get_post_meta( $id, 'tf_attorney_practise_area', true );
									$practise_meta = explode( ",", $practise_meta );
									$phone         = get_post_meta( $id, 'tf_attorney_phone', true );
									?>
                                    <div class="tf-single-attorney-information-wrap row">
                                        <div class="featured-post col-md-5"><?php the_post_thumbnail( 'full' ); ?></div>
                                        <div class="col-md-7">
                                            <div class="tf-single-attorney-information">
                                                <h1 class="post-title"><?php the_title(); ?></h1>
                                                <div class="post-meta attorneys-meta attorneys-categories">
													<?php echo the_terms( get_the_ID(), 'attorneys_category', '', ' , ', '' ); ?>
                                                </div>
                                                <div class="tf-single-attorney-additional-information row">
													<?php if ( ! empty( $language ) ): ?>
                                                        <div class="col-sm-6 additional-information-item">
                                                            <span class="additional-information-label">
                                                                <?php esc_html_e( 'Languages', 'lowlead' ) ?>
                                                            </span>
                                                            <span class="additional-information-value">
                                                                <?php echo esc_html( $language ) ?>
                                                            </span>
                                                        </div>
													<?php endif; ?>
													<?php if ( ! empty( $position ) ): ?>
                                                        <div class="col-sm-6 additional-information-item">
                                                            <span class="additional-information-label">
                                                                <?php esc_html_e( 'Position', 'lowlead' ) ?>
                                                            </span>
                                                            <span class="additional-information-value">
                                                                <?php echo esc_html( $position ) ?>
                                                            </span>
                                                        </div>
													<?php endif; ?>
													<?php if ( ! empty( $office ) ): ?>
                                                        <div class="col-sm-6 additional-information-item">
                                                            <span class="additional-information-label">
                                                                <?php esc_html_e( 'Office', 'lowlead' ) ?>
                                                            </span>
                                                            <span class="additional-information-value">
                                                                <?php echo esc_html( $office ) ?>
                                                            </span>
                                                        </div>
													<?php endif; ?>
													<?php if ( ! empty( $experience ) ): ?>
                                                        <div class="col-sm-6 additional-information-item">
                                                            <span class="additional-information-label">
                                                                <?php esc_html_e( 'Experience', 'lowlead' ) ?>
                                                            </span>
                                                            <span class="additional-information-value">
                                                                <?php echo esc_html( $experience ) ?>
                                                            </span>
                                                        </div>
													<?php endif; ?>
													<?php if ( ! empty( $practise_meta ) ):
														$practise_str = '';
														foreach ( $practise_meta as $index => $item ) {
															$title = get_the_title( $item );
															if ( count( $practise_meta ) == $index + 1 ) {
																$practise_str .= $title;
															} else {
																$practise_str .= $title . ', ';
															}
														}
														?>
                                                        <div class="col-sm-6 additional-information-item">
                                                            <span class="additional-information-label">
                                                                <?php esc_html_e( 'Practise Area', 'lowlead' ) ?>
                                                            </span>
                                                            <span class="additional-information-value">
                                                                <?php echo esc_html( $practise_str ) ?>
                                                            </span>
                                                        </div>
													<?php endif; ?>
                                                </div>
												<?php if ( ! empty( $phone ) ): ?>
                                                    <div class="tf-single-attorney-information-phone">
                                                        <span class="tf-single-attorney-information-phone-label"><?php esc_html_e( 'Phone for contact', 'lowlead' ) ?></span>
                                                        <span class="tf-single-attorney-information-phone-value"><?php echo esc_html( $phone ) ?></span>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="<?php echo esc_attr( $main_class ) ?> content-wrap">
											<?php the_content(); ?>
											<?php if ( themesflat_get_opt( 'attorneys_show_post_navigator' ) == 1 ): ?>
                                                <!-- Navigation  -->
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12"><?php themesflat_post_navigation(); ?></div>
                                                    </div>
                                                </div>
											<?php endif; ?>
                                        </div>
										<?php
										if ( themesflat_get_opt( 'attorneys_single_layout' ) == 'sidebar-left' || themesflat_get_opt( 'attorneys_single_layout' ) == 'sidebar-right' ) :
											if ( is_active_sidebar( $sidebar ) ):
												?>
                                                <div class="col-lg-4 tf-sidebar">
													<?php
													get_sidebar();
													?>
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
<?php if ( themesflat_get_opt( 'attorneys_show_related' ) == 1 ) { ?>
    <div class="container">
		<?php
		$grid_columns = themesflat_get_opt( 'attorneys_related_grid_columns' );
		$layout       = 'attorneys-grid';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		$terms    = get_the_terms( $post->ID, 'attorneys_category' );
		if ( $terms != '' ) :
			$term_ids = wp_list_pluck( $terms, 'term_id' );
			$args = array(
				'post_type'           => 'attorneys',
				'tax_query'           => array(
					array(
						'taxonomy' => 'attorneys_category',
						'field'    => 'term_id',
						'terms'    => $term_ids,
						'operator' => 'IN'
					)
				),
				'posts_per_page'      => themesflat_get_opt( 'number_related_post_attorneys' ),
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
                        <h3 class="box-title"><?php esc_html_e( 'Related Attorneys', 'themesflat' ) ?></h3>
                        <div class="themesflat-attorneys-taxonomy">
                            <div class="<?php echo esc_attr( implode( ' ', $class ) ) ?> wrap-attorneys-post has-carousel"
                                 data-slick-options="<?php echo esc_attr( json_encode( $slick_options ) ) ?>">
								<?php
								while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div class="item">
                                        <div class="attorneys-post attorneys-post-<?php the_ID(); ?>">
                                            <div class="featured-post">
												<?php
												themesflat_render_thumbnail_markup( array(
													'image_size'  => '740x400',
													'image_mode'  => 'background',
													'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
												) );
												?>
                                                <div class="image-hover">
													<?php $facebook_url = get_post_meta( $id, 'tf_attorney_facebook', true ); ?>
                                                    <span class="icon"><i class="fab fa-facebook-f"></i></span>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h2 class="title">
                                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                </h2>
                                                <div class="post-meta attorneys-meta attorneys-categories">
													<?php echo get_the_term_list( $id, 'attorneys_category', '', ', ', '' ); ?>
                                                </div>
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