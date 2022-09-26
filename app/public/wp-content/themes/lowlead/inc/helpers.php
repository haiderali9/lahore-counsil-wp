<?php

/**
 * Return the built-in header styles for this theme
 *
 * @return  array
 */
class themesflat_options_helpers {
	public function themesflat_recognize_control_class( $name ) {
		$segments = explode( '-', $name );
		$segments = array_map( 'ucfirst', $segments );

		return implode( '', $segments );
	}
}

function themesflat_get_class_for_custom( $vc_class = '', $themesflat_class = '' ) {
	if ( ! empty( $vc_class ) ) {
		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$vcclass = vc_shortcode_custom_css_class( $vc_class, '' );
		}
	} else {
		$vcclass = $themesflat_class;
	}

	return $vcclass;
}

function themesflat_shortcode_default_id() {
	return array(
		'type'       => 'textfield',
		'param_name' => 'default_id',
		'group'      => esc_html__( 'Design Options', 'lowlead' ),
		'value'      => 'themesflat_' . current_time( 'timestamp' ),
		'std'        => 'themesflat_' . current_time( 'timestamp' )
	);
}

function themesflat_add_icons( $icon_name = 'fa', $url = '' ) {
	$icons = '';
	if ( $url != '' ) {
		$fontContent = wp_remote_get( $url, array( 'sslverify' => false ) );
		if ( ! is_wp_error( $fontContent ) ) {
			$pattern = sprintf( '/\.([\A%s].*?)\:/', $icon_name );
			preg_match_all( $pattern, $fontContent['body'], $tmp_icons );
			$icons = $tmp_icons[1];
		}
	}

	return $icons;
}

function themesflat_check_isset( $control ) {
	return isset( $control ) ? $control : '';
}

function themesflat_render_box_control( $name, $control = array(), $id = '' ) {
	add_action( 'admin_enqueue_scripts', 'themesflat_admin_color_picker' );
	$default  = array(
		'margin-top'          => '',
		'margin-bottom'       => '',
		'margin-left'         => '',
		'margin-right'        => '',
		'padding-top'         => '',
		'padding-bottom'      => '',
		'padding-left'        => '',
		'padding-right'       => '',
		'border-top-width'    => '',
		'border-bottom-width' => '',
		'border-left-width'   => '',
		'border-right-width'  => ''
	);
	$controls = themesflat_decode( $control );
	if ( ! is_array( $controls ) ) {
		$controls = array();
	}
	$controls = array_merge( $default, $controls );
	?>
    <div class="themesflat_box_control">
        <div class="themesflat_box_position">
            <div class="themesflat_box_margin">
                <label class="themesflat_box_label"><?php echo esc_html( 'Margin' ); ?></label>
                <input placeholder="-" data-position='margin-top'
                       value="<?php themesflat_esc_attr( ( $controls['margin-top'] ) ); ?>" class="top" type="text"/>
                <input placeholder="-" data-position='margin-bottom'
                       value="<?php themesflat_esc_attr( ( $controls['margin-bottom'] ) ); ?>" class="bottom"
                       type="text"/>
                <input placeholder="-" data-position='margin-left'
                       value="<?php themesflat_esc_attr( ( $controls['margin-left'] ) ); ?>" class="left" type="text"/>
                <input placeholder="-" data-position='margin-right'
                       value="<?php themesflat_esc_attr( ( $controls['margin-right'] ) ); ?>" class="right"
                       type="text"/>
            </div>

            <div class="themesflat_box_padding">
                <label class="themesflat_box_label"><?php echo esc_html( 'Padding' ); ?></label>
                <input placeholder="-" data-position='padding-top'
                       value="<?php themesflat_esc_attr( ( $controls['padding-top'] ) ); ?>" class="top" type="text"/>
                <input placeholder="-" data-position='padding-bottom'
                       value="<?php themesflat_esc_attr( ( $controls['padding-bottom'] ) ); ?>" class="bottom"
                       type="text"/>
                <input placeholder="-" data-position='padding-left'
                       value="<?php themesflat_esc_attr( ( $controls['padding-left'] ) ); ?>" class="left" type="text"/>
                <input placeholder="-" data-position='padding-right'
                       value="<?php themesflat_esc_attr( ( $controls['padding-right'] ) ); ?>" class="right"
                       type="text"/>
            </div>

            <div class="themesflat_box_border">
                <label class="themesflat_box_label"><?php echo esc_html( 'Border' ); ?></label>
                <input placeholder="-" data-position='border-top-width'
                       value="<?php themesflat_esc_attr( ( $controls['border-top-width'] ) ); ?>" class="top"
                       type="text"/>
                <input placeholder="-" data-position='border-bottom-width'
                       value="<?php themesflat_esc_attr( ( $controls['border-bottom-width'] ) ); ?>" class="bottom"
                       type="text"/>
                <input placeholder="-" data-position='border-left-width'
                       value="<?php themesflat_esc_attr( ( $controls['border-left-width'] ) ); ?>" class="left"
                       type="text"/>
                <input placeholder="-" data-position='border-right-width'
                       value="<?php themesflat_esc_attr( ( $controls['border-right-width'] ) ); ?>" class="right"
                       type="text"/>
            </div>
            <div class="themesflat_control_logo"></div>
        </div>
    </div>
    <input name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $id ); ?>"
           value="<?php echo esc_attr( json_encode( $controls ) ); ?>" type="hidden"/>
	<?php
}

function themesflat_color_picker_control( $title, $control ) {
	$output = '<span class="themesflat-options-control-title">' . esc_attr( $title ) . '</span>
                <div class="background-color">
                    <div class="themesflat-options-control-color-picker">
                        <div class="themesflat-options-control-inputs">
                            <input type="text" class="themesflat-color-picker" id="' . esc_attr( $control['name'] ) . '-color" name="' . esc_attr( $control['name'] ) . '" data-default-color value="' . esc_attr( $control['color'] ) . '" />
                        </div>
                    </div>
                </div>';

	return $output;
}

function themesflat_available_icons( $name = 'icon' ) {
	$icon_types = array(
		$name . '_type'         => 'fontawesome',
		$name . '_fontawesome'  => '',
		$name . '_openiconic'   => '',
		$name . '_typicons'     => '',
		$name . '_entypo'       => '',
		$name . '_linecons'     => '',
		$name . '_monosocial'   => '',
		$name . '_material'     => '',
		$name . '_simpleline'   => '',
		$name . '_ionicons'     => '',
		$name . '_eleganticons' => '',
		$name . '_themifyicons' => '',
		$name . '_icomoon'      => ''
	);

	return $icon_types;
}

function themesflat_custom_button_color( $color = '' ) {
	$color = $color == '' ? themesflat_get_opt( 'primary_color' ) : $color;

	return $color;
}

function themesflat_render_post( $blog_layout, $readmore = '[...]', $length = '' ) {
	if ( $length != '' ) {
		global $themesflat_length;
		$themesflat_length = $length;
		add_filter( 'excerpt_length', 'themesflat_special_excerpt', 1000 );
	}
	$button_type  = array(
		'blog-grid' => 'no-background',
		'blog-list' => '',
	);
	$_button_type = $button_type[ $blog_layout ];
	if ( strpos( get_the_content(), 'more-link' ) === false ) {
		add_filter( 'excerpt_more', 'themesflat_excerpt_not_more' );
		the_excerpt();
		if ( $readmore != '[...]' ) {
			echo '<div class="themesflat-button-container"><a class="themesflat-button themesflat-archive ' . esc_attr( $_button_type ) . '" href="' . get_the_permalink() . '" rel="nofollow">' . $readmore . '</a></div>';
			add_filter( 'excerpt_more', 'themesflat_excerpt_more' );
		}
	} else {
		if ( $readmore != '[...]' ) {
			the_content( '[...]' );
			echo '<div class="themesflat-button-container"><a class="themesflat-button themesflat-archive ' . esc_attr( $_button_type ) . '" href="' . get_the_permalink() . '" rel="nofollow">' . $readmore . '</a></div>';
		} else {
			the_content( $readmore );
		}
	}
}

