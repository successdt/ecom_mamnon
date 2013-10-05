<?php

	function cws_comments ($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>

			<li class="comment" id="div-comment-<?php comment_ID() ?>">
				<div class="comment-body">
					<?php echo get_avatar( $comment, '47' ); ?>
					<div class="comment-text">
						<div class="comment-author"><?php printf(__('%s' , 'cws_kids'), get_comment_author_link()) ?></div>
						<div class="comment-entry"><?php echo strip_tags(get_comment_text()); ?></div>
						<div class="comment-meta">

						<?php
							comment_reply_link(array_merge( $args, array(
								'depth' => $depth,
								'reply_text' => '<span class="color_accent">'. multitranslate("Reply", "_comments_reply", false) .'</span>',
								'max_depth' => $args['max_depth']
							))); 
						?>
						<?php edit_comment_link( __( '<span class="comment_edit_span">'. multitranslate("Edit", "_comments_edit", false).'</span>' , 'cws_kids' ) ); ?>

						<?php printf(__('%1$s at %2$s' , 'cws_kids'), get_comment_date(),  get_comment_time()) ?>
						</div><!--/ comment-meta -->
					</div><!--/ comment-text -->
					<div class="kids_clear"></div>
				</div>
<?php
	}
?>