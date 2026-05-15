<?php
/**
 * About Section
 *
 * Static personal copy. Preserved from v4.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="about" id="about">
	<div class="wrap">
		<div class="about__grid">
			<div class="reveal">
				<span class="section-tag"><?php esc_html_e( 'About', 'asadazam' ); ?></span>
				<h2 class="section-title"><?php
					echo wp_kses_post( __( 'Four years of <em>real</em> production work &mdash; not theory.', 'asadazam' ) );
				?></h2>
			</div>
			<div class="about__copy reveal">
				<p>I'm a Senior WordPress Developer at <strong>MBE Digital</strong>, where I work on live production sites for clients across North America. My day-to-day involves <strong>custom theme development, WooCommerce builds, payment gateway integrations, and performance optimization</strong> &mdash; the kind of work where the code has to ship, run reliably, and be maintainable by someone else six months from now.</p>
				<p>Most of what I've learned came from owning real problems. <em>Slow sites that needed to load fast.</em> Checkouts that needed conditional logic. Designs in Figma that needed to become pixel-accurate, accessible WordPress themes. Migrations that couldn't lose data. I treat every project like the people using it deserve software that works.</p>
				<p>I keep things grounded &mdash; clean code, honest timelines, clear communication. No buzzwords, no over-promising. Just dependable WordPress development from someone who takes ownership of what he ships.</p>
			</div>
		</div>
	</div>
</section>
