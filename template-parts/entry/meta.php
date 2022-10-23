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
	<a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?></a>
	<span class="p-author author h-card vcard">
	<span class="author vcard"
	<?php
	if ( is_single() ) {
		echo ' itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">';
	} else {
		echo '><span>'; }
	?>
	<?php the_author_posts_link(); ?></span></span>
	<span class="meta-sep"> | </span>
	<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" 
	<?php
	if ( is_single() ) {
		echo 'itemprop="datePublished" pubdate'; }
	?>
	><?php the_time( get_option( 'date_format' ) ); ?></time>
<?php
if ( is_single() ) {
	echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '" />'; }
?>
</div>
