<?php
add_action('customize_register', 'w3csspress_customize_register');
function w3csspress_customize_register($wp_customize)
{
    $color_themes = array(
        '' => 'Default',
        'w3schools' => 'W3Schools',
        'amber' => 'Amber',
        'black' => 'Black',
        'blue' => 'Blue',
        'blue-grey' => 'Blue Grey',
        'brown' => 'Brown',
        'cyan' => 'Cyan',
        'dark-grey' => 'Dark Grey',
        'deep-orange' => 'Deep Orange',
        'deep-purple' => 'Deep Purple',
        'green' => 'Green',
        'grey' => 'Grey',
        'indigo' => 'Indigo',
        'khaki' => 'Khaki',
        'light-blue' => 'Light Blue',
        'light-green' => 'Light Green',
        'lime' => 'Lime',
        'orange' => 'Orange',
        'pink' => 'Pink',
        'purple' => 'Purple',
        'red' => 'Red',
        'teal' => 'Teal',
        'yellow' => 'Yellow',
    );

    $font_sizes = array(
        '' => 'Default',
        'w3-tiny' => 'Tiny',
        'w3-small' => 'Small',
        'w3-medium' => 'Medium',
        'w3-large' => 'Large',
        'w3-xlarge' => 'XL',
        'w3-xxlarge' => 'XXL',
        'w3-xxxlarge' => 'XXXL',
        'w3-jumbo' => 'Jumbo',
    );
	
	$font_weights = array(
        '' => 'Default',
    );
	for($i=1;$i<10;$i++){
		$font_weights["w3-weight-$i".'00'] = "Weight $i".'00';
	}
	
	$font_families = array(
		'' => 'Default',
		'w3-serif' => 'Serif',
		'w3-sans-serif' => 'Sans serif',
		'w3-monospace' => 'Monospace',
		'w3-cursive' => 'Cursive',
	);
	
	$theme_kinds = array();
	for($i=5;$i>0;$i--){
		$theme_kinds["d$i"] = "Dark $i";
	}
	$theme_kinds[''] = 'Default';
	for($i=1;$i<6;$i++){
		$theme_kinds["l$i"] = "Light $i";
	}

    $priority = 1;
	
    $wp_customize->add_section('w3csspress_section', array(
        'title' => __('Custom W3.CSS options'),
        'description' => __('Customize W3.CSS options here.'),
        'panel' => '',
        'priority' => $priority++,
        'capability' => 'edit_theme_options',
        'theme_supports' => ''
    ));

    $wp_customize->add_setting('w3css_color_theme', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3css_theme_kind', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_setting('w3csspress_font_family', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_google_font', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_size_paragraph', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_underline_a', array(
        'default' => 1,
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_size_div', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_size_input', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_size_table', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_size_ul', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_size_ol', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_weight_paragraph', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_weight_div', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_weight_input', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_weight_table', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_weight_ul', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_font_weight_ol', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_setting('w3csspress_rounded_img', array(
        'default' => '',
        'type' => 'option'
    ));
	$wp_customize->add_setting('w3csspress_circle_img', array(
        'default' => '',
        'type' => 'option'
    ));
	$wp_customize->add_setting('w3csspress_bordered_img', array(
        'default' => '',
        'type' => 'option'
    ));
	$wp_customize->add_setting('w3csspress_cards_img', array(
        'default' => '',
        'type' => 'option'
    ));
	$wp_customize->add_setting('w3csspress_opacity_img', array(
        'default' => '',
        'type' => 'option'
    ));
	$wp_customize->add_setting('w3csspress_grayscale_img', array(
        'default' => '',
        'type' => 'option'
    ));
	$wp_customize->add_setting('w3csspress_sepia_img', array(
        'default' => '',
        'type' => 'option'
    ));
	
	$wp_customize->add_control('w3css_color_theme', array(
        'label'      => __('Select color theme'),
        'description' => __('Using this option you can change the theme colors.'),
        'settings'   => 'w3css_color_theme',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $color_themes,
    ));
	
	$wp_customize->add_control('w3css_theme_kind', array(
        'label'      => __('Select theme kind'),
        'description' => __('Using this option you can change the theme between default, light and dark.'),
        'settings'   => 'w3css_theme_kind',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $theme_kinds,
    ));

	$wp_customize->add_control('w3csspress_font_family', array(
        'label'      => __('Select font family'),
        'description' => __('Change font family of website.'),
        'settings'   => 'w3csspress_font_family',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_families,
    ));
	
	$wp_customize->add_control('w3csspress_google_font', array(
        'label'      => __('Use Google font'),
        'description' => __('Change font family of website.'),
        'settings'   => 'w3csspress_google_font',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'text',
    ));

	$wp_customize->add_control('w3csspress_underline_a', array(
        'label'      => __('Underline links'),
        'description' => __('Underline links on the page (menu excluded).'),
        'settings'   => 'w3csspress_underline_a',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_control('w3csspress_font_size_paragraph', array(
        'label'      => __('Select paragraphs font size'),
        'description' => __('Change font size of paragraphs.'),
        'settings'   => 'w3csspress_font_size_paragraph',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));
	
	$wp_customize->add_control('w3csspress_font_size_div', array(
        'label'      => __('Select div font size'),
        'description' => __('Change font size of div.'),
        'settings'   => 'w3csspress_font_size_div',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));
	
	$wp_customize->add_control('w3csspress_font_size_input', array(
        'label'      => __('Select input font size'),
        'description' => __('Change font size of inputs.'),
        'settings'   => 'w3csspress_font_size_input',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));
	
	$wp_customize->add_control('w3csspress_font_size_table', array(
        'label'      => __('Select table font size'),
        'description' => __('Change font size of tables.'),
        'settings'   => 'w3csspress_font_size_table',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));
	
	$wp_customize->add_control('w3csspress_font_size_ul', array(
        'label'      => __('Select unordered list font size'),
        'description' => __('Change font size of unordered list.'),
        'settings'   => 'w3csspress_font_size_ul',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));
	
	$wp_customize->add_control('w3csspress_font_size_ol', array(
        'label'      => __('Select ordered list font size'),
        'description' => __('Change font size of ordered list.'),
        'settings'   => 'w3csspress_font_size_ol',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_sizes,
    ));
	
	$wp_customize->add_control('w3csspress_font_weight_paragraph', array(
        'label'      => __('Select paragraphs font weight'),
        'description' => __('Change font weight of paragraphs.'),
        'settings'   => 'w3csspress_font_weight_paragraph',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));
	
	$wp_customize->add_control('w3csspress_font_weight_div', array(
        'label'      => __('Select div font weight'),
        'description' => __('Change font weight of div.'),
        'settings'   => 'w3csspress_font_weight_div',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));
	
	$wp_customize->add_control('w3csspress_font_weight_input', array(
        'label'      => __('Select input font weight'),
        'description' => __('Change font weight of inputs.'),
        'settings'   => 'w3csspress_font_weight_input',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));
	
	$wp_customize->add_control('w3csspress_font_weight_table', array(
        'label'      => __('Select table font weight'),
        'description' => __('Change font weight of tables.'),
        'settings'   => 'w3csspress_font_weight_table',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));
	
	$wp_customize->add_control('w3csspress_font_weight_ul', array(
        'label'      => __('Select unordered list font weight'),
        'description' => __('Change font weight of unordered list.'),
        'settings'   => 'w3csspress_font_weight_ul',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));
	
	$wp_customize->add_control('w3csspress_font_weight_ol', array(
        'label'      => __('Select ordered list font weight'),
        'description' => __('Change font weight of ordered list.'),
        'settings'   => 'w3csspress_font_weight_ol',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'select',
        'choices' => $font_weights,
    ));

    for ($i = 1; $i < 7; $i++) {
		$wp_customize->add_setting("w3csspress_font_size_h$i", array(
			'default' => '',
			'type' => 'option'
		));
		
		$wp_customize->add_setting("w3csspress_font_weight_h$i", array(
			'default' => '',
			'type' => 'option'
		));
		
        $wp_customize->add_control("w3csspress_font_size_h$i", array(
            'label'      => __("Select h$i font size"),
            'description' => __("Change font size of h$i."),
            'settings'   => "w3csspress_font_size_h$i",
            'priority'   => $priority++,
            'section'    => 'w3csspress_section',
            'type'    => 'select',
            'choices' => $font_sizes,
        ));
		
		$wp_customize->add_control("w3csspress_font_weight_h$i", array(
            'label'      => __("Select h$i font weight"),
            'description' => __("Change font weight of h$i."),
            'settings'   => "w3csspress_font_weight_h$i",
            'priority'   => $priority++,
            'section'    => 'w3csspress_section',
            'type'    => 'select',
            'choices' => $font_weights,
        ));
    }
	
	$wp_customize->add_control('w3csspress_rounded_img', array(
        'label'      => __('Rounded img'),
        'description' => __('Round images on the page.'),
        'settings'   => 'w3csspress_rounded_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
	
	$wp_customize->add_control('w3csspress_circle_img', array(
        'label'      => __('Circle img'),
        'description' => __('Circle images on the page.'),
        'settings'   => 'w3csspress_circle_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
	
	$wp_customize->add_control('w3csspress_bordered_img', array(
        'label'      => __('Bordered img'),
        'description' => __('Border images on the page.'),
        'settings'   => 'w3csspress_bordered_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
	
	$wp_customize->add_control('w3csspress_cards_img', array(
        'label'      => __('Card img'),
        'description' => __('Image with card effect.'),
        'settings'   => 'w3csspress_cards_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
	
	$wp_customize->add_control('w3csspress_opacity_img', array(
        'label'      => __('Opacity img'),
        'description' => __('Image with opacity effect.'),
        'settings'   => 'w3csspress_opacity_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
	
	$wp_customize->add_control('w3csspress_grayscale_img', array(
        'label'      => __('Grayscale img'),
        'description' => __('Image with grayscale effect.'),
        'settings'   => 'w3csspress_grayscale_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
	
	$wp_customize->add_control('w3csspress_sepia_img', array(
        'label'      => __('Sepia img'),
        'description' => __('Image with sepia effect.'),
        'settings'   => 'w3csspress_sepia_img',
        'priority'   => $priority++,
        'section'    => 'w3csspress_section',
        'type'    => 'checkbox',
    ));
}

class W3csspress_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = NULL)
    {
        $output .= "<ul class=\"w3-dropdown-content w3-animate-opacity w3-bar-block w3-theme-action sub-menu\">";
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
    add_theme_support('html5', array('search-form'));
    add_theme_support('woocommerce');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('align-wide');
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
	$color_theme = get_option('w3css_color_theme');
    if ($color_theme != '') wp_enqueue_style("w3-theme-$color_theme", get_template_directory_uri() . "/assets/css/lib/w3-theme-$color_theme.css", false, '1.0', 'all');
	$google_font = get_option('w3csspress_google_font');
	if($google_font!=''){
		wp_enqueue_style("google-font","https://fonts.googleapis.com/css?family=$google_font");
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
			<?php if(get_option('w3csspress_underline_a')!=1) { ?>
			$("a").addClass("w3-no-decoration");
			<?php } ?>
			<?php if(get_option('w3csspress_rounded_img')!='') { ?>
			$("img").addClass("w3-round");
			<?php } ?>
			<?php if(get_option('w3csspress_circle_img')!='') { ?>
			$("img").addClass("w3-circle");
			<?php } ?>
			<?php if(get_option('w3csspress_bordered_img')!='') { ?>
			$("img").addClass("w3-border w3-padding");
			<?php } ?>
			<?php if(get_option('w3csspress_cards_img')!='') { ?>
			$("img").addClass("w3-card");
			<?php } ?>
			<?php if(get_option('w3csspress_opacity_img')!='') { ?>
			$("img").addClass("w3-opacity");
			<?php } ?>
			<?php if(get_option('w3csspress_grayscale_img')!='') { ?>
			$("img").addClass("w3-grayscale");
			<?php } ?>
			<?php if(get_option('w3csspress_sepia_img')!='') { ?>
			$("img").addClass("w3-sepia");
			<?php } ?>
			$("p").addClass("<?php echo get_option('w3csspress_font_size_paragraph').' '.get_option('w3csspress_font_weight_paragraph'); ?>");
			$("div").addClass("<?php echo get_option('w3csspress_font_size_div').' '.get_option('w3csspress_font_weight_div'); ?>");			
			$("input").addClass("<?php echo get_option('w3csspress_font_size_input').' '.get_option('w3csspress_font_weight_input'); ?>");
			$("button").addClass("<?php echo get_option('w3csspress_font_size_input').' '.get_option('w3csspress_font_weight_input'); ?>");
			$("reset").addClass("<?php echo get_option('w3csspress_font_size_input').' '.get_option('w3csspress_font_weight_input'); ?>");
			$("textarea").addClass("<?php echo get_option('w3csspress_font_size_input').' '.get_option('w3csspress_font_weight_input'); ?>");
			$("table").addClass("<?php echo get_option('w3csspress_font_size_table').' '.get_option('w3csspress_font_weight_table'); ?>");
			$("ul").addClass("<?php echo get_option('w3csspress_font_size_ul').' '.get_option('w3csspress_font_weight_ul'); ?>");
			$("ol").addClass("<?php echo get_option('w3csspress_font_size_ol').' '.get_option('w3csspress_font_weight_ol'); ?>");
			<?php
				$google_font = get_option('w3csspress_google_font');
				if($google_font!='')$font = "w3-google";
				else $font = get_option('w3csspress_font_family');
				for($i=1;$i<7;$i++){
					echo "$(\"h$i\").addClass(\"".get_option("w3csspress_font_size_h$i")." ".$font."\");";
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
			<?php
			if($google_font!=''){
			?>
			$("<style type='text/css'> .w3-google{font-family:<?php echo str_replace('+',' ',$google_font); ?>} </style>").appendTo("head");
			<?php } ?>
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
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'w3csspress'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}

add_filter('excerpt_more', 'w3csspress_excerpt_read_more_link');
function w3csspress_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'w3csspress'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
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
	if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'w3-dropdown-hover';
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
	$theme_kind = get_option('w3css_theme_kind');
	if($theme_kind!='') $classes[] = "w3-theme-$theme_kind";
	else $classes[] = 'w3-theme';
	$google_font = get_option('w3csspress_google_font');
	if($google_font=='') $classes[] = get_option('w3csspress_font_family');
	else $classes[] = "w3-google";
    return $classes;
}

add_filter( 'use_block_editor_for_post', '__return_false' );