<?php
	$gen_sets = theme_get_option('general', 'gen_sets');

	$sidebar = isset($gen_sets['_sidebar_main_blog_r']) ? $gen_sets['_sidebar_main_blog_r'] : '';
	if (!$sidebar || $sidebar == 'empty') $sidebar = 'sidebar-2';

	$page_custom = theme_get_post_custom();
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar_id = ( isset($page_custom['_sidebar_name']) ) ? $page_custom['_sidebar_name'] : '';

	if ($custom_sidebar_id == 'empty' || $custom_sidebar_id == '') $custom_sidebar_id = false;
?>

<div class="entry-container" id="sbr">

	<div id="post-content" class="blog">
		<?php
		
			if( have_posts() ) :  while( have_posts() ) : the_post();

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
	
			<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

				<div class="post-meta">
					<div class="post-date">
						<span class="day"><?php the_time('j'); ?></span>
						<span class="month"><?php the_time('M.Y'); ?></span>
					</div><!--/ post-date-->
					<div class="post-comments"><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?> <?php multitranslate("Comments", "_comments_x_comments"); ?></a></div>
					
				</div><!--/ post-meta-->

				<div class="post-entry clearfix">

					<div class="post-title">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</div><!--/ post-title-->

					<?php
						if ( has_post_thumbnail() ) : ?>

							<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true); ?>
							
							<div class="border-shadow alignleft">
								<figure>
									<a class="prettyPhoto" title="<?php the_title(); ?>" href="<?php echo esc_url($image[0]); ?>"><img class="pic" src="<?php echo bfi_thumb( $image[0], array('width' => 236, 'height' => 153, 'crop' => true) ); ?>" alt="" /></a>
								</figure>
							</div><!--/ post-thumb-->
					<?php
						endif;
					?>
					
					<div class="entry">
						<?php the_content(); ?>
						<span class="l-float-right"><a href="<?php the_permalink(); ?>" class="more link"> <?php multitranslate("Read more...", "_tr_moar"); ?> </a></span>
					</div><!--/ entry-->

				</div><!--/ post-entry -->

				<div class="post-footer">

<?php
			$categories = get_the_term_list($post->ID, 'portfolio_category', '', ', ' );

			if ($categories) { ?>

					<div class="post_cats l-float-left">
						<span><?php multitranslate('Category', 'cws_post_under_cat'); ?>:</span>
						<?php echo $categories; ?>
					</div><!--/ post-cats -->
<?php 		}
			if ($output) { ?>

					<div class="post_cats l-float-left">
						<span><?php multitranslate('Category', 'cws_post_under_cat'); ?>:</span>
						<?php echo trim($output, $separator); ?>
					</div><!--/ post-cats -->
<?php 		} 
			if ($tag_out) { ?>
					<div class="post_tags l-float-right">
						<p><span><?php multitranslate('Tags:', 'cws_post_under_tags'); ?></span>
							<?php echo trim($tag_out, $tag_separator); ?>
					</div><!--/ post-tags -->
<?php 		}
?>
					<div class="kids_clear"></div>

				</div><!--/ post-footer-->

			</article><!--/ post-item-->

	<?php

		endwhile; endif; // LOOP END
		
		theme_pagination('pagenavi');

	?>

	</div>

		<aside id="sidebar">
			<?php
				if ( function_exists('dynamic_sidebar') && $sidebar ){
					dynamic_sidebar($sidebar);
				}
			?>
		</aside><!--/ #sidebar-->

	<div class="kids_clear"></div>
</div><!-- .entry-container -->