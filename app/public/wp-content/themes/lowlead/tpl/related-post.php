<?php
if ( ! get_theme_mod( 'show_related_post' ) ) {
	return;
}
$layout        = get_theme_mod( 'related_post_style', 'blog-grid' );
$carousel      = 1;
$grid_columns  = themesflat_get_opt( 'grid_columns_post_related' );
$readmore_text = themesflat_get_opt( 'blog_archive_readmore_text' );
if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
} else {
	$paged = 1;
}
$args = array(
	'post_status'         => 'publish',
	'post_type'           => 'post',
	'paged'               => $paged,
	'ignore_sticky_posts' => true,
	'posts_per_page'      => themesflat_get_opt( 'number_related_post' ),
	'post__not_in'        => array( $post->ID ),
);

$categories = (array) get_the_category();

if ( empty( $categories ) ) {
	return;
}

$args['category'] = wp_list_pluck( $categories, 'slug' );

if ( $layout != '' ) {
	$class[] = $layout;
}
if ( $grid_columns != '' ) {
	$class[] = 'columns-' . $grid_columns;
}
if ( $carousel == 1 ) {
	$class[] = 'has-carousel';
}
global $themesflat_thumbnail;
$imgs                 = array(
	'blog-grid' => 'themesflat-blog',
	'blog-list' => 'themesflat-blog',
);
$themesflat_thumbnail = $imgs[ $layout ];

$slick_options   = array(
	'slidesToShow' => intval( $grid_columns ),
);
$tablet_settings = array(
	'slidesToShow' => 2,
);
$mobile_settings = array(
	'slidesToShow' => 1,
);

$responsive = array(
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
        <h3 class="box-title"><?php esc_html_e( 'Related Post', 'lowlead' ) ?></h3>
        <div class="box-content">
            <div class="<?php echo esc_attr( implode( ' ', $class ) ) ?>" data-slick-options="<?php echo esc_attr(json_encode( $slick_options ))?>">
				<?php
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="item">
                            <article <?php echo esc_attr( post_class( 'entry' ) ); ?>>
                                <div class="entry-border">
									<?php if ( has_post_thumbnail() ): ?>
                                        <div class="featured-post">
                                            <div class="image">
												<?php
												themesflat_render_thumbnail_markup( array(
													'image_size'  => 'full',
													'image_ratio' => '3x2',
													'image_mode'  => 'background',
													'placeholder' => THEMESFLAT_LINK . 'images/placeholder.png'
												) );
												?>
                                            </div>
                                        </div>
									<?php endif; ?>

                                    <div class="content-post">
										<?php
										$content_elements = themesflat_layout_draganddrop( themesflat_get_opt( 'post_content_elements' ) );
										foreach ( $content_elements as $content_element ) :
											if ( 'title' == $content_element ) {
												?>
                                                <div class="entry-box-title clearfix">
                                                    <div class="wrap-entry-title">
														<?php
														the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
														?>
                                                    </div><!-- /.wrap-entry-title -->
                                                </div>
												<?php
											} elseif ( 'meta' == $content_element ) {
												get_template_part( 'tpl/entry-content/entry-content-meta' );
											} elseif ( 'excerpt_content' == $content_element ) {
												echo '<div class="post-content post-excerpt clearfix">';
												the_excerpt();
												echo '</div>';
											} elseif ( 'readmore' == $content_element ) {
												get_template_part( 'tpl/entry-content/entry-content-readmore' );
											}
										endforeach;
										?>       </div>
                                </div>
                            </article><!-- /.entry -->
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


