<?php
/**
 * Select control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_DropdownPages extends WP_Customize_Control {
		public $type = 'dropdown';

		public function render_content() {
			$pages = get_pages();
			$name  = "_options-sidebar-$this->id";

			?>
            <label>
                <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                <select name="<?php themesflat_esc_attr( $name ) ?>" <?php $this->link(); ?>>
					<?php
					printf( '<option value="">None</option>' );
					foreach ( $pages as $page ) {
						$content = $page->post_content;
						if ( ! empty( $content ) ):
							$selected = ( strcmp( $this->value(), $page->ID ) == 0 ? 1 : 0 );
							printf( '<option value="%1$s" %2$s>%3$s</option>', $page->ID, selected( $selected ), $page->post_title );
						endif;
					}
					?>
                </select>
            </label>
			<?php
		}
	}
}