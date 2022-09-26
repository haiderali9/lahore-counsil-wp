<?php
$style_header = themesflat_get_option('topbar_enabled');
$enable_leftInfo = themesflat_get_option('infoLeft_topbar_enabled');
$enable_rightInfo = themesflat_get_option('infoRight_topbar_enabled');

$wrap_classes = array(
    'themesflat-top',
);
if ($enable_rightInfo == 1) {
    $wrap_classes[] = 'has-infoRight-topbar';
}
$wrap_class = implode(' ', $wrap_classes);
?>

<!-- Topbar -->
<?php if ($style_header == 1): ?>
    <div class="<?php echo esc_attr($wrap_class) ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inside">
                        <div class="content-left">
                            <?php if ($enable_leftInfo == 1 && themesflat_get_option('infoLeft_topbar') != '') : ?>
                                <div class="infoLeft-topbar content-item header-ct-left">
                                    <span class="text"><?php echo themesflat_get_option('infoLeft_topbar'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div><!-- content-left -->
                        <div class="content-right">
                            <?php if (themesflat_get_opt('social_topbar') == 1): ?>
                                <div class="content-item topbar-social">
                                    <?php themesflat_render_social(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($enable_rightInfo == 1 && themesflat_get_option('infoRight_topbar_enabled') != '') : ?>
                                <div class="content-item infoRight-topbar">
                                    <span class="text"><?php echo themesflat_get_option('infoRight_topbar'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div><!-- content-right -->
                    </div><!-- /.container-inside -->
                </div>
            </div>
        </div><!-- /.container -->
    </div>
<?php endif; ?>
<!-- /.topbar -->
