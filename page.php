<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordation
 */

get_header(); ?>

	<div id="primary" class="content-area small-12 medium-8 medium-push-4 columns">
		<section id="content-wrap" class="row">
			<?php
			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/content', 'page' );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; ?>

		</section><!-- #content-wrap -->
	</div><!-- #primary -->

		<?php get_sidebar(); // sidebar column. ?>

<?php
get_footer();
