<?php
/**
 * Work Grid Section
 *
 * Dynamic CPT-driven section. Pulls from the `project` post type and
 * generates filter buttons from `project_category` taxonomy.
 *
 * This is the section that demonstrates real WordPress chops:
 *   - Custom Post Type
 *   - Custom taxonomy
 *   - WP_Query loop
 *   - ACF field rendering
 *   - data attributes for client-side filtering
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Build the WP_Query for projects.
$projects_query = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

// Get categories for the filter buttons.
$categories = asadazam_get_project_categories();
?>

<section class="block" id="work" style="padding-top: 60px;">
	<div class="wrap">

		<div class="work__head">
			<div class="reveal">
				<span class="section-tag"><?php esc_html_e( 'Selected Work', 'asadazam' ); ?></span>
				<h2 class="section-title"><?php
					/* translators: emphasized word in italic accent */
					echo wp_kses_post( __( 'Production projects, <em>shipped</em>.', 'asadazam' ) );
				?></h2>
			</div>

			<?php if ( ! empty( $categories ) ) : ?>
				<div class="work__filters reveal" id="filters">
					<button class="work__filter active" data-filter="all"><?php esc_html_e( 'All', 'asadazam' ); ?></button>
					<?php foreach ( $categories as $cat ) : ?>
						<button class="work__filter" data-filter="<?php echo esc_attr( $cat->slug ); ?>">
							<?php echo esc_html( $cat->name ); ?>
						</button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="work__grid" id="workGrid">

			<?php if ( $projects_query->have_posts() ) : ?>

				<?php
				while ( $projects_query->have_posts() ) :
					$projects_query->the_post();

					// Pull all the per-project data.
					$project_url     = asadazam_field( 'project_url', get_the_ID(), '#' );
					$url_display     = asadazam_field( 'project_url_display', get_the_ID(), wp_parse_url( $project_url, PHP_URL_HOST ) . ' ↗' );
					$skin            = asadazam_field( 'project_skin', get_the_ID(), 'fintech' );
					$chip            = asadazam_field( 'project_chip', get_the_ID(), strtoupper( get_the_title() ) );
					$metric          = asadazam_field( 'project_metric', get_the_ID(), 'Custom Theme' );
					$number          = asadazam_format_project_number( asadazam_field( 'project_number', get_the_ID(), '' ) );

					// Build tags array from 4 individual text fields, filter out empties.
					$tags = array_values( array_filter( array(
						asadazam_field( 'project_tag_1', get_the_ID(), '' ),
						asadazam_field( 'project_tag_2', get_the_ID(), '' ),
						asadazam_field( 'project_tag_3', get_the_ID(), '' ),
						asadazam_field( 'project_tag_4', get_the_ID(), '' ),
					), 'strlen' ) );

					// Get the first project_category — drives the filter behavior.
					$post_cats = get_the_terms( get_the_ID(), 'project_category' );
					$cat_slug  = ( ! empty( $post_cats ) && ! is_wp_error( $post_cats ) ) ? $post_cats[0]->slug : '';
					?>

					<a class="project<?php echo has_post_thumbnail() ? ' project--has-image' : ''; ?>"
					   data-skin="<?php echo esc_attr( $skin ); ?>"
					   data-cat="<?php echo esc_attr( $cat_slug ); ?>"
					   href="<?php echo esc_url( $project_url ); ?>"
					   target="_blank"
					   rel="noopener">

						<div class="project__visual">
							<?php if ( $chip ) : ?>
								<div class="project__chip"><?php echo esc_html( $chip ); ?></div>
							<?php endif; ?>

							<?php if ( $metric ) : ?>
								<div class="project__metric">
									<span class="project__metric-dot"></span>
									<?php echo esc_html( $metric ); ?>
								</div>
							<?php endif; ?>

							<?php if ( has_post_thumbnail() ) : ?>
								<?php
								/*
								 * If a Featured Image is set, render it inside a browser-frame
								 * mock to keep the same visual rhythm. The CSS mockup fallback
								 * below is hidden via the .project--has-image class.
								 */
								?>
								<div class="project__mock project__mock--image">
									<div class="project__mock-bar">
										<div class="project__mock-dot"></div>
										<div class="project__mock-dot"></div>
										<div class="project__mock-dot"></div>
									</div>
									<div class="project__mock-image">
										<?php
										the_post_thumbnail(
											'asadazam-project-thumb',
											array(
												'loading'  => 'lazy',
												'decoding' => 'async',
												'alt'      => esc_attr( get_the_title() . ' — project mockup' ),
											)
										);
										?>
									</div>
								</div>
							<?php else : ?>
								<?php /* Fallback: CSS-only abstract mockup with brand-color content bars. */ ?>
								<div class="project__mock">
									<div class="project__mock-bar">
										<div class="project__mock-dot"></div>
										<div class="project__mock-dot"></div>
										<div class="project__mock-dot"></div>
									</div>
									<div class="project__mock-content">
										<div class="project__mock-row"></div>
										<div class="project__mock-row"></div>
										<div class="project__mock-row"></div>
										<div class="project__mock-row"></div>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<div class="project__body">
							<div class="project__head">
								<span class="project__num"><?php echo esc_html( $number ); ?></span>
								<span class="project__url"><?php echo esc_html( $url_display ); ?></span>
							</div>

							<h3 class="project__name"><?php the_title(); ?></h3>

							<div class="project__desc">
								<?php
								// Use excerpt if set, else trim content.
								if ( has_excerpt() ) {
									echo esc_html( get_the_excerpt() );
								} else {
									echo wp_kses_post( wp_trim_words( get_the_content(), 35 ) );
								}
								?>
							</div>

							<div class="project__foot">
								<div class="project__tags">
									<?php foreach ( $tags as $tag_label ) : ?>
										<span class="project__tag"><?php echo esc_html( $tag_label ); ?></span>
									<?php endforeach; ?>
								</div>
								<span class="project__arrow">
									<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M7 17L17 7M9 7h8v8"/></svg>
								</span>
							</div>
						</div>
					</a>

					<?php
				endwhile;
				wp_reset_postdata();
				?>

			<?php else : ?>

				<?php /* Empty state — show v4 example projects until WP admin has data */ ?>
				<div class="reveal" style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--mute); border: 1px dashed var(--border); border-radius: var(--radius-lg);">
					<p>No projects yet. Add some via <strong>WP Admin &rarr; Projects &rarr; Add New</strong>.</p>
				</div>

			<?php endif; ?>

		</div>
	</div>
</section>
