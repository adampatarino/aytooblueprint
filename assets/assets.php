<?php 
/* Theme CSS */
function theme_styles() {
    wp_register_style( 'theme-main', get_template_directory_uri() . '/assets/dist/css/main.css', false, filemtime(dirname(__FILE__) . '/dist/css/main.css') );
    wp_enqueue_style( 'theme-main' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

/* Theme JavaScript */
function theme_js() {
    wp_register_script( 'theme-main', get_template_directory_uri() . '/assets/dist/js/concat/main.js', array('jquery'), filemtime(dirname(__FILE__) . '/dist/js/main.js'), true );
    wp_enqueue_script( 'theme-main' );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

 ?>