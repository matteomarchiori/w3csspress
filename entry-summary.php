<?php
/**
 * Template for post summary
 *
 * This file is used to show summary of posts in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

?>

<div class="entry-summary">
	<?php if ( ( has_post_thumbnail() ) && ( ! is_search() ) ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>
	<?php the_excerpt(); ?>
	<?php if ( is_search() ) { ?>
		<div class="entry-links"><?php wp_link_pages(); ?></div>
	<?php } ?>
</div>
