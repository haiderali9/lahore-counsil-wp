<?php

class sidebar_manager {

	public function __construct() {
		add_action( 'widgets_init', array( 'sidebar_manager', 'init' ) );
		add_action( 'admin_menu', array( 'sidebar_manager', 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( 'sidebar_manager', 'admin_enqueue_scripts' ) );
		add_action( 'admin_print_scripts', array( 'sidebar_manager', 'admin_print_scripts' ) );
		if ( current_user_can( 'manage_options' ) ) {
			add_action( 'wp_ajax_add_sidebar', array( 'sidebar_manager', 'add_sidebar' ) );
			add_action( 'wp_ajax_remove_sidebar', array( 'sidebar_manager', 'remove_sidebar' ) );
		}

		add_action( 'edit_post', array( 'sidebar_manager', 'save_form' ) );
		add_action( 'publish_post', array( 'sidebar_manager', 'save_form' ) );
		add_action( 'save_post', array( 'sidebar_manager', 'save_form' ) );
		add_action( 'edit_page_form', array( 'sidebar_manager', 'save_form' ) );
	}

	public static function init() {

		$sidebars = sidebar_manager::get_sidebars();
		if ( is_array( $sidebars ) ) {
			foreach ( $sidebars as $sidebar ) {
				$sidebar_class = sidebar_manager::name_to_class( $sidebar );
				register_sidebar(
					array(
						'name'          => $sidebar,
						'id'            => 'themesflat-custom-sidebar-' . strtolower( $sidebar_class ),
						'before_widget' => '<aside id="%1$s" class="widget themesflat_widget ' . $sidebar_class . ' %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title themesflat_title">',
						'after_title'   => '</h3>',
					)
				);
			}
		}
	}

	public static function admin_enqueue_scripts() {
		wp_enqueue_script( array( 'sack' ) );
	}

	public static function admin_print_scripts() {
		?>
        <script>
			function getParentByTagName(obj, tag) {
				var obj_parent = obj.parentNode;
				if (!obj_parent) return false;
				if (obj_parent.tagName.toLowerCase() == tag) return obj_parent;
				else return getParentByTagName(obj_parent, tag);
			}

			function add_sidebar(sidebar_name) {
				var mysack = new sack("<?php echo site_url(); ?>/wp-admin/admin-ajax.php");

				mysack.execute = 1;
				mysack.method = 'POST';
				mysack.setVar("action", "add_sidebar");
				mysack.setVar("sidebar_name", sidebar_name);
				mysack.setVar("sidebar_manager_nonce", document.getElementById('sidebar_manager_nonce').value);
				mysack.encVar("cookie", document.cookie, false);
				mysack.onError = function () {
					alert('Ajax error. Cannot add sidebar')
				};
				mysack.runAJAX();
				return true;
			}

			function remove_sidebar(elem, sidebar_name) {
				var parent = getParentByTagName(elem, 'tr');
				var num = parent.rowIndex;
				var mysack = new sack("<?php echo site_url(); ?>/wp-admin/admin-ajax.php");

				mysack.execute = 1;
				mysack.method = 'POST';
				mysack.setVar("action", "remove_sidebar");
				mysack.setVar("sidebar_name", sidebar_name);
				mysack.setVar("sidebar_manager_nonce", document.getElementById('sidebar_manager_nonce').value);
				mysack.setVar("row_number", num);
				mysack.encVar("cookie", document.cookie, false);
				mysack.onError = function () {
					alert('Ajax error. Cannot add sidebar')
				};
				mysack.runAJAX();
				return true;
			}
        </script>
		<?php
	}

	public static function add_sidebar() {
		check_admin_referer( 'sidebar_manager', 'sidebar_manager_nonce' );
		$sidebars = sidebar_manager::get_sidebars();
		$name     = str_replace( array( "\n", "\r", "\t" ), '', sanitize_text_field( $_POST['sidebar_name'] ) );
		if ( ! $name || $name == 'null' ) {
			die( "alert('" . esc_html__( 'Please input sidebar name and try again.', 'lowlead' ) . "')" );
		}
		$id = sidebar_manager::name_to_class( $name );
		if ( isset( $sidebars[ $id ] ) ) {
			die( "alert('" . esc_html__( 'Sidebar already exists, please use a different name.', 'lowlead' ) . "')" );
		}

		$sidebars[ $id ] = $name;
		sidebar_manager::update_sidebars( $sidebars );

		$js = "
			var tbl = document.getElementById('themesflat_table');
			var lastRow = tbl.rows.length;
			// if there's no header row in the table, then iteration = lastRow + 1
			var iteration = lastRow;
			var row = tbl.insertRow(lastRow);

			// left cell
			var cellLeft = row.insertCell(0);
			var textNode = document.createTextNode('$name');
			cellLeft.appendChild(textNode);

			//middle cell
			var cellLeft = row.insertCell(1);
			var textNode = document.createTextNode('$id');
			cellLeft.appendChild(textNode);

			//var cellLeft = row.insertCell(2);
			//var textNode = document.createTextNode('[<a href=\'javascript:void(0);\' onclick=\'return; remove_sidebar_name(this,$name);\'>Remove</a>]');
			//cellLeft.appendChild(textNode)

			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
			linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'remove_sidebar_name(this,\'$name\')');
			removeLink.setAttribute('href', 'javascript:void(0)');

			removeLink.appendChild(linkText);
			cellLeft.appendChild(removeLink);

			var themesflat_noexist = document.getElementById('themesflat_noexist');
			if (themesflat_noexist)
				themesflat_noexist.style.display = 'none';
		";

		die( "$js" );
	}

