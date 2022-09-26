<?php
/**
 * @package lowlead
 */
$style_header = themesflat_get_opt( 'style_header' );
if ( themesflat_get_opt_elementor( 'style_header' ) != '' ) {
	$style_header = themesflat_get_opt_elementor( 'style_header' );
}

switch ( $style_header ) {
	case 'header-default':
		get_template_part( 'tpl/header/header-default' );
		break;
	case 'header-01':
		get_template_part( 'tpl/header/header-01' );
		break;
	case 'header-02':
		get_template_part( 'tpl/header/header-02' );
		break;
	case 'header-03':
		get_template_part( 'tpl/header/header-03' );
		break;
	case 'header-04':
		get_template_part( 'tpl/header/header-04' );
		break;
	default:
		get_template_part( 'tpl/header/header-default' );
		break;
}
?>
<?php get_template_part( 'tpl/header/header-mobile' ); ?>
