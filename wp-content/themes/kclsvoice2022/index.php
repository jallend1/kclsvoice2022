<?php get_header(); ?>
<div class="kcls-page-banner">
    <h1 class="kcls-page-title"><?php the_title(); ?></h1>
</div>
<div class="kcls-page-content">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
                <?php the_content(); ?>
            <?php
        endwhile;
    endif;
    ?>
</div>
<?php get_footer();