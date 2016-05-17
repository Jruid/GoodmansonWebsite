<?php /* Template Name: Testimonials */ ?>
<?php get_header(); ?>

  	<div class="container">
  		<div class="row">
  			<div class="main col-sm-8">
  			<?php
  			if(is_page(187)) {
  				$title = 'Commercial';
  				$id = 6;
  			} else {
  				$title = 'Residential';
  				$id = 5;
  			}
  			?>
  			
  				<h1><?php echo $title ?> Testimonials</h1>
  				
          <?php $testimonials = new WP_Query(array('post_type' => 'testimonials', 'post_per_page' => -1, 'cat' => $id)); ?>
        	<?php if($testimonials->have_posts()): ?>	
          <?php while($testimonials->have_posts()): $testimonials->the_post() ?>  
					<p>"<?php echo get_the_content() ?>"<br>
					<em><?php echo get_the_title() ?></em></p>
					<hr>
          <?php endwhile ?>
					<?php endif ?>
        </div>
  			
  			<?php get_sidebar() ?>

  		</div>
  	</div>

<?php get_footer(); ?>
