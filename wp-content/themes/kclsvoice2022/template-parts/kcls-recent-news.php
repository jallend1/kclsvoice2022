<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
);
$the_query = new WP_Query($args); ?>
<div class="kcls-news">
    <header class="kcls-section-title">
        <h2 class="kcls-heading">Latest News</h2>
    </header>
    <div class="kcls-recent-posts">
        <?php if ( $the_query->have_posts() ) ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <!-- If current post is most recent, applies unique styling -->
                <?php 
                    if($the_query->current_post === 0) {?>
                    <div class="kcls-recent-post kcls-most-recent-post">
                <?php } else { ?>
                    <div class="kcls-recent-post kcls-additional-post">
                        <?php } ?>
                    <div class="left-column">
                        <div> 
                            <h2><?php the_title(); ?></h2>
                            <p class="kcls-recent-post-time"><?php the_time(); ?></p>
                        </div>
                        <!-- Shows excerpt only for most recent post -->
                        <?php if($the_query->current_post === 0) { ?>
                            <main>
                                <p><?php the_excerpt(); ?></p>
                            </main>
                        <?php } ?>
                    </div>
                    <div class="right-column">
                        <?php if ( has_post_thumbnail() ) ?>
                        <div class="kcls-recent-post-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    </div>
                </div>    
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
    </div>
</div>