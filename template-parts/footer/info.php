<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
	<?php
	$wordpress_link = '<a href="' . esc_url( __( 'https://wordpress.org/', 'wp-rig' ) ) . '">WordPress</a>';
	$wprig_link = '<a href="' . esc_url( __( 'https://wprig.io/', 'wp-rig' ) ) . '">WP Rig</a>';
	printf( esc_html__( 'Proudly powered by %1$s and %2$s', 'wp-rig' ), $wordpress_link, $wprig_link );

	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '<span class="sep"> | </span>' );
	}
	?>
	<span class="sep"> | </span>
	&copy; <?php echo date('Y'); ?> Andrew Taylor
</div><!-- .site-info -->
