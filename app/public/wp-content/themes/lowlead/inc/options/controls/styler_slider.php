<?php
/**
 * styler_slider
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_Slide_Control extends WP_Customize_Control {
		public $type = 'slide-control';

		public function render_content() {
			?>
            <div class="slider-custom-control">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number"
                                                                                                           id="<?php echo esc_attr( $this->id ); ?>"
                                                                                                           name="<?php echo esc_attr( $this->id ); ?>"
                                                                                                           value="<?php echo esc_attr( $this->value() ); ?>"
                                                                                                           class="customize-control-slider-value" <?php $this->link(); ?> />
                <div class="slider-control" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>"
                     slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>"
                     slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div>
                <span class="slider-reset dashicons dashicons-image-rotate"
                      slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
            </div>
			<?php
		}
	}

}

