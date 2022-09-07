<?php
/**
 * Class for custom menu walker
 *
 * This file is used to define a custom menu walker, with custom css classes.
 *
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

if ( ! class_exists( 'w3csspress\W3csspress_Walker_Nav_Menu' ) ) {
	/**
	 * Class for custom menu walker.
	 *
	 * This class is used to define a custom menu walker, with custom css classes.
	 *
	 * @since 2022.0
	 */
	class W3csspress_Walker_Nav_Menu extends \Walker_Nav_Menu {


		/**
		 * Starts the list before the elements are added.
		 *
		 * @since 2022.0
		 *
		 * @see Walker_Nav_Menu::start_lvl
		 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/start_lvl/
		 *
		 * @param string   $output Required. Used to append additional content (passed by reference).
		 * @param int      $depth Optional. Depth of menu item. Used for padding.
		 * @param stdClass $args Optional. An object of wp_nav_menu() arguments. Default value: null.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '<ul class="w3-dropdown-content w3-animate-opacity w3-bar-block w3-mobile w3-theme-action sub-menu">';
		}
	}
}
