<?php
/**
 * Functions of the theme related to fonts customization
 *
 * This file is used for the theme functions related to fonts customization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'classes/class-w3csspress-constants' );

add_action( 'customize_register', __NAMESPACE__ . '\\w3csspress_customize_fonts' );
/**
 * Add fonts settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_fonts( $wp_customize ) {
	$w3csspress_priority = 1;

	$wp_customize->add_section(
		'w3csspress_fonts',
		array(
			'title'          => esc_html__( 'Fonts options', 'w3csspress' ),
			'description'    => esc_html__( 'Customize fonts options here.', 'w3csspress' ),
			'panel'          => '',
			'priority'       => $w3csspress_priority++,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_family',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_google_font_headings',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_google_font',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_size_paragraph',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_size_div',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_size_input',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_size_table',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_size_ul',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_size_ol',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_weight_paragraph',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_weight_div',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_weight_input',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_weight_table',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_weight_ul',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_font_weight_ol',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_family',
		array(
			'label'       => esc_html__( 'Select font family', 'w3csspress' ),
			'description' => esc_html__( 'Change font family of website.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_family',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_families(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_google_font_headings',
		array(
			'label'       => esc_html__( 'Use Google font for headings', 'w3csspress' ),
			'description' => esc_html__( 'Change font family of headings.', 'w3csspress' ),
			'settings'    => 'w3csspress_google_font_headings',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'text',
		)
	);

	$wp_customize->add_control(
		'w3csspress_google_font',
		array(
			'label'       => esc_html__( 'Use Google font', 'w3csspress' ),
			'description' => esc_html__( 'Change font family of website.', 'w3csspress' ),
			'settings'    => 'w3csspress_google_font',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'text',
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_paragraph',
		array(
			'label'       => esc_html__( 'Select paragraphs font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of paragraphs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_paragraph',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_div',
		array(
			'label'       => esc_html__( 'Select div font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of div.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_div',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_input',
		array(
			'label'       => esc_html__( 'Select input font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of inputs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_input',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_table',
		array(
			'label'       => esc_html__( 'Select table font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of tables.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_table',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_ul',
		array(
			'label'       => esc_html__( 'Select unordered list font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of unordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_ul',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_ol',
		array(
			'label'       => esc_html__( 'Select ordered list font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of ordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_ol',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_paragraph',
		array(
			'label'       => esc_html__( 'Select paragraphs font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of paragraphs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_paragraph',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_weights(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_div',
		array(
			'label'       => esc_html__( 'Select div font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of div.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_div',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_weights(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_input',
		array(
			'label'       => esc_html__( 'Select input font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of inputs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_input',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_weights(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_table',
		array(
			'label'       => esc_html__( 'Select table font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of tables.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_table',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_weights(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_ul',
		array(
			'label'       => esc_html__( 'Select unordered list font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of unordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_ul',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_weights(),
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_ol',
		array(
			'label'       => esc_html__( 'Select ordered list font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of ordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_ol',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_fonts',
			'type'        => 'select',
			'choices'     => W3csspress_Constants::w3csspress_font_weights(),
		)
	);

	for ( $i = 1; $i < 7; $i++ ) {
		$wp_customize->add_setting(
			"w3csspress_font_size_h$i",
			array(
				'default'           => '',
				'type'              => 'option',
				'sanitize_callback' => 'w3csspress\sanitize_select',
			)
		);

		$wp_customize->add_setting(
			"w3csspress_font_weight_h$i",
			array(
				'default'           => '',
				'type'              => 'option',
				'sanitize_callback' => 'w3csspress\sanitize_select',
			)
		);

		$wp_customize->add_control(
			"w3csspress_font_size_h$i",
			array(
				'label'       => sprintf(
					/* translators: index for headings */
					esc_html__( 'Select h%s font size', 'w3csspress' ),
					$i
				),
				'description' => sprintf(
					/* translators: index for headings */
					esc_html__( 'Change font size of h%s.', 'w3csspress' ),
					$i
				),
				'settings'    => "w3csspress_font_size_h$i",
				'priority'    => $w3csspress_priority++,
				'section'     => 'w3csspress_fonts',
				'type'        => 'select',
				'choices'     => W3csspress_Constants::w3csspress_font_sizes(),
			)
		);

		$wp_customize->add_control(
			"w3csspress_font_weight_h$i",
			array(
				'label'       => sprintf(
					/* translators: index for headings */
					esc_html__( 'Select h%s font weight', 'w3csspress' ),
					$i
				),
				'description' => sprintf(
					/* translators: index for headings */
					esc_html__( 'Change font weight of h%s.', 'w3csspress' ),
					$i
				),
				'settings'    => "w3csspress_font_weight_h$i",
				'priority'    => $w3csspress_priority++,
				'section'     => 'w3csspress_fonts',
				'type'        => 'select',
				'choices'     => W3csspress_Constants::w3csspress_font_weights(),
			)
		);
	}
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\w3csspress_enqueue_script_fonts' );
/**
 * Add scripts and styles related to fonts.
 *
 * @since 2022.22
 */
