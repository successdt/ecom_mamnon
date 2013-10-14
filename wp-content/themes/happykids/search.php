<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Happy Kids
 * @since Happy Kids 1.0
 */

	get_header();	

	$gen_sets = theme_get_option('general', 'gen_sets');
	$sidebar = ( isset($gen_sets['_sidebar_search']) ) ? $gen_sets['_sidebar_search'] : '';

	if (!$sidebar || $sidebar == 'empty') $sidebar = 2;

?>

</div><!-- .bg-level-1 -->
	<div id="kids_middle_container"><!-- .content -->
		<div class="kids_top_content">
			<div class="kids_top_content_head">
				<div class="kids_top_content_head_body"></div>
			</div><!-- .kids_top_content_head -->
			<div class="kids_top_content_middle">
				<div class="l-page-width">
					<!-- .kids_posts_container -->
				</div>
			</div><!-- .kids_top_content_middle -->
			<div class="kids_top_content_footer"></div>
		</div><!-- .end_middle_cloud  -->
		<div class="bg-level-2-full-width-container kids_bottom_content">
			<div class="bg-level-2-page-width-container l-page-width no-padding">
				<section class="kids_bottom_content_container">
					<div class="header_container">
						<h1><?php _e('Search Results for: ', THEME_NAME); ?>"<?php echo get_search_query(); ?>"</h1>
						<ul id="breadcrumbs">
							<?php theme_breadcrumbs(); ?>
						</ul><!--/ breadcrumbs-->
					</div><!--/ header_container-->
					
					<div class="entry-container" id="sbr">

<div id="post-content" class="blog">

<?php
					
					if(have_posts()) :  while(have_posts()) : the_post(); ?>
<?php
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
										<span class="day"><?php  the_time('j'); ?></span>
										<span class="month"><?php  the_time('M.Y'); ?></span>
									</div><!--/ post-date-->
									<div class="post-comments"><a href="<?php the_permalink(); ?>"><?php echo get_comments_number(); ?> <?php multitranslate("Comments", "_comments_x_comments"); ?></a></div>
								</div><!--/ post-meta-->

								<div class="post-entry clearfix">

									<div class="post-title">
										<h1>
											<a href="<?php the_permalink() ?>">
												<?php

													$title  = get_the_title();
													$keys= explode(" ",$s);
													$title  = preg_replace('/('.implode('|', $keys) .')/iu',
													'<span class="search-excerpt">\0</span>',
													$title);

													echo $title;
												?>
											</a>
										</h1>
									</div><!--/ post-title-->

									<?php
										if ( has_post_thumbnail()) {
											$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true); ?>
											
											<div class="border-shadow alignleft">
												<figure>
													<a href="<?php the_permalink() ?>"><img class="pic" src="<?php echo bfi_thumb( $image[0], array('width' => 236, 'height' => 153, 'crop' => true) ); ?>" alt="" /></a>
												</figure>
											</div><!--/ post-thumb-->
									<?php
										}
									?>
									
									<div class="entry">
										<?php

											$content  = get_the_content();
											$keys= explode(" ",$s);
											$content  = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>',
											$content);
											// $content = preg_replace('/\[.*\]/', '', $content);
											// $content = substr(strip_shortcodes(strip_tags($content,'')),0, 250);
											echo $content;
										?>
										
										<span class="l-float-right"><a href="<?php the_permalink(); ?>" class="more link"> <?php multitranslate("Read more...", "_tr_moar"); ?> </a></span>
									</div><!--/ entry-->

								</div><!--/ post-entry -->
							
							<?php if ($output || $tag_out) : ?>

								<div class="post-footer">
									
									<?php if ($output) : ?>

									<div class="post_cats l-float-left">
										<span><?php multitranslate('Category', 'cws_post_under_cat'); ?>:</span>
										<?php echo trim($output, $separator); ?>
									</div><!--/ post-cats -->
									
									<?php endif; ?>
									<?php if ($tag_out) : ?>

									<div class="post_tags l-float-right">
										<p><span><?php multitranslate('Tags:', 'cws_post_under_tags'); ?></span>
											<?php echo trim($tag_out, $tag_separator); ?>
									</div><!--/ post-tags -->

									<?php endif; ?>

									<div class="kids_clear"></div>

								</div><!--/ post-footer-->

							<?php endif; ?>

							</article><!--/ post-item-->

					<?php
						endwhile; else : // LOOP END
					?>
					
						<div class="holder404">
							<div class="description_error">
								<p>
									<?php multitranslate('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', '_tr_nothing_search' ); ?>
								</p>
							</div>
						</div>

					<?php endif; ?>

	<?php theme_pagination('pagenavi gl'); ?>

	</div><!--/ .gallery-->

			<aside id="sidebar">
			<?php
				if( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar($sidebar);
				}
			?>
			</aside><!--/ #sidebar-->
							
						<div class="kids_clear"></div>
					</div><!-- .entry-container -->
				</section><!-- .bottom_content_container -->
				<div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
				<div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
			</div>
		</div>

	</div><!-- .end_content -->
	
<?php get_footer(); ?>