<?php get_header(); ?>

	<div class="container">
		<h1>Blog</h1>

		<div class="row">
			<div class="main col-sm-8">
				<?php while(have_posts()): the_post() ?>
				<?php get_template_part( 'template-parts/content', 'single'); ?>
				<?php endwhile; ?>

				<?php echo pagination() ?>
			</div>

			<?php get_sidebar('blog') ?>
		</div>
	</div>

<?php get_footer(); ?>
