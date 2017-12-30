<?php
/**
 * tSGtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tSGtheme
 */

	// FB OPENGRAPH METADATA
	add_filter('language_attributes', 'add_opengraph_doctype');
	add_action('wp_head', 'insertwinLive');
	add_action('wp_head', 'insertAdsense');
	add_action('wp_head', 'insertVig');
	add_action('wp_head', 'insert_fb_in_head', 5 );
	
	function insertAdsense() {
		echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "ca-pub-4943462589133750",enable_page_level_ads: true  });</script>';
	}
	function insertwinLive() {
		$url = bloginfo('name');
		$picpath = '/home/trendyp4/public_html/timg/live/';
		echo '<meta name="application-name" content="' . $url . '"/><meta name="msapplication-square70x70logo" content="' . $picpath . 'small.jpg"/>
		<meta name="msapplication-square150x150logo" content="' . $picpath . 'medium.jpg"/><meta name="msapplication-wide310x150logo" content="' . $picpath . 'wide.jpg"/>
		<meta name="msapplication-square310x310logo" content="' . $picpath . 'large.jpg"/><meta name="msapplication-TileColor" content="#ffffff"/><meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed='
			 . $url . '/feed&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=5; cycle=1"/>';
	  }
	function insertVig() {
		echo "<script>var vglnk = { key: 'db8e8b461e1b6dcc640b00494a7a95e9' }; (function(d, t) {	var s = d.createElement(t); s.type = 'text/javascript'; s.async = true;
		s.src = '//cdn.viglink.com/api/vglnk.js';var r = d.getElementsByTagName(t)[0]; r.parentNode.insertBefore(s, r); }(document, 'script'));</script>";
	  }

function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
//Lets add Open Graph Meta Info
function insert_fb_in_head() {
global $post;
if ( !is_singular()) //if it is not a post or a page
	return;
	echo '<meta property="fb:admins" content="768009383"/>';
	echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:site_name" content="' . bloginfo('name') . '"/>';
if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
	$default_image=bloginfo('home') ."/live/large.jpg"; //replace this with a default image on your server or an image in your media library
	echo '<meta property="og:image" content="' . $default_image . '"/>';
}
else{
	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
}
echo "";
}


// Async load?
add_action( 'wp_enqueue_scripts', 'ikreativ_theme_scripts');
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );
	function ikreativ_async_scripts($url)
	{
		if ( strpos( $url, '#asyncload') === false )
			return $url;
		else if ( is_admin() )
			return str_replace( '#asyncload', '', $url );
		else
		return str_replace( '#asyncload', '', $url )."' async='async"; 
		}
	// Enqueue scripts
	function ikreativ_theme_scripts()
	{
		// wp_enqueue_script() syntax, $handle, $src, $deps, $version, $in_footer(boolean)
		wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.min.js#asyncload', 'jquery', '', true );
		wp_enqueue_script( 'application', get_template_directory_uri() . '/assets/js/application.min.js#asyncload', 'jquery', '', true );
	}







if ( ! function_exists( 'tsg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */








	function tsg_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tSGtheme, use a find and replace
		 * to change 'tsg' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tsg', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support('menus');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'tsg' ),
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
		add_theme_support( 'custom-background', apply_filters( 'tsg_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tsg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tsg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tsg_content_width', 640 );
}
add_action( 'after_setup_theme', 'tsg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tsg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tsg' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tsg' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tsg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tsg_scripts() {
	wp_enqueue_style( 'tsg-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tsg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tsg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tsg_scripts' );

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


/**
 * Load THE V1 OPTIMISE FEEDLY OPTIMISATION ...
 */
require get_template_directory() . '/v1/v1.php';

