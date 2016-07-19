	</div>

	<div class="container text-center">
		<a class="text-btn blue-hover" href="<?php echo get_permalink(102) ?>">Request a Free Estimate Today</a>
	</div>

	<footer id="site-footer">
	
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<h4>Featured Services</h4>
					<div class="link-list">
						<?php $featured_services_links = get_field('featured_services_links', 'option'); ?>
						<?php if(count($featured_services_links)): ?>
						<?php foreach($featured_services_links as $k => $link): ?>
						<a href="<?php echo $link['featured_services_link_url'] ?>"><?php echo $link['featured_services_link_text'] ?></a>
						<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
				
				<div class="col-sm-3">
					<h4>From Our Blog</h4>
					<div class="link-list">
						<?php $blog = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3)); ?>
						<?php if($blog->have_posts()): ?>
						<?php while($blog->have_posts()): $blog->the_post() ?> 
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						<?php endwhile; endif; ?>
					</div>
				</div>
				
				<div class="col-sm-3">
					<h4><?php echo get_field('open_content_column_header', 'option'); ?></h4>
					<p><?php echo get_field('open_content_column_content', 'option') ?></p>
					<p><a href="<?php echo get_field('open_content_column_link', 'option') ?>"><?php echo get_field('open_content_column_link_text', 'option') ?></a></p>
				</div>
				
				<div class="col-sm-3 p-margin">
					<h4>Contact Us</h4>
					<p>651-636-4996</p>
					<p><a href="mailto:Sales@goodmansonconstruction.com">Sales@goodmansonconstruction.com</a></p>
					<div class="social-bookmarks">
						<a href="http://www.facebook.com/pages/Goodmanson-Construction/161132829150"></a>
						<a href="https://twitter.com/GoodmansonConst"></a>
						<a href="https://youtube.com/channel/UCytDpBW2fVPalIMc-scOsNA"></a>
						<a href="https://www.linkedin.com/company/goodmanson-construction"></a>
						<a href="mailto:Sales@goodmansonconstruction.com"></a>
					</div>
				</div>
			</div>
			
			<small class="copy">&copy; <?php echo date("Y") ?> Goodmanson Construction, Roseville, MN. All Rights Reserved. Licensed, Bonded &amp; Insured. MN License #BC627075</small>
		</div>
	
	</footer>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="scripts/vendor/jquery.min.js"><\/script>')</script>
	<script src="<?php echo get_bloginfo('template_url') ?>/js/bootstrap.js"></script>
	<script src="<?php echo get_bloginfo('template_url') ?>/js/functions.js"></script>
	<script src="<?php echo get_bloginfo('template_url') ?>/js/popup.js"></script>

	<?php wp_footer(); ?>

	</body>
</html>