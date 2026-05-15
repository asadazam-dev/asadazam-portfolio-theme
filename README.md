# Asad Azam Portfolio Theme

A custom WordPress theme built from scratch. No page builders, no starter frameworks, no shortcuts.

🌐 **Live site:** [kreativehive.net/portfolio](https://kreativehive.net/portfolio/)
👤 **Author:** Asad Azam — Senior WordPress Developer & WooCommerce Specialist
📍 **Based in:** Karachi, Pakistan
💼 **Status:** Open to senior full-time roles (remote & on-site) and select freelance WooCommerce projects

---

## What this is

This is both my portfolio *and* a public code sample. Every section of the live portfolio is also a worked example of something I do for clients:

- Custom Post Types & taxonomies (work grid, testimonials, FAQ)
- ACF field groups registered in PHP (version-controlled, deploy-friendly)
- ACF Options page for global site settings
- Modular template parts following the WordPress template hierarchy
- Properly enqueued assets with cache-busting via `filemtime()` in dev
- Performance baseline: 96 PageSpeed desktop, 85+ mobile (Core Web Vitals: TBT 0, CLS 0)
- Light/dark theme with localStorage persistence
- Async-loaded Google Fonts (non-render-blocking)
- Accessibility-first: semantic HTML, ARIA labels, keyboard navigation

If you're evaluating my work for a senior WordPress role, the source of this theme is the proof.

---

## Architecture

```
asadazam-portfolio-theme/
├── style.css                    Theme metadata header (intentionally minimal)
├── functions.php                Bootstrap — loads modular includes
├── front-page.php               Single-page orchestrator
├── index.php                    Fallback template
├── header.php                   <head>, status bar, sticky nav
├── footer.php                   Footer + floating WhatsApp + closing tags
├── 404.php                      Branded 404 page
├── readme.md                    Internal dev-focused docs
│
├── inc/
│   ├── theme-setup.php          add_theme_support, menus, image sizes
│   ├── enqueue.php              CSS/JS loading + performance hooks
│   ├── cpt.php                  3 CPTs + 1 taxonomy + activation seeders
│   ├── acf-fields.php           ACF field groups defined in PHP
│   └── helpers.php              asadazam_field(), asadazam_option(), URL helpers
│
├── template-parts/              Modular section components
│   ├── hero.php                 Hero with animated dashboard graphic
│   ├── marquee.php              Skill scroller
│   ├── now.php                  "Currently working on" cards (ACF Options)
│   ├── stats.php                Animated counter cards
│   ├── about.php                Personal copy
│   ├── work-grid.php            ⭐ Dynamic — pulls from project CPT
│   ├── capabilities.php         Expertise cards
│   ├── testimonials.php         ⭐ Dynamic — pulls from testimonial CPT
│   ├── process.php              How I work — 4 steps
│   ├── faq.php                  ⭐ Dynamic — pulls from faq_item CPT
│   └── contact.php              CTA + contact channels (ACF Options)
│
└── assets/
    ├── css/main.css             Minified production CSS (~38KB)
    └── js/main.js               Minified production JS (~4KB)
```

---

## Custom Post Types

Three CPTs power the dynamic portions of the portfolio:

| CPT           | Purpose                          | Taxonomy            |
| ------------- | -------------------------------- | ------------------- |
| `project`     | Portfolio work cards             | `project_category`  |
| `testimonial` | Client quotes                    | none                |
| `faq_item`    | FAQ accordion entries            | none                |

Each is registered in `inc/cpt.php` with proper labels, capabilities, and REST support (so they work in the Gutenberg editor and the WP REST API). Default project categories are seeded automatically on theme activation: *Custom Themes*, *WooCommerce*, *Service Sites*.

---

## ACF Field Groups (defined in PHP)

Defining ACF field groups in PHP (instead of only in the database) is a senior pattern that:

- Keeps field definitions in version control
- Makes it easy to deploy field changes across environments
- Prevents the "works on my machine, breaks in production" problem

See `inc/acf-fields.php` for the implementation. Field groups cover:

- **Project fields** — URL, color skin, brand chip, metric chip, project number, tags
- **Testimonial fields** — role, initials, featured boolean
- **Site Options** — hero copy, "now" cards repeater, contact info

---

## Performance Optimizations

Real techniques implemented in this theme, with measurable impact on Lighthouse scores:

- **Async Google Fonts** — non-blocking `<link rel="preload">` swap pattern saves ~1,700ms render-blocking time
- **Deferred JavaScript** — `<script defer>` so JS never blocks LCP
- **Minified production CSS/JS** — 28% size reduction
- **Removed emoji scripts** — saves ~16KB on every page load
- **Cleaned `<head>` output** — stripped `wp_generator`, `rsd_link`, `wlwmanifest_link`, etc.
- **Font preconnect** in header.php to warm up DNS/TLS before request
- **Cache-busting** via `filemtime()` in dev mode, version constant in production
- **Progressive enhancement** for animated counters — render correct values even if JS fails

Result: **PageSpeed 96 desktop, 85+ mobile** with Core Web Vitals all green (TBT 0ms, CLS 0).

---

## Setup (if you want to run it locally)

### Requirements

- WordPress 6.0+
- PHP 8.0+
- Advanced Custom Fields plugin (free version is enough)

### Install

1. Copy the theme folder to `/wp-content/themes/`
2. Install & activate Advanced Custom Fields
3. Activate this theme — CPTs and default categories are seeded automatically
4. **Settings → Reading** → set "Your homepage displays" to your preference
5. Visit **Portfolio Settings** in the admin sidebar to configure hero copy and contact info
6. Add projects, testimonials, FAQ items via their respective admin menus

### Recommended Plugins

- Advanced Custom Fields (required)
- Rank Math SEO (or Yoast)
- WP Mail SMTP (reliable email delivery)
- A caching plugin (WP Rocket, LiteSpeed, etc.)

---

## Theme System

Light/dark theme controlled by `[data-theme="dark"|"light"]` on `<html>`. Toggle button is in the nav. State persists in `localStorage` (key: `asad-portfolio-theme`). First-visit default respects `prefers-color-scheme`, falls back to dark.

CSS variables organize into a shared accent system + per-theme tokens. Adding a new theme is a matter of adding a `[data-theme="newtheme"]` block.

---

## Decisions Worth Calling Out

A few choices in this theme that I'd defend in a code review:

1. **No build step.** Plain CSS, plain JS. Senior WordPress devs know that adding webpack/vite to a theme for a single-page site is over-engineering. If the theme needed React components or TypeScript, the build cost would be justified. For this scope, it isn't.

2. **ACF fields in PHP, not the database.** Field group exports work, but PHP definitions live in git. When you deploy this theme to a new environment, fields just appear. No manual import step.

3. **Modular includes, thin functions.php.** Most theme `functions.php` files are 800+ lines of mixed concerns. Mine is 30 lines that loads focused module files. Each module has one job.

4. **Repeater fields replaced with flat individual fields** for tag chips. Repeaters are ACF Pro on some installations and have known rendering issues. Flat fields work everywhere, are easier to query, and are migration-safe.

5. **Progressive enhancement for counters.** Stat numbers render the target value as static HTML. JavaScript animates them when the user scrolls in — but if JS never loads, the numbers are still correct. Most portfolio themes show "0+" if JS fails. This one doesn't.

---

## License

[MIT](LICENSE) — use, fork, modify freely.

---

## Get in touch

- **Email:** asadazam639@gmail.com
- **WhatsApp:** +92 301 5651810
- **LinkedIn:** [in/asad-azam-518a5a236](https://linkedin.com/in/asad-azam-518a5a236/)
- **Portfolio:** [kreativehive.net/portfolio](https://kreativehive.net/portfolio/)

---

*Built by Asad Azam in Karachi, Pakistan. Open to senior WordPress full-time roles and select freelance WooCommerce projects.*
