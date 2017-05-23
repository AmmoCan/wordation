<?php
/**
 * The theme header template.
 *
 * This template displays all of the <head> section and everything up until <main id="main" class="row site-main" role="main">.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordation
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> dir="ltr">
<head>
<!--
  Theme: Wordation
  Developed by: AmmoCan
-->
<!-- Basic Page Needs
  ================================================== -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- Browser Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- RSS
  ================================================== -->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="alternate" type="application/rss+xml" title="Wordation » Feed" href="<?php echo esc_url( home_url( '/' ) ); ?>feed/">
<!-- Styling and Scripts
  ================================================== -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="skip-link show-for-sr" href="#primary"><?php esc_html_e( 'Skip to content', 'wordation' ); ?></a>
<?php
  $svg_sprite = file_get_contents( get_template_directory() . '/assets/dist/sprite/sprite.svg' );
	echo $svg_sprite;
?>
  <header id="masthead" class="" role="banner" data-sticky-container>
    <?php
      // Adjust the breakpoint of the title-bar by adjusting this variable.
      $breakpoint = 'large';
    ?>
    <nav id="site-navigation" class="top-bar topbar-responsive" role="navigation" data-sticky data-sticky-on="small" data-anchor="masthead" data-margin-top="0">

      <div class="top-bar-title">

        <span data-responsive-toggle="wordation-menu" data-hide-for="<?php echo esc_attr( $breakpoint ); ?>">
          <button class="menu-icon" type="button" data-toggle></button>
        </span><!-- Mobile menu icon container -->

        <svg class="icon">
          <use href="#icon-logo" xlink:href="#icon-logo"></use>
        </svg><!-- Insert logo -->

        <a class="topbar-responsive-logo" href="#"><strong><?php esc_html( bloginfo( 'name' ) ); ?></strong></a><!-- Insert site name -->

      </div><!-- .top-bar-title -->

      <div id="wordation-menu" class="topbar-responsive-links">
        <div class="top-bar-right">
            <?php
            wordation_primary_menu();
            ?><!-- Insert primary top menu -->
        </div>
      </div><!-- #wordation-menu -->

  	</nav><!-- #site-navigation -->

  </header><!-- #masthead -->
  <main id="main" class="row site-main" role="main">
