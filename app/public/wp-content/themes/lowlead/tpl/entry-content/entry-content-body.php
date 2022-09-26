<?php
if ( is_single() ) {
	echo '<div class="post-content clearfix">';
	the_content();
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lowlead' ),
		'after'  => '</div>',
	) );
	echo '</div>';
} else {
	if ( ! empty( get_the_content() ) ) {
		echo '<div class="post-content post-excerpt clearfix">';
		if ( strpos( get_the_content(), 'more-link' ) === false ) {
			add_filter( 'excerpt_more', 'themesflat_excerpt_not_more' );
			the_excerpt();
		} else {
			add_filter( 'the_content_more_link', 'themesflat_excerpt_not_more' );
			the_content();
		}
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lowlead' ),
			'after'  => '</div>',
		) );
		echo '</div>';
	}
}

