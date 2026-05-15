<?php
/**
 * Theme Setup
 *
 * Declares what features the theme supports. Runs on `after_setup_theme`,
 * which is the correct hook for these declarations.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme support flags & menu locations.
 *
 * @return void
 */
function asadazam_theme_setup() {

	// Let WordPress manage the document title via wp_title().
	add_theme_support( 'title-tag' );

	// Standard image features.
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );

	// HTML5 markup output for core elements (instead of ancient XHTML output).
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	// Custom logo support — handy if you ever want to swap the brand mark via WP admin.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 60,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// One menu location — the main nav. Single source of truth.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'asadazam' ),
		)
	);

	// Register an image size for project mockup thumbnails (used later in single-project.php).
	add_image_size( 'asadazam-project-thumb', 800, 450, true );
}
add_action( 'after_setup_theme', 'asadazam_theme_setup' );

/**
 * Set the default content width — affects oEmbeds and large images.
 *
 * @return void
 */
function asadazam_content_width() {
	$GLOBALS['content_width'] = 1280;
}
add_action( 'after_setup_theme', 'asadazam_content_width', 0 );
