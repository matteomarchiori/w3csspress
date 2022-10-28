<?php
/**
 * Functions of the theme related to content customization
 *
 * This file is used for the theme functions related to content customization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

add_action( 'wp_body_open', __NAMESPACE__ . '\\w3csspress_skip_link' );
/**
 * Add skip to the content link.
 *
 * @since 2022.0
 */
function w3csspress_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html( ucfirst( __( 'skip to the content', 'w3csspress' ) ) ) . '</a>';
}

add_filter( 'the_content_more_link', __NAMESPACE__ . '\\w3csspress_read_more_link' );
/**
 * Add read more link.
 *
 * @since 2022.0
 *
 * @return string Read more link.
 */
function w3csspress_read_more_link() {
	if ( ! is_admin() ) {
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf(
			/* translators: read more link */
			esc_html( '&hellip;%s' ),
			'<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>'
		) . '</a>';
	}
}

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

add_action( 'customize_register', __NAMESPACE__ . '\\w3csspress_customize_content' );
/**
 * Add content settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_content( $wp_customize ) {
	$w3csspress_priority = 1;

	$wp_customize->add_section(
		'w3csspress_content',
		array(
			'title'          => esc_html( ucfirst( __( 'content options', 'w3csspress' ) ) ),
			'description'    => esc_html( ucfirst( __( 'customize content options here.', 'w3csspress' ) ) ),
			'panel'          => '',
			'priority'       => $w3csspress_priority++,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_footer',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_post_kses',
		)
	);

	$wp_customize->add_control(
		'w3csspress_footer',
		array(
			'label'       => esc_html( ucfirst( __( 'footer content', 'w3csspress' ) ) ),
			'description' => esc_html( ucfirst( __( 'set footer content.', 'w3csspress' ) ) ),
			'settings'    => 'w3csspress_footer',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_content',
			'type'        => 'text',
		)
	);
}
