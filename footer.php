<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the main element and all the footer content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordation
 */

?>

</main><!-- #main -->
<footer id="colophon" class="site-footer" role="contentinfo">
<?php

/*
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( is_active_sidebar( 'first-footer-widget-area' )
    && is_active_sidebar( 'second-footer-widget-area' )
    && is_active_sidebar( 'third-footer-widget-area' )
    && is_active_sidebar( 'fourth-footer-widget-area' )
) :
?>

    <aside id="widget-wrap" class="row small-up-1 medium-up-2 large-up-4 align-spaced" role="complementary">
      <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
      <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
      <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
      <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
    </aside><!-- #widget-wrap -->

<?php
  elseif ( is_active_sidebar( 'first-footer-widget-area' )
      && is_active_sidebar( 'second-footer-widget-area' )
      && is_active_sidebar( 'third-footer-widget-area' )
      && ! is_active_sidebar( 'fourth-footer-widget-area' )
  ) :
?>
    <aside id="widget-wrap" class="row small-up-1 medium-up-3 align-spaced" role="complementary">
      <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
      <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
      <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
    </aside><!-- #widget-wrap -->

<?php
  elseif ( is_active_sidebar( 'first-footer-widget-area' )
      && is_active_sidebar( 'second-footer-widget-area' )
      && ! is_active_sidebar( 'third-footer-widget-area' )
      && ! is_active_sidebar( 'fourth-footer-widget-area' )
  ) :
?>
    <aside id="widget-wrap" class="row small-up-1 medium-up-2 align-spaced" role="complementary">
      <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
      <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
    </aside><!-- #widget-wrap -->

<?php
  elseif ( is_active_sidebar( 'first-footer-widget-area' )
      && ! is_active_sidebar( 'second-footer-widget-area' )
      && ! is_active_sidebar( 'third-footer-widget-area' )
      && ! is_active_sidebar( 'fourth-footer-widget-area' )
  ) :
?>
    <aside id="widget-wrap" class="row small-up-1 align-spaced" role="complementary">
      <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
    </aside><!-- #widget-wrap -->

<?php
// end of all sidebar checks.
endif;
?>

  <div id="site-info-wrap" class="row align-justify">

	  <div id="footer-credits" class="column align-self-middle">
  		<address>
        &copy;<?php echo esc_html( date( 'Y' ) ); ?>&nbsp;-&nbsp;<?php bloginfo( 'name' ); ?>&nbsp;•&nbsp;<?php bloginfo( 'description' ); ?>
			</address>
  	</div>

  	<div id="footer-links" class="column align-self-middle">
    	<div id="footer-icons">
    		<ul class="social-icons">
					<li>
						<a class="link-linkedin" target="_blank" title="visit vets on point on linkedin" href="#linkedin">
							<span><i class="fa fa-linkedin" aria-hidden="true"></i></span>
						</a>
					</li>
					<li>
						<a class="link-twitter" target="_blank" title="visit vets on point on twitter" href="#twitter">
							<span><i class="fa fa-twitter" aria-hidden="true"></i></span>
						</a>
					</li>
    		</ul>
    	</div><!-- #footer-icons -->

      <a href="#masthead" class="to-top fa fa-angle-up" title="go back to top"></a>
    </div><!-- #footer-links -->

	</div><!-- .site-info-wrap -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
