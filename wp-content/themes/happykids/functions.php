<?php

	if ( ! isset( $content_width ) ) $content_width = 896;

	require_once (TEMPLATEPATH . '/core/core.php');

	$core = new cwsPrime();
	$core->init(array(
	    'name' => 'Happy Kids',
	    'slug' => 'happykids',
	    'version' => '1.1',
	));

	//added by success.ddt@gmail.com
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => 'Footer Copyrights',
			'id' => 'Footer Copyrights',
			'description' => 'Chứa các thông tin ở Footer',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
	}
?>