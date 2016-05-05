<?php get_header(); ?>

	<div class="container">
		<div class="single-post-header">
			<h2><?php the_title() ?></h2>
			<small><?php echo goodmanson_construction_posted_on() ?></small>
		</div>

  		<div class="row">
  			<div class="main col-sm-8">
  				<article class="single-post single">
				<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				?>
				</article>

				<?php echo goodmanson_construction_entry_footer() ?>
			</div>

			<?php get_sidebar('blog') ?>
		</div>
	</div>

<?php get_footer(); ?>
