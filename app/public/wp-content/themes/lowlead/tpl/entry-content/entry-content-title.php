<?php
/**
 * @package lowlead
 */
?>
<div class="entry-box-title clearfix">
    <div class="wrap-entry-title">
		<?php
		if ( is_singular( 'post' ) ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
    </div><!-- /.wrap-entry-title -->
</div>
