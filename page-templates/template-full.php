<?php
/**
 * Template Name: Full Width (no sidebar)
 * The template for displaying a full width page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordation
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <section id="content-wrap" class="row">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

    </section><!-- #content-wrap -->
  </div><!-- #primary -->

<?php get_footer(); ?>
