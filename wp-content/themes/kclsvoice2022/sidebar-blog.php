<div class="kcls-blog-sidebar">
    <h2 class="kcls-blog-sidebar-heading">Recent News</h2>
    <div class="kcls-blog-sidebar-posts">
    <?php 
        $latest_news = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        if ($latest_news->have_posts()) :
            while ($latest_news->have_posts()) :
                $latest_news->the_post();
                // Ignores the most recent post
                if($latest_news->current_post !== 0) :
                ?>
                    <div class="kcls-sidebar-post">
                        <div class="kcls-sidebar-post-thumbnail">
                            <?php if ( has_post_thumbnail() ){
                                the_post_thumbnail('medium');
                            } 
                            // If no featured image, display the first image from the post or default logo
                            else {
                                $kcls_post_img = kcls_get_post_image();
                                echo '<img src="' . $kcls_post_img . '" alt="' . get_the_title() . '">';
                            } ?> 
                        </div>
                        <div class="kcls-sidebar-text">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <p class="kcls-recent-post-time"><?php the_date(); ?></p>    
                        </div>
                    </div> 
                <?php
                endif;
            endwhile;
        endif;
        wp_reset_postdata();
    ?>
    </div>
</div>