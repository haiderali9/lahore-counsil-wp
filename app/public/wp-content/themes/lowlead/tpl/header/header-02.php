<header id="header"
        class="header header-style-02 <?php echo themesflat_get_opt_elementor( 'extra_classes_header' ); ?>">
	<?php get_template_part( 'tpl/topbar' ); ?>
    <div class="inner-header">
        <div class="container position-relative">
            <div class="row">
                <div class="header-ct-top col-12">
                    <div class="header-ct-inner">
                        <div class="header-ct-left">
							<?php get_template_part( 'tpl/header/brand' ); ?>
                        </div>
                        <div class="header-ct-right">
							<?php get_template_part( 'tpl/header/info' ); ?>
                        </div>
                    </div>
                </div>
                <div class="header-ct-bottom col-12">
                    <div class="header-ct-inner">
                        <div class="header-ct-left">
							<?php get_template_part( 'tpl/header/navigator' ); ?>
                        </div>
                        <div class="header-ct-right">
							<?php get_template_part( 'tpl/header/header-customize' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </div>
</header><!-- /.header -->