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


function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter', 20 );



// Update cart
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_cart_count');
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_cart_items');
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_cart_buttons');
function wc_refresh_cart_count($fragments){
  ob_start();
  $items_count = WC()->cart->get_cart_contents_count();
  ?>
  <span class="items-count">
      <?php echo $items_count ? $items_count : 0 ?>
  </span>
  <?php
    $fragments['.items-count'] = ob_get_clean();
    return $fragments;
}
function wc_refresh_cart_items($fragments){
  ob_start();
  $isCartEmpty = WC()->cart->is_empty();
  ?>
   <div class="cart-items">
      <?php if(WC()->cart->is_empty()): ?>
          <div class="cart-item">
              <p>Nie masz jeszcze nic w koszyku!</p>
          </div>
      <?php else: ?>
          <?php
            $cartItems = WC()->cart->get_cart();
            foreach($cartItems as $cart_item_key => $cart_item):?>
              <?php $product = $cart_item['data'] ?>
              <a href="<?php echo $product->get_permalink( $cart_item ); ?>" class="cart-item">

                <?php echo $product->get_image() ?>
                  <div>
                      <span>
                          <?php echo $product->get_name() ?>
                      </span>
                      <?php echo  WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] ) ?>
                  </div>
              </a>
          <?php endforeach ?>
      <?php endif; ?>
  </div>
  <?php
    $fragments['.cart-items'] = ob_get_clean();
    return $fragments;
}
function wc_refresh_cart_buttons($fragments){
  ob_start();
  ?>
   <div class="cart-footer">
        <?php if(WC()->cart->is_empty()): ?>
            <label for="cart-checkbox">
                <span>Przeglądaj dalej</span>
            </label>
        <?php else: ?>
            <div class="cart-buttons">
                <a href="<?php echo wc_get_cart_url() ?>">Koszyk</a>
                <a href="<?php echo wc_get_checkout_url() ?>">Zapłać</a>
            </div>
        <?php endif; ?>
    </div>
  <?php
    $fragments['.cart-footer'] = ob_get_clean();
    return $fragments;
}