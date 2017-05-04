<?php 

/* Template Name: The Rules */

?>

<?php get_header(); ?>

			<article>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<h2><?php the_title(); ?></h2>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>

				<div class="this-pub-has">

					<?php $categories = get_categories(array('hide_empty' => '0'));
						
						foreach ($categories as $category):
							$svg_image = file_get_contents(get_stylesheet_directory() . '/images/svg/' . $category->slug . '.svg'); ?>

							<div class="category">

								<?php if($svg_image): ?>
								<div class="icon">

								<?php echo $svg_image; ?>

								</div>
								
								<div class="name"><p><span class="title"><?php echo $category->name;?></span>  - <?php echo $category->description; ?></p></div>
								<div class="clearfix"></div>
							<?php endif; ?>

							</div>
						<?php endforeach;
					?>

					<div class="category">
						<div class="icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/svg/beer.svg'); ?></div>
						<div class="name"><p><span class="title">Number of Beers</span>  - This includes on tap and in bottles. Might include cider too if we don't count properly.</p></div>
						<div class="clearfix"></div>
					</div>

					<div class="category">
						<div class="icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/svg/wine.svg'); ?></div>
						<div class="name"><p><span class="title">Number of Wines</span>  - We asked for the wine list so you don't have to.</p></div>
						<div class="clearfix"></div>
					</div>


			</article>

<?php get_footer(); ?>