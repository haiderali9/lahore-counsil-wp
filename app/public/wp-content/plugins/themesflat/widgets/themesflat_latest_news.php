<?php

class Themesflat_Latest_News extends WP_Widget
{
	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor
	 *
	 * @return Themesflat_Latest_News
	 */
	function __construct()
	{
		$this->defaults = array(
			'title' => 'Latest News',
			'category' => '',
			'ids' => '',
			'count' => 4,
			'show_count_post' => false,
			'show_date' => true
		);
		parent::__construct(
			'widget_latest_news',
			esc_html__('Themesflat - Latest News', 'themesflat'),
			array(
				'classname' => 'widget_latest_news',
				'description' => esc_html__('Latest News.', 'themesflat')
			)
		);
	}

	/**
	 * Display widget
	 */
	function widget($args, $instance)
	{
		$instance = wp_parse_args($instance, $this->defaults);
		extract($instance);
		extract($args);
		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => intval($count)
		);
		if (!empty($category))
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'terms' => $category,
				),
			);
		if ($ids != '') {
			$query_args['post__in'] = explode(",", $ids);
			$query_args['orderby'] = 'post__in';
		}
		$flat_post = new WP_Query($query_args);
		$classes[] = 'recent-news';
		echo wp_kses_post($before_widget);
		if (!empty($title)) {
			echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);
		}
		?>
        <ul class="<?php echo esc_attr(implode(' ', $classes)); ?> clearfix">
			<?php if ($flat_post->have_posts()) : ?>
				<?php while ($flat_post->have_posts()) : $flat_post->the_post(); ?>
                    <li class="clearfix">
                        <div class="thumb">
                            <?php
                            echo themesflat_render_thumbnail_markup(array(
                                'image_size' => '70x75',
                                'image_mode'  => 'background',
                            ));
                            ?>
                        </div>
                        <div class="text">
                            <h6 class="title"><a href="<?php echo esc_url(get_permalink()); ?>"
                                                 rel="bookmark"><?php the_title(); ?></a></h6>
                            <div class="meta">
								<?php if ($show_date) : ?>
                                    <div class="item-meta meta-date">
										<?php
										$archive_year = get_the_time('Y');
										$archive_month = get_the_time('m');
										$archive_day = get_the_time('d');
										echo '<a class="meta-text" href="' . get_day_link($archive_year, $archive_month, $archive_day) . '">' . get_the_date(). '</a>';
										?>
                                    </div>
								<?php endif; ?>

								<?php if ($show_count_post) : ?>
                                    <div class="item-meta item-count-post">
                                        <span class="count"><?php echo esc_html(themesflat_get_post_views_count(get_the_ID())) ?></span>
                                        <span>Views</span>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div><!-- /.text -->
                    </li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<?php printf('<li>%s</li>', esc_html__('Oops, category not found.', 'themesflat')); ?>
			<?php endif; ?>
        </ul>
		<?php echo wp_kses_post($after_widget);
	}

	/**
	 * Update widget
	 */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['ids'] = ($new_instance['ids']);
		$instance['count'] = intval($new_instance['count']);
		$instance['show_date'] = isset($new_instance['show_date']) ? (bool)$new_instance['show_date'] : false;
		$instance['show_count_post'] = isset($new_instance['show_count_post']) ? (bool)$new_instance['show_count_post'] : false;
		$instance['category'] = array_filter($new_instance['category']);
		return $instance;
	}

	/**
	 * Widget setting
	 */
	function form($instance)
	{
		$instance = wp_parse_args($instance, $this->defaults);
		$show_count_post = isset($instance['show_count_post']) ? (bool)$instance['show_count_post'] : false;
		$show_date = isset($instance['show_date']) ? (bool)$instance['show_date'] : false;

		if (empty($instance['category'])) {
			$instance['category'] = array("1");
		}
		?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'themesflat'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($instance['title']); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e('Select Category:', 'themesflat'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('category')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('category')); ?>[]">
                <option value=""<?php selected(empty($instance['category'])); ?>><?php esc_html_e('All', 'themesflat'); ?></option>
				<?php
				$categories = get_categories();
				foreach ($categories as $category) {
					printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', esc_attr($category->term_id), esc_attr($category->name), esc_attr($category->count), (in_array($category->term_id, $instance['category'])) ? 'selected="selected"' : '');
				}
				?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('ids')); ?>"><?php esc_html_e('Get Post by IDS EX:1,2,3', 'themesflat'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('ids')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('ids')); ?>" type="text"
                   value="<?php echo esc_attr($instance['ids']); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Count:', 'themesflat'); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('count')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('count')); ?>"
                   value="<?php echo esc_attr($instance['count']); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_count_post); ?>
                   id="<?php echo esc_attr($this->get_field_id('show_count_post')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_count_post')); ?>"/>
            <label for="<?php echo esc_attr($this->get_field_id('show_count_post')); ?>"><?php esc_html_e('Show Count Post ?', 'themesflat') ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_date); ?>
                   id="<?php echo esc_attr($this->get_field_id('show_date')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_date')); ?>"/>
            <label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>"><?php esc_html_e('Show Date ?', 'themesflat'); ?></label>
        </p>
		<?php
	}
}

add_action('widgets_init', 'themesflat_register_latest_news');

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_latest_news()
{
	register_widget('Themesflat_Latest_News');
}