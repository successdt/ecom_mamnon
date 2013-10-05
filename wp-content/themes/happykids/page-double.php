<?php
	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_side_r = ( isset($gen_sets['_sidebar_main']) ) ? $gen_sets['_sidebar_main'] : '';
	$gen_side_l = ( isset($gen_sets['_sidebar_main_l']) ) ? $gen_sets['_sidebar_main_l'] : '';

	$page_custom = theme_get_post_custom();
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar_l = ( isset($page_custom['_sidebar_left']) ) ? $page_custom['_sidebar_left'] : '';
	$custom_sidebar_r = ( isset($page_custom['_sidebar_right']) ) ? $page_custom['_sidebar_right'] : '';

	if ( $gen_side_r == 'empty' || $gen_side_r == '' ) $gen_side_r = 2;
	if ( $gen_side_l == 'empty' || $gen_side_l == '' ) $gen_side_l = 3;
	if ( $custom_sidebar_r == 'empty' || !$custom_sidebar_r) $custom_sidebar_r = false;
	if ( $custom_sidebar_l == 'empty' || !$custom_sidebar_l) $custom_sidebar_l = false;
?>

<div id="dsb" class="entry-container">

		<aside id="sidebar-left">
			<?php
				if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar_l ){
					dynamic_sidebar($custom_sidebar_l);
				}elseif( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar($gen_side_l);
				}
			?>
		</aside>

	<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>

		<div id="post-content">
			<?php the_content(); ?>
		</div>

	<?php endwhile; endif;// LOOP END ?>

		<aside id="sidebar-right">
			<?php
				if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar_r ){
					dynamic_sidebar($custom_sidebar_r);
				}elseif( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar($gen_side_r);
				}
			?>
		</aside><!--/ #sidebar-->

	<div class="kids_clear"></div>
</div><!-- .entry-container -->