<?php 
/* Child theme generated with WPS Child Theme Generator */
            
if ( ! function_exists( 'b7ectg_theme_enqueue_styles' ) ) {            
    add_action( 'wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles' );
    
    function b7ectg_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    }
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'single-post-thumbnail', 300, 250 ); //300 pixels wide (and unlimited height)
   //add_image_size( 'single-post-thumbnail', 220, 180, true ); //(cropped)
}