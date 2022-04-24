<?php
/**
 * Functions of the theme related to data sanitization
 *
 * This file is used for the theme functions related to data sanitization
 *
 * @package w3csspress
 * @since 2022.22
 */

namespace w3csspress;

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
