<?php
$wrap_classes = array(
    'header',
    'header-style-01',
    themesflat_get_opt_elementor('extra_classes_header'),
);

$wrap_class = implode(' ', $wrap_classes);
?>

<header id="header" class="<?php echo esc_attr($wrap_class) ?>">
    <?php get_template_part('tpl/topbar'); ?>
    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap clearfix">
                        <div class="header-ct-left">
                            <div class="content-item header-ct-left">
                                <?php get_template_part('tpl/header/brand'); ?>
                            </div>
                        </div>
                        <div class="header-ct-right">
                            <?php get_template_part('tpl/header/navigator'); ?>
                            <?php get_template_part('tpl/header/header-customize'); ?>
                        </div>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
</header><!-- /.header -->