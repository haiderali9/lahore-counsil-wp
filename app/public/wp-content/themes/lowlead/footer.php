<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lowlead
 */
?>
</div><!-- #content -->
</div><!-- #main-content -->

<?php
$footer_wrap_classes = array(
	'footer_background',
	themesflat_get_opt_elementor( 'extra_classes_footer' ),
);
/*if ( themesflat_get_option( 'footer_border_top' ) == true ) {
	$footer_wrap_classes[] = 'border-top';
}*/
//get_template_part( 'tpl/partner' );

?>

<!-- Start Footer -->
<div class="<?php echo esc_attr( join( ' ', $footer_wrap_classes ) ); ?>">
    <!-- Bottom -->
	<?php if ( themesflat_get_opt( 'show_bottom' ) == 1 ): ?>
		<?php get_template_part( 'tpl/footer/bottom' ); ?>
	<?php endif; ?>

</div> <!-- Footer Background Image -->
<!-- End Footer -->
</div><!-- /#boxed -->
<?php wp_footer(); ?>
</body>
</html>