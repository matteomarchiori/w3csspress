<?php
/**
 * Template for not found page
 *
 * This file is used when a requested WordPress page is not found.
 *
 * @link https://developer.wordpress.org/themes/functionality/404-pages/
 *
 * @package WordPress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" role="main">
	<article id="post-0" class="post not-found">
		<header class="header">
			<h1 class="entry-title"><?php esc_html_e( 'Not Found', 'w3csspress' ); ?></h1>
		</header>
		<div class="entry-content">
			<p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'w3csspress' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>
</main>
<?php get_footer(); ?>
