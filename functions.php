<?php
/**
 * Functions of the w3csspress theme
 *
 * This file is used for the theme functions.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

require_once get_template_directory() . '/inc/colors.php';
require_once get_template_directory() . '/inc/content.php';

/**
 * Returns the integer value of a variable.
 *
 * @since 2022.0
 *
 * @param int $value Required. Value to be checked.
 * @return int Integer value of the variable.
 */
function w3csspress_intval( $value ) {
	return (int) $value;
}

/**
 * Returns the sanitized value of a checkbox.
 *
 * @since 2022.0
 *
 * @param int $input Required. Value to be checked.
 * @return int,string 1 if checked, '' otherwise.
 */
function sanitize_checkbox( $input ) {
	return filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
}

/**
 * Returns the sanitized value of a select input.
 *
 * @since 2022.0
 *
 * @param string   $input Required. Value to be checked.
 * @param stdClass $setting settings with the possible values.
 * @return string $input if exists, default value otherwise.
 */
function sanitize_select( $input, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

add_action( 'customize_register', __NAMESPACE__ . '\\w3csspress_customize_register' );
/**
 * Fires once WordPress has loaded, allowing scripts and styles to be initialized.
 *
 * @since 2022.0
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_register( $wp_customize ) {
	w3csspress_customize_colors( $wp_customize );
	w3csspress_customize_content( $wp_customize );
	$font_sizes = array(
		''            => __( 'Default', 'w3csspress' ),
		'w3-tiny'     => __( 'Tiny', 'w3csspress' ),
		'w3-small'    => __( 'Small', 'w3csspress' ),
		'w3-medium'   => __( 'Medium', 'w3csspress' ),
		'w3-large'    => __( 'Large', 'w3csspress' ),
		'w3-xlarge'   => __( 'XL', 'w3csspress' ),
		'w3-xxlarge'  => __( 'XXL', 'w3csspress' ),
		'w3-xxxlarge' => __( 'XXXL', 'w3csspress' ),
		'w3-jumbo'    => __( 'Jumbo', 'w3csspress' ),
	);

	$font_weights = array(
		'' => __( 'Default', 'w3csspress' ),
	);
	for ( $i = 1; $i < 10; $i++ ) {
		$font_weights[ "w3-weight-$i" . '00' ] = __( 'Weight', 'w3csspress' ) . " $i" . '00';
	}

	$font_families = array(
		''              => __( 'Default', 'w3csspress' ),
		'w3-serif'      => __( 'Serif', 'w3csspress' ),
		'w3-sans-serif' => __( 'Sans serif', 'w3csspress' ),
		'w3-monospace'  => __( 'Monospace', 'w3csspress' ),
		'w3-cursive'    => __( 'Cursive', 'w3csspress' ),
	);

	$layouts = array(
		''           => __( 'Default', 'w3csspress' ),
		'w3-rest'    => __( 'One Column', 'w3csspress' ),
		'w3-half'    => __( 'Two Columns', 'w3csspress' ),
		'w3-third'   => __( 'Three Columns', 'w3csspress' ),
		'w3-quarter' => __( 'Four Columns', 'w3csspress' ),
	);

	$rounded = array(
		''                 => __( 'Default', 'w3csspress' ),
		'w3-round-small'   => __( 'Small', 'w3csspress' ),
		'w3-round-medium'  => __( 'Medium', 'w3csspress' ),
		'w3-round-large'   => __( 'Large', 'w3csspress' ),
		'w3-round-xlarge'  => __( 'XL', 'w3csspress' ),
		'w3-round-xxlarge' => __( 'XXL', 'w3csspress' ),
		'w3-circle'        => __( 'Circle', 'w3csspress' ),
	);

	$priority = 1;

	$wp_customize->add_section(
		'w3csspress_section',
		array(
			'title'          => esc_html__( 'Custom W3.CSS options', 'w3csspress' ),
			'description'    => esc_html__( 'Customize W3.CSS options here.', 'w3csspress' ),
			'panel'          => '',
			'priority'       => $priority++,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		)
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
		'w3csspress_layout',
		array(
			'label'       => esc_html__( 'Select layout', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change the page layout.', 'w3csspress' ),
			'settings'    => 'w3csspress_layout',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $layouts,
		)
	);

	$wp_customize->add_control(
		'w3csspress_rounded_style',
		array(
			'label'       => esc_html__( 'Select rounded style', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change some elements roundness (images have more controls).', 'w3csspress' ),
			'settings'    => 'w3csspress_rounded_style',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $rounded,
		)
	);

	$wp_customize->add_control(
		'w3csspress_grid_enabled',
		array(
			'label'       => esc_html__( 'Grid layout setting', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can enable or disable the grid layout.', 'w3csspress' ),
			'settings'    => 'w3csspress_grid_enabled',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_family',
		array(
			'label'       => esc_html__( 'Select font family', 'w3csspress' ),
			'description' => esc_html__( 'Change font family of website.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_family',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_families,
		)
	);

	$wp_customize->add_control(
		'w3csspress_google_font_headings',
		array(
			'label'       => esc_html__( 'Use Google font for headings', 'w3csspress' ),
			'description' => esc_html__( 'Change font family of headings.', 'w3csspress' ),
			'settings'    => 'w3csspress_google_font_headings',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'text',
		)
	);

	$wp_customize->add_control(
		'w3csspress_google_font',
		array(
			'label'       => esc_html__( 'Use Google font', 'w3csspress' ),
			'description' => esc_html__( 'Change font family of website.', 'w3csspress' ),
			'settings'    => 'w3csspress_google_font',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'text',
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_paragraph',
		array(
			'label'       => esc_html__( 'Select paragraphs font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of paragraphs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_paragraph',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_div',
		array(
			'label'       => esc_html__( 'Select div font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of div.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_div',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_input',
		array(
			'label'       => esc_html__( 'Select input font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of inputs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_input',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_table',
		array(
			'label'       => esc_html__( 'Select table font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of tables.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_table',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_ul',
		array(
			'label'       => esc_html__( 'Select unordered list font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of unordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_ul',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_ol',
		array(
			'label'       => esc_html__( 'Select ordered list font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of ordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_ol',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_paragraph',
		array(
			'label'       => esc_html__( 'Select paragraphs font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of paragraphs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_paragraph',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_div',
		array(
			'label'       => esc_html__( 'Select div font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of div.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_div',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_input',
		array(
			'label'       => esc_html__( 'Select input font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of inputs.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_input',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_table',
		array(
			'label'       => esc_html__( 'Select table font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of tables.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_table',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_ul',
		array(
			'label'       => esc_html__( 'Select unordered list font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of unordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_ul',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_ol',
		array(
			'label'       => esc_html__( 'Select ordered list font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of ordered list.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_ol',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
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
				'priority'    => $priority++,
				'section'     => 'w3csspress_section',
				'type'        => 'select',
				'choices'     => $font_sizes,
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
				'priority'    => $priority++,
				'section'     => 'w3csspress_section',
				'type'        => 'select',
				'choices'     => $font_weights,
			)
		);
	}

	$wp_customize->add_control(
		'w3csspress_rounded_img',
		array(
			'label'       => esc_html__( 'Rounded img', 'w3csspress' ),
			'description' => esc_html__( 'Round images on the page.', 'w3csspress' ),
			'settings'    => 'w3csspress_rounded_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_circle_img',
		array(
			'label'       => esc_html__( 'Circle img', 'w3csspress' ),
			'description' => esc_html__( 'Circle images on the page.', 'w3csspress' ),
			'settings'    => 'w3csspress_circle_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_bordered_img',
		array(
			'label'       => esc_html__( 'Bordered img', 'w3csspress' ),
			'description' => esc_html__( 'Border images on the page.', 'w3csspress' ),
			'settings'    => 'w3csspress_bordered_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_cards_img',
		array(
			'label'       => esc_html__( 'Card img', 'w3csspress' ),
			'description' => esc_html__( 'Image with card effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_cards_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_opacity_img',
		array(
			'label'       => esc_html__( 'Opacity img', 'w3csspress' ),
			'description' => esc_html__( 'Image with opacity effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_opacity_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_grayscale_img',
		array(
			'label'       => esc_html__( 'Grayscale img', 'w3csspress' ),
			'description' => esc_html__( 'Image with grayscale effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_grayscale_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_sepia_img',
		array(
			'label'       => esc_html__( 'Sepia img', 'w3csspress' ),
			'description' => esc_html__( 'Image with sepia effect.', 'w3csspress' ),
			'settings'    => 'w3csspress_sepia_img',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_header_thumbnail',
		array(
			'label'       => esc_html__( 'Header thumbnail', 'w3csspress' ),
			'description' => esc_html__( 'Posts get the thumbnail as header image if they have one.', 'w3csspress' ),
			'settings'    => 'w3csspress_header_thumbnail',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_post_thumbnail',
		array(
			'label'       => esc_html__( 'Post thumbnail', 'w3csspress' ),
			'description' => esc_html__( 'Posts show the thumbnail if they have.', 'w3csspress' ),
			'settings'    => 'w3csspress_post_thumbnail',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_jquery',
		array(
			'label'       => esc_html__( 'Disable jQuery', 'w3csspress' ),
			'description' => esc_html__( 'Disable or enable jQuery (do only if you know what you are doing).', 'w3csspress' ),
			'settings'    => 'w3csspress_jquery',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_control(
		'w3csspress_dashicons',
		array(
			'label'       => esc_html__( 'Enable Dashicons', 'w3csspress' ),
			'description' => esc_html__( 'Enable Dashicons on the frontend.', 'w3csspress' ),
			'settings'    => 'w3csspress_dashicons',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'checkbox',
		)
	);
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\w3csspress_setup' );
/**
 * Fires to finish the w3csspress theme setup.
 *
 * @since 2022.0
 */
function w3csspress_setup() {
	load_theme_textdomain( 'w3csspress', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'navigation-widgets', 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'woocommerce' );
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 250,
			'width'                => 250,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => true,
		)
	);
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1920,
			'height'      => 300,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => false,
		)
	);
	add_theme_support(
		'custom-background',
		array(
			'default-preset'     => 'fill',
			'default-position-x' => 'center',
			'default-position-y' => 'center',
			'default-size'       => 'contain',
			'default-repeat'     => 'no-repeat',
			'default-attachment' => 'fixed',
			'default-color'      => '',
		)
	);
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'w3csspress' ),
		)
	);
	add_editor_style(
		array(
			'assets/css/w3.css',
			'assets/css/editor-style.css',
		)
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\w3csspress_enqueue_script' );
/**
 * Fires once WordPress has loaded, allowing scripts and styles to be initialized.
 *
 * @since 2022.0
 */
function w3csspress_enqueue_script() {
	define( 'W3CSSPRESS_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w3', get_template_directory_uri() . '/assets/css/w3.css', false, '4.15', 'all' );
	wp_style_add_data( 'w3', 'rtl', 'replace' );
	wp_enqueue_style( 'w3-wide', get_template_directory_uri() . '/assets/css/w3-wide.css', false, '4.15', 'screen and (min-width: 1920px)' );
	wp_style_add_data( 'w3-wide', 'rtl', 'replace' );
	w3csspress_enqueue_script_color();
	$google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' !== $google_font ) {
		wp_enqueue_style( 'google-font', "https://fonts.googleapis.com/css?family=$google_font&display=swap", false, W3CSSPRESS_THEME_VERSION, 'all' );
	}
	$google_font_headings = esc_html( get_option( 'w3csspress_google_font_headings' ) );
	if ( '' !== $google_font_headings ) {
		wp_enqueue_style( 'google-font-headings', "https://fonts.googleapis.com/css?family=$google_font_headings&display=swap", false, W3CSSPRESS_THEME_VERSION, 'all' );
	}
	wp_enqueue_style( 'w3csspress-style', get_stylesheet_uri(), false, W3CSSPRESS_THEME_VERSION, 'all' );
	wp_style_add_data( 'w3csspress-style', 'rtl', 'replace' );
	wp_enqueue_script( 'w3csspress-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), W3CSSPRESS_THEME_VERSION, true );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	if ( esc_html( get_option( 'w3csspress_jquery' ) ) ) {
		wp_deregister_script( 'jquery' );
	} else {
		wp_enqueue_script( 'jquery' );
	}
	if ( esc_html( get_option( 'w3csspress_dashicons' ) ) ) {
		wp_enqueue_script( 'dashicons' );
	}
}

