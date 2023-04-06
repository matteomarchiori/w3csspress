<?php
/**
 * Functions of the w3csspress theme
 *
 * This file is used for the theme functions.
 *
 * @package w3csspress
 * @since 2022.0
 */

namespace w3csspress;

use w3csspress\W3csspress_Constants;

get_template_part( 'inc/sanitize' );
get_template_part( 'inc/colors' );
get_template_part( 'inc/content' );
get_template_part( 'inc/fonts' );
get_template_part( 'inc/images' );
get_template_part( 'inc/layout' );
get_template_part( 'inc/speed' );
if ( function_exists( 'register_block_pattern' ) ) {
	get_template_part( 'inc/block-patterns' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\w3csspress_after_setup_theme' );
/**
 * Fires to finish the w3csspress theme setup.
 *
 * @since 2022.0
 */
function w3csspress_after_setup_theme() {
	load_theme_textdomain( 'w3csspress', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'navigation-widgets', 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'woocommerce' );
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 250,
			'width'                => 250,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => true,
		)
	);
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1920,
			'height'      => 300,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => false,
		)
	);
	add_theme_support(
		'custom-background',
		array(
			'default-preset'     => 'fill',
			'default-position-x' => 'center',
			'default-position-y' => 'center',
			'default-size'       => 'contain',
			'default-repeat'     => 'no-repeat',
			'default-attachment' => 'fixed',
			'default-color'      => '',
		)
	);
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	register_nav_menus(
		array(
			'main-menu' => esc_html( ucfirst( __( 'main menu', 'w3csspress' ) ) ),
		)
	);
	add_editor_style(
		array(
			'assets/css/w3.css',
			'assets/css/editor-style.css',
		)
	);
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\w3csspress_wp_enqueue_scripts' );
/**
 * Fires once WordPress has loaded, allowing scripts and styles to be initialized.
 *
 * @since 2022.0
 */
function w3csspress_wp_enqueue_scripts() {
	$w3csspress_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'w3', get_template_directory_uri() . '/assets/css/w3.css', false, '4.15', 'all' );
	wp_style_add_data( 'w3', 'rtl', 'replace' );
	wp_enqueue_style( 'w3-wide', get_template_directory_uri() . '/assets/css/w3-wide.css', false, '4.15', 'screen and (min-width: 1920px)' );
	wp_style_add_data( 'w3-wide', 'rtl', 'replace' );
	$w3csspress_color_theme = esc_html( get_option( 'w3csspress_color_theme' ) );
	if ( '' !== $w3csspress_color_theme ) {
		wp_enqueue_style( "w3-theme-$w3csspress_color_theme", get_template_directory_uri() . "/assets/css/lib/w3-theme-$w3csspress_color_theme.css", false, $w3csspress_version, 'all' );
		if ( strpos( $w3csspress_color_theme, 'w3schools' ) !== false ) {
			wp_style_add_data( "w3-theme-$w3csspress_color_theme", 'rtl', 'replace' );
		}
	}
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'w3css-woocommerce', get_template_directory_uri() . '/assets/css/w3css-woocommerce.css', false, $w3csspress_version, 'all' );
	}
	wp_enqueue_style( 'w3csspress-style', get_stylesheet_uri(), false, $w3csspress_version, 'all' );
	wp_style_add_data( 'w3csspress-style', 'rtl', 'replace' );
	wp_enqueue_script( 'w3csspress-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), $w3csspress_version, true );
}

add_action( 'wp_footer', __NAMESPACE__ . '\\w3csspress_wp_footer' );
/**
 * Fires when WordPress loads the footer, to enqueue some customizer checks.
 *
 * @since 2022.0
 */
