<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wordation
 */

get_header(); ?>

  <div id="primary" class="content-area small-12 medium-8 medium-push-4 columns">
		<section id="content-wrap" class="row">

		<?php
  		if ( have_posts() ) :
  		  while ( have_posts() ) : the_post();

    			get_template_part( 'template-parts/content', get_post_format() );

    			//vop_lms_post_nav();

    			// If comments are open or we have at least one comment, load up the comment template.
    			//if ( comments_open() || get_comments_number() ) :
    				//comments_template();
    			//endif;

  		  endwhile; // End of the loop.
  		endif;
		?>

    </section><!-- #content-wrap -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php
get_footer();
