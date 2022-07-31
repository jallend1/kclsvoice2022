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
    add_theme_support('post-thumbnails');
}

function kcls_get_post_image() {
    global $post;
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(!$first_img) {
        $first_img = get_template_directory_uri() . '/assets/images/local1857logo.png';
    }
    return $first_img;
}

function kcls_modify_excerpt_length(){
    return 30;
}

function kcls_modify_excerpt_more(){
    return '...<span class="kcls-news-excerpt"><a href="' . get_permalink() . '">Read More...</a></span>';
}

add_action( 'init', 'kcls_voice_register_menus' );
add_action( 'wp_enqueue_scripts', 'kcls_voice_styles' );
add_action( 'after_setup_theme', 'kcls_voice_theme_setup' );
add_filter( 'excerpt_length', 'kcls_modify_excerpt_length' );
add_filter( 'excerpt_more', 'kcls_modify_excerpt_more' );
