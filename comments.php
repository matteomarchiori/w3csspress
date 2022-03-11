<div id="comments" >
	<?php
	if ( have_comments() ) :
		global $w3csspress_comments_by_type;
		$w3csspress_comments_by_type = separate_comments( $comments );
		if ( ! empty( $w3csspress_comments_by_type['comment'] ) ) :
			?>
			<section id="comments-list" class="comments">
				<h2 class="comments-title"><?php comments_number(); ?></h2>
				<?php if ( get_comment_pages_count() > 1 ) : ?>
					<nav id="comments-nav-above" class="comments-navigation" role="navigation">
						<div class="paginated-comments-links">
							<?php paginate_comments_links(); ?>
						</div>
					</nav>
				<?php endif; ?>
				<ul>
					<?php wp_list_comments( 'type=comment' ); ?>
				</ul>
				<?php if ( get_comment_pages_count() > 1 ) : ?>
					<nav id="comments-nav-below" class="comments-navigation" role="navigation">
						<div class="paginated-comments-links">
							<?php paginate_comments_links(); ?>
						</div>
					</nav>
				<?php endif; ?>
			</section>
			<?php
		endif;
		if ( ! empty( $w3csspress_comments_by_type['pings'] ) ) :
			$w3csspress_ping_count = count( $w3csspress_comments_by_type['pings'] );
			?>
			<section id="trackbacks-list" class="comments">
				<h2 class="comments-title"><?php echo '<span class="ping-count">' . esc_html( $w3csspress_ping_count ) . '</span> ' . esc_html( _nx( 'Trackback or Pingback', 'Trackbacks and Pingbacks', $w3csspress_ping_count, 'comments count', 'w3csspress' ) ); ?></h2>
				<ul>
					<?php wp_list_comments( 'type=pings&callback=w3csspress_custom_pings' ); ?>
				</ul>
			</section>
			<?php
		endif;
	endif;
	if ( comments_open() ) {
		comment_form(
			array(
				'comment_field' => '<p class="comment-form-comment">' .
					'<label for="comment">' . esc_html__( 'Comment:', 'w3csspress' ) . '</label>' .
					'<textarea id="comment" name="comment" class="w3-input w3-border" aria-required="true"></textarea>' .
					'</p>',
			)
		);
	}
	?>
</div>
