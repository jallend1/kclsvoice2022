<?php get_header(); ?>
<?php 
    while(have_posts()) {
        the_post();
        ?>
        <div class="kcls-blog-post">
            <a href="<?php echo get_permalink(); ?> ">
                <h2><?php the_title(); ?></h2>
            </a>
        </div>
        <div class="kcls-blog-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <hr />
    <?php }
?>

<?php get_footer(); ?>