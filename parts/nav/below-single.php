<?php
/**
 * Template for nav below single post.
 *
 * This file is used to show the navigation arrows under a post.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

$w3csspress_args = array(
	'prev_text' => '<span aria-hidden="true" class="meta-nav">&larr;</span> %title',
	'next_text' => '%title <span aria-hidden="true" class="meta-nav">&rarr;</span>',
);
if ( function_exists( 'the_post_navigation' ) ) {
	the_post_navigation( $w3csspress_args );
} else {
	echo esc_html( get_the_post_navigation( $w3csspress_args ) );
}
