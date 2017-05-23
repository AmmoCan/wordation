<?php
/**
 * Template Name: Sidebar Left
 * The template for displaying a page with the sidebar on the left side.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordation
 */

get_header(); ?>

  <div id="primary" class="content-area small-12 medium-8 medium-push-4 columns">
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

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
