<?php $w3csspress_args = array(
	'prev_text' => sprintf(
		/* translators: arrow and text */
		esc_html__( '%s older', 'w3csspress' ),
		'<span class="meta-nav">&larr;</span>'
	),
	'next_text' => sprintf(
		/* translators: arrow and text */
		esc_html__( 'newer %s', 'w3csspress' ),
		'<span class="meta-nav">&rarr;</span>'
	),
);
the_posts_navigation( $w3csspress_args );
