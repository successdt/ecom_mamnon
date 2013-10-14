<?php
/*
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage HappyKids
 * @since HappyKids 1.1
 */

	$gen_sets = theme_get_option('general', 'gen_sets');

	$type = isset( $gen_sets["_widget_type"] ) ? $gen_sets["_widget_type"] : '';
	if ($type == '') $type = 'type-1';

?>
    <!-- FOOTER BEGIN -->

		<div class="kids_bottom_container">
			<div class="l-page-width wrapper">
				<div class="one_fourth"><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 1') ) : else : ?><?php endif; ?></div><!--/ one_fourth-->
				<div class="one_fourth"><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 2') ) : else : ?><?php endif; ?></div><!--/ one_fourth-->
				<div class="one_fourth"><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 3') ) : else : ?><?php endif; ?></div><!--/ one_fourth-->
				<div class="one_fourth_last"><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 4') ) : else : ?><?php endif; ?></div><!--/ one_fourth_last-->
			</div><!--/ l-page-width-->
		</div><!-- .kids_bottom_container -->

		<div class="kids-footer-copyrights">
		 <div class="l-page-width">
			<ul>
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Copyrights') ) : else : ?>
				<?php endif; ?>
			</ul>
		 </div>
		</div>

	<!--[if lt IE 9]>
		<script src="js/selectivizr-and-extra-selectors.min.js"></script>
	<![endif]-->

	<script type="text/javascript">	
		var blogurl = '<?php echo home_url(); ?>';
		var themeUrl = '<?php echo THEME_URI; ?>';

		jQuery(document).ready(function($){
			$('.entry-container .widget').addClass('<?php echo $type; ?>');
			$('.entry-container .widget.type-2').each(function(){
				var checker = $(this).find('h3').text();
				if ( checker == '' ){
					$(this).removeClass('type-2');
				}
			});
		});
	</script>

	<?php wp_footer(); ?>

	<script type="text/javascript">	
		jQuery(document).ready(function($){
			$('.nivo-controlNavWrapper').appendTo('.nivo-directionNav');
			$('.nivo-nextNav').appendTo('.nivo-directionNav');
		});
	</script>

	</body>
</html>