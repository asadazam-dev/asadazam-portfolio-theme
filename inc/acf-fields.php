<?php
/**
 * Advanced Custom Fields — Field Groups
 *
 * Defining ACF field groups in PHP (instead of only in the database) is a
 * senior pattern that:
 *   - keeps field definitions in version control
 *   - makes it easy to deploy field changes across environments
 *   - prevents the "works on my machine, breaks in production" problem
 *
 * Requires the Advanced Custom Fields plugin (free version is enough).
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all field groups once ACF is initialized.
 * Hooked to `acf/init` (not `init`) so we know ACF has loaded first.
 */
add_action( 'acf/init', 'asadazam_register_field_groups' );

function asadazam_register_field_groups() {

	// Bail if ACF is not active — prevents fatal errors.
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// ============================================================
	// PROJECT FIELDS — extra data for each project beyond title/content
	// ============================================================
	acf_add_local_field_group(
		array(
			'key'      => 'group_project_details',
			'title'    => 'Project Details',
			'fields'   => array(
				array(
					'key'          => 'field_project_url',
					'label'        => 'Live Project URL',
					'name'         => 'project_url',
					'type'         => 'url',
					'instructions' => 'Full URL to the live project (e.g. https://shapespay.com)',
					'required'     => 1,
				),
				array(
					'key'          => 'field_project_url_display',
					'label'        => 'URL Display Text',
					'name'         => 'project_url_display',
					'type'         => 'text',
					'instructions' => 'Short version shown on the card (e.g. "shapespay.com ↗")',
				),
				array(
					'key'          => 'field_project_skin',
					'label'        => 'Mockup Color Skin',
					'name'         => 'project_skin',
					'type'         => 'select',
					'instructions' => 'Determines the gradient color of the project mockup visual.',
					'choices'      => array(
						'fintech'      => 'Fintech (deep indigo)',
						'saas'         => 'SaaS (teal)',
						'editorial'    => 'Editorial (amber)',
						'insurance-1'  => 'Insurance Blue',
						'insurance-2'  => 'Insurance Green',
						'luxury'       => 'Luxury (rose)',
						'ecom'         => 'E-Commerce (orange)',
						'cannabis'     => 'Cannabis (forest)',
						'local'        => 'Local Services (red)',
					),
					'default_value' => 'fintech',
					'required'      => 1,
				),
				array(
					'key'           => 'field_project_chip',
					'label'         => 'Brand Chip Text',
					'name'          => 'project_chip',
					'type'          => 'text',
					'instructions'  => 'Top-left badge on the mockup (e.g. "SHAPESPAY")',
					'required'      => 1,
				),
				array(
					'key'           => 'field_project_metric',
					'label'         => 'Metric Chip Text',
					'name'          => 'project_metric',
					'type'          => 'text',
					'instructions'  => 'Top-right badge (e.g. "Custom Theme", "Lead-Capture")',
				),
				array(
					'key'           => 'field_project_number',
					'label'         => 'Project Number',
					'name'          => 'project_number',
					'type'          => 'text',
					'instructions'  => 'Display number for the card (e.g. "/ 001"). Auto-padded if you enter just "1".',
				),
				array(
					'key'           => 'field_project_tag_1',
					'label'         => 'Tag 1',
					'name'          => 'project_tag_1',
					'type'          => 'text',
					'instructions'  => 'First tag pill shown at the bottom of the card (e.g. "Fintech").',
					'wrapper'       => array( 'width' => '50' ),
				),
				array(
					'key'           => 'field_project_tag_2',
					'label'         => 'Tag 2',
					'name'          => 'project_tag_2',
					'type'          => 'text',
					'instructions'  => 'Second tag pill (e.g. "Payments").',
					'wrapper'       => array( 'width' => '50' ),
				),
				array(
					'key'           => 'field_project_tag_3',
					'label'         => 'Tag 3 (optional)',
					'name'          => 'project_tag_3',
					'type'          => 'text',
					'instructions'  => 'Optional third tag. Leave empty if not needed.',
					'wrapper'       => array( 'width' => '50' ),
				),
				array(
					'key'           => 'field_project_tag_4',
					'label'         => 'Tag 4 (optional)',
					'name'          => 'project_tag_4',
					'type'          => 'text',
					'instructions'  => 'Optional fourth tag. Leave empty if not needed.',
					'wrapper'       => array( 'width' => '50' ),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'project',
					),
				),
			),
			'menu_order' => 0,
			'position'   => 'normal',
			'style'      => 'default',
			'label_placement' => 'top',
		)
	);

	// ============================================================
	// TESTIMONIAL FIELDS
	// ============================================================
	acf_add_local_field_group(
		array(
			'key'      => 'group_testimonial_details',
			'title'    => 'Testimonial Details',
			'fields'   => array(
				array(
					'key'           => 'field_testimonial_role',
					'label'         => 'Author Role / Company',
					'name'          => 'testimonial_role',
					'type'          => 'text',
					'instructions'  => 'e.g. "Founder · DTC E-Commerce Brand, Toronto"',
					'required'      => 1,
				),
				array(
					'key'           => 'field_testimonial_initials',
					'label'         => 'Avatar Initials',
					'name'          => 'testimonial_initials',
					'type'          => 'text',
					'instructions'  => 'Two letters shown in the avatar circle (e.g. "DM")',
					'maxlength'     => 2,
					'required'      => 1,
				),
				array(
					'key'           => 'field_testimonial_featured',
					'label'         => 'Featured (Big Quote)',
					'name'          => 'testimonial_featured',
					'type'          => 'true_false',
					'instructions'  => 'Mark ONE testimonial as featured — it gets the large display style and spans 2 columns.',
					'ui'            => 1,
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'testimonial',
					),
				),
			),
			'menu_order' => 0,
			'position'   => 'normal',
		)
	);

	// ============================================================
	// SITE OPTIONS — global settings (hero copy, contact info, capabilities, etc.)
	// Requires an ACF Options Page (registered below).
	// ============================================================
	acf_add_local_field_group(
		array(
			'key'      => 'group_site_options',
			'title'    => 'Portfolio Settings',
			'fields'   => array(

				// HERO ----
				array(
					'key'   => 'field_options_tab_hero',
					'label' => 'Hero',
					'type'  => 'tab',
				),
				array(
					'key'   => 'field_hero_eyebrow_tag',
					'label' => 'Hero Eyebrow Tag',
					'name'  => 'hero_eyebrow_tag',
					'type'  => 'text',
					'default_value' => 'SR. DEV',
				),
				array(
					'key'   => 'field_hero_eyebrow_text',
					'label' => 'Hero Eyebrow Text',
					'name'  => 'hero_eyebrow_text',
					'type'  => 'text',
					'default_value' => 'Senior WordPress Developer · WooCommerce Specialist',
				),
				array(
					'key'   => 'field_hero_title',
					'label' => 'Hero Title',
					'name'  => 'hero_title',
					'type'  => 'wysiwyg',
					'instructions' => 'Wrap the accent word in a <span class="accent-word">word</span> for the italic serif treatment.',
					'tabs'  => 'visual',
					'toolbar' => 'basic',
					'media_upload' => 0,
				),
				array(
					'key'   => 'field_hero_lede',
					'label' => 'Hero Lede',
					'name'  => 'hero_lede',
					'type'  => 'wysiwyg',
					'tabs'  => 'visual',
					'toolbar' => 'basic',
					'media_upload' => 0,
				),

				// CURRENTLY / NOW ----
				array(
					'key'   => 'field_options_tab_now',
					'label' => 'Currently',
					'type'  => 'tab',
				),
				array(
					'key'           => 'field_now_cards',
					'label'         => 'Now Cards',
					'name'          => 'now_cards',
					'type'          => 'repeater',
					'instructions'  => 'The 3 "currently working on" cards. Update these every 2-4 weeks.',
					'min'           => 3,
					'max'           => 3,
					'layout'        => 'block',
					'button_label'  => 'Add Card',
					'sub_fields'    => array(
						array(
							'key'   => 'field_now_label',
							'label' => 'Label',
							'name'  => 'label',
							'type'  => 'text',
							'instructions' => 'e.g. Building, Optimizing, Shipping',
						),
						array(
							'key'   => 'field_now_text',
							'label' => 'Card Text',
							'name'  => 'text',
							'type'  => 'textarea',
							'rows'  => 2,
						),
					),
				),

				// CONTACT ----
				array(
					'key'   => 'field_options_tab_contact',
					'label' => 'Contact',
					'type'  => 'tab',
				),
				array(
					'key'   => 'field_contact_email',
					'label' => 'Contact Email',
					'name'  => 'contact_email',
					'type'  => 'email',
					'default_value' => 'asadazam639@gmail.com',
				),
				array(
					'key'   => 'field_contact_whatsapp',
					'label' => 'WhatsApp Number',
					'name'  => 'contact_whatsapp',
					'type'  => 'text',
					'default_value' => '923015651810',
					'instructions' => 'Country code + number, no spaces or symbols (e.g. 923015651810)',
				),
				array(
					'key'   => 'field_contact_phone',
					'label' => 'Phone (display)',
					'name'  => 'contact_phone',
					'type'  => 'text',
					'default_value' => '+92 301 5651810',
				),
				array(
					'key'   => 'field_contact_linkedin',
					'label' => 'LinkedIn URL',
					'name'  => 'contact_linkedin',
					'type'  => 'url',
					'default_value' => 'https://linkedin.com/in/asad-azam-518a5a236/',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'asadazam-portfolio-settings',
					),
				),
			),
			'menu_order' => 0,
			'position'   => 'normal',
		)
	);
}

/**
 * Register the ACF Options Page that hosts global site settings.
 */
add_action( 'acf/init', 'asadazam_register_options_page' );

function asadazam_register_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Portfolio Settings',
				'menu_title' => 'Portfolio Settings',
				'menu_slug'  => 'asadazam-portfolio-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'icon_url'   => 'dashicons-admin-customizer',
				'position'   => 4,
			)
		);
	}
}
