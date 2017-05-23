<?php
/**
 * Wordation Theme Customizer.
 *
 * @package Wordation
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wordation_customize_register( $wp_customize ) {
 	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
 	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
 	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wordation_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wordation_customize_preview_js() {
 	wp_enqueue_script( 'wordation_customizer', WORDATION_URL . '/assets/js/customizer.js', [ 'customize-preview' ], WORDATION_VERSION, true );
}
add_action( 'customize_preview_init', 'wordation_customize_preview_js' );
