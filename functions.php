<?php
/**
 * Functions of the w3csspress theme
 *
 * This file is used for functions used to customize the w3csspress theme.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_template_part( 'class-w3csspress-walker-nav-menu' );

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
	$color_themes = array(
		''            => __( 'Default', 'w3csspress' ),
		'w3schools'   => __( 'W3Schools', 'w3csspress' ),
		'amber'       => __( 'Amber', 'w3csspress' ),
		'black'       => __( 'Black', 'w3csspress' ),
		'blue'        => __( 'Blue', 'w3csspress' ),
		'blue-grey'   => __( 'Blue Grey', 'w3csspress' ),
		'brown'       => __( 'Brown', 'w3csspress' ),
		'cyan'        => __( 'Cyan', 'w3csspress' ),
		'dark-grey'   => __( 'Dark Grey', 'w3csspress' ),
		'deep-orange' => __( 'Deep Orange', 'w3csspress' ),
		'deep-purple' => __( 'Deep Purple', 'w3csspress' ),
		'green'       => __( 'Green', 'w3csspress' ),
		'grey'        => __( 'Grey', 'w3csspress' ),
		'indigo'      => __( 'Indigo', 'w3csspress' ),
		'khaki'       => __( 'Khaki', 'w3csspress' ),
		'light-blue'  => __( 'Light Blue', 'w3csspress' ),
		'light-green' => __( 'Light Green', 'w3csspress' ),
		'lime'        => __( 'Lime', 'w3csspress' ),
		'orange'      => __( 'Orange', 'w3csspress' ),
		'pink'        => __( 'Pink', 'w3csspress' ),
		'purple'      => __( 'Purple', 'w3csspress' ),
		'red'         => __( 'Red', 'w3csspress' ),
		'teal'        => __( 'Teal', 'w3csspress' ),
		'yellow'      => __( 'Yellow', 'w3csspress' ),
	);
	asort( $color_themes );

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

	$theme_kinds = array();
	for ( $i = 5; $i > 0; $i-- ) {
		$theme_kinds[ "d$i" ] = __( 'Dark', 'w3csspress' ) . " $i";
	}
	$theme_kinds[''] = 'Default';
	for ( $i = 1; $i < 6; $i++ ) {
		$theme_kinds[ "l$i" ] = __( 'Light', 'w3csspress' ) . " $i";
	}

	$layouts = array(
		''           => __( 'Default', 'w3csspress' ),
		'w3-rest'    => __( 'One Column', 'w3csspress' ),
		'w3-half'    => __( 'Two Columns', 'w3csspress' ),
		'w3-third'   => __( 'Three Columns', 'w3csspress' ),
		'w3-quarter' => __( 'Four Columns', 'w3csspress' ),
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
		'w3csspress_color_theme',
		array(
			'default'           => 'blue-grey',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'w3csspress_theme_kind',
		array(
			'default'           => 'l3',
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
		'w3csspress_google_font',
		array(
			'default'           => 'Roboto',
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
		'w3csspress_max_width',
		array(
			'default'           => '80',
			'type'              => 'option',
			'sanitize_callback' => 'w3csspress\w3csspress_intval',
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
		'w3csspress_footer',
		array(
			'label'       => esc_html__( 'Footer content', 'w3csspress' ),
			'description' => esc_html__( 'Set footer content.', 'w3csspress' ),
			'settings'    => 'w3csspress_footer',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'text',
		)
	);

	$wp_customize->add_control(
		'w3csspress_max_width',
		array(
			'label'       => esc_html__( 'Max width', 'w3csspress' ),
			'description' => esc_html__( 'Set page max width in vw.', 'w3csspress' ),
			'settings'    => 'w3csspress_max_width',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'text',
		)
	);

	$wp_customize->add_control(
		'w3csspress_color_theme',
		array(
			'label'       => esc_html__( 'Select color theme', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change the theme colors.', 'w3csspress' ),
			'settings'    => 'w3csspress_color_theme',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $color_themes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_theme_kind',
		array(
			'label'       => esc_html__( 'Select theme kind', 'w3csspress' ),
			'description' => esc_html__( 'Using this option you can change the theme between default, light and dark.', 'w3csspress' ),
			'settings'    => 'w3csspress_theme_kind',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $theme_kinds,
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
	}

	$wp_customize->add_control(
		'w3csspress_font_size_h1',
		array(
			'label'       => esc_html__( 'Select h1 font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of h1.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_h1',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_h2',
		array(
			'label'       => esc_html__( 'Select h2 font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of h2.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_h2',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_h3',
		array(
			'label'       => esc_html__( 'Select h3 font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of h3.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_h3',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_h4',
		array(
			'label'       => esc_html__( 'Select h4 font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of h4.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_h4',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_h5',
		array(
			'label'       => esc_html__( 'Select h5 font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of h5.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_h5',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_size_h6',
		array(
			'label'       => esc_html__( 'Select h6 font size', 'w3csspress' ),
			'description' => esc_html__( 'Change font size of h6.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_size_h6',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_sizes,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_h1',
		array(
			'label'       => esc_html__( 'Select h1 font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of h1.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_h1',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_h2',
		array(
			'label'       => esc_html__( 'Select h2 font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of h2.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_h2',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_h3',
		array(
			'label'       => esc_html__( 'Select h3 font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of h3.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_h3',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_h4',
		array(
			'label'       => esc_html__( 'Select h4 font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of h4.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_h4',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_h5',
		array(
			'label'       => esc_html__( 'Select h5 font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of h5.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_h5',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

	$wp_customize->add_control(
		'w3csspress_font_weight_h6',
		array(
			'label'       => esc_html__( 'Select h6 font weight', 'w3csspress' ),
			'description' => esc_html__( 'Change font weight of h6.', 'w3csspress' ),
			'settings'    => 'w3csspress_font_weight_h6',
			'priority'    => $priority++,
			'section'     => 'w3csspress_section',
			'type'        => 'select',
			'choices'     => $font_weights,
		)
	);

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
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'w3', get_template_directory_uri() . '/assets/css/w3.css', false, '4.15', 'all' );
	wp_style_add_data( 'w3', 'rtl', 'replace' );
	$color_theme = esc_html( get_option( 'w3csspress_color_theme' ) );
	if ( '' !== $color_theme ) {
		wp_enqueue_style( "w3-theme-$color_theme", get_template_directory_uri() . "/assets/css/lib/w3-theme-$color_theme.css", false, $theme_version, 'all' );
		if ( strpos( $color_theme, 'w3schools' ) !== false ) {
			wp_style_add_data( "w3-theme-$color_theme", 'rtl', 'replace' );
		}
	}
	$google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' !== $google_font ) {
		wp_enqueue_style( 'google-font', "https://fonts.googleapis.com/css?family=$google_font", false, $theme_version, 'all' );
	}
	wp_enqueue_style( 'w3csspress-style', get_stylesheet_uri(), false, $theme_version, 'all' );
	wp_style_add_data( 'w3csspress-style', 'rtl', 'replace' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'w3csspress-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), $theme_version, true );
}

add_action( 'wp_footer', __NAMESPACE__ . '\\w3csspress_footer' );
/**
 * Fires when WordPress loads the footer, to enqueue some customizer checks.
 *
 * @since 2022.0
 */
