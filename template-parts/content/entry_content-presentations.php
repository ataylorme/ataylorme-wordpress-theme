<?php
/**
 * Template part for displaying a presentation's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="entry-content">
	<?php
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

	$presentation_formats = get_field( 'formats' );
	if ( $presentation_formats && ! empty( $presentation_formats ) ) :
		?>
		<p>
			<?php
			printf(
				/* translators: %s: comma separated list of the presentation formats (e.g. workshop, lightning talk) */
				wp_kses( '<strong>Presentation formats:</strong> %s', 'wp-rig' ),
				esc_html( implode( ', ', $presentation_formats ) )
			);
			?>
		</p>
		<?php
	endif;

	$resources = [
		'slide_link' => [
			'label' => esc_html__( 'Slides', 'wp-rig' ),
		],
		'recording_link' => [
			'label' => esc_html__( 'Recording', 'wp-rig' ),
		],
	];

	foreach ( $resources as $key => $resource ) :

		$resources[ $key ]['value'] = get_field( $key );
		if ( ! $resources[ $key ]['value'] ) :
			unset( $resources[ $key ] );
		endif;
	endforeach;

	if ( ! empty( $resources ) ) :
		?>
		<h3>
			<?php esc_html_e( 'Resources:', 'wp-rig' ); ?>
		</h3>
		<ul>
			<?php
			foreach ( $resources as $resource ) :
				?>
					<li><a href="<?php echo esc_url( $resource['value'] ); ?>"><?php echo esc_html( $resource['label'] ); ?></a></li>
				<?php
			endforeach;
			?>
		</ul>
		<?php
	endif;

	$ids = get_field( 'events', false, false );

	$events_query = new \WP_Query(
		[
			'post_type'      => 'events',
			'posts_per_page' => 3,
			'post__in'       => $ids,
			'post_status'    => 'published',
			'orderby'        => 'date',
		]
	);

	if( $events_query->have_posts() ) :
		?>
		<h3>
			<?php esc_html_e( 'Presented at:', 'wp-rig' ); ?>
		</h3>
		<ul>
		<?php
		while ( $events_query->have_posts() ) :
			$events_query->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
			<?php
		endwhile;
		?>
		</ul>
		<?php
	endif;

	wp_reset_postdata();
	?>
</div><!-- .entry-content -->
