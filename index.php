<?php
/**
 * Fallback Template
 *
 * Required by WordPress. Used when no more specific template matches.
 * For a single-page portfolio, we just redirect to the front page.
 *
 * @package AsadAzam
 */

get_header();
?>

<main id="main-content" role="main">
	<section class="block">
		<div class="wrap">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class(); ?>>
						<h1 class="section-title"><?php the_title(); ?></h1>
						<div class="about__copy">
							<?php the_content(); ?>
						</div>
					</article>
				<?php endwhile; ?>

				<?php the_posts_pagination(); ?>

			<?php else : ?>
				<h1 class="section-title">Nothing here yet.</h1>
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&larr; Back to portfolio</a></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
