<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package lowlead
 */
?>

<?php
$sidebar = themesflat_get_opt( 'blog_sidebar_list' );
if ( is_page() ) {
	$sidebar = themesflat_get_opt( 'page_sidebar_list' );
}
if ( 'practise_area' == get_post_type() ) {
	$sidebar = themesflat_get_opt( 'practise_area_sidebar_list' );
	if ( is_single() ) {
		$sidebar = themesflat_get_opt( 'practise_area_single_sidebar_list' );
	}
}
if ( 'case_study' == get_post_type() ) {
	$sidebar = themesflat_get_opt( 'case_study_sidebar_list' );
	if ( is_single() ) {
		$sidebar = themesflat_get_opt( 'case_study_single_sidebar_list' );
	}
}
if ( 'attorneys' == get_post_type() && is_single() ) {
	$sidebar = themesflat_get_opt( 'attorneys_single_sidebar_list' );
	if ( is_single() ) {
		$sidebar = themesflat_get_opt( 'attorneys_single_sidebar_list' );
	}
}
if( 'gallery' == get_post_type() ){
	$sidebar = themesflat_get_opt( 'gallery_sidebar_list' );
}
if ( is_search() ) {
	$sidebar = themesflat_get_opt( 'blog_sidebar_list' );
}
?>
    <div id="secondary" class="widget-area" role="complementary">
        <div class="sidebar">
			<?php
			themesflat_dynamic_sidebar( $sidebar );
			?>
        </div>
    </div><!-- #secondary -->
<?php
?>