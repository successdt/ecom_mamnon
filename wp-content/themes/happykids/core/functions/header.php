<?php

	function show_logo() {
		$gen_sets = theme_get_option('general', 'gen_sets');
		$logo_url = isset($gen_sets['_logo']) ? $gen_sets['_logo'] : '';

		$logo_w = isset($gen_sets['_logo_w']) ? $gen_sets['_logo_w'] : '';
		$logo_h = isset($gen_sets['_logo_h']) ? $gen_sets['_logo_h'] : '';

		$logo_it = isset($gen_sets['_logo_it']) ? $gen_sets['_logo_it'] : '';
		$logo_ir = isset($gen_sets['_logo_ir']) ? $gen_sets['_logo_ir'] : '';
		$logo_il = isset($gen_sets['_logo_il']) ? $gen_sets['_logo_il'] : '';
		$logo_ib = isset($gen_sets['_logo_ib']) ? $gen_sets['_logo_ib'] : '';

		$logo_url_result = '';
		if ( $logo_url && (!$logo_w && !$logo_h) ) {
			$logo_url_result = esc_url($logo_url);
		}elseif ( $logo_url && ($logo_w || $logo_h) ) {
			$logo_url = esc_url($logo_url);
			if ($logo_h && !$logo_w) $logo_url_result = bfi_thumb( $logo_url, array('width' => 250) );
			if ($logo_w && !$logo_h) $logo_url_result =  bfi_thumb( $logo_url, array('width' => $logo_w) );
			if ($logo_w && $logo_h) $logo_url_result = bfi_thumb( $logo_url, array('width' => $logo_w, 'height' => $logo_h) );
		}elseif ( !$logo_url || (!$logo_w && !$logo_h) ) {
			$logo_url_result = THEME_URI . '/front/images/logo.png';
		}

		$logo_style = '';
		if ($logo_it || $logo_ir || $logo_il || $logo_ib){
			if ($logo_it) $logo_style .= 'margin-top:'. $logo_it .'px !important;';
			if ($logo_ir) $logo_style .= 'margin-right:'. $logo_ir .'px !important;';
			if ($logo_il) $logo_style .= 'margin-left:'. $logo_il .'px !important;';
			if ($logo_ib) $logo_style .= 'margin-bottom:'. $logo_ib .'px !important;';
		}

		echo '<div id="kids_logo_block"><a id="kids_logo_text" style="display: block;margin-top: -9px;'. $logo_style .'" href="'. home_url() .'"><img src="'. esc_url($logo_url_result) .'" alt="'. get_bloginfo('name') .'" title="'. get_bloginfo('name') .'" /></a></div>';
	}

	function show_skin(){
		$gen_sets = theme_get_option('general', 'gen_sets');
		$skin_color = isset($gen_sets['_theme_skin_color']) ? $gen_sets['_theme_skin_color'] : '';
		$skin_pattern = isset($gen_sets['_theme_skin_pattern']) ? $gen_sets['_theme_skin_pattern'] : '';
		$_pattern_allowed = isset($gen_sets['_theme_skin_pallow']) ? $gen_sets['_theme_skin_pallow'] : '';
		$_custom_pattern = isset($gen_sets['_theme_load_pattern']) ? $gen_sets['_theme_load_pattern'] : '';

		if ($skin_color == '') $skin_color = 't-blue';
		if ($skin_pattern == '') $skin_pattern = 't-pattern-1';
		if ($_custom_pattern) $skin_pattern = 't-custom-pattern';

		if ($_pattern_allowed){
			$result = $skin_color . ' ' . $skin_pattern;
		}else{
			$result = $skin_color;
		}
 		return $result;
	}

	function show_tcolor(){
		$gen_sets = theme_get_option('general', 'gen_sets');
		$text_color = isset($gen_sets['_ct_color']) ? $gen_sets['_ct_color'] : '';
		if ($text_color) {
			echo ' style="color:'. $text_color .';"';
		}
	}

	function show_favicon(){
		$gen_sets = theme_get_option('general', 'gen_sets');
		$favicon = isset($gen_sets['_fav']) ? $gen_sets['_fav'] : '';
		if ($favicon) echo '<link rel="shortcut icon" href="'. esc_url($favicon) .'" />';
	}

	function show_social(){
		$gen_sets = theme_get_option('general', 'gen_sets');
		if ( isset($gen_sets['_rss']) && $gen_sets['_rss'] != ''){
			echo '<li class="rss"><a href="'. get_bloginfo('rss2_url') . '" title="RSS"></a></li>';
		}
		if ( isset($gen_sets['_facebook']) && $gen_sets['_facebook'] != ''){
			echo '<li class="facebook"><a href="'. esc_url($gen_sets['_facebook']) .'" title="Facebook" target="_blank"></a></li>';
		}
		if ( isset($gen_sets['_vimeo']) && $gen_sets['_vimeo'] != ''){
			echo '<li class="vimeo"><a href="'. esc_url($gen_sets['_vimeo']) .'" title="Vimeo" target="_blank"></a></li>';
		}
		if ( isset($gen_sets['_flickr']) && $gen_sets['_flickr'] != ''){
			echo '<li class="flickr"><a href="'. esc_url($gen_sets['_flickr']) .'" title="Twitter" target="_blank"></a></li>';
		} 
	}

	function put_ganalytics_code(){
		$gen_sets = theme_get_option('general', 'gen_sets');
		$ganalytics = isset($gen_sets['_ganalytics']) ? $gen_sets['_ganalytics'] : '';

		if ($ganalytics) echo stripslashes($ganalytics);
	}

	function show_top_panel(){
		$gen_sets = theme_get_option('general', 'gen_sets');
		$show_panel = isset($gen_sets['_show_top_panel']) ? $gen_sets['_show_top_panel'] : '';

		if ($show_panel) {
			echo '<li class="openbtn"><a href="#"></a></li>';
		}
	}

?>