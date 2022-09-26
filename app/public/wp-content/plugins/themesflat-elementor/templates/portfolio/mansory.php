<?php 
$classes = 'tf-portfolio-wrap tf-widget-portfolio-wrap';
$classes .= ' '.$settings['types'];
$classes .= ' '.$settings['style'];

if ( get_query_var('paged') ) {
   $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
   $paged = get_query_var('page');
} else {
   $paged = 1;
}
$query_args = array(
    'post_type' => 'portfolios',
    'posts_per_page' => $settings['posts_per_page'],
    'paged'     => $paged
);

if (! empty( $settings['posts_categories'] )) {         
    $query_args['tax_query'] = array(
                            array(
                                'taxonomy' => 'portfolios_category',
                                'field'    => 'slug',
                                'terms'    => $settings['posts_categories']
                            ),
                        );
}        
if ( ! empty( $settings['exclude'] ) ) {                
    if ( ! is_array( $settings['exclude'] ) )
        $exclude = explode( ',', $settings['exclude'] );

    $query_args['post__not_in'] = $exclude;
}

$query_args['orderby'] = $settings['order_by'];
$query_args['order'] = $settings['order'];

if ( $settings['sort_by_id'] != '' ) {  
    $sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );
    $query_args['post__in'] = $sort_by_id;
    $query_args['orderby'] = 'post__in';
}

$query = new WP_Query( $query_args );
if ( $query->have_posts() ) : ?>
<div class="<?php echo esc_attr($classes); ?>">

    <div class="justified_portfolio justified-gallery" data-rowheight="<?php echo esc_attr($settings['rowheight']); ?>" data-margins="30">

        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="item">
                <div class="portfolios-post portfolios-post-<?php the_ID(); ?>">
                    <div class="featured-post">
                        <a href="<?php echo get_the_permalink(); ?>">
                        <?php 
                            if ( has_post_thumbnail() ) { 
                                echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail', $settings ));
                            }                                           
                        ?>
                        </a>
                    </div>
                    <div class="content">
                        <div class="inner-content">
                            <div class="line-plus"><span class="line line1"></span><span class="line line2"></span></div>
                            <h2 class="title">
                                 <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h2>
                            <?php if (themesflat_get_opt_elementor('portfolio_post_position') != ''): ?>
                            <div class="post-meta">
                                <?php echo themesflat_get_opt_elementor('portfolio_post_position'); ?>
                            </div>
                            <?php endif; ?>
                        </div>                                              
                    </div>
                </div>
            </div>               
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</div>
<?php
else:
    esc_html_e('No posts found', 'themesflat-elementor');
endif;