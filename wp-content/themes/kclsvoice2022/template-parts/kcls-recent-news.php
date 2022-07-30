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
            <div class="kcls-recent-post <?php 
                    // If the most recent post, add relevant class
                    if($the_query->current_post === 0) echo 'kcls-most-recent-post'; ?>">
                <div class="kcls-recent-post-basic">
                    <div class="kcls-news-details">
                        <h3><?php the_title(); ?></h3>
                        <p class="kcls-recent-post-time"><?php the_date(); ?></p>    
                    </div>
                    <div class="kcls-news-image">
                        <div class="kcls-recent-post-thumbnail">
                            <?php if ( has_post_thumbnail() ){
                                the_post_thumbnail('medium');
                            } 
                            // If no featured image, display the first image from the post or default logo
                            else {
                                $first_img = kcls_get_post_image();
                                echo '<img src="' . $first_img . '" alt="' . get_the_title() . '">';
                            } ?> 
                        </div>
                    </div>
                </div>
                <?php if($the_query->current_post === 0){ ?>
                        <div class="kcls-recent-post-expanded">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php } ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>
