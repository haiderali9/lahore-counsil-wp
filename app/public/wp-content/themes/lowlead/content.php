<?php
/**
 * @package lowlead
 */
$content_elements = themesflat_layout_draganddrop( themesflat_get_opt( 'post_content_elements' ) );
$columns          = themesflat_get_opt( 'blog_grid_columns' );
$columns_tb       = themesflat_get_opt( 'blog_grid_columns_tablet' );
$columns_mb       = themesflat_get_opt( 'blog_grid_columns_mobile' );
if ( isset( $_GET['blog-layout'] ) && $_GET['blog-layout'] == 'grid' ) {
	$columns    = 3;
	$columns_tb = 2;
	$columns_mb = 1;
}
$item_classes = themesflat_create_columns( $columns, $columns_tb, $columns_mb );
?>

<div class="item <?php echo esc_attr( $item_classes ) ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
        <div class="main-post entry-border">
			<?php get_template_part( 'tpl/feature-post' ); ?>

            <div class="content-post">
				<?php
				foreach ( $content_elements as $content_element ) :
					if ( 'title' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-title' );
					} elseif ( 'meta' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-meta' );
					} elseif ( 'excerpt_content' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-body' );
					} elseif ( 'readmore' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-readmore' );
					}
				endforeach;
				?>
            </div><!-- /.entry-post -->

        </div><!-- /.main-post -->
    </article><!-- #post-## -->
</div>