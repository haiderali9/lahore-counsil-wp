<div class="item">
    <div class="entry blog-post">
        <?php if ( $settings['style'] == 'style1' || $settings['style'] == 'style3' || $settings['style'] == 'style4' ): ?>                             
            <div class="featured-post">
                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <?php echo sprintf('%s',$featured_image); ?>
                </a>
                <?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style1' ): ?>
                    <div class="post-meta">
                        <span class="post-meta-item">
                            <?php
                            $archive_year  = get_the_time('Y'); 
                            $archive_month = get_the_time('m'); 
                            $archive_day   = get_the_time('d');
                            ?>
                            <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
                        </span>
                    </div>                                      
                <?php endif; ?>

                <?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style3' || $settings['show_meta'] == 'yes' && $settings['style'] == 'style4' ): ?>
                    <div class="post-meta">
                        <span class="post-meta-item">
                            <?php echo get_the_category_list(', '); ?>
                        </span>
                    </div>                                      
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="bg-overlay"></div>
            <div class="featured-post" style="background-image:url(<?php echo esc_attr(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); ?>)"></div>
        <?php endif; ?>
        
        <div class="content">
            <?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style2' ): ?>                              
                <div class="post-meta">
                    <span class="post-meta-item">
                        <i class="far fa-user" aria-hidden="true"></i>
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
                    </span>
                    <span class="post-meta-item"><i class="far fa-folder-open" aria-hidden="true"></i><?php echo get_the_category_list(', '); ?></span>
                </div>                                                  
            <?php endif; ?>

            <?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style3' || $settings['show_meta'] == 'yes' && $settings['style'] == 'style4' ): ?> 
            <div class="post-meta">
                <div class="post-meta-item">
                    <?php
                    $archive_year  = get_the_time('Y'); 
                    $archive_month = get_the_time('m'); 
                    $archive_day   = get_the_time('d');
                    ?>
                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                    <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
                </div>
                <div class="post-meta-item">
                    <i class="far fa-comments" aria-hidden="true"></i>
                    <?php echo comments_popup_link( esc_html__( 'Comment (0)', 'themesflat-elementor' ), esc_html__(  'Comment (1)', 'themesflat-elementor' ), esc_html__( 'Comments (%)', 'themesflat-elementor' ) ); ?>
                </div>
            </div>  
            <?php endif; ?> 

            <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php endif; ?>

            <?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style2' ): ?>  
            <div class="post-meta-category">
                <?php
                $archive_year  = get_the_time('Y'); 
                $archive_month = get_the_time('m'); 
                $archive_day   = get_the_time('d');
                ?>
                <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
            </div>  
            <?php endif; ?>                                                         

            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                <div class="content-post"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php endif; ?>
            
            <?php if ( $settings['show_button'] == 'yes' && $settings['button_text'] != '' ): ?>
                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button"><?php echo esc_attr( $settings['button_text'] ); ?></a>
                </div>
            <?php endif; ?>                     
        </div>                      
    </div>
</div>  