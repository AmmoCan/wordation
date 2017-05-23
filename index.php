<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordation
 */

get_header(); ?>

  <div id="primary" class="content-area small-12 medium-8 medium-push-4 columns">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;

			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();
        ?>
    <?php
    else :
        ?>
      <article id="post-0" class="post no-results not-found column">
  		<?php
    	if ( current_user_can( 'edit_posts' ) ) :
  		    // Show a different message to a logged-in user who can add posts.
  		?>
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'No posts to display', 'wordation' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( esc_html( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'wordation' ), esc_html( admin_url( 'post-new.php' ) ) ); ?></p>
				</div><!-- .entry-content -->

        <?php
  		else :
            // Show the default message to everyone else.
        ?>
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'vop-lms' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'vop-lms' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
        <?php
      endif; // end current_user_can() check_admin_referer.
	        ?>
      </article><!-- #post-0 -->

		<?php
    endif; // end have_posts() check_admin_referer.
    ?>

  </div>

  <?php get_sidebar(); // sidebar column. ?>

<?php
get_footer();
