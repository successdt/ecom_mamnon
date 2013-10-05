<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_side_r = ( isset($gen_sets['_sidebar_main_blog_r']) ) ? $gen_sets['_sidebar_main_blog_r'] : '';
	$gen_side_l = ( isset($gen_sets['_sidebar_main_blog_l']) ) ? $gen_sets['_sidebar_main_blog_l'] : '';

	$page_custom = theme_get_post_custom();
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar_l = ( isset($page_custom['_sidebar_left']) ) ? $page_custom['_sidebar_left'] : '';
	$custom_sidebar_r = ( isset($page_custom['_sidebar_right']) ) ? $page_custom['_sidebar_right'] : '';

	if ( $gen_side_r == 'empty' || $gen_side_r == '' ) $gen_side_r = 2;
	if ( $gen_side_l == 'empty' || $gen_side_l == '' ) $gen_side_l = 3;
	if ( $custom_sidebar_r == 'empty' || $custom_sidebar_r == '') $custom_sidebar_r = false;
	if ( $custom_sidebar_l == 'empty' || $custom_sidebar_l == '') $custom_sidebar_l = false;

	$blog_cat = isset($page_custom['_blog_cat']) ? $page_custom['_blog_cat'] : '';

	if ($blog_cat){
		$query_array = array(
			'post_type' =>  'post',
			'posts_per_page' => $posts_per_page,
			'paged' => get_query_var('paged'),
			'tax_query' => array(
						array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => $blog_cat,
						'operator' => 'IN'
						)
			)
		);
	}else{
		$query_array = array(
			'posts_per_page' => $posts_per_page,
			'paged' => get_query_var('paged'),
			'post_type' =>  'post',
		);
	}	
?>

<div id="dsb" class="entry-container">

	<aside id="sidebar-left">
		<?php
			if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar_l ){
				dynamic_sidebar($custom_sidebar_l);
			}elseif( function_exists('dynamic_sidebar') ) {
				dynamic_sidebar($gen_side_l);
			}
		?>
	</aside>

	<div id="post-content">

<?php
	$loop_cont = 0;

	$_query = new WP_Query($query_array);
		
	if( $_query->have_posts() ) :  while( $_query->have_posts() ) : $_query->the_post();

		global $more;
		$more = 0;

		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a class="link" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( multitranslate( "View all posts in", "_tr_view", false), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		}

		$tags = get_the_tags();
		$tag_out = '';
		$tag_separator = ', ';
				if($tags){
					$trance = multitranslate("Tag", "_tr_tag", false);
					foreach ($tags as $tag){
						$tag_link = get_tag_link($tag->term_id);
						$tag_link = esc_url($tag_link);
						
						$tag_out .= "<a href='{$tag_link}' title='{$trance}' class='link'>{$tag->name}</a>" . $tag_separator;
					}
				}
?>
		<article class="post-item">

			<div class="post-meta">
				<div class="post-date">
					<span class="day"><?php the_time('j'); ?></span>
					<span class="month"><?php the_time('M.Y'); ?></span>
				</div><!--/ post-date-->
			</div><!--/ post-meta-->

			<div class="post-entry">

				<div class="post-title">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				</div><!--/ post-title-->

				
				<?php
					if ( has_post_thumbnail()) {
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true); ?>
						
						<div class="border-shadow alignleft">
							<figure>
								<a class="prettyPhoto kids_picture" title="<?php the_title(); ?>" href="<?php echo esc_url($image[0]); ?>"><img class="pic" src="<?php echo bfi_thumb( $image[0], array('width' => 354, 'height' => 253, 'crop' => true) ); ?>" alt="" /></a>
							</figure>
						</div><!--/ post-thumb-->
				<?php
					}
				?>

				<div class="entry">
					<?php the_content(); ?>
					<p style="margin: -20px 0px 10px;">
						<a href="<?php the_permalink(); ?>" class="more link"><?php multitranslate("Read more...", "_tr_moar"); ?></a>
					</p>
				</div><!--/ entry--> 

			</div><!--/ post-entry -->

			<div class="post-footer">

				<div class="post_cats l-float-left">
					<p><span><?php multitranslate('Category', 'cws_post_under_cat'); ?>:</span><?php echo trim($output, $separator); ?></p>
				</div><!--/ post-cats -->

			<?php if($tag_out) : ?>
				<div class="post_tags l-float-left">
					<p><span><?php multitranslate('Tags:', 'cws_post_under_tags'); ?></span>
						<?php echo trim($tag_out, $tag_separator); ?>
					</p>
				</div><!--/ post-tags -->
			<?php endif; ?>

				<div class="post-comments"><?php echo get_comments_number(); ?></div>
				<div class="kids_clear"></div>

			</div><!--/ post-footer-->

		</article><!--/ post-item-->

	<?php
			$loop_cont++;
		endwhile; endif; // LOOP END

		wp_reset_query();

		theme_pagination('pagenavi', $_query, 3, 12); ?>

	</div>

	<aside id="sidebar-right">
		<?php
			if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar_r ){
				dynamic_sidebar($custom_sidebar_r);
			}elseif( function_exists('dynamic_sidebar') ) {
				dynamic_sidebar($gen_side_r);
			}
		?>
	</aside><!--/ #sidebar-->


	<div class="kids_clear"></div>
</div><!-- .entry-container -->