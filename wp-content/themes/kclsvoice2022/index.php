<?php get_header(); ?>
<!-- Get the latest four posts -->
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC'
);
$the_query = new WP_Query($args); ?>

<!-- Show the results of the the_query -->
<?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
    </div>    
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>