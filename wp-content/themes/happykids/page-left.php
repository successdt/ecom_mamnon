<?php
	$gen_sets = theme_get_option('general', 'gen_sets');
	$gen_side = ( isset($gen_sets['_sidebar_main']) ) ? $gen_sets['_sidebar_main'] : '';

	$page_custom = theme_get_post_custom();
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar = ( isset($page_custom['_sidebar_name']) ) ? $page_custom['_sidebar_name'] : '';

	if ($gen_side == 'empty' || !$gen_side) $gen_side = 2;
	if ($custom_sidebar == 'empty' || !$custom_sidebar) $custom_sidebar = false;
?>

<div id="sbl" class="entry-container">

	<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>

		<div id="post-content">
			<?php the_content(); ?>
		</div>

	<?php endwhile; endif;// LOOP END ?>

		<aside id="sidebar">
			<?php
				if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar ){
					dynamic_sidebar($custom_sidebar);
				}elseif( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar($gen_side);
				}
			?>
		</aside><!--/ #sidebar-->

	<div class="kids_clear"></div>                                
</div><!-- .entry-container -->