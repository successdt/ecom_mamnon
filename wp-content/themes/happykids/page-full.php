<div class="entry-container cws_full_page_for_minigallery">

	<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; endif; // LOOP END ?>

	<div class="kids_clear"></div>                                
</div><!-- .entry-container -->