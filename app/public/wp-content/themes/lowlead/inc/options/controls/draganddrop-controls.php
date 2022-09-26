<?php
// Sorter Control

if ( class_exists( 'WP_Customize_Control' ) ) {
	class themesflat_Control_Drag_And_Drop extends WP_Customize_Control {
		public $type = 'draganddrop-controls';

		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-sortable' );
		}

		public function render_content() { ?>
            <div class="themesflat-sortable">
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( '' != $this->description ) {
						echo '<span class="description customize-control-description">' . $this->description . '</span>'; ?>
					<?php } ?>
                </label>
				<?php
				$choices = $this->choices;
				$values  = $this->value();
				// Turn values into array
				if ( ! is_array( $values ) ) {
					$values = explode( ',', $values );
				}
				echo '<ul id="' . $this->id . '_sortable">'; ?>
				<?php
				foreach ( $values as $val ) :
					$label = isset( $choices[ $val ] ) ? $choices[ $val ] : '';
					if ( $label ) : ?>
                        <li data-value="<?php echo esc_attr( $val ); ?>" class="themesflat-sortable-li">
							<?php echo esc_html( $label ); ?>
                            <span class="themesflat-hide-sortee tf-icon-toggle icon-toggle-on"></span>
                        </li>
					<?php
					endif;
					unset( $choices[ $val ] );
				endforeach;
				foreach ( $choices as $val => $label ) { ?>
                    <li data-value="<?php echo esc_attr( $val ); ?>" class="themesflat-sortable-li themesflat-hide">
						<?php echo esc_html( $label ); ?>
                        <span class="themesflat-hide-sortee tf-icon-toggle icon-toggle-on icon-toggle-off"></span>
                    </li>
				<?php }
				echo '</ul>';
				?>

            </div>
            <div class="clear:both"></div>
			<?php

			if ( is_array( $values ) ) {
				$values = array_keys( $values );
				$values = implode( ',', $values );
			}
			echo '<input id="' . $this->id . '_input" type="hidden" name="' . $this->id . '" value="' . esc_attr( $values ) . '" ' . $this->get_link() . ' />'; ?>
            <script>
				jQuery(document).ready(function ($) {
					"use strict";

					var sortableUl = $('#<?php echo esc_html( $this->id ); ?>_sortable');
					sortableUl.sortable();
					sortableUl.disableSelection();
					sortableUl.on("sortstop", function (event, ui) {
						themesflatUpdateSortableVal();
					});
					sortableUl.find('li').each(function () {
						$(this).find('.themesflat-hide-sortee').on('click', function () {
							$(this).toggleClass('icon-toggle-off').parents('li:eq(0)').toggleClass('themesflat-hide');
						});
					});
					$('#<?php echo esc_html( $this->id ); ?>_sortable span.themesflat-hide-sortee').on('click', function () {
						themesflatUpdateSortableVal();
					});

					function themesflatUpdateSortableVal() {
						var values = [];
						sortableUl.find('li').each(function () {
							if (!$(this).hasClass('themesflat-hide')) {
								values.push($(this).attr('data-value'));
							}
						});
						$('#<?php echo esc_html( $this->id ); ?>_input').val(values).trigger('change');
					}
				});
            </script>
			<?php
		}
	}
}