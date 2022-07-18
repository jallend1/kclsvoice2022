<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <nav>
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
        <header  class="kcls-main-header">
            <div class="left-header">
                <h1>Local 1857</h1>
                <h2>King County Library System employees are stronger together.
                </h2>
                <div>
                    <p>Local 1857 is part of the Washington State Council of County and City Employees (WSCCCE), often referred to as Council 2. Council 2 represents 17,000 public service employees across Washington State and Idaho, and is part of the American Federation of State, County, and Municipal Employees (AFSCME) a 1.6 million member Union with members across the United States</p>
                </div>
            </div>
            <div class="right-header">
                <button class="cta-button">Get involved</button>
            </div>
        </header>
    