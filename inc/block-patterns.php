<?php
/**
 * W3CSSPress: Block Patterns
 *
 * @since 2022.29
 * @package w3csspress
 */

namespace w3csspress;

/**
 * Registers block patterns and categories.
 *
 * @since 2022.29
 * @package w3csspress
 */
function w3csspress_register_block_patterns() {
	$block_pattern_categories = array(
		'footer'     => array( 'label' => __( 'Footers', 'w3csspress' ) ),
		'header'     => array( 'label' => __( 'Headers', 'w3csspress' ) ),
		'navigation' => array( 'label' => __( 'Navigation', 'w3csspress' ) ),
		'w3css'      => array( 'label' => __( 'W3.CSS', 'w3csspress' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since 2022.29
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'w3csspress_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! \WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$file_patterns = array_diff( \scandir( get_template_directory() . '/inc/patterns' ), array( '.', '..' ) );

	/**
	 * Filters the theme block patterns.
	 *
	 * @since 2022.29
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */

	foreach ( $file_patterns as $file_pattern ) {

		$name_pattern = pathinfo( "patterns/$file_pattern", PATHINFO_FILENAME );

		register_block_pattern(
			"w3csspress/$name_pattern",
			require_once get_template_directory() . "/inc/patterns/$file_pattern"
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\w3csspress_register_block_patterns' );
