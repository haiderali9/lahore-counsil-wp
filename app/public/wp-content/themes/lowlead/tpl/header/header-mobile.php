<?php
$header_search_box = themesflat_get_option( 'enable_search_box_mobile' );
?>

<header id="header-mobile" class="header-mobile <?php echo themesflat_get_opt_elementor( 'extra_classes_header' ); ?>">
	<?php get_template_part( 'tpl/topbar-mobile' ); ?>
    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap">
                        <div class="header-ct-left">
							<?php get_template_part( 'tpl/header/brand-mobile' ); ?>
                        </div>
                        <div class="header-ct-right header-customize-mobile">
							<?php if ( $header_search_box == 1 ) : ?>
                                <div class="show-search">
                                    <a href="#"><i class="far fa-search"></i></a>
                                    <div class="submenu top-search widget_search">
										<?php get_search_form(); ?>
                                    </div>
                                </div>
							<?php endif; ?>
                            <div class="btn-menu">
                                <span class="line-1"></span>
                            </div><!-- //mobile menu button -->
                        </div>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="canvas-nav-wrap">
            <div class="overlay-canvas-nav">
                <div class="canvas-menu-close"><span></span></div>
            </div>
            <div class="inner-canvas-nav">
	            <?php get_template_part('tpl/header/brand-menu-mobile'); ?>
                <nav id="mainnav_canvas" class="mainnav_canvas" role="navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'fallback_cb'    => 'themesflat_menu_fallback',
						'container'      => false
					) );
					?>
                </nav><!-- #mainnav_canvas -->
            </div>
        </div><!-- /.canvas-nav-wrap -->
    </div>
</header>