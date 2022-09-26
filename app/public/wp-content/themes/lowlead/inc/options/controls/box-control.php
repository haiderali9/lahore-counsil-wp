<?php
/**
 * Box control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_BoxControls extends WP_Customize_Control {
		public $type = 'box-controls';

		public function render() {
			$id    = 'themesflat-options-control-' . $this->id;
			$class = 'themesflat-options-control themesflat-options-control-' . $this->type;

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
			$name = "_options-box-control-$this->id";
			$id   = $this->id;
			themesflat_render_box_control( $name, $this->value(), $id );
		}
	}
}