<?php
/**
 * Template for author page
 *
 * This file is used to show a post author in WordPress.
 *
 * @link https://codex.wordpress.org/Author_Templates
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" class="w3-container" role="main">
	<header class="header">
		<?php the_post(); ?>
		<h1 class="entry-title author"><?php the_author_link(); ?></h1>
		<div class="archive-meta">
			<?php
			if ( '' !== get_the_author_meta( 'user_description' ) ) {
				echo esc_html( get_the_author_meta( 'user_description' ) );
			}
			?>
		</div>
		<?php rewind_posts(); ?>
	</header>
		<?php
		if ( have_posts() ) :
			?>
			<div class="w3-row-padding">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'entry' ); ?>
					<?php
				endwhile;
				?>
			</div>
			<?php
		endif;
		?>
	<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_footer(); ?>
