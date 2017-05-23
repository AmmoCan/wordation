<?php
/**
 * Custom walker class for Foundation 6 responsive &
 * sticky Topbar for primary menu.
 *
 * @package Wordation
 */

/**
 * Wordation_Topbar_Navwalker Class Doc Comment
 *
 * Wordation_Topbar_Navwalker to extend Walker_Nav_Menu
 *
 * @category    Class
 * @package     Wordation_Topbar_Navwalker
 * @author      AmmoCan
 * @copyright   Copyright 2017 2 Drops, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 * @link        https://linkedin.com/in/ammocan
 *
 * @since       1.0.0
 */
class Wordation_Topbar_Navwalker extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments.
     * @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
         $indent = str_repeat( "\t", $depth );
         $output .= "\n$indent<ul class=\"menu\">\n";
    }
}
