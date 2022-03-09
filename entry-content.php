<?php

namespace w3csspress;

?>

<div class="entry-content">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false)); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
    <?php endif; ?>
    <meta content="<?php echo esc_html(wp_strip_all_tags(get_the_excerpt(), true)); ?>" />
    <?php the_content(); ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>