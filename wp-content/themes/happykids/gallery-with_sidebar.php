<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_side = ( isset($gen_sets['_sidebar_main']) ) ? $gen_sets['_sidebar_main'] : '';

	$gen_ipp = isset($gen_sets['_gen_gall_ipp']) ? $gen_sets['_gen_gall_ipp'] : '';

	$page_custom = theme_get_post_custom();
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar_id = ( isset($page_custom['_sidebar_name']) ) ? $page_custom['_sidebar_name'] : '';
	$custom_slide_cat = ( isset($page_custom['_slide_cat']) ) ? $page_custom['_slide_cat'] : '';

	if ($gen_side == 'empty' || $gen_side == '') $gen_side = 2;
	if ($custom_sidebar_id == 'empty' || $custom_sidebar_id == '') $custom_sidebar_id = false;

	$custom_ipp = isset($page_custom['_gall_ipp']) ? $page_custom['_gall_ipp'] : '';
	$ipp = '';
	if (!$custom_ipp){
		$ipp = $gen_ipp;
	}else {
		$ipp = $custom_ipp;
	}
?>

<div id="sbr" class="entry-container">
	
	<div class="gallery">

		<?php if ($custom_slide_cat) : ?>

			<?php if ($children = findchild($custom_slide_cat, 'slideshow_category')) : ?>

			<nav id="filter">

				<ul id="splitter" class="splitter">
					<?php 
							$to_return = array();
							$to_return[] = '<li><a data-categories="*">'.multitranslate("All", "_tr_all", false).'</a></li>';

							
							foreach ($children as $child) {  
							    $term = get_term_by( 'id', $child, 'slideshow_category' ); 
							    if ($term) $to_return[] = '<li><a data-categories="' . $term->slug . '">' . $term->name . '</a></li>';
							}

							echo implode("\n", $to_return);
					?>
				</ul><!--/ .splitter-->	

			</nav>	
		
			<?php endif; ?>
			
		<?php endif; ?>
		
		<ul id="gallery">

			<?php

				if ($custom_slide_cat){
					$query_array = array(
						'post_type' =>  'slideshow',
						'posts_per_page' => $ipp,
						'paged' => get_query_var('paged'),
						'tax_query' => array(
									array(
									'taxonomy' => 'slideshow_category',
									'field' => 'slug',
									'terms' => $custom_slide_cat,
									'operator' => 'IN'
									)
						)
					);
				}else{
					$query_array = array(
						'posts_per_page' => $ipp,
						'paged' => get_query_var('paged'),
						'post_type' =>  'slideshow',
					);
				}

				$query_port = new WP_Query( $query_array );
						
				function new_excerpt_length($length) {  
					    return 6;  
				}  
				add_filter('excerpt_length', 'new_excerpt_length');

				while($query_port->have_posts()){ $query_port->the_post();
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true);

					$the_cat = get_the_terms( get_the_ID() , 'slideshow_category');
					$categories = '';
					if(is_array($the_cat))
					foreach($the_cat as $cur_term){
						$categories .= $cur_term->slug .' ';			
					}
			?>


					<li data-categories="<?php echo $categories; ?>" class="gallery-item">

						<div class="border-shadow">
							<figure>
								<a title="<?php the_title(); ?>" data-rel="prettyPhoto[gallery]" class="prettyPhoto kids_picture" href="<?php echo esc_url($image[0]); ?>">
									<img src="<?php echo bfi_thumb( $image[0], array('width' => 278, 'height' => 182, 'crop' => true) ); ?>" width="278" height="182" alt="" />
								</a>										
							</figure>
						</div><!--/ gallery-image-->

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

</div><!-- .gl_col_1 -->

<div class="kids_clear"></div>