add_action( 'wp_footer', __NAMESPACE__ . '\\w3csspress_footer' );
/**
 * Fires when WordPress loads the footer, to enqueue some customizer checks.
 *
 * @since 2022.0
 */
function w3csspress_footer() {              ?>
	<script async type="text/javascript">
		function addClTag(tag, cl) {
			var tags = document.getElementsByTagName(tag);
			for (i = 0; i < tags.length; i++) {
				if ((' ' + tags[i].className + ' ').indexOf(cl) === -1)
					tags[i].className += ' ' + cl;
			}
		}

		function addClSel(sel, cl) {
			var eles = document.querySelectorAll(sel);
			for (i = 0; i < eles.length; i++) {
				if ((' ' + eles[i].className + ' ').indexOf(cl) === -1)
					eles[i].className += ' ' + cl;
			}
		}

		function newStyle(css) {
			var head = document.head;
			var style = document.createElement('style');
			head.appendChild(style);
			style.type = 'text/css';
			if (style.styleSheet) {
				style.styleSheet.cssText = css;
			} else {
				style.appendChild(document.createTextNode(css));
			}
		}
		window.addEventListener('load', function() {
			var excluded = "#wpadminbar, #wpadminbar *, .sidebar";
			<?php if ( esc_html( get_option( 'w3csspress_rounded_img' ) ) ) { ?>
				addClTag("img", "w3-round");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_circle_img' ) ) ) { ?>
				addClTag("img", "w3-circle");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_bordered_img' ) ) ) { ?>
				addClTag("img", "w3-border");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_cards_img' ) ) ) { ?>
				addClTag("img", "w3-card");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_opacity_img' ) ) ) { ?>
				addClTag("img", "w3-opacity");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_grayscale_img' ) ) ) { ?>
				addClTag("img", "w3-greyscale");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_sepia_img' ) ) ) { ?>
				addClTag("img", "w3-sepia");
			<?php } ?>
			addClSel("p:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_paragraph' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_paragraph' ) ); ?>");
			addClSel("div:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_div' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_div' ) ); ?>");
			addClSel("input:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			addClSel("button:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			addClSel("reset:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			addClSel("textarea:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			addClSel("table:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_table' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_table' ) ); ?>");
			addClSel("ul:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_ul' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_ul' ) ); ?>");
			addClSel("ol:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_font_size_ol' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_ol' ) ); ?>");
			addClSel("header:not(" + excluded + "),footer:not(" + excluded + "),div:not(" + excluded + "),p:not(" + excluded + "),form:not(" + excluded + "),table:not(" + excluded + "),article:not(" + excluded + "),section:not(" + excluded + "),nav:not(" + excluded + "),summary:not(" + excluded + "),button:not(" + excluded + "),reset:not(" + excluded + "),input:not(input[type='checkbox'],input[type='radio']," + excluded + "),textarea:not(" + excluded + "),ul:not(" + excluded + "),ol:not(" + excluded + ")", "<?php echo esc_html( get_option( 'w3csspress_rounded_style' ) ); ?>");
			<?php
			$google_font          = esc_html( str_replace( '+', ' ', get_option( 'w3csspress_google_font' ) ) );
			$google_font_headings = esc_html( str_replace( '+', ' ', get_option( 'w3csspress_google_font_headings' ) ) );
			for ( $i = 1; $i < 7; $i++ ) {
				echo 'addClTag("h' . intval( $i ) . '","' . esc_html( get_option( "w3csspress_font_size_h$i" ) ) . ' ' . esc_html( get_option( "w3csspress_font_weight_h$i" ) ) . '");';
			}
			w3csspress_footer_color();
			if ( '' !== $google_font ) {
				?>
				newStyle(".w3-google{font-family:<?php echo esc_html( $google_font ); ?>}");
				<?php
			}
			if ( '' !== $google_font_headings ) {
				?>
				newStyle(".w3-google-heading h1,.w3-google-heading h2,.w3-google-heading h3,.w3-google-heading h4,.w3-google-heading h5,.w3-google-heading h6{font-family:<?php echo esc_html( $google_font_headings ); ?>}");
			<?php } ?>
			<?php
			if ( function_exists( 'get_the_post_thumbnail_url' ) && esc_html( get_option( 'w3csspress_header_thumbnail' ) ) && has_post_thumbnail() ) {
				?>
				newStyle("#header{background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>');}");
				<?php
			} elseif ( function_exists( 'has_header_image' ) && has_header_image() ) {
				?>
				newStyle("#header{background-image:url('<?php echo esc_url( header_image() ); ?>')}");
			<?php } ?>
			if (window.outerWidth < 600) {
				var menu = document.getElementById("menu");
				if (menu != null) {
					menu.className += " w3-animate-bottom";
					var buttonMenu = document.createElement('button');
					buttonMenu.type = "button";
					buttonMenu.className = "menu-toggle w3-margin-top w3-right";
					buttonMenu.id = "burger";
					buttonMenu.innerHTML = "&equiv; <?php echo esc_html__( 'Menu', 'w3csspress' ); ?>";
					buttonMenu.addEventListener("click", function() {
						display = menu.style.display;
						if (display == "none" || display == '') menu.style.display = "block";
						else menu.style.display = "none";
					});
					var siteTitle = document.getElementById("site-title");
					siteTitle.parentNode.insertBefore(buttonMenu, siteTitle.nextSibling);
					var menuItems = document.getElementsByClassName("menu-item");
					var lastMenuItem = menuItems[menuItems.length - 1];
					var lastLink = lastMenuItem.getElementsByTagName("a");
					if (lastLink.length) lastLink[0].addEventListener("keydown", function(event) {
						event.preventDefault();
						if (event.which == 9 && !event.shiftKey) {
							buttonMenu.focus();
						}
					});
				}
			}
		}, false);
	</script>
	<?php
}

add_filter( 'the_title', __NAMESPACE__ . '\\w3csspress_title' );
/**
 * Filter for empty titles, replace with three periods.
 *
 * @since 2022.0
 *
 * @param string $title Required. The title of the post or page.
 * @return string The new title.
 */
function w3csspress_title( $title ) {
	if ( '' === $title ) {
		return '...';
	} else {
		return $title;
	}
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\w3csspress_excerpt_read_more_link', 5 );
/**
 * Add read more  for excerpt.
 *
 * @since 2022.0
 *
 * @param string $more Required. Default more string.
 *
 * @return string Read more link.
 */
function w3csspress_excerpt_read_more_link( $more ) {
	if ( ! is_admin() ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf(
			/* translators: read more link */
			esc_html__( '...%s', 'w3csspress' ),
			'<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>'
		) . '</a>';
	}
}

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter( 'intermediate_image_sizes_advanced', __NAMESPACE__ . '\\w3csspress_image_insert_override' );
/**
 * Customize sizes for media.
 *
 * @since 2022.0
 *
 * @param array $sizes Required. Default media sizes.
 *
 * @return array media sizes.
 */
function w3csspress_image_insert_override( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}

add_action( 'wp_head', __NAMESPACE__ . '\\w3csspress_pingback_header' );
/**
 * Add pingback header.
 *
 * @since 2022.0
 */
function w3csspress_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'comment_form_before', __NAMESPACE__ . '\\w3csspress_enqueue_comment_reply_script' );
/**
 * Add comment reply function
 *
 * @since 2022.0
 */
function w3csspress_enqueue_comment_reply_script() {
	if ( esc_html( get_option( 'thread_comments' ) ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Show trackbacks and pingbacks.
 *
 * @param string $comment Required. Comment.
 *
 * @since 2022.0
 */
function w3csspress_custom_pings( $comment ) {
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
	<?php
}

add_filter( 'get_comments_number', __NAMESPACE__ . '\\w3csspress_comment_count', 0 );
/**
 * Counter for comments.
 *
 * @since 2022.0
 *
 * @param int $count Required. Default count.
 * @return int Count of comments for post.
 */
function w3csspress_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$get_comments     = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $get_comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\add_additional_class_on_li', 1, 3 );
/**
 * Filters the CSS classes applied to a menu item’s list item element.
 *
 * @since 2022.0
 *
 * @param array    $classes Array of the CSS classes that are applied to the menu item's <li> element.
 * @param WP_Post  $item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @return array Array of the CSS classes that are applied to the menu item's <li> element.
 */
function add_additional_class_on_li( $classes, $item, $args ) {
	$classes[] = 'w3-bar-item';
	$classes[] = 'w3-mobile';
	if ( in_array( 'menu-item-has-children', $classes, true ) ) {
		$classes[] = 'w3-dropdown-hover w3-dropdown-focus';
	}
	$classes[] = get_option( 'w3csspress_rounded_style' );
	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\w3csspress_body_class' );
/**
 * Displays the class names for the body element.
 *
 * @since 2022.0
 *
 * @param array $classes Optional. Space-separated string or array of class names to add to the class list.
 *
 * @return array $classes Space-separated string or array of class names to add to the class list.
 */
function w3csspress_body_class( $classes ) {
	$classes     = array_merge( $classes, w3csspress_body_class_color() );
	$google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' === $google_font ) {
		$classes[] = esc_html( get_option( 'w3csspress_font_family' ) );
	} else {
		$classes[] = 'w3-google';
	}
	$google_font_headings = esc_html( get_option( 'w3csspress_google_font_headings' ) );
	if ( '' !== $google_font_headings ) {
		$classes[] = 'w3-google-heading';
	}
	return $classes;
}

add_filter( 'use_block_editor_for_post', '__return_false' );

add_filter( 'use_widgets_block_editor', '__return_false' );

add_filter(
	'bp_core_avatar_original_max_filesize',
	function () {
		return 26214400;
	}
);
add_filter(
	'bp_attachments_get_max_upload_file_size',
	function () {
		return 26214400;
	}
);

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\\w3csspress_comment_form_defaults' );
/**
 * Changes reply title for comments.
 *
 * @since 2022.4
 *
 * @param array $defaults . The default comment form arguments.
 *
 * @return array $defaults The default comment form arguments.
 */
function w3csspress_comment_form_defaults( $defaults ) {
	$defaults['title_reply_before'] = '<strong id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after']  = '</strong>';
	return $defaults;
}

add_action( 'widgets_init', __NAMESPACE__ . '\\w3csspress_register_sidebars' );
/**
 * Register the w3csspress sidebars
 *
 * @since 2022.7
 */
function w3csspress_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar', 'w3csspress' ),
			'description'   => __( 'Sidebar on the left.', 'w3csspress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'secondary',
			'name'          => __( 'Secondary Sidebar', 'w3csspress' ),
			'description'   => __( 'Sidebar on the right.', 'w3csspress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'headwidgets',
			'name'          => __( 'Head widgets Sidebar', 'w3csspress' ),
			'description'   => __( 'Widgets area on the head of the website.', 'w3csspress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footwidgets',
			'name'          => __( 'Foot widgets Sidebar', 'w3csspress' ),
			'description'   => __( 'Widgets area on the foot of the website.', 'w3csspress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}

/**
 * Return schema.org type based on page
 *
 * @since 2022.12
 */
function w3csspress_schema_type() {
	if ( is_single() ) {
		$type = 'Article';
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo esc_html( 'itemscope itemtype="https://schema.org/' . $type . '"' );
}

add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\\w3csspress_schema_url', 10 );
/**
 * Filters the HTML attributes applied to a menu item’s anchor element.
 *
 * @param array $atts The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
 *
 * @since 2022.12
 */
function w3csspress_schema_url( $atts ) {
	$atts['itemprop'] = 'url';
	return $atts;
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