function themesflat_excerpt_more( $more ) {
	return '';
}

function themesflat_excerpt_not_more( $more ) {
	return '';
}

function themesflat_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );

	return $link;
}

add_filter( 'the_content_more_link', 'themesflat_remove_more_link_scroll' );

function themesflat_special_excerpt( $length ) {
	global $themesflat_length;

	return $themesflat_length;
}

function themesflat_predefined_header_styles() {
	static $styles;

	if ( empty( $styles ) ) {
		$styles = apply_filters( 'themesflat/header_styles', array(
			'header-v1' => esc_html__( 'Classic', 'lowlead' ),
			'header-v2' => esc_html__( 'Header style 02', 'lowlead' ),
			'header-v4' => esc_html__( 'Modern', 'lowlead' ),
		) );
	}

	return $styles;
}

/**
 * Render header style this theme
 *
 * @return  array
 */
function themesflat_render_header_styles() {
	static $header_style;

	if ( themesflat_meta( 'custom_header' ) == 1 ) {
		$header_style = themesflat_meta( 'header_style' );
	} else {
		$header_style = get_theme_mod( 'header_style', 'Header-v1' );
	}

	return $header_style;
}

function themesflat_available_social_icons() {
	$icons = apply_filters( 'themesflat_available_icons', array(
		'twitter'        => array(
			'iclass'     => 'twitter',
			'title'      => 'Twitter',
			'share_link' => THEMESFLAT_PROTOCOL . '://twitter.com/intent/tweet?url='
		),
		'facebook-f'     => array(
			'iclass'     => 'facebook-f',
			'title'      => 'Facebook',
			'share_link' => THEMESFLAT_PROTOCOL . '://www.facebook.com/sharer/sharer.php?u='
		),
		'google-plus-g'  => array(
			'iclass'     => 'google-plus-g',
			'title'      => 'Google Plus',
			'share_link' => THEMESFLAT_PROTOCOL . '://plus.google.com/share?url='
		),
		'pinterest'      => array(
			'iclass'     => 'pinterest',
			'title'      => 'Pinterest',
			'share_link' => THEMESFLAT_PROTOCOL . '://pinterest.com/pin/create/bookmarklet/?url='
		),
		'instagram'      => array(
			'iclass'     => 'instagram',
			'title'      => 'Instagram',
			'share_link' => 'https://www.instagram.com/?url='
		),
		'youtube'        => array( 'iclass' => 'youtube', 'title' => 'Youtube', 'share_link' => '' ),
		'vimeo'          => array( 'iclass' => 'vimeo-square', 'title' => 'Vimeo', 'share_link' => '' ),
		'linkedin'       => array(
			'iclass'     => 'linkedin',
			'title'      => 'LinkedIn',
			'share_link' => THEMESFLAT_PROTOCOL . '://www.linkedin.com/shareArticle?url='
		),
		'behance'        => array( 'iclass' => 'behance', 'title' => 'Behance', 'share_link' => '' ),
		'bitcoin'        => array( 'iclass' => 'bitcoin', 'title' => 'Bitcoin', 'share_link' => '' ),
		'bitbucket'      => array( 'iclass' => 'bitbucket', 'title' => 'BitBucket', 'share_link' => '' ),
		'codepen'        => array( 'iclass' => 'codepen', 'title' => 'Codepen', 'share_link' => '' ),
		'delicious'      => array(
			'iclass'     => 'delicious',
			'title'      => 'Delicious',
			'share_link' => THEMESFLAT_PROTOCOL . '://delicious.com/save?url='
		),
		'deviantart'     => array( 'iclass' => 'deviantart', 'title' => 'DeviantArt', 'share_link' => '' ),
		'digg'           => array(
			'iclass'     => 'digg',
			'title'      => 'Digg',
			'share_link' => 'http://digg.com/submit?url='
		),
		'dribbble'       => array( 'iclass' => 'dribbble', 'title' => 'Dribbble', 'share_link' => '' ),
		'flickr'         => array( 'iclass' => 'flickr', 'title' => 'Flickr', 'share_link' => '' ),
		'foursquare'     => array( 'iclass' => 'foursquare', 'title' => 'Foursquare', 'share_link' => '' ),
		'github'         => array( 'iclass' => 'github-alt', 'title' => 'Github', 'share_link' => '' ),
		'jsfiddle'       => array( 'iclass' => 'jsfiddle', 'title' => 'JSFiddle', 'share_link' => '' ),
		'reddit'         => array(
			'iclass'     => 'reddit',
			'title'      => 'Reddit',
			'share_link' => THEMESFLAT_PROTOCOL . '://reddit.com/submit?url='
		),
		'skype'          => array(
			'iclass'     => 'skype',
			'title'      => 'Skype',
			'share_link' => THEMESFLAT_PROTOCOL . '://web.skype.com/share?url='
		),
		'slack'          => array( 'iclass' => 'slack', 'title' => 'Slack', 'share_link' => '' ),
		'soundcloud'     => array( 'iclass' => 'soundcloud', 'title' => 'SoundCloud', 'share_link' => '' ),
		'spotify'        => array( 'iclass' => 'spotify', 'title' => 'Spotify', 'share_link' => '' ),
		'stack-exchange' => array( 'iclass' => 'stack-exchange', 'title' => 'Stack Exchange', 'share_link' => '' ),
		'stack-overflow' => array( 'iclass' => 'stack-overflow', 'title' => 'Stach Overflow', 'share_link' => '' ),
		'steam'          => array( 'iclass' => 'steam', 'title' => 'Steam', 'share_link' => '' ),
		'stumbleupon'    => array(
			'iclass'     => 'stumbleupon',
			'title'      => 'Stumbleupon',
			'share_link' => 'http://www.stumbleupon.com/submit?url='
		),
		'tumblr'         => array(
			'iclass'     => 'tumblr',
			'title'      => 'Tumblr',
			'share_link' => THEMESFLAT_PROTOCOL . '://www.tumblr.com/widgets/share/tool?canonicalUrl='
		)
	) );

	$icons['__ordering__'] = array_keys( $icons );

	return $icons;
}

/**
 * Menu fallback
 */
function themesflat_menu_fallback() {
	if ( ! current_user_can( 'administrator' ) ) {
		return;
	}
	echo '<ul id="menu-main" class="menu">
    <li>
    <a class="menu-fallback" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Create a Menu', 'lowlead' ) . '</a></li></ul>';
}

function themesflat_esc_attr( $attr ) {
	echo esc_attr( $attr );
}

function themesflat_esc_html( $attr ) {
	echo esc_html( $attr );
}

/**
 * Change the excerpt length
 */
function themesflat_excerpt_length( $length ) {
	$excerpt = themesflat_get_opt( 'blog_archive_post_excepts_length' );

	return $excerpt;
}

add_filter( 'excerpt_length', 'themesflat_excerpt_length', 999 );

/**
 * Blog layout
 */
