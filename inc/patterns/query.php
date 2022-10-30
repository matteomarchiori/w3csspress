<?php
/**
 * Query block patterns.
 *
 * @since 2022.30
 * @package w3csspress
 */

namespace w3csspress;

/**
 * Register query w3csspress block patterns
 *
 * @since 2022.30
 * @package w3csspress
 */
function w3csspress_register_block_pattern_query() {

	register_block_pattern(
		'w3csspress/query',
		array(
			'title'      => ucfirst( __( 'query loop', 'w3csspress' ) ),
			'categories' => array( 'query' ),
			'blockTypes' => array( 'core/query' ),
			'content'    => '<!-- wp:query {"queryId":5,"query":{"perPage":"12","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"div","displayLayout":{"type":"flex","columns":4}} -->
			<div class="wp-block-query"><!-- wp:post-template -->
				<!-- wp:post-title {"isLink":true} /-->
				
				<!-- wp:post-date /-->
				
				<!-- wp:post-featured-image {"isLink":true} /-->
				
				<!-- wp:post-excerpt {"moreText":"' . ucfirst( __( 'read all', 'w3csspress' ) ) . '"} /-->
				<!-- /wp:post-template -->
				
				<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
				<!-- wp:query-pagination-previous /-->
				
				<!-- wp:query-pagination-next /-->
				<!-- /wp:query-pagination -->
				
				<!-- wp:query-no-results -->
				<!-- wp:paragraph {"placeholder":"' . ucfirst( __( 'add text or blocks to display when the query returns no results.', 'w3csspress' ) ) . '"} -->
				<p>' . ucfirst( __( 'the query did not return any results.', 'w3csspress' ) ) . '</p>
				<!-- /wp:paragraph -->
				<!-- /wp:query-no-results -->
			</div>
			<!-- /wp:query -->',
		)
	);
}

w3csspress_register_block_pattern_query();
