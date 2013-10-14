<?php 
	function colored_buttons($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',
			'style' => '',
			'link' => '',
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

		$_align = '';
		if($align == 'left') $styles .= 'float: left;';
		if($align == 'right') $styles .= 'float: right;';
		if($align == 'center') $_align = 'style="text-align:center;clear:both;"';
		if(!$align) $_align = '';

		if($styles) $styles = ' style="' . $styles . '"';

		if($style == 'blue') $style = 'button-style1';
		if($style == 'red') $style = 'button-style2';
		if($style == 'green') $style = 'button-style3';
		if($style == 'brown') $style = 'button-style4';
		if($style == 'peachy') $style = 'button-style5';
		if($style == 'violet') $style = 'button-style6';

		if($type == 'rounded') $type = 'rounded ';
		if($type == 'rectangle') $type = 'rectangle ';
		if($type == 'medium') $type = 'medium ';
		if($type == 'small') $type = 'small ';

		if(!$type) $type = 'rectangle ';
		if(!$style) $style = 'button-style1';
		if(!$link) $link = '#';

		if(!$content) $content = 'Read More';

			if($align && !$_align){
				$to_return = '<div style="width: 100%; overflow: hidden;"><a'. $styles .' class="button '. $type . $style .'" href="'. $link .'">'. $content .'</a></div>';
			}elseif ($align && $_align) {
				$to_return = '<div '.$_align.'><a'. $styles .' class="button '. $type . $style .'" href="'. $link .'">'. $content .'</a></div>';
			}else {
				$to_return = '<a'. $styles .' class="button '. $type . $style .'" href="'. $link .'">'. $content .'</a>';
			}

			return $to_return;
		}

	add_shortcode('button', 'colored_buttons');
?>