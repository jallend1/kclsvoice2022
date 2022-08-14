
<?php get_header(); ?>
<header class="kcls-blog-banner">
    <h1 class="kcls-page-title"><?php the_archive_title(); ?></h1>
</header>
<div class="kcls-blog-list">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="kcls-blog-list-item">
        <div class="kcls-blog-list-heading">
            <h1><?php the_title(); ?></h1>
            <p class="kcls-publish-details">Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
        </div>
        <div class="kcls-blog-post">
            <main class="kcls-blog-post-content">
                <?php the_excerpt(); ?>
            </main>
        </div>
    </div>    
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>