<?php

	function ads_box($atts, $content = null) {
		extract(shortcode_atts(array(
			'icon' => '',
			'icon_link' => '',
			'title' => '',
			'link' => '',
			'link_text' => '',
			'width' => '',
			'heigth' => '',

			'top' => '',
			'bottom' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($styles) $styles = 'style="' . $styles . '"';

		$match_code = preg_match_all("/(.?)\[(item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/item\])?(.?)/s", $content, $things);
		if (!$match_code){
			return do_shortcode($content);
		}else {
			for($i = 0; $i < count($things[0]); $i++ ){
				$things[3][$i] = shortcode_parse_atts($things[3][$i]);
			}

			$block = '';
			for($i = 0; $i < count($things[0]); $i++){
				$icon = $things[3][$i]['icon'];
				$ico = '';

				if ($icon == 'plane') $ico = '<img alt="" src="'. THEME_IMAGES .'/icons/sample-icon1.png" class="icon">';
				if ($icon == 'cubes') $ico = '<img alt="" src="'. THEME_IMAGES .'/icons/sample-icon2.png" class="icon">';
				if ($icon == 'ball') $ico = '<img alt="" src="'. THEME_IMAGES .'/icons/sample-icon3.png" class="icon">';

				if ($icon == 'custom'){
					$ww = isset($things[3][$i]['width']) ? $things[3][$i]['width'] : '';
					$hh = isset($things[3][$i]['height']) ? $things[3][$i]['height'] : '';

					if(!$ww) $ww = 86;
					if(!$hh) $hh = 86;

					$w = $ww;
					$h = $hh;
					$ico = '<img src="'. bfi_thumb( $things[3][$i]['icon_link'], array('width' => $w, 'height' => $h, 'crop' => true) ) .'" alt="" class="icon" />';
				}

				$content = do_shortcode(trim($things[5][$i]));

				$block .= '<article class="kids_post_block l-grid-4">';
				$block .= '<h1>'. $ico .'<a href="'. $things[3][$i]['link'] .'" class="link">'. $things[3][$i]['title'] .'</a></h1>';
				$block .= '<div class="kids_post_content"><p>'. $content .'</p>';
				$block .= '<h3 class="l-float-right"><a href="'. $things[3][$i]['link'] .'" class="link">'. $things[3][$i]['link_text'] .'</a></h3>';
				$block .= '</div></article>';

			}
		}
		$result = '<div class="kids_ads_box"><section '. $styles .' class="kids_posts_container clearfix">'. $block .'</section></div>';

		return $result;
	}

	add_shortcode('ads_box', 'ads_box');

?>