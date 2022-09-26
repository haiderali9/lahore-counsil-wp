<?php
/**
 * The template for displaying archive gallery.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package carenow
 */

get_header(); ?>
<?php
$gallery_number_post     = themesflat_get_opt( 'gallery_number_post' ) ? themesflat_get_opt( 'gallery_number_post' ) : 6;
$columns                 = themesflat_get_opt( 'gallery_grid_columns' );
$columns_tb              = themesflat_get_opt( 'gallery_grid_columns_tablet' );
$columns_mb              = themesflat_get_opt( 'gallery_grid_columns_mobile' );
$themesflat_paging_style = themesflat_get_opt( 'gallery_archive_pagination_style' );
$orderby                 = themesflat_get_opt( 'gallery_order_by' );
$order                   = themesflat_get_opt( 'gallery_order_direction' );
$exclude                 = themesflat_get_opt( 'gallery_exclude' );
$terms_slug              = wp_list_pluck( get_terms( 'gallery_category', 'hide_empty=0' ), 'slug' );


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$query_args = array(
	'post_type'      => 'gallery',
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => $paged,
	'posts_per_page' => $gallery_number_post,
	'tax_query'      => array(
		array(
			'taxonomy' => 'gallery_category',
			'field'    => 'slug',
			'terms'    => $terms_slug,
		),
	),
);

if ( ! empty( $exclude ) ) {
	if ( ! is_array( $exclude ) ) {
		$exclude = explode( ',', $exclude );
	}

	$query_args['post__not_in'] = $exclude;
}
$query = new WP_Query( $query_args );

$item_classes = themesflat_create_columns( $columns, $columns_tb, $columns_mb );
$sidebar      = themesflat_get_opt( 'gallery_sidebar_list' );
$main_class   = 'col-12';
if ( themesflat_get_opt( 'gallery_layout' ) == 'sidebar-left' || themesflat_get_opt( 'gallery_layout' ) == 'sidebar-right' ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$main_class = 'col-lg-8';
	}

}
$show_heading = themesflat_get_opt( 'gallery_show_heading' );
$main_class   = 'col-12';
if ( themesflat_get_opt( 'gallery_layout' ) == 'sidebar-left' || themesflat_get_opt( 'gallery_layout' ) == 'sidebar-right' ) {
	$main_class = 'col-lg-8';
}
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
                                <div class="wrap-gallery-post row column-<?php echo esc_attr( $columns ); ?>">
									<?php

									if ( $query->have_posts() ) {
										while ( $query->have_posts() ) : $query->the_post();
											$id = $post->ID;
											?>
                                            <div class="item <?php echo esc_attr( $item_classes ) ?>">
                                                <div class="gallery-post gallery-post-<?php the_ID(); ?>">
                                                    <div class="featured-post">
														<?php
														themesflat_render_thumbnail_markup( array(
															'image_size'  => '740x774',
															'image_mode'  => 'background',
															'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
														) );
														?>
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
									} else {
										get_template_part( 'template-parts/content', 'none' );
									}
									?>
                                </div>
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
    </div><!-- /.themesflat-gallery-taxonomy -->

<?php get_footer(); ?>