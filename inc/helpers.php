<?php
/**
 * Helper Functions
 *
 * Small reusable utilities used across template parts.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Safely get an ACF field with a fallback.
 * Avoids "undefined function" errors if ACF is deactivated.
 *
 * @param string $field    Field name.
 * @param int|string $post_id Post ID, or 'option' for options page.
 * @param mixed  $fallback What to return if ACF is missing or field is empty.
 * @return mixed
 */
function asadazam_field( $field, $post_id = false, $fallback = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $fallback;
	}
	$value = get_field( $field, $post_id );
	return ( '' === $value || null === $value || false === $value ) ? $fallback : $value;
}

/**
 * Get an option from the ACF Options page with fallback.
 *
 * @param string $field    Field name.
 * @param mixed  $fallback Fallback if not set.
 * @return mixed
 */
function asadazam_option( $field, $fallback = '' ) {
	return asadazam_field( $field, 'option', $fallback );
}

/**
 * Format a project number — pads single digits to "/ 001" style.
 *
 * @param string|int $num Raw number (e.g. "1", "001", "/ 002").
 * @return string Formatted (e.g. "/ 001").
 */
function asadazam_format_project_number( $num ) {
	$num = (string) $num;
	$num = preg_replace( '/[^0-9]/', '', $num );      // Strip non-digits.
	if ( '' === $num ) {
		return '';
	}
	return '/ ' . str_pad( $num, 3, '0', STR_PAD_LEFT );
}

/**
 * Get all project_category terms in a deterministic order.
 * Used by the work-grid filter buttons.
 *
 * @return array Terms.
 */
function asadazam_get_project_categories() {
	$terms = get_terms(
		array(
			'taxonomy'   => 'project_category',
			'hide_empty' => true,
			'orderby'    => 'term_order',
		)
	);
	return is_wp_error( $terms ) ? array() : $terms;
}

/**
 * Generate the WhatsApp deep link with a pre-filled message.
 *
 * @param string $message Optional pre-filled message.
 * @return string URL.
 */
function asadazam_whatsapp_url( $message = '' ) {
	$num = asadazam_option(
		'contact_whatsapp',
		'923015651810'
	);
	$message = $message ? $message : 'Hi Asad, I found your portfolio and wanted to discuss a WordPress opportunity.';
	return 'https://wa.me/' . $num . '?text=' . rawurlencode( $message );
}

/**
 * Generate the mailto link with a subject.
 *
 * @param string $subject Email subject.
 * @return string mailto URL.
 */
function asadazam_mailto_url( $subject = '' ) {
	$email   = asadazam_option( 'contact_email', 'asadazam639@gmail.com' );
	$subject = $subject ? $subject : 'Inquiry — WordPress role/project';
	return 'mailto:' . antispambot( $email ) . '?subject=' . rawurlencode( $subject );
}
