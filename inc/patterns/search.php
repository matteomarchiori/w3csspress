<?php
/**
 * Search bar block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

/**
 * Register search w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_search() {

	register_block_pattern(
		'w3csspress/search',
		array(
			'title'      => ucfirst( __( 'search bar', 'w3csspress' ) ),
			'categories' => array( 'search' ),
			'blockTypes' => array( 'core/search' ),
			'content'    => '<!-- wp:search {"label":"' . ucfirst( __( 'search', 'w3csspress' ) ) . '","buttonText":"' . ucfirst( __( 'search', 'w3csspress' ) ) . '"} /-->',
		)
	);
}

w3csspress_register_block_pattern_search();
