<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package lowlead
 */

get_header();
$content_class = 'col-12';
if ( ( themesflat_get_opt( 'page_sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'page_sidebar_layout' ) == 'sidebar-right' ) ) {
	$content_class = 'col-lg-8';
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row wrap-content-area">
                    <div id="primary" class="content-area <?php echo esc_attr( $content_class ) ?>">
                        <main id="main" class="main-content" role="main">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', 'page' ); ?>

								<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>
							<?php endwhile; // end of the loop. ?>
                        </main><!-- #main -->
                    </div><!-- #primary -->
					<?php
					if ( themesflat_get_opt_elementor( 'page_sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt_elementor( 'page_sidebar_layout' ) == 'sidebar-right' ) :
						?>
                        <div class="col-lg-4 tf-sidebar">
							<?php get_sidebar(); ?>
                        </div>
					<?php
					endif;
					?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>