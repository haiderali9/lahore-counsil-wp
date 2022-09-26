<?php
/**
 * ColorOverlay
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_ColorOverlay extends WP_Customize_Control {

		public $type = 'alpha-color';

		public function render_content() {
			?>
			<?php
			if ( isset( $this->label ) && '' !== $this->label ) {
				echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
			}
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
			} ?>
            <label>
                <input class="alpha-color-control" type="text" data-show-opacity="true" data-palette="true"
                       data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?> />
            </label>
			<?php
		}

	}
}