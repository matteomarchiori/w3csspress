<?php
/**
 * Template for archive page
 *
 * This file is used to show the posts in WordPress.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" role="main">
	<header class="header">
		<h1 class="entry-title"><?php the_archive_title(); ?></h1>
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
