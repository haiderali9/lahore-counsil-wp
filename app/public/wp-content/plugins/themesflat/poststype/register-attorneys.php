<?php
add_action( 'init', 'themesflat_register_attorneys_post_type' );
/**
 * Register attorneys post type
 */
function themesflat_register_attorneys_post_type() {
	/*attorneys*/
	$attorneys_slug = 'attorneys';
	$labels         = array(
		'name'               => esc_html__( 'Attorneys', 'themesflat' ),
		'singular_name'      => esc_html__( 'Attorney', 'themesflat' ),
		'menu_name'          => esc_html__( 'Attorneys', 'themesflat' ),
		'add_new'            => esc_html__( 'New Attorney', 'themesflat' ),
		'add_new_item'       => esc_html__( 'Add New Attorney', 'themesflat' ),
		'new_item'           => esc_html__( 'New Attorney Item', 'themesflat' ),
		'edit_item'          => esc_html__( 'Edit Attorney Item', 'themesflat' ),
		'view_item'          => esc_html__( 'View Attorney', 'themesflat' ),
		'all_items'          => esc_html__( 'All Attorneys', 'themesflat' ),
		'search_items'       => esc_html__( 'Search Attorneys', 'themesflat' ),
		'not_found'          => esc_html__( 'No Attorney Items Found', 'themesflat' ),
		'not_found_in_trash' => esc_html__( 'No Attorney Items Found In Trash', 'themesflat' ),
		'parent_item_colon'  => esc_html__( 'Parent Attorney:', 'themesflat' )

	);
	$args           = array(
		'labels'       => $labels,
		'rewrite'      => array( 'slug' => $attorneys_slug ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor', 'comments' ),
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => true
	);
	register_post_type( 'attorneys', $args );
	flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_attorneys_updated_messages' );
/**
 * attorneys update messages.
 */
function themesflat_attorneys_updated_messages( $messages ) {
	Global $post, $post_ID;
	$messages[ esc_html__( 'attorneys' ) ] = array(
		0  => '',
		1  => sprintf( esc_html__( 'Attorney Updated. <a href="%s">View Attorney</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),
		2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),
		3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),
		4  => esc_html__( 'Attorney Updated.', 'themesflat' ),
		5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Attorney Restored To Revision From %s', 'themesflat' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => sprintf( esc_html__( 'Attorney Published. <a href="%s">View Attorney</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),
		7  => esc_html__( 'Attorney Saved.', 'themesflat' ),
		8  => sprintf( esc_html__( 'Attorney Submitted. <a target="_blank" href="%s">Preview Attorney</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9  => sprintf( esc_html__( 'Attorney Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Attorney</a>', 'themesflat' ), date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( esc_html__( 'Attorney Draft Updated. <a target="_blank" href="%s">Preview Attorney</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

add_action( 'init', 'themesflat_register_attorneys_taxonomy' );
/**
 * Register attorneys taxonomy
 */
function themesflat_register_attorneys_taxonomy() {
	/*attorneys Categories*/
	$attorneys_cat_slug = 'attorneys_category';
	$labels             = array(
		'name'                  => esc_html__( 'Attorney Categories', 'themesflat' ),
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
	$args               = array(
		'labels'       => $labels,
		'rewrite'      => array( 'slug' => $attorneys_cat_slug ),
		'hierarchical' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'attorneys_category', 'attorneys', $args );
	flush_rewrite_rules();
}

add_action( 'init', 'themesflat_register_attorneys_tag' );
/**
 * Register tag taxonomy
 */
function themesflat_register_attorneys_tag() {
	$attorneys_tag_slug = 'attorneys_tag';

	$labels = array(
		'name'          => esc_html__( 'Attorney Tags', 'themesflat' ),
		'singular_name' => esc_html__( 'Attorney Tags', 'themesflat' ),
		'search_items'  => esc_html__( 'Search Tags', 'themesflat' ),
		'all_items'     => esc_html__( 'All Tags', 'themesflat' ),
		'new_item_name' => esc_html__( 'Add New Tag', 'themesflat' ),
		'add_new_item'  => esc_html__( 'New Tag Name', 'themesflat' ),
		'edit_item'     => esc_html__( 'Edit Tag', 'themesflat' ),
		'update_item'   => esc_html__( 'Update Tag', 'themesflat' ),
		'menu_name'     => esc_html__( 'Tags' ),
	);
	$args   = array(
		'labels'       => $labels,
		'rewrite'      => array( 'slug' => $attorneys_tag_slug ),
		'hierarchical' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'attorneys_tag', 'attorneys', $args );
	flush_rewrite_rules();
}

add_action( 'add_meta_boxes', 'themesflat_attorney_add_meta_box' );
function themesflat_attorney_add_meta_box() {
	add_meta_box( 'tf_attorney_meta', esc_html__( 'Addition Information', 'themesflat' ), 'themesflat_attorney_meta_box', 'attorneys', 'advanced' );
}

function themesflat_attorney_meta_box( $post ) {
	$language      = get_post_meta( $post->ID, 'tf_attorney_language', true );
	$position      = get_post_meta( $post->ID, 'tf_attorney_position', true );
	$office        = get_post_meta( $post->ID, 'tf_attorney_office', true );
	$experience    = get_post_meta( $post->ID, 'tf_attorney_experience', true );
	$phone         = get_post_meta( $post->ID, 'tf_attorney_phone', true );
	$facebook      = get_post_meta( $post->ID, 'tf_attorney_facebook', true );
	$instagram     = get_post_meta( $post->ID, 'tf_attorney_instagram', true );
	$dribble       = get_post_meta( $post->ID, 'tf_attorney_dribble', true );
	$behance       = get_post_meta( $post->ID, 'tf_attorney_behance', true );
	$practise_meta = get_post_meta( $post->ID, 'tf_attorney_practise_area', true );
	$practise_meta = explode( ",", $practise_meta );

	$practise_areas = get_posts( array( 'post_type' => 'practise_area', 'post_status' => 'publish' ) );
	wp_nonce_field( 'tf_attorneys_metabox_nonce', 'tf_attorneys_metabox_nonce_field' );
	?>
    <table class="form-table">

        <tr>
            <th><label for="tf-attorney-language"><?php esc_html_e( 'Language', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-language' type="text" name="tf_attorney_language"
                       value="<?php echo esc_attr( $language ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-position"><?php esc_html_e( 'Position', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-position' type="text" name="tf_attorney_position"
                       value="<?php echo esc_attr( $position ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-office"><?php esc_html_e( 'Office', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-office' type="text" name="tf_attorney_office"
                       value="<?php echo esc_attr( $office ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-experience"><?php esc_html_e( 'Experience', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-experience' type="text" name="tf_attorney_experience"
                       value="<?php echo esc_attr( $experience ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-phone"><?php esc_html_e( 'Phone Number', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-phone' type="text" name="tf_attorney_phone"
                       value="<?php echo esc_attr( $phone ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-facebook"><?php esc_html_e( 'Facebook Url', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-facebook' type="url" name="tf_attorney_facebook"
                       value="<?php echo esc_attr( $facebook ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-instagram"><?php esc_html_e( 'Instagram Url', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-instagram' type="url" name="tf_attorney_instagram"
                       value="<?php echo esc_attr( $instagram ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-dribble"><?php esc_html_e( 'Dribble Url', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-dribble' type="url" name="tf_attorney_dribble"
                       value="<?php echo esc_attr( $dribble ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-behance"><?php esc_html_e( 'Behance Url', 'lowlead' ) ?></label></th>
            <td>
                <input id='tf-attorney-behance' type="url" name="tf_attorney_behance"
                       value="<?php echo esc_attr( $behance ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="tf-attorney-practise-area"><?php esc_html_e( 'Practise Area', 'lowlead' ) ?></label></th>
            <td>
                <select name="tf_attorney_practise_area[]" id="tf-attorney-practise-area" multiple>
					<?php
					foreach ( $practise_areas as $item ):
						?>
                        <option value="<?php echo esc_attr( $item->ID ) ?>" <?php if ( in_array( $item->ID, $practise_meta ) ) {
							echo 'selected';
						}
						?>><?php echo esc_html( $item->post_title ) ?></option>
					<?php endforeach; ?>

                </select>
            </td>
        </tr>
    </table>
	<?php
}

add_action( "save_post", 'themesflat_attorney_save_post' );
function themesflat_attorney_save_post( $post_id ) {
	// Secure with nonce field check
	if ( ! isset( $_POST['tf_attorneys_metabox_nonce_field'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['tf_attorneys_metabox_nonce_field'], 'tf_attorneys_metabox_nonce' ) ) {
		return;
	}
	if ( isset( $_POST['tf_attorney_language'] ) ) {
		$language = sanitize_text_field( $_POST['tf_attorney_language'] );
		update_post_meta( $post_id, 'tf_attorney_language', $language );
	}
	if ( isset( $_POST['tf_attorney_position'] ) ) {
		$position = sanitize_text_field( $_POST['tf_attorney_position'] );
		update_post_meta( $post_id, 'tf_attorney_position', $position );
	}
	if ( isset( $_POST['tf_attorney_office'] ) ) {
		$office = sanitize_text_field( $_POST['tf_attorney_office'] );
		update_post_meta( $post_id, 'tf_attorney_office', $office );
	}
	if ( isset( $_POST['tf_attorney_experience'] ) ) {
		$office = sanitize_text_field( $_POST['tf_attorney_experience'] );
		update_post_meta( $post_id, 'tf_attorney_experience', $office );
	}
	if ( isset( $_POST['tf_attorney_phone'] ) ) {
		$phone = sanitize_text_field( $_POST['tf_attorney_phone'] );
		update_post_meta( $post_id, 'tf_attorney_phone', $phone );
	}
	if ( isset( $_POST['tf_attorney_facebook'] ) ) {
		$facebook = sanitize_url( $_POST['tf_attorney_facebook'] );
		update_post_meta( $post_id, 'tf_attorney_facebook', $facebook );
	}
	if ( isset( $_POST['tf_attorney_instagram'] ) ) {
		$instagram = sanitize_url( $_POST['tf_attorney_instagram'] );
		update_post_meta( $post_id, 'tf_attorney_instagram', $instagram );
	}
	if ( isset( $_POST['tf_attorney_dribble'] ) ) {
		$dribble = sanitize_url( $_POST['tf_attorney_dribble'] );
		update_post_meta( $post_id, 'tf_attorney_dribble', $dribble );
	}
	if ( isset( $_POST['tf_attorney_behance'] ) ) {
		$behance = sanitize_url( $_POST['tf_attorney_behance'] );
		update_post_meta( $post_id, 'tf_attorney_behance', $behance );
	}
	if ( isset( $_POST['tf_attorney_practise_area'] ) ) {
		$practise_area = implode( ',', $_POST['tf_attorney_practise_area'] );
		update_post_meta( $post_id, 'tf_attorney_practise_area', $practise_area );
	}

}
