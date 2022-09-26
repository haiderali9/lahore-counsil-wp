<?php
/**
 * @package lowlead
 */
global $themesflat_thumbnail;
$themesflat_thumbnail = 'themesflat-blog';
do_action( 'lowlead_before_post_single', get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post blog-single' ); ?>>
    <div class="main-post">
		<?php get_template_part( 'tpl/entry-content/entry-content-meta' ); ?>
        <div class="entry-content clearfix">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'lowlead' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
			?>
        </div><!-- .entry-content -->
		<?php if ( themesflat_get_opt( 'show_entry_footer_content' ) == 1 ): ?>
			<?php themesflat_entry_footer(); ?>
		<?php endif; ?>
    </div><!-- /.main-post -->
</article><!-- #post-## -->