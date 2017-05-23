<?php
/**
 * Enable and Create (register) Custom Menus
 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 *
 * @package Wordation
 */

/**
 * Register theme nav menus.
 *
 * @see wp_nav_menu()
 */
function wordation_menus() {
    register_nav_menus( array(
        'primary' => __( 'Main Menu', 'wordation' ),     // Main menu in header.
		    'footer' => __( 'Footer Menu', 'wordation' ),// Secondary nav in footer.
        )
    );
}
add_action( 'init', 'wordation_menus' );

/**
 * Primary menu
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
function wordation_primary_menu() {
    wp_nav_menu( array(
        'container' => false,                           // Remove nav container.
        'menu_class' => 'menu simple vertical large-horizontal', // Adding custom nav class.
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-close-on-click-inside="false">%3$s</ul>',
        'theme_location' => 'primary',      // Where it's located in the theme.
        'depth' => 5,                             // Limit the depth of the nav.
        'fallback_cb' => false,
        'walker' => new Wordation_Topbar_Navwalker(),
    ));
}

/**
 * Footer menu
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
function wordation_footer_menu() {
    wp_nav_menu( array(
        'container' => 'false',                         // Remove nav container.
        'menu' => __( 'Footer Links', 'jointswp' ),   	            // Nav name.
        'menu_class' => 'menu',      					       // Adding custom nav class.
        'theme_location' => 'footer-links',  // Where it's located in the theme.
        'depth' => 0,                             // Limit the depth of the nav.
        'fallback_cb' => '',  							               // Fallback function.
    ));
}

/**
 * Add active nav class
 *
 * @param string $classes Assign active class to object.
 * @param int    $item Used as the index to check for current item.
 */
function wordation_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'wordation_active_nav_class', 10, 2 );