function themesflat_blog_layout() {
	switch ( get_post_type() ) {
		case 'page':
			$layout = themesflat_get_opt_elementor( 'page_sidebar_layout' );
			break;
		case 'post':
			$layout = themesflat_get_opt( 'sidebar_layout' );
			if ( is_single() ) {
				$layout = themesflat_get_opt( 'single_sidebar_layout' );
			}
			if ( isset( $_GET['blog_layout'] ) ) {
				$layout = $_GET['blog_layout'];
			}
			break;
		case 'practise_area':
			$layout = themesflat_get_opt( 'practise_area_layout' );
			if ( is_single() ) {
				$layout = themesflat_get_opt( 'practise_area_single_layout' );
			}
			if ( isset( $_GET['practise_layout'] ) ) {
				$layout = $_GET['practise_layout'];
			}
			break;
		case 'case_study':
			$layout = themesflat_get_opt( 'case_study_layout' );
			if ( is_single() ) {
				$layout = themesflat_get_opt( 'case_study_single_layout' );
			}
			break;
		case 'attorneys':
			$layout = themesflat_get_opt( 'attorneys_layout' );
			if ( is_single() ) {
				$layout = themesflat_get_opt( 'attorneys_single_layout' );
			}
			break;
		case 'gallery':
			$layout = themesflat_get_opt( 'gallery_layout' );
			break;
		default:
			$layout = themesflat_get_opt( 'page_sidebar_layout' );
			break;

	}

	if ( is_search() ) {
		$layout = themesflat_get_opt( 'sidebar_layout' );
	}

	return $layout;
}

function themesflat_font_style( $style ) {
	if ( strlen( $style ) > 3 ) {
		switch ( substr( $style, 0, 3 ) ) {
			case 'reg':
				$a[0] = '400';
				$a[1] = 'normal';
				break;
			case 'ita':
				$a[0] = '400';
				$a[1] = 'italic';
				break;
			default:
				$a[0] = substr( $style, 0, 3 );
				$a[1] = substr( $style, 3 );
				break;
		}

	} else {
		$a[0] = $style;
		$a[1] = 'normal';
	}

	return $a;
}

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 *
	 * @return string The filtered title.
	 */
	function themesflat_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'lowlead' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'themesflat_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		function themesflat_render_title() {
			?>
            <title><?php wp_title( '|', true, 'right' ); ?></title>
			<?php
		}

		add_action( 'wp_head', 'themesflat_render_title' );
	}

endif;

function themesflat_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if ( empty( $color ) ) {
		return $default;
	}

	//Sanitize $color if "#" is provided
	if ( $color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if ( strlen( $color ) == 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb = array_map( 'hexdec', $hex );

	//Check if opacity is set(rgba or rgb)
	if ( $opacity ) {
		if ( abs( $opacity ) > 1 ) {
			$opacity = 1.0;
		}
		$output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
	} else {
		$output = 'rgb(' . implode( ",", $rgb ) . ')';
	}

	//Return rgb(a) color string
	return $output;
}

function themesflat_render_box_position( $class, $box_control, $custom_string = '', $important = false ) {
	$atrr = '';
	$css  = '';
	if ( is_array( $box_control ) ) {
		foreach ( $box_control as $key => $value ) {
			if ( $value != '' ) {
				$ipt = '';
				if ( $important == true ) {
					$ipt = '!important';
				}
				$atrr .= esc_attr( $key ) . ':' . esc_attr( str_replace( "px", "", $value ) ) . 'px ' . $ipt . '; ';
			}
		}
	}
	if ( $atrr != '' ) {
		$css = esc_attr( $class ) . '{';
		$css .= $atrr;
		$css .= esc_attr( $custom_string );
		$css .= '}';
	}

	wp_add_inline_style( 'themesflat-inline-css', $css );
}

function themesflat_render_box_position_tablet( $class, $box_control, $break_point, $custom_string = '', $important = false ) {
	$atrr = '';
	$css  = '';
	if ( empty( $break_point ) ) {
		return;
	}

	if ( is_array( $box_control ) ) {
		foreach ( $box_control as $key => $value ) {
			if ( $value != '' ) {
				$ipt = '';
				if ( $important == true ) {
					$ipt = '!important';
				}
				$atrr .= esc_attr( $key ) . ':' . esc_attr( str_replace( "px", "", $value ) ) . 'px ' . $ipt . '; ';
			}
		}
	}
	if ( $atrr != '' ) {
		$css = esc_attr( '@media only screen and (' . $break_point . ')' ) . '{';
		$css .= esc_attr( $class ) . '{';
		$css .= $atrr;
		$css .= esc_attr( $custom_string );
		$css .= '}';
		$css .= '}';
	}

	wp_add_inline_style( 'themesflat-inline-css', $css );
}

function themesflat_render_style( $class, $custom_string = '' ) {
	$css = esc_attr( $class ) . '{';
	if ( is_array( $custom_string ) ) {
		foreach ( $custom_string as $key => $value ) {
			if ( $value != '' ) {
				$css .= esc_attr( $key ) . ':' . esc_attr( $value );
			}
		}
	} else {
		$css .= esc_attr( $custom_string );
	}
	$css .= '}';
	add_action( 'wp_enqueue_scripts', 'themesflat_add_custom_styles', 10, $css );
}

function themesflat_add_custom_styles( $custom ) {
	echo 'inhere';
	wp_add_inline_style( 'themesflat-inline-css', '.testimagebox{}' );
}

function themesflat_render_attrs( $atts, $echo = true ) {
	$attr = '';
	if ( is_array( $atts ) ) {
		foreach ( $atts as $key => $value ) {
			if ( $value != '' ) {
				$attr .= $key . '="' . esc_attr( $value ) . '" ';
			}
		}
	}
	if ( $echo == true ) {
		echo esc_attr( $attr );
	}

	return $attr;
}

function themesflat_get_json( $key ) {
	if ( get_theme_mod( $key ) == '' ) {
		return themesflat_customize_default( $key );
	}
	if ( ! is_array( get_theme_mod( $key ) ) ) {
		$decoded_value = json_decode( str_replace( '&quot;', '"', get_theme_mod( $key ) ), true );
	} else {
		$decoded_value = get_theme_mod( $key );
	}

	return $decoded_value;
}

function themesflat_decode( $value ) {
	if ( ! is_array( $value ) ) {
		$decoded_value = json_decode( str_replace( '&quot;', '"', $value ), true );
	} else {
		$decoded_value = $value;
	}

	return $decoded_value;
}

function themesflat_dynamic_sidebar( $sidebar ) {
	if ( is_active_sidebar( $sidebar ) ) {
		dynamic_sidebar( $sidebar );
	}
}

/**
 * Get post meta, using rwmb_meta() function from Meta Box class
 */
function themesflat_meta( $key, $ID = '' ) {
	global $post;
	if ( $ID == '' && ! is_null( $post ) ) :
		return get_post_meta( $post->ID, $key, true );
	else:
		return get_post_meta( $ID, $key, true );
	endif;
}

function themesflat_get_opt( $key ) {
	return get_theme_mod( $key, themesflat_customize_default( $key ) );
}

function themesflat_get_option( $key ) {
	if ( $key == '' ) {
		return;
	}
	$values = themesflat_get_opt( $key );
	if ( themesflat_get_opt_elementor( $key ) != '' ) {
		$values = themesflat_get_opt_elementor( $key );
	}

	return $values;
}

function themesflat_get_url_option( $key ) {
	if ( $key == '' ) {
		return;
	}
	$values = themesflat_get_opt( $key );
	if ( ! empty( themesflat_get_opt_elementor( $key ) ) ) {
		if ( themesflat_get_opt_elementor( $key )['url'] != '' ) {
			$values = themesflat_get_opt_elementor( $key )['url'];
		}
	}

	return $values;
}

function themesflat_acf_opt( $key, $ID = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$acf_field = get_field( $key );
	} else {
		$acf_field = '';
	}

	if ( function_exists( 'get_field' ) && isset( $acf_field ) ) {
		if ( is_array( $acf_field ) ) {
			$values = '';
			foreach ( $acf_field as $value ) {
				$values .= $value;
			}
			if ( empty( $values ) ) {
				return themesflat_get_opt( $key );
			} else {
				return themesflat_acf_get_field( $key );
			}
		} else if ( empty( $acf_field ) ) {
			return themesflat_customize_default( $key );
		} else {
			return themesflat_acf_get_field( $key );
		}

	} else {
		return themesflat_get_opt( $key );
	}
}

