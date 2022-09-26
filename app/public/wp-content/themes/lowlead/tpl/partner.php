<?php if ( is_page() || is_page_template( 'tpl/front-page.php' ) || is_404() || get_page_template_slug( get_queried_object_id() ) == 'elementor_header_footer' ) {
	return;
}
$show_partner = themesflat_get_opt( 'show_partner' );
$img_partner  = explode( ',', themesflat_get_opt( 'img_partner' ) );
if ( $show_partner == 1 && themesflat_get_opt( 'img_partner' ) != '' ):
	?>
    <div class="partner-box themesflat-partner-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="customizable-carousel owl-carousel owl-theme" data-loop="true"
                         data-items="<?php echo esc_attr( themesflat_get_opt( 'show_number_img_partner_desktop' ) ); ?>"
                         data-md-items="<?php echo esc_attr( themesflat_get_opt( 'show_number_img_partner_desktop' ) ); ?>"
                         data-sm-items="<?php echo esc_attr( themesflat_get_opt( 'show_number_img_partner_tablet' ) ); ?>"
                         data-xs-items="<?php echo esc_attr( themesflat_get_opt( 'show_number_img_partner_mobile' ) ); ?>"
                         data-space="<?php echo esc_attr( themesflat_get_opt( 'gap_img_partner' ) ); ?>"
                         data-autoplay="true" data-autospeed="4000" data-nav-dots="false" data-nav-arrows="false">
						<?php
						foreach ( $img_partner as $image ) {
							$title = get_the_title( themesflat_get_image_id_by_url( $image ), '_wp_attachment_image_alt', true );
							if ( $title !== '' ) {
								echo '<div class="item-client"><img src="' . esc_attr( $image ) . '" alt="' . esc_attr( $title ) . '"></div>';
							} else {
								echo '<div class="item-client"><img src="' . esc_attr( $image ) . '" alt="' . esc_attr__( "Client Logo", "lowlead" ) . '"></div>';
							}
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>