	public static function remove_sidebar() {
		check_admin_referer( 'sidebar_manager', 'sidebar_manager_nonce' );
		$sidebars = sidebar_manager::get_sidebars();
		$name     = str_replace( array( "\n", "\r", "\t" ), '', sanitize_text_field( $_POST['sidebar_name'] ) );
		$id       = sidebar_manager::name_to_class( $name );
		if ( ! isset( $sidebars[ $id ] ) ) {
			die( "alert('Sidebar does not exist.')" );
		}
		$row_number = (int) $_POST['row_number'];
		unset( $sidebars[ $id ] );
		sidebar_manager::update_sidebars( $sidebars );
		$js = "
			var tbl = document.getElementById('themesflat_table');
			tbl.deleteRow($row_number);
		";
		die( $js );
	}

	public static function admin_menu() {
		add_theme_page( esc_html__( 'Sidebars Manager', 'lowlead' ), esc_html__( 'Sidebars Manager', 'lowlead' ), 'manage_options', 'multiple_sidebars', array(
			'sidebar_manager',
			'admin_page'
		) );
	}

	public static function admin_page() {
		?>
        <script>
			function remove_sidebar_name(elem, name) {
				answer = confirm("<?php echo esc_html__( 'Are you sure you want to remove', 'lowlead' ); ?> " + name + "?\n<?php echo esc_html__( 'This will remove any widgets you have assigned to this sidebar.', 'lowlead' ); ?>");
				if (answer) {
					remove_sidebar(elem, name);
				} else {
					return false;
				}
			}

			function add_sidebar_name() {
				var sidebar_name = prompt("<?php echo esc_html__( 'Sidebar Name:', 'lowlead' ); ?>", "");
				add_sidebar(sidebar_name);
			}
        </script>
        <div class="wrap">
            <h2><?php echo esc_html__( 'Sidebar Generator', 'lowlead' ); ?></h2>
            <p>
				<?php echo esc_html__( 'The sidebar name is for your use only. It will not be visible to any of your visitors. A CSS class is assigned to each of your sidebar, use this styling to customize the sidebars.', 'lowlead' ); ?>
            </p>
            <br/>
            <div class="add_sidebar">
                <a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" onclick="return add_sidebar_name()"
                   title="<?php echo esc_html__( 'Add a sidebar', 'lowlead' ); ?>"
                   class="button-primary"><?php echo esc_html__( '+ Add Sidebar', 'lowlead' ); ?></a>
            </div>
            <br/>
            <table class="widefat page" id="themesflat_table">
                <tr>
                    <th><?php echo esc_html__( 'Name', 'lowlead' ); ?></th>
                    <th><?php echo esc_html__( 'CSS class', 'lowlead' ); ?></th>
                    <th><?php echo esc_html__( 'Remove', 'lowlead' ); ?></th>
                </tr>
				<?php
				$sidebars = sidebar_manager::get_sidebars();
				if ( is_array( $sidebars ) && ! empty( $sidebars ) ) {
					$cnt = 0;
					foreach ( $sidebars as $sidebar ) {
						$alt = ( $cnt % 2 == 0 ? 'alternate' : '' );
						?>
                        <tr class="<?php echo esc_attr( $alt ); ?>">
                            <td><?php echo esc_html( $sidebar ); ?></td>
                            <td><?php echo esc_html( sidebar_manager::name_to_class( $sidebar ) ); ?></td>
                            <td><a href="<?php echo esc_js( 'javascript:void(0)' ); ?>"
                                   onclick="return remove_sidebar_name(this,'<?php echo esc_attr( $sidebar ); ?>');"
                                   title="<?php echo esc_html__( 'Remove this sidebar', 'lowlead' ); ?>"><?php echo esc_html__( 'remove', 'lowlead' ); ?></a>
                            </td>
                        </tr>
						<?php
						$cnt ++;
					}
				} else {
					?>
                    <tr id="themesflat_noexist">
                        <td colspan="3"><?php echo esc_html__( 'No Sidebars defined', 'lowlead' ); ?></td>
                    </tr>
					<?php
				}
				?>
            </table>
            <br/><br/>
			<?php wp_nonce_field( 'sidebar_manager', 'sidebar_manager_nonce' ); ?>
        </div>
		<?php
	}

