<?php
/**
 * Custom login styles for the theme. The Sass file is located in
 * ./assets/login.scss and is compiled to ./assets/dist/css/login.css by gulp.
 * Use the functions below to move the file elsewhere.
 *
 * @package Wordation
 */

/**
 * Enqueue the style css file for the login page.
 */
function wordation_login_style() {
    wp_enqueue_style( 'wordation_login_css', get_template_directory_uri() . '/assets/dist/css/login.css', false );
}
add_action( 'login_enqueue_scripts', 'wordation_login_style' );

/**
 * Change logo link to site's url instead of wordpress.org.
 */
function wordation_login_link() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'wordation_login_link' );

/**
 * Change logo title to site's name instead of WordPress.
 */
function wordation_login_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'wordation_login_title' );
