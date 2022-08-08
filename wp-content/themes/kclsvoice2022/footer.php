    <footer class="kcls-footer">    
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <?php 
                    if(has_custom_logo()) {
                        the_custom_logo();
                    } else { ?>
                        <img src="<?php echo get_theme_file_uri('assets/images/local1857logo.png'); ?>" alt="KCLS Voice Logo" >
                    <?php } ?>        
            </a>    
            </div>    
        <nav class="kcls-footer-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
        </nav>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>