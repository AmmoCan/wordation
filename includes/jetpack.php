<?php
/**
 * Jetpack Compatibility File.
 *
 * @link http://jetpack.me/
 *
 * @package Wordation
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function wordation_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'wordation_infinite_scroll_render',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'wordation_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function wordation_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'page-templates/content', get_post_format() );
	}
}
