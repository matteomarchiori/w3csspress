<?php
/**
 * Template for category page
 *
 * This file is used to show posts in a category in WordPress.
 *
 * @link https://codex.wordpress.org/Category_Templates
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" class="w3-container" role="main">
	<header class="header">
		<h1 class="entry-title">
			<?php single_term_title(); ?>
		</h1>
		<div class="archive-meta">
			<?php
			if ( '' !== the_archive_description() ) {
				echo esc_html( the_archive_description() );
			}
			?>
		</div>
	</header>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'entry' ); ?>
			<?php
	endwhile;
	endif;
	?>
	<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_footer(); ?>
