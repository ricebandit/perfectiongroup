<?php
/**
 * perfection functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package perfection
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function perfection_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on perfection, use a find and replace
		* to change 'perfection' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'perfection', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-navigation' => esc_html__( 'Primary', 'perfection' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'perfection_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'perfection_setup' );

/*
Page Class
*/
function add_page_slug_to_the_body( $classes ) {

	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '_' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_page_slug_to_the_body' );

/* 
ADD STYLE TYPE TO WYSIWYG LINK
*/
add_filter( 'tiny_mce_before_init', 'custom_mce_before_init' );
function custom_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' => 'Some Style',
            'selector' => 'a',
            'classes' => 'my-anchor-class',
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

/*
ADDITIONAL MENUS
*/

function register_menus(){
	register_nav_menu('secondary-navigation', __('Top Secondary'));
	register_nav_menu('footer-navigation', __('Footer Navigation'));


}

add_action( 'after_setup_theme', 'register_menus');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function perfection_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perfection_content_width', 640 );
}
add_action( 'after_setup_theme', 'perfection_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function perfection_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'perfection' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'perfection' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'perfection_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function perfection_scripts() {
	wp_enqueue_style( 'perfection-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'perfection-style-patches', get_template_directory_uri() . '/patch.css', array(), _S_VERSION );
	wp_enqueue_style( 'slickjs-style', get_template_directory_uri() . '/js/slick.css', array(), _S_VERSION );
	wp_style_add_data( 'perfection-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);

	wp_enqueue_script( 'perfection-index', get_template_directory_uri() . '/js/index.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'perfection-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'perfection_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
