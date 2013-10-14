<?php

	function _info_box($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',

			'top' => '',
			'bottom' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($styles) $styles = ' style="' . $styles . '"';

		if(!$type) $type = 'info-box';

		if(!$content) $content = '';

		$to_return = '<p class="'. $type . '-box"' . $styles .'>'. $content .'</p>';

			return $to_return;
		}

	add_shortcode('box', '_info_box');

	function _notification_box($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',

			'top' => '',
			'bottom' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($styles) $styles = ' style="' . $styles . '"';

		if(!$type) $type = 'inform';
		if($type == 'info') $type = 'inform';

		if(!$content) $content = '';

		$to_return = '<div class="custom-box-wrap"'. $styles .'><p class="custom-box-'. $type .'">'. $content .'</p></div>';

			return $to_return;
		}

	add_shortcode('infobox', '_notification_box');

?>