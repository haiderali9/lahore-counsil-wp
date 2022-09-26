<?php
get_header();
$term_slug               = $wp_query->tax_query->queries[0]['terms'][0];
$gallery_number_post     = themesflat_get_opt( 'gallery_number_post' ) ? themesflat_get_opt( 'gallery_number_post' ) : 6;
$columns                 = themesflat_get_opt( 'gallery_grid_columns' );
$columns_tb              = themesflat_get_opt( 'gallery_grid_columns_tablet' );
$columns_mb              = themesflat_get_opt( 'gallery_grid_columns_mobile' );
$paged                   = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$themesflat_paging_style = themesflat_get_opt( 'gallery_archive_pagination_style' );

$args              = array(
	'post_type'      => 'gallery',
	'paged'          => $paged,
	'posts_per_page' => $gallery_number_post,
);
$args['tax_query'] = array(
	array(
		'taxonomy' => 'gallery_category',
		'field'    => 'slug',
		'terms'    => $term_slug
	),
);
$query             = new WP_Query( $args );
$item_classes      = themesflat_create_columns( $columns, $columns_tb, $columns_mb );
$sidebar      = themesflat_get_opt( 'gallery_sidebar_list' );
$main_class   = 'col-12';
if ( themesflat_get_opt( 'gallery_layout' ) == 'sidebar-left' || themesflat_get_opt( 'gallery_layout' ) == 'sidebar-right' ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$main_class = 'col-lg-8';
	}

}
$show_heading = themesflat_get_opt( 'gallery_show_heading' );
?>
<?php if ( $show_heading ):
	$before_heading = themesflat_get_opt( 'gallery_before_heading' );
	$heading  = themesflat_get_opt( 'gallery_heading' );
	?>
    <div class="tf-heading tf-title-section-style-01 text-center tf-heading-gallery">
        <div class="before-heading"><?php echo esc_html( $before_heading ) ?></div>
        <h2 class="heading"><?php echo wp_kses( $heading, themesflat_kses_allowed_html() ) ?></h2>
        <div class="heading-separate"></div>
    </div>
<?php endif; ?>
    <div class="themesflat-gallery-taxonomy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-content-area row">
                        <div id="primary" class="<?php echo esc_attr( $main_class ) ?> content-area">
                            <main id="main" class="main-content" role="main">
                                <div class="themesflat-gallery-taxonomy">
                                    <div class="wrap-gallery-post row column-<?php echo esc_attr( $columns ); ?>">
										<?php
										if ( $query->have_posts() ) {
											while ( $query->have_posts() ) : $query->the_post(); ?>
                                                <div class="item <?php echo esc_attr( $item_classes ) ?>">
                                                    <div class="gallery-post gallery-post-<?php the_ID(); ?>">
                                                        <div class="featured-post">
                                                            <a href="<?php echo get_the_permalink(); ?>">
	                                                            <?php
	                                                            themesflat_render_thumbnail_markup( array(
		                                                            'image_size'  => '740x774',
		                                                            'image_mode'  => 'background',
		                                                            'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
	                                                            ) );
	                                                            ?>
                                                            </a>
                                                            <div class="hover-icon">
                                                                <div class="icon">
                                                                    <img src="<?php echo esc_url( THEMESFLAT_URL . 'assets/img/icon-gallery.png' ) ?>"
                                                                         alt="<?php esc_attr_e( 'Hover Icon', 'lowlead' ) ?>">
                                                                </div>
                                                            </div>
                                                            <div class="content-wrap">
                                                                <div class="content">
                                                                    <div class="post-meta">
																		<?php echo the_terms( get_the_ID(), 'gallery_category', '', ' , ', '' ); ?>
                                                                    </div>
                                                                    <h2 class="title"><?php echo get_the_title(); ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
											<?php
											endwhile;
										}
										?>
                                    </div>
                                </div><!-- /.themesflat-gallery-taxonomy -->
								<?php
								themesflat_pagination_posttype( $query );
								wp_reset_postdata();
								?>
                            </main><!-- #main -->
                        </div><!-- #primary -->
	                    <?php
	                    if ( themesflat_get_opt( 'gallery_layout' ) == 'sidebar-left' || themesflat_get_opt( 'gallery_layout' ) == 'sidebar-right' ) :
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
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>