<?php

class Themesflat_Case_Study_Details extends WP_Widget {
	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor
	 *
	 * @return Themesflat_Latest_News
	 */
	function __construct() {
		$this->defaults = array(
			'title' => 'Details',
		);
		parent::__construct(
			'case_study_details',
			esc_html__( 'Themesflat - Case Study Details', 'themesflat' ),
		);
	}

	/**
	 * Display widget
	 */
	function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		extract( $instance );
		extract( $args );
		$id = get_the_ID();

		$classes[]          = 'case-study-details';
		$meta_val_featured  = get_post_meta( $id, 'tf_case_feature', true );
		$meta_val_client    = get_post_meta( $id, 'tf_case_client', true );
		$meta_val_date      = get_post_meta( $id, 'tf_case_date', true );
		$meta_val_case_cost = get_post_meta( $id, 'tf_case_cost', true );
		$meta_val           = get_post_meta( $id, 'tf_case_status', true );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $before_title ) . esc_html( $title ) . wp_kses_post( $after_title );
		}
		?>
        <ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?> clearfix">
            <li class="case-study-details-item">
                <span class="details-label"><?php esc_html_e( 'Feature' ) ?></span>
                <span class="details-value"><?php echo esc_html( $meta_val_featured ) ?></span>
            </li>
            <li class="case-study-details-item">
                <span class="details-label"><?php esc_html_e( 'Client' ) ?></span>
                <span class="details-value"><?php echo esc_html( $meta_val_client ) ?></span>
            </li>
            <li class="case-study-details-item">
                <span class="details-label"><?php esc_html_e( 'Date' ) ?></span>
                <span class="details-value"><?php echo esc_html( $meta_val_date ) ?></span>
            </li>
            <li class="case-study-details-item">
                <span class="details-label"><?php esc_html_e( 'Case Cost' ) ?></span>
                <span class="details-value"><?php echo esc_html( $meta_val_case_cost ).'$' ?></span>
            </li>
            <li class="case-study-details-item">
                <span class="details-label"><?php esc_html_e( 'Status' ) ?></span>
                <span class="details-value"><?php
					switch ( $meta_val ) {
						case '1':
							esc_html_e( 'Pending', 'themesflat' );
							break;
						case '2':
							esc_html_e( 'Processing', 'themesflat' );
							break;
						case '3':
							esc_html_e( 'Completed', 'themesflat' );
							break;
					}
					?></span>
            </li>


        </ul>
		<?php echo wp_kses_post( $after_widget );
	}

	/**
	 * Update widget
	 */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Widget setting
	 */
	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
		<?php
	}
}

add_action( 'widgets_init', 'themesflat_register_case_study_details' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_case_study_details() {
	register_widget( 'Themesflat_Case_Study_Details' );
}