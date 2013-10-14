<?php get_header(); ?>

<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$blog_template = ( isset($gen_sets['_blog_template_select']) ) ? $gen_sets['_blog_template_select'] : 'right';
	$gen_crumbs = ( isset($gen_sets['_gen_breadcrumbs']) ) ? $gen_sets['_gen_breadcrumbs'] : 'show';

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
					<div class="header_container">
						<h1><?php multitranslate('Archive', '_blog_tpl_archive'); ?></h1>
						<ul id="breadcrumbs">
							<?php
								if ($gen_crumbs == 'show') theme_breadcrumbs();
							?>
						</ul>
					</div>

						<!-- ***************** - START Image floating - *************** -->
						<?php

							if(!$blog_template){
								get_template_part('category', 'one');
							}else {
								get_template_part('category', $blog_template);
							}

						 ?>
						 <!-- ***************** - END Image floating - *************** -->	

				</section><!-- .bottom_content_container -->
				<div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
				<div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
			</div>
		</div>

	</div><!-- .end_content -->
	
<?php get_footer(); ?>