<?php
/**
 * Navigation block patterns.
 *
 * @since 2022.29
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Walker_Nav_Menu;

get_template_part( 'classes/class-w3csspress-walker-nav-menu' );

/**
 * Register navigation w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_navigation() {
	$content = '';
	if ( has_nav_menu( 'main-menu' ) ) {
		$content = '<!-- wp:html --><nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">' .
		wp_nav_menu(
			array(
				'echo'           => false,
				'theme_location' => 'main-menu',
				'menu_class'     => 'menu w3-bar w3-container',
				'walker'         => new W3csspress_Walker_Nav_Menu(),
			)
		) . '</nav><!-- /wp:html -->';
	}
	register_block_pattern(
		'w3csspress/navigation',
		array(
			'title'      => ucfirst( __( 'basic navigation', 'w3csspress' ) ),
			'categories' => array( 'navigation' ),
			'blockTypes' => array( 'core/navigation' ),
			'content'    => $content,
		)
	);
}

w3csspress_register_block_pattern_navigation();
