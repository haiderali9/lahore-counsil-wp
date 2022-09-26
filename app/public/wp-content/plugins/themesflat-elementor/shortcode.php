<?php 
function themesflat_category_products( $atts ) {
        global $woocommerce_loop;

        $atts = shortcode_atts( array(
            'number'     => null,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'columns'    => '4',
            'hide_empty' => 1,
            'parent'     => '',
            'ids'        => ''
        ), $atts );

        if ( isset( $atts['ids'] ) ) {
            $ids = explode( ',', $atts['ids'] );
            $ids = array_map( 'trim', $ids );
        } else {
            $ids = array();
        }

        $hide_empty = ( $atts['hide_empty'] == true || $atts['hide_empty'] == 1 ) ? 1 : 0;

        // get terms and workaround WP bug with parents/pad counts
        $args = array(
            'orderby'    => $atts['orderby'],
            'order'      => $atts['order'],
            'hide_empty' => $hide_empty,
            'include'    => $ids,
            'pad_counts' => true,
            'child_of'   => $atts['parent']
        );

        $product_categories = get_terms( 'product_cat', $args );

        if ( '' !== $atts['parent'] ) {
            $product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
        }

        if ( $hide_empty ) {
            foreach ( $product_categories as $key => $category ) {
                if ( $category->count == 0 ) {
                    unset( $product_categories[ $key ] );
                }
            }
        }

        if ( $atts['number'] ) {
            $product_categories = array_slice( $product_categories, 0, $atts['number'] );
        }

        $columns = absint( $atts['columns'] );

        ob_start();

        if ( $product_categories ) {
            ?>
            
                <ul class="products">
            <?php
            foreach ( $product_categories as $category ) {
                ?>
                <li class="product-category">
                    <div class="inner">
                        <h2 class="woocommerce-loop-category__title">
                            <a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
                        </h2>
                        <div class="category-thumbnail">
                            <a href="<?php echo get_category_link($category); ?>">
                                <?php woocommerce_subcategory_thumbnail( $category ); ?>
                            </a>
                        </div>
                        <div class="category-total"><?php esc_html_e('Total Item','themesflat-elementor'); ?> <?php echo esc_attr($category->count); ?></div>
                        <?php if ($category->description): ?>
                            <div class="shop_cat_desc"><?php echo esc_attr($category->description); ?></div>
                        <?php endif; ?>
                    </div>
                </li>          
                <?php
            }            
        }

        woocommerce_reset_loop();

        return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

}

add_shortcode( 'themesflat_category_products', 'themesflat_category_products' );