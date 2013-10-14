<?php
$config = array(
	'title' => 'Slide Options',
	'id' => 'cws_slideshow',
	'pages' => array('slideshow'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);
$options = array(
	array(
		"name" => 'Slide link',
		"id" => "_slide_link",
		"default" => "",
		"type" => "text"		
	),
	array(
		"name" => 'Slide Caption',
		"id" => "_slide_capt",
		"default" => "",
		"type" => "textarea"		
	),
);
new metaboxesGenerator($config,$options);