function w3csspress_wp_footer() {               ?>
	<script async type="text/javascript">
		window.addEventListener('load', function() {
			if (window.outerWidth <= 600) {
				var menus = document.getElementsByClassName("menu");
				if (menus.length > 0) {
					var menu = menus[0];
					menu.className += " w3-animate-bottom";
					var buttonMenu = document.createElement('button');
					buttonMenu.type = "button";
					buttonMenu.className = "menu-toggle w3-btn w3-theme-action w3-margin-top w3-right <?php echo esc_html( get_option( 'w3csspress_rounded_style' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_size_input' ) ) . ' ' . esc_html( get_option( 'w3csspress_font_weight_input' ) ); ?>";
					buttonMenu.id = "burger";
					buttonMenu.innerHTML = "&equiv; <?php echo esc_html( ucfirst( __( 'menu', 'w3csspress' ) ) ); ?>";
					buttonMenu.addEventListener("click", function() {
						display = menu.style.display;
						if (display == "none" || display == '') menu.style.display = "block";
						else menu.style.display = "none";
					});
					var siteTitle = document.getElementById("site-title");
					if(siteTitle==null){
						siteTitle = document.getElementsByClassName("wp-block-site-title")[0];
					}
					if(siteTitle==null){
						siteTitle = document.getElementById("branding");
					}
					siteTitle.parentNode.insertBefore(buttonMenu, siteTitle.nextSibling);
					var menuItems = document.getElementsByClassName("menu-item");
					var lastMenuItem = menuItems[menuItems.length - 1];
					var lastLink = lastMenuItem.getElementsByTagName("a");
					if (lastLink.length) lastLink[0].addEventListener("keydown", function(event) {
						event.preventDefault();
						if (event.which == 9 && !event.shiftKey) {
							buttonMenu.focus();
						}
					});
				}
			}
		}, false);
	</script>
	<?php
}

add_filter( 'the_title', __NAMESPACE__ . '\\w3csspress_the_title' );
/**
 * Filter for empty titles, replace with three periods.
 *
 * @since 2022.0
 *
 * @param string $title Required. The title of the post or page.
 * @return string The new title.
 */
function w3csspress_the_title( $title ) {
	if ( '' === $title ) {
		return '&hellip;';
	} else {
		return $title;
	}
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\w3csspress_excerpt_more', 5 );
/**
 * Add read more  for excerpt.
 *
 * @since 2022.0
 *
 * @return string Read more link.
 */
function w3csspress_excerpt_more() {
	if ( ! is_admin() ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf(
			/* translators: read more link */
			esc_html( '&hellip;%s' ),
			'<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>'
		) . '</a>';
	}
}

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter( 'intermediate_image_sizes_advanced', __NAMESPACE__ . '\\w3csspress_intermediate_image_sizes_advanced' );
/**
 * Customize sizes for media.
 *
 * @since 2022.0
 *
 * @param array $sizes Required. Default media sizes.
 *
 * @return array media sizes.
 */
function w3csspress_intermediate_image_sizes_advanced( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}

add_action( 'wp_head', __NAMESPACE__ . '\\w3csspress_wp_head' );
/**
 * Add pingback header.
 *
 * @since 2022.0
 */
function w3csspress_wp_head() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'comment_form_before', __NAMESPACE__ . '\\w3csspress_comment_form_before' );
/**
 * Add comment reply function
 *
 * @since 2022.0
 */
