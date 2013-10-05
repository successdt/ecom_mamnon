<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Happy Kids
 * @since Happy Kids 1.0
 */

get_header();

	$gen_sets = theme_get_option('general', 'gen_sets');
	$custom_sidebar_id = ( isset($gen_sets['_sidebar_404']) ) ? $gen_sets['_sidebar_404'] : '';

	if ( !$custom_sidebar_id || $custom_sidebar_id == '' || $custom_sidebar_id == 'empty' ) $custom_sidebar_id = 2; 
?>

</div><!-- .bg-level-1 -->
	<div id="kids_middle_container"><!-- .content -->
		<div class="kids_top_content"> <!-- .middle_cloud -->
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
					<div class="header_container"></div>

						<!-- ***************** - START Image floating - *************** -->

						<div id="sbl" class="entry-container">

							<aside id="sidebar">
							<?php 
								if ( function_exists('dynamic_sidebar') && $custom_sidebar_id ){
									dynamic_sidebar($custom_sidebar_id);
								}
							?>	
							</aside><!--/ #sidebar-->

							<div id="post-content">
								<div class="holder404">
									<div class="e404"><h1>404</h1>
										<div class="title_error">
											<span>Error</span>
											<div><?php multitranslate("page not found", "_404_not_found"); ?></div>
										</div>
									</div>

									<div class="kids_clear"></div>
									<div class="description_error">
										<?php multitranslate("Unfortunately, this page is absent or unavailable", "_404_unfortunately"); ?>. <br />
									</div>
								</div><!--/ 404-holder-->
							</div>

							<div class="kids_clear"></div>
							
						</div><!-- .entry-container -->

						 <!-- ***************** - END Image floating - *************** -->	

				</section><!-- .bottom_content_container -->
				<div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
				<div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
			</div>
		</div>

	</div><!-- .end_content -->
	
<?php get_footer(); ?>