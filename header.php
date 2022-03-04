<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <header id="header" role="banner">
            <div id="branding">
                <div id="site-title">
                    <?php
                    if (has_custom_logo()) {
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                    } else {
                        if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '<h1>';
                        }
                        echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a>';
                        if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '</h1>';
                        }
                    }
                    ?>
                </div>
                <div id="site-description"><?php bloginfo('description'); ?></div>
            </div>
            <nav id="menu" role="navigation">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'menu w3-bar',
                        'walker' => new W3csspress_Walker_Nav_Menu()
                    )
                ); ?>
                <div id="search"><?php get_search_form(); ?></div>
            </nav>
        </header>
        <div id="container">