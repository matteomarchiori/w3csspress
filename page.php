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
		<div class="<?php echo esc_html( $w3csspress_container ); ?>">
			<?php
			while ( have_posts() ) :
				if ( isset( $w3csspress_i ) ) {
					if ( 0 !== $w3csspress_i && 0 === $w3csspress_i % $w3csspress_cols ) {
						echo '</div><div class="' . esc_html( $w3csspress_container ) . '">';
					}
					$w3csspress_i++;
				}
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" 
					<?php
						$w3csspress_layout = 'w3-col ';
					if ( '1' === esc_html( get_option( 'w3csspress_grid_enabled' ) ) ) {
						$w3csspress_layout = 'w3-cell w3-padding w3-mobile';
					} elseif ( is_home() || is_archive() || is_search() ) {
						$w3csspress_layout .= esc_html( get_option( 'w3csspress_layout' ) );
					}
						post_class( $w3csspress_layout . ' hentry h-entry' );
					?>
					>
					<header class="header">
						<h1 class="p-name entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
					</header>
					<div class="e-content entry-content" itemprop="mainContentOfPage">
						<?php
						if ( esc_html( get_option( 'w3csspress_post_thumbnail' ) ) && has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
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
