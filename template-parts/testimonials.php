<?php
/**
 * Testimonials Section
 *
 * Pulls from the `testimonial` CPT. The first testimonial flagged as
 * "featured" gets the large quote display + 2-column span. Others render
 * as standard cards.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Featured testimonial(s) first, then the rest.
$featured_query = new WP_Query(
	array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 1,
		'meta_query'     => array(
			array(
				'key'     => 'testimonial_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

$rest_query = new WP_Query(
	array(
		'post_type'      => 'testimonial',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'meta_query'     => array(
			'relation' => 'OR',
			array(
				'key'     => 'testimonial_featured',
				'value'   => '1',
				'compare' => '!=',
			),
			array(
				'key'     => 'testimonial_featured',
				'compare' => 'NOT EXISTS',
			),
		),
	)
);

$has_any = $featured_query->have_posts() || $rest_query->have_posts();
?>

<section class="block" id="testimonials">
	<div class="wrap">

		<div class="testimonials__head">
			<div class="reveal">
				<span class="section-tag"><?php esc_html_e( 'Feedback', 'asadazam' ); ?></span>
				<h2 class="section-title"><?php
					echo wp_kses_post( __( 'What teams say after <em>working</em> with me.', 'asadazam' ) );
				?></h2>
			</div>
			<p class="testimonials__head-right reveal">
				<?php esc_html_e( 'Project managers, agency leads, and clients I\'ve delivered WordPress and WooCommerce work for over the last four years.', 'asadazam' ); ?>
			</p>
		</div>

		<div class="testimonials__grid">

			<?php if ( ! $has_any ) : ?>

				<div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--mute); border: 1px dashed var(--border); border-radius: var(--radius-lg);">
					<p>No testimonials yet. Add via <strong>WP Admin &rarr; Testimonials &rarr; Add New</strong>.</p>
				</div>

			<?php else : ?>

				<?php /* Featured testimonial first — large display, spans 2 columns */ ?>
				<?php if ( $featured_query->have_posts() ) : ?>
					<?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
						<?php
						$role     = asadazam_field( 'testimonial_role', get_the_ID(), '' );
						$initials = asadazam_field( 'testimonial_initials', get_the_ID(), substr( get_the_title(), 0, 2 ) );
						?>
						<div class="testimonial testimonial--featured testimonial--span2 reveal">
							<span class="testimonial__quote-mark">"</span>
							<div class="testimonial__body">
								<?php echo wp_kses_post( get_the_content() ); ?>
							</div>
							<div class="testimonial__attr">
								<div class="testimonial__avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
								<div>
									<div class="testimonial__name"><?php the_title(); ?></div>
									<div class="testimonial__role"><?php echo esc_html( $role ); ?></div>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php endif; ?>

				<?php /* Other testimonials — standard cards */ ?>
				<?php if ( $rest_query->have_posts() ) : ?>
					<?php while ( $rest_query->have_posts() ) : $rest_query->the_post(); ?>
						<?php
						$role     = asadazam_field( 'testimonial_role', get_the_ID(), '' );
						$initials = asadazam_field( 'testimonial_initials', get_the_ID(), substr( get_the_title(), 0, 2 ) );
						?>
						<div class="testimonial reveal">
							<span class="testimonial__quote-mark">"</span>
							<div class="testimonial__body">
								<?php echo wp_kses_post( get_the_content() ); ?>
							</div>
							<div class="testimonial__attr">
								<div class="testimonial__avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
								<div>
									<div class="testimonial__name"><?php the_title(); ?></div>
									<div class="testimonial__role"><?php echo esc_html( $role ); ?></div>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php endif; ?>

			<?php endif; ?>

		</div>
	</div>
</section>
