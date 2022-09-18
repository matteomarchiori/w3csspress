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

function w3csspress_register_block_pattern_panel() {

	register_block_pattern(
		'w3csspress/panel',
		array(
			'title'      => __( 'panel', 'w3csspress' ),
			'categories' => array( 'w3css', 'design', 'panels' ),
			'blockTypes' => array( 'core/panel' ),
			'content'    => '<!-- wp:group {"className":"w3-panel","layout":{"type":"default"}} --><div class="wp-block-group w3-panel"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
		)
	);

	foreach ( W3csspress_Constants::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
		if ( 'w3schools' != $w3csspress_theme && '' != $w3csspress_theme ) {
			register_block_pattern(
				"w3csspress/panel/$w3csspress_theme",
				array(
					'title'      => sprintf(
						/* translators: color of the panel */
						esc_html__( 'panel %s', 'w3csspress' ),
						$w3csspress_theme_translation
					),
					'categories' => array( 'w3css', 'design', 'panels', 'colors' ),
					'blockTypes' => array( 'core/panel' ),
					'content'    => '<!-- wp:group {"className":"w3-panel w3-' . $w3csspress_theme . '","layout":{"type":"default"}} --><div class="wp-block-group w3-panel w3-' . $w3csspress_theme . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
				)
			);
			foreach ( W3csspress_Constants::w3csspress_borders() as $w3csspress_border => $w3csspress_border_translation ) {
				register_block_pattern(
					"w3csspress/panel/$w3csspress_theme/$w3csspress_border",
					array(
						'title'      => sprintf(
							/* translators: color of the panel and kind of border */
							esc_html__( 'panel %1$s %2$s', 'w3csspress' ),
							$w3csspress_theme_translation,
							$w3csspress_border_translation
						),
						'categories' => array( 'w3css', 'design', 'panels', 'colors', 'borders' ),
						'blockTypes' => array( 'core/panel' ),
						'content'    => '<!-- wp:group {"className":"w3-panel w3-' . $w3csspress_theme . ' ' . $w3csspress_border . '","layout":{"type":"default"}} --><div class="wp-block-group w3-panel w3-' . $w3csspress_theme . ' ' . $w3csspress_border . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
					)
				);
			}
			foreach ( W3csspress_Constants::w3csspress_hover_borders() as $w3csspress_border => $w3csspress_border_translation ) {
				register_block_pattern(
					"w3csspress/panel/$w3csspress_theme/hover/$w3csspress_border",
					array(
						'title'      => sprintf(
							/* translators: color of the panel and kind of border */
							esc_html__( 'panel %1$s %2$s', 'w3csspress' ),
							$w3csspress_theme_translation,
							$w3csspress_border_translation
						),
						'categories' => array( 'w3css', 'design', 'panels', 'colors', 'borders', 'hover' ),
						'blockTypes' => array( 'core/panel' ),
						'content'    => '<!-- wp:group {"className":"w3-panel w3-' . $w3csspress_theme . ' ' . $w3csspress_border . '","layout":{"type":"default"}} --><div class="wp-block-group w3-panel w3-' . $w3csspress_theme . ' ' . $w3csspress_border . '"><!-- wp:heading --><h2>Lorem Ipsum</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
					)
				);
			}
		}
	}
}

w3csspress_register_block_pattern_panel();
