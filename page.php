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
		$w3csspress_layout = esc_html( get_option( 'w3csspress_layout' ) );
		if ( '' !== $w3csspress_layout && 'w3-rest' !== $w3csspress_layout && '1' !== esc_html( get_option( 'w3csspress_grid_enabled' ) ) ) {
			$w3csspress_i = 0;
			if ( 'w3-half' === $w3csspress_layout ) {
				$w3csspress_cols = 2;
			} elseif ( 'w3-third' === $w3csspress_layout ) {
				$w3csspress_cols = 3;
			} elseif ( 'w3-quarter' === $w3csspress_layout ) {
				$w3csspress_cols = 4;
			}
		}
		?>
		<div class="w3-row-padding">
			<?php
			while ( have_posts() ) :
				if ( isset( $w3csspress_i ) ) {
					if ( 0 !== $w3csspress_i && 0 === $w3csspress_i % $w3csspress_cols ) {
						echo '</div><div class="w3-row-padding">';
					}
					$w3csspress_i++;
				}
				the_post();
				?>
			<article id="post-<?php the_ID(); ?>" 
				<?php
				if ( is_home() || is_archive() || is_search() ) {
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
