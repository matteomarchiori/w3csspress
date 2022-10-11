<?php
/**
 * Image block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

/**
 * Register images w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_image() {

	register_block_pattern(
		'w3csspress/image/rounded',
		array(
			'title'      => __( 'image', 'w3csspress' ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-round"} -->
			<figure class="wp-block-image size-large w3-image w3-round"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);
}

w3csspress_register_block_pattern_image();
