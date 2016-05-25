<?php
/**
 * Goodmanson Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Goodmanson_Construction
 */

if ( ! function_exists( 'goodmanson_construction_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function goodmanson_construction_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Goodmanson Construction, use a find and replace
	 * to change 'goodmanson-construction' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'goodmanson-construction', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails', array('post', 'staff') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'left_of_logo' => esc_html__( 'Left of logo', 'goodmanson-construction' ),
		'right_of_logo' => esc_html__( 'Right of logo', 'goodmanson-construction' ),
		'mobile' => esc_html__( 'Mobile', 'goodmanson-construction' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'goodmanson_construction_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_image_size('gallery', 750, 500);
}
endif;
add_action( 'after_setup_theme', 'goodmanson_construction_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function goodmanson_construction_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'goodmanson_construction_content_width', 640 );
}
add_action( 'after_setup_theme', 'goodmanson_construction_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function goodmanson_construction_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'goodmanson-construction' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'goodmanson-construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'goodmanson_construction_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function goodmanson_construction_scripts() {
	wp_enqueue_style( 'goodmanson-construction-style', get_stylesheet_uri() );

	wp_enqueue_script( 'goodmanson-construction-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'goodmanson-construction-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'goodmanson_construction_scripts' );

// Register Custom Post Type
function testimonial_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonial', 'text_domain' ),
		'archives'              => __( 'Testimonial Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'search_items'          => __( 'Search Testimonials', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-smiley',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );

function create_testimonials_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Category' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'testimonials_category' ),
	);
	register_taxonomy( 'testimonials_category', array( 'testimonials' ), $args );

}
add_action( 'init', 'create_testimonials_taxonomies', 0 );

// Register Custom Post Type
function slider_post_type() {

	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'slider' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'slider' ),
		'menu_name'             => __( 'Sliders', 'slider' ),
		'name_admin_bar'        => __( 'Sliders', 'slider' ),
		'archives'              => __( 'Slider Archives', 'slider' ),
		'parent_item_colon'     => __( 'Parent Slider:', 'slider' ),
		'all_items'             => __( 'All Sliders', 'slider' ),
		'add_new_item'          => __( 'Add New Slider', 'slider' ),
		'add_new'               => __( 'Add New', 'slider' ),
		'new_item'              => __( 'New Slider', 'slider' ),
		'edit_item'             => __( 'Edit Slider', 'slider' ),
		'update_item'           => __( 'Update Slider', 'slider' ),
		'view_item'             => __( 'View Slider', 'slider' ),
		'search_items'          => __( 'Search Sliders', 'slider' ),
		'not_found'             => __( 'Not found', 'slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'slider' ),
		'featured_image'        => __( 'Featured Image', 'slider' ),
		'set_featured_image'    => __( 'Set featured image', 'slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'slider' ),
		'insert_into_item'      => __( 'Insert into slider', 'slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slider', 'slider' ),
		'items_list'            => __( 'Sliders list', 'slider' ),
		'items_list_navigation' => __( 'Sliders list navigation', 'slider' ),
		'filter_items_list'     => __( 'Filter sliders list', 'slider' ),
	);
	$args = array(
		'label'                 => __( 'Slider', 'slider' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'sliders', $args );

}
add_action( 'init', 'slider_post_type', 0 );

// Register Custom Post Type
function callout_post_type() {

	$labels = array(
		'name'                  => _x( 'Callouts', 'Post Type General Name', 'slider' ),
		'singular_name'         => _x( 'Callout', 'Post Type Singular Name', 'slider' ),
		'menu_name'             => __( 'Callouts', 'slider' ),
		'name_admin_bar'        => __( 'Callouts', 'slider' ),
		'archives'              => __( 'Callout Archives', 'slider' ),
		'parent_item_colon'     => __( 'Parent Callout:', 'slider' ),
		'all_items'             => __( 'All Callouts', 'slider' ),
		'add_new_item'          => __( 'Add New Callout', 'slider' ),
		'add_new'               => __( 'Add New', 'slider' ),
		'new_item'              => __( 'New Callout', 'slider' ),
		'edit_item'             => __( 'Edit Callout', 'slider' ),
		'update_item'           => __( 'Update Callout', 'slider' ),
		'view_item'             => __( 'View Callout', 'slider' ),
		'search_items'          => __( 'Search Callouts', 'slider' ),
		'not_found'             => __( 'Not found', 'slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'slider' ),
		'featured_image'        => __( 'Featured Image', 'slider' ),
		'set_featured_image'    => __( 'Set featured image', 'slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'slider' ),
		'insert_into_item'      => __( 'Insert into callout', 'slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this callout', 'slider' ),
		'items_list'            => __( 'Callouts list', 'slider' ),
		'items_list_navigation' => __( 'Callouts list navigation', 'slider' ),
		'filter_items_list'     => __( 'Filter callouts list', 'slider' ),
	);
	$args = array(
		'label'                 => __( 'Callout', 'slider' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-welcome-view-site',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'callouts', $args );

}
add_action( 'init', 'callout_post_type', 0 );


// Register Custom Post Type
function service_post_type() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Services', 'text_domain' ),
		'name_admin_bar'        => __( 'Service', 'text_domain' ),
		'archives'              => __( 'Service Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Service:', 'text_domain' ),
		'all_items'             => __( 'All Services', 'text_domain' ),
		'add_new_item'          => __( 'Add New Service', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Service', 'text_domain' ),
		'edit_item'             => __( 'Edit Service', 'text_domain' ),
		'update_item'           => __( 'Update Service', 'text_domain' ),
		'view_item'             => __( 'View Service', 'text_domain' ),
		'search_items'          => __( 'Search Service', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into service', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'text_domain' ),
		'items_list'            => __( 'Services list', 'text_domain' ),
		'items_list_navigation' => __( 'Services list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter services list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'service_post_type', 0 );


// Register Custom Post Type
function staff_post_type() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Staff Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Staff', 'text_domain' ),
		'name_admin_bar'        => __( 'Staff Member', 'text_domain' ),
		'archives'              => __( 'Staff Member Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Staff Member:', 'text_domain' ),
		'all_items'             => __( 'All Staff', 'text_domain' ),
		'add_new_item'          => __( 'Add New Staff Member', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Staff Member', 'text_domain' ),
		'edit_item'             => __( 'Edit Staff Member', 'text_domain' ),
		'update_item'           => __( 'Update Staff Member', 'text_domain' ),
		'view_item'             => __( 'View Staff Member', 'text_domain' ),
		'search_items'          => __( 'Search Staff', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Staff Member', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Staff Member', 'text_domain' ),
		'items_list'            => __( 'Staff list', 'text_domain' ),
		'items_list_navigation' => __( 'Staff list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Staff list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Staff Member', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'staff', $args );

}
add_action( 'init', 'staff_post_type', 0 );


if( function_exists('acf_add_options_page') ) {
	
	// add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'redirect' 		=> true,
		'position'		=> 24
	));
	
	
	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title' 	=> 'Footer',
		'parent_slug' 	=> $parent['menu_slug'],
	));

		// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Settings',
		'menu_title' 	=> 'Contact',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}

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

require get_template_directory() . '/inc/pagination.php';
