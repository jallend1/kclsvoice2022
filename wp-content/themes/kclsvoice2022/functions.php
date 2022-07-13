<?php

function kcls_voice_styles() {
    wp_enqueue_style( 'kcls-voice-main-css', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), false);
    wp_enqueue_script('kcls-voice-custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), filemtime(get_template_directory() . '/assets/js/script.js'), true );
}

function kcls_voice_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}

add_action( 'wp_enqueue_scripts', 'kcls_voice_styles' );
add_action( 'init', 'kcls_voice_register_menus' );
