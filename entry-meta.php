<?php
/**
 * Template for post entry meta
 *
 * This file is used to show meta of posts in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

?>

<div class="entry-meta">
	<span class="p-author author h-card vcard">
	<?php the_author_posts_link(); ?>
	</span>
	<span class="meta-sep"> | </span>
	<time class="entry-date" datetime="<?php echo esc_attr( get_the_date() ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>">
	<?php the_time( get_option( 'date_format' ) ); ?></time>
</div>
