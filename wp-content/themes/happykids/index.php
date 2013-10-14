<?php 
	global $post;

	get_header();

	$gen_sets = theme_get_option('general', 'gen_sets');

	$show_slider = isset($gen_sets['_gen_slider_select']) ? $gen_sets['_gen_slider_select'] : '';
	$slogan = isset($gen_sets['_gen_slogan']) ? $gen_sets['_gen_slogan'] : null;
	$home_block = isset($gen_sets['_home_top']) ? $gen_sets['_home_top'] : null;
	$home_bottom = isset($gen_sets['_home_bottom']) ? $gen_sets['_home_bottom'] : null;

?>

		<div class="bg-level-2-page-width-container l-page-width">

			<?php 
				if ($show_slider){
					get_template_part('slider');
				}else {
					echo '<div class="theme_without_slider"></div>';
				}
			?>

			<div class="bg-level-2-left" id="bg-level-2-left"></div>
			<div class="bg-level-2-right" id="bg-level-2-right"></div>

			</div><!-- .l-page-width -->
		</div>

	<div id="kids_middle_container">

		<div class="kids_top_content">

			<div class="kids_top_content_head">

				<div class="kids_top_content_head_body"></div>

			</div><!-- .kids_top_content_head -->

			<div class="kids_top_content_middle homepage">

				<div class="l-page-width">
<?php
				if ($slogan){
?>
					<div class="slogan">
						<h1><?php echo $slogan ; ?></h1>
					</div>
<?php
				}
?>
					<section class="kids_posts_container clearfix">
<?php
						tiny_output($home_block);
?>
					</section><!-- .kids_posts_container -->

				</div><!--/ l-page-width-->

			</div><!-- .kids_top_content_middle -->

			<div class="kids_top_content_footer"></div>

		</div><!-- .kids_top_content -->

		<div class="kids_bottom_content">

			<div class="l-page-width">

				<div class="kids_bottom_content_container clearfix">
<?php
					tiny_output($home_bottom);
?>					
				</div><!--/ .kids_bottom_content_container-->

			</div><!--/ .l-page-width-->

		</div><!--/ .kids_bottom_content-->

	</div><!-- #kids_middle_container -->
	
<?php get_footer(); ?>