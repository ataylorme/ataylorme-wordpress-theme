<?php
/**
 * Template part for displaying a post's header
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! is_search() && ! is_front_page() ) {
	?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() ); ?>
	</header><!-- .entry-header -->
	<?php
}
