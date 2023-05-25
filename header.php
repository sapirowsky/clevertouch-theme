<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nasza wizja polega na pielęgnowaniu ludzkiego ducha za pomocą technologii, aby zainspirować pokolenie bez żadnych ograniczeń. Specjalistyczne ekrany interaktywne, tablice i wyświetlacze.">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?> >
<header class="header">
    <div class="container flex justify-between">
        <a href="<?php echo home_url() ?>" class="">
            <?php if ( has_custom_logo() ): ?>
                <?php $image = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full') ?>
                <img src="<?php echo $image[0] ?>" class="logo" width="268,5px" height="66px" alt="CleverTouch logo">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri() . "/assets/img/clevertouch-logo.webp" ?>" class="logo" width="268,5px" height="66px" alt="CleverTouch logo">
            <?php endif ?>
        </a>

        <div class="controls flex">
            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')) ?>" class="icon">
                <img src="<?php echo get_template_directory_uri() . "/assets/img/user.svg" ?>" style="padding: 2px;" width="48px" height="48px" alt="Konto">
            </a>
            <div class="control-container">
                <label for="cart-checkbox" class="behind-sidebar"></label>
                <label for="cart-checkbox" class="icon">
                    <img src="<?php echo get_template_directory_uri() . "/assets/img/cart.svg" ?>" width="48px" height="48px" alt="Koszyk">
                    <input id="cart-checkbox" type="checkbox">
                    <?php if(WC()->cart->is_empty()): else: ?>
                        <span class="items-count">
                            <?php echo WC()->cart->get_cart_contents_count() ?>
                        </span>
                    <?php endif; ?>
                </label>
                <div class="sidebar">
                    <div class="sidebar-close-container">
                        <h1>Koszyk</h1>
                        <label for="cart-checkbox">
                            <span class="sr-only">Zamknij nawigacje</span>
                        </label>
                    </div>
                    
                    <div class="cart-items">
                        <?php if(WC()->cart->is_empty()): ?>
                            <div class="cart-item">
                                <p>Nie masz jeszcze nic w koszyku!</p>
                            </div>
                        <?php else: ?>
                            <?php foreach(WC()->cart->get_cart() as $cart_item_key => $cart_item):?>
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
                </div>

            </div>
            <div class="control-container">
                <label for="nav-checkbox" class="behind-sidebar"></label>
                <label for="nav-checkbox" class="sidebar-button flex">
                    <span class="sr-only">Otwórz nawigacje</span>
                    <input id="nav-checkbox" type="checkbox" />
                </label>
                <nav class="sidebar">
                    <div class="sidebar-close-container">
                        <h1>Nawigacja</h1>
                        <label for="nav-checkbox" class="sidebar-close">
                            <span class="sr-only">Zamknij nawigacje</span>
                        </label>
                    </div>
                    <?php 
                        wp_nav_menu([
                            'theme_location' => 'header-menu',
                            'container_class' => 'nav-items',
                        ])
                    ?>
                </nav>
            </div>
        </div>
    </div>
    
</header>