<?php
add_action( 'admin_init', 'themesflat_page_options_init' );

function themesflat_page_options_init() {

	new themesflat_meta_boxes( array(
		// Blog
		'id'         => 'blog-options',
		'label'      => esc_html__( 'Post settings', 'themesflat' ),
		'post_types' => array( 'post', 'faq' ),
		'context'    => 'normal',
		'priority'   => 'default',
		'sections'   => array(
			'blog' => array( 'title' => esc_html__( 'Post Format', 'themesflat' ) ),
		),
		'options'    => themesflat_post_options_fields()
	) );
}

/* Option Blog
===================================*/
function themesflat_post_options_fields() {
	$options['gallery_images_heading'] = array(
		'type'        => 'heading',
		'section'     => 'blog',
		'title'       => esc_html__( 'Post Format: Gallery .', 'themesflat' ),
		'description' => esc_html__( '', 'themesflat' )
	);

	$options['gallery_images'] = array(
		'type'    => 'image-control',
		'section' => 'blog',
		'title'   => esc_html__( 'Images', 'themesflat' ),
		'default' => ''
	);

	$options['video_url_heading'] = array(
		'type'        => 'heading',
		'section'     => 'blog',
		'title'       => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo ...).', 'themesflat' ),
		'description' => esc_html__( '', 'themesflat' )
	);
	$options['video_url']         = array(
		'type'    => 'textarea',
		'section' => 'blog',
		'title'   => esc_html__( 'iframe video link', 'themesflat' ),
		'default' => ''
	);

	$options['audio_url_heading'] = array(
		'type'        => 'heading',
		'section'     => 'blog',
		'title'       => esc_html__( 'Post Format: Audio', 'themesflat' ),
		'description' => esc_html__( '', 'themesflat' )
	);
	$options['audio_url']         = array(
		'type'    => 'textarea',
		'section' => 'blog',
		'title'   => esc_html__( 'iframe audio link (https://soundcloud.com/)', 'themesflat' ),
		'default' => ''
	);

	return $options;
}


function option_icons_list() {
	$icon = array(
		'no-icon'                  => 'No-Icon',
		'icon-bulterenvelope-open' => esc_html__( 'Envelope open', 'themesflat' ),
		'icon-bulterheadphone-alt' => esc_html__( 'Headphone', 'themesflat' ),
		'icon-bulterClip'          => esc_html__( 'Clip', 'themesflat' ),
	);

	return $icon;
}

add_action( 'show_user_profile', 'tfl_extra_profile_fields' );
add_action( 'edit_user_profile', 'tfl_extra_profile_fields' );

function tfl_extra_profile_fields( $user ) { ?>

    <h3><?php esc_html_e( 'Extra profile information', 'tfl' ); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="position"><?php esc_html_e( 'Position', 'tfl' ); ?></label></th>
            <td>
                <input type="text" name="position" id="position"
                       value="<?php echo esc_attr( get_the_author_meta( 'position', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php esc_html_e( 'Please enter your position', 'tfl' ); ?></span>
            </td>
        </tr>

        <tr>
            <th><label for="facebook"><?php esc_html_e( 'facebook', 'tfl' ); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook"
                       value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php esc_html_e( 'Please enter your facebook username.', 'tfl' ); ?></span>
            </td>
        </tr>

        <tr>
            <th><label for="twitter"><?php esc_html_e( 'Twitter', 'tfl' ); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter"
                       value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php esc_html_e( 'Please enter your Twitter username.', 'tfl' ); ?></span>
            </td>
        </tr>

        <tr>
            <th><label for="instagram"><?php esc_html_e( 'Instagram', 'tfl' ); ?></label></th>
            <td>
                <input type="text" name="instagram" id="instagram"
                       value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php esc_html_e( 'Please enter your instagram username.', 'tfl' ); ?></span>
            </td>
        </tr>

        <tr>
            <th><label for="behance"><?php esc_html_e( 'Behance', 'tfl' ); ?></label></th>
            <td>
                <input type="text" name="behance" id="behance"
                       value="<?php echo esc_attr( get_the_author_meta( 'behance', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php esc_html_e( 'Please enter your behance username.', 'tfl' ); ?></span>
            </td>
        </tr>

        <tr>
            <th><label for="dribbble"><?php esc_html_e( 'dribbble', 'tfl' ); ?></label></th>
            <td>
                <input type="text" name="dribbble" id="dribbble"
                       value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php esc_html_e( 'Please enter your dribbble username.', 'tfl' ); ?></span>
            </td>
        </tr>

    </table>
<?php }

add_action( 'personal_options_update', 'tfl_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'tfl_save_extra_profile_fields' );

function tfl_save_extra_profile_fields( $user_id ) {

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return;
	}


	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'behance', $_POST['behance'] );
	update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'position', $_POST['position'] );
}