function w3csspress_footer() {     ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var excluded = "#wpadminbar, #wpadminbar *";
			<?php if ( esc_html( get_option( 'w3csspress_rounded_img' ) ) ) { ?>
				$("img").addClass("w3-round");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_circle_img' ) ) ) { ?>
				$("img").addClass("w3-circle");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_bordered_img' ) ) ) { ?>
				$("img").addClass("w3-border");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_cards_img' ) ) ) { ?>
				$("img").addClass("w3-card");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_opacity_img' ) ) ) { ?>
				$("img").addClass("w3-opacity");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_grayscale_img' ) ) ) { ?>
				$("img").addClass("w3-grayscale");
			<?php } ?>
			<?php if ( esc_html( get_option( 'w3csspress_sepia_img' ) ) ) { ?>
				$("img").addClass("w3-sepia");
			<?php } ?>
			$("p").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_paragraph' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_paragraph' ) ); ?>");
			$("div").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_div' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_div' ) ); ?>");
			$("input").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			$("button").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			$("reset").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			$("textarea").addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>");
			$("table").addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_table' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_table' ) ); ?>");
			$("ul").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_ul' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_ul' ) ); ?>");
			$("ol").not(excluded).addClass("<?php echo esc_html( get_option( 'w3csspress_font_size_ol' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_ol' ) ); ?>");
			<?php
			$google_font = esc_html( get_option( 'w3csspress_google_font' ) );
			$max_width   = esc_html( get_option( 'w3csspress_max_width' ) );
			if ( '' !== $google_font ) {
				$font = 'w3-google';
			} else {
				$font = esc_html( get_option( 'w3csspress_font_family' ) );
			}
			for ( $i = 1; $i < 7; $i++ ) {
				echo "$('h" . intval( $i ) . "').addClass(\"" . esc_html( get_option( "w3csspress_font_size_h$i" ) ) . ' ' . esc_html( $font ) . '");';
			}
			if ( '' !== $google_font ) {
				?>
				$("<style type='text/css'> .w3-google{font-family:<?php echo esc_html( str_replace( '+', ' ', $google_font ) ); ?>} </style>").appendTo("head");
			<?php } ?>
			<?php
			if ( '' !== $max_width ) {
				?>
				$("<style type='text/css'> body{max-width:<?php echo intval( $max_width ); ?>vw;} </style>").appendTo("head");
				<?php
			}
			if ( function_exists( 'get_the_post_thumbnail_url' ) && esc_html( get_option( 'w3csspress_header_thumbnail' ) ) && has_post_thumbnail() ) {
				?>
				$("<style type='text/css'> #header{background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>');} </style>").appendTo("head");
				<?php
			} elseif ( function_exists( 'has_header_image' ) && has_header_image() ) {
				?>
				$("<style type='text/css'> #header{background-image:url('<?php echo esc_url( header_image() ); ?>');} </style>").appendTo("head");
			<?php } ?>
		});
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

