<?php 

/* Template Name: Single Page */

?>

<?php get_header(); ?>

			<article>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h2><?php the_title(); ?></h2>

				<address><?php if(get_field('street_number') && get_field('street_name')) {
					$pin_svg = file_get_contents(get_stylesheet_directory() . '/images/pin.svg');
					echo get_field('street_number') . ' ' . get_field('street_name') . ' <a href="http://maps.google.com/maps?q=' . get_field('street_number') . '+' . get_field('street_name') . ',+Brunswick+VIC+3056" target=\"blank\" class=\"pin\">' . $pin_svg . '</a>';
				} ?></address>

				<div class="this-pub-has">
				<?php $categories = get_the_category();
						
					foreach ($categories as $category):
						$svg_image = file_get_contents(get_stylesheet_directory() . '/images/svg/' . $category->slug . '.svg'); ?>

						<div class="icon">

						<?php if($svg_image):
							echo $svg_image; ?>
							<div class="tooltip"><?php echo $category->name; ?></div>
						<?php endif; ?>

						</div>
					<?php endforeach;

					if(get_field('number-of-beers')):
						$svg_image = file_get_contents(get_stylesheet_directory() . '/images/svg/beer.svg'); ?>
						<div class="icon">
							<?php echo $svg_image; ?>
							<div class="tooltip no-of">No. of beers</div>
							<div class="mob-tooltip"><?php echo get_field('number-of-beers'); ?> beers</div>
						</div>
						<div class="no-of-drinks">x <?php echo get_field('number-of-beers'); ?></div>
					<?php endif;

					if(get_field('number-of-wines')):
						$svg_image = file_get_contents(get_stylesheet_directory() . '/images/svg/wine.svg'); ?>
						<div class="icon">
							<?php echo $svg_image; ?>
							<div class="tooltip no-of">No. of wines</div>
							<div class="mob-tooltip"><?php echo get_field('number-of-wines'); ?> wines</div>
						</div>
						<div class="no-of-drinks">x <?php echo get_field('number-of-wines'); ?></div>
					<?php endif;
				?>
				</div>

				<section id="pubGallery" class="gallery">
					<?php 
						if( have_rows('pictures') ):
							while ( have_rows('pictures') ) : the_row();

								$image = get_sub_field('picture'); ?>

							<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

					<?php	endwhile;
						endif; ?>
				</section>

				<?php the_content(); ?>

				<div class="date">visited on <?php echo get_the_time('l, jS F Y'); ?></div>

				<?php endwhile; endif; ?>

			</article>

<?php get_footer(); ?>