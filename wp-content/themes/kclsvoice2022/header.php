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
    <header class="kcls-main-header">
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
    <div class="kcls-main-header-content">
        <div class="left-header">
        <h1>Local 1857</h1>
        <h2>King County Library System employees are stronger together.
        </h2>
        <div>
            <p>When you signed your membership card, you became part of an employee Union that represents approximately 1,000 members at KCLS. Membership gives you the right to participate in decisions that affect your wages, hours, and working conditions. Union members participate in the democratic governance of the Union, and have access to member-only benefits.</p>
        </div>
    </div>
    <div class="right-header">
        <!-- <button class="cta-button">Get involved</button> -->
        <div class="kcls-contact-boxes">
            <div class="kcls-contact-box">
                <div class="kcls-contact-box-title">
                    <h2>Newsletter Signup</h2>
                </div>
                <div class="kcls-contact-box-image">
                    <img src="<?php echo get_theme_file_uri('assets/icons/email.svg'); ?>" />
                </div>
            </div>
            <div class="kcls-contact-box">
                <div class="kcls-contact-box-title">
                    <h2>Get Text Alerts</h2>
                </div>
                <div class="kcls-contact-box-image">
                    <img src="<?php echo get_theme_file_uri('assets/icons/chat.svg'); ?>" />
                </div>
            </div>
            <div class="kcls-contact-box">
                <div class="kcls-contact-box-title">
                    <h2>Watercooler</h2>
                </div>
                <div class="kcls-contact-box-image">
                    <img src="<?php echo get_theme_file_uri('assets/icons/watercooler.svg'); ?>" />
                </div>
            </div>
            <div class="kcls-contact-box">
                <div class="kcls-contact-box-title">
                    <h2>Find Your Steward</h2>
                </div>
                <div class="kcls-contact-box-image">
                    <img src="<?php echo get_theme_file_uri('assets/icons/people.svg'); ?>" />
                </div>
            </div>
        </div>
                    </div>
    </div>
</header>
        
    