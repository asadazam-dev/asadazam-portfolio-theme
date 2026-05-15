<?php
/**
 * Now / Currently Section
 *
 * Three "what I'm working on right now" cards. Pulled from the ACF Options
 * Page so they can be updated easily — important because static cards
 * become a lie if not refreshed regularly.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_cards = array(
	array(
		'label' => 'Building',
		'text'  => '<strong>Custom WooCommerce checkout flow</strong> with conditional fields and a streamlined payment step.',
	),
	array(
		'label' => 'Optimizing',
		'text'  => 'Improving <strong>Core Web Vitals &amp; PageSpeed</strong> on a high-traffic production WordPress site.',
	),
	array(
		'label' => 'Shipping',
		'text'  => 'A <strong>Figma-to-WordPress</strong> custom theme build with reusable templates and clean ACF fields.',
	),
);

$cards = asadazam_option( 'now_cards', $default_cards );
if ( empty( $cards ) || ! is_array( $cards ) ) {
	$cards = $default_cards;
}

// SVG icons keyed by label keyword.
$icons = array(
	'building'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
	'optimizing' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
	'shipping'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>',
);

function asadazam_now_icon( $label, $icons ) {
	$key = strtolower( trim( $label ) );
	return isset( $icons[ $key ] ) ? $icons[ $key ] : reset( $icons );
}
?>

<section class="now">
	<div class="wrap">
		<div class="now__grid">

			<div class="reveal">
				<div class="now__head">
					<span class="now__indicator">
						<span class="now__indicator-dot"></span>
						<?php esc_html_e( 'Currently', 'asadazam' ); ?>
					</span>
				</div>
				<h3 class="now__title"><?php
					echo wp_kses_post( __( 'What I\'m <em>working on</em> right now &mdash;', 'asadazam' ) );
				?></h3>
			</div>

			<div class="now__list reveal">
				<?php foreach ( $cards as $card ) : ?>
					<div class="now__card">
						<div class="now__card-head">
							<?php echo asadazam_now_icon( $card['label'], $icons ); // SVG, hardcoded ?>
							<?php echo esc_html( $card['label'] ); ?>
						</div>
						<div class="now__card-text">
							<?php echo wp_kses_post( $card['text'] ); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
