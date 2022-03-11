<?php

namespace w3csspress;

if ( ! class_exists( 'w3csspress\W3csspress_Walker_Nav_Menu' ) ) {

	class W3csspress_Walker_Nav_Menu extends \Walker_Nav_Menu {

		public function start_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '<ul class="w3-dropdown-content w3-animate-opacity w3-bar-block w3-mobile w3-theme-action sub-menu">';
		}
	}
}
