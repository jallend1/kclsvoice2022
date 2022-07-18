<?php

function kcls_voice_styles() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Inter:400,700', array(), '1.0.0' );
    wp_enqueue_style( 'kcls-voice-main-css', get_stylesheet_uri(), ['google-fonts'], filemtime(get_template_directory() . '/style.css'), false);
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

function kcls_voice_theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
}

add_action( 'init', 'kcls_voice_register_menus' );
add_action( 'wp_enqueue_scripts', 'kcls_voice_styles' );
add_action( 'after_setup_theme', 'kcls_voice_theme_setup' );
