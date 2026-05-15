<?php
/**
 * Asad Azam Portfolio — Theme Functions
 *
 * Bootstraps the theme by loading modular include files from /inc.
 * Senior pattern: keep functions.php tiny and delegate to focused modules.
 *
 * @package AsadAzam
 * @since   1.0.0
 */

// Block direct file access — security baseline.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme version constant — used for cache-busting in development.
 * Bump this when shipping a major change.
 */
define( 'ASADAZAM_THEME_VERSION', '1.0.5' );

/**
 * Absolute path & URI to the theme — used everywhere.
 */
define( 'ASADAZAM_THEME_DIR', get_template_directory() );
define( 'ASADAZAM_THEME_URI', get_template_directory_uri() );

/**
 * Load theme modules in a specific order.
 * Order matters: theme-setup must run before CPTs (which fire on init).
 */
require_once ASADAZAM_THEME_DIR . '/inc/theme-setup.php';
require_once ASADAZAM_THEME_DIR . '/inc/enqueue.php';
require_once ASADAZAM_THEME_DIR . '/inc/cpt.php';
require_once ASADAZAM_THEME_DIR . '/inc/acf-fields.php';
require_once ASADAZAM_THEME_DIR . '/inc/helpers.php';
