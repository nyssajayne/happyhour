<?php 

/* Template Name: Page Contact */

?>

<?php get_header(); ?>

			<article>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h2><?php the_title(); ?></h2>

				<?php echo do_shortcode('[contact-form-7 id="38" title="Contact Us"]'); ?>

				<?php endwhile; endif; ?>

			</article>

<?php get_footer(); ?>