<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?> >

<header class="flex justify-center">
    <nav class="container px-2 py-4 flex justify-between items-center">
        <a href="<?php echo home_url() ?>" class="block w-44 sm:w-60">
            <?php if ( has_custom_logo() ): ?>
                <?php $image = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full') ?>
                <img src="<?php echo $image[0] ?>" class="w-full h-auto" alt="CleverTouch logo">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri() . "/assets/img/clevertouch-logo.webp" ?>" alt="CleverTouch logo">
            <?php endif ?>
        </a>
        <?php 
            wp_nav_menu([
                'theme_location' => 'header-menu',
                'menu_class' => 'flex flex-wrap gap-2 text-base lg:text-xl'
            ])
        ?>
    </nav>
</header>
