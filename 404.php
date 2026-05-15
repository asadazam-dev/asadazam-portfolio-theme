<?php
/**
 * 404 Template
 *
 * @package AsadAzam
 */

get_header();
?>

<main id="main-content" role="main">
	<section class="block contact">
		<div class="wrap">
			<div class="contact__inner">
				<span class="section-tag" style="justify-content: center;">404</span>
				<h2 class="contact__title">
					This page is <em>missing</em>.
				</h2>
				<p class="contact__sub">
					Looks like that URL doesn't exist on this portfolio. Head back to the homepage and you'll find what you're looking for.
				</p>
				<div class="contact__cta-row">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
						Back to portfolio
						<svg class="btn__arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
					</a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
