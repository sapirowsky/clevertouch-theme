<?php get_header() ?>
<main class="container">
    <?php
        if (function_exists('woocommerce_breadcrumb')) {
            woocommerce_breadcrumb();
        }
    ?>
    <?php
        dynamic_sidebar( 'woocommerce_sidebar' )
    ?>
    
    
    <?php woocommerce_content() ?>
</main>
<?php get_footer() ?>