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
				'w3-round-small'   => __( 'round small', 'w3csspress' ),
				'w3-round-medium'  => __( 'round medium', 'w3csspress' ),
				'w3-round-large'   => __( 'round large', 'w3csspress' ),
				'w3-round-xlarge'  => __( 'round xlarge', 'w3csspress' ),
				'w3-round-xxlarge' => __( 'round xxlarge', 'w3csspress' ),
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

		/**
		 * Returns the w3css selectors and classes
		 *
		 * @package w3csspress
		 * @since 2022.32
		 */
		public static function w3csspress_additional_selectors() {
			$w3csspress_selectors = array();
			array_push(
				$w3csspress_selectors,
				array(
					'selector' => './/input[not(@type="button" or @type="submit" or @type="reset" or @type="checkbox" or @type="radio" or contains(@class,"sidebar") or contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => 'w3-input',
				),
				array(
					'selector' => '(.//button|.//reset)[not(contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => 'w3-btn w3-theme-action',
				),
				array(
					'selector' => './/input[@type="button" or @type="submit" or @type="reset" and not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => 'w3-btn',
				),
				array(
					'selector' => '(.//input|.//textarea)[not(contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => 'w3-theme-action',
				),
				array(
					'selector' => './/input[@type="checkbox" and not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => 'w3-check',
				),
				array(
					'selector' => './/input[@type="radio"]',
					'classes'  => 'w3-radio',
				),
				array(
					'selector' => './/select',
					'classes'  => 'w3-select',
				),
				array(
					'selector' => './/table/parent::*',
					'classes'  => 'w3-responsive',
				),
				array(
					'selector' => './/img|.//figure',
					'classes'  => 'w3-image',
				),
				array(
					'selector' => './/code',
					'classes'  => 'w3-code',
				),
				array(
					'selector' => './/ul[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => 'w3-ul',
				),
				array(
					'selector' => './/*[contains(@class,"nav-links")]',
					'classes'  => 'w3-cell-row',
				),
				array(
					'selector' => './/*[contains(@class,"nav-previous")]',
					'classes'  => 'w3-cell',
				),
				array(
					'selector' => './/*[contains(@class,"nav-next")]',
					'classes'  => 'w3-cell w3-right-align',
				),
				array(
					'selector' => './/*[contains(@class,"search-form")]',
					'classes'  => 'w3-cell-row w3-center',
				),
				array(
					'selector' => './/*[contains(@class,"search-form")]/label|.//*[contains(@class,"search-form")]/input',
					'classes'  => 'w3-cell',
				),
				array(
					'selector' => './/*[contains(@class,"search-form")]/input',
					'classes'  => 'w3-left w3-margin-left',
				),
				array(
					'selector' => './/*[contains(@class,"sticky")]',
					'classes'  => 'w3-card-4',
				),
				array(
					'selector' => './/*[contains(@class,"format-aside")]//*[contains(@class,"entry-content")]',
					'classes'  => 'w3-topbar w3-bottombar w3-border-theme w3-panel',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-2")]|.//*[contains(@class,"gallery-columns-3")]|.//*[contains(@class,"gallery-columns-4")]|.//*[contains(@class,"gallery-columns-5")]|.//*[contains(@class,"gallery-columns-6")]|.//*[contains(@class,"gallery-columns-7")]|.//*[contains(@class,"gallery-columns-8")]|.//*[contains(@class,"gallery-columns-9")]',
					'classes'  => 'w3-row',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-2")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-half',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-3")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-third',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-4")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-quarter',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-5")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-fifth',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-6")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-sixth',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-7")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-seventh',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-8")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-eighth',
				),
				array(
					'selector' => './/*[contains(@class,"gallery-columns-9")]//*[contains(@class,"gallery-item")]',
					'classes'  => 'w3-nineth',
				),
				array(
					'selector' => './/blockquote',
					'classes'  => 'w3-leftbar w3-border-theme w3-panel',
				),
				array(
					'selector' => './/cite',
					'classes'  => 'w3-show w3-margin-top',
				),
				array(
					'selector' => './/*[contains(@class,"form-status")]//*[contains(@class,"entry-content")]',
					'classes'  => 'w3-leftbar w3-rightbar w3-border-theme w3-panel',
				),
				array(
					'selector' => './/*[contains(@class,"format-video")]//*[contains(@class,"entry-content")]/iframe',
					'classes'  => 'w3-show',
				),
				array(
					'selector' => './/*[contains(@class,"format-chat")]//*[contains(@class,"entry-content")]',
					'classes'  => 'w3-monospace w3-leftbar w3-rightbar w3-border-theme w3-panel',
				),
				array(
					'selector' => '(//article|//section|//nav|//summary|//button|//reset|//input[not (@type="checkbox" or @type="radio")]|//textarea)[not (contains(@class,"wpadminbar") or ancestor::*/@id="wpadminbar")]',
					'classes'  => esc_html( get_option( 'w3csspress_rounded_style' ) ),
				)
			);
			return $w3csspress_selectors;
		}
	}
}
