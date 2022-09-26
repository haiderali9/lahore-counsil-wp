<?php
var_dump(123);
$get_id_post_thumbnail = get_post_thumbnail_id();
$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
 ?>
<div class="item">
    <div class="entry blog-post">
		<?php if ( $settings['show_image'] == 'yes' ): ?>
            <div class="featured-post">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="image">
					<?php echo sprintf( '%s', $featured_image ); ?>
                </a>
            </div>
		<?php endif; ?>

        <div class="content-post">
			<?php if ( $settings['show_title'] == 'yes' ): ?>
                <h2 class="entry-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                           title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a>
                </h2>
			<?php endif; ?>
			<?php if ( $settings['show_meta'] == 'yes' ): ?>
                <div class="post-meta">
                    <div class="item-meta">
						<?php
						$archive_year  = get_the_time( 'Y' );
						$archive_month = get_the_time( 'm' );
						$archive_day   = get_the_time( 'd' );
						?>
                        <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><?php echo esc_html( date_format( date_create( get_the_date() ), 'd F Y' ) ) ?></a>
                    </div>
                </div>
			<?php endif; ?>
			<?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                <div class="post-content post-excerpt"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
			<?php endif; ?>
        </div>
    </div>
</div>