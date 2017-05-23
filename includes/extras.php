<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Wordation
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wordation_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
    }

	return $classes;
}
add_filter( 'body_class', 'wordation_body_classes' );


/**
 * Make YouTube and Vimeo oembed elements responsive. Add Foundation's .flex-video
 * class wrapper around any oembeds
 *
 * @param string  $html HTML for video element.
 * @param string  $url URL for video element.
 * @param string  $attr Attribute for video element.
 * @param integer $post_ID Post ID for video element.
 */
function wordation_oembed_flex_wrapper( $html, $url, $attr, $post_ID ) {
	if ( strpos( $url, 'youtube' ) || strpos( $url, 'youtu.be' ) || strpos( $url, 'vimeo' ) ) {
		return '<div class="flex-video widescreen">' . $html . '</div>';
	}

	return $html;
}
add_filter( 'embed_oembed_html', 'wordation_oembed_flex_wrapper', 10, 4 );
