<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordation
 */

?>
  <aside id="secondary" class="widget-area small-12 medium-4 medium-pull-8 columns" role="complementary">
    <?php
    if ( ! is_active_sidebar( 'sidebar-1' ) ) :
        return;

    else :
        dynamic_sidebar( 'sidebar-1' );

    endif;
    ?>
  </aside><!-- #secondary -->
