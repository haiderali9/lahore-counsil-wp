<?php
$feature_post   = '';
global $themesflat_thumbnail;
switch ( get_post_format() ) {
	case 'gallery':
		$size = 'themesflat-blog';
		$images = themesflat_decode( themesflat_meta( 'gallery_images' ) );

		if ( empty( $images ) ) {
			break;
		}
		?>
        <div class="featured-post">
            <div class="customizable-carousel" data-loop="true" data-items="1" data-md-items="1" data-sm-items="1"
                 data-xs-items="1" data-space="15" data-autoplay="true" data-autospeed="4000" data-nav-dots="false"
                 data-nav-arrows="true">
				<?php
				if ( ! empty( $images ) && is_array( $images ) ) {
					foreach ( $images as $image ) {
						echo '<div class="item-gallery">';
						echo wp_get_attachment_image( $image, $themesflat_thumbnail );
						echo '</div>';
					}
				}
				?>
            </div>
        </div><!-- /.feature-post -->
		<?php
		break;
	case 'video':
		$video = themesflat_meta( 'video_url' );
		if ( ! $video ) {
			break;
		}
		global $_wp_additional_image_sizes;
		$video_size = array(
			'height' => $_wp_additional_image_sizes[ $themesflat_thumbnail ]['height'],
			'width'  => $_wp_additional_image_sizes[ $themesflat_thumbnail ]['width']
		);
		$end        = "";
		if ( has_post_thumbnail() ) {
			$feature_post .= '<div class="themesflat_video_embed">';
			$feature_post .= get_the_post_thumbnail( null, $themesflat_thumbnail ) . '
			<div class="video-video-box-overlay">
				<div class="video-video-box-button-sm video-box-button-lg">					
					<button class="video-video-play-icon" data-izimodal-open="#format-video">
						<i class="far fa-play"></i>
					</button>
				</div>					
			</div>';
			$end          = '</div>
			<div class="izimodal" id="format-video" data-izimodal-width="850px" data-iziModal-fullscreen="true">
			    <iframe height="430" src="' . esc_url( $video ) . '" class="fullwidth shadow-primary"></iframe>
			</div>';
		}
		$feature_post .= $end;
		break;
	case 'audio':
		$audio_url = themesflat_meta( 'audio_url' );
		echo '<div class="themesflat_audio">' . $audio_url . '</div>';
		break;
	default:
		$size  = is_single() ? 'themesflat-blog' : $themesflat_thumbnail;
		$thumb = get_the_post_thumbnail( get_the_ID(), $size );
		if ( empty( $thumb ) ) {
			return;
		}
		$feature_post .= get_the_post_thumbnail( get_the_ID(), $size );
}
if ( $feature_post ) {
	echo '<div class="featured-post">' . $feature_post . '</div>';
}
?>