function themesflat_get_field_acf( $key, $ID = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$acf_field = get_field( $key, $ID );
	} else {
		$acf_field = '';
	}

	return $acf_field;
}

add_filter( 'acf/load_field/name=my_field_name', 'themesflat_acf_get_field' );
function themesflat_acf_get_field( $key ) {
	return get_field( $key );
}

function themesflat_load_page_menu( $params ) {
	if ( themesflat_meta( 'enable_custom_navigator' ) == 1 && themesflat_meta( 'menu_location_primary' ) != false ) {
		if ( $params['theme_location'] == 'primary' ) {
			$params['menu'] = (int) themesflat_meta( 'menu_location_primary' );
		}
	}

	return ( $params );
}

add_filter( 'wp_nav_menu_args', 'themesflat_load_page_menu' );

function themesflat_render_social( $prefix = '', $value = '', $show_title = false ) {
	if ( $value == '' ) {
		$value = themesflat_get_json( 'social_links' );
	}
	$class   = array();
	$class[] = ( $show_title == false ? 'themesflat-socials' : 'themesflat-widget-socials' );

	if ( ! is_array( $value ) ) {
		$decoded_value = json_decode( str_replace( '&quot;', '"', $value ), true );
		$value         = is_array( $decoded_value ) ? $decoded_value : array();
	}

	$icons = themesflat_available_social_icons();

	?>
    <ul class="<?php echo esc_attr( implode( " ", $class ) ); ?>">
		<?php
		foreach ( $value as $key => $val ) {
			if ( $key != '__ordering__' ) {
				$title = ( $show_title == false ? '' : $icons[ $key ]['title'] );
				printf(
					'<li class="%1$s">
                        <a href="%2$s" target="_blank" rel="alternate" title="%4$s">
                            <i class="tf_social_icon-%4$s"></i>
                        </a>
                    </li>',
					esc_attr( $key ),
					esc_url( $val ),
					esc_attr( $val ),
					esc_attr( $key ),
					esc_html( $title )
				);
			}
		}
		?>
    </ul><!-- /.social -->
	<?php
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function themesflat_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'themesflat_pingback_header' );

function themesflat_preload( $preload ) {
	switch ( $preload ) {
		case 'preload-1':
			return printf( '<div class="loader-icon"></div>' );
			break;
		case 'preload-2':
			return printf( '<div class="spin-load-holder"><span class="spin-load-1"></span></div>' );
			break;
		case 'preload-3':
			return printf( ' 
                <div class="load-holder">
                    <div class="cssload-loader">
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                    </div>
                </div>' );
			break;
		case 'preload-4':
			return printf(
				'<div class="load-holder">
                    <div class="sk-circle">
                      <div class="sk-circle1 sk-child"></div>
                      <div class="sk-circle2 sk-child"></div>
                      <div class="sk-circle3 sk-child"></div>
                      <div class="sk-circle4 sk-child"></div>
                      <div class="sk-circle5 sk-child"></div>
                      <div class="sk-circle6 sk-child"></div>
                      <div class="sk-circle7 sk-child"></div>
                      <div class="sk-circle8 sk-child"></div>
                      <div class="sk-circle9 sk-child"></div>
                      <div class="sk-circle10 sk-child"></div>
                      <div class="sk-circle11 sk-child"></div>
                      <div class="sk-circle12 sk-child"></div>
                    </div>
                </div>' );
			break;
		case 'preload-5':
			return printf( '<div class="load-holder"><span class="load"></span></div>' );
			break;
		case 'preload-6':
			return printf( '<div class="pulse-loader"><div class="double-bounce3"></div><div class="double-bounce4"></div></div>' );
			break;
		case 'preload-7':
			return printf( '<div class="saquare-loader-1"></div>' );
			break;
		case 'preload-8':
			return printf(
				'<div class="line-loader">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>' );
			break;
		default:
			return printf( '<div class="loader-icon"></div>' );
			break;
	}
}

function themesflat_preload_hook() {
	// Preloader
	if ( themesflat_get_opt( 'enable_preload' ) == 1 ): ?>
        <div id="preloader">
            <div class="row loader">
				<?php themesflat_preload( themesflat_get_opt( 'preload' ) ); ?>
            </div>
        </div>
	<?php endif;

	if ( themesflat_get_opt( 'go_top' ) == 1 ) : ?>
        <!-- Go Top -->
        <a class="go-top">
            <i class="tf_social_icon-chevron-up"></i>
        </a>
	<?php endif;

	get_template_part( 'tpl/header/aside-toggler' );
}

add_action( 'wp_body_open', 'themesflat_preload_hook' );

/* Themesflat Language Switch */
if ( ! function_exists( 'themesflat_language_switch' ) ) {
	function themesflat_language_switch() { ?>
        <div class="flat-language languages">
			<?php if ( ! empty( $languages_sidebar ) ): ?>
				<?php themesflat_dynamic_sidebar( 'languages-sidebar' ); ?>
			<?php else: ?>
                <ul class="unstyled">
                    <li class="current">
                        <a href="?lang=en" class="lang_sel_sel">
                            <span class="languages-before-icon fa fa-globe"></span><?php echo esc_html__( "English", 'lowlead' ); ?>
                            <i class="far fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <ul class="unstyled-child">
                            <li class="icl-en">
                                <a href="?lang=en" class="lang_sel_sel">
									<?php echo esc_html__( "English", 'lowlead' ); ?>
                                </a>
                            </li>
                            <li class="icl-fr fr">
                                <a href="?lang=fr" class="lang_sel_other">
									<?php echo esc_html__( "French", 'lowlead' ); ?>
                                </a>
                            </li>
                            <li class="icl-ge ge">
                                <a href="?lang=it" class="lang_sel_other">
									<?php echo esc_html__( "German", 'lowlead' ); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
			<?php endif; ?>
        </div>
	<?php }
}

function themesflat_kses_allowed_html() {
	$allowed_tags = array(
		'a'          => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
		),
		'abbr'       => array(
			'class' => array(),
			'title' => array(),
		),
		'b'          => array(),
		'blockquote' => array(
			'class' => array(),
			'cite'  => array(),
		),
		'cite'       => array(
			'class' => array(),
			'title' => array(),
		),
		'code'       => array(
			'class' => array(),
		),
		'del'        => array(
			'datetime' => array(),
			'title'    => array(),
		),
		'bdi'        => array(
			'class' => array(),
		),
		'dd'         => array(),
		'div'        => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'dl'         => array(
			'class' => array(),
		),
		'dt'         => array(
			'class' => array(),
		),
		'em'         => array(
			'class' => array(),
		),
		'h1'         => array(
			'class' => array(),
			'style' => array(),
		),
		'h2'         => array(
			'class' => array(),
			'style' => array(),
		),
		'h3'         => array(
			'class' => array(),
			'style' => array(),
		),
		'h4'         => array(
			'class' => array(),
			'style' => array(),
		),
		'h5'         => array(
			'class' => array(),
			'style' => array(),
		),
		'h6'         => array(
			'class' => array(),
			'style' => array(),
		),
		'i'          => array(
			'class' => array(),
		),
		'img'        => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
		),
		'li'         => array(
			'class' => array(),
			'style' => array(),
		),
		'ol'         => array(
			'class' => array(),
		),
		'p'          => array(
			'class' => array(),
			'style' => array(),
		),
		'q'          => array(
			'cite'  => array(),
			'title' => array(),
			'class' => array(),
		),
		'span'       => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'strike'     => array(
			'class' => array(),
		),
		'strong'     => array(
			'class' => array(),
		),
		'ul'         => array(
			'class' => array(),
			'style' => array(),
		),
		'input'      => array(
			'class'                       => array(),
			'id'                          => array(),
			'type'                        => array(),
			'value'                       => array(),
			'data-customize-setting-link' => array(),
			'placeholder'                 => array(),
			'name'                        => array(),
			'tabindex'                    => array(),
			'size'                        => array(),
			'aria-required'               => array(),
		),
		'label'      => array(
			'class' => array(),
			'style' => array(),
			'for'   => array(),
		),
		'mark'       => array(
			'class' => array(),
		),
	);

	return $allowed_tags;
}

