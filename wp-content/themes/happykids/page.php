<?php get_header(); ?>

<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_template = ( isset($gen_sets['_gen_template_select']) ) ? $gen_sets['_gen_template_select'] : 'right';
	$main_blog_template = ( isset($gen_sets['_blog_template_select']) ) ? $gen_sets['_blog_template_select'] : 'right';
	$gen_crumbs = ( isset($gen_sets['_gen_breadcrumbs']) ) ? $gen_sets['_gen_breadcrumbs'] : 'show';

	$show_slider = isset($gen_sets['_gen_slider_select']) ? $gen_sets['_gen_slider_select'] : '';
	$slogan = isset($gen_sets['_gen_slogan']) ? $gen_sets['_gen_slogan'] : null;

	$_wp_blog_page = get_option('page_for_posts');
	$_page_id = get_the_id();

	$page_custom = theme_get_post_custom();
	$page_type = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : 'default';
	$page_crumbs = ( isset($page_custom['_breadcrumbs']) ) ? $page_custom['_breadcrumbs'] : 'empty';

	if ($page_type == 'page'){
		$page_template = ( isset($page_custom['_page_templ']) ) ? $page_custom['_page_templ'] : '';
	}
	if ($page_type == 'blog'){
		$blog_template = ( isset($page_custom['_blog_templ']) ) ? $page_custom['_blog_templ'] : '';
	}
	if ($page_type == 'port'){
		$port_template = ( isset($page_custom['_port_templ']) ) ? $page_custom['_port_templ'] : '';
	}
	if ($page_type == 'gall'){
		$gall_template = ( isset($page_custom['_gall_templ']) ) ? $page_custom['_gall_templ'] : '';
	}

?>
	<?php if (is_front_page()) : ?>
		
		<?php if ($show_slider) : ?>
			<div class="bg-level-2-page-width-container l-page-width">
				
				<?php get_template_part('slider'); ?>

			<div class="bg-level-2-left" id="bg-level-2-left"></div>
			<div class="bg-level-2-right" id="bg-level-2-right"></div>

			</div><!-- .l-page-width -->

		<?php else : ?>

			<div class="bg-level-2-page-width-container l-page-width">
				<div class="theme_without_slider"></div>

			<div class="bg-level-2-left" id="bg-level-2-left"></div>
			<div class="bg-level-2-right" id="bg-level-2-right"></div>

			</div><!-- .l-page-width -->

		<?php endif; ?>

	<?php endif; ?>

</div><!-- .bg-level-1 -->
	<div id="kids_middle_container"><!-- .content -->
		<div class="kids_top_content"> <!-- .middle_cloud -->
			<div class="kids_top_content_head">
				<div class="kids_top_content_head_body"></div>
			</div><!-- .kids_top_content_head -->

			<div class="kids_top_content_middle <?php if (is_front_page()) echo 'homepage'; ?>">
<?php
			if (is_front_page()) {
				if ($slogan){
?>
					<div class="slogan" >
						<h1><?php echo $slogan ; ?></h1>
					</div>
<?php
				}
			}
?>				
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
						<?php if (!is_front_page()) echo '<h1>' . get_the_title() . '</h1>'; ?>
						<ul id="breadcrumbs">
							<?php
								if ($page_crumbs == 'empty' && $gen_crumbs == 'show'){
									theme_breadcrumbs();
								}elseif ($page_crumbs == 'show'){
									theme_breadcrumbs();
								}
							?>
						</ul>
					</div>

						<!-- ***************** - START Image floating - *************** -->
						<?php
						
							if ( $page_type == 'default' ) {
								get_template_part('page', $gen_template);
							}elseif ($page_type == 'page') {
								if($page_template == 'empty'){
									get_template_part('page', 'right');
								}else {
									get_template_part('page', $page_template);
								}
							}elseif ($page_type == 'blog'){
								if($blog_template == 'empty'){
									if ($main_blog_template){
										get_template_part('blog', $main_blog_template);
									}else {
										get_template_part('blog', 'one');
									}
								}else {
									get_template_part('blog', $blog_template);
								}
							}elseif ($page_type == 'port'){
								if($port_template == 'empty') {
									get_template_part('portfolio', '3col');	
								}else {
									get_template_part('portfolio', $port_template);	
								}
							}elseif ($page_type == 'gall'){
								if($gall_template == 'empty') {
									get_template_part('gallery', 'no_sidebar');	
								}else {
									get_template_part('gallery', $gall_template);	
								}
							}elseif ($page_type == 'cform'){
								get_template_part('page', 'cform');	
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