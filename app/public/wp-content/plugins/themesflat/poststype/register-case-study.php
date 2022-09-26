<?php
add_action( 'init', 'themesflat_register_case_study_post_type' );
/**
 * Register Case Study post type
 */
function themesflat_register_case_study_post_type() {
	$case_study_slug = 'case-study';
	$labels          = array(
		'name'               => esc_html__( 'Case Study', 'themesflat' ),
		'singular_name'      => esc_html__( 'Case Study', 'themesflat' ),
		'menu_name'          => esc_html__( 'Case Study', 'themesflat' ),
		'add_new'            => esc_html__( 'New Case Study', 'themesflat' ),
		'add_new_item'       => esc_html__( 'Add New Case Study', 'themesflat' ),
		'new_item'           => esc_html__( 'New Case Study Item', 'themesflat' ),
		'edit_item'          => esc_html__( 'Edit Case Study Item', 'themesflat' ),
		'view_item'          => esc_html__( 'View Case Study', 'themesflat' ),
		'all_items'          => esc_html__( 'All Case Study', 'themesflat' ),
		'search_items'       => esc_html__( 'Search Case Study', 'themesflat' ),
		'not_found'          => esc_html__( 'No Case Study Items Found', 'themesflat' ),
		'not_found_in_trash' => esc_html__( 'No Case Study Items Found In Trash', 'themesflat' ),
		'parent_item_colon'  => esc_html__( 'Parent Case Study:', 'themesflat' ),

	);
	$args            = array(
		'labels'       => $labels,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor' ),
		'rewrite'      => array( 'slug' => $case_study_slug ),
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => true
	);
	register_post_type( 'case_study', $args );
	flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_case_study_updated_messages' );
/**
 * Case Study update messages.
 */
function themesflat_case_study_updated_messages( $messages ) {
	Global $post, $post_ID;
	$messages[ esc_html__( 'case_study' ) ] = array(
		0  => '',
		1  => sprintf( esc_html__( 'Case Study Updated. <a href="%s">View case_study</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),
		2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),
		3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),
		4  => esc_html__( 'Case Study Updated.', 'themesflat' ),
		5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Case Study Restored To Revision From %s', 'themesflat' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => sprintf( esc_html__( 'Case Study Published. <a href="%s">View Case Study</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),
		7  => esc_html__( 'Case Study Saved.', 'themesflat' ),
		8  => sprintf( esc_html__( 'Case Study Submitted. <a target="_blank" href="%s">Preview Case Study</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9  => sprintf( esc_html__( 'Case Study Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Case Study</a>', 'themesflat' ), date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( esc_html__( 'Case Study Draft Updated. <a target="_blank" href="%s">Preview Case Study</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

add_action( 'init', 'themesflat_register_case_study_taxonomy' );
/**
 * Register project taxonomy
 */
function themesflat_register_case_study_taxonomy() {
	/*Case Study Categories*/
	$case_study_cat_slug = 'case_study_category';
	$labels              = array(
		'name'                  => esc_html__( 'Case Study Categories', 'themesflat' ),
		'singular_name'         => esc_html__( 'Categories', 'themesflat' ),
		'search_items'          => esc_html__( 'Search Categories', 'themesflat' ),
		'menu_name'             => esc_html__( 'Categories', 'themesflat' ),
		'all_items'             => esc_html__( 'All Categories', 'themesflat' ),
		'parent_item'           => esc_html__( 'Parent Categories', 'themesflat' ),
		'parent_item_colon'     => esc_html__( 'Parent Categories:', 'themesflat' ),
		'new_item_name'         => esc_html__( 'New Categories Name', 'themesflat' ),
		'add_new_item'          => esc_html__( 'Add New Categories', 'themesflat' ),
		'edit_item'             => esc_html__( 'Edit Categories', 'themesflat' ),
		'update_item'           => esc_html__( 'Update Categories', 'themesflat' ),
		'add_or_remove_items'   => esc_html__( 'Add or remove Categories', 'themesflat' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Categories', 'themesflat' ),
		'not_found'             => esc_html__( 'No Categories found.' ),
	);
	$args                = array(
		'labels'       => $labels,
		'rewrite'      => array( 'slug' => $case_study_cat_slug ),
		'hierarchical' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'case_study_category', 'case_study', $args );
	flush_rewrite_rules();
}

add_action( 'add_meta_boxes', 'themesflat_case_study_add_meta_box' );
function themesflat_case_study_add_meta_box() {
	add_meta_box( 'tf_case_study_meta', esc_html__( 'Addition Information', 'themesflat' ), 'themesflat_case_study_meta_box', 'case_study', 'advanced' );
}

function themesflat_case_study_meta_box( $post ) {
	$meta_val_featured  = get_post_meta( $post->ID, 'tf_case_feature', true );
	$meta_val_client    = get_post_meta( $post->ID, 'tf_case_client', true );
	$meta_val_date      = get_post_meta( $post->ID, 'tf_case_date', true );
	$meta_val_case_cost = get_post_meta( $post->ID, 'tf_case_cost', true );
	$meta_val           = get_post_meta( $post->ID, 'tf_case_status', true );
	wp_nonce_field( 'tf_case_study_metabox_nonce', 'tf_case_study_metabox_nonce_field' );
	?>
    <table class="form-table">
        <tr>
            <th><label for="tf-feature"><?php esc_html_e( 'Feature', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-feature' type="text" name="tf_case_feature"
                       value="<?php echo esc_attr( $meta_val_featured ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-client"><?php esc_html_e( 'Client', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-client' type="text" name="tf_case_client"
                       value="<?php echo esc_attr( $meta_val_client ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-date"><?php esc_html_e( 'Date', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-date' type="date" name="tf_case_date"
                       value="<?php echo esc_attr( $meta_val_date ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-case-cost"><?php esc_html_e( 'Case Cost', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-case-cost' type="number" name="tf_case_cost"
                       value="<?php echo esc_attr( $meta_val_case_cost ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-status"><?php esc_html_e( 'Status', 'lowlead' ) ?></label></th>
            <td>
                <select name="tf_case_status" id="tf-status">
                    <option value="1" <?php if ( $meta_val == 1 ) {
						echo 'selected';
					} ?>><?php esc_html_e( 'Pending', 'themesflat' ) ?></option>
                    <option value="2" <?php if ( $meta_val == 2 ) {
						echo 'selected';
					} ?>><?php esc_html_e( 'Processing', 'themesflat' ) ?></option>
                    <option value="3" <?php if ( $meta_val == 3 ) {
						echo 'selected';
					} ?>><?php esc_html_e( 'Completed', 'themesflat' ) ?></option>
                </select>
            </td>
        </tr>
    </table>
	<?php
}


add_action( "save_post", 'themesflat_case_study_save_post' );
function themesflat_case_study_save_post( $post_id ) {
	// Secure with nonce field check
	if ( ! isset( $_POST['tf_case_study_metabox_nonce_field'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['tf_case_study_metabox_nonce_field'], 'tf_case_study_metabox_nonce' ) ) {
		return;
	}
		if ( isset( $_POST['tf_case_feature'] ) ) {
			$feature = sanitize_text_field( $_POST['tf_case_feature'] );
			update_post_meta( $post_id, 'tf_case_feature', $feature );
		}
		if ( isset( $_POST['tf_case_client'] ) ) {
			$client = sanitize_text_field( $_POST['tf_case_client'] );
			update_post_meta( $post_id, 'tf_case_client', $client );
		}
		if ( isset( $_POST['tf_case_date'] ) ) {
			$date = sanitize_text_field( $_POST['tf_case_date'] );
			update_post_meta( $post_id, 'tf_case_date', $date );
		}
		if ( isset( $_POST['tf_case_cost'] ) ) {
			$cost = sanitize_text_field( $_POST['tf_case_cost'] );
			update_post_meta( $post_id, 'tf_case_cost', $cost );
		}
		if ( isset( $_POST['tf_case_status'] ) ) {
			$status = intval( $_POST['tf_case_status'] );
			update_post_meta( $post_id, 'tf_case_status', $status );
		}

}
