<?php
/**
 * Template for generic page in WordPress
 *
 * This file is used to show a generic page in WordPress.
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
		<div class="w3-row-padding">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" 
			<?php
			if ( is_home() ) {
				$w3csspress_layout = ' ' . esc_html( get_option( 'w3csspress_layout' ) );
			} else {
				$w3csspress_layout = '';
			}
			post_class( "w3-col$w3csspress_layout" );
			?>
			>
				<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
				</header>
				<div class="entry-content">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'full' );
					}
					?>
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</div>
			</article>
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
</main>
<?php get_footer(); ?>
