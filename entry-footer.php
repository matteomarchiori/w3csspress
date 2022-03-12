<?php
/**
 * Template for post footer
 *
 * This file is used to show footer of posts in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

?>

<footer class="entry-footer">
	<span class="cat-links"><?php esc_html_e( 'Categories: ', 'w3csspress' ); ?><?php the_category( ', ' ); ?></span>
	<span class="tag-links"><?php the_tags(); ?></span>
	<?php
	if ( comments_open() ) {
		echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'w3csspress' ) ) . '</a></span>';
	}
	?>
</footer>
