<?php
/**
 * Load theme cleanup, setup and build.
 *
 * @package Wordation
 */

define( 'WORDATION_VERSION', '1.0.0' );
define( 'WORDATION_DIR', __DIR__ );
define( 'WORDATION_URL', get_template_directory_uri() );

/**
 * Load functions from includes.
 */
// Clean up functions.
require_once( get_template_directory() . '/includes/cleanup.php' );
// Register all navigation menus.
require_once( get_template_directory() . '/includes/navigation.php' );
// Add menu walkers.
require_once( get_template_directory() . '/includes/class-wordation-topbar-navwalker.php' );
// Custom Sidebars for this theme.
require_once( get_template_directory() . '/includes/widget-areas.php' );
// Load Enqueue Styles & Scripts file.
require_once( get_template_directory() . '/includes/enqueue.php' );
// Implement the Setup for this theme.
require_once( get_template_directory() . '/includes/theme-setup.php' );
// Implement the Custom Login feature.
require_once( get_template_directory() . '/includes/custom-login.php' );
// Custom template tags for this theme.
require_once( get_template_directory() . '/includes/template-tags.php' );
// Custom functions that act independently of the theme templates.
require_once( get_template_directory() . '/includes/extras.php' );
// Customizer additions.
require_once( get_template_directory() . '/includes/customizer.php' );
// Load Jetpack compatibility file.
require_once( get_template_directory() . '/includes/jetpack.php' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordation_content_width', 1200 );
}
add_action( 'after_setup_theme', 'wordation_content_width', 0 );

/**
 * Add IE conditional Google Fonts to header.
 */
function wordation_add_ie_google_fonts() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans:400,700">' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'wordation_add_ie_google_fonts' );

/**
 * Add inline Google Fonts styling to header.
 */
function wordation_add_inline_google_fonts() {
    echo '<style>' . "\n";
    echo "@font-face {font-family:'Dosis';font-style:normal;font-weight:400;src:local('Dosis Regular'),local('Dosis-Regular'),url(https://fonts.gstatic.com/s/dosis/v6/Ewe0SEXPrakEimFzbOGwB6CWcynf_cDxXwCLxiixG1c.woff)format('woff');}" . '\n';
    echo "@font-face {font-family:'Dosis';font-style:normal;font-weight:700;src:local('Dosis Bold'),local('Dosis-Bold'),url(https://fonts.gstatic.com/s/dosis/v6/x-7NZTw0n-ypOAaIE8uSrnYhjbSpvc47ee6xR_80Hnw.woff)format('woff');}" . '\n';
    echo "@font-face {font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3bO3LdcAZYWl9Si6vvxL-qU.woff)format('woff');}" . '\n';
    echo "@font-face {font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'),local('OpenSans-Bold'),url(https://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzKRDOzjiPcYnFooOUGCOsRk.woff)format('woff');}" . '\n';
    echo '</style>' . "\n";
}
add_action( 'wp_head', 'wordation_add_inline_google_fonts' );

/*
 *<-- Delete this line and the comment opener above if you want to add Google Analytics to your site.
// Add Google Analytics
function wordation_google_analytics() {
  // Enter your unique Google Analytics code inside the single quotes below.
  $googleCode =  'Enter Your Analytics Code Here';
?>
  <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?php echo $googleCode ?>', 'auto');
	  ga('send', 'pageview');
  </script>
<?php
}
add_action( 'wp_footer', 'wordation_google_analytics', 26, 1 );

--> Delete this line and the comment closer below if you want to add Google Analytics to your site.
*/

/**
 * Enable oEmbed shortcode support to text widget
 * & Enable auto-embed support to text widget
*/
add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
add_filter( 'widget_text', array( $wp_embed, 'autoembed' ), 8 );

/**
 * Allow shortcodes to be used in the text widget
*/
add_filter( 'widget_text', 'do_shortcode' );
