<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

class TFGallery_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tfgallery';
	}

	public function get_title() {
		return esc_html__( 'TF Gallery', 'themesflat-elementor' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}


	protected function register_controls() {
		// Start Accordion
		$this->start_controls_section(
			'section_gallery',
			[
				'label' => esc_html__( 'Gallery', 'themesflat-elementor' ),
			]
		);
		$this->add_control(
			'widget_title', [
				'label'       => esc_html__( 'Title', 'ube' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Memberships', 'themesflat-elementor' )
			]
		);
		$this->add_control(
			'gallery',
			[
				'label'   => esc_html__( 'Add Images', 'ube' ),
				'type'    => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image_size',
				// Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default'   => 'large',
				'separator' => 'none',
			]
		);

		$this->add_responsive_control(
			'number_column',
			[
				'label'           => esc_html__( 'Column', 'ube' ),
				'type'            => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default'  => '2',
				'mobile_default'  => '1',
				'options'         => [
					''   => esc_html__( 'Auto', 'ube' ),
					'1'  => esc_html__( '1', 'ube' ),
					'2'  => esc_html__( '2', 'ube' ),
					'3'  => esc_html__( '3', 'ube' ),
					'4'  => esc_html__( '4', 'ube' ),
					'5'  => esc_html__( '5', 'ube' ),
					'6'  => esc_html__( '6', 'ube' ),
					'12' => esc_html__( '12', 'ube' ),
				],
			]
		);

		$this->add_responsive_control(
			'column_gap',
			[
				'label'      => esc_html__( 'Spacing', 'ube' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .tf-widget-gallery .tf-gallery-list'               => '--tf-gallery-gap:{{SIZE}}{{UNIT}};',
				],
				'separator'  => 'after'
			]
		);

		$this->end_controls_section();
		// /.End Content Style
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();

		?>
        <div class="tf-elementor-widget tf-widget-gallery">
            <h3 class="widget-title">
				<?php echo esc_html( $settings['widget_title'] ) ?>
            </h3>
            <div class="widget-content">
                <div class="tf-gallery-list row">
					<?php foreach ( $settings['gallery'] as $i => $item ):
						$column_classes = array();
						$column_classes[] = 'tf-gallery-item';
						if ( ! empty( $settings['number_column_mobile'] ) ) {
							if ( $settings['number_column_mobile'] != '5' ) {
								$grid_mb          = 12 / intval( $settings['number_column_mobile'] );
								$column_classes[] = 'col-' . $grid_mb;
							} elseif ( $settings['number_column_mobile'] == '5' ) {
								$column_classes[] = 'tf-col-custom-5';
							}
						}else{
							$column_classes[]='col-auto';
						}
						if ( ! empty( $settings['number_column_tablet'] ) ) {
							if ( $settings['number_column_tablet'] != '5' ) {
								$grid_tb          = 12 / intval( $settings['number_column_tablet'] );
								$column_classes[] = 'col-md-' . $grid_tb;
							} elseif ( $settings['number_column_tablet'] == '5' ) {
								$column_classes[] = 'tf-col-md-custom-5';
							}
						}else{
							$column_classes[]='col-md-auto';
						}

						if ( ! empty( $settings['number_column'] ) ) {
							if ( $settings['number_column'] != '5' ) {
								$grid             = 12 / intval( $settings['number_column'] );
								$column_classes[] = 'col-lg-' . $grid;
							} elseif ( $settings['number_column'] == '5' ) {
								$column_classes[] = 'tf-col-lg-custom-5';
							}
						}else{
							$column_classes[]='col-lg-auto';
						}
						$item_setting_key = $this->get_repeater_setting_key( 'gallery_item', 'gallery', $i );
						$this->add_render_attribute( $item_setting_key, 'class', $column_classes );
						?>
                        <div <?php echo $this->get_render_attribute_string( $item_setting_key ) ?>>
							<?php
							$image_url  = Elementor\Group_Control_Image_Size::get_attachment_image_src( $item['id'], 'image_size', $settings );
							$image_meta = tf_get_img_meta( $item['id'] );

							?>
                            <img src="<?php echo esc_url( $image_url ) ?>"
                                 alt="<?php echo esc_attr( $image_meta['alt'] ) ?>">
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
		<?php
	}

}