function w3csspress_comment_form_before() {
	if ( esc_html( get_option( 'thread_comments' ) ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Show trackbacks and pingbacks.
 *
 * @since 2022.0
 */
function w3csspress_custom_pings() {
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
	<?php
}

add_filter( 'get_comments_number', __NAMESPACE__ . '\\w3csspress_get_comments_number', 0 );
/**
 * Counter for comments.
 *
 * @since 2022.0
 *
 * @param int $count Required. Default count.
 * @return int Count of comments for post.
 */
function w3csspress_get_comments_number( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$get_comments     = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $get_comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\w3csspress_nav_menu_css_class', 1, 3 );
/**
 * Filters the CSS classes applied to a menu item’s list item element.
 *
 * @since 2022.0
 *
 * @param array   $classes Array of the CSS classes that are applied to the menu item's <li> element.
 * @param WP_Post $menu_item The current menu item object.
 *
 * @return array Array of the CSS classes that are applied to the menu item's <li> element.
 */
function w3csspress_nav_menu_css_class( $classes, $menu_item ) {
	$classes[] = 'w3-bar-item w3-mobile';
	if ( in_array( 'menu-item-has-children', $classes, true ) ) {
		$classes[] = 'w3-dropdown-hover w3-dropdown-focus';
	}
	$actual_link = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://';
	if ( isset( $_SERVER['HTTP_HOST'] ) && isset( $_SERVER['REQUEST_URI'] ) ) {
		$actual_link .= sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ) );
	}
	if ( $menu_item->url === $actual_link ) {
		$classes[] = 'current-menu-item';
	}
	$classes = array_merge( $classes, add_additional_class_on_li_layout() );
	return $classes;
}

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\\w3csspress_comment_form_defaults' );
/**
 * Changes reply title for comments.
 *
 * @since 2022.4
 *
 * @param array $defaults . The default comment form arguments.
 *
 * @return array $defaults The default comment form arguments.
 */
function w3csspress_comment_form_defaults( $defaults ) {
	$defaults['title_reply_before'] = '<strong id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after']  = '</strong>';
	return $defaults;
}

add_action( 'widgets_init', __NAMESPACE__ . '\\w3csspress_widgets_init' );
/**
 * Register the w3csspress sidebars
 *
 * @since 2022.7
 */
function w3csspress_widgets_init() {
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => ucfirst( __( 'primary sidebar', 'w3csspress' ) ),
			'description'   => ucfirst( __( 'sidebar on the left.', 'w3csspress' ) ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'secondary',
			'name'          => ucfirst( __( 'secondary sidebar', 'w3csspress' ) ),
			'description'   => ucfirst( __( 'sidebar on the right.', 'w3csspress' ) ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'headwidgets',
			'name'          => ucfirst( __( 'head widgets sidebar', 'w3csspress' ) ),
			'description'   => ucfirst( __( 'widgets area on the head of the website.', 'w3csspress' ) ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footwidgets',
			'name'          => ucfirst( __( 'foot widgets sidebar', 'w3csspress' ) ),
			'description'   => ucfirst( __( 'widgets area on the foot of the website.', 'w3csspress' ) ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}

/**
 * Return schema.org type based on page
 *
 * @since 2022.12
 */
function w3csspress_schema_type() {
	if ( is_single() ) {
		$type = 'Article';
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo 'itemscope itemtype=' . esc_attr( "https://schema.org/$type" );
}

add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\\w3csspress_nav_menu_link_attributes', 10 );
/**
 * Filters the HTML attributes applied to a menu item’s anchor element.
 *
 * @param array $atts The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
 *
 * @since 2022.12
 */
function w3csspress_nav_menu_link_attributes( $atts ) {
	$atts['itemprop'] = 'url';
	return $atts;
}


add_action( 'wp', __NAMESPACE__ . '\\w3csspress_ob_start' );
/**
 * Turn on output buffering
 *
 * @since 2022.32
 */
function w3csspress_ob_start() {
	if ( ! is_feed() ) {
		ob_start( __NAMESPACE__ . '\\w3csspress_final_output' );
	}
}

add_action( 'shutdown', __NAMESPACE__ . '\\w3csspress_ob_end_flush' );
/**
 * Turn off output buffering
 *
 * @since 2022.40
 */
function w3csspress_ob_end_flush() {
	if ( ob_get_length() > 0 ) {
		ob_end_flush();
	}
}

add_filter( 'w3csspress_add_classes', __NAMESPACE__ . '\\w3csspress_add_classes', 10, 2 );
/**
 * Add w3csspress classes to the elements
 *
 * @since 2022.32
 *
 * @param array  $elements Elements to apply the classes.
 * @param string $classes Classes to be applied.
 */
function w3csspress_add_classes( $elements, $classes ) {
	foreach ( $elements as $w3csspress_element ) {
		$existent = $w3csspress_element->getAttribute( 'class' );
		if ( '' === $existent ) {
			$spacer = '';
		} else {
			$spacer = ' ';
		}
		if ( '' !== $classes && strpos( ' ' . $existent . ' ', $classes ) === false ) {
			$w3csspress_element->setAttribute(
				'class',
				$existent . $spacer . $classes
			);
		}
	}
}


/**
 * Function to output the final result.
 *
 * @since 2022.32
 *
 * @param string $output String with the output.
 */
function w3csspress_final_output( $output ) {
	if ( false !== strpos( $output, '</html>' ) ) {
		$dom                   = new \DOMDocument();
		$libxml_previous_state = libxml_use_internal_errors( true );
		if ( function_exists( 'mb_convert_encoding' ) ) {
			$dom->loadHTML( mb_convert_encoding( $output, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
		} else {
			$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $output );
		}
		libxml_use_internal_errors( $libxml_previous_state );
		$xpath = new \DOMXpath( $dom );

		$w3csspress_selectors = W3csspress_Constants::w3csspress_additional_selectors();
		foreach ( $w3csspress_selectors as $w3csspress_selector ) {
			$w3csspress_elements = $xpath->query( $w3csspress_selector['selector'] );
			$w3csspress_classes  = $w3csspress_selector['classes'];
			apply_filters( 'w3csspress_add_classes', $w3csspress_elements, $w3csspress_classes );
		}
		$head = $xpath->query( '//head' )->item( 0 );
		apply_filters( 'w3csspress_colors', $dom, $head );
		apply_filters( 'w3csspress_fonts', $dom, $head );
		apply_filters( 'w3csspress_images', $dom, $head );
		return $dom->saveHTML();
	}
	return $output;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\\w3csspress_after_switch_theme' );
/**
 * Fires to finish the w3csspress theme activation.
 *
 * @since 2022.34
 */
function w3csspress_after_switch_theme() {
	if ( ! get_option( 'w3csspress_dashicons' ) ) {
		add_option( 'w3csspress_dashicons', 1 );
	}
	if ( ! get_option( 'w3csspress_gutenberg_posts' ) ) {
		add_option( 'w3csspress_gutenberg_posts', 1 );
	}
	if ( ! get_option( 'w3csspress_gutenberg_widgets' ) ) {
		add_option( 'w3csspress_gutenberg_widgets', 1 );
	}
	if ( ! get_option( 'w3csspress_gutenberg_styles' ) ) {
		add_option( 'w3csspress_gutenberg_styles', 1 );
	}
	if ( ! get_option( 'w3csspress_fse' ) ) {
		add_option( 'w3csspress_fse', 1 );
	}
	if ( ! get_option( 'w3csspress_color_h1' ) ) {
		add_option( 'w3csspress_color_h1', '#3f51b5' );
	}
	if ( ! get_option( 'w3csspress_color_theme' ) ) {
		add_option( 'w3csspress_color_theme', 'grey' );
	}
	if ( ! get_option( 'w3csspress_color_theme_kind' ) ) {
		add_option( 'w3csspress_color_theme_kind', 'l3' );
	}
	if ( ! get_option( 'w3csspress_rounded_img' ) ) {
		add_option( 'w3csspress_rounded_img', 1 );
	}
	if ( ! get_option( 'w3csspress_cards_img' ) ) {
		add_option( 'w3csspress_cards_img', 1 );
	}
	if ( ! get_option( 'w3csspress_header_thumbnail' ) ) {
		add_option( 'w3csspress_header_thumbnail', 1 );
	}
	if ( ! get_option( 'w3csspress_post_thumbnail' ) ) {
		add_option( 'w3csspress_post_thumbnail', 1 );
	}
	if ( ! get_option( 'w3csspress_rounded_style' ) ) {
		add_option( 'w3csspress_rounded_style', 'w3-round-xxlarge' );
	}
}

add_action( 'upgrader_process_complete', __NAMESPACE__ . '\\w3csspress_upgrader_process_complete', 10, 2 );
/**
 * Fires to finish the w3csspress update.
 *
 * @since 2022.35
 *
 * @param WP_Upgrader $upgrader WP_Upgrader instance. In other contexts this might be a Theme_Upgrader, Plugin_Upgrader, Core_Upgrade, or Language_Pack_Upgrader instance.
 * @param array       $hook_extra Array of bulk item update data.
 */
function w3csspress_upgrader_process_complete( $upgrader, $hook_extra ) {
	if ( 'update' === $hook_extra['action'] && 'theme' === $hook_extra['type'] ) {
		foreach ( $hook_extra['themes'] as $theme ) {
			if ( 'w3csspress' === $theme ) {
				w3csspress_after_switch_theme();
			}
		}
	}
}
