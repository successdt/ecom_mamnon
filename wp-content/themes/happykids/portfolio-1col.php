<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_side = ( isset($gen_sets['_sidebar_main']) ) ? $gen_sets['_sidebar_main'] : '';
	$gen_button_show = ( isset($gen_sets['_gen_port_butt_show']) ) ? $gen_sets['_gen_port_butt_show'] : '';
	$gen_button_txt = ( isset($gen_sets['_gen_port_butt_txt']) ) ? $gen_sets['_gen_port_butt_txt'] : '';

	$gen_ipp = isset($gen_sets['_gen_port_ipp']) ? $gen_sets['_gen_port_ipp'] : '';

	$page_custom = theme_get_post_custom();
	$custom_sidebar_check = ( isset($page_custom['_sidebar_check']) ) ? $page_custom['_sidebar_check'] : '';
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar_id = ( isset($page_custom['_sidebar_name']) ) ? $page_custom['_sidebar_name'] : '';

	if ($gen_side == 'empty' || $gen_side == '') $gen_side = 2;
	if ($custom_sidebar_id == 'empty' || $custom_sidebar_id == '') $custom_sidebar_id = false;

	$post_port = ( isset($page_custom['_port_cat']) ) ? $page_custom['_port_cat'] : '';
	
	$custom_ipp = isset($page_custom['_port_ipp']) ? $page_custom['_port_ipp'] : '';
	$ipp = '';
	if (!$custom_ipp){
		$ipp = $gen_ipp;
	}else {
		$ipp = $custom_ipp;
	}

	if ($post_port){
		$query_array = array(
			'post_type' =>  'portfolio',
			'posts_per_page' => $ipp,
			'paged' => get_query_var('paged'),
			'tax_query' => array(
						array(
						'taxonomy' => 'portfolio_category',
						'field' => 'slug',
						'terms' => $post_port,
						'operator' => 'IN'
						)
			)
		);
	}else{
		$query_array = array(
			'posts_per_page' => $ipp,
			'paged' => get_query_var('paged'),
			'post_type' =>  'portfolio',
		);
	}
?>

<div id="sbr" class="entry-container gl_col_1">
	
	<div class="gallery">
		
<?php

		if ($post_port) : ?>

			<?php $children = findchild($post_port, 'portfolio_category'); ?>

			<nav id="filter">

				<ul id="splitter" class="splitter">
					<?php 
							$to_return = array();
							$to_return[] = '<li><a data-categories="*">'.multitranslate("All", "_tr_all", false).'</a></li>';

							
							foreach ($children as $child) {  
							    $term = get_term_by( 'id', $child, 'portfolio_category' ); 
							    if ($term) $to_return[] = '<li><a data-categories="' . $term->slug . '">' . $term->name . '</a></li>';
							}

							echo implode("\n", $to_return);
					?>
				</ul><!--/ .splitter-->	

			</nav>	
		
		<?php endif; ?>	
		
		<ul id="gallery">

			<?php

				$query_port = new WP_Query( $query_array );
				
				while($query_port->have_posts()){ $query_port->the_post();

					global $more;
					$more = 0;

					$postid = get_the_ID();
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($postid), 'full', true);

					$the_cat = get_the_terms( $postid, 'portfolio_category');
					$categories = '';

					if(is_array($the_cat))
						foreach($the_cat as $cur_term){
							$categories .= $cur_term->slug .' ';			
						}

						$page_custom = theme_get_post_custom();
						$button_show = ( isset($page_custom['_port_butt_show']) ) ? $page_custom['_port_butt_show'] : '';
						$button_link = ( isset($page_custom['_port_butt_link']) ) ? $page_custom['_port_butt_link'] : '';
						$button_txt = ( isset($page_custom['_port_butt_txt']) ) ? $page_custom['_port_butt_txt'] : '';
						$custom_popup = isset($page_custom['_port_popup_link']) ? $page_custom['_port_popup_link'] : '';
						if (!$button_txt) $button_txt = $gen_button_txt;

						if ($button_show == 'empty') $button_show = $gen_button_show;

			?>

				<li data-categories="<?php echo $categories; ?>" class="gallery-item">

					<div class="border-shadow alignleft">
						
						<?php if ($custom_popup) : ?>

							<figure>
								<a title="<?php the_title(); ?>" data-rel="prettyPhoto[portfolio]" class="prettyPhoto kids_picture" href="<?php echo esc_url($custom_popup); ?>">
									<img src="<?php echo bfi_thumb( $image[0], array('width' => 354, 'height' => 253, 'crop' => true) ); ?>" width="354" height="253" alt="" />
								</a>										
							</figure>

						<?php else : ?>

							<figure>
								<a title="<?php the_title(); ?>" data-rel="prettyPhoto[portfolio]" class="prettyPhoto kids_picture" href="<?php echo esc_url($image[0]); ?>">
									<img src="<?php echo bfi_thumb( $image[0], array('width' => 354, 'height' => 253, 'crop' => true) ); ?>" width="354" height="253" alt="" />
								</a>										
							</figure>

						<?php endif; ?>
						
					</div><!--/ gallery-image-->

					<div class="gallery-text">
						<h1><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?>
						<p>
<?php

							if ($button_show == 'show'){
								if ($button_link == ''){ ?>
									<a href="<?php the_permalink(); ?>" class="button medium button-style1 align-btn-right"><?php if ($button_txt) echo $button_txt; ?></a>
<?php 							}else{ ?>
									<a href="<?php echo esc_url($button_link); ?>" target="_blank" class="button medium button-style1 align-btn-right"><?php if ($button_txt != ''){echo $button_txt; }else{echo $gen_button_txt;} ?></a>
<?php 							}
							}elseif ($button_show == 'hide'){

							}
?>
						</p>
					</div><!--/ gallery-text-->

					<div class="kids_clear"></div>
				</li>

			<?php
				}
				wp_reset_postdata();
 			?>

		</ul><!--/ #gallery-->

		<?php theme_pagination('pagenavi gl', $query_port); ?>

	</div><!--/ .gallery-->

			<aside id="sidebar">
			<?php
				if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar_id ){
					dynamic_sidebar($custom_sidebar_id);
				}elseif( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar($gen_side);
				}
			?>
			</aside><!--/ #sidebar-->

	<div class="kids_clear"></div>                                
</div><!-- .entry-container -->