add_filter( 'wp_kses_allowed_html', 'themesflat_kses_allowed_html', 10, 2 );


function themesflat_change_post_types_slug( $args, $post_type ) {
	if ( 'practise_area' === $post_type ) {
		$args['rewrite']['slug'] = themesflat_get_opt( 'practise_area_slug' );
	}
	if ( 'case_study' === $post_type ) {
		$args['rewrite']['slug'] = themesflat_get_opt( 'case_study_slug' );
	}
	if ( 'attorneys' === $post_type ) {
		$args['rewrite']['slug'] = themesflat_get_opt( 'attorneys_slug' );
	}
	if ( 'gallery' === $post_type ) {
		$args['rewrite']['slug'] = themesflat_get_opt( 'gallery_slug' );
	}

	return $args;
}

add_filter( 'register_post_type_args', 'themesflat_change_post_types_slug', 10, 2 );

function themesflat_change_archive_titles( $orig_title ) {
	global $post;
	if ( $post ) {
		$post_type = $post->post_type;
	} else {
		$post_type = '';
	}

	$types = array(
		array(
			'post_type' => 'practise_area',
			'title'     => themesflat_get_opt( 'practise_area_name' )
		),
		array(
			'post_type' => 'case_study',
			'title'     => themesflat_get_opt( 'case_study_name' )
		),
		array(
			'post_type' => 'attorneys',
			'title'     => themesflat_get_opt( 'attorneys_name' )
		),
	);

	if ( is_post_type_archive() ) {
		foreach ( $types as $k => $v ) {
			if ( in_array( $post_type, $types[ $k ] ) ) {
				return $types[ $k ]['title'];
			}
		}

	} else {
		return $orig_title;
	}
}

add_filter( 'wp_title', 'themesflat_change_archive_titles' );

function themesflat_layout_draganddrop( $blocks ) {
	if ( ! is_array( $blocks ) ) {
		$blocks = explode( ',', $blocks );
	}
	$blocks = array_combine( $blocks, $blocks );

	return $blocks;
}

function themesflat_custom_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
   <div class="input-group">
    <input type="search" value="' . get_search_query() . '" name="s" class="s" placeholder="' . esc_html__( "Search…", "lowlead" ) . '"/>
 <button type="submit" class="search-submit"><i class="far fa-search"></i></button>
</div>
    </form>';

	return $form;
}

add_filter( 'get_search_form', 'themesflat_custom_search_form' );

function themesflat_categories_postcount_filter( $variable ) {
	$variable = str_replace( '</a> (', '<span> ', $variable );
	$variable = str_replace( ')', '</span></a>', $variable );

	return $variable;
}

add_filter( 'wp_list_categories', 'themesflat_categories_postcount_filter' );

function themesflat_archive_postcount_filter( $variable ) {
	$variable = str_replace( '</a>&nbsp;(', '<span>', $variable );
	$variable = str_replace( ')', '</span></a>', $variable );

	return $variable;
}

add_filter( 'get_archives_link', 'themesflat_archive_postcount_filter' );


add_filter( 'woocommerce_subcategory_count_html', 'filter_woocommerce_subcategory_count_html', 10, 2 );
function filter_woocommerce_subcategory_count_html( $html, $category ) {
	$html = '<mark class="count">' . esc_html( $category->count ) . '</mark>';

	return $html;
}

function themesflat_social_single() {
	if ( themesflat_get_opt( 'show_social_share' ) == 1 ):
		$value = themesflat_get_json( 'social_links' );
		$sharelink = themesflat_available_social_icons();
		?>
        <div class="social-share-article"><span><?php echo esc_html__( 'Share :', 'lowlead' ); ?></span>
            <ul class="themesflat-socials">
				<?php
				foreach ( $value as $key => $val ) {
					if ( $key != '__ordering__' ) {
						$link = $sharelink[ $key ]['share_link'] . get_the_permalink();
						printf(
							'<li class="%1$s">
                                    <a href="%2$s" target="_blank" rel="alternate" title="%1$s">
                                        <i class="tf_social_icon-%4$s"></i>
                                    </a>
                                </li>',
							esc_attr( $key ),
							esc_url( $link ),
							esc_attr( $link ),
							esc_attr( $key )
						);
					}
				}
				?>
            </ul>
        </div>
	<?php
	endif;
}

