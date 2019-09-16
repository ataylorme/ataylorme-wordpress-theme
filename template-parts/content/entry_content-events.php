<?php
/**
 * Template part for displaying a events's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="entry-content">
	<?php
	$talk_formats = get_field( 'formats' );
	if ( $talk_formats && ! empty( $talk_formats ) ) :
		?>
		<p>
			<?php
			printf(
				/* translators: %s: comma separated list of the talk formats (e.g. workshop, lightning talk) */
				esc_html__( '<strong>Presentation formats:</strong> %s', 'wp-rig' ),
				esc_html( implode( ', ', $talk_formats ) )
			);
			?>
		</p>
		<?php
	endif;

	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-rig' ),
				[
					'span' => [
						'class' => [],
					],
				]
			),
			get_the_title()
		)
	);

	$event_details = [
		'year' => [
			'label' => esc_html__( 'Year', 'wp-rig' ),
		],
		'month' => [
			'label' => esc_html__( 'Month', 'wp-rig' ),
		],
		'online' => [
			'label' => esc_html__( 'Online', 'wp-rig' ),
		],
		'country' => [
			'label' => esc_html__( 'Country', 'wp-rig' ),
		],
		'region' => [
			'label' => esc_html__( 'Region', 'wp-rig' ),
		],
		'city' => [
			'label' => esc_html__( 'City', 'wp-rig' ),
		],
	];

	foreach ( $event_details as $key => $event_detail ) :

		$event_details[ $key ]['value'] = get_field( $key );
		if ( ! $event_details[ $key ]['value'] ) :
			unset( $event_details[ $key ] );
		endif;
	endforeach;

	if ( ! empty( $event_details ) ) :
		?>
		<h3>
			<?php esc_html_e( 'Event Details:', 'wp-rig' ); ?>
		</h3>
		<ul>
			<?php
			foreach ( $event_details as $event_detail ) :
				?>
					<li><?php echo esc_html( $event_detail['label'] ); ?>: <?php echo esc_html( $event_detail['value'] ); ?></li>
				<?php
			endforeach;
			?>
		</ul>
		<?php
	endif;

	$presentations = get_field( 'presentation' );

	if ( $presentations ) :
		?>
		<h3>
			<?php esc_html_e( 'Presentations given:', 'wp-rig' ); ?>
		</h3>
		<ul>
		<?php
		foreach ( $presentations as $post ) :
			setup_postdata( $post );
			?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
		<?php endforeach; ?>
		</ul>
		<?php
		wp_reset_postdata();
	endif;
	?>
</div><!-- .entry-content -->
