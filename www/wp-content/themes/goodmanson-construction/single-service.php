<?php get_header(); ?>

	<div class="container">
  		<div class="row">
  			<div class="main col-sm-8">
  				<?php $images = get_field('gallery'); ?>
					<?php if( $images ): $i = 0; $j = 1 ?>
					<?php $the_id = get_the_ID(); if($the_id == 241): ?>
					<?php foreach( $images as $image ): ?>
					<?php if($i == 0) {
						echo '<div class="popup-gallery">';
						echo '<a class="launch" href="'.$image['sizes']['gallery'].'">Launch Gallery</a>';
					} ?>
						<?php if($i > 0) {
							echo '<a href="'.$image['sizes']['gallery'].'">';
						} ?>
							<img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>">
						<?php if($i > 0) {
							echo '</a>';
						} ?>
						<?php endif ?>
						<?php $total = count($images) ?>
						<?php if($j == $total) {
							echo '</div>';
						} ?>
					<?php $i++; $j++; endforeach ?>
					<br>
					<br>
					<small>(<?php echo $total ?> images)</small>
					<?php else: $i = 0 ?>
  				<div id="gallery-slider" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php foreach( $images as $image ): ?>
						<div class="item <?php echo ($i == 0)? 'active' : ''; ?>">
							<img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>
						<?php $i++; endforeach; ?>
					</div>

					<a class="left carousel-control" href="#gallery-slider" role="button" data-slide="prev"></a>
					<a class="right carousel-control" href="#gallery-slider" role="button" data-slide="next"></a>
					<?php endif; endif ?>
					
					<h1><?php the_title() ?></h1>
					<?php while(have_posts()): the_post() ?>
					<?php the_content() ?>
					<?php endwhile; ?>
				</div>

			<?php get_sidebar() ?>
		</div>
	</div>

<?php get_footer(); ?>