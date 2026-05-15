<?php
/**
 * Capabilities / Expertise Section
 *
 * Four expertise cards. Static — these reflect Asad's actual skill set
 * which doesn't shift week to week.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="block" id="capabilities">
	<div class="wrap">

		<div class="reveal" style="margin-bottom: 56px;">
			<span class="section-tag"><?php esc_html_e( 'Expertise', 'asadazam' ); ?></span>
			<h2 class="section-title"><?php
				echo wp_kses_post( __( 'What I bring to a <em>WordPress</em> team.', 'asadazam' ) );
			?></h2>
		</div>

		<div class="caps__grid">

			<div class="cap reveal">
				<div class="cap__head">
					<div class="cap__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
					</div>
					<h3 class="cap__title"><?php esc_html_e( 'Custom Theme Development', 'asadazam' ); ?></h3>
				</div>
				<p class="cap__list"><strong>Figma &middot; Adobe XD &middot; PSD to WordPress</strong> conversion, hand-coded with Custom Post Types, ACF fields, taxonomies, and clean archive templates &mdash; so your team can update content without breaking the layout.</p>
			</div>

			<div class="cap reveal">
				<div class="cap__head">
					<div class="cap__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></svg>
					</div>
					<h3 class="cap__title"><?php esc_html_e( 'WooCommerce &amp; Payments', 'asadazam' ); ?></h3>
				</div>
				<p class="cap__list"><strong>Custom checkout flows, payment gateway integrations, product variations</strong> &amp; conditional cart logic &mdash; building stores that actually convert and run reliably in production.</p>
			</div>

			<div class="cap reveal">
				<div class="cap__head">
					<div class="cap__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9z"/></svg>
					</div>
					<h3 class="cap__title"><?php esc_html_e( 'Performance Optimization', 'asadazam' ); ?></h3>
				</div>
				<p class="cap__list"><strong>Core Web Vitals, PageSpeed improvements, caching, image optimization</strong> &amp; database cleanup &mdash; making slow WordPress sites fast and keeping fast sites fast as they scale.</p>
			</div>

			<div class="cap reveal">
				<div class="cap__head">
					<div class="cap__icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
					</div>
					<h3 class="cap__title"><?php esc_html_e( 'Plugins, Hosting &amp; Deployment', 'asadazam' ); ?></h3>
				</div>
				<p class="cap__list"><strong>Lightweight custom plugins, plugin customization, security hardening basics, cPanel, migrations</strong> &amp; production deployment &mdash; the practical work that keeps WordPress projects shipping smoothly.</p>
			</div>

		</div>
	</div>
</section>
