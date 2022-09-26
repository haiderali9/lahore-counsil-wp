<?php
/**
 * @var $wp_query
 */
get_header();
$term_slug               = $wp_query->tax_query->queries[0]['terms'][0];
$attorneys_number_post   = themesflat_get_opt( 'attorneys_number_post' ) ? themesflat_get_opt( 'attorneys_number_post' ) : 6;
$columns                 = themesflat_get_opt( 'attorneys_grid_columns' );
$columns_tb              = themesflat_get_opt( 'attorneys_grid_columns_tablet' );
$columns_mb              = themesflat_get_opt( 'attorneys_grid_columns_mobile' );
$paged                   = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$themesflat_paging_style = themesflat_get_opt( 'attorneys_archive_pagination_style' );

$args              = array(
	'post_type'      => 'attorneys',
	'paged'          => $paged,
	'posts_per_page' => $attorneys_number_post,
);
$args['tax_query'] = array(
	array(
		'taxonomy' => 'attorneys_category',
		'field'    => 'slug',
		'terms'    => $term_slug
	),
);
$query             = new WP_Query( $args );
$item_classes = themesflat_create_columns( $columns, $columns_tb, $columns_mb );

$sidebar      = themesflat_get_opt( 'attorneys_sidebar_list' );
$main_class   = 'col-12';
if ( themesflat_get_opt( 'attorneys_layout' ) == 'sidebar-left' || themesflat_get_opt( 'attorneys_layout' ) == 'sidebar-right' ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$main_class = 'col-lg-8';
	}
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div class="row">
                        <div class="<?php echo esc_attr( $main_class ) ?> content-wrap">
                            <div id="primary" class="content-area">
                                <main id="main" class="main-content" role="main">
                                    <div class="tf-wrap-attorneys-post row column-<?php echo esc_attr( $columns ); ?>">
							            <?php

							            if ( $query->have_posts() ) {
								            while ( $query->have_posts() ) : $query->the_post();
									            $id = $post->ID;
									            ?>
                                                <div class="item <?php echo esc_attr( $item_classes ) ?>">
                                                    <div class="attorneys-post attorneys-post-<?php the_ID(); ?>">
                                                        <div class="featured-post">
												            <?php
												            themesflat_render_thumbnail_markup( array(
													            'image_size'  => '540x654',
													            'image_mode'  => 'background',
													            'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
												            ) );
												            ?>
                                                            <div class="image-hover">
													            <?php $facebook_url = get_post_meta( $id, 'tf_attorney_facebook', true ); ?>
                                                                <a href="<?php echo esc_url( $facebook_url ) ?>"
                                                                   class="icon"><i
                                                                            class="fab fa-facebook-f"></i></a>
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
			            if ( themesflat_get_opt( 'attorneys_layout' ) == 'sidebar-left' || themesflat_get_opt( 'attorneys_layout' ) == 'sidebar-right' ) :
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
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>