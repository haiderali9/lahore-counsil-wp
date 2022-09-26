<?php
class TFNavMenu_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-nav-menu';
    }
    
    public function get_title() {
        return esc_html__( 'TF Nav Menu', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-navmenu'];
	}

    public function get_menus(){
        $list = [];
        $menus = wp_get_nav_menus();
        foreach($menus as $menu){
            $list[$menu->slug] = $menu->name;
        }

        return $list;
    }

	protected function register_controls() {
        // Start Menu Settings        
			$this->start_controls_section( 
				'section_menu_setting',
	            [
	                'label' => esc_html__('Menu Settings', 'themesflat-elementor'),
	            ]
	        );

	        $this->add_control(
                'title_widget',
                [
                    'label' => esc_html__( 'Title Widget', 'themesflat-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Menu', 'themesflat-elementor' ),
                ]
            );	

	        $this->add_control(
	            'nav_menu',
	            [
	                'label'     =>esc_html__( 'Select menu', 'themesflat-elementor' ),
	                'type'      =>  \Elementor\Controls_Manager::SELECT,
	                'options'   => $this->get_menus(),
	            ]
			);		

			$this->end_controls_section();
        // /.End Menu Settings
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		$title_widget = '';

		$args = array(
	        'menu'            => $settings['nav_menu'],
	        'container'       => 'div',
	        'container_class' => 'menu-container tf-menu-container',
	        'container_id'    => '',
	        'menu_class'      => 'menu',
	        'menu_id'         => '',
	        'echo'            => false,
	        'fallback_cb'     => 'wp_page_menu',
	        'before'          => '',
	        'after'           => '',
	        'link_before'     => '',
	        'link_after'      => '',
	        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	        'item_spacing'    => 'preserve',
	        'depth'           => 0,
	        'walker'          => '',
	        'theme_location'  => '',
	    );	    
	    if ($settings['title_widget']) {
	    	$title_widget = '<h5>'.$settings['title_widget'].'</h5>';
	    }

		echo sprintf ( '%1$s %2$s', $title_widget, wp_nav_menu($args) );
	}

	

}
