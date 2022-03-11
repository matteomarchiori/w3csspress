<?php get_header(); ?>
<main id="content" role="main">
    <?php
    if (have_posts()) : ?>
        <header class="header">
            <h1 class="entry-title"><?php printf(
                /* translators: search text completed with query text */
                esc_html__('Search Results for: %s', 'w3csspress'), get_search_query()); ?></h1>
        </header>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('entry'); ?>
        <?php endwhile; ?>
        <?php get_template_part('nav', 'below'); ?>
    <?php else : ?>
        <article id="post-0" class="post no-results not-found">
            <header class="header">
                <h1 class="entry-title"><?php esc_html_e('Nothing Found', 'w3csspress'); ?></h1>
            </header>
            <div class="entry-content">
                <p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'w3csspress'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </article>
    <?php endif; ?>
</main>
<?php get_footer(); ?>