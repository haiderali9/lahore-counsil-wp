<?php
/**
 * The template for displaying all single posts.
 *
 * @package lowlead
 */

get_header();
$custom_layout = '';
if ( isset( $_GET['blog_layout'] ) ) {
	$custom_layout = $_GET['blog_layout'];
}
$sidebar       = themesflat_get_opt( 'blog_single_sidebar_list' );
$content_class = 'col-lg-8 mx-auto';
if ( ( themesflat_get_opt( 'single_sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'single_sidebar_layout' ) == 'sidebar-right' || $custom_layout == 'sidebar-right' || $custom_layout == 'sidebar-left' ) && is_active_sidebar( $sidebar ) ) {
	$content_class = 'col-lg-8';
}
?>
<div class="container">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<?php if ( themesflat_get_opt( 'single_sidebar_layout' ) == 'fullwidth' && ( $custom_layout == '' || $custom_layout == 'fullwidth' ) ) {
		get_template_part( 'tpl/feature-post-single' );
	} ?>
        <div class="row">
            <div class="tf-content-single-wrap <?php echo esc_attr( $content_class ) ?>">
                <div id="primary" class="content-area">
                    <main id="main" class="post-wrap" role="main">
						<?php if ( themesflat_get_opt( 'single_sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'single_sidebar_layout' ) == 'sidebar-right' || $custom_layout == 'sidebar-right' || $custom_layout == 'sidebar-left' ) {
							get_template_part( 'tpl/feature-post-single' );
						} ?>
						<?php get_template_part( 'content', 'single' ); ?>
                        <div class="main-single">
							<?php
							if ( 'post' == get_post_type() && themesflat_get_opt( 'show_post_navigator' ) != 0 ):
								themesflat_post_navigation();
							endif;
							?>
							<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>
                        </div><!-- /.main-single -->
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
			<?php
			if ( themesflat_get_opt( 'single_sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'single_sidebar_layout' ) == 'sidebar-right' || $custom_layout == 'sidebar-right' || $custom_layout == 'sidebar-left' ) :
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
	<?php get_template_part( 'tpl/related-post' ) ?>
</div><!-- /.container -->
<?php get_footer(); ?>
