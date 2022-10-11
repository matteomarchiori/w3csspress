<?php
/**
 * Card block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

/**
 * Register cards w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_card() {

	register_block_pattern(
		'w3csspress/card',
		array(
			'title'      => __( 'cards', 'w3csspress' ),
			'categories' => array( 'cards' ),
			'blockTypes' => array( 'core/card' ),
			'content'    => '<!-- wp:group {"className":"w3-card","layout":{"type":"default"}} --><div class="wp-block-group w3-card"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
		)
	);

	foreach ( W3csspress_Constants::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
		if ( 'w3schools' !== $w3csspress_theme && '' !== $w3csspress_theme ) {
			register_block_pattern(
				"w3csspress/card/$w3csspress_theme",
				array(
					'title'      => sprintf(
						/* translators: color of the card */
						esc_html__( 'card %s', 'w3csspress' ),
						$w3csspress_theme_translation
					),
					'categories' => array( 'cards', 'colors', $w3csspress_theme ),
					'blockTypes' => array( 'core/card' ),
					'content'    => '<!-- wp:group {"className":"w3-card w3-' . $w3csspress_theme . '","layout":{"type":"default"}} --><div class="wp-block-group w3-card w3-' . $w3csspress_theme . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
				)
			);

			register_block_pattern(
				"w3csspress/card/$w3csspress_theme",
				array(
					'title'      => sprintf(
						/* translators: color of the card */
						esc_html__( 'card-2 %s', 'w3csspress' ),
						$w3csspress_theme_translation
					),
					'categories' => array( 'cards', 'colors', $w3csspress_theme ),
					'blockTypes' => array( 'core/card' ),
					'content'    => '<!-- wp:group {"className":"w3-card-2 w3-' . $w3csspress_theme . '","layout":{"type":"default"}} --><div class="wp-block-group w3-card w3-' . $w3csspress_theme . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
				)
			);

			register_block_pattern(
				"w3csspress/card/$w3csspress_theme",
				array(
					'title'      => sprintf(
						/* translators: color of the card */
						esc_html__( 'card-4 %s', 'w3csspress' ),
						$w3csspress_theme_translation
					),
					'categories' => array( 'cards', 'colors', $w3csspress_theme ),
					'blockTypes' => array( 'core/card' ),
					'content'    => '<!-- wp:group {"className":"w3-card-4 w3-' . $w3csspress_theme . '","layout":{"type":"default"}} --><div class="wp-block-group w3-card w3-' . $w3csspress_theme . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
				)
			);
		}
	}
}

w3csspress_register_block_pattern_card();
