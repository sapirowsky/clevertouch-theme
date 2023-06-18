<?php get_header() ?>
<main>
    <div class="container">
        <?php
            if (function_exists('woocommerce_breadcrumb')) {
                woocommerce_breadcrumb();
            }
        ?>    

        <?php woocommerce_content() ?>
    </div>
</main>
<?php get_footer() ?>