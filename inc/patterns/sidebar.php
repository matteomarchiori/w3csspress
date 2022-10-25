<?php
/**
 * Sidebar block patterns.
 *
 * @since 2022.33
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

/**
 * Register sidebars w3csspress block patterns
 *
 * @since 2022.33
 * @package w3csspress
 */
function w3csspress_register_block_pattern_sidebar() {

	register_block_pattern(
		'w3csspress/sidebar/primary',
		array(
			'title'      => __( 'left sidebar', 'w3csspress' ),
			'categories' => array( 'sidebars' ),
			'blockTypes' => array( 'core/sidebar' ),
			'content'    => '<!-- wp:group {"className":"sidebar w3-sidebar w3-bar-block w3-container w3-theme-action","layout":{"type":"default"}} --><div id="primary" class="wp-block-group sidebar w3-sidebar w3-bar-block w3-container w3-theme-action"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --></div><!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'w3csspress/sidebar/secondary',
		array(
			'title'      => __( 'right sidebar', 'w3csspress' ),
			'categories' => array( 'sidebars' ),
			'blockTypes' => array( 'core/sidebar' ),
			'content'    => '<!-- wp:group {"className":"sidebar w3-sidebar w3-bar-block w3-container w3-theme-action","layout":{"type":"default"}} --><div id="secondary" class="wp-block-group sidebar w3-sidebar w3-bar-block w3-container w3-theme-action"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --></div><!-- /wp:group -->',
		)
	);
}

w3csspress_register_block_pattern_sidebar();
