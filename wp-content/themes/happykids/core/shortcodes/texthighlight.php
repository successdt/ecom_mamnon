<?php

	function theme_txthighlights($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',

			'color' => '',
			'bgcolor' => '',
		), $atts));

		$styles = '';

		if($color && !$bgcolor) $styles .= 'color:'. $color .' !important; background-color: #385EA7!important;';
		if($bgcolor && !$color) $styles .= 'color: #FFFFFF !important; background-color:'. $bgcolor .' !important;';

		if($bgcolor && $color){
			$styles .= 'color:'. $color .' !important;';
			$styles .= 'background-color:'. $bgcolor .' !important;';
		}

		if($styles) $styles = 'style="'. $styles .'"';

		if($type == '1') $class = 'highlight1';
		if($type == '2') $class = 'highlight2';
		if($type == '3') $class = 'highlight3';
		if($type == '4') $class = 'highlight4';
		if($type == '5') $class = 'highlight5';
		if($type == '6') $class = 'highlight6';
		if($type == '7') $class = 'highlight7';
		if(!$type) $class = 'highlight1';
		if(!$type && $color || !$type && $bgcolor) $class = '';

		$to_return = '<span '. $styles .' class="'. $class .'">'. $content .'</span>';

			return $to_return;
		}

	add_shortcode('highlighted_text', 'theme_txthighlights');

?>