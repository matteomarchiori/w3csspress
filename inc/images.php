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
			'title'          => esc_html__( 'Images options', 'w3csspress' ),
			'description'    => esc_html__( 'Customize images options here.', 'w3csspress' ),
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
			'label'       => esc_html__( 'Rounded images', 'w3csspress' ),
			'description' => esc_html__( 'Round images on the page.', 'w3csspress' ),
			'settings'    => 'w3csspress_rounded_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_circle_img',
		array(
			'label'       => esc_html__( 'Circle images', 'w3csspress' ),
			'description' => esc_html__( 'Circle images on the page.', 'w3csspress' ),
			'settings'    => 'w3csspress_circle_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_bordered_img',
		array(
			'label'       => esc_html__( 'Bordered images', 'w3csspress' ),
			'description' => esc_html__( 'Border images on the page.', 'w3csspress' ),
			'settings'    => 'w3csspress_bordered_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_cards_img',
		array(
			'label'       => esc_html__( 'Card images', 'w3csspress' ),
			'description' => esc_html__( 'Images with card effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_cards_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_opacity_img',
		array(
			'label'       => esc_html__( 'Opacity images', 'w3csspress' ),
			'description' => esc_html__( 'Images with opacity effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_opacity_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_grayscale_img',
		array(
			'label'       => esc_html__( 'Grayscale images', 'w3csspress' ),
			'description' => esc_html__( 'Images with grayscale effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_grayscale_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_sepia_img',
		array(
			'label'       => esc_html__( 'Sepia images', 'w3csspress' ),
			'description' => esc_html__( 'Images with sepia effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_sepia_img',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_header_thumbnail',
		array(
			'label'       => esc_html__( 'Header thumbnail', 'w3csspress' ),
			'description' => esc_html__( 'Posts get the thumbnail as header image if they have one.', 'w3csspress' ),
			'settings'    => 'w3csspress_header_thumbnail',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_post_thumbnail',
		array(
			'label'       => esc_html__( 'Post thumbnail', 'w3csspress' ),
			'description' => esc_html__( 'Posts show the thumbnail if they have.', 'w3csspress' ),
			'settings'    => 'w3csspress_post_thumbnail',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_images',
			'type'        => 'checkbox',
		)
	);
}

add_action( 'w3csspress_footer_images', __NAMESPACE__ . '\\w3csspress_footer_images' );
/**
 * Add images JavaScript to the footer.
 *
 * @since 2022.22
 */
function w3csspress_footer_images() {
	if ( esc_html( get_option( 'w3csspress_rounded_img' ) ) ) {
		echo 'addClTag("img", "w3-round");';
	}
	if ( esc_html( get_option( 'w3csspress_circle_img' ) ) ) {
		echo 'addClTag("img", "w3-circle");';
	}
	if ( esc_html( get_option( 'w3csspress_bordered_img' ) ) ) {
		echo 'addClTag("img", "w3-border");';
	}
	if ( esc_html( get_option( 'w3csspress_cards_img' ) ) ) {
		echo 'addClTag("img", "w3-card");';
	}
	if ( esc_html( get_option( 'w3csspress_opacity_img' ) ) ) {
		echo 'addClTag("img", "w3-opacity");';
	}
	if ( esc_html( get_option( 'w3csspress_grayscale_img' ) ) ) {
		echo 'addClTag("img", "w3-greyscale");';
	}
	if ( esc_html( get_option( 'w3csspress_sepia_img' ) ) ) {
		echo 'addClTag("img", "w3-sepia");';
	}
	if ( function_exists( 'get_the_post_thumbnail_url' ) && esc_html( get_option( 'w3csspress_header_thumbnail' ) ) && has_post_thumbnail() ) {
		echo 'newStyle("#header{background-image:url(\'' . esc_url( get_the_post_thumbnail_url( null, 'full' ) ) . '\');}");';
	} elseif ( function_exists( 'has_header_image' ) && has_header_image() ) {
		echo 'newStyle("#header{background-image:url(\'' . esc_url( get_header_image() ) . '\');}");';
	}
}
