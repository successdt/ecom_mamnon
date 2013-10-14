<?php

	function pricing_table($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => '',
			'price' => '',
			'best' => '',
			'link_text' => '',
			'link' => '',

			'top' => '',
			'bottom' => '',
		), $atts));
		
		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($styles) $styles = ' style="' . $styles . '"';

		$match_code = preg_match_all("/(.?)\[(item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/item\])?(.?)/s", $content, $items);
		if (!$match_code)
			return do_shortcode($content);
		else {
			for($i = 0; $i < count($items[0]); $i++ ){
				$items[3][$i] = shortcode_parse_atts($items[3][$i]);
			}

			$columns = '';

			for($i = 0; $i < count($items[0]); $i++){

				$best_offer = isset($items[3][$i]['best']) ? 'current-row' : '';

				$columns .= '<div class="column '. $best_offer .'"><ul>';

				$columns .= '<li class="header_row"><h1>'. $items[3][$i]['title'] .'</h1><span>'. $items[3][$i]['price'] .'</span></li>';
				
				$content = do_shortcode(trim($items[5][$i]));
				
				$columns .= '<li><span style="line-height: 40px ! important;">'. $content . '</span></li>';

				$columns .= '<li class="footer_row"><a class="button medium button-style1" href="'. $items[3][$i]['link'] .'">'. $items[3][$i]['link_text'] . '</a></li>';

				$columns .= '</ul></div>';
			}
			
			$to_return = '<div'. $styles .'><div class="pricing-table clearfix">'. $columns .'</div></div>';

			return $to_return;
		}	
	}

	add_shortcode('pricing_table', 'pricing_table');

?>