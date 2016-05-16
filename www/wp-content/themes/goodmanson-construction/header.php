<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title() ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>

	<script src="<?php echo get_bloginfo('template_url') ?>/js/respond.min.js"></script>

	<script type="text/javascript">
	document.createElement('header');
	document.createElement('nav');
	document.createElement('aside');
	document.createElement('article');
	document.createElement('section');
	document.createElement('footer');
	</script>

	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="site-header">

		<a class="logo visible-xs" href="<?php bloginfo('home'); ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/logo-sm.png" alt="Project"></a>

		<div class="container text-center">
			<span class="call">Call Today: 651-636-4996</span>
		</div>

		<a class="btn navbar-toggle" data-toggle="collapse" data-target="#mobile-nav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<?php 
			wp_nav_menu( array(
			'theme_location' => 'mobile',
			'menu_class' => false,
			'menu_id' => false,
			'fallback_cb' => false,
			'container' => 'nav',
			'container_class' => 'navbar-collapse collapse',
			'container_id' => 'mobile-nav'
			));
		?>

		<nav id="primary-nav">
			<div class="container">
				<?php 
					wp_nav_menu( array(
					'theme_location' => 'left_of_logo',
					'menu_class' => 'primary-left nav',
					'fallback_cb' => false,
					'items_wrap' => '<ul id="%1$s" class="%2$s" role="tablist" >%3$s</ul>'
					));
				?>
				<a class="logo" href="<?php bloginfo('home'); ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/logo.png" alt="Project"></a>
				<?php 
					wp_nav_menu( array(
					'theme_location' => 'right_of_logo',
					'menu_class' => 'primary-right nav',
					'fallback_cb' => false,
					'items_wrap' => '<ul id="%1$s" class="%2$s" role="tablist" >%3$s</ul>'
					));
				?>
			</div>
		</nav>

	</header>

	<?php if(is_front_page()): ?>

	<?php $sliders = new WP_Query(array('post_type' => 'sliders')); ?>
	<?php if($sliders->have_posts()): $i = 0; ?>
	<div id="home-slider" class="carousel slide" data-ride="carousel">
		
		<div class="carousel-inner" role="listbox">
			<?php while($sliders->have_posts()): $sliders->the_post() ?>
			<div class="item <?php echo ($i == 0)? 'active' : ''; ?>">
				<img src="<?php echo get_field('slider_image', get_the_ID()) ?>" alt="">
				<div class="caption">
					<h2><?php echo get_field('large_text', get_the_ID()) ?></h2>
					<p><?php echo get_field('small_text', get_the_ID()) ?></p>
				</div>
			</div>
			<?php $i++; endwhile; wp_reset_query(); ?>
		</div>
	</div>
	<?php endif; ?>

	<div id="home-ctas">
		<a href="<?php echo get_permalink(99) ?>">
			View Commercial Services
		</a>
		<a href="<?php echo get_permalink(98) ?>">
			View Residential Services
		</a>
	</div>
	<?php endif; ?>

	<div id="site-main">
