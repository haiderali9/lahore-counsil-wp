<?php
$show_footer_info = themesflat_get_opt( 'show_footer_info' );
if ( themesflat_get_opt_elementor( 'show_footer_info' ) != '' ) {
	$show_footer_info = themesflat_get_opt_elementor( 'show_footer_info' );
}

if ( $show_footer_info == 1 ) :
	?>
    <div class="info-footer">
        <div class="container">
            <div class="wrap-info-item">
                <div class="info-item">
                    <div class="wrap-address wrap-info">
                        <div class="icon-info">
                            <i class="carenow-icon-icon-pin1"></i>
                        </div>
                        <div class="content">
                            <span class="text"><?php echo themesflat_get_opt( 'footer_info_text_address' ); ?></span>
                            <span class="info"><?php echo themesflat_get_opt( 'footer_info_address' ); ?></span>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="wrap-mail wrap-info">
                        <div class="icon-info">
                            <i class="carenow-icon-icon-mail1"></i>
                        </div>
                        <div class="content">
                            <span class="text"><?php echo themesflat_get_opt( 'footer_info_text_mail' ); ?></span>
                            <span class="info"><?php echo themesflat_get_opt( 'footer_info_mail' ); ?></span>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="wrap-phone wrap-info">
                        <div class="icon-info">
                            <i class="carenow-icon-icon-center1"></i>
                        </div>
                        <div class="content">
                            <span class="text"><?php echo themesflat_get_opt( 'footer_info_text_phone' ); ?></span>
                            <span class="info"><?php echo themesflat_get_opt( 'footer_info_phone' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>