<?php
/**
 * Template for post in WordPress
 *
 * This file is used to show an article in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

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
	<header>
		<?php
		if ( is_singular() ) {
			echo '<h1 class="p-name entry-title">';
		} else {
			echo '<h2 class="p-name entry-title">';
		}
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="u-url u-uid"><?php the_title(); ?></a>
		<?php
		if ( is_singular() ) {
			echo '</h1>';
		} else {
			echo '</h2>';
		}
		?>
		<?php edit_post_link(); ?>
		<?php
		if ( ! is_search() ) {
			get_template_part( 'entry', 'meta' );
		}
		?>
	</header>
	<?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	<?php
	if ( is_singular() ) {
		get_template_part( 'entry-footer' );
	}
	?>
</article>
