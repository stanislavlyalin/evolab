<?php /* The template for displaying Comments. */ ?>

<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'pujugama' ); ?></p>
<?php
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
	<div id="comments">
			<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'pujugama' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="pjgm-navigation">
				<div class="pjgm-navpre"><?php previous_comments_link( __( '<span class="pjgm-metanav">&larr;</span> Older Comments', 'pujugama' ) ); ?></div>
				<div class="pjgm-navnex"><?php next_comments_link( __( 'Newer Comments <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) ); ?></div>
			</div> <!-- .pjgm-navigation -->
<?php endif; ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'pujugama_comment' ) ); ?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="pjgm-navigation">
				<div class="pjgm-navpre"><?php previous_comments_link( __( '<span class="pjgm-metanav">&larr;</span> Older Comments', 'pujugama' ) ); ?></div>
				<div class="pjgm-navnex"><?php next_comments_link( __( 'Newer Comments <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) ); ?></div>
			</div><!-- .pjgm-navigation -->
<?php endif; ?>

	</div><!-- #comments -->

<?php else :
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'pujugama' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>