function w3csspress_enqueue_script_fonts() {
	$w3csspress_version     = wp_get_theme()->get( 'Version' );
	$w3csspress_google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' !== $w3csspress_google_font ) {
		wp_enqueue_style( 'google-font', "https://fonts.googleapis.com/css?family=$w3csspress_google_font&display=swap", false, $w3csspress_version, 'all' );
	}
	$w3csspress_google_font_headings = esc_html( get_option( 'w3csspress_google_font_headings' ) );
	if ( '' !== $w3csspress_google_font_headings ) {
		wp_enqueue_style( 'google-font-headings', "https://fonts.googleapis.com/css?family=$w3csspress_google_font_headings&display=swap", false, $w3csspress_version, 'all' );
	}
}

add_filter( 'w3csspress_fonts', __NAMESPACE__ . '\\w3csspress_fonts', 10, 2 );
/**
 * Add fonts classes and styles.
 *
 * @since 2022.32
 *
 * @param DOMDocument $dom Required. The DOM document.
 * @param DOMNode     $head Required. The head of the DOM document.
 */
function w3csspress_fonts( $dom, $head ) {
	$xpath               = new \DOMXPath( $dom );
	$w3csspress_elements = $xpath->query( '//p[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar" or ancestor::*[contains(@class, "sidebar")])]' );
	$w3csspress_classes  = esc_html( get_option( 'w3csspress_font_size_paragraph' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_classes = esc_html( get_option( 'w3csspress_font_weight_paragraph' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_elements = $xpath->query( '//div[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar" or ancestor::*[contains(@class, "sidebar")])]' );
	$w3csspress_classes  = esc_html( get_option( 'w3csspress_font_size_div' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_classes = esc_html( get_option( 'w3csspress_font_weight_div' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_elements = $xpath->query( '(//input|//button|//reset|//textarea)[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar" or ancestor::*[contains(@class, "sidebar")])]' );
	$w3csspress_classes  = esc_html( get_option( 'w3csspress_font_size_input' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_classes = esc_html( get_option( 'w3csspress_font_weight_input' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_elements = $xpath->query( '//table[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar" or ancestor::*[contains(@class, "sidebar")])]' );
	$w3csspress_classes  = esc_html( get_option( 'w3csspress_font_size_table' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_classes = esc_html( get_option( 'w3csspress_font_weight_table' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_elements = $xpath->query( '//ul[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar" or ancestor::*[contains(@class, "sidebar")])]' );
	$w3csspress_classes  = esc_html( get_option( 'w3csspress_font_size_ul' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_classes = esc_html( get_option( 'w3csspress_font_weight_ul' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_elements = $xpath->query( '//ol[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar" or ancestor::*[contains(@class, "sidebar")])]' );
	$w3csspress_classes  = esc_html( get_option( 'w3csspress_font_size_ol' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	$w3csspress_classes = esc_html( get_option( 'w3csspress_font_weight_ol' ) );
	apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	for ( $i = 1; $i < 7; $i++ ) {
		$w3csspress_elements = $xpath->query( "//h$i" );
		$w3csspress_classes  = esc_html( get_option( "w3csspress_font_size_h$i" ) );
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
		$w3csspress_classes = esc_html( get_option( "w3csspress_font_weight_h$i" ) );
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
		$w3csspress_classes = esc_html( get_option( 'w3csspress_font_family' ) );
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	}
	$w3csspress_google_font          = esc_html( str_replace( '+', ' ', get_option( 'w3csspress_google_font' ) ) );
	$w3csspress_google_font_headings = esc_html( str_replace( '+', ' ', get_option( 'w3csspress_google_font_headings' ) ) );
	if ( '' !== $w3csspress_google_font ) {
		$style = $dom->createElement( 'style', '.w3-google{font-family:' . esc_html( $w3csspress_google_font ) . '}' );
		$style->setAttribute( 'type', 'text/css' );
		$head->appendChild( $style );
	}
	if ( '' !== $w3csspress_google_font_headings ) {
		$style = $dom->createElement( 'style', '.w3-google-heading h1,.w3-google-heading h2,.w3-google-heading h3,.w3-google-heading h4,.w3-google-heading h5,.w3-google-heading h6{font-family:' . esc_html( $w3csspress_google_font_headings ) . '}' );
		$style->setAttribute( 'type', 'text/css' );
		$head->appendChild( $style );
	}
}

add_filter( 'body_class', __NAMESPACE__ . '\\w3csspress_body_class_fonts' );
/**
 * Displays the fonts class names for the body element.
 *
 * @since 2022.26
 *
 * @param array $classes Optional. Space-separated string or array of class names to add to the class list.
 *
 * @return array $classes Space-separated string or array of class names to add to the class list.
 */
function w3csspress_body_class_fonts( $classes ) {
	$w3csspress_google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' !== $w3csspress_google_font ) {
		$classes[] = 'w3-google';
	} else {
		$classes[] = esc_html( get_option( 'w3csspress_font_family' ) );
	}
	$w3csspress_google_font_headings = esc_html( get_option( 'w3csspress_google_font_headings' ) );
	if ( '' !== $w3csspress_google_font_headings ) {
		$classes[] = 'w3-google-heading';
	}
	return $classes;
}
