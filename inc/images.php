<?php
/**
 * Functions of the theme related to images customization
 *
 * This file is used for the theme functions related to images customization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

add_action( 'customize_register', __NAMESPACE__ . '\\w3csspress_customize_images' );
/**
 * Add images settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_images( $wp_customize ) {
	$w3csspress_priority = 1;

	$wp_customize->add_section(
		'w3csspress_images',
		array(
			'title'          => esc_html( ucfirst( __( 'images options', 'w3csspress' ) ) ),
			'description'    => esc_html( ucfirst( __( 'customize images options here.', 'w3csspress' ) ) ),
			'panel'          => '',
			'priority'       => $w3csspress_priority++,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_rounded_img',
		array(
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);
	$wp_customize->add_setting(
		'w3csspress_circle_img',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);
	$wp_customize->add_setting(
		'w3csspress_bordered_img',
		array(
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);
	$wp_customize->add_setting(
		'w3csspress_cards_img',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);
	$wp_customize->add_setting(
		'w3csspress_opacity_img',
		array(
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);
	$wp_customize->add_setting(
		'w3csspress_grayscale_img',
		array(
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);
	$wp_customize->add_setting(
		'w3csspress_sepia_img',
		array(
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_header_thumbnail',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_post_thumbnail',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_rounded_img',
		array(
			'label'       => esc_html( ucfirst( __( 'rounded images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'round images on the page.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_rounded_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_circle_img',
		array(
			'label'       => esc_html( ucfirst( __( 'circle images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'circle images on the page.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_circle_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_bordered_img',
		array(
			'label'       => esc_html( ucfirst( __( 'bordered images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'border images on the page.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_bordered_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_cards_img',
		array(
			'label'       => esc_html( ucfirst( __( 'card images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'images with card effect.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_cards_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_opacity_img',
		array(
			'label'       => esc_html( ucfirst( __( 'opacity images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'images with opacity effect.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_opacity_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_grayscale_img',
		array(
			'label'       => esc_html( ucfirst( __( 'grayscale images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'images with grayscale effect.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_grayscale_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_sepia_img',
		array(
			'label'       => esc_html( ucfirst( __( 'sepia images', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'images with sepia effect.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_sepia_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_header_thumbnail',
		array(
			'label'       => esc_html( ucfirst( __( 'header thumbnail', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'posts get the thumbnail as header image if they have one.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_header_thumbnail',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_post_thumbnail',
		array(
			'label'       => esc_html( ucfirst( __( 'post thumbnail', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'posts show the thumbnail if they have.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_post_thumbnail',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);
}

add_filter( 'w3csspress_images', __NAMESPACE__ . '\\w3csspress_images', 10, 2 );
/**
 * Add images classes.
 *
 * @since 2022.32
 *
 * @param DOMDocument $dom Required. The DOM document.
 * @param DOMNode     $head Required. The head of the DOM document.
 */
function w3csspress_images( $dom, $head ) {
	$xpath               = new \DOMXPath( $dom );
	$w3csspress_elements = $xpath->query( '//img' );
	if ( esc_html( get_option( 'w3csspress_rounded_img' ) ) ) {
		$w3csspress_classes = 'w3-round';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	}
	if ( esc_html( get_option( 'w3csspress_circle_img' ) ) ) {
		$w3csspress_classes = 'w3-circle';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
	}
	if ( esc_html( get_option( 'w3csspress_bordered_img' ) ) ) {
		$w3csspress_classes = 'w3-border';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );   }
	if ( esc_html( get_option( 'w3csspress_cards_img' ) ) ) {
		$w3csspress_classes = 'w3-card';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );   }
	if ( esc_html( get_option( 'w3csspress_opacity_img' ) ) ) {
		$w3csspress_classes = 'w3-opacity';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );   }
	if ( esc_html( get_option( 'w3csspress_grayscale_img' ) ) ) {
		$w3csspress_classes = 'w3-greyscale';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );   }
	if ( esc_html( get_option( 'w3csspress_sepia_img' ) ) ) {
		$w3csspress_classes = 'w3-sepia';
		apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );   }
	if ( function_exists( 'get_the_post_thumbnail_url' ) && esc_html( get_option( 'w3csspress_header_thumbnail' ) ) && has_post_thumbnail() ) {
		$style = $dom->createElement( 'style', '#header{background-image:url(\'' . esc_url( get_the_post_thumbnail_url( null, 'full' ) ) . '\');}' );
		$style->setAttribute( 'type', 'text/css' );
		$head->appendChild( $style );
	} elseif ( function_exists( 'has_header_image' ) && has_header_image() ) {
		$style = $dom->createElement( 'style', '#header{background-image:url(\'' . esc_url( get_header_image() ) . '\');}' );
		$style->setAttribute( 'type', 'text/css' );
		$head->appendChild( $style );
	}
}
