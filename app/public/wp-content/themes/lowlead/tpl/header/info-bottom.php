<?php
$style_header = themesflat_get_option( 'style_header' );
?>

<!-- /.topbar -->
<div class="themesflat-header-info">
    <div class="container">
        <div class="header-info-inner">
			<?php if ( themesflat_get_opt( 'header_info_time_label' ) != '' || themesflat_get_opt( 'header_info_time' ) != '' ) : ?>
                <div class="header-info-item info-time">
					<?php if ( themesflat_get_opt( 'header_info_time_label' ) != '' ): ?>
                        <span class="info-label"><?php echo wp_kses( themesflat_get_opt( 'header_info_time_label' ), themesflat_kses_allowed_html() ); ?></span>
					<?php endif; ?>
					<?php if ( themesflat_get_opt( 'header_info_time' ) != '' ): ?>
                        <span class="info-content"><?php echo esc_attr( themesflat_get_opt( 'header_info_time' ) ); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php if ( themesflat_get_opt( 'header_info_phone_label' ) != '' || themesflat_get_opt( 'header_info_phone_number' ) != '' ) : ?>
                <div class="header-info-item info-phone">
					<?php if ( themesflat_get_opt( 'header_info_phone_label' ) != '' ): ?>
                        <span class="info-label"><?php echo wp_kses( themesflat_get_opt( 'header_info_phone_label' ), themesflat_kses_allowed_html() ); ?></span>
					<?php endif; ?>
					<?php if ( themesflat_get_opt( 'header_info_phone_number' ) != '' ): ?>
                        <span class="info-content"><?php echo esc_attr( themesflat_get_opt( 'header_info_phone_number' ) ); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php if ( themesflat_get_opt( 'header_info_email_label' ) != '' || themesflat_get_opt( 'header_info_email' ) != '' ) : ?>
                <div class="header-info-item info-email">
					<?php if ( themesflat_get_opt( 'header_info_email_label' ) != '' ): ?>
                        <span class="info-label"><?php echo wp_kses( themesflat_get_opt( 'header_info_email_label' ), themesflat_kses_allowed_html() ); ?></span>
					<?php endif; ?>
					<?php if ( themesflat_get_opt( 'header_info_email' ) != '' ): ?>
                        <span class="info-content"><?php echo esc_attr( themesflat_get_opt( 'header_info_email' ) ); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
        </div>
    </div><!-- /.container -->
</div>