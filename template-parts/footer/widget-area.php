<?php
/**
 * Template part for displaying the footer widget sidebar area
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_footer_sidebar_active() ) {
	return;
}

wp_rig()->print_styles( 'wp-rig-widgets' );
?>
<aside class="footer-sidebar widget-area">
	<?php wp_rig()->display_footer_sidebar(); ?>
</aside><!-- #secondary -->
