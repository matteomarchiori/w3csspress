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

/**
 * Add colors settings to the WordPress customizer.
 *
 * @since 2022.22
 *
 * @param WP_Customize_Manager $wp_customize Required. WordPress customizer.
 */
function w3csspress_customize_colors( $wp_customize ) {
	$w3csspress_themes = array(
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

	asort( $w3csspress_themes );

	$w3csspress_theme_kinds = array(
		'd5' => __( 'Dark', 'w3csspress' ) . ' 5',
		'd4' => __( 'Dark', 'w3csspress' ) . ' 4',
		'd3' => __( 'Dark', 'w3csspress' ) . ' 3',
		'd2' => __( 'Dark', 'w3csspress' ) . ' 2',
		'd1' => __( 'Dark', 'w3csspress' ) . ' 1',
		''   => __( 'Default', 'w3csspress' ),
		'l1' => __( 'Light', 'w3csspress' ) . ' 1',
		'l2' => __( 'Light', 'w3csspress' ) . ' 2',
		'l3' => __( 'Light', 'w3csspress' ) . ' 3',
		'l4' => __( 'Light', 'w3csspress' ) . ' 4',
		'l5' => __( 'Light', 'w3csspress' ) . ' 5',
	);

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
			'choices'     => $w3csspress_themes,
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
			'choices'     => $w3csspress_theme_kinds,
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

/**
 * Add scripts and styles related to colors.
 *
 * @since 2022.22
 */
function w3csspress_enqueue_script_colors() {
	$w3csspress_color_theme = esc_html( get_option( 'w3csspress_color_theme' ) );
	if ( '' !== $w3csspress_color_theme ) {
		wp_enqueue_style( "w3-theme-$w3csspress_color_theme", get_template_directory_uri() . "/assets/css/lib/w3-theme-$w3csspress_color_theme.css", false, THEME_VERSION, 'all' );
		if ( strpos( $color_theme, 'w3schools' ) !== false ) {
			wp_style_add_data( "w3-theme-$w3csspress_color_theme", 'rtl', 'replace' );
		}
	}
}

/**
 * Add colors JavaScript to the footer.
 *
 * @since 2022.22
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

/**
 * Add colors related class names to the body element
 *
 * @since 2022.22
 *
 * @return array $classes Space-separated string or array of class names to add to the class list.
 */
function w3csspress_body_class_color() {
	$w3csspress_classes          = array();
	$w3csspress_color_theme_kind = esc_html( get_option( 'w3csspress_color_theme_kind' ) );
	if ( '' !== $w3csspress_color_theme_kind ) {
		$w3csspress_classes[] = "w3-theme-$w3csspress_color_theme_kind";
	} else {
		$w3csspress_classes[] = 'w3-theme';
	}
	return $w3csspress_classes;
}
