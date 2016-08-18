<?php get_header(); ?>

	<div class="container">
  		<div class="row">
  			<div class="main col-sm-8">
  			    
					<h1><?php the_title() ?></h1>
					<?php while(have_posts()): the_post() ?>
					<?php the_content() ?>
					<?php endwhile; ?>
				</div>

			<?php get_sidebar() ?>
		</div>
	</div>

<?php get_footer(); ?>