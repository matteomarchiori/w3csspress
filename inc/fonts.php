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

	$w3csspress_font_sizes = array(
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

	$w3csspress_font_weights = array(
		'' => __( 'Default', 'w3csspress' ),
	);
	for ( $i = 1; $i < 10; $i++ ) {
		$w3csspress_font_weights[ "w3-weight-$i" . '00' ] = __( 'Weight', 'w3csspress' ) . " $i" . '00';
	}

	$w3csspress_font_families = array(
		''              => __( 'Default', 'w3csspress' ),
		'w3-serif'      => __( 'Serif', 'w3csspress' ),
		'w3-sans-serif' => __( 'Sans serif', 'w3csspress' ),
		'w3-monospace'  => __( 'Monospace', 'w3csspress' ),
		'w3-cursive'    => __( 'Cursive', 'w3csspress' ),
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
			'choices'     => $w3csspress_font_families,
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
			'choices'     => $w3csspress_font_sizes,
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
			'choices'     => $w3csspress_font_sizes,
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
			'choices'     => $w3csspress_font_sizes,
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
			'choices'     => $w3csspress_font_sizes,
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
			'choices'     => $w3csspress_font_sizes,
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
			'choices'     => $w3csspress_font_sizes,
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
			'choices'     => $w3csspress_font_weights,
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
			'choices'     => $w3csspress_font_weights,
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
			'choices'     => $w3csspress_font_weights,
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
			'choices'     => $w3csspress_font_weights,
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
			'choices'     => $w3csspress_font_weights,
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
			'choices'     => $w3csspress_font_weights,
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
				'choices'     => $w3csspress_font_sizes,
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
				'choices'     => $w3csspress_font_weights,
			)
		);
	}
}

/**
 * Add scripts and styles related to fonts.
 *
 * @since 2022.22
 */
function w3csspress_enqueue_script_fonts() {
	$w3csspress_google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' !== $w3csspress_google_font ) {
		wp_enqueue_style( 'google-font', "https://fonts.googleapis.com/css?family=$w3csspress_google_font&display=swap", false, W3CSSPRESS_THEME_VERSION, 'all' );
	}
	$w3csspress_google_font_headings = esc_html( get_option( 'w3csspress_google_font_headings' ) );
	if ( '' !== $w3csspress_google_font_headings ) {
		wp_enqueue_style( 'google-font-headings', "https://fonts.googleapis.com/css?family=$w3csspress_google_font_headings&display=swap", false, W3CSSPRESS_THEME_VERSION, 'all' );
	}
}

/**
 * Add fonts JavaScript to the footer.
 *
 * @since 2022.22
 */
function w3csspress_footer_fonts() {
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_paragraph' ) ) ) {
		echo 'addClSel("p:not(" + excluded + ")","' . esc_html( get_option( 'w3csspress_font_size_paragraph' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_paragraph' ) ) ) {
		echo 'addClSel("p:not(" + excluded + ")","' . esc_html( get_option( 'w3csspress_font_weight_paragraph' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_div' ) ) ) {
		echo 'addClSel("div:not(" + excluded + ")","' . esc_html( get_option( 'w3csspress_font_size_div' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_div' ) ) ) {
		echo 'addClSel("div:not(" + excluded + ")","' . esc_html( get_option( 'w3csspress_font_weight_div' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_input' ) ) ) {
		echo 'addClSel("input:not(" + excluded + "),"' . esc_html( get_option( 'w3csspress_font_size_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_input' ) ) ) {
		echo 'addClSel("input:not(" + excluded + "),"' . esc_html( get_option( 'w3csspress_font_weight_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_input' ) ) ) {
		echo 'addClSel("button:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_size_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_input' ) ) ) {
		echo 'addClSel("button:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_weight_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_input' ) ) ) {
		echo 'addClSel("reset:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_size_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_input' ) ) ) {
		echo 'addClSel("reset:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_weight_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_input' ) ) ) {
		echo 'addClSel("textarea:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_size_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_input' ) ) ) {
		echo 'addClSel("textarea:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_weight_input' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_table' ) ) ) {
		echo 'addClSel("table:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_size_table' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_table' ) ) ) {
		echo 'addClSel("table:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_weight_table' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_ul' ) ) ) {
		echo 'addClSel("ul:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_size_ul' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_ul' ) ) ) {
		echo 'addClSel("ul:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_weight_ul' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_size_ol' ) ) ) {
		echo 'addClSel("ol:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_size_ol' ) ) . '");';
	}
	if ( '' !== esc_html( get_option( 'w3csspress_font_weight_ol' ) ) ) {
		echo 'addClSel("ol:not(" + excluded + ")", "' . esc_html( get_option( 'w3csspress_font_weight_ol' ) ) . '");';
	}
	$w3csspress_google_font          = esc_html( str_replace( '+', ' ', get_option( 'w3csspress_google_font' ) ) );
	$w3csspress_google_font_headings = esc_html( str_replace( '+', ' ', get_option( 'w3csspress_google_font_headings' ) ) );
	for ( $i = 1; $i < 7; $i++ ) {
		if ( '' !== esc_html( get_option( "w3csspress_font_size_h$i" ) ) ) {
			echo 'addClTag("h' . intval( $i ) . '","' . esc_html( get_option( "w3csspress_font_size_h$i" ) ) . '");';
		}
		if ( '' !== esc_html( get_option( "w3csspress_font_weight_h$i" ) ) ) {
			echo 'addClTag("h' . intval( $i ) . '","' . esc_html( get_option( "w3csspress_font_weight_h$i" ) ) . '");';
		}
	}
	if ( '' !== get_option( 'w3csspress_font_family' ) ) {
		for ( $i = 1; $i < 7; $i++ ) {
			echo 'addClTag("h' . intval( $i ) . '","' . esc_html( get_option( 'w3csspress_font_family' ) ) . '");';
		}
	}
	if ( '' !== $w3csspress_google_font ) {
		echo 'newStyle(".w3-google{font-family:' . esc_html( $w3csspress_google_font ) . '}");';
	}
	if ( '' !== $w3csspress_google_font_headings ) {
		echo 'newStyle(".w3-google-heading h1,.w3-google-heading h2,.w3-google-heading h3,.w3-google-heading h4,.w3-google-heading h5,.w3-google-heading h6{font-family:' . esc_html( $w3csspress_google_font_headings ) . '}");';
	}
}

/**
 * Add fonts related class names to the body element
 *
 * @since 2022.22
 *
 * @return array $classes Space-separated string or array of class names to add to the class list.
 */
function w3csspress_body_class_fonts() {
	$w3csspress_classes     = array();
	$w3csspress_google_font = esc_html( get_option( 'w3csspress_google_font' ) );
	if ( '' !== $w3csspress_google_font ) {
		$w3csspress_classes[] = 'w3-google';
	} else {
		$w3csspress_classes[] = esc_html( get_option( 'w3csspress_font_family' ) );
	}
	$w3csspress_google_font_headings = esc_html( get_option( 'w3csspress_google_font_headings' ) );
	if ( '' !== $w3csspress_google_font_headings ) {
		$w3csspress_classes[] = 'w3-google-heading';
	}
	return $w3csspress_classes;
}
