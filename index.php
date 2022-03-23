<?php
/**
 * Template for index in WordPress
 *
 * This file is used to show the index page in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" class="w3-container" role="main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'entry' ); ?>
			<?php comments_template(); ?>
			<?php
	endwhile;
	endif;
	?>
	<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_footer(); ?>
