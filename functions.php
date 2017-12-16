<?php

/**
 * cosparell functions and definitions
 *
 * @package cosparell
 */



/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );


/**
 * Required: set 'cosparell_theme_mode' filter to true.
 */
add_filter( 'cosparell_theme_mode', '__return_true' ); 
add_filter( 'cosparell_show_pages', '__return_false' );//comment out this code to bring back Option tree settings
require( trailingslashit( get_template_directory() ) . 'option-tree/includes/theme-options.php' );



if ( ! function_exists( 'cosparell_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cosparell_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cosparell, use a find and replace
	 * to change 'cosparell' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cosparell', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//FOR FEATURED IMAGE
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cosparell' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cosparell_custom_background_args', array(
		'default-color' => 'e6e7e9',
		'default-image' => '',
	) ) );
	//registering image size of side-thumb
	
	add_image_size( 'cosparell-side-thumb',74,74 );
	
}
endif; // cosparell_setup
add_action( 'after_setup_theme', 'cosparell_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cosparell_widgets_init() {
	//To register sidebar widgets
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cosparell' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	//To register footer widgets
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'cosparell' ),
		'id'            => 'footer-widgets',
		'description'   => __('I will show at the footer', 'cosparell'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'cosparell_widgets_init' );

//Function to increase the font-size of Tag Widget
add_filter('widget_tag_cloud_args','cosparell_set_tag_cloud_sizes');
function cosparell_set_tag_cloud_sizes($args)
{
	$args['smallest'] = 12;
	$args['largest'] = 19;

	return $args; 
}

/**
 * As per new instruction 
 * @link(  https://wordpress.slack.com/archives/themereview/p1427997201001885, link)
 */
function cosparell_filter_options_id() {
  return 'cosparell_option_tree';
}
add_filter( 'ot_options_id', 'cosparell_filter_options_id' );

/**
 * Load my custom functions
 */
require get_template_directory() . '/custom_functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load recent post file
 */
require get_template_directory() .'/inc/recent-posts.php';


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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



