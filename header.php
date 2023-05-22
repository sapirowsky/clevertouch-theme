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

<header>
    <div class="container flex justify-between">
        <a href="<?php echo home_url() ?>" class="">
            <?php if ( has_custom_logo() ): ?>
                <?php $image = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full') ?>
                <img src="<?php echo $image[0] ?>" class="logo" width="537px" height="132px" alt="CleverTouch logo">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri() . "/assets/img/clevertouch-logo.webp" ?>" class="logo" width="537px" height="132px" alt="CleverTouch logo">
            <?php endif ?>
        </a>

        <div class="controls flex">
            <div class="cart-container">
                <label for="cart-checkbox" class="cart-icon">
                    <img src="<?php echo get_template_directory_uri() . "/assets/img/cart.svg" ?>" class="cart-img" width="48px" height="48px" alt="Karta">

                    <input id="cart-checkbox" type="checkbox">
                </label>
                <div class="cart-sidebar">
                    <div class="close-container">
                        <label for="cart-checkbox" class="close"></label>
                    </div>
                    <h1>Lista zakupów</h1>
                </div>

            </div>
            <div class="sidebar-container">
                <label class="hamburger-menu">
                    <label class="sr-only" for="nav-checkbox">Nawigacja</label>
                    <input id="nav-checkbox" type="checkbox" />
                </label>
                <nav class="nav-sidebar">
                    <?php 
                        wp_nav_menu([
                            'theme_location' => 'header-menu',
                            'menu_class' => '',
                        ])
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>