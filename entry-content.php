<?php
/**
 * Template for post entry content
 *
 * This file is used to show thumbnails, meta and links of posts in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

?>

<div class="e-content entry-content" itemprop="mainEntityOfPage">
	<?php if ( esc_html( get_option( 'w3csspress_post_thumbnail' ) ) && has_post_thumbnail() ) : ?>
		<a href="<?php echo esc_url( wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false )[0] ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?></a>
	<?php endif; ?>
	<meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
	<?php the_content(); ?>
	<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
