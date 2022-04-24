<?php

/**
 * Functions of the theme related to speed customization
 *
 * This file is used for the theme functions related to speed customization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

/**
 * Add speed settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_speed( $wp_customize ) {
	$w3csspress_priority = 1;

	$wp_customize->add_section(
		'w3csspress_speed',
		array(
			'title'          => esc_html__( 'Speed options', 'w3csspress' ),
			'description'    => esc_html__( 'Customize speed options here.', 'w3csspress' ),
			'panel'          => '',
			'priority'       => $w3csspress_priority++,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_jquery',
		array(
			'default'           => 0,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_dashicons',
		array(
			'default'           => 0,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_jquery',
		array(
			'label'       => esc_html__( 'Disable jQuery', 'w3csspress' ),
			'description' => esc_html__( 'Disable or enable jQuery (do only if you know what you are doing).', 'w3csspress' ),
			'settings'    => 'w3csspress_jquery',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_speed',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_dashicons',
		array(
			'label'       => esc_html__( 'Enable Dashicons', 'w3csspress' ),
			'description' => esc_html__( 'Enable Dashicons on the frontend.', 'w3csspress' ),
			'settings'    => 'w3csspress_dashicons',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_speed',
			'type'        => 'checkbox',
		)
	);
}

/**
 * Settings to improve website speed or customization
 *
 * @since 2022.22
 */
function w3csspress_enqueue_script_speed() {
	if ( esc_html( get_option( 'w3csspress_jquery' ) ) ) {
		wp_deregister_script( 'jquery' );
	} else {
		wp_enqueue_script( 'jquery' );
	}
	if ( esc_html( get_option( 'w3csspress_dashicons' ) ) ) {
		wp_enqueue_script( 'dashicons' );
	}
}

add_filter( 'script_loader_tag', __NAMESPACE__ . '\\w3csspress_script_loader_tag', 10, 2 );
/**
 * Filters the HTML script tag of an enqueued script.
 *
 * @param string $tag The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @since 2022.19
 */
function w3csspress_script_loader_tag( $tag, $handle ) {
	if ( 'w3csspress-scripts' === $handle || 'dashicons' === $handle ) {
		return str_replace( ' src=', ' async src=', $tag );
	}
	return $tag;
}
