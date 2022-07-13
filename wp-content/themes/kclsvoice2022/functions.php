<?php

function kcls_voice_styles() {
    wp_enqueue_style( 'kcls-voice-main-css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'kcls_voice_styles' );
