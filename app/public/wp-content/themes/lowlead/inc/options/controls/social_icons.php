<?php
/**
 * This class will be present an social icons control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_SocialIcons extends WP_Customize_Control {
		/**
		 * The control type
		 *
		 * @var  string
		 */
		public $type = 'social-icons';

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
				<?php $this->render_content(); ?>
            </li>
			<?php
		}

		public function render_content() {
			$name  = '_options-social-icons-' . $this->id;
			$icons = themesflat_available_social_icons();

			$value = $this->value();
			$order = $icons['__ordering__'];

			if ( ! is_array( $value ) ) {
				$decoded_value = json_decode( str_replace( '&quot;', '"', $value ), true );
				$value         = is_array( $decoded_value ) ? $decoded_value : array();
			}

			if ( isset( $value['__ordering__'] ) && is_array( $value['__ordering__'] ) ) {
				$order = $value['__ordering__'];
			}

			?>
            <label class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
            <ul class="themesflat_icons">
                <li class="item-properties">
                    <label>
                        <span class="input-title"></span>
                        <input type="text" class="input-field"/>
                    </label>
                    <button type="button" class="button button-primary confirm"><i class="tf_social_icon-check"></i>
                    </button>
                </li>

				<?php foreach ( $order as $id ):
					$params = $icons[ $id ];
					$link = isset( $value[ $id ] ) ? sprintf( 'data-link="%s"', esc_attr( $value[ $id ] ) ) : '';
					?>
                    <li class="item flat-<?php themesflat_esc_attr( $id ) ?>"
                        data-id="<?php themesflat_esc_attr( $id ) ?>" <?php themesflat_esc_attr( $link ) ?>
                        data-title="<?php themesflat_esc_attr( $params['title'] ) ?>">
                        <i class="tf_social_icon-<?php themesflat_esc_attr( $params['iclass'] ) ?>"></i>
                    </li>
				<?php endforeach ?>
            </ul>
            <input type="hidden" id="typography-value"
                   name="<?php themesflat_esc_attr( $name ); ?>" <?php $this->link(); ?>
                   value="<?php themesflat_esc_attr( json_encode( $this->value() ) ) ?>"/>
			<?php
		}
	}
}