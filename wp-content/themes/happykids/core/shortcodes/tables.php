<?php

function theme_table($atts, $content = null) {
	extract(shortcode_atts(array(
		'top' => '',
		'bottom' => ''
	), $atts));
	
	$styles = '';
	if($top) $styles .= 'margin-top:' . $top . 'px !important;';
	if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
	$styles = 'style="'. $styles .'"';	

	return str_replace('<table>', '<table class="custom-table2" '. $styles .'>', do_shortcode($content));
	
}

add_shortcode('table', 'theme_table');

?>