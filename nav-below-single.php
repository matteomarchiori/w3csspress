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
	'prev_text' => '<span class="meta-nav">&larr;</span> %title',
	'next_text' => '%title <span class="meta-nav">&rarr;</span>',
);
the_post_navigation( $w3csspress_args );
