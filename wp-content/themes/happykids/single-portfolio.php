<?php
/**
 * Single portfolio
 *
 * @package WordPress
 * @subpackage Happy Kids
 * @since Happy Kids 1.0
 */
get_header();

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_crumbs = ( isset($gen_sets['_gen_breadcrumbs']) ) ? $gen_sets['_gen_breadcrumbs'] : 'show';

	$page_custom = theme_get_post_custom();
	$video = ( isset($page_custom['_port_popup_link']) ) ? $page_custom['_port_popup_link'] : '';

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

				<div id="sbr" class="entry-container">

						<div id="post-content">
<?php the_category(', '); ?>
							<!-- <article class="post-item"> -->

								<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>

<?php
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true);
?>

<div class="post-entry">

	<div class="post-title">

		<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	</div><!--/ post-title-->

	<div class="border-shadow" style="">
	<?php if ($video) : ?>
		<figure>
			<a title="<?php the_title(); ?>" data-rel="prettyPhoto" class="prettyPhoto pfVideo kids_picture" href="<?php echo esc_url($video); ?>"><img class="pic" src="<?php echo bfi_thumb( $image[0], array('width' => 544, 'height' => 255, 'crop' => true) ); ?>" alt="" width="604" height="305" /></a>
		</figure>
	<?php else : ?>
		<figure>
			<a title="<?php the_title(); ?>" data-rel="prettyPhoto" class="prettyPhoto kids_picture" href="<?php echo esc_url($image[0]); ?>"><img class="pic" src="<?php echo bfi_thumb( $image[0], array('width' => 544, 'height' => 255, 'crop' => true) ); ?>" alt="" width="604" height="305" /></a>
		</figure>
	<?php endif; ?>
	</div><!--/ post-thumb-->

	<div class="entry">
 		<?php the_content(); ?>
	</div><!--/ entry--> 

</div><!--/ post-entry -->

<div class="clearfix"></div><!--/ post-footer-->

							<?php endwhile; endif; ?>

							<!-- </article> -->

						</div>

						<aside id="sidebar">
							<?php
								if ( function_exists('dynamic_sidebar') ){
									dynamic_sidebar(2);
								}
							?>
						</aside><!--/ #sidebar-->

						<div class="kids_clear"></div>  

					</div>

				</section><!-- .bottom_content_container -->

				<div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
				<div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->

			</div>

		</div>

	</div><!-- .end_content -->

<?php get_footer(); ?>