<?php
/**
 * Badge block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

/**
 * Register badges w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_badge() {

	foreach ( W3csspress_Constants::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
		if ( 'w3schools' !== $w3csspress_theme && '' !== $w3csspress_theme ) {
			register_block_pattern(
				"w3csspress/badge/$w3csspress_theme",
				array(
					'title'      => sprintf(
						/* translators: color of the container */
						esc_html( ucfirst( __( 'badge %s', 'w3csspress' ) ) ),
						$w3csspress_theme_translation
					),
					'categories' => array( 'badges', 'colors', $w3csspress_theme ),
					'blockTypes' => array( 'core/badge' ),
					'content'    => '<!-- wp:paragraph --><span class="w3-badge w3-' . $w3csspress_theme . '">1</span><!-- /wp:paragraph -->',
				)
			);
		}
	}
}

w3csspress_register_block_pattern_badge();
