<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lowlead
 */
?>

<section class="no-results not-found">
    <header class="result-header">
        <h1 class="result-title nothing"><?php esc_html_e( 'Nothing Found', 'lowlead' ); ?></h1>
    </header><!-- .page-header -->
    <div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p>
                <?php
                $message = sprintf( 'Ready to publish your first post? <a href="%s">Get started here', esc_url( admin_url( 'post-new.php' ) ) );
                echo wp_kses( $message, themesflat_kses_allowed_html() );
                ?>
            </p>
		<?php elseif ( is_search() ) : ?>
            <p class="subtext-nothing"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lowlead' ); ?></p>
            <aside class="widget widget_search">
				<?php get_search_form(); ?>
            </aside>
		<?php else : ?>
            <p class="subtext-nothing"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lowlead' ); ?></p>
            <aside class="widget widget_search">
				<?php get_search_form(); ?>
            </aside>
		<?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->