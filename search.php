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
<main id="content" role="main">
	<?php
	if ( have_posts() ) :
		$w3csspress_layout = esc_html( get_option( 'w3csspress_layout' ) );
		$w3csspress_i      = 0;
		$w3csspress_cols   = 1;
		if ( 'w3-half' === $w3csspress_layout ) {
			$w3csspress_cols = 2;
		} elseif ( 'w3-third' === $w3csspress_layout ) {
			$w3csspress_cols = 3;
		} elseif ( 'w3-quarter' === $w3csspress_layout ) {
			$w3csspress_cols = 4;
		}
		if ( '1' === esc_html( get_option( 'w3csspress_grid_enabled' ) ) ) {
			$w3csspress_container = 'w3-cell-row';
		} else {
			$w3csspress_container = 'w3-row-padding';
		}
		?>
		<header class="header">
			<h1 class="p-name entry-title" itemprop="name">
				<?php
				printf(
					/* translators: search text completed with query text */
					esc_html__( 'Search Results for: %s', 'w3csspress' ),
					get_search_query()
				);
				?>
			</h1>
		</header>
		<div class="<?php echo esc_attr( $w3csspress_container ); ?>">
			<?php
			while ( have_posts() ) :
				if ( isset( $w3csspress_i ) ) {
					if ( 0 !== $w3csspress_i && 0 === $w3csspress_i % $w3csspress_cols ) {
						echo '</div><div class="' . esc_attr( $w3csspress_container ) . '">';
					}
					$w3csspress_i++;
				}
				the_post();
				?>
				<?php get_template_part( 'template-parts/entry/entry' ); ?>
			<?php endwhile; ?>
		</div>
		<?php get_template_part( 'template-parts/nav/below' ); ?>
	<?php else : ?>
		<article id="post-0" class="post no-results not-found hentry h-entry">
			<header class="header">
				<h1 class="p-name entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'w3csspress' ); ?></h1>
			</header>
			<div class="e-content entry-content" itemprop="mainContentOfPage">
				<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'w3csspress' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
