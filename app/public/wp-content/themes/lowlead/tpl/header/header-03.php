<?php
$header_search_box = themesflat_get_option( 'header_search_box' );
$header_sidebar_toggler = themesflat_get_option( 'header_sidebar_toggler' );
?>

<?php get_template_part( 'tpl/topbar' ); ?>
<header id="header" class="header header-style3 <?php echo themesflat_get_opt_elementor( 'extra_classes_header' ); ?>">
    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap clearfix">
                        <div class="header-ct-left"><?php get_template_part( 'tpl/header/brand' ); ?></div>
                        <div class="header-ct-center">
							<?php get_template_part( 'tpl/header/navigator' ); ?>

							<?php if ( $header_search_box == 1 ) : ?>
                                <div class="show-search">
                                    <a href="#"><i class="far fa-search"></i></a>
                                    <div class="submenu top-search widget_search">
										<?php get_search_form(); ?>
                                    </div>
                                </div>
							<?php endif; ?>
                        </div>
                        <div class="header-ct-right">

							<?php if ( $header_sidebar_toggler == 1 ) : ?>
                                <div class="header-modal-menu-left-btn">
                                    <div class="modal-menu-left-btn">
                                        <div class="line line--1"></div>
                                        <div class="line line--2"></div>
                                        <div class="line line--3"></div>
                                    </div>
                                </div><!-- /.header-modal-menu-left-btn -->
							<?php endif; ?>

							<?php if ( themesflat_get_opt( 'header_info_phone_text' ) != '' || themesflat_get_opt( 'header_info_phone_number' ) != '' ) : ?>
                                <div class="info-header">
                                    <div class="icon-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.141" height="21.168"
                                             viewBox="0 0 21.141 21.168">
                                            <path id="Icon_zocial-call" data-name="Icon zocial-call"
                                                  d="M3.312,7.1a1.558,1.558,0,0,1,.4-.846L6.88,3.083q.37-.317.555.106L10,8a.692.692,0,0,1-.132.819L8.7,9.981a1.315,1.315,0,0,0-.37.819,4.035,4.035,0,0,0,.819,2.035,17.38,17.38,0,0,0,1.612,2.115l.819.845c.247.247.563.551.952.912a15.957,15.957,0,0,0,1.915,1.427,4.287,4.287,0,0,0,2.1.885,1.151,1.151,0,0,0,.846-.344L18.774,17.3a.581.581,0,0,1,.792-.106l4.626,2.722a.386.386,0,0,1,.211.278.338.338,0,0,1-.106.3l-3.172,3.172a1.553,1.553,0,0,1-.845.4,6.394,6.394,0,0,1-2.921-.357,13.217,13.217,0,0,1-3.012-1.44q-1.388-.9-2.577-1.823t-1.9-1.586L9.181,18.2q-.264-.264-.7-.727T6.959,15.65a26.544,26.544,0,0,1-1.877-2.656,15.5,15.5,0,0,1-1.374-2.947A6.269,6.269,0,0,1,3.312,7.1Z"
                                                  transform="translate(-3.267 -2.947)"/>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <span class="text"><?php echo themesflat_get_opt( 'header_info_phone_text' ); ?></span>
                                        <a class="phone"
                                           href="tel:<?php echo esc_attr( themesflat_get_opt( 'header_info_phone_number' ) ) ?>"><?php echo themesflat_get_opt( 'header_info_phone_number' ); ?></a>
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
    </div>

    <div class="canvas-nav-wrap">
        <div class="overlay-canvas-nav">
            <div class="canvas-menu-close"><span></span></div>
        </div>
        <div class="inner-canvas-nav">
			<?php get_template_part( 'tpl/header/brand-mobile' ); ?>
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
</header><!-- /.header --> 