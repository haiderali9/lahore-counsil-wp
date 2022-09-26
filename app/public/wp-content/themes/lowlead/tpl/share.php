<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @var $social_share
 */
$page_permalink = get_permalink();
$page_title     = get_the_title();
$post_type      = get_post_type();

$wrapper_classes = array(
	'themesflat-social-share',
	$post_type
);
$social_enable   = themesflat_get_opt( 'enable_social' );
if ( $social_enable == 0 ) {
	return;
}

$wrapper_class = implode( ' ', $wrapper_classes );
$social_share  = array( 'facebook', 'email', 'twitter', 'linkedin', 'tumblr', 'pinterest', 'telegram', 'whatsapp' );
?>

<div class="<?php echo esc_attr( $wrapper_class ) ?>">
    <label class="themesflat-share-label"><?php esc_html_e( 'Share:', "lowlead" ) ?></label>
    <ul class="themesflat-share-list">
		<?php
		foreach ( $social_share as $key ) {
			$link       = '';
			$icon       = '';
			$title      = '';
			$attributes = array();
			switch ( $key ) {
				case 'facebook':
					$link  = "https://www.facebook.com/sharer.php?u=" . urlencode( $page_permalink );
					$icon  = 'fab fa-facebook-square';
					$title = esc_html__( 'Facebook', "lowlead" );
					break;
				case 'twitter':
					$link  = "https://twitter.com/share?text=" . $page_title . "&url=" . urlencode( $page_permalink ) . "";
					$icon  = 'fab fa-twitter';
					$title = esc_html__( 'Twitter', "lowlead" );
					break;
				case 'linkedin':
					$link  = "http://www.linkedin.com/shareArticle?mini=true&url=" . urlencode( $page_permalink ) . "&title=" . $page_title;
					$icon  = 'fab fa-linkedin-in';
					$title = esc_html__( 'LinkedIn', "lowlead" );
					break;
				case 'tumblr':
					$link  = "http://www.tumblr.com/share/link?url=" . urlencode( $page_permalink ) . "&name=" . $page_title;
					$icon  = 'fab fa-tumblr';
					$title = esc_html__( 'Tumblr', "lowlead" );
					break;
				case 'pinterest':
					$_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$link     = "http://pinterest.com/pin/create/button/?url=" . urlencode( $page_permalink ) . '&media=' . ( ( $_img_src === false ) ? '' : $_img_src[0] ) . "&description=" . $page_title;
					$icon     = 'fab fa-pinterest-p';
					$title    = esc_html__( 'Pinterest', "lowlead" );
					break;
				case 'email':
					$link         = "mailto:?subject=" . $page_title . "&body=" . esc_url( $page_permalink );
					$icon         = 'fal fa-envelope';
					$title        = esc_html__( 'Email', "lowlead" );
					$attributes[] = 'target="_blank"';
					break;
				case 'telegram':
					$link = "https://telegram.me/share/url?url=" . esc_url( $page_permalink ) . "&text=" . $page_title;
					$icon = 'fab fa-telegram-plane';
					break;
				case 'whatsapp':
					$link         = "https://api.whatsapp.com/send?text=" . esc_attr( $page_title . "  \n\n" . esc_url( $page_permalink ) );
					$icon         = 'fab fa-whatsapp';
					$title        = esc_html__( 'Whats App', "lowlead" );
					$attributes[] = 'target="_blank"';
					break;
			}
			$args = apply_filters( 'themesflat_social_share_' . $key . '_args', array(
				'link'  => $link,
				'icon'  => $icon,
				'title' => $title
			) );
			$attributes[] = sprintf( 'href="%s"', $args['link'] );
			$attributes[] = sprintf( 'title="%s"', esc_attr( $args['title'] ) );
			$attributes[] = 'rel="nofollow"';
			$attributes[] = 'data-delay="1"';
			$attributes[] = 'data-toggle="tooltip"';
			$attributes[] = 'target="_blank"';
			?>
            <li class="<?php echo esc_attr( $key ); ?>">
                <a <?php echo join( ' ', $attributes ) ?>>
                    <i class="<?php echo esc_attr( $args['icon'] ); ?>"></i>
                </a>
            </li>
			<?php
		}
		?>
    </ul>
</div>
