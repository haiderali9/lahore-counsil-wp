<?php
/**
 * Box control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_Number extends WP_Customize_Control {
		public $type = 'number';

		public function render_content() {
			$name = "_options-box-control-$this->id";
			$id   = $this->id; ?>
            <label>
				<?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
                <input type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?>
                       value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </label>
			<?php
		}
	}
}