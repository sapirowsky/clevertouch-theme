<?php

// Add css
function load_stylesheets(){
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style( 'stylesheet');
    wp_register_style('tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', '', 1, 'all');
    wp_enqueue_style( 'tailwind');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets');

// Add js 
function load_javascript(){
    wp_register_script('custom', get_template_directory_uri() . '/assets/js/app.js', '', 1, true);
    wp_enqueue_script('custom');
}
add_action( 'wp_enqueue_scripts', 'load_javascript');

// Add menus
add_theme_support( 'menus' );

// Register menus

register_nav_menu( 'header-menu', __( 'Header Menu', 'CleverTouch Shop Theme' ) );


// Woocommerce support
function add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'add_woocommerce_support' );