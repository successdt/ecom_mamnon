<?php

	function tabs($atts, $content = null) {

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


		$match_code = preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $items);
		if (!$match_code) 
			return do_shortcode($content);
		else {
			for($i = 0; $i < count($items[0]); $i++ ){
				$items[3][$i] = shortcode_parse_atts($items[3][$i]);
			}
			$tabs = '<ul class="tabs">';
			$contents = '';
			for($i = 0; $i < count($items[0]); $i++){			
				$tabs .= '<li><a href="#tab'. ($i+1) .'"';
				$tabs .='>' . $items[3][$i]['title'] . '</a></li>';

				$intitle = '<h3>' . $items[3][$i]['inner_title'] . '</h3>';
				
				$contents .= '<div id="tab'. ($i+1) .'" class="tab_content">'. $intitle .'<p>';
				
				$contents .= do_shortcode(trim($items[5][$i])) . '</p></div>';			
			}
			
			$tabs .= '</ul>';
			
			$to_return = '<div' . $styles . '>' . $tabs . '<div class="tab_container">' . $contents . '</div></div>';

			return $to_return;
		}	
	}

	add_shortcode('tabs', 'tabs');

?>