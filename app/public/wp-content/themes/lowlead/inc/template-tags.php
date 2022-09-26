<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lowlead
 */

/**
 * Prints HTML with meta information for the current post-date/time, post categories and author.
 */

function themesflat_widget_layout( $columns ) {
	$layout = array();
	switch ( $columns ) {
		case 1:
			$layout = array( 12 );
			break;
		case 2:
			$layout = array( 6, 6 );
			break;
		case 3:
			$layout = array( 4, 4, 4 );
			break;
		case 4:
			$layout = array( 3, 2, 4, 3 );
			break;
		case 5:
			$layout = array( 3, 3, 3, 3 );
			break;
		case 6:
			$layout = array( 2, 2, 2, 2, 2 );
			break;
		default:
			$layout = array( 12 );
			break;
	}

	return $layout;
}

if ( ! function_exists( 'themesflat_posted_category' ) ) :
	function themesflat_posted_category( $layout = '' ) {
		if ( has_category() ) {
			echo '<div class="post-categories">' . esc_html__( "In - ", 'lowlead' );
			the_category( ', ' );
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'themesflat_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function themesflat_entry_footer() {
		// Hide category and tag text for pages.
		$tags_links = '';
		$tags_list  = array();
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list && is_single() ) {
				$tags_links = sprintf( '<div class="tags-links"><span class="themesflat-tags-lable">Tags</span>' . esc_html__( ' %1$s', 'lowlead' ) . '</div>', $tags_list );

			}
		}

		?>
        <footer class="entry-footer">
			<?php if ( $tags_list ): ?>
                <div class="divider"></div>
			<?php endif; ?>
			<?php
			printf( $tags_links );
			themesflat_social_single();
			?>
        </footer>
		<?php

	}
endif;

if ( ! function_exists( 'themesflat_post_navigation' ) ) :
	function themesflat_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
        <nav class="navigation posts-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'lowlead' ); ?></h2>
            <ul class="nav-links clearfix">
				<?php
				if ( is_attachment() ) :
					previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'lowlead' ) ) );
				else :
					previous_post_link( '<li class="previous-post">%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Prev Post', 'lowlead' ) ) );
					next_post_link( '<li class="next-post">%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Next Post', 'lowlead' ) ) );
				endif;
				?>
            </ul><!-- .nav-links -->
        </nav><!-- .navigation -->
		<?php
	}
endif;