function themesflat_get_page_titles() {
	$title = '';

	if ( ! is_archive() ) {
		if ( is_home() ) {
			if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
				$title = get_post_meta( $page_for_posts, 'custom_title', true );
				if ( empty( $title ) ) {
					$title = get_the_title( $page_for_posts );
				}
			}
			if ( is_front_page() ) {
				if ( themesflat_get_opt( 'blog_featured_title' ) != '' ) {
					$title = themesflat_get_opt( 'blog_featured_title' );
				} else {
					$title = esc_html__( 'Blog', 'lowlead' );
				}
			}
		} elseif ( is_page() ) {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		} elseif ( is_404() ) {
			$title = esc_html__( '404', 'lowlead' );
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search results for &#8220;%s&#8221;', 'lowlead' ), get_search_query() );
		} else {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
			if ( is_single() && get_post_type() == 'post' && themesflat_get_opt( 'blog_featured_title' ) != '' ) {
				$title = themesflat_get_opt( 'blog_featured_title' );
			} elseif ( is_single() && get_post_type() == 'services' && themesflat_get_opt( 'services_featured_title' ) != '' ) {
				$title = themesflat_get_opt( 'services_featured_title' );
			} elseif ( is_single() && get_post_type() == 'project' && themesflat_get_opt( 'project_featured_title' ) != '' ) {
				$title = themesflat_get_opt( 'project_featured_title' );
			} elseif ( is_single() && get_post_type() == 'portfolios' && themesflat_get_opt( 'portfolios_featured_title' ) != '' ) {
				$title = themesflat_get_opt( 'portfolios_featured_title' );
			} elseif ( is_single() && get_post_type() == 'doctor' && themesflat_get_opt( 'doctor_featured_title' ) != '' ) {
				$title = themesflat_get_opt( 'doctor_featured_title' );
			}
		}
	} else {
		if ( is_author() ) {
			the_post();
			$title = sprintf( esc_html__( 'Author: %s', 'lowlead' ), get_the_author() );
			rewind_posts();
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( 'Daily: %s', 'lowlead' ), get_the_date() );
		} elseif ( is_month() ) {
			$title = sprintf( esc_html__( 'Monthly: %s', 'lowlead' ), get_the_date( 'F Y' ) );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( 'Yearly: %s', 'lowlead' ), get_the_date( 'Y' ) );
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search results for &#8220;%s&#8221;', 'lowlead' ), get_search_query() );
		} elseif ( is_post_type_archive( 'practise_area' ) ) {
			$title = post_type_archive_title( '', false );
			if ( themesflat_get_opt( 'practise_area_name' ) != '' ) {
				$title = themesflat_get_opt( 'practise_area_name' );
			}
		} elseif ( is_post_type_archive( 'case_study' ) ) {
			$title = post_type_archive_title( '', false );
			if ( themesflat_get_opt( 'case_study_name' ) != '' ) {
				$title = themesflat_get_opt( 'case_study_name' );
			}
		} elseif ( is_post_type_archive( 'attorneys' ) ) {
			$title = post_type_archive_title( '', false );
			if ( themesflat_get_opt( 'attorneys_name' ) != '' ) {
				$title = themesflat_get_opt( 'attorneys_name' );
			}
		} elseif ( is_post_type_archive( 'gallery' ) ) {
			$title = post_type_archive_title( '', false );
			if ( themesflat_get_opt( 'gallery_name' ) != '' ) {
				$title = themesflat_get_opt( 'gallery_name' );
			}
		} elseif ( is_tax() || is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		} else {
			$title = esc_html( wp_title( '', false ) );
		}
	}

	return array(
		'title' => $title,
	);
}

function themesflat_svg( $icon ) {
	$svg = array(
		'cart'     => '<i class="icon-lowleadadd-to-basket-1"></i>',
		'search'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
                        <path d="M20.3,0.9c-7.2,0-13,5.8-13,13c0,3.1,1.1,5.9,2.9,8.2l-8.6,8.6c-0.5,0.5-0.5,1.4,0,2s1.4,0.5,2,0l8.6-8.6
                        c2.2,1.8,5.1,2.9,8.2,2.9c7.2,0,13-5.8,13-13S27.5,0.9,20.3,0.9z M20.3,24.9c-6.1,0-11-4.9-11-11s4.9-11,11-11s11,4.9,11,11
                        S26.4,24.9,20.3,24.9z"/>
                    </svg>',
		'menu'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M28.5,4.5h-27C0.7,4.5,0,3.8,0,3s0.7-1.5,1.5-1.5h27C29.3,1.5,30,2.2,30,3S29.3,4.5,28.5,4.5z
                         M15,13.5H1.5C0.7,13.5,0,12.8,0,12s0.7-1.5,1.5-1.5H15c0.8,0,1.5,0.7,1.5,1.5S15.8,13.5,15,13.5z M28.5,22.5h-27
                        C0.7,22.5,0,21.8,0,21s0.7-1.5,1.5-1.5h27c0.8,0,1.5,0.7,1.5,1.5S29.3,22.5,28.5,22.5z"/>
                    </svg>',
		'wishlist' => '<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="240.000000pt" height="220.000000pt" viewBox="0 0 240.000000 220.000000">
                            <g transform="translate(0.000000,220.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M487 2185 c-160 -33 -322 -145 -400 -276 -61 -104 -81 -184 -81 -324
                            0 -109 3 -128 33 -215 54 -159 152 -316 319 -512 52 -62 263 -282 469 -488
                            l373 -375 373 375 c206 206 417 426 469 488 167 196 265 353 319 512 30 87 33
                            106 33 215 0 95 -4 134 -22 190 -30 96 -86 187 -155 252 -74 68 -140 106 -242
                            140 -67 22 -99 26 -195 27 -128 0 -198 -14 -301 -63 -83 -39 -188 -126 -236
                            -195 -21 -31 -40 -55 -43 -56 -3 0 -17 20 -33 44 -62 98 -196 196 -328 240
                            -103 35 -248 43 -352 21z m258 -99 c174 -41 315 -157 406 -331 24 -46 46 -85
                            49 -85 3 0 18 26 34 58 67 137 168 245 286 306 90 46 151 61 250 61 301 -2
                            508 -188 527 -475 15 -226 -114 -465 -451 -832 -144 -157 -631 -638 -646 -638
                            -15 0 -500 479 -646 638 -262 285 -402 503 -441 685 -27 127 -3 285 59 386
                            111 179 358 277 573 227z"/>
                            </g>
                            </svg>',
	);

	if ( array_key_exists( $icon, $svg ) ) {
		return $svg[ $icon ];
	} else {
		return null;
	}
}

function themesflat_the_permalink( $post = 0 ) {
	echo themesflat_get_permalink( $post );
}

function themesflat_get_permalink( $post = 0 ) {
	$data = get_permalink( $post );

	return $data;
}

function themesflat_resize( $args = array() ) {
	$default  = array(
		'image_id' => '',
		'width'    => '',
		'height'   => '',
		'crop'     => true,
		'retina'   => false,
		'resize'   => true
	);
	$settings = wp_parse_args( $args, $default );
	if ( $settings['image_id'] === '' ) {
		return array( 'url' => '', 'width' => $settings['width'], 'height' => $settings['height'] );
	}

	if ( $settings['retina'] ) {
		themesflat_resize_by_id( $settings['image_id'], $settings['width'], $settings['height'], $settings['crop'], true );
	}

	return themesflat_resize_by_id( $settings['image_id'], $settings['width'], $settings['height'], $settings['crop'], false );
}

