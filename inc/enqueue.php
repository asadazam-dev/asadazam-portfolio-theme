<?php
/**
 * Asset Enqueue
 *
 * Loads stylesheets and scripts the WordPress way — via wp_enqueue_*.
 * Never link CSS/JS directly in header.php — that breaks plugin compatibility
 * and prevents proper dependency/version management.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue front-end assets.
 *
 * Cache-busting strategy:
 * - WP_DEBUG enabled  → use filemtime() so every save busts cache (dev mode)
 * - WP_DEBUG disabled → use ASADAZAM_THEME_VERSION constant (production mode)
 *
 * @return void
 */
function asadazam_enqueue_assets() {

	$ver = ( defined( 'WP_DEBUG' ) && WP_DEBUG )
		? filemtime( ASADAZAM_THEME_DIR . '/assets/css/main.css' )
		: ASADAZAM_THEME_VERSION;

	// --- Google Fonts: load asynchronously to avoid render-blocking ---
	// Standard pattern: load with media="print" so browser doesn't block on it,
	// then swap to media="all" via onload. Fallback to system fonts shows first
	// (gracefully — display=swap handles the FOUT cleanly).
	// We DON'T enqueue this — we add it directly via wp_head with the right
	// attributes that WP's enqueue API cannot produce.

	// --- Main stylesheet ---
	wp_enqueue_style(
		'asadazam-main',
		ASADAZAM_THEME_URI . '/assets/css/main.css',
		array(),
		$ver
	);

	// --- Main JS ---
	$js_ver = ( defined( 'WP_DEBUG' ) && WP_DEBUG )
		? filemtime( ASADAZAM_THEME_DIR . '/assets/js/main.js' )
		: ASADAZAM_THEME_VERSION;

	wp_enqueue_script(
		'asadazam-main',
		ASADAZAM_THEME_URI . '/assets/js/main.js',
		array(),
		$js_ver,
		true // Load in footer for performance.
	);

	// --- Pass dynamic data to JS (e.g. WhatsApp number, contact email) ---
	// Senior pattern: never hardcode dynamic values in JS — pass them via wp_localize_script.
	wp_localize_script(
		'asadazam-main',
		'AsadAzamData',
		array(
			'siteUrl'       => esc_url( home_url() ),
			'whatsappNum'   => '923015651810',
			'contactEmail'  => 'asadazam639@gmail.com',
			'karachiOffset' => 5,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'asadazam_enqueue_assets' );

/**
 * Add `defer` to the main script tag for performance.
 * Improves Core Web Vitals (specifically LCP).
 *
 * @param string $tag    Script HTML tag.
 * @param string $handle Script handle.
 * @return string
 */
function asadazam_defer_scripts( $tag, $handle ) {
	if ( 'asadazam-main' === $handle ) {
		$tag = str_replace( ' src', ' defer src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'asadazam_defer_scripts', 10, 2 );

/**
 * Remove WordPress's default emoji scripts — they hurt PageSpeed for no benefit.
 * Senior optimization that hiring managers notice.
 *
 * @return void
 */
function asadazam_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'asadazam_disable_emojis' );

/**
 * Remove unnecessary <head> noise (WP version, RSD link, wlwmanifest, shortlink).
 * Cleaner HTML output, marginal SEO/security benefit, looks senior.
 *
 * @return void
 */
function asadazam_clean_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'asadazam_clean_head' );

/**
 * Inject Google Fonts asynchronously via wp_head.
 *
 * Uses the "media=print, then swap to all" pattern, which is the modern
 * non-render-blocking technique for third-party CSS. Result: Google Fonts
 * loads in parallel with the rest of the page, never blocking first paint.
 *
 * Why not just wp_enqueue_style? WordPress's enqueue API can't easily inject
 * the media="print" + onload swap attributes — it'd take 3 filters to do
 * what 1 inline output does. Sometimes raw output is the cleaner pattern.
 *
 * @return void
 */
function asadazam_async_fonts() {
	$href = 'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Onest:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap';
	?>
	<link rel="preload"
	      href="<?php echo esc_url( $href ); ?>"
	      as="style"
	      onload="this.onload=null;this.rel='stylesheet'">
	<noscript>
		<link rel="stylesheet" href="<?php echo esc_url( $href ); ?>">
	</noscript>
	<?php
}
add_action( 'wp_head', 'asadazam_async_fonts', 5 );

