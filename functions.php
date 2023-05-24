<?php

function setup(){
    // Style with theme info
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style( 'stylesheet');

    // TailwindCSS
    wp_register_style('custom-css', get_template_directory_uri() . '/assets/css/custom-style.css', '', 1, 'all');
    wp_enqueue_style( 'custom-css');

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
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// Custom login / register pages
function custom_log_form(){
    if(is_user_logged_in()) return '<p>Jesteś zalogowany!</p>';
    ob_start();
    do_action( 'woocommerce_before_customer_login_form' );
    woocommerce_login_form([
        'redirect' => wc_get_page_permalink('myaccount')
    ]);
    return ob_get_clean();
}
function custom_reg_form(){
    if(is_user_logged_in()) return '<p>Jesteś zarejestrowany!</p>';
    ob_start();
   do_action( 'woocommerce_before_customer_login_form' );
   $html = wc_get_template_html( 'myaccount/form-login.php' );
   $dom = new DOMDocument();
   $dom->encoding = 'utf-8';
   $dom->loadHTML( utf8_decode( $html ) );
   $xpath = new DOMXPath( $dom );
   $form = $xpath->query( '//form[contains(@class,"register")]' );
   $form = $form->item( 0 );
   echo $dom->saveXML( $form );
   return ob_get_clean();
}
// add_shortcode( 'wc_custom_log_form', 'custom_log_form');
// add_shortcode( 'wc_custom_reg_form', 'custom_reg_form');
// add_action( 'template_redirect', 'redirect_login_registration_if_logged_in' );
// add_action( 'template_redirect', 'redirect_login_registration_if_not_logged_in' );
 
// function redirect_login_registration_if_logged_in() {
//     if ( is_page() && is_user_logged_in() && ( has_shortcode( get_the_content(), 'wc_custom_log_form' ) || has_shortcode( get_the_content(), 'wc_custom_reg_form' ) ) ) {
//         wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
//         exit;
//     }
// }
// function redirect_login_registration_if_not_logged_in() {
//     if ( is_page() && !is_user_logged_in() && (has_shortcode( get_the_content(), 'woocommerce_my_account' ))) {
//         wp_safe_redirect( wc_get_page_permalink( 'login' ) );
//         exit;
//     }
// }