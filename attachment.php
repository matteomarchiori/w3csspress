<?php
/**
 * Template for attachment page
 *
 * This file is used to show an attachment like media images in WordPress.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/attachment-template-files/
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

get_header(); ?>
<?php global $post; ?>
<main id="content" role="main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry h-entry' ); ?>>
				<header class="header">
					<h1 class="p-name entry-title" itemprop="name"><?php the_title(); ?></h1>
					<?php edit_post_link(); ?>
					<?php get_template_part( 'entry', 'meta' ); ?>
				</header>
				<div class="e-content entry-content" itemprop="mainContentOfPage">
					<div class="entry-attachment">
						<?php
						if ( wp_attachment_is_image( $post->ID ) ) :
							$w3csspress_att_image = wp_get_attachment_image_src( $post->ID, 'full' );
							?>
							<p class="attachment"><a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment" class="p-category"><img src="<?php echo esc_url( $w3csspress_att_image[0] ); ?>" width="<?php echo esc_attr( $w3csspress_att_image[1] ); ?>" height="<?php echo esc_attr( $w3csspress_att_image[2] ); ?>" class="attachment-full" alt="<?php $post->post_excerpt; ?>" itemprop="image" /></a></p>
						<?php else : ?>
							<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" rel="attachment" class="p-category"><?php echo esc_url( basename( $post->guid ) ); ?></a>
						<?php endif; ?>
					</div>
					<div class="entry-caption">
						<?php
						if ( ! empty( $post->post_excerpt ) ) {
							the_excerpt();
						}
						?>
					</div>
					<?php
					if ( esc_html( get_option( 'w3csspress_post_thumbnail' ) ) && has_post_thumbnail() ) {
						the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
					}
					?>
				</div>
				<footer class="footer">
					<nav id="nav-below" class="navigation w3-cell-row">
						<div class="nav-previous w3-cell">
							<?php
							$w3csspress_older = is_rtl() ? '&rarr;' : '&larr;';
							previous_image_link(
								false,
								sprintf(
									/* translators: arrow */
									esc_html__( '%s older', 'w3csspress' ),
									"<span aria-hidden='true' class='meta-nav'>$w3csspress_older</span>"
								)
							);
							?>
						</div>
						<div class="nav-next w3-cell">
							<?php
							$w3csspress_newer = is_rtl() ? '&larr;' : '&rarr;';
							next_image_link(
								false,
								sprintf(
									/* translators: arrow */
									esc_html__( 'newer %s', 'w3csspress' ),
									"<span  aria-hidden='true' class='meta-nav'>$w3csspress_newer</span>"
								)
							);
							?>
						</div>
					</nav>
				</footer>
			</article>
			<?php comments_template(); ?>
			<?php
		endwhile;
	endif;
	?>
</main>
<?php get_footer(); ?>
