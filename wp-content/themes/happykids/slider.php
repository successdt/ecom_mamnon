<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$what_slider = ( isset($gen_sets['_what_slider_select']) ) ? $gen_sets['_what_slider_select'] : '';
	$cam_slide_capt = ( isset($gen_sets['_cam_slider_caption']) ) ? $gen_sets['_cam_slider_caption'] : '';
	$slide_img = ( isset($gen_sets['_gen_slider_image']) ) ? $gen_sets['_gen_slider_image'] : '';
	$slide_video = ( isset($gen_sets['_slider_video']) ) ? stripslashes($gen_sets['_slider_video']) : '';
	$slide_video_host = ( isset($gen_sets['_gen_video_host']) ) ? stripslashes($gen_sets['_gen_video_host']) : '';
	$vim_color = ( isset($gen_sets['_vim_color']) ) ? stripslashes($gen_sets['_vim_color']) : '';
	$yt_color = ( isset($gen_sets['_yt_color']) ) ? stripslashes($gen_sets['_yt_color']) : '';
	$yt_theme = ( isset($gen_sets['_yt_theme']) ) ? stripslashes($gen_sets['_yt_theme']) : '';
	$slide_video_autoplay = isset($gen_sets['_gen_video_autoplay']) ? $gen_sets['_gen_video_autoplay'] : null;
	$parser_return = '';

 	$post_slider = ( isset($gen_sets['_gen_slide_cat']) ) ? $gen_sets['_gen_slide_cat'] : '';

	if ($post_slider){
		$query_array = array(
			'post_type' =>  'slideshow',
			'posts_per_page' => '-1',
			'tax_query' => array(
						array(
						'taxonomy' => 'slideshow_category',
						'field' => 'slug',
						'terms' => $post_slider,
						'operator' => 'IN'
						)
			)
		);
	}else {
		$query_array = array(
			'post_type' =>  'slideshow',
			'posts_per_page' => '-1',
		);
	}
	$query_slide = new WP_Query( $query_array );
?>

<div class="kids_slider_bg <?php echo $what_slider; ?>">
	<div class="kids_slider_wrapper">
		<div class="kids_slider_inner_wrapper">

			<?php if ($what_slider == 'camera') : ?>

				<div class="camera_wrap camera_azure_skin" id="camera_wrap">

					<?php
						if ($query_slide->have_posts()){
							while($query_slide->have_posts()){
								$query_slide->the_post();

									$page_custom = theme_get_post_custom();
									$show_link = ( isset($page_custom['_slide_link']) ) ? $page_custom['_slide_link'] : '';
									$show_capt = ( isset($page_custom['_slide_capt']) ) ? $page_custom['_slide_capt'] : '';

									$capt_array = array(
										"moveFromLeft",
										"moveFromRight",
										"moveFromTop",
										"moveFromBottom",
										"fadeIn",
										"fadeFromLeft",
										"fadeFromRight",
										"fadeFromTop",
										"fadeFromBottom",
									);

									$i = 1;

									while ($i <= 8) {
										$random_number = mt_rand(0,8);
										$i++;
									}

								 	if ( has_post_thumbnail() ) $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
						?>
									<div data-src="<?php echo bfi_thumb( $image[0], array('width' => 916, 'height' => 400, 'crop' => true) ); ?>">

										<?php if ($show_capt != '' || $show_link != '') : ?>

	 										<div class="camera_caption <?php if ($cam_slide_capt == 'random'){echo $capt_array[$random_number];} else {echo $cam_slide_capt;}	?>">
												 <?php if ($show_capt != '') echo $show_capt; ?>
												 <?php if ($show_link != '') echo '<br /><a href="' . esc_url($show_link) . '" title="More..." style="float:right;">Read more &#62;</a><div class="kids_clear"></div>  '; ?>
											</div>

										<?php endif; ?>

									</div>
						<?php
							}
							wp_reset_postdata();
						}
					?>

				 </div><!-- #camera_wrap -->

				<?php elseif ($what_slider == 'flex') : ?>

						<div class="flexslider">
							<ul class="slides">

								<?php
									if ($query_slide->have_posts()){
										while($query_slide->have_posts()){
											$query_slide->the_post();
									?>
												<?php if ( has_post_thumbnail() ) $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>

												<li><img src="<?php echo bfi_thumb( $image[0], array('width' => 916, 'height' => 400, 'crop' => true) ); ?>" alt="" /></li>
									<?php

										}

										wp_reset_postdata();
									}
								?>

							</ul>
						</div><!--/ #kids-slider-->

				<?php elseif ($what_slider == 'video') : ?>


<!-- NEED TO REPLACE IT WITH VIDEO FUNCTION -->

					<?php
						if($slide_video){
							if ($slide_video_host == 'youtube')	$parser_return = theme_youtube_parser( $slide_video, 916, 400, $slide_video_autoplay, $yt_color, $yt_theme );
							if ($slide_video_host == 'vimeo') $parser_return = theme_vimeo_parser( $slide_video, 916, 400, $slide_video_autoplay, $vim_color );
							echo $parser_return;
						}else {
							echo '<h1 style="color: red; text-align: center; margin: 0; padding:5px; background-color: #000;">An Error - paste the ID of your video into the theme options page</h1>';
						}
					?>

<!-- NEED TO MAKE IT DINAMIC -->

				<?php elseif ($what_slider == 'image') : ?>

					<img src="<?php echo bfi_thumb( $slide_img, array('width' => 916, 'height' => 400, 'crop' => true) ); ?>" alt="">

				<?php endif; ?>

		</div><!--/ .kids_slider_inner_wrapper-->
		
	</div><!--/ .kids_slider_wrapper-->
	
</div><!--/ .kids_slider_bg-->  