<?php
/* Proper way to enqueue scripts and styles */
function mytheme_custom_scripts(){

    // Register and Enqueue a Stylesheet
    // get_template_directory_uri will look up parent theme location
    // wp_register_style( 'name-of-style', get_template_directory_uri() . '/css/custom-style.css');
    // wp_enqueue_style( 'name-of-style' );

    // Register and Enqueue a Script
    // get_stylesheet_directory_uri will look up child theme location

    wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    wp_enqueue_script( 'main' );

    wp_register_script( 'loader', get_template_directory_uri() . '/js/components/loader.js', array('react', 'reactdom', 'jquery'), null, true);
    wp_enqueue_script( 'loader' );

    wp_register_script( 'page', get_template_directory_uri() . '/js/components/page.js', array('react', 'reactdom', 'jquery'), null, true);
    wp_enqueue_script( 'page' );

    wp_register_script( 'app', get_template_directory_uri() . '/js/components/app.js', array('react', 'reactdom', 'jquery'), null, true);
    wp_enqueue_script( 'app' );

    wp_register_script( 'reactdom', get_template_directory_uri() . '/js/vendor/react-dom.js', array(), null, true);
    wp_enqueue_script( 'reactdom' );

    wp_register_script( 'react', get_template_directory_uri() . '/js/vendor/react.js', array(), null, true);
    wp_enqueue_script( 'react' );

}

add_action('wp_enqueue_scripts', 'mytheme_custom_scripts');

?>
