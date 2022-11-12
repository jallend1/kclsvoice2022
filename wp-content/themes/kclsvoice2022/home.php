<?php get_header(); ?>
<header class="kcls-blog-banner">
    <h1 class="kcls-page-title"><?php wp_title(''); ?></h1>
</header>
<div class="kcls-blog-list-container">
    <div class="kcls-blog-list">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="kcls-blog-list-item">
            <div class="kcls-blog-list-heading">
                <h1><?php the_title(); ?></h1>
                <p class="kcls-publish-details">Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
            </div>
            <div class="kcls-blog-post">
                <main class="kcls-blog-post-content">
                    <!-- If post has a feature image, display it -->
                    <div class="kcls-blog-list-post-image">
                        <?php if ( has_post_thumbnail() ){
                            the_post_thumbnail('thumbnail');
                        } 
                        // If no featured image, display the first image from the post or default logo
                        else {
                            $kcls_post_img = kcls_get_post_image();
                            echo '<img width="150" src="' . $kcls_post_img . '" alt="' . get_the_title() . '">';
                        } ?> 
                    </div>
                    <?php the_excerpt(); ?>
                </main>
            </div>
        </div>    
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>