<?php
/**
 * Multi Images control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class themesflat_MultiImages extends WP_Customize_Control {
		public $type = 'multi-image';
		protected $inputId = '';
		protected $thumbnailsId = '';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$this->inputId      = $this->type . '-control-' . $this->id;
			$this->thumbnailsId = $this->inputId . '-thumbnails';
		}

		public function enqueue() {
			wp_enqueue_media();
		}

		public function render_content() {
			$imageSrcs = explode( ',', $this->value() );
			if ( ! is_array( $imageSrcs ) ) {
				$imageSrcs = array();
			}
			$this->theTitle();
			$this->theButtons();
			$this->theUploadedImages( $imageSrcs );
		}

		protected function theTitle() {
			?>
            <label>
	            <span class="customize-control-title">
	                <?php echo esc_html( $this->label ); ?>
	            </span>
            </label>
			<?php
		}

		public function theButtons() {
			?>
            <div>
                <input type="hidden"
                       value="<?php echo esc_attr( $this->value() ); ?>" <?php esc_url( $this->link() ); ?>
                       id="<?php echo esc_attr( $this->inputId ); ?>"
                       data-thumbs-container="#<?php echo esc_attr( $this->thumbnailsId ); ?>"
                       class="multi-images-control-input"/>
                <a href="#" class="button-secondary multi-images-upload"
                   data-store="#<?php echo esc_attr( $this->inputId ); ?>">
					<?php echo 'Upload'; ?>
                </a>
                <a href="#" class="button-secondary multi-images-remove"
                   data-store="#<?php echo esc_attr( $this->inputId ); ?>"
                   data-thumbs-container="#<?php echo esc_attr( $this->thumbnailsId ); ?>">
					<?php echo 'Remove images'; ?>
                </a>
            </div>
			<?php
		}

		public function theUploadedImages( $srcs = array() ) {
			?>
            <div class="customize-control-content">
				<?php if ( is_array( $srcs ) ): ?>

                    <ul class="thumbnails" data-store="#<?php echo esc_attr( $this->inputId ); ?>"
                        id="<?php echo esc_attr( $this->thumbnailsId ); ?>">
						<?php foreach ( $srcs as $src ): ?>
							<?php if ( ! empty( $src ) ): ?>
                                <li class="thumbnail" style="background-image: url(<?php echo esc_url( $src ); ?>);"
                                    data-src="<?php echo esc_url( $src ); ?>">
                                </li>
							<?php endif; ?>
						<?php endforeach; ?>
                    </ul>
				<?php endif; ?>
            </div>
			<?php
		}
	}

}