<?php
$enable_topbar = themesflat_get_option( 'enable_topbar_mobile' );
if ( $enable_topbar == 0 ) {
	return;
}
$inside_classes = array(
	'container-inside',
);
if ( themesflat_get_opt( 'menu_topbar_mobile' ) == 1 ) {
	$inside_classes[] = 'has-menu-topbar-mobile';
}

if ( themesflat_get_opt( 'social_topbar_mobile' ) == 1 ) {
	$inside_classes[] = 'has-social-topbar-mobile';
}
$inside_class = implode( ' ', $inside_classes );
?>

<!-- Topbar -->
<div class="themesflat-top topbar-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="<?php echo esc_attr( $inside_class ) ?>">
					<?php if ( themesflat_get_opt( 'menu_topbar_mobile' ) == 1 ): ?>
                        <div class="content-item widget-topbar-menu">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'topbar',
								'fallback_cb'    => 'themesflat_menu_fallback',
								'container'      => false
							) );
							?>
                        </div>
					<?php endif; ?>
					<?php if ( themesflat_get_opt( 'social_topbar_mobile' ) == 1 ): ?>
                        <div class="content-item topbar-social">
							<?php themesflat_render_social(); ?>
                        </div>
					<?php endif; ?>
                </div><!-- /.container-inside -->
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.topbar -->
