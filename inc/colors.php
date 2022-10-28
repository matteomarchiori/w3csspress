<?php
/**
 * Functions of the theme related to colors customization
 *
 * This file is used for the theme functions related to colors customization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

add_action( 'customize_register', __NAMESPACE__ . '\\w3csspress_customize_colors' );
/**
 * Add colors settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_colors( $wp_customize ) {

	$w3csspress_priority = 1;

	$wp_customize->add_setting(
		'w3csspress_color_theme',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_color_theme_kind',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_color_theme_text_custom',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_color_link',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	for ( $i = 1; $i < 7; $i++ ) {
		$wp_customize->add_setting(
			"w3csspress_color_h$i",
			array(
				'default'           => '',
				'type'              => 'option',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}

	$wp_customize->add_control(
		'w3csspress_color_theme',
		array(
			'label'       => esc_html( ucfirst( __( 'select color theme', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'using this option you can change the theme colors.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_color_theme',
			'priority'    => $w3csspress_priority++,
			'section'     => 'colors',
			'type'        => 'select',
			'choices'     => array_map( 'ucfirst', W3csspress_Constants::w3csspress_themes() ),
		)
	);

	$wp_customize->add_control(
		'w3csspress_color_theme_kind',
		array(
			'label'       => esc_html( ucfirst( __( 'select theme kind', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'using this option you can change the theme between default, light and dark.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_color_theme_kind',
			'priority'    => $w3csspress_priority++,
			'section'     => 'colors',
			'type'        => 'select',
			'choices'     => array_map( 'ucfirst', W3csspress_Constants::w3csspress_theme_kinds() ),
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'w3csspress_color_theme_text_custom',
			array(
				'label'       => esc_html( ucfirst( __( 'text theme color', 'w3csspress' ) ) ),
				'description' => esc_html( ucfirst( __( 'change theme text color', 'w3csspress' ) ) ),
				'settings'    => 'w3csspress_color_theme_text_custom',
				'priority'    => $w3csspress_priority++,
				'section'     => 'colors',
			)
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'w3csspress_color_link',
			array(
				'label'       => esc_html( ucfirst( __( 'link color', 'w3csspress' ) ) ),
				'description' => esc_html( ucfirst( __( 'change link color', 'w3csspress' ) ) ),
				'settings'    => 'w3csspress_color_link',
				'priority'    => $w3csspress_priority++,
				'section'     => 'colors',
			)
		)
	);

	for ( $i = 1; $i < 7; $i++ ) {
		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				"w3csspress_color_h$i",
				array(
					'label'       => sprintf(
						/* translators: index for headings */
						esc_html( ucfirst( __( 'h%s color', 'w3csspress' ) ) ),
						$i
					),
					'description' => sprintf(
						/* translators: index for headings */
						esc_html( ucfirst( __( 'change color of h%s.', 'w3csspress' ) ) ),
						$i
					),
					'settings'    => "w3csspress_color_h$i",
					'priority'    => $w3csspress_priority++,
					'section'     => 'colors',
				)
			)
		);
	}
}

add_filter( 'w3csspress_colors', __NAMESPACE__ . '\\w3csspress_colors', 10, 2 );
/**
 * Fires to enqueue colors checks.
 *
 * @since 2022.32
 *
 * @param DOMDocument $dom Required. The DOM document.
 * @param DOMNode     $head Required. The head of the DOM document.
 */
function w3csspress_colors( $dom, $head ) {
	for ( $i = 1; $i < 7; $i++ ) {
		if ( '' !== esc_html( get_option( "w3csspress_color_h$i" ) ) ) {
			$style = $dom->createElement( 'style', 'h' . esc_html( $i ) . '{color:' . esc_html( get_option( "w3csspress_color_h$i" ) ) . '}' );
			$style->setAttribute( 'type', 'text/css' );
			$head->appendChild( $style );
		}
	}
	if ( '' !== esc_html( get_option( 'w3csspress_color_theme_text_custom' ) ) ) {
		$style = $dom->createElement( 'style', 'body:not(#wpadminbar, #wpadminbar *, .sidebar){color:' . esc_html( get_option( 'w3csspress_color_theme_text_custom' ) ) . ' !important}' );
		$style->setAttribute( 'type', 'text/css' );
		$head->appendChild( $style );
	}
	if ( '' !== esc_html( get_option( 'w3csspress_color_link' ) ) ) {
		$style = $dom->createElement( 'style', 'a:not(#wpadminbar, #wpadminbar *, .sidebar){color:' . esc_html( get_option( 'w3csspress_color_link' ) ) . ' !important}' );
		$style->setAttribute( 'type', 'text/css' );
		$head->appendChild( $style );
	}
}

add_filter( 'body_class', __NAMESPACE__ . '\\w3csspress_body_class_color' );
/**
 * Displays the colors class names for the body element.
 *
 * @since 2022.26
 *
 * @param array $classes Optional. Space-separated string or array of class names to add to the class list.
 *
 * @return array $classes Space-separated string or array of class names to add to the class list.
 */
function w3csspress_body_class_color( $classes ) {
	$w3csspress_color_theme_kind = esc_html( get_option( 'w3csspress_color_theme_kind' ) );
	if ( '' !== $w3csspress_color_theme_kind ) {
		$classes[] = "w3-theme-$w3csspress_color_theme_kind";
	} else {
		$classes[] = 'w3-theme';
	}
	return $classes;
}
