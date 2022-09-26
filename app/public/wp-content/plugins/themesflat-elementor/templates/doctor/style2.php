<div class="item">				
    <div class="doctor-post doctor-post-<?php the_ID(); ?>">
    	<?php if ( has_post_thumbnail() ): ?>
        <div class="featured-post">
            <a href="<?php echo get_the_permalink(); ?>">
            <?php 
            $get_id_post_thumbnail = get_post_thumbnail_id();
			echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
            ?>
            </a>
        </div>
    	<?php endif; ?>
        <div class="content"> 
            <h2 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h2>
            
            <?php if (themesflat_get_opt_elementor('doctor_post_position') != ''): ?>
            <div class="position"><?php echo themesflat_get_opt_elementor('doctor_post_position'); ?></div>
            <?php endif; ?> 

            <?php 
                $social_html = $social_1 = $social_2 = $social_3 = $social_4 = '';
                $target_1 = $target_2 = $target_3 = $target_4 = '';
                $nofollow_1 = $nofollow_2 = $nofollow_3 = $nofollow_4 = '';
                $icon_1 = $icon_2 = $icon_3 = $icon_4 = '';
                $link_1 = $link_2 = $link_3 = $link_4 = '';

                $icon_1 = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( themesflat_get_opt_elementor('doctor_post_social_icon_1') );
                $icon_2 = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( themesflat_get_opt_elementor('doctor_post_social_icon_2') );
                $icon_3 = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( themesflat_get_opt_elementor('doctor_post_social_icon_3') );
                $icon_4 = \Elementor\Addon_Elementor_Icon_manager_lowlead::render_icon( themesflat_get_opt_elementor('doctor_post_social_icon_4') );

                if ( $icon_1 != '' ) {
                    if ( ! empty( themesflat_get_opt_elementor('doctor_post_social_link_1')['url'] ) ) {
                        $link_1 = themesflat_get_opt_elementor('doctor_post_social_link_1')['url'];
                        $target_1 = themesflat_get_opt_elementor('doctor_post_social_link_1')['is_external'] ? ' target="_blank"' : '';
                        $nofollow_1 = themesflat_get_opt_elementor('doctor_post_social_link_1')['nofollow'] ? ' rel="nofollow"' : '';
                    }                                               

                    $social_1 .= '<a href="' . $link_1 . '" ' . $target_1 . $nofollow_1 . '>'.$icon_1.'</a>';
                }

                if ( $icon_2 != '' ) {
                    if ( ! empty( themesflat_get_opt_elementor('doctor_post_social_link_2')['url'] ) ) {
                        $link_2 = themesflat_get_opt_elementor('doctor_post_social_link_2')['url'];
                        $target_2 = themesflat_get_opt_elementor('doctor_post_social_link_2')['is_external'] ? ' target="_blank"' : '';
                        $nofollow_2 = themesflat_get_opt_elementor('doctor_post_social_link_2')['nofollow'] ? ' rel="nofollow"' : '';
                    }                                               

                    $social_2 .= '<a href="' . $link_2 . '" ' . $target_2 . $nofollow_2 . '>'.$icon_2.'</a>';
                }

                if ( $icon_3 != '' ) {
                    if ( ! empty( themesflat_get_opt_elementor('doctor_post_social_link_3')['url'] ) ) {
                        $link_3 = themesflat_get_opt_elementor('doctor_post_social_link_3')['url'];
                        $target_3 = themesflat_get_opt_elementor('doctor_post_social_link_3')['is_external'] ? ' target="_blank"' : '';
                        $nofollow_3 = themesflat_get_opt_elementor('doctor_post_social_link_3')['nofollow'] ? ' rel="nofollow"' : '';
                    }                                               

                    $social_3 .= '<a href="' . $link_3 . '" ' . $target_3 . $nofollow_3 . '>'.$icon_3.'</a>';
                }

                if ( $icon_4 != '' ) {
                    if ( ! empty( themesflat_get_opt_elementor('doctor_post_social_link_4')['url'] ) ) {
                        $link_4 = themesflat_get_opt_elementor('doctor_post_social_link_4')['url'];
                        $target_4 = themesflat_get_opt_elementor('doctor_post_social_link_4')['is_external'] ? ' target="_blank"' : '';
                        $nofollow_4 = themesflat_get_opt_elementor('doctor_post_social_link_4')['nofollow'] ? ' rel="nofollow"' : '';
                    }                                               

                    $social_4 .= '<a href="' . $link_4 . '" ' . $target_4 . $nofollow_4 . '>'.$icon_4.'</a>';
                }

                if ( $icon_1 != '' || $icon_2 != '' || $icon_3 != '' || $icon_4 != '' ){
                    echo '<div class="social">'.$social_1.$social_2.$social_3.$social_4.'</div>';
                }
            ?>
        </div>
    </div>
</div>