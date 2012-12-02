<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
			</div><!-- #comments -->
<?php
		
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>
	<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?> <a href="#leave-comment"> add one</a></h3>
<ol class="commentlist">
	<?php wp_list_comments(array( 'callback' => 'newsleak_comment')); ?></ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>


<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php _e('Sorry, the comment form is closed at this time.', 'news-leak'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php comment_form(array('title_reply'=>'Leave a Comment')); ?>


</div>
