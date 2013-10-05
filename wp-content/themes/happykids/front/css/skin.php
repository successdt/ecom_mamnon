<?php 

	require_once( '../../../../../wp-load.php' );
	Header("Content-type: text/css");

	$standard_fonts = array(
		'Arial',
		'Tahoma',
		'Verdana',
		'Georgia',
		'FreeSans',
		'Lucida Sans Unicode',
		'Trebuchet MS'
	);

	$gen_sets = theme_get_option('general', 'gen_sets');
	$menu_gfont = ( isset($gen_sets['_menu_gfont']) ) ? $gen_sets['_menu_gfont'] : '';
	$headers_gfont = ( isset($gen_sets['_headers_gfont']) ) ? $gen_sets['_headers_gfont'] : '';
	$text_gfont = ( isset($gen_sets['_text_gfont']) ) ? $gen_sets['_text_gfont'] : '';
	$slider = isset($gen_sets['_gen_slider_select']) ? $gen_sets['_gen_slider_select'] : '';
	$camera_pagination = isset($gen_sets['_camera_pagination']) ? $gen_sets['_camera_pagination'] : '';

	$pretty_social = isset($gen_sets['_pretty_social']) ? $gen_sets['_pretty_social'] : '';

	$mainmenu_color = isset($gen_sets['_mmf_color']) ? $gen_sets['_mmf_color'] : '';
	$header_color = isset($gen_sets['_cth_color']) ? $gen_sets['_cth_color'] : '';
	$text_color = isset($gen_sets['_ct_color']) ? $gen_sets['_ct_color'] : '';

	$camera_caption_color = isset($gen_sets['_camera_caption_color']) ? $gen_sets['_camera_caption_color'] : '';
	$camera_caption_txt_color = isset($gen_sets['_camera_caption_txt_color']) ? $gen_sets['_camera_caption_txt_color'] : '';

	$slogan = isset($gen_sets['_gen_slogan']) ? $gen_sets['_gen_slogan'] : '';
	$slogan_divider = isset($gen_sets['_gen_slogan_divider']) ? $gen_sets['_gen_slogan_divider'] : '';

	$h1_size = isset($gen_sets['_h1_size']) ? $gen_sets['_h1_size'] : '';
	$h2_size = isset($gen_sets['_h2_size']) ? $gen_sets['_h2_size'] : '';
	$h3_size = isset($gen_sets['_h3_size']) ? $gen_sets['_h3_size'] : '';
	$h4_size = isset($gen_sets['_h4_size']) ? $gen_sets['_h4_size'] : '';
	$h5_size = isset($gen_sets['_h5_size']) ? $gen_sets['_h5_size'] : '';
	$h6_size = isset($gen_sets['_h6_size']) ? $gen_sets['_h6_size'] : '';

	$content_fsize = isset($gen_sets['_content_fsize']) ? $gen_sets['_content_fsize'] : '';
	$content_lineheight = isset($gen_sets['_content_lineheight']) ? $gen_sets['_content_lineheight'] : '';
	$_custom_pattern = isset($gen_sets['_theme_load_pattern']) ? $gen_sets['_theme_load_pattern'] : '';

	$import = '';
	$style = '';

	if($menu_gfont) {
		if (in_array($menu_gfont, $standard_fonts)){
			if ($menu_gfont != "Tahoma")
				$style .= "body #kids_main_nav {font-family: ". $menu_gfont ." ,Arial, Helvetica, sans-serif, cursive !important;}\n";
		} else
			{
			$menu_gfont = str_replace("", "+" , $menu_gfont);
			$import .= "@import url(http://fonts.googleapis.com/css?family=" . $menu_gfont . ");\n";
			$menu_gfont = str_replace("+", " " , $menu_gfont);
			$style .= "body #kids_main_nav {font-family: '". $menu_gfont ."', cursive !important;}\n";
			}
	}			

	if($headers_gfont) {
		if(in_array($headers_gfont, $standard_fonts)) {
			if ($headers_gfont != "Tahoma")
				$style .= "h1, h2, h3, h4, h5, h6 {font-family: '". $headers_gfont ."', sans-serif !important;}\n";
		} 
		else {
			$headers_gfont = str_replace(" ", "+" , $headers_gfont);
			$import .= "@import url(http://fonts.googleapis.com/css?family=" . $headers_gfont . ");\n";
			$headers_gfont = str_replace("+", " " , $headers_gfont);
			$style .= "h1, h2, h3, h4, h5, h6 {font-family: '". $headers_gfont ."', sans-serif !important;}\n";
			}
	}

	if($text_gfont) {
		if(in_array($text_gfont, $standard_fonts)){
			if ($text_gfont != "Tahoma")
				$style .= "body {font-family: '". $text_gfont ."' !important;}\n";
			}
		else{
			$text_gfont = str_replace(" ", "+" , $text_gfont);
			$import .= "@import url(http://fonts.googleapis.com/css?family=" . $text_gfont . ");\n";
			$text_gfont = str_replace("+", " " , $text_gfont);
			$style .= "body {font-family: '". $text_gfont ."', Arial !important;}\n";
		}
	}

	if($menu_gfont || $headers_gfont || $text_gfont){
		echo $import;
		echo $style;
	}

	if ($header_color && $text_color){
		echo ".entry-container a, .gallery a, .kids_top_content_middle a {color: ". $header_color ." !important;}\n";
	}

	if ($header_color){
		echo "h1, h2, h3, h4, h5, h6, .post-title h1 a, .gallery-text h1 a {color: ". $header_color ." !important;}\n";
		echo "body .entry-container #sidebar-left a:hover, body .entry-container #sidebar-right a:hover, body .entry-container #sidebar a:hover {color: ". $header_color." !important;}\n";
		// echo "header_container h1 {};

		echo "body .entry-container #sidebar-left .widget_recent_comments li a, body .entry-container #sidebar-right .widget_recent_comments li a, body .entry-container #sidebar .widget_recent_comments li a {color: ". $header_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_recent_entries li a, body .entry-container #sidebar-right .widget_recent_entries li a, body .entry-container #sidebar .widget_recent_entries li a {color: ". $header_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_recent_entries li a, body .entry-container #sidebar-right .widget_recent_entries li a, body .entry-container #sidebar .widget_recent_entries li a {color: ". $header_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_cws_latest_posts li a, body .entry-container #sidebar-right .widget_cws_latest_posts li a, body .entry-container #sidebar .widget_cws_latest_posts li a {color: ". $header_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_calendar a, body .entry-container #sidebar-right .widget_calendar a, body .entry-container #sidebar .widget_calendar a {color: ". $header_color ." !important;}\n";
		echo "#breadcrumbs a {color: ". $header_color." !important;}\n";
		echo ".kids_ads_box a {color: ". $header_color." !important;}\n";
		echo ".post-entry .more.link {color : ". $header_color ."}\n";
		echo ".post-footer a {color : ". $header_color ."}\n";
	}
	if ($mainmenu_color) echo "#kids_main_nav a {color: ". $mainmenu_color ." !important;}\n";
	if ($text_color){
		echo "body {color: ". $text_color ." !important;}\n";
		// echo ".header_container h1 {color: ". $text_color ." !important;}\n";
		echo ".entry-container a:hover, .gallery a:hover, .kids_top_content_middle a:hover {color: ". $text_color ." !important;}\n";
		echo "body .entry-container #sidebar-left, body .entry-container #sidebar-right, body .entry-container #sidebar {color: ". $text_color." !important;}\n";
		echo "body .entry-container #sidebar-left a, body .entry-container #sidebar-right a, body .entry-container #sidebar a {color: ". $text_color." !important;}\n";
		echo "body .entry-container #sidebar-left  .widget_cws_nav li a:hover, body .entry-container #sidebar-right  .widget_cws_nav li a:hover, body .entry-container #sidebar  .widget_cws_nav li a:hover {color: ". $text_color ." !important;}\n";
		echo ".gallery #filter a {color: ". $text_color ." !important;}\n";

		echo "body .entry-container #sidebar-left .widget_recent_comments li a:hover, body .entry-container #sidebar-right .widget_recent_comments li a:hover, body .entry-container #sidebar .widget_recent_comments li a:hover {color: ". $text_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_recent_entries li a:hover, body .entry-container #sidebar-right .widget_recent_entries li a:hover, body .entry-container #sidebar .widget_recent_entries li a:hover {color: ". $text_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_cws_latest_posts li a:hover, body .entry-container #sidebar-right .widget_cws_latest_posts li a:hover, body .entry-container #sidebar .widget_cws_latest_posts li a:hover {color: ". $text_color ." !important;}\n";
		echo "body .entry-container #sidebar-left .widget_calendar a:hover, body .entry-container #sidebar-right .widget_calendar a:hover, body .entry-container #sidebar .widget_calendar a:hover {color: ". $text_color ." !important;}\n";
		echo ".kids_ads_box a:hover {color: ". $text_color." !important;}\n";
		echo ".post-entry .more.link:hover {color : ". $text_color ."}\n";
		echo ".post-footer a {color:hover : ". $text_color ."}\n";
	}

	if ($header_color && !$text_color){
		echo "#breadcrumbs a:hover, .post-title h1 a:hover, .gallery-text h1 a:hover {color: #2F2F2F !important;}\n";
	}

	if ($h1_size){
		echo "h1 {font-size: ". $h1_size ."px !important;}\n";
		echo ".widget h3 {font-size: ". $h1_size ."px !important;}\n";
	}
	if ($h2_size) echo "h2 {font-size: ". $h2_size ."px !important;}\n";
	if ($h3_size) echo "h3 {font-size: ". $h3_size ."px !important;}\n";
	if ($h4_size) echo "h4 {font-size: ". $h4_size ."px !important;}\n";
	if ($h5_size) echo "h5 {font-size: ". $h5_size ."px !important;}\n";
	if ($h6_size) echo "h6 {font-size: ". $h6_size ."px !important;}\n";

	if ($content_fsize) echo "body {font-size: ". $content_fsize ."px !important;}\n";
	if ($content_lineheight){
		echo "#kids_middle_container {line-height: ". $content_lineheight ."px !important;}\n";
		echo "#kids_middle_container p {line-height: ". $content_lineheight ."px !important;}\n";
	}

	if (!$pretty_social) echo ".pp_social {display:none;}\n";
	if ($camera_pagination){
		echo ".camera_caption, .camera_caption a {display: none !important; visibility: hidden !important;}\n";
	}else {
		echo ".camera_wrap .camera_pagination {display: none !important; visibility: hidden !important;}";
	}
	if ($camera_caption_color) echo ".camera_caption > div {background-color:". $camera_caption_color ." !important;}\n";
	if ($camera_caption_txt_color) echo ".camera_caption > div {color:". $camera_caption_txt_color ." !important;}\n";

	if (!$slogan_divider) echo ".slogan {background: none !important;}\n";

	if ($_custom_pattern) echo ".t-custom-pattern .bg-level-2-left {background-image: url(". $_custom_pattern .");}\n .t-custom-pattern .bg-level-2-right {background-image: url(". $_custom_pattern .");}\n";

	// if (!$slider) echo ".kids-front-page .bg-level-2-right, .kids-front-page .bg-level-2-left {top: 110px;}\n";
	if (!$slogan && !$slider) echo ".kids-front-page .kids_bottom_content_container {position: relative; top: -102px; z-index: 99;}\n";

?>