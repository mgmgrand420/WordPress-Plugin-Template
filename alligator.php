<?php
/*
Plugin Name: Alligator
Plugin URI: http://www.example.com
Description: A plugin to display a random alligator image.
Version: 1.0
Author: Your Name
Author URI: http://www.example.com
License: GPL2
*/

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
    wp_register_style( 'alligator-plugin', plugins_url( 'alligator-plugin/css/style.css' ) );
    wp_enqueue_style( 'alligator-plugin' );
}

// Register script.
add_action( 'wp_enqueue_scripts', 'register_plugin_scripts' );

/**
 * Register script.
 */
function register_plugin_scripts() {
    wp_register_script( 'alligator-plugin', plugins_url( 'alligator-plugin/js/script.js' ), array( 'jquery' ) );
    wp_enqueue_script( 'alligator-plugin' );
}

// Add shortcode.
add_shortcode( 'alligator', 'display_random_alligator' );

/**
 * Display a random alligator image.
 */
function display_random_alligator() {
    $alligators = array(
        'https://www.example.com/alligator-1.jpg',
        'https://www.example.com/alligator-2.jpg',
        'https://www.example.com/alligator-3.jpg',
    );
    $random_alligator = $alligators[array_rand( $alligators )];
    return '<img src="' . $random_alligator . '" />';
}
