<?php get_header(); ?>

  	<div class="container">
  		<div class="row">
  			<div class="main col-sm-8">
  				<h1><?php the_title() ?></h1>
  				<div class="popup-gallery">
	  				<?php $staff = new WP_Query(array('post_type' => 'staff', 'post_per_page' => -1)); ?>	
	          <?php $i = 0; $j = 1; while($staff->have_posts()): $staff->the_post() ?>
	          <?php 
	          $total = $staff->post_count;
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'gallery' );
						$url = $thumb['0']; 
						?>
						<?php if($i == 0) {
							echo '<div class="row">';
						} ?>
							<div class="col-sm-3 staff">
			          <a href="<?php echo $url ?>" title="<?php echo the_title().', '.get_the_content() ?>">
			          	<img src="<?php echo $url ?>" alt="">
			          </a>
			        </div>
		        <?php if($i == 3 OR $j == $total) {
							echo '</div>';
						} ?>
	          <?php ($i == 3)? $i = 0 : $i++; $j++; endwhile ?>
          </div>
        </div>
  			
  			<?php get_sidebar() ?>

  		</div>
  	</div>

<?php get_footer(); ?>
