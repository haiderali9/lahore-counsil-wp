<?php
global $the_query;
// Don't print empty markup if there's only one page.
if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
	return;
}

$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$pagenum_link = html_entity_decode( get_pagenum_link() );
$query_args   = array();
$url_parts    = explode( '?', $pagenum_link );

if ( isset( $url_parts[1] ) ) {
	wp_parse_str( $url_parts[1], $query_args );
}

$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

// Set up paginated links.
$links = paginate_links( array(
	'base'      => $pagenum_link,
	'format'    => $format,
	'total'     => $GLOBALS['wp_query']->max_num_pages,
	'current'   => $paged,
	'mid_size'  => 1,
	'add_args'  => array_map( 'urlencode', $query_args ),
	'prev_text' =>  __( 'Prev <i class="fal fa-plus"></i>', 'lowlead' ),
	'next_text' =>  __( 'Next <i class="fal fa-plus"></i>', 'lowlead' ),
) );

$numeric_links = paginate_links( array(
	'base'      => $pagenum_link,
	'format'    => $format,
	'total'     => $GLOBALS['wp_query']->max_num_pages,
	'current'   => $paged,
	'mid_size'  => 1,
	'add_args'  => array_map( 'urlencode', $query_args ),
	'prev_next' => false
) );

$next_link     = get_next_posts_link( esc_html__( 'Next', 'lowlead' ) );
$prev_link     = get_previous_posts_link( esc_html__( 'Previous', 'lowlead' ) );
$loadmore_text = apply_filters( 'themesflat/template/loadmore_text', esc_html__( 'Load More', 'lowlead' ) );
$more_link     = get_next_posts_link( esc_html( $loadmore_text ) );
global $themesflat_paging_style;
global $themesflat_paging_for;
?>

<?php if ( $themesflat_paging_style == 'pager' && ! ( empty( $next_link ) && empty( $prev_link ) ) ): ?>
    <nav class="navigation paging-navigation pager <?php themesflat_esc_attr( $themesflat_paging_for ); ?>"
         role="navigation">
        <div class="pagination loop-pagination">
			<?php echo wp_kses( $prev_link, themesflat_kses_allowed_html() ) ?>
			<?php echo wp_kses( $next_link, themesflat_kses_allowed_html() ) ?>
        </div>
    </nav>
<?php elseif ( $themesflat_paging_style == 'numeric' && ! empty( $numeric_links ) ): ?>
    <nav class="navigation paging-navigation numeric <?php themesflat_esc_attr( $themesflat_paging_for ); ?>"
         role="navigation">
        <div class="pagination loop-pagination">
			<?php echo wp_kses( $numeric_links, themesflat_kses_allowed_html() ) ?>
        </div>
    </nav>
<?php elseif ( $themesflat_paging_style == 'loadmore' && ! empty( $next_link ) ): ?>
    <nav class="navigation paging-navigation loadmore <?php themesflat_esc_attr( $themesflat_paging_for ); ?>"
         role="navigation">
        <div class="pagination loop-pagination text-center draw-border">
			<?php echo wp_kses( $more_link, themesflat_kses_allowed_html() ) ?>
        </div>
    </nav>
<?php elseif ( ! empty( $links ) ): ?>
    <nav class="navigation  paging-navigation pager-numeric <?php themesflat_esc_attr( $themesflat_paging_for ); ?>"
         role="navigation">
        <div class="pagination loop-pagination">
			<?php echo wp_kses( $links, themesflat_kses_allowed_html() ) ?>
        </div>
    </nav>
<?php endif ?>