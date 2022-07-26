<?php get_header(); ?>

<main class="kcls-blog-post">
    <div class="kcls-blog-post-content">
        <?php while ( have_posts() ) : the_post(); ?>
        <div>
            <h2><?php the_title(); ?></h2>
        </div>        
        <div>
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>