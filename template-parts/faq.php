<?php
/**
 * FAQ Section
 *
 * Pulls from the `faq_item` CPT, ordered by menu_order.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_query = new WP_Query(
	array(
		'post_type'      => 'faq_item',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);
?>

<section class="block" id="faq">
	<div class="wrap">

		<div class="faq__grid">

			<div class="reveal">
				<span class="section-tag"><?php esc_html_e( 'Common Questions', 'asadazam' ); ?></span>
				<h2 class="section-title"><?php
					echo wp_kses_post( __( 'Answers, before you have to <em>ask</em>.', 'asadazam' ) );
				?></h2>
				<p class="section-sub"><?php esc_html_e( 'If something\'s not covered here, message me on WhatsApp or email — typical reply is under 12 hours, often much faster.', 'asadazam' ); ?></p>
			</div>

			<div class="faq__list reveal">

				<?php if ( $faq_query->have_posts() ) : ?>
					<?php while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
						<div class="faq__item">
							<button class="faq__q">
								<?php the_title(); ?>
								<span class="faq__icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
								</span>
							</button>
							<div class="faq__a">
								<?php echo wp_kses_post( get_the_content() ); ?>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php else : ?>
					<div style="padding: 24px; color: var(--mute); border: 1px dashed var(--border); border-radius: var(--radius-lg); text-align: center;">
						<p>No FAQ items yet. Add via <strong>WP Admin &rarr; FAQ &rarr; Add New</strong>.</p>
					</div>
				<?php endif; ?>

			</div>

		</div>
	</div>
</section>
