<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <nav class="kcls-nav">
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
        <div class="header-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu') ); ?>
        </div>
    </nav>