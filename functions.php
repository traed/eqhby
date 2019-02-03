<?php
/**
 * eqhby functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eqhby
 */

namespace eqhby;

class Theme {
	const VERSION = '1.0.0';
	const SLUG = 'eqhby';
	const CONTENT_WIDTH = 640;
	const DEV = true;

	public function __construct() {
		add_action('after_setup_theme', array($this, 'setup'));
		add_action('after_setup_theme', array($this, 'content_width'), 0);
		add_action('after_setup_theme', array($this, 'custom_image_sizes'));
		add_action('widgets_init', array($this, 'widgets'));
		add_action('wp_enqueue_scripts', array($this, 'assets'));

		add_filter('show_admin_bar', '__return_false');

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
	}

	public function setup() {
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
			'primary' => 'Huvudmeny',
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

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
	}

	
	public function content_width() {
		$GLOBALS['content_width'] = apply_filters('webbmaffian_content_width', self::CONTENT_WIDTH);
	}


	public function custom_image_sizes() {
		// add_image_size( 'my_image_size', 100, 75, true);
	}


	public function widgets() {
		// register_sidebar(array(
		// 	'name'          => esc_html__( 'Sidebar', 'webbmaffian-theme' ),
		// 	'id'            => 'sidebar-1',
		// 	'description'   => esc_html__( 'Add widgets here.', 'webbmaffian-theme' ),
		// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
		// 	'after_widget'  => '</section>',
		// 	'before_title'  => '<h2 class="widget-title">',
		// 	'after_title'   => '</h2>',
		// ));
		
		// register_widget(__NAMESPACE__ . '\<Widget Name>');
	}


	public function assets() {
		if(!is_admin()) {
			wp_dequeue_script('jquery');
			wp_enqueue_script(self::SLUG . '-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.3.1', false);

			if(self::DEV) {
				wp_enqueue_script(self::SLUG . '-materialize-js', get_template_directory_uri() . '/assets/js/materialize.js', array(), self::VERSION, true);
			} else {
				wp_enqueue_script(self::SLUG . '-materialize-js', get_template_directory_uri() . '/assets/js/materialize.min.js', array(), self::VERSION, true);
			}

			wp_enqueue_style(self::SLUG . '-frontend-css', get_template_directory_uri() . '/assets/css/style.css', array(), self::VERSION);
			wp_enqueue_script(self::SLUG . '-frontend-js', get_template_directory_uri() . '/assets/js/frontend.js', array(), self::VERSION, true);
		}
	}

	public function get_url($path = '') {
		$path = trim($path, '/ ');

		return get_template_directory_uri() . '/' . $path;
	}
}

new Theme();
