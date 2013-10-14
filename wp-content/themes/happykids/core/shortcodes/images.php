<?php

	function image_shortcode($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'width' => '',
			'height' => '',
			'lightbox' => '',
			'group' => '',
			'title' => '',
			'align' => '',
			
			'top' => '',
			'right' => '',
			'bottom' => '',
			'left' => ''
			
		), $atts));
		$_align = '';
		$_style = '';
		$_shadow = '';
		$resulted = '';
		
		$srcArray = array();
		$src = trim($content);
		$src = stripslashes($src);
		$srcArray = theme_getImgSrc($src);
		$_src = isset($srcArray[0]) ? $srcArray[0] : '';
		if (!$_src){
			if ( strstr($src, 'http://') || strstr($src, 'https://') ){
				$_src = $src;
			}else {
				$_src = get_site_url() . $src;
			}
		}

		if( $width == '' ) $width = 'original';
		if( $width == 'original') $resulted = $_src;
		if( $width == 'small') $resulted = bfi_thumb( $_src, array('width' => 202, 'crop' => true) );
		if( $width == 'medium') $resulted = bfi_thumb( $_src, array('width' => 278, 'crop' => true) );
		if( $width == 'large') $resulted = bfi_thumb( $_src, array('width' => 420, 'crop' => true) );
		if( $height !='' && $width !='' ) $resulted = bfi_thumb( $_src, array('width' => $width, 'height' => $height, 'crop' => true) );

		$url = ($lightbox) ? ' href="'.$lightbox.'"' : '';
		
		if( $lightbox != '' ){
			if($group) $group = '[' . $group . ']';
			$lightbox = 'data-rel="prettyPhoto'. $group .'"';		
		}
		
		if( $align == 'left' ) $_align = 'alignleft';
		elseif( $align == 'right' ) $_align = 'alignright';
		elseif( $align == '' ) $_align = 'alignleft';
		
		if($top) $_style .= 'margin-top:'. $top .'px;';
		if($right) $_style .= 'margin-right:'. $right .'px;';
		if($bottom) $_style .= 'margin-bottom:'. $bottom .'px;';
		if($left) $_style .= 'margin-left:'. $left .'px;';
		
		if ($width == 'original'){
			$to_return = '<img src="' . $_src .'" alt="'. $title .'" />';
		} else {
			$to_return = '<img src="'. $resulted .'" alt="'. $title .'" />';
		}

		if($lightbox) {
			$to_return = '<a class="prettyPhoto kids_picture"'. $url .' title="'. $title .'" '. $lightbox .'>' . $to_return . '</a>';
		}
		
		if( $align == 'center' && $height != '' ){
			return '<div style="width:100%; text-align:center;"><div class="border-shadow" style="'. $_style .' width:'. ($width + 8) .'; height:'. ($height + 8) .'; display:inline-block;"><figure>'. $to_return .'</figure></div><div class="kids_clear"></div></div>';
		}elseif ( $align == 'center' && $height == '' ){
			return '<div style="width:100%; text-align:center;"><div class="border-shadow" style="'. $_style .' display:inline-block;"><figure>'. $to_return .'</figure></div><div class="kids_clear"></div></div>';
		}else{
			return '<div class="border-shadow ' . $_align .'" style="'. $_style .'"><figure>'. $to_return .'</figure></div>';
		}

	}
	
	add_shortcode('image', 'image_shortcode');

?>