<?php
/**
 * 404 block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

function w3csspress_register_block_pattern_404() {

	register_block_pattern(
		'w3csspress/404',
		array(
			'title'      => __( '404', 'w3csspress' ),
			'categories' => array( '404' ),
			'blockTypes' => array( 'core/404' ),
			'content'    => '<!-- wp:heading {"level":1} --><h1>'.__('Not Found','w3csspress').'</h1>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph -->
            <p>'.__('Nothing found for the requested page. Try a search instead?','w3csspress').'</p>
            <!-- /wp:paragraph -->',
		)
	);
}

w3csspress_register_block_pattern_404();
