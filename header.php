<?php
/**
 * Theme Header
 *
 * Document open + status bar + nav + side rotated label.
 * Maps to lines ~1432-1505 of the v4 HTML file.
 *
 * @package AsadAzam
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="theme-color" content="#0c0a09" />

<?php /* Performance: preconnect to font CDNs as early as possible. */ ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php /* Side rotated label (preserved from v4) */ ?>
<div class="side-label">Asad Azam · Portfolio · Karachi</div>

<?php /* Status bar at top */ ?>
<div class="status-bar">
	<div class="wrap">
		<div class="status-bar__left">
			<span class="status-pill">
				<span class="status-dot"></span>
				Available · Open to roles
			</span>
			<span>Karachi · GMT+5</span>
		</div>
		<div class="status-bar__right">
			<span>Local <span class="status-bar__time" id="liveTime">—</span></span>
			<span>Reply &lt; 12h</span>
			<span>v<?php echo esc_html( ASADAZAM_THEME_VERSION ); ?></span>
		</div>
	</div>
</div>

<?php /* Sticky nav */ ?>
<nav id="nav">
	<div class="nav__inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__brand">
			<span class="nav__brand-mark">A</span>
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="nav__links">
			<?php
			/*
			 * Use a registered menu if one exists; fall back to anchor links to
			 * the homepage sections (which is correct for a single-page portfolio).
			 */
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'nav__menu-list',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/#about' ) ); ?>" class="nav__link">About</a>
				<a href="<?php echo esc_url( home_url( '/#work' ) ); ?>" class="nav__link">Work</a>
				<a href="<?php echo esc_url( home_url( '/#capabilities' ) ); ?>" class="nav__link">Capabilities</a>
				<a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>" class="nav__link">Reviews</a>
				<a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>" class="nav__link">FAQ</a>
				<?php
			}
			?>
		</div>

		<div class="nav__right">
			<button class="theme-toggle" id="themeToggle" aria-label="<?php esc_attr_e( 'Toggle theme', 'asadazam' ); ?>">
				<svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
				<svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
			</button>
			<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="nav__cta">
				<?php esc_html_e( 'Hire me', 'asadazam' ); ?>
				<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
			</a>
		</div>
	</div>
</nav>
