<?php
/**
 * Process / How I Work Section
 *
 * Four-step process. Static — represents Asad's actual workflow.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Steps as a data array — easy to update one place if process refines.
$steps = array(
	array(
		'name' => '<em>Requirements</em> &amp; Planning',
		'desc' => 'Understand the goal, the audience, the constraints. Review designs, agree on scope and deliverables, and lock down what success looks like &mdash; before any code gets written.',
	),
	array(
		'name' => '<em>Architecture</em> Planning',
		'desc' => 'Decide post types, taxonomies, template structure, plugin choices, and where to write custom code vs. lean on existing tools. Aim: minimal moving parts, easy to maintain.',
	),
	array(
		'name' => 'Clean <em>Development</em>',
		'desc' => 'Build the theme, integrate WooCommerce or payment gateways, wire up forms and dynamic templates. Code stays readable, organized, and follows WordPress standards.',
	),
	array(
		'name' => '<em>Testing</em>, Launch &amp; Support',
		'desc' => 'Cross-browser testing, performance pass, mobile checks, and a clean deployment to production. Post-launch support and ongoing maintenance available when you need it.',
	),
);
?>

<section class="process" id="process">
	<div class="wrap">

		<div class="process__head reveal">
			<span class="section-tag"><?php esc_html_e( 'How I Work', 'asadazam' ); ?></span>
			<h2 class="section-title"><?php
				echo wp_kses_post( __( 'A practical process built on <em>real</em> project experience.', 'asadazam' ) );
			?></h2>
		</div>

		<div class="process__steps">
			<?php foreach ( $steps as $step ) : ?>
				<div class="step reveal">
					<span class="step__num"></span>
					<h3 class="step__name"><?php echo wp_kses_post( $step['name'] ); ?></h3>
					<p class="step__desc"><?php echo wp_kses_post( $step['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
