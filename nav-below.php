<?php
/**
 * Template for generic nav below post.
 *
 * This file is used to show the navigation arrows under a generic post.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

$w3csspress_older = is_rtl() ? '&rarr;' : '&larr;';
$w3csspress_newer = is_rtl() ? '&larr;' : '&rarr;';

$w3csspress_args = array(
	'prev_text' => sprintf(
		/* translators: arrow and text */
		esc_html__( '%s older', 'w3csspress' ),
		"<span aria-hidden='true' class='meta-nav'>$w3csspress_older</span>"
	),
	'next_text' => sprintf(
		/* translators: arrow and text */
		esc_html__( 'newer %s', 'w3csspress' ),
		"<span aria-hidden='true' class='meta-nav'>$w3csspress_newer</span>"
	),
);
if ( function_exists( 'the_posts_navigation' ) ) {
	the_posts_navigation( $w3csspress_args );
} else {
	echo esc_html( get_the_posts_navigation( $w3csspress_args ) );
}
