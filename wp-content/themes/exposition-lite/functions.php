<?php
/**
 * exposition functions and definitions
 *
 * @package exposition
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
	$content_width = 555; /* pixels */
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exposition_setup()
{

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on exposition, use a find and replace
	 * to change 'exposition' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'exposition', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'exposition' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Allow plugins to change document title
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'exposition-post-full' );
	add_image_size( 'exposition-post-page', 1200, 540, true );
	add_image_size( 'exposition-post-thumb', 225, 158, true );
}
// exposition_setup
add_action( 'after_setup_theme', 'exposition_setup' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis) and sets character length to 35
 */
function exposition_custom_wp_trim_excerpt( $text )
{
	$raw_excerpt = $text;
	if ( '' == $text ) {
		//Retrieve the post content.
		$text = get_the_content( '' );
		$text = strip_shortcodes( $text );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]>', $text );

		// the code below sets the excerpt length to 55 words. You can adjust this number for your own blog.
		$excerpt_length = apply_filters( 'excerpt_length', 120 );

		// the code below sets what appears at the end of the excerpt, in this case ...
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . '...' );

		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = force_balance_tags( $text );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}

	}

	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'exposition_custom_wp_trim_excerpt' );


// Style the Tag Cloud
function exposition_custom_tag_cloud_widget( $args )
{
	$args['largest'] = 14; //largest tag
	$args['smallest'] = 14; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['number'] = '8'; //number of tags
	return $args;
}

add_filter( 'widget_tag_cloud_args', 'exposition_custom_tag_cloud_widget' );
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function exposition_widgets_init()
{

	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'exposition-sidebar-footer-1',
		'before_widget' => '<div class="footerwidget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footertitle">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'exposition_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function exposition_scripts()
{
	wp_enqueue_style( 'exposition-style', get_stylesheet_uri() );
	wp_enqueue_style( 'exposition-default-style', get_stylesheet_directory_uri() . '/inc/css/defaults.css', array(), '1', 'all' );
	wp_enqueue_style( 'exposition-widgets-style', get_stylesheet_directory_uri() . '/inc/css/widgets.css', array(), '1', 'all' );
	wp_enqueue_style( 'exposition-jpanel-style', get_stylesheet_directory_uri() . '/inc/jpanel/css/style.css', array(), '3', 'all' );
	wp_enqueue_script( 'exposition-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'exposition-jpanel-menu', get_template_directory_uri() . '/inc/jpanel/js/lib/jquery.jpanelmenu.min.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'exposition-jpanel-menu-init', get_template_directory_uri() . '/inc/jpanel/js/script.js', array( 'jquery' ), '20120206', true );
	//wp_enqueue_script( 'jpanel-menu-init', get_template_directory_uri() . '/js/jpanel-init.js', array(), '20120206', true );
	wp_register_style( 'exposition-googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:700,300,400', array(), false, 'all' );
	wp_enqueue_style( 'exposition-googleFonts' );
	wp_enqueue_script( 'exposition-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_style( 'exposition-font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.css', 'style' );

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'themefurnace-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'exposition_scripts' );

// Numbered Pagination
function exposition_pagination()
{
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total'   => $wp_query->max_num_pages
	) );
}

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function themefurnace_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	}
	add_action( 'wp_head', 'themefurnace_render_title' );
}



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/themesetup.php';
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
