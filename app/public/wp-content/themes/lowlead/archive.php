<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lowlead
 */

get_header(); ?>
<?php
$blog_layout = themesflat_get_opt( 'blog_archive_layout' );
$columns     = themesflat_get_opt( 'blog_grid_columns' );
$imgs        = array(
	'blog-grid' => 'themesflat-blog',
	'blog-list' => 'themesflat-blog',
);
$class_names = array(
	1 => 'blog-one-column',
	2 => 'blog-two-columns',
	3 => 'blog-three-columns',
	4 => 'blog-four-columns',
);
global $themesflat_thumbnail;
$themesflat_thumbnail = $imgs[ $blog_layout ];
$themesflat_thumbnail = apply_filters( 'themesflat/template/themesflat_thumbnail', $themesflat_thumbnail );
$class                = array( 'blog-archive row' );
$class[]              = 'archive-' . get_post_type();
$class[]              = $blog_layout;
if ( ! empty( $columns ) ) {
	$class[] = $class_names[ $columns ];
}
$class         = apply_filters( 'themesflat/template/blog_class', $class );
$sidebar       = themesflat_get_opt( 'blog_sidebar_list' );
$content_class = 'col-12';
if ( ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) && is_active_sidebar( $sidebar ) ) {
	$content_class = 'col-lg-8';
}
$themesflat_paging_style = themesflat_get_opt( 'blog_archive_pagination_style' );

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area clearfix">
                    <div id="primary" class="content-area">
                        <main id="main" class="post-wrap" role="main">
                            <div class="row">
                                <div class="tf-post-list-main <?php echo esc_attr( $content_class ) ?>">
									<?php if ( have_posts() ) : ?>
                                        <div class="wrap-blog-article <?php echo esc_attr( implode( " ", $class ) ); ?> has-post-content">
											<?php /* Start the Loop */ ?>
											<?php while ( have_posts() ) : the_post(); ?>

												<?php
												/* Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'content', get_post_type() );
												?>

											<?php endwhile; ?>
                                        </div>
									<?php else : ?>
										<?php get_template_part( 'content', 'none' ); ?>
									<?php endif; ?>
                                    <div class="clearfix">
										<?php
										get_template_part( 'tpl/pagination' );
										?>
                                    </div>
                                </div>
								<?php
								$show_sidebar = false;
								if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) {
									$show_sidebar = true;
								}
								if ( $show_sidebar ):
									if ( is_active_sidebar( $sidebar ) ):
										?>
                                        <div class="col-lg-4 tf-sidebar">
											<?php get_sidebar(); ?>
                                        </div>
									<?php endif; ?>
								<?php endif; ?>
                            </div>

                        </main><!-- #main -->

                    </div><!-- #primary -->
                </div><!-- /.wrap-content-area -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div>

<?php get_footer(); ?>