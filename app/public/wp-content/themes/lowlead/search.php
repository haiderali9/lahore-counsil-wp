<?php
/**
 * The template for displaying search results pages.
 *
 * @package lowlead
 */

get_header();
$content_class = 'col-12';
$sidebar       = themesflat_get_opt( 'blog_sidebar_list' );
if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$content_class = 'col-lg-8';
	}
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area clearfix">
                    <div class="row">
                        <div id="primary" class="content-area <?php echo esc_attr( $content_class ) ?>">
                            <main id="main"
                                  class="post-wrap <?php echo esc_attr( themesflat_get_opt( 'blog_archive_layout' ) ); ?>"
                                  role="main">
								<?php if ( have_posts() ) : ?>
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php
										/**
										 * Run the loop for the search to output the results.
										 * If you want to overload this in a child theme then include a file
										 * called content-search.php and that will be used instead.
										 */
										get_template_part( 'content', get_post_format() );
										?>
									<?php endwhile; ?>

									<?php
									if ( get_theme_mod( 'show_modern_pagination' ) == 1 ) {
										roll_pagination();
									} else {
										get_template_part( 'tpl/pagination' );
									}
									?>
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
                            </main><!-- #main -->
                        </div><!-- #primary -->
						<?php
						if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) :
							if ( is_active_sidebar( $sidebar ) ): ?>
                                <div class="col-lg-4 tf-sidebar">
									<?php get_sidebar(); ?>
                                </div>
							<?php
							endif;
						endif;
						?>
                    </div>

                </div><!-- /.wrap-content-area -->
            </div><!-- /.col-md-12 -->
        </div>
    </div>
<?php get_footer(); ?>