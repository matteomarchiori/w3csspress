<?php
/**
 * Functions of the theme related to layout customization
 *
 * This file is used for the theme functions related to layout customization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

/**
 * Add layout settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_layout( $wp_customize ) {
	$w3csspress_priority = 1;

	$wp_customize->add_section(
		'w3csspress_layout',
		array(
			'title'          => esc_html__( 'Layout options', 'w3csspress' ),
			'description'    => esc_html__( 'Customize layout options here.', 'w3csspress' ),
			'panel'          => '',
			'priority'       => $w3csspress_priority++,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		)
	);

	$w3csspress_layouts = array(
		''           => __( 'Default', 'w3csspress' ),
		'w3-rest'    => __( 'One Column', 'w3csspress' ),
		'w3-half'    => __( 'Two Columns', 'w3csspress' ),
		'w3-third'   => __( 'Three Columns', 'w3csspress' ),
		'w3-quarter' => __( 'Four Columns', 'w3csspress' ),
	);

	$w3csspress_rounded = array(
		''                 => __( 'Default', 'w3csspress' ),
		'w3-round-small'   => __( 'Small', 'w3csspress' ),
		'w3-round-medium'  => __( 'Medium', 'w3csspress' ),
		'w3-round-large'   => __( 'Large', 'w3csspress' ),
		'w3-round-xlarge'  => __( 'XL', 'w3csspress' ),
		'w3-round-xxlarge' => __( 'XXL', 'w3csspress' ),
		'w3-circle'        => __( 'Circle', 'w3csspress' ),
	);

	$wp_customize->add_setting(
		'w3csspress_rounded_style',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_layout',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_grid_enabled',
		array(
			'default'           => 1,
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_layout',
		array(
			'label'       => esc_html__( 'Select layout', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change the page layout.', 'w3csspress' ),
			'settings'    => 'w3csspress_layout',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_layout',
			'type'        => 'select',
			'choices'     => $w3csspress_layouts,
		)
	);

	$wp_customize->add_control(
		'w3csspress_rounded_style',
		array(
			'label'       => esc_html__( 'Select rounded style', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change some elements roundness (images have more controls).', 'w3csspress' ),
			'settings'    => 'w3csspress_rounded_style',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_layout',
			'type'        => 'select',
			'choices'     => $w3csspress_rounded,
		)
	);

	$wp_customize->add_control(
		'w3csspress_grid_enabled',
		array(
			'label'       => esc_html__( 'Grid layout setting', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can enable or disable the grid layout.', 'w3csspress' ),
			'settings'    => 'w3csspress_grid_enabled',
			'priority'    => $w3csspress_priority++,
			'section'     => 'w3csspress_layout',
			'type'        => 'checkbox',
		)
	);
}

/**
 * Add layout JavaScript to the footer.
 *
 * @since 2022.22
 */
function w3csspress_footer_layout() {
	echo 'addClSel("article:not(" + excluded + "),section:not(" + excluded + "),nav:not(" + excluded + "),summary:not(" + excluded + "),button:not(" + excluded + "),reset:not(" + excluded + "),input:not(input[type=\'checkbox\'],input[type=\'radio\']," + excluded + "),textarea:not(" + excluded + "),ul:not(" + excluded + "),ol:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_rounded_style' ) ) . '");';
}

/**
 * Filters the CSS classes applied to a menu item’s list item element.
 *
 * @since 2022.22
 *
 * @return array Array of the CSS classes that are applied to the menu item's <li> element.
 */
function add_additional_class_on_li_layout() {
	$w3csspress_classes   = array();
	$w3csspress_classes[] = get_option( 'w3csspress_rounded_style' );
	return $w3csspress_classes;
}
