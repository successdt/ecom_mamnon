<?php

	function sh_divider($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',
			'width' => '',

			'top' => '',
			'bottom' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin:' . $top . 'px auto 1.5em !important;';
		if($bottom) $styles .= 'margin: 0 auto ' . $bottom . 'px !important;';
		if($top && $bottom) $styles .= 'margin:' . $top . 'px auto ' . $bottom . 'px !important;';

		if($type == 'gap') $styles .= 'border: 0 !important;';
		if($type == 'curve') $styles .= 'background: url('. THEME_IMAGES .'/gallery-divider.png) repeat-x; border: 0 !important; height: 6px;';
		if($type == 'shadow') $styles .= 'background: url('. THEME_IMAGES .'/pagination_shadow.png) no-repeat; border: 0 !important; height: 20px; background-size: contain;';

		if($width) $styles .= 'width:'. $width .'% !important';

		if(!$type) $type = 'line ';

		if($styles) $styles = ' style="' . $styles . '"';

		$to_return = '<div class="divider-content"'. $styles .'></div>';

		return $to_return;
	}

	add_shortcode('divider', 'sh_divider');

?>