	/**
	 * for saving the pages/post
	 */
	public static function save_form( $post_id ) {
		if ( ! isset( $_POST['themesflat_edit'] ) ) {
			return;
		}

		if ( ! empty( $_POST['themesflat_edit'] ) ) {
			delete_post_meta( $post_id, 'themesflat_selected_sidebar' );
			delete_post_meta( $post_id, 'themesflat_selected_sidebar_replacement' );
			add_post_meta( $post_id, 'themesflat_selected_sidebar', themesflat_sanitize_array( $_POST['sidebar_manager'] ) );
			add_post_meta( $post_id, 'themesflat_selected_sidebar_replacement', themesflat_sanitize_array( $_POST['sidebar_manager_replacement'] ) );
		}
	}

	public static function edit_form() {
		global $post;
		$post_id = $post;
		if ( is_object( $post_id ) ) {
			$post_id = $post_id->ID;
		}
		$selected_sidebar = get_post_meta( $post_id, 'themesflat_selected_sidebar', true );
		if ( ! is_array( $selected_sidebar ) ) {
			$tmp                 = $selected_sidebar;
			$selected_sidebar    = array();
			$selected_sidebar[0] = $tmp;
		}
		$selected_sidebar_replacement = get_post_meta( $post_id, 'themesflat_selected_sidebar_replacement', true );
		if ( ! is_array( $selected_sidebar_replacement ) ) {
			$tmp                             = $selected_sidebar_replacement;
			$selected_sidebar_replacement    = array();
			$selected_sidebar_replacement[0] = $tmp;
		}
		?>

        <div id='themesflat-sortables' class='meta-box-sortables'>
            <div id="themesflat_box" class="postbox ">
                <div class="handlediv" title="Click to toggle"><br/></div>
                <h3 class='hndle'><span><?php echo esc_html__( 'Sidebars', 'lowlead' ); ?></span></h3>
                <div class="inside">
                    <div class="themesflat_container">
                        <input name="themesflat_edit" type="hidden" value="themesflat_edit"/>
                        <p><?php echo esc_html__( 'Please select the sidebar you would like to display.', 'lowlead' ); ?>
                            <strong><?php echo esc_html__( 'Note:', 'lowlead' ); ?></strong> <?php echo esc_html__( 'You must first create the sidebar under', 'lowlead' ); ?>
                            <strong><?php echo esc_html__( 'Appearance > Sidebars', 'lowlead' ); ?></strong>.
                        </p>
                        <ul>
							<?php
							global $wp_registered_sidebars;
							for ( $i = 0; $i < 1; $i ++ ) {
								?>
                                <li>
                                    <select name="sidebar_manager[<?php echo (int) $i; ?>]">
                                        <option value="0"
											<?php
											if ( $selected_sidebar[ $i ] == '' ) {
												echo ' selected';
											}
											?>
                                        >WP Default Sidebar
                                        </option>
										<?php
										$sidebars = $wp_registered_sidebars;
										if ( is_array( $sidebars ) && ! empty( $sidebars ) ) {
											foreach ( $sidebars as $sidebar ) {
												if ( $selected_sidebar[ $i ] == $sidebar['name'] ) {
													echo "<option value='" . esc_attr( $sidebar['name'] ) . "' selected>" . esc_html( $sidebar['name'] ) . "</option>\n";
												} else {
													echo "<option value='" . esc_attr( $sidebar['name'] ) . "'>" . esc_html( $sidebar['name'] ) . "</option>\n";
												}
											}
										}
										?>
                                    </select>
                                    <select name="sidebar_manager_replacement[<?php echo (int) $i; ?>]">
                                        <option value="0"
											<?php
											if ( $selected_sidebar_replacement[ $i ] == '' ) {
												echo ' selected';
											}
											?>
                                        >None
                                        </option>
										<?php

										$sidebar_replacements = $wp_registered_sidebars;
										if ( is_array( $sidebar_replacements ) && ! empty( $sidebar_replacements ) ) {
											foreach ( $sidebar_replacements as $sidebar ) {
												if ( $selected_sidebar_replacement[ $i ] == $sidebar['name'] ) {
													echo "<option value='" . esc_attr( $sidebar['name'] ) . "' selected>" . esc_html( $sidebar['name'] ) . "</option>\n";
												} else {
													echo "<option value='" . esc_attr( $sidebar['name'] ) . "'>" . esc_html( $sidebar['name'] ) . "</option>\n";
												}
											}
										}
										?>
                                    </select>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

		<?php
	}


	public static function get_sidebar( $name = '0' ) {
		if ( ! is_singular() ) {
			if ( $name != '0' ) {
				dynamic_sidebar( $name );
			} else {
				dynamic_sidebar();
			}

			return;
		}
		wp_reset_query();
		global $wp_query;
		$post                         = $wp_query->get_queried_object();
		$selected_sidebar             = get_post_meta( $post->ID, 'themesflat_selected_sidebar', true );
		$selected_sidebar_replacement = get_post_meta( $post->ID, 'themesflat_selected_sidebar_replacement', true );
		$did_sidebar                  = false;

		if ( $selected_sidebar != '' && $selected_sidebar != '0' ) {
			echo "\n\n<!-- begin generated sidebar -->\n";
			if ( is_array( $selected_sidebar ) && ! empty( $selected_sidebar ) ) {
				for ( $i = 0; $i < sizeof( $selected_sidebar ); $i ++ ) {

					if ( $name == '0' && $selected_sidebar[ $i ] == '0' && $selected_sidebar_replacement[ $i ] == '0' ) {
						dynamic_sidebar();
						$did_sidebar = true;
						break;
					} elseif ( $name == '0' && $selected_sidebar[ $i ] == '0' ) {
						dynamic_sidebar( $selected_sidebar_replacement[ $i ] );
						$did_sidebar = true;
						break;
					} elseif ( $selected_sidebar[ $i ] == $name ) {
						$did_sidebar = true;
						dynamic_sidebar( $selected_sidebar_replacement[ $i ] );
						break;
					}
				}
			}
			if ( $did_sidebar == true ) {
				echo "\n<!-- end generated sidebar -->\n\n";

				return;
			}
			if ( $name != '0' ) {
				dynamic_sidebar( $name );
			} else {
				dynamic_sidebar();
			}
			echo "\n<!-- end generated sidebar -->\n\n";

			return;
		} else {
			if ( $name != '0' ) {
				dynamic_sidebar( $name );
			} else {
				dynamic_sidebar();
			}
		}
	}

	/**
	 * replaces array of sidebar names
	 */
	public static function update_sidebars( $sidebar_array ) {
		$sidebars = update_option( 'themesflat_sidebars', $sidebar_array );
	}

	/**
	 * gets the generated sidebars
	 */
	public static function get_sidebars() {
		$sidebars = get_option( 'themesflat_sidebars' );

		return $sidebars;
	}

	public static function name_to_class( $name ) {
		$class = str_replace( array(
			' ',
			',',
			'.',
			'"',
			"'",
			'/',
			'\\',
			'+',
			'=',
			')',
			'(',
			'*',
			'&',
			'^',
			'%',
			'$',
			'#',
			'@',
			'!',
			'~',
			'`',
			'<',
			'>',
			'?',
			'[',
			']',
			'{',
			'}',
			'|',
			':'
		), '', $name );

		return $class;
	}

}

$themesflat = new sidebar_manager;

function generated_dynamic_sidebar( $name = '0' ) {
	sidebar_manager::get_sidebar( $name );

	return true;
}