function themesflat_resize_by_id( $attachment_id, $width = '', $height = '', $crop = true, $retina = false ) {
	$width      = intval( $width !== '' ? $width : get_option( 'thumbnail_size_w' ) );
	$height     = intval( $height !== '' ? $height : get_option( 'thumbnail_size_h' ) );
	$retina     = ( $retina === true ) ? 2 : 1;
	$orig_image = wp_get_attachment_image_src( $attachment_id, 'full' );

	if ( $orig_image === false ) {
		return array( 'url' => '', 'width' => $width, 'height' => $height );
	}
	$url         = $orig_image[0];
	$orig_width  = $orig_image[1];
	$orig_height = $orig_image[2];
	$file_path   = get_attached_file( $attachment_id );
	// Some additional info about the image.
	$info = pathinfo( $file_path );
	$dir  = $info['dirname'];
	$ext  = '';
	if ( ! empty( $info['extension'] ) ) {
		$ext = $info['extension'];
	}
	if ( $height === 0 ) {
		$height = round( ( $orig_height / $orig_width ) * $width );
		if ( $width >= $orig_width ) {
			return array(
				'url'    => $url,
				'width'  => $orig_width,
				'height' => $orig_height,
				'type'   => $ext,
				'path'   => $file_path
			);
		}
	}

	// Destination width and height variables
	$dest_width  = $width * $retina;
	$dest_height = $height * $retina;

	$name = wp_basename( $file_path, ".$ext" );

	// Suffix applied to filename.
	$suffix_retina = ( 1 != $retina ) ? '@' . $retina . 'x' : null;
	$suffix        = "{$width}x{$height}{$suffix_retina}";
	// Get the destination file name.
	$dest_file_name = "{$dir}/{$name}-{$suffix}.{$ext}";

	if ( ! file_exists( $dest_file_name ) ) {
		// Load Wordpress Image Editor.
		$editor = wp_get_image_editor( $file_path );
		if ( is_wp_error( $editor ) ) {
			return array( 'url' => $url, 'width' => $width, 'height' => $height );
		}
		$src_x = $src_y = 0;
		$src_w = $orig_width;
		$src_h = $orig_height;
		if ( $crop ) {
			$cmp_x = $orig_width / $dest_width;
			$cmp_y = $orig_height / $dest_height;
			// Calculate x or y coordinate, and width or height of source.
			if ( $cmp_x > $cmp_y ) {
				$src_w = round( $orig_width / $cmp_x * $cmp_y );
				$src_x = round( ( $orig_width - ( $orig_width / $cmp_x * $cmp_y ) ) / 2 );
			} elseif ( $cmp_y > $cmp_x ) {
				$src_h = round( $orig_height / $cmp_y * $cmp_x );
				$src_y = round( ( $orig_height - ( $orig_height / $cmp_y * $cmp_x ) ) / 2 );
			}
		}

		// Check if the file is writable before proceeding.
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		if ( ! $wp_filesystem->put_contents( $dest_file_name, '', FS_CHMOD_FILE ) ) {
			return array( 'url' => $url, 'width' => $orig_width, 'height' => $orig_height );
		}

		// Time to crop the image!
		$editor->crop( $src_x, $src_y, $src_w, $src_h, $dest_width, $dest_height );
		// Now let's save the image.
		$saved = $editor->save( $dest_file_name );
		// If saving fails, return the original image.
		if ( is_wp_error( $saved ) ) {
			return array( 'url' => $url, 'width' => $width, 'height' => $height );
		}

		// Get resized image information.
		$resized_url    = str_replace( basename( $url ), basename( $saved['path'] ), $url );
		$resized_width  = $saved['width'];
		$resized_height = $saved['height'];
		$resized_type   = $saved['mime-type'];
		// Add the resized dimensions to original image metadata (so we can delete our resized images when the original image is delete from the Media Library).
		$metadata = wp_get_attachment_metadata( $attachment_id );
		if ( isset( $metadata['image_meta'] ) ) {
			//$metadata['image_meta']['resized_images'][] = $resized_width . 'x' . $resized_height;
			$metadata['image_meta']['resized_images'][] = "{$name}-{$suffix}.{$ext}";
			wp_update_attachment_metadata( $attachment_id, $metadata );
		}
		$image_array = array(
			'url'    => $resized_url,
			'width'  => $resized_width,
			'height' => $resized_height,
			'type'   => $resized_type,
			'path'   => $dest_file_name,
		);
	} else {
		$image_array = array(
			'url'    => str_replace( wp_basename( $url ), wp_basename( $dest_file_name ), $url ),
			'width'  => $dest_width,
			'height' => $dest_height,
			'type'   => $ext,
			'path'   => $dest_file_name
		);
	}

	$retina_url                = file_exists( "{$dir}/{$name}-{$suffix}{$suffix_retina}.{$ext}" ) ? rtrim( $image_array['url'], ".{$ext}" ) . "@2x.{$ext}" : false;
	$image_array['retina_url'] = $retina_url;

	return $image_array;
}

function themesflat_get_image_sizes() {
	$data = apply_filters( 'themesflat_image_sizes', array() );

	return $data;
}

function themesflat_get_the_title( $post = 0 ) {

	$data = get_the_title( $post );

	return $data;
}

function themesflat_the_title_attribute( $args = '' ) {
	$args = wp_parse_args( $args, array(
		'before' => '',
		'after'  => '',
		'echo'   => true,
		'post'   => 0
	) );

	$title = themesflat_get_the_title( $args['post'] );

	if ( strlen( $title ) == 0 ) {
		return;
	}

	$title = $args['before'] . $title . $args['after'];

	if ( $args['echo'] ) {
		echo esc_attr( strip_tags( $title ) );
	} else {
		return esc_attr( strip_tags( $title ) );
	}
}

function themesflat_get_image_data( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'image_id'           => '',
		'image_size'         => 'thumbnail',
		'animated_thumbnail' => true
	) );
	if ( empty( $args['image_id'] ) ) {
		return false;
	}


	$output = array(
		'id'              => $args['image_id'],
		'url'             => '',
		'width'           => '',
		'height'          => '',
		'alt'             => get_post_meta( $args['image_id'], '_wp_attachment_image_alt', true ),
		'title'           => themesflat_the_title_attribute( array( 'echo' => false ) ),
		'caption'         => '',
		'description'     => '',
		'skip_smart_lazy' => false
	);


	if ( empty( $output['alt'] ) ) {
		$output['alt'] = themesflat_the_title_attribute( array( 'echo' => false ) );
	}

	$image_sizes = themesflat_get_image_sizes();
	if ( array_key_exists( $args['image_size'], $image_sizes ) ) {
		$size             = preg_split( '/x/', $image_sizes[ $args['image_size'] ] );
		$image_width      = isset( $size[0] ) ? intval( $size[0] ) : 0;
		$image_height     = isset( $size[1] ) ? intval( $size[1] ) : 0;
		$img              = themesflat_resize( array(
			'image_id' => $args['image_id'],
			'width'    => $image_width,
			'height'   => $image_height
		) );
		$output['url']    = $img['url'];
		$output['width']  = $img['width'];
		$output['height'] = $img['height'];


	} elseif ( preg_match( '/x/', $args['image_size'] ) ) {
		$size         = preg_split( '/x/', $args['image_size'] );
		$image_width  = isset( $size[0] ) ? intval( $size[0] ) : 0;
		$image_height = isset( $size[1] ) ? intval( $size[1] ) : 0;

		$img = themesflat_resize( array(
			'image_id' => $args['image_id'],
			'width'    => $image_width,
			'height'   => $image_height
		) );

		$output['url']    = $img['url'];
		$output['width']  = $img['width'];
		$output['height'] = $img['height'];
	} else {
		$img = wp_get_attachment_image_src( $args['image_id'], $args['image_size'] );
		if ( $img ) {
			$output['url']    = $img[0];
			$output['width']  = $img[1];
			$output['height'] = $img[2];
		}
	}

	if ( ! empty( $output['url'] ) && $args['animated_thumbnail'] ) {
		$file_type = wp_check_filetype( $output['url'] );
		if ( $file_type['ext'] === 'gif' ) {
			$img = wp_get_attachment_image_src( $args['image_id'], 'full' );
			if ( $img ) {
				$output['url']             = $img[0];
				$output['width']           = $img[1];
				$output['height']          = $img[2];
				$output['skip_smart_lazy'] = true;
			}
		}
	}

	$img_post = get_post( $args['image_id'] );

	if ( ! is_null( $img_post ) ) {
		$thumbnail['alt']         = get_post_meta( $args['image_id'], '_wp_attachment_image_alt', true );
		$thumbnail['caption']     = $img_post->post_excerpt;
		$thumbnail['description'] = $img_post->post_content;
	}

	return $output;

}

