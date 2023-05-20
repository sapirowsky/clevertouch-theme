<?php

function setup(){
    // Style with theme info
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style( 'stylesheet');

    // TailwindCSS
    wp_register_style('tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', '', 1, 'all');
    wp_enqueue_style( 'tailwind');

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
register_nav_menu( 'header-menu', __( 'Menu nagłówka', 'clevertouch-shop-theme' ) );


// Woocommerce support
function add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'add_woocommerce_support' );