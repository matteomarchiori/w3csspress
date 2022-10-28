<?php
/**
 * W3CSSPress: Block Patterns
 *
 * @since 2022.29
 * @package w3csspress
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

/**
 * Registers block patterns and categories.
 *
 * @since 2022.29
 * @package w3csspress
 */
function w3csspress_register_block_patterns() {
	$w3csspress_block_pattern_categories = array(
		'notfound'   => array( 'label' => ucfirst( __( '404 not found', 'w3csspress' ) ) ),
		'badges'     => array( 'label' => ucfirst( __( 'badges', 'w3csspress' ) ) ),
		'borders'    => array( 'label' => ucfirst( __( 'borders', 'w3csspress' ) ) ),
		'cards'      => array( 'label' => ucfirst( __( 'cards', 'w3csspress' ) ) ),
		'colors'     => array( 'label' => ucfirst( __( 'colors', 'w3csspress' ) ) ),
		'containers' => array( 'label' => ucfirst( __( 'containers', 'w3csspress' ) ) ),
		'footer'     => array( 'label' => ucfirst( __( 'footers', 'w3csspress' ) ) ),
		'header'     => array( 'label' => ucfirst( __( 'headers', 'w3csspress' ) ) ),
		'hover'      => array( 'label' => ucfirst( __( 'hover', 'w3csspress' ) ) ),
		'images'     => array( 'label' => ucfirst( __( 'images', 'w3csspress' ) ) ),
		'navigation' => array( 'label' => ucfirst( __( 'navigation', 'w3csspress' ) ) ),
		'panels'     => array( 'label' => ucfirst( __( 'panels', 'w3csspress' ) ) ),
		'query'      => array( 'label' => ucfirst( __( 'query', 'w3csspress' ) ) ),
		'search'     => array( 'label' => ucfirst( __( 'search', 'w3csspress' ) ) ),
		'sidebars'   => array( 'label' => ucfirst( __( 'sidebars', 'w3csspress' ) ) ),
	);

	foreach ( W3csspress_Constants::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
		if ( '' !== $w3csspress_theme ) {
			$w3csspress_block_pattern_categories[ $w3csspress_theme ] = array( 'label' => ucfirst( $w3csspress_theme_translation ) );
		}
	}

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since 2022.29
	 *
	 * @param array $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$w3csspress_block_pattern_categories = apply_filters( 'w3csspress_block_pattern_categories', $w3csspress_block_pattern_categories );

	foreach ( $w3csspress_block_pattern_categories as $name => $properties ) {
		if ( ! \WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$w3csspress_file_patterns = array_diff( \scandir( get_template_directory() . '/inc/patterns' ), array( '.', '..' ) );

	/**
	 * Filters the theme block patterns.
	 *
	 * @since 2022.29
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */

	foreach ( $w3csspress_file_patterns as $w3csspress_file_pattern ) {

		get_template_part( 'inc/patterns/' . pathinfo( $w3csspress_file_pattern, PATHINFO_FILENAME ) );

	}
}
add_action( 'init', __NAMESPACE__ . '\\w3csspress_register_block_patterns' );
