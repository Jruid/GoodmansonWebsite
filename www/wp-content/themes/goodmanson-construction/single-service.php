<?php get_header(); ?>

	<div class="container">
  		<div class="row">
  			<div class="main col-sm-8">
  				<?php $images = get_field('gallery'); ?>
					<?php if( $images ): $i = 0; $j = 1 ?>
					<?php foreach( $images as $image ): ?>
					<?php if($i == 0) {
						echo '<div class="popup-gallery">';
						echo '<a class="launch" href="'.$image['sizes']['gallery'].'">Launch Gallery</a>';
					} ?>
						<?php if($i != 0) {
							echo '<a href="'.$image['sizes']['gallery'].'">';
						} ?>
							<?php if($i == 0): ?>
							<img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>">
							<?php endif ?>
						<?php if($i != 0) {
							echo '</a>';
						} ?>
						<?php $total = count($images) ?>
						<?php if($j == $total) {
							echo '</div>';
						} ?>
					<?php $i++; $j++; endforeach ?>
					<small>(<?php echo $total ?> images)</small>
					<?php endif ?>
					
					<h1><?php the_title() ?></h1>
					<?php while(have_posts()): the_post() ?>
					<?php the_content() ?>
					<?php endwhile; ?>
				</div>

			<?php get_sidebar() ?>
		</div>
	</div>

<?php get_footer(); ?>