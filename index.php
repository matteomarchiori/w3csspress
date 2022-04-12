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
		$w3csspress_layout = esc_html( get_option( 'w3csspress_layout' ) );
		if ( '' !== $w3csspress_layout && 'w3-rest' !== $w3csspress_layout && 1 !== esc_html( get_option( 'w3csspress_grid_enabled' ) ) ) {
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
				<?php get_template_part( 'entry' ); ?>
				<?php comments_template(); ?>
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
