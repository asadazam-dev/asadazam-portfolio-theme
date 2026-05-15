<?php
/**
 * Hero Section
 *
 * Pulls all hero content from the Portfolio Settings ACF Options Page.
 * If ACF is missing or fields are empty, falls back to v4 default copy.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fetch with sensible fallbacks so the section renders even before ACF is set up.
$eyebrow_tag  = asadazam_option( 'hero_eyebrow_tag', 'SR. DEV' );
$eyebrow_text = asadazam_option( 'hero_eyebrow_text', 'Senior WordPress Developer · WooCommerce Specialist' );
$hero_title   = asadazam_option( 'hero_title', 'Building scalable, <span class="accent-word">performance-focused</span> WordPress solutions.' );
$hero_lede    = asadazam_option( 'hero_lede', 'Senior WordPress Developer at <strong>MBE Digital</strong> with <strong>4 years of hands-on production experience</strong> across custom themes, WooCommerce stores, and payment integrations. Currently open to <strong>senior full-time roles</strong> (remote &amp; on-site) and select freelance projects.' );
?>

<section class="hero" id="top">
	<div class="wrap">
		<div class="hero__grid">

			<div class="hero__copy">

				<div class="reveal">
					<span class="hero__eyebrow">
						<span class="hero__eyebrow-tag"><?php echo esc_html( $eyebrow_tag ); ?></span>
						<span><?php echo esc_html( $eyebrow_text ); ?></span>
					</span>
				</div>

				<h1 class="hero__title reveal">
					<?php echo wp_kses_post( $hero_title ); ?>
				</h1>

				<div class="hero__lede reveal">
					<?php echo wp_kses_post( $hero_lede ); ?>
				</div>

				<div class="hero__cta-row reveal">
					<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn--primary">
						<?php esc_html_e( 'Start a project', 'asadazam' ); ?>
						<svg class="btn__arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
					</a>
					<a href="<?php echo esc_url( home_url( '/#work' ) ); ?>" class="btn btn--ghost"><?php esc_html_e( 'View work', 'asadazam' ); ?></a>
				</div>
			</div>

			<?php /* Animated dashboard graphic — preserved exactly from v4 */ ?>
			<div class="hero__visual reveal">
				<div class="dash">
					<div class="dash__sticker">Live · 99.9% uptime</div>

					<div class="dash__chrome">
						<div class="dash__lights">
							<div class="dash__light"></div>
							<div class="dash__light"></div>
							<div class="dash__light"></div>
						</div>
						<div class="dash__url">
							<svg class="dash__url-lock" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
							<span><span class="dash__url-domain">site-monitor</span>.<?php echo esc_html( wp_parse_url( home_url(), PHP_URL_HOST ) ); ?></span>
						</div>
					</div>

					<div class="dash__body">
						<div class="dash__card">
							<div class="dash__card-head">
								<span class="dash__card-label">PageSpeed</span>
								<span class="dash__card-tag dash__card-tag--ok">Excellent</span>
							</div>
							<div class="dash__score">
								<div class="dash__score-ring">
									<svg viewBox="0 0 60 60">
										<circle class="dash__score-bg" cx="30" cy="30" r="24"/>
										<circle class="dash__score-fg" cx="30" cy="30" r="24"/>
									</svg>
									<div class="dash__score-num">96</div>
								</div>
								<div class="dash__score-info">
									<span class="dash__score-name">Mobile Score</span>
									<span class="dash__score-meta">+54 from baseline</span>
								</div>
							</div>
						</div>

						<div class="dash__card">
							<div class="dash__card-head">
								<span class="dash__card-label">Security</span>
								<span class="dash__card-tag dash__card-tag--ok">Hardened</span>
							</div>
							<div class="dash__bars">
								<div class="dash__bar-row">
									<span class="dash__bar-name">FW</span>
									<span class="dash__bar"><span class="dash__bar-fill" data-w="96"></span></span>
									<span class="dash__bar-val">96%</span>
								</div>
								<div class="dash__bar-row">
									<span class="dash__bar-name">SSL</span>
									<span class="dash__bar"><span class="dash__bar-fill" data-w="92"></span></span>
									<span class="dash__bar-val">A+</span>
								</div>
								<div class="dash__bar-row">
									<span class="dash__bar-name">2FA</span>
									<span class="dash__bar"><span class="dash__bar-fill" data-w="78"></span></span>
									<span class="dash__bar-val">ON</span>
								</div>
							</div>
						</div>

						<div class="dash__card dash__row">
							<div class="dash__card-head">
								<span class="dash__card-label">Recent Activity</span>
								<span class="dash__card-tag dash__card-tag--warn">Live</span>
							</div>
							<div class="dash__log">
								<div class="dash__log-row">
									<svg class="dash__log-icon dash__log-icon--ok" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
									<span>Malware scan complete &middot; 0 threats</span>
									<span class="dash__log-time" style="margin-left:auto">2m ago</span>
								</div>
								<div class="dash__log-row">
									<svg class="dash__log-icon dash__log-icon--accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M13 2L3 14h9l-1 8 10-12h-9z"/></svg>
									<span>Cache rebuilt &middot; 1.2s saved</span>
									<span class="dash__log-time" style="margin-left:auto">14m ago</span>
								</div>
								<div class="dash__log-row">
									<svg class="dash__log-icon dash__log-icon--ok" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14M22 4L12 14.01l-3-3"/></svg>
									<span>Deploy v<?php echo esc_html( ASADAZAM_THEME_VERSION ); ?> &middot; production</span>
									<span class="dash__log-time" style="margin-left:auto">1h ago</span>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<?php /* Hero meta strip */ ?>
		<div class="hero__meta reveal">
			<div class="hero__meta-cell">
				<span class="hero__meta-label">Based in</span>
				<span class="hero__meta-value">Karachi, PK <small>GMT+5</small></span>
			</div>
			<div class="hero__meta-cell">
				<span class="hero__meta-label">Currently</span>
				<span class="hero__meta-value">Sr. Dev @ MBE Digital</span>
			</div>
			<div class="hero__meta-cell">
				<span class="hero__meta-label">Stack</span>
				<span class="hero__meta-value">WordPress &middot; WooCommerce &middot; PHP</span>
			</div>
			<div class="hero__meta-cell">
				<span class="hero__meta-label">Open to</span>
				<span class="hero__meta-value">Full-time &amp; freelance</span>
			</div>
		</div>

	</div>
</section>
