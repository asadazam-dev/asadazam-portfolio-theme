<?php
/**
 * Marquee Section
 *
 * Static skill scroller. Defined in code rather than ACF because the list
 * doesn't need to change often and editing in code is faster than spinning
 * up a repeater field.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Single source of truth for skills shown in the marquee.
$skills = array(
	'Custom Themes',
	'WooCommerce',
	'Checkout Customization',
	'Custom Post Types',
	'Payment Gateways',
	'Core Web Vitals',
	'Figma to WordPress',
	'Elementor &amp; WPBakery',
	'Plugin Customization',
	'Migrations &amp; Deployment',
);
?>

<div class="marquee">
	<div class="marquee__track">
		<?php
		// Output the list twice for seamless loop.
		for ( $i = 0; $i < 2; $i++ ) {
			foreach ( $skills as $skill ) {
				echo '<div class="marquee__item">' . wp_kses_post( $skill ) . '</div>';
			}
		}
		?>
	</div>
</div>
