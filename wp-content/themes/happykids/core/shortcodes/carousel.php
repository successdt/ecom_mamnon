<?php
	global $post;

	function theme_carousel($atts, $content = null) {
		extract(shortcode_atts(array(
			'category' => '',
			'quantity' => '-1',
			'style' => '',
		), $atts));

		if($style == '1'){
			$style = 'list';
			$arrow_p = 'prev disabled';
			$arrow_n = 'next';
		}
		if($style == '2'){
			$style = 'list2';
			$arrow_p = 'prev2 disabled';
			$arrow_n = 'next2';
		}
		if(!$style){
			$style = 'list';
			$arrow_p = 'prev disabled';
			$arrow_n = 'next';
		}
		
		$wrapper = '<div class="minigallery-'. $style .' clearfix">';
	
		$wrapper .= '<a class="'. $arrow_p .'">prev</a><a class="'. $arrow_n .'">next</a><div class="minigallery"><ul>';

		$wrapEnd = '</ul></div><!--/ .minigallery --></div><!--/ .minigallery-list-->';

	if ($category){
		$query_array = array(
			'post_type' =>  'slideshow',
			'posts_per_page' => $quantity,
			'tax_query' => array(
						array(
						'taxonomy' => 'slideshow_category',
						'field' => 'slug',
						'terms' => $category,
						'operator' => 'IN'
						)
			)
		);
	}else {
		$query_array = array(
			'post_type' =>  'slideshow',
			'posts_per_page' => $quantity,
		);
	}
	$query_slide = new WP_Query( $query_array );
					
		$data_id = 1;

		$slideOutput = '';

		while($query_slide->have_posts()){ $query_slide->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true);

			$the_cat = get_the_terms( get_the_ID() , 'portfolio_category');
			$categories = '';
			if(is_array($the_cat))
			foreach($the_cat as $cur_term){
				$categories .= $cur_term->slug .' ';
			}

			$projPermalink = get_permalink();

			$slideOutput .= '<li><a class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[carousel_gallery]" href="'. $image[0] .'" title="'. get_the_title() .'"><img src="'. bfi_thumb( $image[0], array('width' => 76, 'height' => 66, 'crop' => true) ) .'" width="76" height="66" alt="" /></a></li>';

			$data_id++;
		} // end while
		wp_reset_postdata();

			$to_return = $wrapper . $slideOutput . $wrapEnd;
			
			return $to_return;
	}	
	add_shortcode('carousel', 'theme_carousel');	

?>