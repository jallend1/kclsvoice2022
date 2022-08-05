<?php get_header(); ?>
<div class="kcls-front-page">
    <?php 
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
                <?php the_content(); ?>
            <?php
        endwhile;
    endif; ?>
    <!-- <?php get_template_part('template-parts/kcls-contact-boxes'); ?> -->
    <?php get_template_part('template-parts/kcls-recent-news'); ?>
    </div>
    <?php get_footer(); ?>



