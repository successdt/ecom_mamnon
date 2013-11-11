<?php

	$categories = get_the_category();
		$separator = ', ';
		$output = '';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a class="link" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( multitranslate( "View all posts in", "_tr_view", false), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		}

	$tags = get_the_tags();
		$tag_out = '';
		$tag_separator = ', ';
				if($tags){
					$trance = multitranslate("Tag", "_tr_tag", false);
					foreach ($tags as $tag){
						$tag_link = get_tag_link($tag->term_id);
						$tag_link = esc_url($tag_link);
						
						$tag_out .= "<a href='{$tag_link}' title='{$trance}' class='link'>{$tag->name}</a>" . $tag_separator;
					}
				}
?>

<div class="post-meta">

	<div class="post-date">

		<span class="day"><?php the_time('j'); ?></span>
		<span class="month"><?php the_time('M.Y'); ?></span>

	</div><!--/ post-date-->

	<div class="post-comments"><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?> <?php multitranslate("Comments", "_comments_x_comments"); ?></a></div>

</div><!--/ post-meta-->

<div class="post-entry">

	<div class="post-title">

		<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
		<span class="post-date">
			Đăng lúc: <span class="time"><?php echo get_the_time('d/m/y h:i') ?></span>
			<?php
			$author = get_post_meta( get_the_ID(), 'post_author');
			if(!empty($author)): ?>
			 - Người đăng: <span class="author"><?php echo $author[0] ; ?>	</span>
			<?php endif ?>	
		</span>

	</div><!--/ post-title-->

	<div class="entry">
 		<?php the_content(); ?>
 		<?php wp_link_pages(); ?> 
	</div><!--/ entry--> 

</div><!--/ post-entry -->

<div class="post-footer clearfix">

	<div class="post_cats l-float-left">
		<span><?php multitranslate('Chuyên mục', 'cws_post_under_cat'); ?>:</span>
		<?php echo trim($output, $separator); ?>
	</div><!--/ post-cats -->
<?php if($tag_out) : ?>
	<div class="post_tags l-float-right">
		<p><span><?php multitranslate('Tags', 'cws_post_under_tags'); ?>:</span>
			<?php echo trim($tag_out, $tag_separator); ?>
	</div><!--/ post-tags -->
<?php endif; ?>



</div><!--/ post-footer-->

	<?php
    $GLOBALS[ 'begin_time' ] = date('Y-m-d H:i:s', get_post_time());

    // Create a new filtering function that will add our where clause to the query
    function filter_where( $where = '' ) {
        // posts in the last 1825 days of current post
        $where .=  " AND post_date < '".$GLOBALS[ 'begin_time' ]."'";
        return $where;
    }

    add_filter( 'posts_where', 'filter_where' );

    $args=array(
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'date',
        'order' => 'DESC',
        'showposts' => 20, // Number of related posts that will be shown.
        'ignore_sticky_posts' => 1,
        'cat' => $category->term_id
    );
    $my_query = new WP_Query($args);
    remove_filter( 'posts_where', 'filter_where' );

    if( $my_query->have_posts() ) { ?>
	<div class="older-post">
		<h3>Bài viết cũ hơn</h3>
		<ul class="older-posts">           	 
        <?php while ($my_query->have_posts()) {
            $my_query->the_post();
    		?>
            <li>
				<a href="<?php the_permalink() ?>" title="<?php get_the_title(); ?>">
					<?php the_title();?>
					
				</a>
				(<?php echo get_the_date('d/m/y'); ?>)
			</li>
    	<?php } ?>
	    </ul>
	</div>            	
   <?php } ?>