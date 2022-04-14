<?php
/**
 * Template for articles in WordPress
 *
 * This file is used to show articles in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<main id="content" role="main">
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
				if ( comments_open() && ! post_password_required() ) {
					comments_template( '', true );
				}
				?>
				<?php
			endwhile;
			?>
		</div>
		<?php
	endif;
	?>
	<footer class="footer">
		<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>
</main>
<?php get_footer(); ?>
