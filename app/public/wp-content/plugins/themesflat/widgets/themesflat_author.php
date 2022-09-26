<?php

class Themesflat_Author_Box2 extends WP_Widget
{

	protected $defaults;

	function __construct() {
		$this->defaults = array(
			'title' 	=> 'Author Box',
		);
		parent::__construct(
			'widget_author_box',
			esc_html__( 'Themesflat - Author Box', 'dirtywash' ),
			array(
				'classname'   => 'tfl-widget-author-box',
				'description' => esc_html__( 'Author Box.', 'dirtywash' )
			)
		);
	}

	function widget($args, $instance)
	{
		$instance = wp_parse_args( $instance, $this->defaults );
		extract( $instance );
		extract( $args );
		echo wp_kses_post( $before_widget );
		$post_id = get_the_ID();
		$author_id = get_post_field('post_author', $post_id);
		$author_name = get_the_author_meta('display_name', $author_id);
		$author_image = get_avatar_url($author_id);
		$author_desc = get_the_author_meta('description', $author_id);
		?>
        <div class="box-author wow fadeInUp">
            <div class="img-author">
                <img src="<?php echo esc_url($author_image); ?>" alt="<?php esc_attr($author_name); ?>">

				<?php
				$facebook = get_the_author_meta('facebook',$author_id);
				$instagram = get_the_author_meta('instagram',$author_id);
				$behance = get_the_author_meta('behance',$author_id);
				$dribbble = get_the_author_meta('dribbble',$author_id);

				?>
				<?php if(!empty($facebook)): ?>
                    <span class="fb-author"><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></span>
				<?php endif; ?>

            </div>
            <h5 class="name"><?php echo $author_name; ?></h5>
            <p class="text"><?php echo $author_desc; ?></p>
            <ul class="list-social">

				<?php if(!empty($instagram)): ?>
                    <li><a href="<?php echo esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
				<?php endif; ?>

				<?php if(!empty($behance)): ?>
                    <li><a href="<?php echo esc_url($behance); ?>"><i class="fab fa-behance"></i></a></li>
				<?php endif; ?>

				<?php if(!empty($dribbble)): ?>
                    <li class="none"><a href="<?php echo esc_url($dribbble); ?>"><i class="fab fa-dribbble"></i></a></li>
				<?php endif; ?>

            </ul>
        </div>
		<?php
		echo wp_kses_post( $after_widget );
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['style'] = strip_tags($new_instance['style']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$instance = wp_parse_args( $instance, $this->defaults );
	}
}

add_action('widgets_init', function () {
	register_widget('Themesflat_Author_Box2');
});