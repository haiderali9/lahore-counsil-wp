<?php
$logo_site = themesflat_get_url_option('site_logo');
$logo_site_sticky = themesflat_get_url_option('site_logo_sticky');
$wrap_classes = array(
    'logo',
);
if (!empty($logo_site_sticky)) {
    $wrap_classes[] = 'has-logo-sticky';
}
$wrap_class = implode(' ', $wrap_classes);
if ($logo_site) : ?>
    <div id="logo" class="<?php echo esc_attr($wrap_class) ?>">
        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
            <?php if (!empty($logo_site)) { ?>
                <img class="site-logo" src="<?php echo esc_url($logo_site); ?>" alt="<?php bloginfo('name'); ?>"/>
            <?php } ?>
            <?php if (!empty($logo_site_sticky)) { ?>
                <img class="site-logo logo-sticky" src="<?php echo esc_url($logo_site_sticky); ?>"
                     alt="<?php bloginfo('name'); ?>"/>
            <?php } ?>
        </a>
    </div>
<?php else : ?>
    <div id="logo" class="logo">
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                  rel="home"><?php bloginfo('name'); ?></a></h1>
        <h2 class="site-description"><?php bloginfo('description'); ?></h2>
    </div><!-- /.site-infomation -->
<?php endif; ?>