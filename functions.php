<?php
/**
 * lorainccc functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lorainccc
 */

if ( ! function_exists( 'lorainccc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lorainccc_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lorainccc, use a find and replace
	 * to change 'lorainccc' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lorainccc', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'lccc-framework' ),
		'left-nav' => esc_html__( 'Left Nav', 'lorainccc' ),
		'footer-quicklinks-nav' => esc_html__( 'Footer Quicklinks', 'lorainccc' ),
		'footer-campus-location-nav' => esc_html__( 'Footer Campus Locations', 'lorainccc' ),
		'mobile-primary' => esc_html__( 'Mobile Primary Menu', 'lorainccc_subsite' ),
		'header-shortcuts' => esc_html__( 'Header Shortcuts Menu', 'lorainccc' ),
        'mobile-header-shortcuts' => esc_html__( 'Mobile Header Shortcuts Menu', 'lorainccc' ),
		'stocker-primary' => esc_html__( 'Stocker Menu', 'lorainccc' ),
		'stocker-mobile-primary' => esc_html__( 'Mobile Primary Menu', 'lorainccc' ),
		'stocker-left-nav' => esc_html__( 'Stocker Left Nav', 'lorainccc' ),
		'about-menu' => esc_html__( 'About Menu', 'lorainccc' ),
		'visual-art-menu' => esc_html__( 'Visual Art Menu', 'lorainccc' ),
		'stocker-footer-quicklinks-menu' => esc_html__( 'Stocker Footer Quicklinks Menu', 'lorainccc' ),
		'stocker-header-shortcuts-menu' => esc_html__('Stocker Header Shortcuts Menu', 'lorainccc')		
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
	add_theme_support( 'custom-background', apply_filters( 'lorainccc_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lorainccc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lorainccc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lorainccc_content_width', 640 );
}
add_action( 'after_setup_theme', 'lorainccc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lorainccc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lorainccc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );		
			register_sidebar( array(
		'name'          => esc_html__( 'Badges Sidebar', 'lorainccc' ),
		'id'            => 'badges-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sponsor Sidebar', 'lorainccc' ),
		'id'            => 'sponsor-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'LCCC Events Sidebar', 'lorainccc' ),
		'id'            => 'lccc-events-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
					register_sidebar( array(
		'name'          => esc_html__( 'Stocker Page Events Sidebar', 'lorainccc' ),
		'id'            => 'stocker-page-events-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
		
		register_sidebar( array(
		'name'          => esc_html__( 'Stocker Slider Sidebar', 'lorainccc' ),
		'id'            => 'stocker-slider-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
				register_sidebar( array(
		'name'          => esc_html__( 'LCCC Announcements Sidebar', 'lorainccc' ),
		'id'            => 'lccc-announcements-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
 	register_sidebar( array(
		'name'          => esc_html__( 'LCCC Search Sidebar', 'lorainccc' ),
		'id'            => 'lccc-search-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lorainccc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lorainccc_foundation_scripts() {
  // Add Genericons, used in the main stylesheet.
	 wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	 wp_enqueue_style( 'foundation-app',  get_template_directory_uri() . '/foundation/css/app.css' );
		wp_enqueue_style( 'foundation-normalize', get_template_directory_uri() . '/foundation/css/normalize.css' );
		wp_enqueue_style( 'foundation',  get_template_directory_uri() . '/foundation/css/foundation.css' );

		wp_enqueue_script( 'lc-mobile-nav-js', get_stylesheet_directory_uri() . '/js/mobile-nav.js', array( 'jquery' ), '1', true );

		wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/js/vendor/foundation.js', array( 'jquery' ), '1', true );
		wp_enqueue_script( 'foundation-whatinput', get_template_directory_uri() . '/foundation/js/vendor/what-input.js', array( 'jquery' ), '1', true);

		wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation.js', array( 'jquery' ), '1', true );

		wp_enqueue_script( 'lorainccc-function-script', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
		wp_enqueue_script( 'lc_menu-cleanup-script', get_stylesheet_directory_uri() . '/js/menu-cleanup.js', array( 'jquery' ), '20190329', true );
	//Adds Google Analytics, Google Tag, Hotjar and Eloqua to header
	wp_enqueue_script( 'lc-eloqua-scripts', get_stylesheet_directory_uri() . '/js/lc-eloqua.js', array(), '20180828', false);
	wp_enqueue_script( 'lc-google-analytics-scripts', get_stylesheet_directory_uri() . '/js/lc-google-analytics.js', array(), '20180828', false);
	wp_enqueue_script( 'lc-google-tag-scripts', get_stylesheet_directory_uri() . '/js/lc-google-tag.js', array(), '20180828', false);
	wp_enqueue_script( 'lc-hotjar-scripts', get_stylesheet_directory_uri() . '/js/lc-hotjar.js', array(), '20180828', false);
	wp_enqueue_script( 'lc-siteimprove-scripts', get_stylesheet_directory_uri() . '/js/lc-siteimprove.js', array(), '20180828', false);
	
		wp_enqueue_script( 'lc-spektrix-iframe-script', 'https://ticketing.lorainccc.edu/stockerartscenter/website/scripts/integrate.js', array(), '20210315', false);
		wp_localize_script( 'lorainccc-function-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
	
}
add_action( 'wp_enqueue_scripts', 'lorainccc_foundation_scripts' );

/**
 * Enqueue google fonts.
 */
function add_google_fonts() {
wp_enqueue_style( 'open-sans-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&dispay=swap', false );
wp_enqueue_style( 'raleway-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,700&dispay=swap', false );

}

add_action( 'wp_enqueue_scripts', 'add_google_fonts' );



function lorainccc_scripts() {

	wp_enqueue_style( 'lorainccc-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lorainccc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';

/* Menu Functions */

class lc_top_bar_menu_walker extends Walker_Nav_Menu
{
	/*
	 * Add vertical menu class and submenu data attribute to sub menus
	 */

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
	}
}

//Optional fallback
function lc_topbar_menu_fallback($args)
{
	/*
	 * Instantiate new Page Walker class instead of applying a filter to the
	 * "wp_page_menu" function in the event there are multiple active menus in theme.
	 */

	$walker_page = new Walker_Page();
	$fallback = $walker_page->walk(get_pages(), 0);
	$fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);

	echo '<ul class="dropdown menu" data-dropdown-menu">'.$fallback.'</ul>';
}

class lc_drill_menu_walker extends Walker_Nav_Menu
{
	/*
	 * Add vertical menu class
	 */
	 
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}
 
function lc_drill_menu_fallback($args)
{
	/*
	 * Instantiate new Page Walker class instead of applying a filter to the
	 * "wp_page_menu" function in the event there are multiple active menus in theme.
	 */
	 
	$walker_page = new Walker_Page();
	$fallback = $walker_page->walk(get_pages(), 0);
	$fallback = str_replace("children", "children vertical menu", $fallback);
	echo '<ul class="vertical menu" data-drilldown="">'.$fallback.'</ul>';
}

/* End Menu Functions */
// CHANGE PAGINATION
function paginate() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => true,
        'type' => 'plain'
    );
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
}


// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
 
function custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'lccc_event')
    return 40;
    else if ($post->post_type == 'lccc_announcement')
    return 40;
    else
    return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//Edit Default Author Role
	
$role = get_role('editor');
$role->remove_cap('publish_posts');
$role->remove_cap('publish_pages');


?>