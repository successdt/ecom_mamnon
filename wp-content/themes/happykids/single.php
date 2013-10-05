<?php
/**
 * Single post
 *
 * @package WordPress
 * @subpackage Happy Kids
 * @since Happy Kids 1.0
 */
get_header();

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_crumbs = ( isset($gen_sets['_gen_breadcrumbs']) ) ? $gen_sets['_gen_breadcrumbs'] : 'show';
	$gen_side = ( isset($gen_sets['_sidebar_main_blog_r']) ) ? $gen_sets['_sidebar_main_blog_r'] : 2;
	//for double sidebar layout
	$template = isset($gen_sets['_blog_template_select']) ? $gen_sets['_blog_template_select'] : '';
	$side_l = ( isset($sets['_sidebar_main_blog_r']) ) ? $sets['_sidebar_main_blog_r'] : 3;

?>
</div><!-- .bg-level-1 -->
<div id="kids_middle_container">

		<div class="kids_top_content">

			<div class="kids_top_content_head">
				<div class="kids_top_content_head_body"></div>
			</div><!-- .kids_top_content_head -->

			<div class="kids_top_content_middle">
				<div class="l-page-width">     
					<!-- .kids_posts_container -->
				</div>
			</div><!-- .kids_top_content_middle -->

			<div class="kids_top_content_footer"></div><!-- .end_middle_cloud -->

		</div><!-- .end_middle_cloud  -->

		<div class="bg-level-2-full-width-container kids_bottom_content">

			<div class="bg-level-2-page-width-container l-page-width no-padding">

				<section class="kids_bottom_content_container">

					<div class="header_container"> 

						<h1><?php the_title(); ?></h1>

						<?php if ($gen_crumbs == 'show') : ?>

							<ul id="breadcrumbs">
								<?php theme_breadcrumbs(); ?>
							</ul>
							
						<?php endif; ?>

					</div><!--/ .header_container-->

				<?php if($template == 'full') : ?>
				
					<div class="entry-container cws_fullwidthblog" id="sbr">

						<div id="post-content" class="blog">

								<article class="post-item">

									<?php if(have_posts()) :  while(have_posts()) : the_post();

										if(!get_post_format()){ 
											get_template_part('format', 'standard');	
										} else {
											get_template_part('format', get_post_format());	
										}

									endwhile; endif; ?>

								</article>

								<?php comments_template(); ?>

							</div>
					</div>
					<div class="kids_clear"></div>

					<?php else : ?>

						<div id="sbr" class="entry-container">

								<div id="post-content">

									<article class="post-item">

										<?php if(have_posts()) :  while(have_posts()) : the_post();

											if(!get_post_format()){ 
												get_template_part('format', 'standard');	
											} else {
												get_template_part('format', get_post_format());	
											}

										endwhile; endif; ?>

									</article>

									<?php comments_template(); ?>

								</div>
						</div>

							<aside id="sidebar">
								<?php
									if ( function_exists('dynamic_sidebar') ){
										if ($gen_side) {
											dynamic_sidebar($gen_side );
										}
									}
								?>
							</aside><!--/ #sidebar-->
							<div class="kids_clear"></div>

				<?php endif; ?>

					</div>

				</section><!-- .bottom_content_container -->

				<div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
				<div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->

			</div>

		</div>

	</div><!-- .end_content -->

<?php get_footer(); ?>