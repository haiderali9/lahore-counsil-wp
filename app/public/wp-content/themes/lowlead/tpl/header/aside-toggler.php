<?php
$logo_site = themesflat_get_opt( 'site_logo' );
?>
<div class="modal-menu-left">
    <div class="modal-menu__backdrop"></div>
    <div class="modal-menu__body">
        <button class="modal-menu__close" type="button">
            <i class="fal fa-times"></i>
        </button>
        <div class="modal-menu__panel">
            <div class="modal-menu__panel-header">
                <div class="modal-menu__panel-title">
                </div>
            </div>
            <div class="modal-menu__panel-body">
                <div class="nav-wrap-secondary">
					<?php dynamic_sidebar( 'aside-toggler-sidebar' ); ?>
                </div><!-- /.nav-wrap -->
            </div>
            <div class="modal-menu__panel-footer">
				<?php if ( $logo_site ) : ?>
                    <div class="logo-panel">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
							<?php if ( ! empty( $logo_site ) ) { ?>
                                <img class="site-logo" src="<?php echo esc_url( $logo_site ); ?>"
                                     alt="<?php bloginfo( 'name' ); ?>"/>
							<?php } ?>
                        </a>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>  