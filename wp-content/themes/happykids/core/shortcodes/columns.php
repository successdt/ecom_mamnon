<?php
function theme_columns($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'top' => '',
		'bottom' => '',
	), $atts));
	$styles = '';
	
	if($top) $styles .= 'margin-top:' . $top . 'px !important;';
	if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
	if($styles) $styles = 'style="' . $styles . '"';
	
	if( substr_count($code, "_last") > 0)
		return '<div '. $styles .' class="' . $code . '">' . wpautop(do_shortcode(trim($content))) . '</div><div class="kids_clear"></div>';
	else
		return '<div '. $styles .' class="' . $code . '">' . wpautop(do_shortcode(trim($content))) . '</div>';
}

add_shortcode('one_half', 'theme_columns');
add_shortcode('one_third', 'theme_columns');
add_shortcode('one_fourth', 'theme_columns');
add_shortcode('one_fifth', 'theme_columns');

add_shortcode('two_thirds', 'theme_columns');
add_shortcode('three_fourth', 'theme_columns');
add_shortcode('four_fifth', 'theme_columns');

add_shortcode('one_half_last', 'theme_columns');
add_shortcode('one_third_last', 'theme_columns');
add_shortcode('one_fourth_last', 'theme_columns');
add_shortcode('one_fifth_last', 'theme_columns');

add_shortcode('two_thirds_last', 'theme_columns');
add_shortcode('three_fourth_last', 'theme_columns');
add_shortcode('four_fifth_last', 'theme_columns');
?>