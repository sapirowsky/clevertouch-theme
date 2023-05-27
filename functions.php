<?php

function setup(){
    // Style with theme info
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style( 'stylesheet');

    // TailwindCSS
    // wp_register_style('custom-css', get_template_directory_uri() . '/assets/css/custom-style.css', '', 1, 'all');
    // wp_enqueue_style( 'custom-css');

    // Custom js
    wp_register_script('custom', get_template_directory_uri() . '/assets/js/app.js', '', 1, true);
    wp_enqueue_script('custom');
}
add_action( 'wp_enqueue_scripts', 'setup');


// Theme support
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'menus' );


// Filter jpg => webp
function map_jpeg_to_webp( $formats ) {
	$formats[ 'image/jpeg' ] = 'image/webp';
	return $formats;
};
add_filter( 'image_editor_output_format', 'map_jpeg_to_webp' );

// Register menus
register_nav_menu( 'header-menu', __( 'Menu nagłówka', 'clevertouch-shop' ) );

// Woocommerce support
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

 if ( class_exists( 'woocommerce' ) ) {

      function wp_wc_my_account_shortcode_handler( $atts ) {

        $whichClass = new WC_Shortcodes();
        $wrapper = array(
          'class'  => 'woocommerce my-account-custom',
          'before' => null,
          'after'  => null
        );

        return $whichClass->shortcode_wrapper( array( 'WC_Shortcode_My_Account', 'output' ), $atts , $wrapper );

      }

      add_shortcode( 'new_woocommerce_my_account', 'wp_wc_my_account_shortcode_handler' );
    } 




// if ( function_exists('register_sidebar') ) {
//   register_sidebar([
//     'name' => "woo sidebar",
//     'id' => 'woocommerce_sidebar',
//   'before_widget' => '', 
//   'after_widget' => '', 
//   'before_title' => '<h4>', 
//   'after_title' => '</h4>', 
//   ]);
// }


// function arphabet_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => 'WooCommerce Sidebar',
// 		'id'            => 'woocommerce_sidebar',
// 		'before_widget' => '<div>',
// 		'after_widget'  => '</div>',
// 		'before_title'  => '<h4>',
// 		'after_title'   => '</h4>',
// 	) );
// }
// add_action( 'widgets_init', 'arphabet_widgets_init' );

// /* Tom's code */
// add_action( 'wp', function() {
//     remove_action( 'woocommerce_sidebar', 'generate_construct_sidebars' );

//     add_action( 'woocommerce_sidebar', function() {
//         get_sidebar( 'woocommerce' );
//     } );
// } );
function my_theme_register_woocommerce_sidebar() {
    register_sidebar( array(
        'name' => 'WooCommerce Sidebar',
        'id' => 'woocommerce_sidebar',
        'description' => 'Sidebar for WooCommerce pages',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'my_theme_register_woocommerce_sidebar' );
// Disable Woocommerce css

// add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// function woocommerce_filter_sidebar() {
//     register_sidebar( array(
//         'name'          => __( 'WooCommerce Filters', 'your-theme-textdomain' ),
//         'id'            => 'woocommerce-filters',
//         'description'   => __( 'Add widgets here to display filters for WooCommerce products.', 'your-theme-textdomain' ),
//         'before_widget' => '<div id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h3 class="widget-title">',
//         'after_title'   => '</h3>',
//     ) );
// }
// add_action( 'widgets_init', 'woocommerce_filter_sidebar' );

function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter', 20 );

// function wcc_change_breadcrumb_home_text( $defaults ) {
//     // Change the breadcrumb home text from 'Home' to 'Apartment'
// 	$defaults['home'] = 'Sklep';
// 	return $defaults;
// }

// add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text', 20 );


//  add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
 /*Change the breadcrumb home link URL from / to /shop.
 @return string New URL for Home link item. */
//  function woo_custom_breadrumb_home_url() { return '/sklep/'; } 
