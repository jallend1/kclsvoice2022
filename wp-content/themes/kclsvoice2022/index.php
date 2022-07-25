<?php get_header(); ?>

<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
);
$the_query = new WP_Query($args); ?>


<div class="kcls-recent-posts">
    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="kcls-recent-post">
            <header>
                <h2><?php the_title(); ?></h2>
                <p><?php the_time(); ?></p>
            </header>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="kcls-recent-post-thumbnail">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>
            <p><?php the_excerpt(); ?></p>
        </div>    
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>