</div>
<footer id="footer" role="contentinfo" class="w3-border-top w3-padding-top w3-center">
    <span id="copyright">
        &copy; <?php echo esc_html(date_i18n(__('Y', 'w3csspress'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
    </span>
	<?php
	$footer = get_option('w3csspress_footer');
    if ($footer != ''){ ?>
	<span>
		<?php echo esc_html($footer);?>
	</span>
	<?php } ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>