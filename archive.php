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
		<h1 class="p-name entry-title" itemprop="name"><?php the_archive_title(); ?></h1>
		<div class="archive-meta" itemprop="description">
			<?php
			if ( '' !== the_archive_description() ) {
				echo esc_html( the_archive_description() );
			}
			?>
		</div>
	</header>
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
				<?php
			endwhile;
			?>
		</div>
		<?php
	endif;
	?>
	<?php get_template_part( 'template-parts/nav/below' ); ?>
</main>
<?php get_footer(); ?>
