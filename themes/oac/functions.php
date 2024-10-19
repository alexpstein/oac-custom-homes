<?php
/**
 * OAC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OAC
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '_theme_version' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oac_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on OAC, use a find and replace
		* to change 'oac' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'oac', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', '_themename' ),
			'menu-2' => esc_html__( 'Featured', '_themename' ),
			'menu-footer' => esc_html__( 'Footer', '_themename' ),
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
			'oac_custom_background_args',
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
add_action( 'after_setup_theme', 'oac_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oac_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oac_content_width', 640 );
}
add_action( 'after_setup_theme', 'oac_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oac_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'oac' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'oac' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'oac_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oac_scripts() {
	wp_enqueue_style( '_themename-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( '_themename-style-main', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );

	wp_style_add_data( '_themename-style', 'rtl', 'replace' );

	wp_enqueue_script( '_themename-vendor', get_template_directory_uri() . '/dist/js/vendor.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( '_themename-main', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oac_scripts' );

// Login styles
function _themename_login_stylesheet() {
    wp_enqueue_style( '_themename-login', get_stylesheet_directory_uri() . '/dist/css/style-login.css', array(), _S_VERSION );
}

add_action( 'login_enqueue_scripts', '_themename_login_stylesheet' );

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
 * Custom menu walkers
 */
require get_template_directory() . '/inc/custom-navigation.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Disable comments
 */
require get_template_directory() . '/inc/disable-comments.php';

/**
 * Add ACF Options Pages
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> __( 'Theme General Settings', '_themename' ),
		'menu_title'	=> __( 'Site Settings', '_themename' ),
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> __( 'Theme Footer Settings', '_themename' ),
		'menu_title'	=> __( 'Footer Settings', '_themename' ),
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Add Post Type to posts in admin columns
 */
function _themename_custom_post_columns($columns) {
	unset( $columns['title'] );
	unset( $columns['author'] );
	unset( $columns['categories'] );
	unset( $columns['tags'] );
	unset( $columns['date'] );
	unset( $columns['post_type'] );

	return array_merge( $columns, array(
		'title' => __( 'Title', '_themename' ),
		'author' => __( 'Author', '_themename' ),
		'post_type' => __( 'Post Type', '_themename' ),
		'categories' => __( 'Categories', '_themename' ),
		'tags' => __( 'Tags', '_themename' ),
		'date' => __( 'Date', '_themename' )
	));
}

add_filter( 'manage_post_posts_columns', '_themename_custom_post_columns' );

function _themename_posts_posttype_column( $column, $post_id ) {
	switch ($column) {
		case 'post_type' :
			echo get_post_meta( $post_id, 'post_type', 	true );
			break;
	}
}

add_action( 'manage_post_posts_custom_column', '_themename_posts_posttype_column', 10, 2 );

/**
 * Disable tabindex on Gravity Forms
 */
add_filter( 'gform_tabindex', '__return_false' );

/**
 * Wrap video embeds in Bootstrap 5 responsive classes
 */
function _themename_wrap_oembed_dataparse( $return, $data, $url ) {
	$mod = '';
	$style = '';

	if ( ( $data->type == 'video' ) && ( isset( $data->width ) ) && ( isset( $data->height ) ) ) :
		
		$calc = round( $data->height/$data->width, 2 );

		if ( $calc == round( 3/4, 2 ) ) {
			$mod = 'ratio-4x3';
		} elseif ( $calc == round( 9/16, 2 ) ) {
			$mod = 'ratio-16x9';
		} elseif ( $calc == round( 9/21, 2 ) ) {
			$mod = 'ratio-21x9';
		} elseif ( $calc == round( 1/1, 2 ) ) {
			$mod = 'ratio-1x1';
		} else {
			$size = $calc * 100;
			$style = ' style="--bs-aspect-ratio: ' . $size . '%;"';
		}

		return '<div class="ratio ' . $mod . '"' . $style . '>' . $return . '</div>';
	endif;
}

add_filter( 'oembed_dataparse', '_themename_wrap_oembed_dataparse', 99, 4 );

/**
 * Custom TinyMCE styles
 */
function _themename_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}

add_filter( 'mce_buttons_2', '_themename_mce_buttons_2' );

function _themename_mce_before_init_insert_formats( $init_array ) {
	$style_formats = array(
		array(
			'title' => 'Button',
			'selector' => 'a',
			'classes' => 'btn',
			'wrapper' => false
		)
	);
	
	$init_array['style_formats'] = wp_json_encode( $style_formats );
	
	return $init_array;

} 

add_filter( 'tiny_mce_before_init', '_themename_mce_before_init_insert_formats' );

/**
 * Register an editor stylesheet for the theme
 */
function _themename_add_editor_styles() {
    add_editor_style( $stylesheet = 'dist/css/editor-style.css' );
}

add_action( 'admin_init', '_themename_add_editor_styles' );

/**
 * Disable arbitrary origin in REST API
 */
add_action( 'rest_api_init', '_themename_disable_arbitrary_origin_rest', 20 );
function _themename_disable_arbitrary_origin_rest() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
}