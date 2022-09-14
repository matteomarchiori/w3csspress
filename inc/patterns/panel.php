<?php
/**
 * Default header block pattern
 *
 * @since 2022.29
 * @package w3csspress
 */

namespace w3csspress;

return array(
	'title'      => 'Panel',
	'categories' => array( 'w3css', 'design' ),
	'blockTypes' => array( 'core/panel' ),
	'content'    => '<!-- wp:group {"className":"w3-panel","layout":{"type":"default"}} --><div class="wp-block-group w3-panel"></div><!-- /wp:group -->',
);
