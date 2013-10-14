<?php
	global $post;

	function theme_recent($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',
			'type' => 'portfolio',
			'category' => '',
			'quantity' => '-1',
			'button' => '',

			'top' => '',
			'bottom' => ''
		), $atts));

		$styles = '';
		if($top) $styles .= 'margin-top:' . $top . 'px !important;';
		if($bottom) $styles .= 'margin-bottom:' . $bottom . 'px !important;';
		if($styles) $styles = 'style="' . $styles . '"';

		if(!$button) $button = 'More';
		
		$wrapper = '<div class="recent_projects" '. $styles .'><div style="overflow: hidden;">';

		if($title && $title != ''){
			$wrapper .= '<h3 class="section-title" style="float: left;">' . $title . '</h3>';
		}else {
			$wrapper .= '<h3 class="section-title">Recent Projects</h3>';
		}
	
		$wrapper .= '</div><ul class="projects_carousel clearfix">';

		$wrapEnd = '</ul><!--/ .projects-carousel --></div><!--/ .work-carousel-->';

		if ( $type == 'post' ){
			$query_array = array(
				'post_type' => 'post',
				'posts_per_page' => $quantity ,
				'category_name' => $category
			);

			if ($category == '' || $category == 'all'){
				$query_port = new WP_Query( array('posts_per_page' => $quantity ) );
			}else {
				$query_port = new WP_Query( $query_array );
			}
		} else {
			$query_array_tax = array(
				array(
					'taxonomy' => 'portfolio_category',
					'field' => 'slug',
					'terms' => $category,
					'operator' => 'IN'
				)
			);
			$query_array = array(
				'posts_per_page' => $quantity ,
				'post_type' => 'portfolio',
				'tax_query' => $query_array_tax
			);

			if ($category == '' || $category == 'all'){
				$query_port = new WP_Query( array('post_type' => 'portfolio', 'posts_per_page' => $quantity ) );
			}else {
				$query_port = new WP_Query( $query_array );
			}
		}
			

		$data_id = 1;

		$slideOutput = '';

		while($query_port->have_posts()){ $query_port->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true);
			
			$prettyPhotoLink = $image[0];

			if (has_post_thumbnail()) {
				$image = '<img src="'. bfi_thumb( $image[0], array('width' => 214, 'height' => 178, 'crop' => true)) .'" width="214" height="178" alt="" />';
			} else {
				$image = '<div style="width:214px;height:178px;border:1px solid #fff;"></div>';
			}

			$page_custom = theme_get_post_custom();
			$video = ( isset($page_custom['_port_popup_link']) ) ? $page_custom['_port_popup_link'] : '';

			$the_cat = get_the_terms( get_the_ID() , 'portfolio_category');
			$categories = '';
			if(is_array($the_cat))
			foreach($the_cat as $cur_term){
				$categories .= $cur_term->slug .' ';
			}

			$_button_out = '';
			$_show_button = isset($page_custom['_port_butt_show']) ? $page_custom['_port_butt_show'] : '';
			$_button_text = isset($page_custom['_port_butt_txt']) ? $page_custom['_port_butt_txt'] : $button;
			$projPermalink = get_permalink();
			$_link = isset($page_custom['_port_butt_link']) ? $page_custom['_port_butt_link'] : '';
			if (!$_link) $_link = $projPermalink;

			if ( $type == 'portfolio' ){
				if ($_show_button == 'empty' || $_show_button == 'show') $_button_out = '<a href="'. $_link .'" class="button medium button-style1">'. $_button_text .'</a>';
			}else {
				$_button_out = '<a href="'. $_link .'" class="button medium button-style1">'. $button .'</a>';	
			}

			if ($video){
				$slideOutput .= '<li>
								<div class="border-shadow">
									<figure>
										<a class="prettyPhoto kids_picture" data-rel="prettyPhoto[recent_projects_gallery]" href="'. $video .'" title="'. get_the_title() .'">'.$image.'</a>
									</figure>
								</div>
								<h1 class="title">'. get_the_title() .'</h1>
								<p>'. the_excerpt_max_charlength(80, false) .'</p>
								<footer class="aligncenter">
									'.$_button_out.'
								</footer>
							</li>';
			}else {
				$slideOutput .= '<li>
								<div class="border-shadow">
									<figure>
										<a class="prettyPhoto kids_picture" data-rel="prettyPhoto[recent_projects_gallery]" href="'. $prettyPhotoLink .'" title="'. get_the_title() .'">'.$image.'</a>
									</figure>
								</div>
								<h1 class="title">'. get_the_title() .'</h1>
								<p>'. the_excerpt_max_charlength(80, false) .'</p>
								<footer class="aligncenter">
									'.$_button_out.'
								</footer>
							</li>';
			}

			$data_id++;
		} // end while
		wp_reset_postdata();

			$to_return = $wrapper . $slideOutput . $wrapEnd;
			
			return $to_return;
	}	
	add_shortcode('recent_projects', 'theme_recent');
?>