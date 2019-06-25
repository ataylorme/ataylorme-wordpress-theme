<?php
/**
 * Template part for displaying a post's header
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<header class="entry-header">
	<?php
	if ( has_post_thumbnail() && is_singular() ) {
		$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		?>
		<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(<?php echo esc_url( $thumbnail_url ); ?>)">
			<div class="wp-block-cover__inner-container">
				<h1 style="font-size:48px;text-align:center">
					<amp-fit-text layout="fixed-height" min-font-size="24" max-font-size="48" height="80">
						<?php the_title(); ?>
					</amp-fit-text>
				</h1>
				<?php
				get_template_part( 'template-parts/content/entry_meta', get_post_type() );
				get_template_part( 'template-parts/content/entry_footer', get_post_type() );
				?>
			</div>
		</div>
		<?php
	} else {
		get_template_part( 'template-parts/content/entry_title', get_post_type() );
		get_template_part( 'template-parts/content/entry_meta', get_post_type() );
	}
	?>
</header><!-- .entry-header -->
