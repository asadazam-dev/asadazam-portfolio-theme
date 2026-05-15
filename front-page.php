<?php
/**
 * Front Page Template
 *
 * Orchestrates the single-page portfolio by including each section as a
 * template part. Senior pattern: keep top-level templates as thin orchestrators
 * and put real markup in template-parts.
 *
 * @package AsadAzam
 */

get_header();
?>

<main id="main-content" role="main">

	<?php get_template_part( 'template-parts/hero' ); ?>

	<?php get_template_part( 'template-parts/marquee' ); ?>

	<?php get_template_part( 'template-parts/now' ); ?>

	<?php get_template_part( 'template-parts/stats' ); ?>

	<?php get_template_part( 'template-parts/about' ); ?>

	<?php get_template_part( 'template-parts/work-grid' ); ?>

	<?php get_template_part( 'template-parts/capabilities' ); ?>

	<?php get_template_part( 'template-parts/testimonials' ); ?>

	<?php get_template_part( 'template-parts/process' ); ?>

	<?php get_template_part( 'template-parts/faq' ); ?>

	<?php get_template_part( 'template-parts/contact' ); ?>

</main>

<?php get_footer(); ?>
