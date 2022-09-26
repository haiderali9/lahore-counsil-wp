<div class="nav-wrap">
    <nav id="mainnav" class="mainnav" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'fallback_cb'    => 'themesflat_menu_fallback',
			'container'      => false
		) );
		?>
    </nav><!-- #site-navigation -->
</div><!-- /.nav-wrap -->   