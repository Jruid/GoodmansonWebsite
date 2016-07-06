<?php get_header(); ?>

		<div class="container">
			<div class="row">
				<?php $callouts = get_field('field_572664d3ed48d', get_the_ID()); ?>
				<?php if($callouts): ?>
				<?php foreach($callouts as $k => $calloutId): ?>
				<?php $callout = new WP_Query(array('post_type' => 'callouts', 'posts_per_page' => 1, 'p' => $calloutId)); ?>
				<?php while($callout->have_posts()): $callout->the_post() ?> 
				<a class="callout col-sm-4" href="<?php echo get_field('link', get_the_ID()) ?>">
					<h2><?php the_title() ?></h2>
					<img src="<?php echo get_field('image', get_the_ID()) ?>" alt="">
					<br><br>
					<p><?php echo get_field('snippet', get_the_ID()) ?></p>
					<span>Learn More &gt;&gt;</span>
				</a>
				<?php endwhile; endforeach; endif; ?>
			</div>
		</div>

<?php get_footer(); ?>
