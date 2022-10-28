<?php
/**
 * Panel block patterns.
 *
 * @since 2022.29
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

/**
 * Register panels w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_panel() {

	register_block_pattern(
		'w3csspress/panel',
		array(
			'title'      => ucfirst( __( 'panel', 'w3csspress' ) ),
			'categories' => array( 'panels' ),
			'blockTypes' => array( 'core/panel' ),
			'content'    => '<!-- wp:group {"className":"w3-panel","layout":{"type":"default"}} --><div class="wp-block-group w3-panel"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
		)
	);

	foreach ( W3csspress_Constants::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
		if ( 'w3schools' !== $w3csspress_theme && '' !== $w3csspress_theme ) {
			register_block_pattern(
				"w3csspress/panel/$w3csspress_theme",
				array(
					'title'      => sprintf(
						/* translators: color of the panel */
						esc_html( ucfirst( __( 'panel %s', 'w3csspress' ) ) ),
						$w3csspress_theme_translation
					),
					'categories' => array( 'panels', $w3csspress_theme, 'colors' ),
					'blockTypes' => array( 'core/panel' ),
					'content'    => '<!-- wp:group {"className":"w3-panel w3-' . $w3csspress_theme . '","layout":{"type":"default"}} --><div class="wp-block-group w3-panel w3-' . $w3csspress_theme . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
				)
			);
		}
	}
}

w3csspress_register_block_pattern_panel();
