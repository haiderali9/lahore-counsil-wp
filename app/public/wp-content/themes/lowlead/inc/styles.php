<?php
/**
 * @package lowlead
 */
//Output all custom styles for this theme

function themesflat_custom_styles( $custom ) {
	$custom        = $root = '';
	$break_point_1 = 'max-width: 991px';
	$break_point_2 = 'min-width: 992px';
	//GROUP FONT
	$font = themesflat_get_json( 'typography_body' );

	$font_style = themesflat_font_style( $font['style'] );

	/*Typography Body*/
	$body_fonts          = $font['family'];
	$body_line_height    = $font['line_height'];
	$body_font_weight    = $font_style[0];
	$body_font_style     = $font_style[1];
	$body_size           = $font['size'];
	$body_letter_spacing = $font['letter_spacing'];

	// font family
	if ( $body_fonts != '' ) {
		$root   .= '  --theme-body-font:' . esc_attr( $body_fonts ) . ";\n";
		$custom .= "body { font-family:" . $body_fonts . ";}" . "\n";
	}

	// font family important
	if ( $body_fonts != '' ) {
		$custom .= ".blog-single .entry-content .icon-list { font-family:" . $body_fonts . "!important;}" . "\n";
	}

	// font weight
	if ( $body_font_weight != '' ) {
		$custom .= "body { font-weight:" . $body_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $body_font_style ) ) {
		$custom .= "body { font-style:" . $body_font_style . "; }" . "\n";
	}
	// font size
	if ( $body_size != '' ) {
		$custom .= "body { font-size:" . intval( $body_size ) . "px; }" . "\n";
	}
	// line height
	if ( $body_line_height != '' ) {
		$custom .= "body { line-height:" . $body_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $body_letter_spacing != '' ) {
		$custom .= "body { letter-spacing:" . $body_letter_spacing . ";}" . "\n";
	}

	/*Typography Headings*/
	$headings_fonts_         = themesflat_get_json( 'typography_headings' );
	$headings_fonts_family   = $headings_fonts_['family'];
	$headings_style          = themesflat_font_style( $headings_fonts_['style'] );
	$headings_font_weight    = $headings_style[0];
	$headings_font_style     = $headings_style[1];
	$headings_line_height    = $headings_fonts_['line_height'];
	$headings_letter_spacing = $headings_fonts_['letter_spacing'];

	// font family
	if ( $headings_fonts_family != '' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { font-family:" . $headings_fonts_family . ";}" . "\n";

	}
	//font weight
	if ( $headings_font_weight != '' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { font-weight:" . $headings_font_weight . ";}" . "\n";
	}
	//line height
	if ( $headings_line_height != '' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { line-height:" . $headings_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $headings_letter_spacing != '' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { letter-spacing:" . $headings_letter_spacing . ";}" . "\n";
	}
	// font style
	if ( isset( $headings_font_style ) ) {
		$custom .= "h1,h2,h3,h4,h5,h6  { font-style:" . $headings_font_style . "; }" . "\n";
	}

	// H1 font size
	if ( $h1_size = themesflat_get_opt( 'h1_size' ) ) {
		$custom .= "h1 { font-size:" . intval( $h1_size ) . "px; }" . "\n";
	}
	// H2 font size
	if ( $h2_size = themesflat_get_opt( 'h2_size' ) ) {
		$custom .= "h2 { font-size:" . intval( $h2_size ) . "px; }" . "\n";
	}
	// H3 font size
	if ( $h3_size = themesflat_get_opt( 'h3_size' ) ) {
		$custom .= "h3 { font-size:" . intval( $h3_size ) . "px; }" . "\n";
	}
	// H4 font size
	if ( $h4_size = themesflat_get_opt( 'h4_size' ) ) {
		$custom .= "h4 { font-size:" . intval( $h4_size ) . "px; }" . "\n";
	}
	// H5 font size
	if ( $h5_size = themesflat_get_opt( 'h5_size' ) ) {
		$custom .= "h5 { font-size:" . intval( $h5_size ) . "px; }" . "\n";
	}
	// H6 font size
	if ( $h6_size = themesflat_get_opt( 'h6_size' ) ) {
		$custom .= "h6 { font-size:" . intval( $h6_size ) . "px; }" . "\n";
	}

	/*Typography Menu*/
	$menu_fonts_         = themesflat_get_json( 'typography_menu' );
	$menu_fonts_family   = $menu_fonts_['family'];
	$menu_fonts_size     = $menu_fonts_['size'];
	$menu_line_height    = $menu_fonts_['line_height'];
	$menu_letter_spacing = $menu_fonts_['letter_spacing'];
	$menu_style          = themesflat_font_style( $menu_fonts_['style'] );
	$menu_font_weight    = $menu_style[0];
	$menu_font_style     = $menu_style[1];

	// font family
	if ( $menu_fonts_family != '' ) {
		$custom .= "#mainnav > ul > li > a, .header-modal-menu-left-btn .text, header .flat-information li { font-family:" . $menu_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $menu_font_weight != '' ) {
		$custom .= "#mainnav > ul > li > a, .header-modal-menu-left-btn .text { font-weight:" . $menu_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $menu_font_style ) ) {
		$custom .= "#mainnav > ul > li > a, .header-modal-menu-left-btn .text  { font-style:" . $menu_font_style . "; }" . "\n";
	}
	// font size
	if ( $menu_fonts_size != '' ) {
		$custom .= "#mainnav ul li a, .header-modal-menu-left-btn .text, header .flat-information li { font-size:" . intval( $menu_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $menu_line_height != '' ) {
		$custom .= "#mainnav > ul > li > a, #header .show-search, header .block a, #header .mini-cart-header .cart-count, #header .mini-cart .cart-count, .button-menu { line-height:" . $menu_line_height . ";}" . "\n";
		$custom .= "#header.header-sticky #mainnav > ul > li > a, #header.header-sticky .show-search a, #header.header-sticky .block a, #header.header-sticky .mini-cart-header .cart-count, #header.header-sticky .mini-cart .cart-count, #header.header-sticky .button-menu { line-height:calc(" . $menu_line_height . " / 1.2);}" . "\n";
	}
	// letter spacing
	if ( $menu_letter_spacing != '' ) {
		$custom .= "#mainnav > ul > li > a, #header .show-search a, header .block a, #header .mini-cart-header .cart-count, #header .mini-cart .cart-count, .button-menu { letter-spacing:" . $menu_letter_spacing . ";}" . "\n";
	}

	/*Typography Sub menu*/
	$sub_menu_fonts_         = themesflat_get_json( 'typography_sub_menu' );
	$sub_menu_fonts_family   = $sub_menu_fonts_['family'];
	$sub_menu_fonts_size     = $sub_menu_fonts_['size'];
	$sub_menu_line_height    = $sub_menu_fonts_['line_height'];
	$sub_menu_letter_spacing = $sub_menu_fonts_['letter_spacing'];
	$sub_menu_style          = themesflat_font_style( $sub_menu_fonts_['style'] );
	$sub_menu_font_weight    = $sub_menu_style[0];
	$sub_menu_font_style     = $sub_menu_style[1];

	// font family
	if ( $sub_menu_fonts_family != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { font-family:" . $sub_menu_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $sub_menu_font_weight != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { font-weight:" . $sub_menu_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $sub_menu_font_style ) ) {
		$custom .= "#mainnav ul.sub-menu > li > a  { font-style:" . $sub_menu_font_style . "; }" . "\n";
	}
	// font size
	if ( $sub_menu_fonts_size != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { font-size:" . intval( $sub_menu_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $sub_menu_line_height != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { line-height:" . $sub_menu_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $sub_menu_letter_spacing != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { letter-spacing:" . $sub_menu_letter_spacing . ";}" . "\n";
	}
	/*Typography blog post title*/
	$blog_post_title_fonts_         = themesflat_get_json( 'typography_blog_post_title' );
	$blog_post_title_fonts_family   = $blog_post_title_fonts_['family'];
	$blog_post_title_fonts_size     = $blog_post_title_fonts_['size'];
	$blog_post_title_line_height    = $blog_post_title_fonts_['line_height'];
	$blog_post_title_letter_spacing = $blog_post_title_fonts_['letter_spacing'];
	$blog_post_title_style          = themesflat_font_style( $blog_post_title_fonts_['style'] );
	$blog_post_title_font_weight    = $blog_post_title_style[0];
	$blog_post_title_font_style     = $blog_post_title_style[1];
	// font family
	if ( $blog_post_title_fonts_family != '' ) {
		$custom .= "article .entry-title { font-family:" . $blog_post_title_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $blog_post_title_font_weight != '' ) {
		$custom .= "article .entry-title { font-weight:" . $blog_post_title_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $blog_post_title_font_style ) ) {
		$custom .= "article .entry-title { font-style:" . $blog_post_title_font_style . "; }" . "\n";
	}
	// font size
	if ( $blog_post_title_fonts_size != '' ) {
		$custom .= "article .entry-title { font-size:" . intval( $blog_post_title_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $blog_post_title_line_height != '' ) {
		$custom .= "article .entry-title { line-height:" . $blog_post_title_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $blog_post_title_letter_spacing != '' ) {
		$custom .= "article .entry-title { letter-spacing:" . $blog_post_title_letter_spacing . ";}" . "\n";
	}

	/*Typography blog post title*/
	$blog_post_meta_fonts_         = themesflat_get_json( 'typography_blog_post_meta' );
	$blog_post_meta_fonts_family   = $blog_post_meta_fonts_['family'];
	$blog_post_meta_fonts_size     = $blog_post_meta_fonts_['size'];
	$blog_post_meta_line_height    = $blog_post_meta_fonts_['line_height'];
	$blog_post_meta_letter_spacing = $blog_post_meta_fonts_['letter_spacing'];
	$blog_post_meta_style          = themesflat_font_style( $blog_post_meta_fonts_['style'] );
	$blog_post_meta_font_weight    = $blog_post_meta_style[0];
	$blog_post_meta_font_style     = $blog_post_meta_style[1];
	// font family
	if ( $blog_post_meta_fonts_family != '' ) {
		$custom .= "article .post-meta .item-meta { font-family:" . $blog_post_meta_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $blog_post_meta_font_weight != '' ) {
		$custom .= "article .post-meta .item-meta { font-weight:" . $blog_post_meta_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $blog_post_meta_font_style ) ) {
		$custom .= "article .post-meta .item-meta { font-style:" . $blog_post_meta_font_style . "; }" . "\n";
	}
	// font size
	if ( $blog_post_meta_fonts_size != '' ) {
		$custom .= "article .post-meta .item-meta { font-size:" . intval( $blog_post_meta_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $blog_post_meta_line_height != '' ) {
		$custom .= "article .post-meta .item-meta { line-height:" . $blog_post_meta_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $blog_post_meta_letter_spacing != '' ) {
		$custom .= "article .post-meta .item-meta { letter-spacing:" . $blog_post_meta_letter_spacing . ";}" . "\n";
	}

	/*Typography blog single title*/
	$blog_single_title_fonts_         = themesflat_get_json( 'typography_blog_single_title' );
	$blog_single_title_fonts_family   = $blog_single_title_fonts_['family'];
	$blog_single_title_fonts_size     = $blog_single_title_fonts_['size'];
	$blog_single_title_line_height    = $blog_single_title_fonts_['line_height'];
	$blog_single_title_letter_spacing = $blog_single_title_fonts_['letter_spacing'];
	$blog_single_title_style          = themesflat_font_style( $blog_single_title_fonts_['style'] );
	$blog_single_title_font_weight    = $blog_single_title_style[0];
	$blog_single_title_font_style     = $blog_single_title_style[1];
	// font family
	if ( $blog_single_title_fonts_family != '' ) {
		$custom .= ".single article .entry-title { font-family:" . $blog_single_title_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $blog_single_title_font_weight != '' ) {
		$custom .= ".single article .entry-title { font-weight:" . $blog_single_title_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $blog_single_title_font_style ) ) {
		$custom .= ".single article .entry-title { font-style:" . $blog_single_title_font_style . "; }" . "\n";
	}
	// font size
	if ( $blog_single_title_fonts_size != '' ) {
		$custom .= ".single article .entry-title { font-size:" . intval( $blog_single_title_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $blog_single_title_line_height != '' ) {
		$custom .= ".single article .entry-title { line-height:" . $blog_single_title_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $blog_single_title_letter_spacing != '' ) {
		$custom .= ".single article .entry-title { letter-spacing:" . $blog_single_title_letter_spacing . ";}" . "\n";
	}

	/*Typography blog single comment title*/
	$blog_single_comment_title_fonts_         = themesflat_get_json( 'typography_blog_single_comment_title' );
	$blog_single_comment_title_fonts_family   = $blog_single_comment_title_fonts_['family'];
	$blog_single_comment_title_fonts_size     = $blog_single_comment_title_fonts_['size'];
	$blog_single_comment_title_line_height    = $blog_single_comment_title_fonts_['line_height'];
	$blog_single_comment_title_letter_spacing = $blog_single_comment_title_fonts_['letter_spacing'];
	$blog_single_comment_title_style          = themesflat_font_style( $blog_single_comment_title_fonts_['style'] );
	$blog_single_comment_title_font_weight    = $blog_single_comment_title_style[0];
	$blog_single_comment_title_font_style     = $blog_single_comment_title_style[1];
	// font family
	if ( $blog_single_comment_title_fonts_family != '' ) {
		$custom .= ".comment-title, .comment-reply-title, .comment-reply-title a { font-family:" . $blog_single_comment_title_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $blog_single_comment_title_font_weight != '' ) {
		$custom .= ".comment-title, .comment-reply-title, .comment-reply-title a { font-weight:" . $blog_single_comment_title_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $blog_single_comment_title_font_style ) ) {
		$custom .= ".comment-title, .comment-reply-title, .comment-reply-title a { font-style:" . $blog_single_comment_title_font_style . "; }" . "\n";
	}
	// font size
	if ( $blog_single_comment_title_fonts_size != '' ) {
		$custom .= ".comment-title, .comment-reply-title { font-size:" . intval( $blog_single_comment_title_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $blog_single_comment_title_line_height != '' ) {
		$custom .= ".comment-title, .comment-reply-title, .comment-reply-title a { line-height:" . $blog_single_comment_title_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $blog_single_comment_title_letter_spacing != '' ) {
		$custom .= ".comment-title, .comment-reply-title, .comment-reply-title a { letter-spacing:" . $blog_single_comment_title_letter_spacing . ";}" . "\n";
	}

	/*Typography sidebar widget title*/
	$sidebar_widget_title_fonts_         = themesflat_get_json( 'typography_sidebar_widget_title' );
	$sidebar_widget_title_fonts_family   = $sidebar_widget_title_fonts_['family'];
	$sidebar_widget_title_fonts_size     = $sidebar_widget_title_fonts_['size'];
	$sidebar_widget_title_line_height    = $sidebar_widget_title_fonts_['line_height'];
	$sidebar_widget_title_letter_spacing = $sidebar_widget_title_fonts_['letter_spacing'];
	$sidebar_widget_title_style          = themesflat_font_style( $sidebar_widget_title_fonts_['style'] );
	$sidebar_widget_title_font_weight    = $sidebar_widget_title_style[0];
	$sidebar_widget_title_font_style     = $sidebar_widget_title_style[1];
	// font family
	if ( $sidebar_widget_title_fonts_family != '' ) {
		$custom .= ".sidebar .widget .widget-title, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6, .sidebar .wp-block-search .wp-block-search__label { font-family:" . $sidebar_widget_title_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $sidebar_widget_title_font_weight != '' ) {
		$custom .= ".sidebar .widget .widget-title, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6, .sidebar .wp-block-search .wp-block-search__label { font-weight:" . $sidebar_widget_title_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $sidebar_widget_title_font_style ) ) {
		$custom .= ".sidebar .widget .widget-title, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6, .sidebar .wp-block-search .wp-block-search__label { font-style:" . $sidebar_widget_title_font_style . "; }" . "\n";
	}
	// font size
	if ( $sidebar_widget_title_fonts_size != '' ) {
		$custom .= ".sidebar .widget .widget-title, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6, .sidebar .wp-block-search .wp-block-search__label { font-size:" . intval( $sidebar_widget_title_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $sidebar_widget_title_line_height != '' ) {
		$custom .= ".sidebar .widget .widget-title, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6, .sidebar .wp-block-search .wp-block-search__label { line-height:" . $sidebar_widget_title_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $sidebar_widget_title_letter_spacing != '' ) {
		$custom .= ".sidebar .widget .widget-title, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6, .sidebar .wp-block-search .wp-block-search__label { letter-spacing:" . $sidebar_widget_title_letter_spacing . ";}" . "\n";
	}


	/*Typography page title*/
	$page_title_fonts_         = themesflat_get_json( 'typography_page_title' );
	$page_title_fonts_family   = $page_title_fonts_['family'];
	$page_title_fonts_size     = $page_title_fonts_['size'];
	$page_title_line_height    = $page_title_fonts_['line_height'];
	$page_title_letter_spacing = $page_title_fonts_['letter_spacing'];
	$page_title_style          = themesflat_font_style( $page_title_fonts_['style'] );
	$page_title_font_weight    = $page_title_style[0];
	$page_title_font_style     = $page_title_style[1];
	// font family
	if ( $page_title_fonts_family != '' ) {
		$custom .= ".page-title .page-title-heading { font-family:" . $page_title_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $page_title_font_weight != '' ) {
		$custom .= ".page-title .page-title-heading { font-weight:" . $page_title_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $page_title_font_style ) ) {
		$custom .= ".page-title .page-title-heading { font-style:" . $page_title_font_style . "; }" . "\n";
	}
	// font size
	if ( $page_title_fonts_size != '' ) {
		$custom .= ".page-title .page-title-heading { font-size:" . intval( $page_title_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $page_title_line_height != '' ) {
		$custom .= ".page-title .page-title-heading { line-height:" . $page_title_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $page_title_letter_spacing != '' ) {
		$custom .= ".page-title .page-title-heading { letter-spacing:" . $page_title_letter_spacing . ";}" . "\n";
	}


	/*Typography page title mobile*/
	$page_title_mobile_fonts_         = themesflat_get_json( 'typography_page_title_mobile' );
	$page_title_mobile_fonts_family   = $page_title_mobile_fonts_['family'];
	$page_title_mobile_fonts_size     = $page_title_mobile_fonts_['size'];
	$page_title_mobile_line_height    = $page_title_mobile_fonts_['line_height'];
	$page_title_mobile_letter_spacing = $page_title_mobile_fonts_['letter_spacing'];
	$page_title_mobile_style          = themesflat_font_style( $page_title_mobile_fonts_['style'] );
	$page_title_mobile_font_weight    = $page_title_mobile_style[0];
	$page_title_mobile_font_style     = $page_title_mobile_style[1];
	$css_page_title_mobile_typo       = '@media only screen and (' . $break_point_1 . ')' . '{';
	// font family
	if ( $page_title_mobile_fonts_family != '' ) {
		$css_page_title_mobile_typo .= ".page-title .page-title-heading { font-family:" . $page_title_mobile_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $page_title_mobile_font_weight != '' ) {
		$css_page_title_mobile_typo .= ".page-title .page-title-heading { font-weight:" . $page_title_mobile_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $page_title_mobile_font_style ) ) {
		$css_page_title_mobile_typo .= ".page-title .page-title-heading { font-style:" . $page_title_mobile_font_style . "; }" . "\n";
	}
	// font size
	if ( $page_title_mobile_fonts_size != '' ) {
		$css_page_title_mobile_typo .= ".page-title .page-title-heading { font-size:" . intval( $page_title_mobile_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $page_title_mobile_line_height != '' ) {
		$css_page_title_mobile_typo .= ".page-title .page-title-heading { line-height:" . $page_title_mobile_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $page_title_mobile_letter_spacing != '' ) {
		$css_page_title_mobile_typo .= ".page-title .page-title-heading { letter-spacing:" . $page_title_mobile_letter_spacing . ";}" . "\n";
	}
	$css_page_title_mobile_typo .= '}';
	$custom                     .= $css_page_title_mobile_typo;

	/*Typography breadcrumb*/
	$breadcrumb_fonts_         = themesflat_get_json( 'typography_breadcrumb' );
	$breadcrumb_fonts_family   = $breadcrumb_fonts_['family'];
	$breadcrumb_fonts_size     = $breadcrumb_fonts_['size'];
	$breadcrumb_line_height    = $breadcrumb_fonts_['line_height'];
	$breadcrumb_letter_spacing = $breadcrumb_fonts_['letter_spacing'];
	$breadcrumb_style          = themesflat_font_style( $breadcrumb_fonts_['style'] );
	$breadcrumb_font_weight    = $breadcrumb_style[0];
	$breadcrumb_font_style     = $breadcrumb_style[1];
	// font family
	if ( $breadcrumb_fonts_family != '' ) {
		$custom .= ".breadcrumbs, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span { font-family:" . $breadcrumb_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $breadcrumb_font_weight != '' ) {
		$custom .= ".breadcrumbs, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span { font-weight:" . $breadcrumb_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $breadcrumb_font_style ) ) {
		$custom .= ".breadcrumbs, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span { font-style:" . $breadcrumb_font_style . "; }" . "\n";
	}
	// font size
	if ( $breadcrumb_fonts_size != '' ) {
		$custom .= ".breadcrumbs, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span { font-size:" . intval( $breadcrumb_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $breadcrumb_line_height != '' ) {
		$custom .= ".breadcrumbs, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span { line-height:" . $breadcrumb_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $breadcrumb_letter_spacing != '' ) {
		$custom .= ".breadcrumbs, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span { letter-spacing:" . $breadcrumb_letter_spacing . ";}" . "\n";
	}

	/*Typography pagination*/
	$pagination_fonts_         = themesflat_get_json( 'typography_pagination' );
	$pagination_fonts_family   = $pagination_fonts_['family'];
	$pagination_fonts_size     = $pagination_fonts_['size'];
	$pagination_line_height    = $pagination_fonts_['line_height'];
	$pagination_letter_spacing = $pagination_fonts_['letter_spacing'];
	$pagination_style          = themesflat_font_style( $pagination_fonts_['style'] );
	$pagination_font_weight    = $pagination_style[0];
	$pagination_font_style     = $pagination_style[1];
	// font family
	if ( $pagination_fonts_family != '' ) {
		$custom .= ".navigation a, .pagination > span, .navigation.paging-navigation span, .page-links a, .page-links > span { font-family:" . $pagination_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $pagination_font_weight != '' ) {
		$custom .= ".navigation a, .pagination > span, .navigation.paging-navigation span, .page-links a, .page-links > span { font-weight:" . $pagination_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $pagination_font_style ) ) {
		$custom .= ".navigation a, .pagination > span, .navigation.paging-navigation span, .page-links a, .page-links > span { font-style:" . $pagination_font_style . "; }" . "\n";
	}
	// font size
	if ( $pagination_fonts_size != '' ) {
		$custom .= ".navigation a, .pagination > span, .navigation.paging-navigation span, .page-links a, .page-links > span { font-size:" . intval( $pagination_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $pagination_line_height != '' ) {
		$custom .= ".navigation a, .pagination > span, .navigation.paging-navigation span, .page-links a, .page-links > span { line-height:" . $pagination_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $pagination_letter_spacing != '' ) {
		$custom .= ".navigation a, .pagination > span, .navigation.paging-navigation span, .page-links a, .page-links > span { letter-spacing:" . $pagination_letter_spacing . ";}" . "\n";
	}

	//GROUP LAYOUT
	$content_controls = themesflat_decode( themesflat_get_opt( 'content_controls' ) );
	themesflat_render_box_position( "#themesflat-content", $content_controls );

	//GROUP TOP BAR
	if ( themesflat_get_opt( 'topbar_background_color' ) != '' ) {
		$custom .= ".themesflat-top { background-color:" . esc_attr( themesflat_get_opt( 'topbar_background_color' ) ) . " !important ; } " . "\n";
	}
	if ( themesflat_get_opt( 'topbar_textcolor' ) != '' ) {
		$custom .= ".themesflat-top { color:" . esc_attr( themesflat_get_opt( 'topbar_textcolor' ) ) . " ;} " . "\n";
	}
	if ( themesflat_get_opt( 'topbar_link_color' ) != '' ) {
		$custom .= ".themesflat-top a { color:" . esc_attr( themesflat_get_opt( 'topbar_link_color' ) ) . " ;} " . "\n";
	}
	if ( themesflat_get_opt( 'topbar_link_color_hover' ) != '' ) {
		$custom .= ".themesflat-top a:hover { color:" . esc_attr( themesflat_get_opt( 'topbar_link_color_hover' ) ) . " ;} " . "\n";
	}

	//Topbar Mobile
	if ( themesflat_get_opt( 'topbar_mobile_background_color' ) != '' ) {
		$custom .= ".topbar-mobile { background-color:" . esc_attr( themesflat_get_opt( 'topbar_mobile_background_color' ) ) . " !important; } " . "\n";
	}
	if ( themesflat_get_opt( 'topbar_mobile_textcolor' ) != '' ) {
		$custom .= ".topbar-mobile { color:" . esc_attr( themesflat_get_opt( 'topbar_mobile_textcolor' ) ) . " !important;} " . "\n";
	}
	if ( themesflat_get_opt( 'topbar_mobile_link_color' ) != '' ) {
		$custom .= ".topbar-mobile a { color:" . esc_attr( themesflat_get_opt( 'topbar_mobile_link_color' ) ) . " !important;} " . "\n";
	}
	if ( themesflat_get_opt( 'topbar_mobile_link_color_hover' ) != '' ) {
		$custom .= ".topbar-mobile a:hover { color:" . esc_attr( themesflat_get_opt( 'topbar_mobile_link_color_hover' ) ) . "  !important;} " . "\n";
	}

	$topbar_controls = themesflat_decode( themesflat_get_opt( 'topbar_controls' ) );
	themesflat_render_box_position( ".themesflat-top .container-inside", $topbar_controls, '', true );

	/*Typography Topbar*/
	$topbar_fonts_         = themesflat_get_json( 'typography_topbar' );
	$topbar_fonts_family   = $topbar_fonts_['family'];
	$topbar_fonts_size     = $topbar_fonts_['size'];
	$topbar_line_height    = $topbar_fonts_['line_height'];
	$topbar_letter_spacing = $topbar_fonts_['letter_spacing'];
	$topbar_style          = themesflat_font_style( $topbar_fonts_['style'] );
	$topbar_font_weight    = $topbar_style[0];
	$topbar_font_style     = $topbar_style[1];

	// font family
	if ( $topbar_fonts_family != '' ) {
		$custom .= ".themesflat-top { font-family:" . $topbar_fonts_family . ";}" . "\n";
	}
	// font weight
	if ( $topbar_font_weight != '' ) {
		$custom .= ".themesflat-top { font-weight:" . $topbar_font_weight . ";}" . "\n";
	}
	// font style
	if ( isset( $topbar_font_style ) ) {
		$custom .= ".themesflat-top { font-style:" . $topbar_font_style . "; }" . "\n";
	}
	// font size
	if ( $topbar_fonts_size != '' ) {
		$custom .= ".themesflat-top { font-size:" . intval( $topbar_fonts_size ) . "px;}" . "\n";
	}
	// line height
	if ( $topbar_line_height != '' ) {
		$custom .= ".themesflat-top { line-height:" . $topbar_line_height . ";}" . "\n";
	}
	// letter spacing
	if ( $topbar_letter_spacing != '' ) {
		$custom .= ".themesflat-top { letter-spacing:" . $topbar_letter_spacing . ";}" . "\n";
	}

	//GROUP HEADER
	$header_backgroundcolor = themesflat_get_opt( 'header_backgroundcolor' );
	if ( $header_backgroundcolor != '' ) {
		$custom .= "#header { background-color:" . esc_attr( $header_backgroundcolor ) . "; !important}" . "\n";
	}

	$header_backgroundcolor_sticky = themesflat_get_opt( 'header_backgroundcolor_sticky' );
	if ( $header_backgroundcolor_sticky != '' ) {
		$custom .= ".header_sticky .header-sticky { background-color:" . esc_attr( $header_backgroundcolor_sticky ) . " !important;}" . "\n";
	}
	//Nav
	$header_color_main_nav = themesflat_get_option( 'header_color_main_nav' );
	if ( $header_color_main_nav != '' ) {
		$root .= ' --theme-color-main-navigation:' . esc_attr( $header_color_main_nav ) . ";\n";
	}

	$header_color_hover_main_nav = themesflat_get_opt( 'header_color_hover_main_nav' );
	if ( $header_color_hover_main_nav != '' ) {
		$root .= ' --theme-color-hover-main-navigation:' . esc_attr( $header_color_hover_main_nav ) . ";\n";
	}

	$header_sticky_color_main_nav = themesflat_get_opt( 'header_sticky_color_main_nav' );
	if ( $header_sticky_color_main_nav != '' ) {
		$root .= ' --theme-header-sticky-color-main-navigation:' . esc_attr( $header_sticky_color_main_nav ) . ";\n";
	}

	$header_sticky_color_hover_main_nav = themesflat_get_opt( 'header_sticky_color_hover_main_nav' );
	if ( $header_sticky_color_hover_main_nav != '' ) {
		$root .= ' --theme-header-sticky-color-hover-main-navigation:' . esc_attr( $header_sticky_color_hover_main_nav ) . ";\n";
	}

	//Subnav a color
	$sub_nav_color = themesflat_get_opt( 'sub_nav_color' );
	if ( $sub_nav_color != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a, #mainnav li.megamenu > ul.sub-menu > .menu-item-has-children > a { color:" . esc_attr( $sub_nav_color ) . ";}" . "\n";
	}
	//Subnav background color
	$sub_nav_background = themesflat_get_opt( 'sub_nav_background' );
	if ( $sub_nav_background != '' ) {
		$custom .= "#mainnav ul.sub-menu { background-color:" . esc_attr( $sub_nav_background ) . ";}" . "\n";
	}

	//sub_nav_color_hover
	$sub_nav_color_hover = themesflat_get_opt( 'sub_nav_color_hover' );
	if ( $sub_nav_color_hover != '' ) {
		$custom .= "#mainnav ul.sub-menu > li > a:hover, #mainnav ul.sub-menu > li.current-menu-item > a, #mainnav-mobi ul li.current-menu-item > a, #mainnav-mobi ul li.current-menu-ancestor > a, #mainnav ul.sub-menu > li.current-menu-ancestor > a, #mainnav-mobi ul li .current-menu-item > a, #mainnav-mobi ul li.current-menu-item .btn-submenu:before, #mainnav-mobi ul li .current-menu-item .btn-submenu:before { color:" . esc_attr( $sub_nav_color_hover ) . ";}" . "\n";
	}

	//sub_nav_border_color
	$sub_nav_border_color = themesflat_get_opt( 'sub_nav_border_color' );
	if ( $sub_nav_border_color != '' ) {
		$custom .= "#mainnav ul.sub-menu > li { border-top-color:" . esc_attr( $sub_nav_border_color ) . ";}" . "\n";
	}

	$logo_width = themesflat_get_opt( 'logo_width' );
	if ( $logo_width != '' ) {
		$custom .= "#header #logo a, .modal-menu__panel-footer .logo-panel a,.header-mobile #logo-mobi a { max-width:" . esc_attr( $logo_width ) . "px;height: auto;}" . "\n";
	}

	$menu_distance_between = themesflat_get_opt( 'menu_distance_between' );
	if ( $menu_distance_between != '' ) {
		$custom .= "#mainnav > ul > li { margin-left:" . esc_attr( $menu_distance_between ) . "px; margin-right:" . esc_attr( $menu_distance_between ) . "px;}" . "\n";
	}

	//GROUP PAGE TITLE
	$page_title_controls = themesflat_decode( themesflat_get_opt( 'page_title_controls' ) );
	themesflat_render_box_position( ".page-title", $page_title_controls );

	$page_title_controls_mobile = themesflat_decode( themesflat_get_opt( 'page_title_controls_mobile' ) );
	themesflat_render_box_position_tablet( ".page-title", $page_title_controls_mobile, $break_point_1 );

	//  Page Title Opacity
	$page_title_background_color = themesflat_get_opt( 'page_title_background_color' );
	if ( ! empty( $page_title_background_color ) ) {
		$custom .= ".page-title .overlay { background: " . esc_attr( $page_title_background_color ) . ";}" . "\n";
	}

	$page_title_background_color_opacity = themesflat_get_opt( 'page_title_background_color_opacity' );
	if ( $page_title_background_color_opacity != '' ) {
		$custom .= ".page-title .overlay { opacity:" . esc_attr( $page_title_background_color_opacity ) . "%; filter:alpha(opacity=" . esc_attr( $page_title_background_color_opacity ) . "); }" . "\n";
	}

	$page_title_img        = themesflat_get_opt( 'page_title_background_image' );
	$page_title_image_size = themesflat_get_opt( 'page_title_image_size' );
	if ( $page_title_img != '' ) {
		$custom .= '.page-title {background-image: url(' . $page_title_img . ');}' . "\n";
		$custom .= '.page-title {background-size: ' . $page_title_image_size . ';}' . "\n";
	}

	$custom .= ".page-title h1 {color:" . themesflat_get_opt( 'page_title_text_color' ) . "!important;}" . "\n";
	$custom .= ".page-title.parallax h1:after, .page-title.video h1:after {background:" . themesflat_get_opt( 'page_title_text_color' ) . ";}" . "\n";

	if ( ! empty( themesflat_get_opt( 'breadcrumb_color' ) ) ) {
		$custom .= ".breadcrumbs span, .breadcrumbs span a, .breadcrumbs a, .breadcrumbs span i, .breadcrumbs span.trail-browse i {color:" . themesflat_get_opt( 'breadcrumb_color' ) . ";}" . "\n";
	}

	//GROUP BODY
	// Body color
	$body_text = themesflat_get_opt( 'body_text_color' );
	if ( $body_text != '' ) {
		$root   .= ' --theme-color-text-main:' . esc_attr( $body_text ) . ";\n";
		$custom .= "body { color:" . esc_attr( $body_text ) . "}" . "\n";
		$custom .= ".themesflat-portfolio .item .category-post a:hover,ul.iconlist .list-title .testimonial-content blockquote,.testimonial-content .author-info,.themesflat_counter.style2 .themesflat_counter-content-right,.themesflat_counter.style2 .themesflat_counter-content-left, .page-links a:focus,.widget_search .search-form input[type=search],.entry-meta ul,.entry-meta ul.meta-right,.entry-footer strong, .themesflat_button_container .themesflat-button.no-background, .portfolio-single .entry-content, article .entry-meta ul li a, .navigation.posts-navigation .nav-links li a .meta-nav, .flat-language ul.unstyled-child li a, .post-meta a { color:" . esc_attr( $body_text ) . "}" . "\n";
		//border bodycolor
		$custom .= ".widget .widget-title:after, .widget .widget-title:before,ul.iconlist li.circle:before { background-color:" . esc_attr( $body_text ) . "}" . "\n";
	}

	// background bodycolor
	if ( themesflat_get_option( 'body_background_color' ) != '' ) {
		$root   .= ' --theme-background-color-main:' . esc_attr( themesflat_get_option( 'body_background_color' ) ) . ";\n";
		$custom .= "body, .page-wrap, .boxed .themesflat-boxed { background-color:" . esc_attr( themesflat_get_option( 'body_background_color' ) ) . " ; } " . "\n";
	}

	//GROUP COLOR
	// Primary color
	$primary_color = themesflat_get_option( 'primary_color' );
	if ( $primary_color != '' ) {
		$root .= ' --theme-primary-color:' . esc_attr( $primary_color ) . ";\n";

		$custom .= "article .entry-title a, .item article .entry-title a, .widget.widget_categories ul li a, .widget.widget_archive ul li a, .widget.widget_pages ul li a, .widget.widget_block .wp-block-archives li a, .widget .wp-block-categories li a, .tags-links a, .logged-in-as a, .blog-single .entry-footer .tags-links a { color:" . esc_attr( $primary_color ) . ";}" . "\n";

		//Sidebar
		$custom .= ".comment-list .comement_reply a:hover, .sidebar .widget_recent_comments ul li, .sidebar .widget.widget_block ol.wp-block-latest-comments li, .sidebar .widget.widget_recent_comments ul li, .sidebar .widget.widget_rss ul li, .sidebar .widget.widget_block ol.wp-block-latest-comments li, .sidebar .wp-block-search .wp-block-search__label { color:" . esc_attr( $primary_color ) . "!important;}" . "\n";

		$custom .= ".tf-posts .blog-post .tf-button:hover, .tf-posts .blog-post .title a, .single-doctor .meta-doctor .social a:hover { color:" . esc_attr( $primary_color ) . ";}" . "\n";

		$custom .= ".modal-menu__panel-body .search-form input[type=\"search\"]:focus { border-color:" . esc_attr( $primary_color ) . "}" . "\n";
	}

	// Secondary color
	$secondary_color = themesflat_get_option( 'secondary_color' );
	if ( $secondary_color != '' ) {
		//color
		$root .= '  --theme-secondary-color:' . esc_attr( $secondary_color ) . ";\n";

		$custom .= "a:hover, .comment-list .comement_reply a, .wp-block-pullquote cite, blockquote em, blockquote em a:hover, blockquote i, blockquote cite, blockquote cite a, article .entry-title a:hover, .navigation.posts-navigation .nav-links a:hover, .widget_calendar table #today:hover, .widget_calendar table #today a:hover, .widget_calendar table tbody tr a:hover, .widget_calendar nav a:hover, article .post-meta .item-meta .meta-icon, article .post-meta .item-meta a:hover, .social-share-article ul li a:hover, .widget.widget-recent-news li .text .post-date i, .widget.widget_latest_news li .text .post-date i, .widget.widget-recent-news li .text h6 a:hover, .widget.widget_latest_news li .text h6 a:hover, .themesflat-services-taxonomy .services-post .post-icon i, .portfolios-post .content .post-meta a:hover, .portfolios-post .content .title a:hover, .project-post .content .post-meta a:hover, .project-post .content .title a:hover, .tf-posts .blog-post .tf-button, .tf-posts .blog-post .title a:hover, .tf-services-wrap.style2 .services-post:hover .post-icon i, .tf-services-wrap.style2 .services-post .tf-button-container a, .breadcrumbs a:hover, .breadcrumbs span a:hover, .breadcrumbs a:hover span, .breadcrumbs span a:hover span, blockquote a:hover, .widget.widget_recent_entries ul li a:hover, .widget.widget_block ul.wp-block-latest-posts li a:hover, #mainnav_canvas ul li.current-menu-item > a, #mainnav_canvas ul li.current_page_item > a, #mainnav_canvas ul li.current-menu-ancestor > a, #mainnav_canvas ul li.current-menu-parent > a, .tags-links a:hover, .logged-in-as a:hover, .comments-area ol.comment-list article .comment_content .comment_meta .comment_author a:hover, .single-portfolios .entry-content .meta-post a:hover, .single-project .entry-content .meta-post a:hover, .services-post .title a:hover, .services-post .tf-button-container a:hover, .info-header .phone:hover, .post-meta a:hover, #mainnav_canvas ul li a:hover, article .entry-title a:hover, .item article .entry-title a:hover, .widget ul li a:hover, .widget ol li a:hover, .sidebar .widget.widget_nav_menu ul li a:hover, .widget.widget_meta ul li a:hover, .tf-posts.style3 .content .post-meta a:hover, .tf-posts.style3 .blog-post .tf-button:hover, .tf-posts.style3 .blog-post .tf-button:hover:after, .tf-posts.style4 .content .post-meta a:hover, .tf-posts.style4 .blog-post .tf-button:hover, .tf-posts.style4 .blog-post .tf-button:hover:after, .wp-block-latest-posts__post-date:before, .doctor-post .content .social a:hover, .doctor-post .title a:hover, footer .widget.widget_categories ul li>a:hover:after, footer .widget.widget_archive ul li>a:hover:after, footer .widget.widget_pages ul li>a:hover:after, footer .widget.widget_meta ul li>a:hover:after { color:" . esc_attr( $secondary_color ) . ";}" . "\n";

		$custom .= ".single-doctor .meta-doctor .phone .post-icon, .single-doctor .meta-doctor .mail .post-icon { color:" . esc_attr( $secondary_color ) . " !important;}" . "\n";

		$custom .= ".tf-services-wrap.style3 .services-post .tf-button-container a, input[type=\"radio\"]:checked:before { background-color:" . esc_attr( $secondary_color ) . ";}" . "\n";

		//sidebar
		$custom .= ".sidebar .widget ul li a:hover, .customizable-carousel .owl-prev:hover, .customizable-carousel .owl-next:hover { color:" . esc_attr( $secondary_color ) . ";}" . "\n";

		$custom .= "mark, ins, .go-top:hover, #commentform .wrap-input-submit, .widget.widget_archive ul li a:hover, .widget.widget_categories ul li a:hover, .widget ul.wp-block-categories li a:hover, .widget.widget_pages ul li a:hover, button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"], .wp-block-file .wp-block-file__button,  .page-links a:hover, .page-links a:focus, .page-links > span, input[type='radio']:checked:before, .block-get-a-quote .overlay-color, .themesflat-top .btn-topbar, .widget_search form button.search-submit, .widget_search .wp-block-search__button, #header.header-style3 .info-header .icon-info, .show-search > a:hover, .header-modal-menu-left-btn:hover, .elementor-widget-container .mc4wp-form input[type=\"submit\"]:hover, .themesflat-action-box .mc4wp-form input[type=\"submit\"]:hover, footer.footer-style1 .widget.widget_nav_menu ul li > a:hover:before, footer.footer-style1 ul.wp-block-latest-posts li > a:hover:before, .block-company-profile { background:" . esc_attr( $secondary_color ) . ";}" . "\n";

		$custom .= ".widget.widget_archive ul li a:hover, .widget.widget_categories ul li a:hover, .widget ul.wp-block-categories li a:hover, .widget.widget_pages ul li a:hover, .single-portfolios .entry-content .meta-post .inner-meta-post, .single-project .entry-content .meta-post .inner-meta-post,  input[type='radio']:checked, #header.header-style3 .info-header .icon-info { border-color:" . esc_attr( $secondary_color ) . ";}" . "\n";

		$custom .= ".draw-border.second-color a:hover, .draw-border.second-color button:hover, #footer a:hover, .wishlist_table span.wishlist-in-stock { color:" . esc_attr( $secondary_color ) . "!important;}" . "\n";
		$custom .= ".draw-border.second-color a:hover::before, .draw-border.second-color a:hover::after, .draw-border.second-color button:hover > span::before, .draw-border.second-color button:hover > span::after, input[type=\"radio\"]:checked, input[type='checkbox']:before, input[type='checkbox']:checked  { border-color:" . esc_attr( $secondary_color ) . " !important;}" . "\n";

		$custom .= ".double-bounce3, .double-bounce4,   .widget .widget-title:after, .widget .tagcloud a:hover, .widget_tag_cloud a:hover, .wp-block-tag-cloud a:hover, .wp-block-group.has-background .wp-block-tag-cloud a:hover, .go-top:hover, .search-form .search-submit, .footer-widgets .widget.widget_themesflat_socials ul li a:hover, .footer .mc4wp-form input[type=\"submit\"]:hover, a.btn.s2:before, .portfolio-filter li.active a, .services-filter li.active a, .project-filter li.active a, .portfolio-filter li a:hover, .services-filter li a:hover, .project-filter li a:hover, .single-portfolios .entry-footer .social-share-article a:hover, .portfolios-post .content .tf-button:hover, .single-project .entry-footer .social-share-article a:hover, .project-post .content .tf-button:hover, .tf-counter.style1:after, .blog-single .entry-footer .tags-links a:hover, ul.custom-icon-list li:before, .wp-block-group.has-background:before, .single-doctor .meta-doctor .social, .doctor-post .content:before, .blog .blog-grid .content-post:before, .blog-grid .content-post:before { background: " . esc_attr( $secondary_color ) . ";}" . "\n";
		//svg
		$custom .= ".info-header .icon-info svg, .themesflat-services-taxonomy .services-post .post-icon svg, .tf-services-wrap.style2 .services-post:hover .post-icon svg { fill:" . esc_attr( $secondary_color ) . "}" . "\n";

	}

	// Accent color
	$accent_color = themesflat_get_option( 'accent_color' );
	if ( $accent_color != '' ) {
		$custom .= "h1, h2, h3, h4, h5, h6 { color:" . esc_attr( $accent_color ) . ";}" . "\n";

		$root .= ' --theme-accent-color:' . esc_attr( $accent_color ) . ";\n";

		$custom .= 'a, .flat-language ul.unstyled-child li a:hover { color:' . esc_attr( $accent_color ) . " }" . "\n";
		$custom .= '#mainnav ul.sub-menu > li > a > span, #mainnav_canvas ul li a > span, .tf-services-wrap.style3 .services-post .post-icon, .tf-services-wrap.style3 .services-post .tf-button-container a:hover, .footer-style-3 footer .widget .widget-title:after, .footer-style-3 footer .widget h2:after, .footer-style-3 footer .wp-block-search .wp-block-search__label:after, .footer-style-4 footer .widget .widget-title:after, .footer-style-4 footer .widget h2:after, .footer-style-4 footer .wp-block-search .wp-block-search__label:after, .dark-form.style2 input[type="submit"]:hover, .dark-form.style2 button:before { background-color:' . esc_attr( $accent_color ) . " }" . "\n";
	}
	if ( $root !== '' ) {
		$custom .= ' :root {' . $root . " }" . "\n";
	}
	$custom = apply_filters( 'themesflat/render/style', $custom );
	wp_add_inline_style( 'themesflat-inline-css', $custom );
}

add_action( 'wp_enqueue_scripts', 'themesflat_custom_styles' );