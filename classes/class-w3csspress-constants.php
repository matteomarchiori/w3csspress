<?php
/**
 * Class used to define constants
 *
 * This file is used to define constant values used across the theme.
 *
 * @package w3csspress
 * @since 2022.30
 */

namespace w3csspress;

if ( ! class_exists( 'w3csspress\W3csspress_Constants' ) ) {

	/**
	 * Function used from the W3csspress_Constants to generate w3css borders
	 *
	 * @package w3csspress
	 * @since 2022.30
	 */
	function _w3csspress_borders() {
		$w3csspress_directions = W3csspress_Constants::w3csspress_directions();
		$w3csspress_borders    = array();
		foreach ( $w3csspress_directions as $w3csspress_direction => $w3csspress_direction_translation ) {
			$w3csspress_borders[ "w3-border-$w3csspress_direction" ] = sprintf(
				/* translators: border and direction */
				esc_html__( 'border %s', 'w3csspress' ),
				$w3csspress_direction_translation
			);
			$w3csspress_borders[ 'w3-' . $w3csspress_direction . 'bar' ] = sprintf(
				/* translators: thick border and direction */
				esc_html__( 'thick border %s', 'w3csspress' ),
				$w3csspress_direction_translation
			);
		}
		$w3csspress_borders['w3-border'] = __( 'all borders', 'w3csspress' );
		return $w3csspress_borders;
	}

	/**
	 * Class used to define constants
	 *
	 * This class is used to define constant values used across the theme.
	 *
	 * @package w3csspress
	 * @since 2022.30
	 */
	class W3csspress_Constants {

		/**
		 * Returns the w3css color themes
		 */
		public static function w3csspress_themes() {
			$w3csspress_themes = array(
				''            => __( 'default', 'w3csspress' ),
				'w3schools'   => __( 'w3schools', 'w3csspress' ),
				'amber'       => __( 'amber', 'w3csspress' ),
				'black'       => __( 'black', 'w3csspress' ),
				'blue'        => __( 'blue', 'w3csspress' ),
				'blue-grey'   => __( 'blue grey', 'w3csspress' ),
				'brown'       => __( 'brown', 'w3csspress' ),
				'cyan'        => __( 'cyan', 'w3csspress' ),
				'dark-grey'   => __( 'dark grey', 'w3csspress' ),
				'deep-orange' => __( 'deep orange', 'w3csspress' ),
				'deep-purple' => __( 'deep purple', 'w3csspress' ),
				'green'       => __( 'green', 'w3csspress' ),
				'grey'        => __( 'grey', 'w3csspress' ),
				'indigo'      => __( 'indigo', 'w3csspress' ),
				'khaki'       => __( 'khaki', 'w3csspress' ),
				'light-blue'  => __( 'light blue', 'w3csspress' ),
				'light-green' => __( 'light green', 'w3csspress' ),
				'lime'        => __( 'lime', 'w3csspress' ),
				'orange'      => __( 'orange', 'w3csspress' ),
				'pink'        => __( 'pink', 'w3csspress' ),
				'purple'      => __( 'purple', 'w3csspress' ),
				'red'         => __( 'red', 'w3csspress' ),
				'teal'        => __( 'teal', 'w3csspress' ),
				'yellow'      => __( 'yellow', 'w3csspress' ),
			);
			asort( $w3csspress_themes );

			return $w3csspress_themes;
		}

		/**
		 * Returns the w3css light and dark variants
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_theme_kinds() {
			return array(
				'd5' => __( 'dark', 'w3csspress' ) . ' 5',
				'd4' => __( 'dark', 'w3csspress' ) . ' 4',
				'd3' => __( 'dark', 'w3csspress' ) . ' 3',
				'd2' => __( 'dark', 'w3csspress' ) . ' 2',
				'd1' => __( 'dark', 'w3csspress' ) . ' 1',
				''   => __( 'default', 'w3csspress' ),
				'l1' => __( 'light', 'w3csspress' ) . ' 1',
				'l2' => __( 'light', 'w3csspress' ) . ' 2',
				'l3' => __( 'light', 'w3csspress' ) . ' 3',
				'l4' => __( 'light', 'w3csspress' ) . ' 4',
				'l5' => __( 'light', 'w3csspress' ) . ' 5',
			);
		}

		/**
		 * Returns the w3css font sizes
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_font_sizes() {
			return array(
				''            => __( 'default', 'w3csspress' ),
				'w3-tiny'     => __( 'tiny', 'w3csspress' ),
				'w3-small'    => __( 'small', 'w3csspress' ),
				'w3-medium'   => __( 'medium', 'w3csspress' ),
				'w3-large'    => __( 'large', 'w3csspress' ),
				'w3-xlarge'   => __( 'XL', 'w3csspress' ),
				'w3-xxlarge'  => __( 'XXL', 'w3csspress' ),
				'w3-xxxlarge' => __( 'XXXL', 'w3csspress' ),
				'w3-jumbo'    => __( 'jumbo', 'w3csspress' ),
			);
		}

		/**
		 * Returns the w3css font weights
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_font_weights() {
			$w3csspress_font_weights = array(
				'' => __( 'default', 'w3csspress' ),
			);
			for ( $i = 1; $i < 10; $i++ ) {
				$w3csspress_font_weights[ "w3-weight-$i" . '00' ] = __( 'weight', 'w3csspress' ) . " $i" . '00';
			}

			return $w3csspress_font_weights;
		}

		/**
		 * Returns the w3css font families
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_font_families() {
			return array(
				''              => __( 'default', 'w3csspress' ),
				'w3-serif'      => __( 'serif', 'w3csspress' ),
				'w3-sans-serif' => __( 'sans serif', 'w3csspress' ),
				'w3-monospace'  => __( 'monospace', 'w3csspress' ),
				'w3-cursive'    => __( 'cursive', 'w3csspress' ),
			);
		}

		/**
		 * Returns the w3css layouts
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_layouts() {
			return array(
				''           => __( 'default', 'w3csspress' ),
				'w3-rest'    => __( 'one column', 'w3csspress' ),
				'w3-half'    => __( 'two columns', 'w3csspress' ),
				'w3-third'   => __( 'three columns', 'w3csspress' ),
				'w3-quarter' => __( 'four columns', 'w3csspress' ),
			);
		}

		/**
		 * Returns the w3css rounded styles
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_rounded() {
			return array(
				''                 => __( 'default', 'w3csspress' ),
				'w3-round-small'   => __( 'small', 'w3csspress' ),
				'w3-round-medium'  => __( 'medium', 'w3csspress' ),
				'w3-round-large'   => __( 'large', 'w3csspress' ),
				'w3-round-xlarge'  => __( 'XL', 'w3csspress' ),
				'w3-round-xxlarge' => __( 'XXL', 'w3csspress' ),
				'w3-circle'        => __( 'circle', 'w3csspress' ),
			);
		}

		/**
		 * Returns some directions
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_directions() {
			return array(
				'top'    => __( 'top', 'w3csspress' ),
				'right'  => __( 'right', 'w3csspress' ),
				'bottom' => __( 'bottom', 'w3csspress' ),
				'left'   => __( 'left', 'w3csspress' ),
			);
		}

		/**
		 * Returns the w3css colored borders
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_borders() {
			$w3csspress_borders = array();
			foreach ( _w3csspress_borders() as $_w3csspress_border => $_w3csspress_border_translation ) {
				foreach ( self::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
					if ( 'w3schools' !== $w3csspress_theme && '' !== $w3csspress_theme ) {
						$w3csspress_borders[ "$_w3csspress_border w3-border-$w3csspress_theme" ] = sprintf(
							/* translators: border and color */
							esc_html__( '%1$s %2$s', 'w3csspress' ),
							$_w3csspress_border_translation,
							$w3csspress_theme_translation
						);}
				}
			}
			return $w3csspress_borders;
		}

		/**
		 * Returns the w3css colored hoverable borders
		 *
		 * @package w3csspress
		 * @since 2022.30
		 */
		public static function w3csspress_hover_borders() {
			$w3csspress_borders = array();
			foreach ( _w3csspress_borders() as $_w3csspress_border => $_w3csspress_border_translation ) {
				foreach ( self::w3csspress_themes() as $w3csspress_theme => $w3csspress_theme_translation ) {
					if ( 'w3schools' !== $w3csspress_theme && '' !== $w3csspress_theme ) {
						$w3csspress_borders[ "$_w3csspress_border w3-hover-border-$w3csspress_theme" ] = sprintf(
							/* translators: hover border and color */
							esc_html__( 'hover %1$s %2$s', 'w3csspress' ),
							$_w3csspress_border_translation,
							$w3csspress_theme_translation
						);
					}
				}
			}
			return $w3csspress_borders;
		}
	}
}
