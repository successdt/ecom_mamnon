<div id="respond_block">

	<!-- post comments -->
	<div class="comment-list" id="comments">

		<?php 
			$noCom = multitranslate("No Comments", "_comments_no_comments", false);
			$oneCom = multitranslate("One Comment", "_comments_one_comment", false);
			$xCom = multitranslate("Comments", "_comments_x_comments", false);
			comments_popup_link(
				'<h1>' . $noCom . '</h1>',
				'<h1>' . $oneCom . '</h1>',
				'<h1>% ' . $xCom . '</h1>',
				'comments_q'
			);

		// echo get_comments_number();

		?>

		<?php if ( post_password_required() ) : ?>
			<p class="nopassword"><?php multitranslate( 'This post is password protected. Enter the password to view any comments.', '_comments_password' ); ?></p>
		<?php
				/* Stop the rest of comments.php from being processed,
				 * but don't kill the script entirely -- we still have
				 * to fully load the template.
				 */
				return;
			endif;
		?>

		<?php
			// You can start editing here -- including this comment!
		?>

		<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav">&larr;</span>' . multitranslate('Older Comments', '_comments_older' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( multitranslate('Newer Comments', '_comments_newer') . '<span class="meta-nav">&rarr;</span>', '_cws_' ); ?></div>
					</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>
				
				<!-- post comments -->
				<ol>
					<?php					
						wp_list_comments('callback=cws_comments');
					?>
				</ol>
				<!--/ post comments -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav">&larr;</span>' . multitranslate('Older Comments', '_comments_older' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( multitranslate('Newer Comments', '_comments_newer') . '<span class="meta-nav">&rarr;</span>', '_cws_' ); ?></div>
					</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>

		<?php else : // or, if we don't have comments:

			/* If there are no comments and comments are closed,
			 * let's leave a little note, shall we?
			 */
			if ( ! comments_open() ) :
		?>
			<p class="nocomments"><?php multitranslate( 'Comments are closed.' , '_comments_closed'); ?></p>
		<?php endif; // end ! comments_open() ?>

		<?php endif; // end have_comments() ?>
		<!-- </div> -->

		<!-- add comment -->
		<div class="add-comment" id="addcomments">

			<h1><?php multitranslate('Leave a comment', '_comments_reply')?></h1>

			<div class="comment-form">

				<?php

					$fields =  array(
						'author' => '<div class="row"><label>' . multitranslate('Name (required)', '_comments_form_name', false) . '</label><input type="text" id="author" name="author" class="inputtext" /></div>',
						
						'email' => '<div class="row"><label>' . multitranslate('Email Address (required)', '_comments_form_email', false) . '</label><input type="text" name="email" id="email" class="inputtext" /></div>',
						'url' => '<div class="row"><label>' . multitranslate('Website URL', '_comments_form_web', false) . '</label><input type="text" name="url" id="url" class="inputtext" /></div>',
					);  

					comment_form( array(
						'comment_field' => '<div class="row"><textarea cols="30" rows="10" name="comment" id="comment" class="textarea"></textarea></div>',
						'id_submit' => 'post_comment',
						'label_submit' => multitranslate( 'submit comment' , '_comments_submit', false ),
						'title_reply' => '',
						'comment_notes_before' => '' ,
						'comment_notes_after' => '' ,
						'fields'=> $fields
					));

				?>

			</div><!--/ comment-form -->
		</div><!--/add comment -->
</div><!--/ respond -->