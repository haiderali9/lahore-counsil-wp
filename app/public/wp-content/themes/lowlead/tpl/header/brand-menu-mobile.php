<?php
$logo_site = themesflat_get_url_option( 'site_logo_mobile' );
if ( $logo_site ) : ?>
	<div id="logo-menu-mobi" class="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
			<?php if ( ! empty( $logo_site ) ) { ?>
				<img class="site-logo" src="<?php echo esc_url( $logo_site ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
			<?php } ?>
		</a>
	</div>
<?php else : ?>
	<div id="logo-menu-mobi" class="logo">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
		                          rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div><!-- /.site-infomation -->
<?php endif; ?>