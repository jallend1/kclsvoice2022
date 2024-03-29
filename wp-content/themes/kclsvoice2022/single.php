<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <header class="kcls-blog-banner">
        <div class="kcls-blog-details">
            <h1><?php the_title(); ?></h1>
                <p class="kcls-publish-details">Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
            </div>
    </header>
    <div class="kcls-blog-page-content">
        <div class="kcls-blog-post">
            <main class="kcls-blog-post-content">
                <?php the_content(); ?>
            </main>
            <footer class="kcls-blog-post-navigation">
                <?php previous_post_link('%link', 'Previous Post - %title'); ?>
                <?php next_post_link('%link', 'Next Post - %title'); ?>
            </footer>
        </div>
        <aside>
            <?php get_sidebar('blog'); ?>
        </aside>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>