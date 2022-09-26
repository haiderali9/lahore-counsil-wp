<?php
/**
 * Radio Images control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_RadioImages extends WP_Customize_Control {
		public $type = 'radio-images';
		public $choices = array();

		public function render() {
			$id    = 'themesflat-options-control-' . $this->id;
			$class = 'customize-control themesflat-options-control themesflat-options-control-' . $this->type;

			if ( $this->value() ) {
				$this->class = 'active';
			}

			if ( ! empty( $this->class ) ) {
				$class .= " {$this->class}";
			}

			if ( empty( $this->label ) ) {
				$class .= ' no-label';
			}

			?>
            <li id="<?php themesflat_esc_attr( $id ); ?>" class="<?php themesflat_esc_attr( $class ) ?>">
                <h6 class="themesflat-options-control-title themesflat-title-option"> <?php echo themesflat_esc_attr( $this->label ); ?></h6>
				<?php $this->render_content(); ?>
            </li>
			<?php
		}

		public function render_content() {
			$name    = '_options-radio-images-' . $this->id;
			$choices = $this->choices;
			if ( empty( $choices ) ) {
				return;
			}
			?>
            <div class="themesflat-options-control-field">
				<?php foreach ( $choices as $_value => $params ): ?>
                    <label>
                        <input type="radio" value="<?php themesflat_esc_attr( $_value ) ?>"
                               data-target="<?php themesflat_esc_attr( $name ) ?>"
                               name="<?php themesflat_esc_attr( $name ) ?>" <?php $this->link();
						checked( $this->value(), $_value ) ?> />
                        <span data-tooltip="<?php themesflat_esc_attr( $params['tooltip'] ) ?>">
							<img src="<?php echo esc_url( $params['src'] ) ?>"
                                 alt="<?php themesflat_esc_attr( $_value ) ?>"/>
						</span>
                    </label>
				<?php endforeach ?>
            </div>
			<?php
		}
	}

}