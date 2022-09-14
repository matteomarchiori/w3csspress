<?php
/**
 * Default header block pattern
 *
 * @since 2022.29
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Walker_Nav_Menu;

get_template_part( 'classes/class-w3csspress-walker-nav-menu' );

return array(
	'title'      => 'Basic Navigation',
	'categories' => array( 'w3css', 'navigation' ),
	'blockTypes' => array( 'core/navigation' ),
	'content'    => '<!-- wp:html --><nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">' .
			wp_nav_menu(
				array(
					'echo'           => false,
					'theme_location' => 'main-menu',
					'menu_class'     => 'menu w3-bar w3-container',
					'walker'         => new W3csspress_Walker_Nav_Menu(),
				)
			) . '</nav><!-- /wp:html -->',
);
