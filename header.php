<?php
/**
 * Template for header in WordPress
 *
 * This file is used to show the header of the website in WordPress.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

use w3csspress\W3csspress_Walker_Nav_Menu;

get_template_part( 'classes/class-w3csspress-walker-nav-menu' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php w3csspress_schema_type(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>
	<div id="wrapper" class="hfeed h-feed">
		<header id="header" role="banner" class="w3-container">
			<div id="branding">
				<?php
				if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					}
				}
				else{
				?>
				<div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<?php
					if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
						echo '<h1>';
					}
					echo '<span itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
					if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
						echo '</h1>';
					}
					?>
				</div>
				<?php }?>
				<div id="site-description" 
				<?php
				if ( ! is_single() ) {
					echo ' itemprop="description"';
				}
				?>
					><?php bloginfo( 'description' ); ?></div>
			</div>
	</div>
	<?php
	if ( has_nav_menu( 'main-menu' ) ) {
		?>
		<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_class'     => 'menu w3-bar w3-container',
					'walker'         => new W3csspress_Walker_Nav_Menu(),
				)
			);
			?>
		</nav><?php } ?>
	<?php get_sidebar( 'headwidgets' ); ?>
	<?php get_sidebar( 'primary' ); ?>
	<?php get_sidebar( 'secondary' ); ?>
	</header>
	<div id="container" class="w3-container">
