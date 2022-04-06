<?php
/**
 * Template for search results in WordPress
 *
 * This file is used to show the results of a search in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" class="w3-container" role="main">
	<?php
	if ( have_posts() ) :
		?>
		<header class="header">
			<h1 class="entry-title">
			<?php
			printf(
				/* translators: search text completed with query text */
				esc_html__( 'Search Results for: %s', 'w3csspress' ),
				get_search_query()
			);
			?>
				</h1>
		</header>
		<div class="w3-row-padding">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'entry' ); ?>
		<?php endwhile; ?>
		</div>
		<?php get_template_part( 'nav', 'below' ); ?>
	<?php else : ?>
		<article id="post-0" class="post no-results not-found">
			<header class="header">
				<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'w3csspress' ); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'w3csspress' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
