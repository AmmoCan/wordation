<?php
/**
 * Cleanup functions
 *
 * @package Wordation
 */

/**
 * Start cleanup functions
 * ----------------------------------------------------------------------------
 */
function wordation_start_cleanup() {
    // launching operation cleanup.
    add_action( 'init', 'wordation_cleanup_head' );
    // remove WP version from RSS.
    add_filter( 'the_generator', 'wordation_remove_rss_version' );
    // remove pesky injected css for recent comments widget.
    add_filter( 'wp_head', 'wordation_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head.
    add_action( 'wp_head', 'wordation_remove_recent_comments_style', 1 );
    // clean up gallery output in wp.
    add_filter( 'wordation_gallery_style', 'wordation_gallery_style' );

    // additional post related cleaning.
    add_filter( 'get_wordation_image_tag_class', 'wordation_image_tag_class', 0, 4 );
    add_filter( 'get_image_tag', 'wordation_image_editor', 0, 4 );
    add_filter( 'the_content', 'img_unautop', 30 );

    /**
     * Remove auto paragraph tags in submitted content & excerpt.
     */
     remove_filter( 'the_content', 'wpautop' );
     remove_filter( 'the_excerpt', 'wpautop' );
}
add_action( 'after_setup_theme','wordation_start_cleanup' );

/**
 * Clean up head
 * ----------------------------------------------------------------------------
 */
function wordation_cleanup_head() {
    // Windows Live Writer.
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // Really Simple Discovery service.
    remove_action( 'wp_head', 'rsd_link' );
    // Emoji links.
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    // Category feed links.
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    // Post and comment feed links.
    remove_action( 'wp_head', 'feed_links', 2 );
    // REST API links.
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    // Index link.
    remove_action( 'wp_head', 'index_rel_link' );
    // Previous link.
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // Start link.
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // Canonical.
    remove_action( 'wp_head', 'rel_canonical', 10, 0 );
    // Shortlink.
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
    // Links for adjacent posts.
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version.
    remove_action( 'wp_head', 'wp_generator' );
    // Remove WP version from css.
    add_filter( 'style_loader_src', 'wordation_remove_wp_ver_css_js', 9999 );
    // Remove WP version from scripts.
    add_filter( 'script_loader_src', 'wordation_remove_wp_ver_css_js', 9999 );
    // Prevent unneccecary info from being displayed.
    add_filter( 'login_errors',create_function( '$a', 'return null;' ) );
    // Remove injected index page type from page title.
    add_filter( 'get_the_archive_title', 'wordation_remove_index_title' );
}

/**
 * Remove WP version from RSS.
 */
function wordation_remove_rss_version() {
    return '';
}

/**
 * Remove WP version from scripts.
 *
 * @param string $src Variable for script declaration.
 */
function wordation_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

/**
 * Remove injected CSS for recent comments widget.
 */
function wordation_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

/**
 * Remove injected CSS for recent comments widget.
 */
function wordation_remove_recent_comments_style() {
    global $wp_widget_factory;
    if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
    }
}

/**
 * Remove injected CSS from gallery.
 *
 * @param string $css Variable for styling declaration.
 */
function wordation_gallery_style( $css ) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/**
 * Remove injected CSS from gallery.
 *
 * @param string $title Variable for page title declaration.
 */
function wordation_remove_index_title( $title ) {
    if ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );

    } elseif ( is_category() ) {
        $title = single_cat_title( '', false );

    } else {
        $title = __( 'Archives' );
    }

    return $title;
}

/**
 * Clean up image tags
 * ----------------------------------------------------------------------------
 *
 * @param string $attr Variable for caption attribute in image markup.
 * @param string $content Variable for attribute content in image markup.
 */
function wordation_fixed_img_caption_shortcode( $attr, $content = null ) {
    // Remove default inline style of wp-caption.
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
            $content = $matches[1];
            $attr['caption'] = trim( $matches[2] );
        }
    }
    $output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
    if ( $output != '' ) {
        return $output;
    }
    extract( shortcode_atts( array(
        'id'    => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => '',
        'class'   => '',
    ), $attr));
    if ( 1 > (int) $width || empty( $caption ) ) {
        return $content;
    }
    $markup = '<figure';
    if ( $id ) { $markup .= ' id="' . esc_attr( $id ) . '"'; }
    if ( $class ) { $markup .= ' class="' . esc_attr( $class ) . '"'; }
    $markup .= '>';
    $markup .= do_shortcode( $content ) . '<figcaption>' . $caption . '</figcaption></figure>';
    return $markup;
}
add_shortcode( 'wp_caption', 'wordation_fixed_img_caption_shortcode' );
add_shortcode( 'caption', 'wordation_fixed_img_caption_shortcode' );

/**
 * Clean the output of attributes of images in editor.
 *
 * @param string $class Variable for class attr for image.
 * @param string $id Variable for id attr for image.
 * @param string $align Variable for align attr for image.
 * @param string $size Variable for size attr for image.
 */
function wordation_image_tag_class( $class, $id, $align, $size ) {
    $align = 'align' . esc_attr( $align );
    return $align;
}

/**
 * Remove width and height in editor, for a better responsive world.
 *
 * @param string $html Variable for html for image.
 * @param string $id Variable for id attr for image.
 * @param string $alt Variable for alt attr for image.
 * @param string $title Variable for title attr for image.
 */
function wordation_image_editor( $html, $id, $alt, $title ) {
    return preg_replace( array(
        '/\s+width="\d+"/i',
        '/\s+height="\d+"/i',
        '/alt=""/i',
        ),
        array(
        '',
        '',
        '',
        'alt="' . $title . '"',
        ),
    $html);
}

/**
 * Wrap images with figure tag - Credit: Robert O'Rourke - http://bit.ly/1q0WHFs.
 *
 * @param string $pee Variable for paragraph selector.
 */
function img_unautop( $pee ) {
    $pee = preg_replace( '/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee );
    return $pee;
}
