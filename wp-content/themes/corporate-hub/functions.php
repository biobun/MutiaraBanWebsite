<?php
/**
 * Corporate Hub functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Corporate_Hub
 */

if ( ! function_exists( 'corporate_hub_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function corporate_hub_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Corporate Hub, use a find and replace
	 * to change 'corporate-hub' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'corporate-hub');

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
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
	   'header-text' => array( 'site-title', 'site-description' ),
	) );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'corporate-hub-slider-image', 2100, 1400, true );
	add_image_size( 'corporate-hub-tab-image', 1200, 780, true );
	add_image_size( 'corporate-hub-potrait', 600, 900, true ); //down about
	add_image_size( 'corporate-hub-medium-e', 600, 600, true );
	add_image_size( 'corporate-hub-medium', 400, 460, true ); //blog,team
	add_image_size( 'corporate-hub-header-image', 1400, 380, true ); //blog,team


	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'corporate_hub_custom_header_args', array(
			'width'         => 1400,
			'height'        => 380,
			'flex-height'   => true,
			'header-text'   => false,
	) ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'corporate-hub' ),
		'social'   => esc_html__( 'Social Menu', 'corporate-hub' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'corporate_hub_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Load Init for Hook files.
	 */
	require get_template_directory() . '/inc/hooks/hooks-init.php';

	global $corporate_hub_default_options;
	$corporate_hub_default_options = corporate_hub_get_default_theme_options();
}
endif;
add_action( 'after_setup_theme', 'corporate_hub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corporate_hub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corporate_hub_content_width', 640 );
}
add_action( 'after_setup_theme', 'corporate_hub_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function corporate_hub_scripts() {
	wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/libraries/owlcarousel/css/owl.carousel.css');
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/libraries/ionicons/css/ionicons.min.css');
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/libraries/magnific-popup/css/magnific-popup.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/libraries/wow-js/lib/animate.min.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/libraries/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('vertical', get_template_directory_uri() . '/assets/libraries/vertical/vertical.css');
	wp_enqueue_style('corporate-hub-slider', get_template_directory_uri() . '/assets/twp/css/slider.css');
	wp_enqueue_style( 'corporate-hub-style', get_stylesheet_uri() );

	$fonts_url = corporate_hub_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'corporate-hub-google-fonts', $fonts_url, array(), null );
	}
	wp_enqueue_script( 'corporate-hub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'corporate-hub-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/libraries/owlcarousel/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/libraries/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/libraries/wow-js/js/wow.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-match-height', get_template_directory_uri() . '/assets/libraries/jquery-match-height/js/jquery.matchHeight-min.js', array('jquery'), '', true);
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/libraries/magnific-popup/js/jquery.magnific-popup.min.js', array('jquery'), '', true);

	wp_enqueue_script('corporate-hub-script', get_template_directory_uri() . '/assets/twp/js/custom-script.js', array('jquery'), '', 1);
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'corporate_hub_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';