<?php
/**
 * The front-page.php template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordation
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <section id="content-wrap" class="row">
      <?php
      if ( have_posts() ) :

  		while ( have_posts() ) :

  			the_post();

  			get_template_part( 'template-parts/content', get_post_format() );

  		endwhile;

  			the_posts_navigation();

  		else :

  			get_template_part( 'template-parts/content', 'none' );

  		endif;
      ?>
    </section><!-- #content-wrap -->
	</div><!-- #primary -->

<?php
get_footer();
