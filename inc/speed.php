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

add_action( 'customize_register', __NAMESPACE__ . '\\w3csspress_customize_speed' );
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

	$wp_customize->add_setting(
		'w3csspress_gutenberg_posts',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_gutenberg_widgets',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_gutenberg_styles',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_fse',
		array(
			'default'           => 1,
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

	$wp_customize->add_control(
		'w3csspress_gutenberg_posts',
		array(
			'label'       => esc_html__( 'Enable Gutenberg for posts', 'w3csspress' ),
			'description' => esc_html__( 'Enable Gutenberg to edit posts.', 'w3csspress' ),
			'settings'    => 'w3csspress_gutenberg_posts',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_speed',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_gutenberg_widgets',
		array(
			'label'       => esc_html__( 'Enable Gutenberg for widgets', 'w3csspress' ),
			'description' => esc_html__( 'Enable Gutenberg to edit widgets.', 'w3csspress' ),
			'settings'    => 'w3csspress_gutenberg_widgets',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_speed',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_gutenberg_styles',
		array(
			'label'       => esc_html__( 'Enable block styles', 'w3csspress' ),
			'description' => esc_html__( 'Enable block styles.', 'w3csspress' ),
			'settings'    => 'w3csspress_gutenberg_styles',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_speed',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_fse',
		array(
			'label'       => esc_html__( 'Enable full site editor', 'w3csspress' ),
			'description' => esc_html__( 'Enable the full site editor.', 'w3csspress' ),
			'settings'    => 'w3csspress_fse',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_speed',
			'type'        => 'checkbox',
		)
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\w3csspress_enqueue_script_speed' );
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
	if ( ! ( esc_html( get_option( 'w3csspress_gutenberg_styles' ) ) ) ) {
		global $wp_styles;

		foreach ( $wp_styles->queue as $handle ) {
			if ( strpos( $handle, 'wp-block-' ) === 0 ) {
				wp_dequeue_style( $handle );
			}
		}
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

add_filter( 'use_block_editor_for_post', __NAMESPACE__ . '\\w3csspress_use_block_editor_for_post' );
/**
 * Filters to disable Gutenberg for posts if requested.
 *
 * @since 2022.28
 */
function w3csspress_use_block_editor_for_post() {
	return esc_html( get_option( 'w3csspress_gutenberg_posts' ) );
}

add_filter( 'use_widgets_block_editor', __NAMESPACE__ . '\\w3csspress_use_widgets_block_editor' );
/**
 * Filters to disable Gutenberg for widgets if requested.
 *
 * @since 2022.28
 */
function w3csspress_use_widgets_block_editor() {
	return esc_html( get_option( 'w3csspress_gutenberg_widgets' ) );
}

/**
 * Enable or disable the full site editing mode
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_fse() {
	global $wp_filesystem;
	require_once ABSPATH . 'wp-admin/includes/file.php';
	WP_Filesystem();
	$w3csspress_index_template        = get_template_directory() . '/templates/index.html';
	$w3csspress_index_template_exists = $wp_filesystem->exists( $w3csspress_index_template );
	if ( ! ( esc_html( get_option( 'w3csspress_fse' ) ) ) && $w3csspress_index_template_exists ) {
		$wp_filesystem->move( $w3csspress_index_template, get_template_directory() . '/templates/inactive-index.html' );
	}
	if ( esc_html( get_option( 'w3csspress_fse' ) ) && ! $w3csspress_index_template_exists ) {
		$wp_filesystem->move( get_template_directory() . '/templates/inactive-index.html', $w3csspress_index_template );
	}
}

w3csspress_fse();
