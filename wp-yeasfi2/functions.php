<?php

/**
 * Wp-Yeasfi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wp-Yeasfi
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('wp_yeasfi_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wp_yeasfi_setup()
    {
        load_theme_textdomain('wp-yeasfi', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'wp-yeasfi'),
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
                'wp_yeasfi_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         * 		
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }

endif;
add_action('after_setup_theme', 'wp_yeasfi_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * 
 */
function wp_yeasfi_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_yeasfi_content_width', 640);
}

add_action('after_setup_theme', 'wp_yeasfi_content_width', 0);

/**
 * Register widget area.
 *
 */
function wp_yeasfi_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'wp-yeasfi'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'wp-yeasfi'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar( array(
    'name'          => 'Footer area one',
    'id'            => 'footer_area_one',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="footer-area footer-area-one">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar( array(
    'name'          => 'Footer area two',
    'id'            => 'footer_area_two',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="footer-area footer-area-two">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar( array(
    'name'          => 'Footer area three',
    'id'            => 'footer_area_three',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="footer-area footer-area-three">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
  register_sidebar( array(
    'name'          => 'Footer area four',
    'id'            => 'footer_area_four',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="footer-area footer-area-three">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
}

add_action('widgets_init', 'wp_yeasfi_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_yeasfi_scripts()
{
    wp_enqueue_style('wp-yeasfi-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
    //wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css');
    wp_enqueue_style('fontawesomeall', get_template_directory_uri() . '/css/all.min.css');


    wp_enqueue_script('wp-yeasfi-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('wp-yeasfi-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.js', array(), _S_VERSION, true);
    wp_enqueue_script('wp-yeasfi-custome', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'wp_yeasfi_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . 'jetpack.php';
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');


/**
 * Register Carbon Field
 */
require get_template_directory() . '/inc/carbon_fields.php';