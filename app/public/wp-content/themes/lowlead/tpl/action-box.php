<?php if ( is_404() ) {
	return;
} ?>

<?php
$show_action_box = themesflat_get_opt( 'show_action_box' );
if ( themesflat_get_opt_elementor( 'show_action_box' ) != '' ) {
	$show_action_box = themesflat_get_opt_elementor( 'show_action_box' );
}

$action_box_style = themesflat_get_opt( 'action_box_style' );
if ( themesflat_get_opt_elementor( 'action_box_style' ) != '' ) {
	$action_box_style = themesflat_get_opt_elementor( 'action_box_style' );
}

if ( $show_action_box == 1 ):
	?>
	<?php if ( $action_box_style == 'style2' ): ?>
    <div class="action-box themesflat-action-box <?php echo esc_attr( $action_box_style ); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner">
                        <div class="overlay"></div>
                        <div class="heading-wrap">
                            <h2 class="heading"><?php echo themesflat_get_opt( 'heading_action_box' ); ?></h2>
                        </div>
                        <div class="content-right">
							<?php echo do_shortcode( themesflat_get_opt( 'action_box_content_right' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="action-box themesflat-action-box <?php echo esc_attr( $action_box_style ); ?>">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner">
                        <div class="heading-wrap">
                            <h2 class="heading"><?php echo themesflat_get_opt( 'heading_action_box' ); ?></h2>
                            <p><?php echo themesflat_get_opt( 'text_action_box' ); ?></p>
                        </div>
                        <div class="content-right">
							<?php echo do_shortcode( themesflat_get_opt( 'action_box_content_right' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php endif; ?>
