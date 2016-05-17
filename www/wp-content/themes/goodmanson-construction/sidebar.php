  			<aside class="sidebar col-sm-4">

          <div class="box gray">
  					<h3>How Are We Doing?</h3>
  					<p>Share comments, kudos & concerns by completing our Customer Survey.</p>
  					<a class="text-btn" href="<?php echo get_the_permalink(190) ?>">Commercial Survey</a>
  					<a class="text-btn" href="<?php echo get_the_permalink(172) ?>">Residential Survey</a>
  				</div>
  
          <?php $testimonials = new WP_Query(array('post_type' => 'testimonials', 'post_per_page' => 2, 'orderby' => 'rand', 'cat' => 5)); ?>
          <?php if($testimonials->have_posts()): ?>			
          <div class="box">
            <h3>From Our Clients</h3>
            <?php while($testimonials->have_posts()): $testimonials->the_post() ?>  
  					<p>"<?php echo get_the_content() ?>"<br>
  					<em><?php echo get_the_title() ?></em></p>
            <?php endwhile ?>
  					<a href="">Read more testimonials &gt;&gt;</a>
  				</div>
          <?php endif; ?>
  				
  				<div class="box">
  					<h3>We're Hiring!</h3>
  					<a class="text-btn blue" href="<?php echo get_the_permalink(137) ?>">See Current Openings</a>
  				</div>
  			</aside>
