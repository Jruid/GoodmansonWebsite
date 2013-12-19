<?php
/*
Plugin Name: Simple Facebook Like Widget
Plugin URI: http://www.allanjosephbatac.com/blog/2010/04/add-the-new-facebook-like-button-widget-plugin-on-your-wordpress-blog.html
Description: A very simple and easy to use Facebook Like plugin to your wordpress post pages. There is nothing rocket-science about it. It's so simple a caveman... wait! that was a TV commercial. Anyways, carry on.
Author: AJ Batac
Version: 0.21
Author URI: http://allanjosephbatac.com/blog/
*/

function simple_facebook_like($the_iframe = '') {
	$the_perma	= rawurlencode(get_permalink());
	$the_iframe	.= '<div id="facebook_like"><iframe src="http://www.facebook.com/plugins/like.php?href='.$the_perma.'&amp;layout=standard&amp;show_faces=true&amp;width=500&amp;action=like&amp;font=segoe+ui&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:80px;" allowTransparency="true"></iframe></div>';
	return $the_iframe;
}

add_action('the_content', 'simple_facebook_like');
?>