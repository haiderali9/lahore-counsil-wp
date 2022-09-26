<?php
$email_label = themesflat_get_opt( 'header_info_email_label' );
$email       = themesflat_get_opt( 'header_info_email' );
$time_label  = themesflat_get_opt( 'header_info_time_label' );
$time        = themesflat_get_opt( 'header_info_time' );
$phone       = themesflat_get_opt( 'header_info_phone_number' );
?>
<div class="header-info">
	<?php if ( $email_label !== '' || $email !== '' ) : ?>
        <div class="header-info-item header-info-email">
            <div class="header-info-icon">
                <i class="fal fa-envelope"></i>
            </div>
            <div class="header-info-content">
                <p class="header-info-label"><?php echo wp_kses( $email_label, themesflat_kses_allowed_html() ); ?></p>
                <p class="header-info-value mb-0"><?php echo wp_kses( $email, themesflat_kses_allowed_html() ); ?></p>
            </div>
        </div>
	<?php endif; ?>
	<?php if ( $time_label !== '' || $time !== '' ) : ?>
        <div class="header-info-item header-info-time">
            <div class="header-info-icon">
                <i class="fal fa-clock"></i>
            </div>
            <div class="header-info-content">
                <p class="header-info-label"><?php echo wp_kses( $time_label, themesflat_kses_allowed_html() ); ?></p>
                <p class="header-info-value mb-0"><?php echo wp_kses( $time, themesflat_kses_allowed_html() ); ?></p>
            </div>
        </div>
	<?php endif; ?>
	<?php if ( $phone !== '' ) : ?>
        <div class="header-info-item header-info-phone">
            <p class="header-info-value mb-0"><?php echo wp_kses( $phone, themesflat_kses_allowed_html() ); ?></p>
        </div>
	<?php endif; ?>
</div>