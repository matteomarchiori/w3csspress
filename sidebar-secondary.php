<?php
/**
 * Template for secondary sidebar in WordPress
 *
 * This file is used to show the secondary sidebar of the website in WordPress.
 *
 * @package w3csspress
 * @since 2022.7
 */

namespace w3csspress;

if ( is_active_sidebar( 'secondary' ) ) { ?>
<div id="secondary" class="sidebar w3-sidebar w3-bar-block w3-container w3-theme-action">
	<?php
	dynamic_sidebar( 'secondary' );
	?>
</div>
<?php } ?>
