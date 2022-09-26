<?php
/**
 * Select control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_DropdownSidebars extends WP_Customize_Control {
		public $type = 'dropdown';

		public function render_content() {
			global $wp_registered_sidebars;
			$name          = "_options-sidebar-$this->id";
			$sidebars      = array();
			$sidebars['0'] = esc_html__( '&mdash; Select &mdash;', 'lowlead' );
			?>
            <label>
                <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                <select name="<?php themesflat_esc_attr( $name ) ?>" <?php $this->link(); ?>>
					<?php
					foreach ( $wp_registered_sidebars as $sidebar ) {
						$selected = ( strcmp( $this->value(), $sidebar['id'] ) == 0 ? 1 : 0 );
						printf( '<option value="%1$s" %2$s>%3$s</option>', $sidebar['id'], selected( $selected ), $sidebar['name'] );
					}
					?>
                </select>
            </label>
			<?php
			return $sidebars;
		}
	}
}