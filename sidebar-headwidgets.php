<?php
/**
 * Template for header sidebar in WordPress
 *
 * This file is used to show the header sidebar of the website in WordPress.
 *
 * @package w3csspress
 * @since 2022.7
 */

namespace w3csspress;

?>
<div id="headwidgets" class="sidebar w3-sidebar w3-bar-block w3-container">
	<?php
	dynamic_sidebar( 'headwidgets' );
	?>
</div>
