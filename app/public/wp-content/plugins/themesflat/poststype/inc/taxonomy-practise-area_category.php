<?php
get_header();
$term_slug = $wp_query->tax_query->queries[0]['terms'][0];
$practise_area_number_post = themesflat_get_opt( 'practise_area_number_post' ) ? themesflat_get_opt( 'practise_area_number_post' ) : 9;
$columns = themesflat_get_opt('practise_area_grid_columns');
$columns_tb                = themesflat_get_opt( 'practise_area_grid_columns_tablet' );
$columns_mb                = themesflat_get_opt( 'practise_area_grid_columns_mobile' );
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

$args = array(
    'post_type' => 'practise_area',
    'paged'     => $paged,
    'posts_per_page' => $practise_area_number_post,
);
$args['tax_query'] = array(
    array(
        'taxonomy' => 'practise_area_category',
        'field'    => 'slug',
        'terms'    => $term_slug
    ),
);
$query = new WP_Query($args);
$item_classes = themesflat_create_columns( $columns, $columns_tb, $columns_mb );
$sidebar      = themesflat_get_opt( 'practise_area_sidebar_list' );
$main_class   = 'col-12';
if ( themesflat_get_opt( 'practise_area_layout' ) == 'sidebar-left' || themesflat_get_opt( 'practise_area_layout' ) == 'sidebar-right' ) {
	if(is_active_sidebar($sidebar)){
		$main_class = 'col-lg-8';
    }
}
$themesflat_paging_style = themesflat_get_opt( 'case_study_archive_pagination_style' );
?>
<div class="themesflat-practise_area-taxonomy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div class="row">
                        <div class="<?php echo esc_attr( $main_class ) ?> content-wrap">
                            <div id="primary" class="content-area">
                                <main id="main" class="main-content" role="main">

                                    <div class="wrap-practise-area-post row column-<?php echo esc_attr( $columns ); ?>">
							            <?php
							            if ( $query->have_posts() ) {
								            while ( $query->have_posts() ) : $query->the_post();
									            global $post;
									            $id = $post->ID;
									            ?>
                                                <div class="item tf-practise-area-style1 <?php echo esc_attr( $item_classes ) ?>">
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
							            } else {
								            get_template_part( 'template-parts/content', 'none' );
							            }
							            ?>
                                    </div>
						            <?php
						            themesflat_pagination_posttype( $query, '' );
						            wp_reset_postdata();
						            ?>
                                </main><!-- #main -->
                            </div><!-- #primary -->
                        </div>
			            <?php
			            if ( themesflat_get_opt( 'practise_area_layout' ) == 'sidebar-left' || themesflat_get_opt( 'practise_area_layout' ) == 'sidebar-right' ) :
				            if(is_active_sidebar($sidebar)):
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
</div><!-- /.themesflat-practise_area-taxonomy -->
<?php get_footer(); ?>