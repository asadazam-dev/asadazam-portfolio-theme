<?php
/**
 * Custom Post Types
 *
 * Three CPTs power the entire dynamic portion of the portfolio:
 *
 * - project     → the work grid section (9 cards in v4)
 * - testimonial → the reviews section (5 cards in v4)
 * - faq_item    → the FAQ accordion (6 items in v4)
 *
 * One taxonomy: project_category (Custom Theme / WooCommerce / Service Site).
 * This drives the work-grid filter buttons.
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all CPTs and taxonomies on init.
 *
 * @return void
 */
function asadazam_register_cpts() {

	// ============================================================
	// PROJECT — the work section
	// ============================================================
	register_post_type(
		'project',
		array(
			'labels'              => array(
				'name'                  => __( 'Projects', 'asadazam' ),
				'singular_name'         => __( 'Project', 'asadazam' ),
				'add_new'               => __( 'Add New Project', 'asadazam' ),
				'add_new_item'          => __( 'Add New Project', 'asadazam' ),
				'edit_item'             => __( 'Edit Project', 'asadazam' ),
				'new_item'              => __( 'New Project', 'asadazam' ),
				'view_item'             => __( 'View Project', 'asadazam' ),
				'view_items'            => __( 'View Projects', 'asadazam' ),
				'search_items'          => __( 'Search Projects', 'asadazam' ),
				'not_found'             => __( 'No projects found', 'asadazam' ),
				'not_found_in_trash'    => __( 'No projects found in trash', 'asadazam' ),
				'all_items'             => __( 'All Projects', 'asadazam' ),
				'menu_name'             => __( 'Projects', 'asadazam' ),
				'featured_image'        => __( 'Project Mockup Image', 'asadazam' ),
				'set_featured_image'    => __( 'Set project mockup', 'asadazam' ),
				'remove_featured_image' => __( 'Remove project mockup', 'asadazam' ),
				'use_featured_image'    => __( 'Use as project mockup', 'asadazam' ),
			),
			'public'              => true,
			'has_archive'         => true,
			'show_in_rest'        => true,                // Enables Gutenberg editor.
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-portfolio',
			'rewrite'             => array(
				'slug'       => 'projects',
				'with_front' => false,
			),
			'supports'            => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'page-attributes',                        // Enables custom ordering via "Order" field.
				'revisions',
			),
			'show_in_nav_menus'   => true,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
		)
	);

	// project_category taxonomy — drives work-grid filter buttons.
	register_taxonomy(
		'project_category',
		'project',
		array(
			'labels'            => array(
				'name'              => __( 'Project Categories', 'asadazam' ),
				'singular_name'     => __( 'Project Category', 'asadazam' ),
				'search_items'      => __( 'Search Categories', 'asadazam' ),
				'all_items'         => __( 'All Categories', 'asadazam' ),
				'edit_item'         => __( 'Edit Category', 'asadazam' ),
				'update_item'       => __( 'Update Category', 'asadazam' ),
				'add_new_item'      => __( 'Add New Category', 'asadazam' ),
				'new_item_name'     => __( 'New Category Name', 'asadazam' ),
				'menu_name'         => __( 'Categories', 'asadazam' ),
			),
			'hierarchical'      => true,                  // Like categories, not tags.
			'public'            => true,
			'show_admin_column' => true,                  // Shows category in the project list table.
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'projects/category',
				'with_front' => false,
			),
		)
	);

	// ============================================================
	// TESTIMONIAL — the reviews section
	// ============================================================
	register_post_type(
		'testimonial',
		array(
			'labels'              => array(
				'name'               => __( 'Testimonials', 'asadazam' ),
				'singular_name'      => __( 'Testimonial', 'asadazam' ),
				'add_new'            => __( 'Add New Testimonial', 'asadazam' ),
				'add_new_item'       => __( 'Add New Testimonial', 'asadazam' ),
				'edit_item'          => __( 'Edit Testimonial', 'asadazam' ),
				'all_items'          => __( 'All Testimonials', 'asadazam' ),
				'menu_name'          => __( 'Testimonials', 'asadazam' ),
			),
			'public'              => false,                // Not browseable as standalone pages.
			'show_ui'             => true,                  // But editable in admin.
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-format-quote',
			'has_archive'         => false,
			'rewrite'             => false,
			'supports'            => array(
				'title',                                   // Holds the author name (e.g. "Daniel Marsh").
				'editor',                                  // Holds the testimonial body text.
				'page-attributes',                         // For custom ordering.
			),
			'show_in_nav_menus'   => false,
		)
	);

	// ============================================================
	// FAQ ITEM — the FAQ accordion
	// ============================================================
	register_post_type(
		'faq_item',
		array(
			'labels'              => array(
				'name'               => __( 'FAQ Items', 'asadazam' ),
				'singular_name'      => __( 'FAQ Item', 'asadazam' ),
				'add_new'            => __( 'Add New FAQ', 'asadazam' ),
				'add_new_item'       => __( 'Add New FAQ', 'asadazam' ),
				'edit_item'          => __( 'Edit FAQ', 'asadazam' ),
				'all_items'          => __( 'All FAQs', 'asadazam' ),
				'menu_name'          => __( 'FAQ', 'asadazam' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_position'       => 7,
			'menu_icon'           => 'dashicons-format-status',
			'has_archive'         => false,
			'rewrite'             => false,
			'supports'            => array(
				'title',                                   // The question.
				'editor',                                  // The answer.
				'page-attributes',                         // For custom ordering.
			),
			'show_in_nav_menus'   => false,
		)
	);
}
add_action( 'init', 'asadazam_register_cpts' );

/**
 * On theme activation, flush rewrite rules so CPT permalinks work without
 * the user having to manually visit Settings → Permalinks.
 *
 * @return void
 */
function asadazam_flush_rewrite_on_activation() {
	asadazam_register_cpts();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'asadazam_flush_rewrite_on_activation' );

/**
 * Seed default project categories on theme activation.
 * Saves the user from having to create them manually first time.
 *
 * @return void
 */
function asadazam_seed_project_categories() {
	$defaults = array(
		'custom-theme' => 'Custom Themes',
		'woocommerce'  => 'WooCommerce',
		'service-site' => 'Service Sites',
	);

	foreach ( $defaults as $slug => $name ) {
		if ( ! term_exists( $slug, 'project_category' ) ) {
			wp_insert_term(
				$name,
				'project_category',
				array( 'slug' => $slug )
			);
		}
	}
}
add_action( 'after_switch_theme', 'asadazam_seed_project_categories', 20 );
