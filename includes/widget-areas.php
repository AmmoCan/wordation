<?php
/**
 * Wordation Register Sidebars.
 *
 * @package Wordation
 */

/**
 * Register widget area.
 */
function wordation_widgets_init() {
    // First Sidebar widget area, located in sidebar. Empty by default.
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wordation' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'The first sidebar widget area', 'wordation' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // First Footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'First Footer Widget Area', 'wordation' ),
        'id'            => 'first-footer-widget-area',
        'description'   => __( 'The first footer widget area', 'wordation' ),
        'before_widget' => '<section id="%1$s" class="column widget widget-one %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'Second Footer Widget Area', 'wordation' ),
        'id'            => 'second-footer-widget-area',
        'description'   => __( 'The second footer widget area', 'wordation' ),
        'before_widget' => '<section id="%1$s" class="column widget widget-two %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'Third Footer Widget Area', 'wordation' ),
        'id'            => 'third-footer-widget-area',
        'description'   => __( 'The third footer widget area', 'wordation' ),
        'before_widget' => '<section id="%1$s" class="column widget widget-three %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'Fourth Footer Widget Area', 'wordation' ),
        'id'            => 'fourth-footer-widget-area',
        'description'   => __( 'The fourth footer widget area', 'wordation' ),
        'before_widget' => '<section id="%1$s" class="column widget widget-four %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
// Register sidebars by running wordation_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'wordation_widgets_init' );
