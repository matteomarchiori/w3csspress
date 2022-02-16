<div class="entry-content">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
        echo esc_url($src[0]); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
    <?php endif; ?>
    <meta content="<?php echo wp_strip_all_tags(get_the_excerpt(), true); ?>" />
    <?php the_content(); ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>