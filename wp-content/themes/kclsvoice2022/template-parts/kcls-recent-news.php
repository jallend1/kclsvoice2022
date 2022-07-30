<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
);
$the_query = new WP_Query($args); ?>

<div class="kcls-news">
    <div class="kcls-recent-posts">
        <?php if ( $the_query->have_posts() ) ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="kcls-recent-post <?php 
                            // If current post is most recent, applies unique styling       
                            if($the_query->current_post === 0) echo 'kcls-most-recent-post'; 
                            else echo 'kcls-additional-post';
                        ?>">
                    <div class="news-left-column">    
                    <?php if($the_query->current_post === 0) { ?>
                            <header class="kcls-section-title">
                                <h2 class="kcls-heading">Latest News</h2>
                            </header>      
                        <?php } ?>
                        <main>
                            <h3><?php the_title(); ?></h3>
                            <p class="kcls-recent-post-time"><?php the_date(); ?></p>
                            <?php 
                                // Shows excerpt only for most recent post
                                if($the_query->current_post === 0) { ?>
                                    <div class="kcls-main-news-excerpt"><?php the_excerpt(); ?></div>
                            <?php } ?>
                        </main>
                    </div>
                    <div class="news-right-column">
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