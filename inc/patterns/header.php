<?php
/**
 * Header block patterns.
 *
 * @since 2022.32
 * @package w3csspress
 */

namespace w3csspress;

/**
 * Register header w3csspress block patterns
 *
 * @since 2022.32
 * @package w3csspress
 */
function w3csspress_register_block_pattern_header() {
	register_block_pattern(
		'w3csspress/header',
		array(
			'title'      => __( 'header', 'w3csspress' ),
			'categories' => array( 'header' ),
			'blockTypes' => array( 'core/template-part' ),
			'content'    => '<!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center">
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:site-logo {"shouldSyncIcon":false,"align":"center","className":"is-style-rounded"} /-->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:site-title {"level":0,"textAlign":"center"} /-->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:site-tagline {"textAlign":"center"} /-->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
            <!-- wp:pattern {"slug":"w3csspress/navigation"} /-->
            <!-- wp:pattern {"slug":"w3csspress/search"} /-->',
		)
	);

	register_block_pattern(
		'w3csspress/home-header',
		array(
			'title'      => __( 'homepage header', 'w3csspress' ),
			'categories' => array( 'header' ),
			'blockTypes' => array( 'core/template-part' ),
			'content'    => '<!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center">
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:site-logo {"isLink":false,"shouldSyncIcon":false,"align":"center","className":"is-style-rounded"} /-->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:site-title {"textAlign":"center","isLink":false} /-->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:site-tagline {"textAlign":"center"} /-->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
            <!-- wp:pattern {"slug":"w3csspress/navigation"} /-->
            <!-- wp:pattern {"slug":"w3csspress/search"} /-->',
		)
	);
}

w3csspress_register_block_pattern_header();