add_action( 'wp_body_open', __NAMESPACE__ . '\\w3csspress_skip_link' );
/**
 * Add skip to the content link.
 *
 * @since 2022.0
 */
function w3csspress_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'w3csspress' ) . '</a>';
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
			esc_html__( '...%s', 'w3csspress' ),
			'<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>'
		) . '</a>';
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
	return $classes;
}

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

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
	$theme_kind = esc_html( get_option( 'w3csspress_theme_kind' ) );
	if ( '' !== $theme_kind ) {
		$classes[] = "w3-theme-$theme_kind";
	} else {
		$classes[] = 'w3-theme';
	}
	$google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' === $google_font ) {
		$classes[] = esc_html( get_option( 'w3csspress_font_family' ) );
	} else {
		$classes[] = 'w3-google';
	}
	return $classes;
}

add_filter( 'use_block_editor_for_post', '__return_false' );

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

add_action( 'after_switch_theme', __NAMESPACE__ . '\\w3csspress_after_switch_theme' );
/**
 * Fires on the first WP load after a theme switch if the old theme still exists.
 *
 * @since 2022.5
 */
function w3csspress_after_switch_theme() {
	add_option( 'w3csspress_color_theme', 'blue-grey' );
	add_option( 'w3csspress_theme_kind', 'l3' );
	add_option( 'w3csspress_google_font', 'Roboto' );
	add_option( 'w3csspress_max_width', '80' );
	add_option( 'w3csspress_circle_img', 1 );
	add_option( 'w3csspress_cards_img', 1 );
	add_option( 'w3csspress_grid_enabled', 1 );
	add_option( 'w3csspress_header_thumbnail', 1 );
	add_option( 'w3csspress_post_thumbnail', 1 );
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
