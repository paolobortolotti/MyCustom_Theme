<?php
/**
 * supertheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package supertheme
 */

if ( ! function_exists( 'supertheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function supertheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on supertheme, use a find and replace
	 * to change 'supertheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'supertheme', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'supertheme' ),
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
	add_theme_support( 'custom-background', apply_filters( 'supertheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'supertheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function supertheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'supertheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'supertheme_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


/////// Custom solution
/**
 * File stili css e js.
 */
require get_template_directory() . '/inc/enqueue.php';
/**
 * Lista Cpt
 */
require get_template_directory() . '/inc/cpt.php';
/**
 * Setting
 */
require get_template_directory() . '/inc/setting.php';
/**
 * Plugin Suggeriti
 */
require get_template_directory() . '/inc/plug_suggest.php';

/**
 * Paginazione
 */
require get_template_directory() . '/inc/pagination.php';



////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once('inc/wp_bootstrap_navwalker.php');




////////////////////////////////////////////////////////////////////
// Registra Menu
////////////////////////////////////////////////////////////////////

function register_my_menus() {
  register_nav_menus(
    array(  
	    'Main_Menu' => __( 'Menu Principale', 'bortolotti' ),
    	'menu_personalizzato' => __( 'Menu personalizzato' )
    )
  );
  
} 
add_action( 'init', 'register_my_menus' );


////////////////////////////////////////////////////////////////////
// Registra Sidebar
////////////////////////////////////////////////////////////////////

 register_sidebar(
            array(
'name' => 'Sidebar Personalizzata',
'id' => 'Sidebar Personalizzata',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>',
        ));
 register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );       
        

////////////////////////////////////////////////////////////////////
// Adds RSS feed links to for posts and comments.
////////////////////////////////////////////////////////////////////

    add_theme_support( 'automatic-feed-links' );

?>