function themesflat_get_thumbnail_data( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'image_size'         => 'thumbnail',
		'animated_thumbnail' => true,
		'placeholder'        => '',
		'post'               => null
	) );


	$thumbnail_id = get_post_thumbnail_id( $args['post'] );


	$thumbnail = array(
		'id'              => '',
		'url'             => '',
		'width'           => '',
		'height'          => '',
		'alt'             => '',
		'caption'         => '',
		'description'     => '',
		'title'           => themesflat_the_title_attribute( array( 'echo' => false ) ),
		'skip_smart_lazy' => false
	);


	if ( ! empty( $thumbnail_id ) ) {
		$thumbnail = themesflat_get_image_data( array(
			'image_id'           => $thumbnail_id,
			'image_size'         => $args['image_size'],
			'animated_thumbnail' => $args['animated_thumbnail']
		) );

		if ( empty( $thumbnail['alt'] ) ) {
			$thumbnail['alt'] = themesflat_the_title_attribute( array( 'echo' => false ) );
		}

		return $thumbnail;
	} else {
		if ( ! empty( $args['placeholder'] ) ) {
			$thumbnail['url'] = $args['placeholder'];
		}

	}
	global $post;
	if ( isset( $post->post_content ) ) {
		if ( preg_match( "'<\s*img\s.*?src\s*=\s*
						([\"\'])?
						(?(1) (.*?)\\1 | ([^\s\>]+))'isx", $post->post_content, $matched ) ) {

			$thumbnail['url'] = esc_url( $matched[2] );

			return $thumbnail;
		}
	}

	return $thumbnail;
}

function themesflat_render_thumbnail_markup( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'image_size'         => 'thumbnail',
		'image_ratio'        => '',
		'image_id'           => '',
		'animated_thumbnail' => true,
		'display_permalink'  => true,
		'image_mode'         => '',
		'post'               => null,
		'placeholder'        => '',
		'gallery_id'         => ''
	) );

	if ( ! empty( $args['image_id'] ) ) {
		$image_data = themesflat_get_image_data( array(
			'image_id'           => $args['image_id'],
			'image_size'         => $args['image_size'],
			'animated_thumbnail' => $args['animated_thumbnail']
		) );
	} else {
		$image_data = themesflat_get_thumbnail_data( array(
			'image_size'         => $args['image_size'],
			'animated_thumbnail' => $args['animated_thumbnail'],
			'post'               => $args['post'],
			'placeholder'        => $args['placeholder']
		) );


	}


	if ( ! $image_data || empty( $image_data['url'] ) ) {
		return '';
	}
	ob_start();
	if ( $args['image_mode'] !== 'image' ) {
		$attributes        = array();
		$attributes_styles = array();


		if ( ! empty( $image_data['title'] ) && $args['display_permalink'] ) {
			$attributes[] = sprintf( 'title="%s"', esc_attr( $image_data['title'] ) );
		}

		$classes = array(
			'themesflat__entry-thumbnail',
			'themesflat__embed-responsive',
		);
		if ( empty( $args['image_ratio'] ) ) {
			if ( preg_match( '/x/', $args['image_size'] ) ) {
				if ( ( $image_data['width'] > 0 ) && ( $image_data['height'] > 0 ) ) {
					$ratio               = ( $image_data['height'] / $image_data['width'] ) * 100;
					$attributes_styles[] = sprintf( '--themesflat-image-ratio : %s', $ratio . '%' );

					$classes[] = "themesflat__image-size-{$image_data['width']}x{$image_data['height']}";
				}

			} else {
				$classes[] = "themesflat__image-size-{$args['image_size']}";
			}
		} else {
			$classes[] = "themesflat__image-size-{$args['image_ratio']}";

			if ( ! in_array( $args['image_ratio'], array( '1x1', '3x4', '4x3', '16x9', '9x16' ) ) ) {

				$image_ratio_sizes  = preg_split( '/x/', $args['image_ratio'] );
				$image_ratio_width  = isset( $image_ratio_sizes[0] ) ? intval( $image_ratio_sizes[0] ) : 0;
				$image_ratio_height = isset( $image_ratio_sizes[1] ) ? intval( $image_ratio_sizes[1] ) : 0;

				if ( ( $image_ratio_width > 0 ) && ( $image_ratio_height > 0 ) ) {
					$ratio               = ( $image_ratio_height / $image_ratio_width ) * 100;
					$attributes_styles[] = sprintf( '--themesflat-image-ratio : %s', $ratio . '%' );
				}
			}
		}
		if ( ! empty( $image_data['url'] ) ) {
			$attributes_styles[] = sprintf( 'background-image: url(%s)', esc_url( $image_data['url'] ) );
		}
		$attributes[] = sprintf( 'style="%s"', join( ';', $attributes_styles ) );


		$attributes[] = sprintf( 'class="%s"', join( ' ', $classes ) );

		if ( $args['display_permalink'] ) {
			?>
            <a <?php echo join( ' ', $attributes ) ?> href="<?php themesflat_the_permalink() ?>">
            </a>
			<?php
		} else {
			?>
            <div <?php echo join( ' ', $attributes ) ?>></div>
			<?php

		}
	} else {
		$attributes = array();

		if ( ! empty( $image_data['alt'] ) ) {
			$attributes[] = sprintf( 'alt="%s"', esc_attr( $image_data['alt'] ) );
		}

		if ( ! empty( $image_data['width'] ) ) {
			$attributes[] = sprintf( 'width="%s"', esc_attr( $image_data['width'] ) );
		}

		if ( ! empty( $image_data['height'] ) ) {
			$attributes[] = sprintf( 'height="%s"', esc_attr( $image_data['height'] ) );
		}

		$attributes[] = sprintf( 'src="%s"', esc_url( $image_data['url'] ) );
		if ( $args['display_permalink'] ) {
			?>
            <a class="themesflat__entry-thumbnail themesflat__entry-thumbnail-image"
               href="<?php themesflat_the_permalink() ?>">
                <img <?php echo join( ' ', $attributes ); ?>>
            </a>
			<?php
		} else {
			?>
            <div class="themesflat__entry-thumbnail themesflat__entry-thumbnail-image">
                <img <?php echo join( ' ', $attributes ); ?>>
            </div>
			<?php

		}
	}
	echo ob_get_clean();
}

function themesflat_create_columns( $column = '', $column_tb = '', $column_mb = '' ) {
	$column_classes = array();
	if ( ! empty( $column_mb ) ) {
		if ( $column_mb != '5' ) {
			$grid_mb          = 12 / intval( $column_mb );
			$column_classes[] = 'col-' . $grid_mb;
		} elseif ( $column_mb == '5' ) {
			$column_classes[] = 'themesflat-col-custom-5';
		}
	} else {
		$column_classes[] = 'col-12';
	}
	if ( ! empty( $column_tb ) ) {
		if ( $column_tb != '5' ) {
			$grid_tb          = 12 / intval( $column_tb );
			$column_classes[] = 'col-md-' . $grid_tb;
		} elseif ( $column_tb == '5' ) {
			$column_classes[] = 'themesflat-col-md-custom-5';
		}
	} else {
		$column_classes[] = 'col-md-12';
	}
	if ( ! empty( $column ) ) {
		if ( $column != '5' ) {
			$grid             = 12 / intval( $column );
			$column_classes[] = 'col-lg-' . $grid;
		} elseif ( $column == '5' ) {
			$column_classes[] = 'themesflat-col-lg-custom-5';
		}
	} else {
		$column_classes[] = 'col-lg-12';
	}

	return implode( ' ', $column_classes );
}