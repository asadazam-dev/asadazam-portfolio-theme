<?php
/**
 * Stats Section
 *
 * Four counter cards. Static — these numbers don't change often, and when
 * they do you want to update the file (touch git, deploy) rather than
 * forget to sync them across environments.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="block" id="stats">
	<div class="wrap">
		<div class="reveal" style="margin-bottom: 56px;">
			<span class="section-tag"><?php esc_html_e( 'Track Record', 'asadazam' ); ?></span>
			<h2 class="section-title"><?php
				echo wp_kses_post( __( 'Real numbers from <em>real</em> production work.', 'asadazam' ) );
			?></h2>
		</div>

		<div class="stats__grid">

			<div class="stat reveal">
				<div class="stat__head">
					<div class="stat__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
					</div>
					<span class="stat__num">/01</span>
				</div>
				<div class="stat__number"><span class="counter" data-target="4">4</span><sup>+</sup></div>
				<p class="stat__label"><?php esc_html_e( 'Years of hands-on WordPress development experience', 'asadazam' ); ?></p>
			</div>

			<div class="stat reveal">
				<div class="stat__head">
					<div class="stat__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><path d="M9 22V12h6v10"/></svg>
					</div>
					<span class="stat__num">/02</span>
				</div>
				<div class="stat__number"><span class="counter" data-target="25">25</span><sup>+</sup></div>
				<p class="stat__label"><?php esc_html_e( 'Custom WordPress &amp; WooCommerce projects delivered end-to-end', 'asadazam' ); ?></p>
			</div>

			<div class="stat reveal">
				<div class="stat__head">
					<div class="stat__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9z"/></svg>
					</div>
					<span class="stat__num">/03</span>
				</div>
				<div class="stat__number"><span class="counter" data-target="90">90</span><sup>+</sup></div>
				<p class="stat__label"><?php esc_html_e( 'Average PageSpeed score after performance optimization passes', 'asadazam' ); ?></p>
			</div>

			<div class="stat reveal">
				<div class="stat__head">
					<div class="stat__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
					</div>
					<span class="stat__num">/04</span>
				</div>
				<div class="stat__number"><span class="counter" data-target="100">100</span><sup>%</sup></div>
				<p class="stat__label"><?php esc_html_e( 'On-time delivery rate across production projects to date', 'asadazam' ); ?></p>
			</div>

		</div>
	</div>
</section>
