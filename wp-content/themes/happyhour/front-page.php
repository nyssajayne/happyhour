<?php get_header(); ?>

<section>

	<div class="bars">
		<div class="bar-sizer"></div>
		<div class="bar-gutter"></div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

			if(get_post_status() == 'publish'):
				$rows = get_field('pictures');
				
				if( have_rows('pictures') ):
					$image = '<img src="' . $rows[0]['picture']['sizes']['medium'] . '"  alt="' . get_the_title() . '" />';
				else:
					$image = file_get_contents(get_stylesheet_directory() . '/images/placeholder.svg');
				endif;
			else:
				$image = file_get_contents(get_stylesheet_directory() . '/images/placeholder.svg');
			endif; ?>

		<div class="bar <?php echo get_post_status(); foreach((get_the_category()) as $category) { echo ' ' . $category->slug; } ?>">
		<?php if(get_post_status() == 'publish'): ?>
			<a href="<?php the_permalink(); ?>">
		<?php endif; ?>
				<div class="bar-wrapper">
					<div class="image">
						<?php echo $image; ?>
					</div>
					<div class="text">
						<span class="title"><?php
						$title;
						if(strlen(get_the_title()) > 100) {
						$titleCut = substr(get_the_title(), 0, 25);
						$title = substr($titleCut, 0, strrpos($titleCut, ' ')) . ' ...';
						}
						else {
							$title = get_the_title();
						}
						echo $title;  ?></span><br />
						<span class="address"><?php echo get_field('street_number') . ' ' . get_field('street_name'); ?></span>
					</div>
				</div>
		<?php if(get_post_status() == 'publish'): ?>
			</a>
		<?php endif; ?>
		</div>
		<?php endwhile;
		endif; ?>

	</div>

	<div class="clearfix"></div>

</section>

<?php get_footer(); ?>