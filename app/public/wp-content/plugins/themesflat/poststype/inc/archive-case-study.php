<?php
/**
 * The template for displaying archive case_study.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lowlead
 */

get_header(); ?>
<?php
$case_study_number_post  = themesflat_get_opt( 'case_study_number_post' ) ? themesflat_get_opt( 'case_study_number_post' ) : 6;
$columns                 = themesflat_get_opt( 'case_study_grid_columns' );
$columns_tb              = themesflat_get_opt( 'case_study_grid_columns_tablet' );
$columns_mb              = themesflat_get_opt( 'case_study_grid_columns_mobile' );
$themesflat_paging_style = themesflat_get_opt( 'case_study_archive_pagination_style' );
$orderby                 = themesflat_get_opt( 'case_study_order_by' );
$order                   = themesflat_get_opt( 'case_study_order_direction' );
$exclude                 = themesflat_get_opt( 'case_study_exclude' );
$terms_slug              = wp_list_pluck( get_terms( 'case_study_category', 'hide_empty=0' ), 'slug' );

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$query_args = array(
	'post_type'      => 'case_study',
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => $paged,
	'posts_per_page' => $case_study_number_post,
	'tax_query'      => array(
		array(
			'taxonomy' => 'case_study_category',
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
$query        = new WP_Query( $query_args );
$item_classes = themesflat_create_columns( $columns, $columns_tb, $columns_mb );
$sidebar      = themesflat_get_opt( 'case_study_sidebar_list' );
$main_class   = 'col-12';
if ( themesflat_get_opt( 'case_study_layout' ) == 'sidebar-left' || themesflat_get_opt( 'case_study_layout' ) == 'sidebar-right' ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$main_class = 'col-lg-8';
	}
}
$show_heading = themesflat_get_opt( 'case_study_show_heading' );
?>
<?php if ( $show_heading ):
	$before_heading = themesflat_get_opt( 'case_study_before_heading' );
	$heading  = themesflat_get_opt( 'case_study_heading' );
	?>
    <div class="tf-heading tf-title-section-style-01 text-center">
        <div class="before-heading"><?php echo esc_html( $before_heading ) ?></div>
        <h2 class="heading"><?php echo wp_kses( $heading, themesflat_kses_allowed_html() ) ?></h2>
        <div class="heading-separate"></div>
    </div>
<?php endif; ?>
    <div class="themesflat-case-study-taxonomy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-content-area">
                        <div class="row">
                            <div class="<?php echo esc_attr( $main_class ) ?> content-wrap">
                                <div id="primary" class="content-area">
                                    <main id="main" class="main-content" role="main">
                                        <div class="tf-wrap-case-study-post row column-<?php echo esc_attr( $columns ); ?>">
											<?php

											if ( $query->have_posts() ) {
												while ( $query->have_posts() ) : $query->the_post();
													$id = get_the_ID();
													?>
                                                    <div class="item <?php echo esc_attr( $item_classes ) ?>">
                                                        <div class="case-study-post case-study-post-<?php the_ID(); ?>">
                                                            <div class="featured-post">
																<?php
																themesflat_render_thumbnail_markup( array(
																	'image_size'  => '740x540',
																	'image_mode'  => 'background',
																	'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
																) );
																?>
                                                            </div>
                                                            <div class="content">
                                                                <div class="post-meta case-study-meta case-study-categories">
																	<?php echo get_the_term_list( $id, 'case_study_category', '', ', ', '' ); ?>
                                                                </div>
                                                                <h2 class="title">
                                                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                                </h2>
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
                            </div>
							<?php
							if ( themesflat_get_opt( 'case_study_layout' ) == 'sidebar-left' || themesflat_get_opt( 'case_study_layout' ) == 'sidebar-right' ) :
								if ( is_active_sidebar( $sidebar ) ):
									?>
                                    <div class="col-lg-4 tf-sidebar">
										<?php get_sidebar(); ?>
                                    </div>
								<?php
								endif;
							endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.themesflat-case_study-taxonomy -->
<?php get_footer(); ?>