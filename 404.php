<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Wordation
 */

get_header(); ?>

<?php $name_var = get_query_var( 'name' );  ?>

	<div id="primary" class="content-area">
		<section id="content-wrap" class="row align-center error-404 not-found">

			<div class="small-12 columns page-header">
        <h1 class="section-title"><?php esc_html_e( 'Oops! We couldn&rsquo;t find the ', 'wordation' );
        echo esc_html( $name_var );
        esc_html_e( ' page', 'wordation' )?></h1>
        <p><?php esc_html_e( 'We apologize for the confusion. How about trying one of the links below?', 'wordation' ); ?></p>
      </div>

			<div id="page-content-wrap" class="row small-up-1 medium-up-2 page-content">

        <div class="column small-12">
				<?php
					the_widget( 'WP_Widget_Recent_Posts' );
        ?>
        <?php
      	 // Only show the widget if site has multiple categories.
      	if ( wordation_categorized_blog() ) :
        ?>
      		<div class="widget widget-categories">
      			<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'wordation' ); ?></h2>
      			<ul>
      			<?php
      				wp_list_categories( array(
      					'orderby'    => 'count',
      					'order'      => 'DESC',
      					'show_count' => 1,
      					'title_li'   => '',
      					'number'     => 10,
      				) );
      			?>
      			</ul>
      		</div><!-- .widget-categories -->
      	<?php
      	endif;
        ?>
        </div>

        <div class="column small-12">
        <?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'wordation' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
				?>
        </div>

			</div><!-- .page-content -->
		</section><!-- #content-wrap -->
	</div><!-- #primary -->

<?php
get_footer();
