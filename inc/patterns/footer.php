<?php
/**
 * Footer block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

/**
 * Register footer w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_footer() {
	$w3csspress_footer = get_option( 'w3csspress_footer' );
	if ( '' !== $w3csspress_footer ) {
		$w3csspress_content_footer = '<span>' . esc_html( $w3csspress_footer ) . '</span>';
	} else {
		$w3csspress_content_footer = '<span id="copyright">&copy; ' . esc_html( date_i18n( __( 'Y', 'w3csspress' ) ) ) . ' ' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
	}

	register_block_pattern(
		'w3csspress/footer',
		array(
			'title'      => __( 'footer', 'w3csspress' ),
			'categories' => array( 'footer' ),
			'blockTypes' => array( 'core/template-part' ),
			'content'    => '<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">' . $w3csspress_content_footer . '</p><!-- /wp:paragraph --><!-- wp:html --><button id="gototop">∧</button><!-- /wp:html -->',
		)
	);
}

w3csspress_register_block_pattern_footer();
