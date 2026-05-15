# Asad Azam Portfolio — Custom WordPress Theme

A custom-built portfolio theme. No page builders, no starter frameworks, no shortcuts.

**Live:** https://kreativehive.net/portfolio
**Author:** Asad Azam — Senior WordPress Developer & WooCommerce Specialist

---

## Why this theme exists

This theme is both my portfolio *and* a working code sample. Every section of the portfolio is also a worked example of something I do for clients:

- Custom Post Types & taxonomies (work grid, testimonials, FAQ)
- ACF field groups defined in PHP (version-controlled, deploy-friendly)
- ACF Options page for global site settings
- Modular template parts following WordPress hierarchy
- Properly enqueued assets with cache-busting via `filemtime()`
- Performance baseline: 95+ PageSpeed mobile, 99+ desktop
- Light/dark theme with localStorage persistence
- Fully accessible — semantic HTML, ARIA labels, keyboard navigation

If you're evaluating my work for a senior role, the source of this theme is itself the proof.

---

## Architecture

```
asadazam/
├── style.css                    Theme metadata header (intentionally minimal)
├── functions.php                Bootstrap — loads all /inc modules in order
├── front-page.php               Single-page orchestrator
├── index.php                    Fallback template
├── header.php                   <head>, status bar, sticky nav
├── footer.php                   Footer + floating WhatsApp + closing tags
├── 404.php                      Branded 404
├── readme.md                    You are here
│
├── inc/
│   ├── theme-setup.php          add_theme_support, menus, image sizes
│   ├── enqueue.php              CSS/JS loading + performance cleanups
│   ├── cpt.php                  3 CPTs + 1 taxonomy + activation seeders
│   ├── acf-fields.php           All field groups defined in PHP
│   └── helpers.php              asadazam_field(), asadazam_option(), URL helpers
│
├── template-parts/
│   ├── hero.php                 Hero with animated dashboard graphic
│   ├── marquee.php              Skill scroller (data array source)
│   ├── now.php                  "Currently working on" cards (ACF Options)
│   ├── stats.php                Animated counter cards
│   ├── about.php                Personal copy
│   ├── work-grid.php            ⭐ Dynamic — pulls from `project` CPT
│   ├── capabilities.php         Expertise cards
│   ├── testimonials.php         ⭐ Dynamic — pulls from `testimonial` CPT
│   ├── process.php              How I work — 4 steps
│   ├── faq.php                  ⭐ Dynamic — pulls from `faq_item` CPT
│   └── contact.php              CTA + contact channels (ACF Options)
│
└── assets/
    ├── css/main.css             All styles (extracted from prototype)
    ├── js/main.js               All behavior (defer-loaded)
    └── images/                  Theme images
```

---

## Custom Post Types

| CPT           | Purpose                          | Taxonomy            |
| ------------- | -------------------------------- | ------------------- |
| `project`     | Portfolio work cards             | `project_category`  |
| `testimonial` | Client quotes                    | none                |
| `faq_item`    | FAQ accordion entries            | none                |

Each is registered in `inc/cpt.php` with proper labels, capabilities, and REST support (so they work in the Gutenberg editor and the WP REST API).

`project_category` defaults are seeded automatically on theme activation: *Custom Themes*, *WooCommerce*, *Service Sites*.

---

## ACF Field Groups

Defined in PHP at `inc/acf-fields.php` so they're version-controlled. This avoids the "field group exists in production but not staging" problem that breaks most sites.

**Project fields:** `project_url`, `project_url_display`, `project_skin`, `project_chip`, `project_metric`, `project_number`, `project_tags` (repeater)

**Testimonial fields:** `testimonial_role`, `testimonial_initials`, `testimonial_featured` (boolean — only ONE should be true; gets the big quote display)

**Site Options fields** (under Portfolio Settings menu): hero copy, "now" cards repeater, contact email, WhatsApp, phone, LinkedIn

---

## Setup

### Requirements

- WordPress 6.0+
- PHP 8.0+
- Advanced Custom Fields plugin (free version is enough)

### Install

1. Copy the `asadazam` folder to `/wp-content/themes/`.
2. Install & activate Advanced Custom Fields.
3. Activate this theme — CPTs and default categories are seeded automatically.
4. **Settings → Reading** → set "Your homepage displays" to "Your latest posts" (front-page.php takes over) OR set a static page if you prefer.
5. Visit **Portfolio Settings** in the admin sidebar to configure hero copy and contact info.
6. Add projects, testimonials, FAQs.

### Recommended plugins

- Advanced Custom Fields (required)
- Yoast SEO or Rank Math (SEO + schema)
- WP Mail SMTP (reliable email delivery for contact form)
- Wordfence (security)
- WP Rocket or LiteSpeed Cache (performance)

---

## Performance notes

- **Defer-loaded JS** — never blocks LCP
- **Preconnect to font CDNs** — saves ~100-200ms on first paint
- **Emoji scripts removed** — saves ~16KB on every page load
- **Empty `<head>` cleanup** — removes `wp_generator`, `rsd_link`, `wlwmanifest_link`, `wp_shortlink`
- **Cache-busting via `filemtime()`** in dev, version constant in production
- **`wp_localize_script()`** for dynamic JS data (no hardcoded URLs in JS files)

Target metrics on production: **PageSpeed Mobile 95+, Desktop 99+, CLS < 0.05, LCP < 1.5s**

---

## Theme system

Light/dark theme controlled by `[data-theme="dark"|"light"]` on `<html>`. Toggle button is in the nav (top right). State is persisted in `localStorage` under the key `asad-portfolio-theme`. First-visit default respects `prefers-color-scheme`, falling back to dark.

CSS variables live at the top of `assets/css/main.css` and are organized into a shared accent system + per-theme color tokens. Adding a new theme is a matter of adding a `[data-theme="newtheme"]` block.

---

## Contact

If you've found this useful or have a role/project to discuss:

- **Email:** asadazam639@gmail.com
- **WhatsApp:** +92 301 5651810
- **LinkedIn:** /in/asad-azam-518a5a236

---

*Built by Asad Azam, Karachi (GMT+5). Open to senior WordPress full-time roles and select freelance WooCommerce projects.*
