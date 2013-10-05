<?php 
	function toggle($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',

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
			for( $i = 0; $i < count( $items[0] ); $i++ ){
				$items[3][$i] = shortcode_parse_atts($items[3][$i]);
			}
			$to_return = '';
			for($i = 0; $i < count($items[0]); $i++) {
				
				$item_title = $items[3][$i]['title'];
				
				$to_return .= '<div class="box-toggle"><div class="trigger"><b class="trigger">'. $item_title .'</b></div>';
				
				$to_return .= '<div class="toggle_container"><p>' . do_shortcode(trim($items[5][$i])) . '</p></div></div>';
			}
			$to_return = '<div '. $styles .'>' . $to_return . '</div>';

			return $to_return;
		}	
	}
	add_shortcode('toggle', 'toggle');

	function accordion($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => '',
			'inner_title' => '',

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
			for( $i = 0; $i < count( $items[0] ); $i++ ){
				$items[3][$i] = shortcode_parse_atts($items[3][$i]);
			}
			$to_return = '';
			for($i = 0; $i < count($items[0]); $i++) {
				
				$pane_title = $items[3][$i]['title'];
				$inner_title = $items[3][$i]['inner_title'];
				
				$to_return .= '<li><a href="#" class="opener">' . $pane_title . '</a><div class="slide-holder"><div class="slide"><h3>' . $inner_title . '</h3><p>' . do_shortcode(trim($items[5][$i])) . '</p></div></div></li>';
			}
			$to_return = '<ul class="accordion"'. $styles .'>' . $to_return . '</ul>';

			return $to_return;
		}	
	}
	add_shortcode('accordion', 'accordion');
?>