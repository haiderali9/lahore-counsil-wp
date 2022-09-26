<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package lowlead
 */

get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="primary" class="fullwidth-404">
                    <main id="main" class="site-main" role="main">
                        <section class="error-404 not-found">
                            <div class="error-box-404 vertical-center">
                                <div class="error-box text-center">
                                    <div class="error-404-text">
                                        <h2 class="bg-404 clip-text"><?php esc_html_e( '404', 'lowlead' ); ?></h2>
                                        <h4>
                                            <span><?php esc_html_e( 'Oops!', 'lowlead' ); ?></span> <?php esc_html_e( ' That page can’t be found.', 'lowlead' ); ?>
                                        </h4>
                                    </div>

                                    <div class="wrap-button-404">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                           class="themesflat-button"><?php esc_html_e( 'Back To Home Page', 'lowlead' ) ?></a>
                                    </div>
                                </div>
                            </div>
                        </section><!-- .error-404 -->
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div>

<?php get_footer(); ?>