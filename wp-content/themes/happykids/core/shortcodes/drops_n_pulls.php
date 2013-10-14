<?php

	function theme_dropcaps($atts, $content = null) {
		extract(shortcode_atts(array(
			'style' => '',

			'top' => '',
			'bottom' => '',
			'left' => '',
			'right' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($left) $styles .= 'margin-left:' . $left . 'px !important;';
		if($right) $styles .= 'margin-right:' . $right . 'px !important;';
		if($styles) $styles = 'style="'. $styles .'"';

		if($style == '1') $style = 'dropcap1';
		if($style == '2') $style = 'dropcap2';
		if(!$style) $style = 'dropcap1';

							
		$to_return = '<span '. $styles .' class="'. $style .'">'. $content .'</span>';

			return $to_return;
		}

	add_shortcode('cap', 'theme_dropcaps');

	function theme_pullquotes($atts, $content = null) {
		extract(shortcode_atts(array(
			'align' => '',

			'top' => '',
			'bottom' => '',
			'left' => '',
			'right' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($left) $styles .= 'margin-left:' . $left . 'px !important;';
		if($right) $styles .= 'margin-right:' . $right . 'px !important;';
		if($styles) $styles = 'style="'. $styles .'"';

		if($align == 'left') $_align = 'pullleft';
		if($align == 'right') $_align = 'pullright';
		if(!$align) $_align = 'pullright';

		$to_return = '<blockquote '. $styles .' class="'. $_align .'"><p>'. $content .'</p></blockquote>';

			return $to_return;
		}

	add_shortcode('pullquote', 'theme_pullquotes');
	
?>