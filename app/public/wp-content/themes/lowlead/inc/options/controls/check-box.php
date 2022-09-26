<?php
/**
 * Checkbox control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_Checkbox extends WP_Customize_Control {
		public $type = 'checkbox';

		public function render_content() {
			?>
            <div class="checkbox_switch">
                <div class="onoffswitch">
                    <input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>"
                           name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox"
                           value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link();
					checked( $this->value() ); ?>>
                    <label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
                </div>
                <span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
                <p><?php echo wp_kses( $this->description, themesflat_kses_allowed_html() ); ?></p>
            </div>
			<?php
		}
	}
}