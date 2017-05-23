<?php
/**
 * Wordation Enqueue Style & Script Files.
 *
 * @package Wordation
 */

/**
 * Enqueue styles & scripts.
 */
function wordation_scripts() {
    // Add main style css file.
    wp_enqueue_style( 'wordation-styles', WORDATION_URL . '/assets/dist/css/app.css', '', WORDATION_VERSION, '' );

    // Add jQuery v3.2.1 to footer.
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), 'null', true );
    wp_enqueue_script( 'jquery' );

    // Add Foundation JS to footer.
  	wp_enqueue_script( 'foundation-js', WORDATION_URL . '/assets/dist/js/foundation.js', [ 'jquery' ], '6.3.1', true );

    // Add main app js file to footer.
  	wp_enqueue_script( 'wordation-appjs', WORDATION_URL . '/assets/dist/js/app.js', [ 'jquery' ], WORDATION_VERSION, true );

    // Add comment script on single posts with comments.
  	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  		wp_enqueue_script( 'comment-reply' );
  	}
}
add_action( 'wp_enqueue_scripts', 'wordation_scripts' );
