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
			'label'       => esc_html__( 'Select color theme', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change the theme colors.', 'w3csspress' ),
			'settings'    => 'w3csspress_color_theme',
			'priority'    => $w3csspress_priority++,
			'section'     => 'colors',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_themes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_color_theme_kind',
		array(
			'label'       => esc_html__( 'Select theme kind', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change the theme between default, light and dark.', 'w3csspress' ),
			'settings'    => 'w3csspress_color_theme_kind',
			'priority'    => $w3csspress_priority++,
			'section'     => 'colors',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_theme_kinds(),
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'w3csspress_color_theme_text_custom',
			array(
				'label'       => esc_html__( 'Text theme color', 'w3csspress' ),
				'description' => esc_html__( 'Change theme text color', 'w3csspress' ),
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
				'label'       => esc_html__( 'Link color', 'w3csspress' ),
				'description' => esc_html__( 'Change link color', 'w3csspress' ),
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
						esc_html__( 'H%s color', 'w3csspress' ),
						$i
					),
					'description' => sprintf(
						/* translators: index for headings */
						esc_html__( 'Change color of h%s.', 'w3csspress' ),
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

add_action( 'w3csspress_footer_color', __NAMESPACE__ . '\\w3csspress_footer_color' );
/**
 * Fires when WordPress loads the footer, to enqueue colors checks.
 *
 * @since 2022.26
 */
function w3csspress_footer_color() {
	for ( $i = 1; $i < 7; $i++ ) {
		if ( '' !== esc_html( get_option( "w3csspress_color_h$i" ) ) ) {
			echo 'newStyle("h' . esc_html( $i ) . '{color:' . esc_html( get_option( "w3csspress_color_h$i" ) ) . '}");';
		}
	}
	if ( '' !== esc_html( get_option( 'w3csspress_color_theme_text_custom' ) ) ) {
		echo 'newStyle("body:not(" + excluded + "){color:' . esc_html( get_option( 'w3csspress_color_theme_text_custom' ) ) . ' !important}");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_color_link' ) ) ) {
		echo 'newStyle("a:not(" + excluded + "){color:' . esc_html( get_option( 'w3csspress_color_link' ) ) . ' !important}");';
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
