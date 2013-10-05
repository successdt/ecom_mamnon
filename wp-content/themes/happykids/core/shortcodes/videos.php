<?php
	
	function theme_youtube($atts, $content = null) {

		$gen_sets = theme_get_option('general', 'gen_sets');
		$yt_color = ( isset($gen_sets['_yt_color']) ) ? stripslashes($gen_sets['_yt_color']) : '';
		$yt_theme = ( isset($gen_sets['_yt_theme']) ) ? stripslashes($gen_sets['_yt_theme']) : '';

		extract(shortcode_atts(array(
			'align' => '',
			'width' => '',
			'height' => '',
			'autoplay' => '',
			'color' => $yt_color,
			'theme' => $yt_theme,

			'top' => '',
			'bottom' => '',
			'left' => '',
			'right' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($left) $styles .= 'margin-left:' . $bottom . 'px !important;';
		if($right) $styles .= 'margin-right:' . $bottom . 'px !important;';

		if($align == 'left') $_align = 'alignleft';
		if($align == 'right') $_align = 'alignright';
		if(!$align) $_align = 'alignleft';

		if(!$width) $width = '413';
		if(!$height) $height = '253';

		if($autoplay == 'on') $autoplay = 1;

		$content = trim($content);
		$parser_return = theme_youtube_parser($content, $width, $height, $autoplay, $color, $theme);

		if(!$content){
			
		}else {
			if ($align == 'center'){
				$_video = 
					'<div style="text-align:center;"><div style="display:inline-block;width:'. ($width + 6) .'px;height:'. ($height + 6) .'px;'. $styles .'" class="border-shadow cws_video_shortcode"><figure>'.
						$parser_return .
					'</figure></div></div>';
			}else {
				$_video = 
					'<div style="width:'. ($width + 6) .'px;height:'. ($height + 6) .'px;'. $styles .'" class="border-shadow cws_video_shortcode '. $_align .'"><figure>'.
						$parser_return .'
					</figure></div>';
			}
		}

		$to_return = $_video;

			return $to_return;
		}

	add_shortcode('youtube', 'theme_youtube');

	function theme_vimeo($atts, $content = null) {
		$gen_sets = theme_get_option('general', 'gen_sets');
		$vim_color = ( isset($gen_sets['_vim_color']) ) ? stripslashes($gen_sets['_vim_color']) : '';
		$vim_title = isset($gen_sets['_vim_header']) ? stripslashes($gen_sets['_vim_header']) : '';
		
		extract(shortcode_atts(array(
			'align' => '',
			'width' => '',
			'height' => '',

			'title' => $vim_title, //?title=0
			'color' => $vim_color, //&ampcolor=ff9933
			'autoplay' => '', //&amp;autoplay=1
			// 'loop' => '', //&amp;loop=1
			// 'byline' => '', //&amp;byline=0
			// 'portrait' => '', //&amp;portrait=0
			// 'badge' => '',

			'top' => '',
			'bottom' => '',
			'left' => '',
			'right' => '',
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($left) $styles .= 'margin-left:' . $bottom . 'px !important;';
		if($right) $styles .= 'margin-right:' . $bottom . 'px !important;';

		if($align == 'left') $_align = 'alignleft';
		if($align == 'right') $_align = 'alignright';
		if(!$align) $_align = 'alignleft';

		if(!$width) $width = '413';
		if(!$height) $height = '253';

		$content = trim($content);
		$parser_return = theme_vimeo_parser($content, $width, $height, $autoplay, $color, $title);

		if(!$content){
			
		}else {
			if ($align == 'center'){
				$_video = '<div style="text-align:center;"><div style="display:inline-block;width:'. ($width + 6) .'px;height:'. ($height + 6) .'px;'. $styles .'" class="border-shadow cws_video_shortcode"><figure>'. $parser_return .'</figure></div></div>';
			}else {
				$_video = '<div style="width:'. ($width + 6) .'px;height:'. ($height + 6) .'px;'. $styles .'" class="border-shadow cws_video_shortcode '. $align .'"><figure>'. $parser_return .'</figure></div>';
			}
		}

		$to_return = $_video;

			return $to_return;
		}

	add_shortcode('vimeo', 'theme_vimeo');

?>