<?php get_header(); ?>
<?php global $post; ?>
<main id="content" role="main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php edit_post_link(); ?>
					<?php get_template_part( 'entry', 'meta' ); ?>
				</header>
				<div class="entry-content">
					<div class="entry-attachment">
						<?php
						if ( wp_attachment_is_image( $post->ID ) ) :
							$w3csspress_att_image = wp_get_attachment_image_src( $post->ID, 'full' );
							?>
							<p class="attachment"><a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><img src="<?php echo esc_url( $w3csspress_att_image[0] ); ?>" width="<?php echo esc_attr( $w3csspress_att_image[1] ); ?>" height="<?php echo esc_attr( $w3csspress_att_image[2] ); ?>" class="attachment-full" alt="<?php $post->post_excerpt; ?>" /></a></p>
						<?php else : ?>
							<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?php echo esc_url( basename( $post->guid ) ); ?></a>
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
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'full' );
							}
							?>
				</div>
				<footer class="footer">
					<nav id="nav-below" class="navigation w3-cell-row">
						<div class="nav-previous w3-cell">
							<?php
							previous_image_link(
								false,
								sprintf(
									/* translators: left arrow */
									esc_html__( '%s older', 'w3csspress' ),
									'<span class="meta-nav">&larr;</span>'
								)
							);
							?>
							</div>
						<div class="nav-next w3-cell">
									<?php
									next_image_link(
										false,
										sprintf(
											/* translators: right arrow */
											esc_html__( 'newer %s', 'w3csspress' ),
											'<span class="meta-nav">&rarr;</span>'
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
