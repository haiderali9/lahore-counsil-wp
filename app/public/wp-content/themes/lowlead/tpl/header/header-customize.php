<?php
$header_search_box = themesflat_get_option('header_search_box');
$header_sidebar_toggler = themesflat_get_option('header_sidebar_toggler');
$header_custom_html_enable = themesflat_get_option('header_custom_html_enable');
$header_custom_html = themesflat_get_option('header_custom_html');
?>

<div class="header-customize">
    <?php if ($header_search_box == 1) : ?>
        <div class="header-customize-item show-search">
            <a href="#"><i class="far fa-search"></i></a>
            <div class="submenu top-search widget_search">
                <?php get_search_form(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($header_sidebar_toggler == 1) : ?>
        <div class="header-customize-item header-modal-menu-left-btn">
            <div class="modal-menu-left-btn">
                <div class="line line--1"></div>
                <div class="line line--2"></div>
                <div class="line line--3"></div>
            </div>
        </div><!-- /.header-modal-menu-left-btn -->
    <?php endif; ?>

    <?php if ($header_custom_html_enable == 1 && $header_custom_html !== '') : ?>
        <div class="header-customize-item header-mini-cart">
            <div class="header-customize-item header-custom-html">
                <?php echo wp_kses($header_custom_html,themesflat_kses_allowed_html()) ?>
            </div>
            <?php get_template_part('tpl/header/mini-cart'); ?>
        </div><!-- /.header-mini-cart -->
    <?php endif; ?>
</div>
