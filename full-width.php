<?php
/**
 * Template Name: Full-Width
 * Template for full width pages in WordPress
 *
 * This file is used to show a full width page in WordPress.
 *
 * @package w3csspress
 * @since 2022.9
 */

namespace w3csspress;

get_header(); ?>
<main id="content" role="main">
	<?php
	if ( have_posts() ) :
		?>
		<div class="w3-row-padding">
			<?php
			$w3csspress_i = 0;
			while ( have_posts() ) :
				if ( 0 !== $w3csspress_i ) {
					echo '</div><div class="w3-row-padding">';
				}
				$w3csspress_i++;
				the_post();
				?>
			<article id="post-<?php the_ID(); ?>" 
				<?php
				post_class( 'w3-col w3-rest' );
				?>
			>
				<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
				</header>
				<div class="entry-content">
					<?php
					if ( esc_html( get_option( 'w3csspress_post_thumbnail' ) ) && has_post_thumbnail() ) {
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
