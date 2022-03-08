<?php

function wpse_intval($value)
{
    return (int) $value;
}

function sanitize_checkbox($input)
{
    return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
}

function sanitize_select($input, $setting)
{
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

add_action('customize_register', 'w3csspress_customize_register');
function w3csspress_customize_register($wp_customize)
{
    $color_themes = array(
        '' => 'Default',
        'w3schools' => __('W3Schools', 'w3csspress'),
        'amber' => __('Amber', 'w3csspress'),
        'black' => __('Black', 'w3csspress'),
        'blue' => __('Blue', 'w3csspress'),
        'blue-grey' => __('Blue Grey', 'w3csspress'),
        'brown' => __('Brown', 'w3csspress'),
        'cyan' => __('Cyan', 'w3csspress'),
        'dark-grey' => __('Dark Grey', 'w3csspress'),
        'deep-orange' => __('Deep Orange', 'w3csspress'),
        'deep-purple' => __('Deep Purple', 'w3csspress'),
        'green' => __('Green', 'w3csspress'),
        'grey' => __('Grey', 'w3csspress'),
        'indigo' => __('Indigo', 'w3csspress'),
        'khaki' => __('Khaki', 'w3csspress'),
        'light-blue' => __('Light Blue', 'w3csspress'),
        'light-green' => __('Light Green', 'w3csspress'),
        'lime' => __('Lime', 'w3csspress'),
        'orange' => __('Orange', 'w3csspress'),
        'pink' => __('Pink', 'w3csspress'),
        'purple' => __('Purple', 'w3csspress'),
        'red' => __('Red', 'w3csspress'),
        'teal' => __('Teal', 'w3csspress'),
        'yellow' => __('Yellow', 'w3csspress'),
    );

    $font_sizes = array(
        '' => __('Default', 'w3csspress'),
        'w3-tiny' => __('Tiny', 'w3csspress'),
        'w3-small' => __('Small', 'w3csspress'),
        'w3-medium' => __('Medium', 'w3csspress'),
        'w3-large' => __('Large', 'w3csspress'),
        'w3-xlarge' => __('XL', 'w3csspress'),
        'w3-xxlarge' => __('XXL', 'w3csspress'),
        'w3-xxxlarge' => __('XXXL', 'w3csspress'),
        'w3-jumbo' => __('Jumbo', 'w3csspress'),
    );

    $font_weights = array(
        '' => __('Default', 'w3csspress'),
    );
    for ($i = 1; $i < 10; $i++) {
        $font_weights["w3-weight-$i" . '00'] = __("Weight",'w3csspress')." $i" . '00';
    }

    $font_families = array(
        '' => __('Default', 'w3csspress'),
        'w3-serif' => __('Serif', 'w3csspress'),
        'w3-sans-serif' => __('Sans serif', 'w3csspress'),
        'w3-monospace' => __('Monospace', 'w3csspress'),
        'w3-cursive' => __('Cursive', 'w3csspress'),
    );

    $theme_kinds = array();
    for ($i = 5; $i > 0; $i--) {
        $theme_kinds["d$i"] = __("Dark",'w3csspress')." $i";
    }
    $theme_kinds[''] = 'Default';
    for ($i = 1; $i < 6; $i++) {
        $theme_kinds["l$i"] = __("Light",'w3csspress')." $i";
    }

    $priority = 1;

    $wp_customize->add_section('w3csspress_section', array(
        'title' => esc_html__('Custom W3.CSS options', 'w3csspress'),
        'description' => esc_html__('Customize W3.CSS options here.', 'w3csspress'),
        'panel' => '',
        'priority' => $priority++,
        'capability' => 'edit_theme_options',
        'theme_supports' => ''
    ));

    $wp_customize->add_setting('w3csspress_color_theme', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_theme_kind', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_family', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_google_font', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting('w3csspress_font_size_paragraph', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_size_div', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_size_input', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_size_table', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_size_ul', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_size_ol', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_weight_paragraph', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_weight_div', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_weight_input', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_weight_table', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_weight_ul', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_font_weight_ol', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_select'
    ));

    $wp_customize->add_setting('w3csspress_rounded_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_setting('w3csspress_circle_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_setting('w3csspress_bordered_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_setting('w3csspress_cards_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_setting('w3csspress_opacity_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_setting('w3csspress_grayscale_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_setting('w3csspress_sepia_img', array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_checkbox'
    ));

    $wp_customize->add_setting('w3csspress_max_width', array(
        'default' => '80',
        'type' => 'option',
        'sanitize_callback' => 'wpse_intval'
    ));

    $wp_customize->add_setting('w3csspress_footer', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'wp_filter_post_kses'
    ));

    $wp_customize->add_control('w3csspress_footer', array(
        'label'      => esc_html__('Footer content', 'w3csspress'),
        'description' => esc_html__('Set footer content.', 'w3csspress'),
        'settings'   => 'w3csspress_footer',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'text',
    ));

    $wp_customize->add_control('w3csspress_max_width', array(
        'label'      => esc_html__('Max width', 'w3csspress'),
        'description' => esc_html__('Set page max width in vw.', 'w3csspress'),
        'settings'   => 'w3csspress_max_width',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'text',
    ));

    $wp_customize->add_control('w3csspress_color_theme', array(
        'label'      => esc_html__('Select color theme', 'w3csspress'),
        'description' => esc_html__('Using this option you can change the theme colors.', 'w3csspress'),
        'settings'   => 'w3csspress_color_theme',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $color_themes,
    ));

    $wp_customize->add_control('w3csspress_theme_kind', array(
        'label'      => esc_html__('Select theme kind', 'w3csspress'),
        'description' => esc_html__('Using this option you can change the theme between default, light and dark.', 'w3csspress'),
        'settings'   => 'w3csspress_theme_kind',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $theme_kinds,
    ));

    $wp_customize->add_control('w3csspress_font_family', array(
        'label'      => esc_html__('Select font family', 'w3csspress'),
        'description' => esc_html__('Change font family of website.', 'w3csspress'),
        'settings'   => 'w3csspress_font_family',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_families,
    ));

    $wp_customize->add_control('w3csspress_google_font', array(
        'label'      => esc_html__('Use Google font', 'w3csspress'),
        'description' => esc_html__('Change font family of website.', 'w3csspress'),
        'settings'   => 'w3csspress_google_font',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'text',
    ));

    $wp_customize->add_control('w3csspress_font_size_paragraph', array(
        'label'      => esc_html__('Select paragraphs font size', 'w3csspress'),
        'description' => esc_html__('Change font size of paragraphs.', 'w3csspress'),
        'settings'   => 'w3csspress_font_size_paragraph',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));

    $wp_customize->add_control('w3csspress_font_size_div', array(
        'label'      => esc_html__('Select div font size', 'w3csspress'),
        'description' => esc_html__('Change font size of div.', 'w3csspress'),
        'settings'   => 'w3csspress_font_size_div',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));

    $wp_customize->add_control('w3csspress_font_size_input', array(
        'label'      => esc_html__('Select input font size', 'w3csspress'),
        'description' => esc_html__('Change font size of inputs.', 'w3csspress'),
        'settings'   => 'w3csspress_font_size_input',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));

    $wp_customize->add_control('w3csspress_font_size_table', array(
        'label'      => esc_html__('Select table font size', 'w3csspress'),
        'description' => esc_html__('Change font size of tables.', 'w3csspress'),
        'settings'   => 'w3csspress_font_size_table',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));

    $wp_customize->add_control('w3csspress_font_size_ul', array(
        'label'      => esc_html__('Select unordered list font size', 'w3csspress'),
        'description' => esc_html__('Change font size of unordered list.', 'w3csspress'),
        'settings'   => 'w3csspress_font_size_ul',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));

    $wp_customize->add_control('w3csspress_font_size_ol', array(
        'label'      => esc_html__('Select ordered list font size', 'w3csspress'),
        'description' => esc_html__('Change font size of ordered list.', 'w3csspress'),
        'settings'   => 'w3csspress_font_size_ol',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));

    $wp_customize->add_control('w3csspress_font_weight_paragraph', array(
        'label'      => esc_html__('Select paragraphs font weight', 'w3csspress'),
        'description' => esc_html__('Change font weight of paragraphs.', 'w3csspress'),
        'settings'   => 'w3csspress_font_weight_paragraph',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    $wp_customize->add_control('w3csspress_font_weight_div', array(
        'label'      => esc_html__('Select div font weight', 'w3csspress'),
        'description' => esc_html__('Change font weight of div.', 'w3csspress'),
        'settings'   => 'w3csspress_font_weight_div',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    $wp_customize->add_control('w3csspress_font_weight_input', array(
        'label'      => esc_html__('Select input font weight', 'w3csspress'),
        'description' => esc_html__('Change font weight of inputs.', 'w3csspress'),
        'settings'   => 'w3csspress_font_weight_input',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    $wp_customize->add_control('w3csspress_font_weight_table', array(
        'label'      => esc_html__('Select table font weight', 'w3csspress'),
        'description' => esc_html__('Change font weight of tables.', 'w3csspress'),
        'settings'   => 'w3csspress_font_weight_table',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    $wp_customize->add_control('w3csspress_font_weight_ul', array(
        'label'      => esc_html__('Select unordered list font weight', 'w3csspress'),
        'description' => esc_html__('Change font weight of unordered list.', 'w3csspress'),
        'settings'   => 'w3csspress_font_weight_ul',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    $wp_customize->add_control('w3csspress_font_weight_ol', array(
        'label'      => esc_html__('Select ordered list font weight', 'w3csspress'),
        'description' => esc_html__('Change font weight of ordered list.', 'w3csspress'),
        'settings'   => 'w3csspress_font_weight_ol',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    for ($i = 1; $i < 7; $i++) {
        $wp_customize->add_setting("w3csspress_font_size_h$i", array(
            'default' => '',
            'type' => 'option',
            'sanitize_callback' => 'sanitize_select'
        ));

        $wp_customize->add_setting("w3csspress_font_weight_h$i", array(
            'default' => '',
            'type' => 'option',
            'sanitize_callback' => 'sanitize_select'
        ));

        $wp_customize->add_control("w3csspress_font_size_h$i", array(
            'label'      => esc_html__("Select h$i font size", 'w3csspress'),
            'description' => esc_html__("Change font size of h$i.", 'w3csspress'),
            'settings'   => "w3csspress_font_size_h$i",
            'priority'   => $priority++,
            'section'    => 'w3csspress_section',
            'type'    => 'select',
            'choices' => $font_sizes,
        ));

        $wp_customize->add_control("w3csspress_font_weight_h$i", array(
            'label'      => esc_html__("Select h$i font weight", 'w3csspress'),
            'description' => esc_html__("Change font weight of h$i.", 'w3csspress'),
            'settings'   => "w3csspress_font_weight_h$i",
            'priority'   => $priority++,
            'section'    => 'w3csspress_section',
            'type'    => 'select',
            'choices' => $font_weights,
        ));
    }

    $wp_customize->add_control('w3csspress_rounded_img', array(
        'label'      => esc_html__('Rounded img', 'w3csspress'),
        'description' => esc_html__('Round images on the page.', 'w3csspress'),
        'settings'   => 'w3csspress_rounded_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_circle_img', array(
        'label'      => esc_html__('Circle img', 'w3csspress'),
        'description' => esc_html__('Circle images on the page.', 'w3csspress'),
        'settings'   => 'w3csspress_circle_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_bordered_img', array(
        'label'      => esc_html__('Bordered img', 'w3csspress'),
        'description' => esc_html__('Border images on the page.', 'w3csspress'),
        'settings'   => 'w3csspress_bordered_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_cards_img', array(
        'label'      => esc_html__('Card img', 'w3csspress'),
        'description' => esc_html__('Image with card effect.', 'w3csspress'),
        'settings'   => 'w3csspress_cards_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_opacity_img', array(
        'label'      => esc_html__('Opacity img', 'w3csspress'),
        'description' => esc_html__('Image with opacity effect.', 'w3csspress'),
        'settings'   => 'w3csspress_opacity_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_grayscale_img', array(
        'label'      => esc_html__('Grayscale img', 'w3csspress'),
        'description' => esc_html__('Image with grayscale effect.', 'w3csspress'),
        'settings'   => 'w3csspress_grayscale_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_sepia_img', array(
        'label'      => esc_html__('Sepia img', 'w3csspress'),
        'description' => esc_html__('Image with sepia effect.', 'w3csspress'),
        'settings'   => 'w3csspress_sepia_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
}

class w3csspress_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = NULL)
    {
        $output .= "<ul class=\"w3-dropdown-content w3-animate-opacity w3-bar-block w3-mobile w3-theme-action sub-menu\">";
    }
}

add_action('after_setup_theme', 'w3csspress_setup');
function w3csspress_setup()
{
    load_theme_textdomain('w3csspress', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));
    add_theme_support('woocommerce');
    add_theme_support('custom-logo');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'w3csspress')
        )
    );
    add_editor_style('editor-style.css');
}

add_action('admin_init', 'w3csspress_notice_dismissed');
function w3csspress_notice_dismissed()
{
    $user_id = get_current_user_id();
    if (isset($_GET['notice-dismiss']))
        add_user_meta($user_id, 'w3csspress_notice_dismissed_4', 'true', true);
}

add_action('wp_enqueue_scripts', 'w3csspress_enqueue_script');
function w3csspress_enqueue_script()
{
    wp_enqueue_style('w3', get_template_directory_uri() . '/assets/css/w3.css', false, '4.15', 'all');
    $color_theme = get_option('w3csspress_color_theme');
    if ($color_theme != '') wp_enqueue_style("w3-theme-$color_theme", get_template_directory_uri() . "/assets/css/lib/w3-theme-$color_theme.css", false, '1.0', 'all');
    $google_font = get_option('w3csspress_google_font');
    if ($google_font != '') {
        wp_enqueue_style("google-font", "https://fonts.googleapis.com/css?family=$google_font");
    }
    wp_enqueue_style('w3csspress-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
}

add_action('wp_footer', 'w3csspress_footer');
function w3csspress_footer()
{
?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
            if ($(window).width() < 600) {
                $("#menu").hide();
                $("#menu").addClass("w3-animate-bottom");
                $("#site-description").after('<button type="button" class="menu-toggle" id="burger"><span class="dashicons dashicons-menu"></span>Menu</button>');
                $("#burger").click(function() {
                    $("#menu").toggle();
                });
            }
            <?php if (get_option('w3csspress_rounded_img')) { ?>
                $("img").addClass("w3-round");
            <?php } ?>
            <?php if (get_option('w3csspress_circle_img')) { ?>
                $("img").addClass("w3-circle");
            <?php } ?>
            <?php if (get_option('w3csspress_bordered_img')) { ?>
                $("img").addClass("w3-border");
            <?php } ?>
            <?php if (get_option('w3csspress_cards_img')) { ?>
                $("img").addClass("w3-card");
            <?php } ?>
            <?php if (get_option('w3csspress_opacity_img')) { ?>
                $("img").addClass("w3-opacity");
            <?php } ?>
            <?php if (get_option('w3csspress_grayscale_img')) { ?>
                $("img").addClass("w3-grayscale");
            <?php } ?>
            <?php if (get_option('w3csspress_sepia_img')) { ?>
                $("img").addClass("w3-sepia");
            <?php } ?>
            $("p").addClass("<?php echo get_option('w3csspress_font_size_paragraph') . ' ' . get_option('w3csspress_font_weight_paragraph'); ?>");
            $("div").addClass("<?php echo get_option('w3csspress_font_size_div') . ' ' . get_option('w3csspress_font_weight_div'); ?>");
            $("input").addClass("<?php echo get_option('w3csspress_font_size_input') . ' ' . get_option('w3csspress_font_weight_input'); ?>");
            $("button").addClass("<?php echo get_option('w3csspress_font_size_input') . ' ' . get_option('w3csspress_font_weight_input'); ?>");
            $("reset").addClass("<?php echo get_option('w3csspress_font_size_input') . ' ' . get_option('w3csspress_font_weight_input'); ?>");
            $("textarea").addClass("<?php echo get_option('w3csspress_font_size_input') . ' ' . get_option('w3csspress_font_weight_input'); ?>");
            $("table").addClass("<?php echo get_option('w3csspress_font_size_table') . ' ' . get_option('w3csspress_font_weight_table'); ?>");
            $("ul").addClass("<?php echo get_option('w3csspress_font_size_ul') . ' ' . get_option('w3csspress_font_weight_ul'); ?>");
            $("ol").addClass("<?php echo get_option('w3csspress_font_size_ol') . ' ' . get_option('w3csspress_font_weight_ol'); ?>");
            <?php
            $google_font = get_option('w3csspress_google_font');
            $max_width = get_option('w3csspress_max_width');
            if ($google_font != '') $font = "w3-google";
            else $font = get_option('w3csspress_font_family');
            for ($i = 1; $i < 7; $i++) {
                echo "$(\"h$i\").addClass(\"" . get_option("w3csspress_font_size_h$i") . " " . $font . "\");";
            }
            ?>
            $("input:not(':button, :reset,[type=\"button\"],[type=\"submit\"],[type=\"reset\"]')").addClass("w3-input");
            $("button").addClass("w3-btn w3-theme-action");
            $("reset").addClass("w3-btn w3-theme-action");
            $("input[type='button']").addClass("w3-btn");
            $("input[type='submit']").addClass("w3-btn");
            $("input[type='reset']").addClass("w3-btn");
            $("input").addClass("w3-theme-action");
            $("textarea").addClass("w3-theme-action");
            $("table").parent().addClass("w3-responsive");
            $("table").addClass("w3-table-all w3-hoverable");
            $("img").addClass("w3-image");
            $("code").addClass("w3-code");
            $("ul").addClass("w3-ul");
            $(".custom-logo").addClass("w3-theme-action");
            <?php
            if ($google_font != '') {
            ?>
                $("<style type='text/css'> .w3-google{font-family:<?php echo str_replace('+', ' ', $google_font); ?>} </style>").appendTo("head");
            <?php } ?>
            <?php
            if ($max_width != '') {
            ?>
                $("<style type='text/css'> body{margin:auto; max-width:<?php echo $max_width; ?>vw;} </style>").appendTo("head");
            <?php } ?>
            $.each($(".menu-item"), function(index) {
                $(this).children("a").focusin(function(event) {
                    $(event.target).parents('.w3-dropdown-focus').addClass("w3-show");
                    $(event.target).next('.w3-dropdown-content').addClass("w3-show");
                });
            });
            $.each($(".w3-dropdown-content .menu-item:last-of-type"), function(index) {
                $(this).children("a").focusout(function(event) {
                    $(event.target).parents('.w3-dropdown-focus').removeClass("w3-show");
                    $(event.target).parents('.w3-dropdown-content').removeClass("w3-show");
                });
            });
            $.each($(".w3-dropdown-focus"), function(index) {
                $(this).children("a").keydown(function(event) {
                    if (event.which == 9 && event.shiftKey) {
                        $(event.target).next('.w3-dropdown-content').removeClass("w3-show");
                    }
                });
            });
        });
    </script>
<?php
}

add_filter('document_title_separator', 'w3csspress_document_title_separator');
function w3csspress_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}

add_filter('the_title', 'w3csspress_title');
function w3csspress_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}

if (!function_exists('w3csspress_wp_body_open')) {
    function w3csspress_wp_body_open()
    {
        do_action('wp_body_open');
    }
}

add_action('wp_body_open', 'w3csspress_skip_link', 5);
function w3csspress_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'w3csspress') . '</a>';
}

add_filter('the_content_more_link', 'w3csspress_read_more_link');
function w3csspress_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(esc_html__('...%s', 'w3csspress'), '<span class="screen-reader-text">  ' . esc_html__(get_the_title()) . '</span>') . '</a>';
    }
}

add_filter('excerpt_more', 'w3csspress_excerpt_read_more_link');
function w3csspress_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(esc_html__('...%s', 'w3csspress'), '<span class="screen-reader-text">  ' . esc_html__(get_the_title()) . '</span>') . '</a>';
    }
}

add_filter('big_image_size_threshold', '__return_false');

add_filter('intermediate_image_sizes_advanced', 'w3csspress_image_insert_override');
function w3csspress_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}

add_action('wp_head', 'w3csspress_pingback_header');
function w3csspress_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('comment_form_before', 'w3csspress_enqueue_comment_reply_script');
function w3csspress_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function w3csspress_custom_pings($comment)
{
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?></li>
<?php
}

add_filter('get_comments_number', 'w3csspress_comment_count', 0);
function w3csspress_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function add_additional_class_on_li($classes, $item, $args)
{
    $classes[] = "w3-bar-item";
    $classes[] = "w3-mobile";
    if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'w3-dropdown-hover w3-dropdown-focus';
    }
    return $classes;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_action('wp_enqueue_scripts', 'dashicons_front_end');
function dashicons_front_end()
{
    wp_enqueue_style('dashicons');
}

add_filter('body_class', 'w3csspress_body_class');
function w3csspress_body_class($classes)
{
    $theme_kind = get_option('w3csspress_theme_kind');
    if ($theme_kind != '') $classes[] = "w3-theme-$theme_kind";
    else $classes[] = 'w3-theme';
    $google_font = get_option('w3csspress_google_font');
    if ($google_font == '') $classes[] = get_option('w3csspress_font_family');
    else $classes[] = "w3-google";
    return $classes;
}

add_filter('use_block_editor_for_post', '__return_false');
