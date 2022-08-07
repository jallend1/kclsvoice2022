<?php get_header(); ?>
<div class="kcls-page">
    <?php while ( have_posts() ) : the_post(); ?>
    <header class="kcls-page-banner">
        <h1 class="kcls-page-title"><?php the_title(); ?></h1>                
    </header>
    <div class="kcls-page-content">
        <?php the_content(); ?>
</div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>