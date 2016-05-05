<?php get_header(); ?>

  	<div class="container">
  		<div class="row">
  			<div class="main col-sm-8">
  				<h1><?php the_title() ?></h1>
  				
          <?php while(have_posts()): the_post() ?>
          <?php the_content() ?>
          <?php endwhile; ?>

          <?php $testimonials = new WP_Query(array('post_type' => 'testimonials', 'posts_per_page' => -1)); ?>
          <?php if($testimonials->have_posts()): ?>
          <?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
          <p>"<?php echo get_the_content() ?>"<br>
          <em><?php echo get_the_title() ?></em></p>
          <?php endwhile; endif ?>
        </div>
  			
  			<?php get_sidebar() ?>

  		</div>
  	</div>

<?php get_footer(); ?>