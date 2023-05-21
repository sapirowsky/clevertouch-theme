<?php get_header() ?>

<div class="hero">
   <?php the_post_thumbnail('post_thumbnail', [
    'class'=> 'h-[50vh] object-cover'
   ]) ?>
</div>

<main>
    <?php if( have_posts() ): while(have_posts()): the_post() ?>
        <?php the_content() ?>
    <?php endwhile; else: endif ?>
</main>


<?php get_footer() ?>