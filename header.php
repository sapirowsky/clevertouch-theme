<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nasza wizja polega na pielęgnowaniu ludzkiego ducha za pomocą technologii, aby zainspirować pokolenie bez żadnych ograniczeń. Specjalistyczne ekrany interaktywne, tablice i wyświetlacze.">
    <?php wp_head() ?>
</head>
<body <?php body_class('flex flex-col items-center') ?> >

<header class="flex justify-center shadow shadow-gray-300 w-full">
    <div class="container px-2 py-4 flex relative justify-between items-center">
        <a href="<?php echo home_url() ?>" class="h-8 max-w-[130px] sm:h-10 sm:max-w-[163px] md:h-14 md:max-w-[228px] flex-shrink-0">
            <?php if ( has_custom_logo() ): ?>
                <?php $image = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full') ?>
                <img src="<?php echo $image[0] ?>" class="h-full w-full" alt="CleverTouch logo">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri() . "/assets/img/clevertouch-logo.webp" ?>" class="h-full w-full" alt="CleverTouch logo">
            <?php endif ?>
        </a>
        <button class="hamburger-menu text-gray-400" aria-controls="primary-navigation" aria-expanded="false"><span class="sr-only">Menu</span></button>
        <nav class="nav-menu transition-all duration-1000" id="primary-navigation">
            <?php 
                wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'menu_class' => 'flex flex-col sm:flex-row gap-4',
                ])
            ?>
         
           <div class="flex gap-2 ">
               <div class="cart-container">
                    <a class="flex items-end" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Mój koszyk', 'clevertouch-shop-theme' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.413-.588T4 20V8q0-.825.588-1.413T6 6h2q0-1.65 1.175-2.825T12 2q1.65 0 2.825 1.175T16 6h2q.825 0 1.413.588T20 8v12q0 .825-.588 1.413T18 22H6Zm0-2h12V8h-2v2q0 .425-.288.713T15 11q-.425 0-.713-.288T14 10V8h-4v2q0 .425-.288.713T9 11q-.425 0-.713-.288T8 10V8H6v12Zm4-14h4q0-.825-.588-1.413T12 4q-.825 0-1.413.588T10 6ZM6 20V8v12Z"/></svg>
                    </a>
                    <!-- <div class="cart-preview">
                        dsad    
                    <ul>
                        <?php 
                            if(!WC()->cart->is_empty()){
                                echo "Masz ". WC()->cart->get_cart_contents_count() . " produkt w koszyku";
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    echo "<li><a href='" . $cart_item['data']->get_permalink( $cart_item ) . "'>";
                                    echo $cart_item['data']->name;
                                    $product = $cart_item['data'];
                                    $product_id = $cart_item['product_id'];
                                    $variation_id = $cart_item['variation_id'];
                                    $quantity = $cart_item['quantity'];
                                    $price = WC()->cart->get_product_price( $product );
                                    $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                                    $link = $product->get_permalink( $cart_item );
                                    // Anything related to $product, check $product tutorial
                                    $attributes = $product->get_attributes();
                                    $whatever_attribute = $product->get_attribute( 'whatever' );
                                    $whatever_attribute_tax = $product->get_attribute( 'pa_whatever' );
                                    // $any_attribute = $cart_item['variation']['attribute_whatever'];
                                    $meta = wc_get_formatted_cart_item_data( $cart_item );
                                    echo "</a></li>";
                                }
                            }else{?>
                            <h2 class="font-bold">Koszyk jest pusty!</h2>
                            <p>Wróć tutaj gdy dodasz coś do niego.</p>
                            <?php }?>
                        </ul>
                    </div> -->
               </div>
                <a class="flex items-end" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e( 'Moje Konto', 'clevertouch-shop-theme' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M10 12q-1.65 0-2.825-1.175T6 8q0-1.65 1.175-2.825T10 4q1.65 0 2.825 1.175T14 8q0 1.65-1.175 2.825T10 12Zm-8 8v-2.8q0-.825.425-1.55t1.175-1.1q1.275-.65 2.875-1.1T10 13h.35q.15 0 .3.05q-.2.45-.338.938T10.1 15H10q-1.775 0-3.187.45t-2.313.9q-.225.125-.363.35T4 17.2v.8h6.3q.15.525.4 1.038t.55.962H2Zm14 1l-.3-1.5q-.3-.125-.563-.263T14.6 18.9l-1.45.45l-1-1.7l1.15-1q-.05-.35-.05-.65t.05-.65l-1.15-1l1-1.7l1.45.45q.275-.2.538-.337t.562-.263L16 11h2l.3 1.5q.3.125.563.275t.537.375l1.45-.5l1 1.75l-1.15 1q.05.3.05.625t-.05.625l1.15 1l-1 1.7l-1.45-.45q-.275.2-.537.338t-.563.262L18 21h-2Zm1-3q.825 0 1.413-.588T19 16q0-.825-.588-1.413T17 14q-.825 0-1.413.588T15 16q0 .825.588 1.413T17 18Zm-7-8q.825 0 1.413-.588T12 8q0-.825-.588-1.413T10 6q-.825 0-1.413.588T8 8q0 .825.588 1.413T10 10Zm0-2Zm.3 10Z"/></svg>
                </a>
                
           </div>
        </nav>

    </div>
</header>