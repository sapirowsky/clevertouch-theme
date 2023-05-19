<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php wp_head() ?>
</head>
<body <?php body_class() ?> >

<header>
    <div class="container">
        <?php 
            wp_nav_menu([
                'theme_location' => 'header-menu'
            ])
        ?>
    </div>
</header>