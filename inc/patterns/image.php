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
		'w3csspress/image',
		array(
			'title'      => ucfirst( __( 'image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image"} -->
			<figure class="wp-block-image size-large w3-image"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/rounded',
		array(
			'title'      => ucfirst( __( 'rounded image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-round"} -->
			<figure class="wp-block-image size-large w3-image w3-round"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/circular',
		array(
			'title'      => ucfirst( __( 'circular image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-circle"} -->
			<figure class="wp-block-image size-large w3-image w3-circle"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/bordered',
		array(
			'title'      => ucfirst( __( 'bordered image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-border"} -->
			<figure class="wp-block-image size-large w3-image w3-border"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/card',
		array(
			'title'      => ucfirst( __( 'card image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-card"} -->
			<figure class="wp-block-image size-large w3-image w3-card"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/opaque',
		array(
			'title'      => ucfirst( __( 'opaque image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-opacity"} -->
			<figure class="wp-block-image size-large w3-image w3-opacity"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/greyscale',
		array(
			'title'      => ucfirst( __( 'greyscale image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-greyscale"} -->
			<figure class="wp-block-image size-large w3-image w3-greyscale"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);

	register_block_pattern(
		'w3csspress/image/sepia',
		array(
			'title'      => ucfirst( __( 'sepia image', 'w3csspress' ) ),
			'categories' => array( 'images' ),
			'blockTypes' => array( 'core/image' ),
			'content'    => '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"w3-image w3-sepia"} -->
			<figure class="wp-block-image size-large w3-image w3-sepia"><img src="https://i0.wp.com/themes.svn.wordpress.org/w3csspress/2022.29/screenshot.png" alt=""/></figure>
			<!-- /wp:image -->',
		)
	);
}

w3csspress_register_block_pattern_image();
