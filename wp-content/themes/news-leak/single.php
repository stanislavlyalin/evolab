<?php get_header(); ?>
<div id="container">
<div id="content">
<div id="container_ad">Google</div>
<div id="post_holder"><?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
    
<h1><?php the_title(); ?></h1>
<div class="post_author"><?php if(get_the_author_meta('userimg') != ""): ?>
<img src="<?php the_author_meta( 'userimg' ); ?>" width="40" height="40" />
<?php else: ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no_user_img.jpg" alt="<?php the_title(); ?>" width="40" height="40" />
<?php endif; ?><span>Written by:</span><span class="post_details"><?php the_author_posts_link(); ?></span></div>
<div class="post_time"><span>Written on:</span><span class="post_details"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('F j, Y') ?>
 </a></span></div>

<?php if (!empty($post->post_password)) { }else { ?>
<?php if ( comments_open() ) : ?><div id="comments_option">Comments<br  /><a href="<?php the_permalink() ?>/#leave-comment">Add One</a><div class="comments-counter"><?php comments_popup_link('0', '1', '%', '', ''); ?></div></div><?php ; else : ?><div id="comments_option">Comments are closed</div><?php endif; ?>
<?php } ?>
<div class="post"><?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link">' . __( 'Pages:' ), 'after' => '</p>' ) ); ?>

</div>
<div class="post_category"><span>In category:</span> <?php the_category(', ') ?><?php the_tags('<br /><span>Tags:</span>',' , ','<br />'); ?>    </div>

</div>
    <?php get_template_part( 'adsbellowpost', 'index' );?>

<?php comments_template('', true); ?>     
		<div class="next_prev">
      

<?php $prev_post = get_previous_post();
if($prev_post) { ?><p>Previous post: <?php previous_post_link('%link') ?></p><?php }?>
		<?php $next_post = get_next_post();
if($next_post) { ?><p>Next post: <?php  next_post_link('%link') ?></p><?php }?>
 
        </div>
	<?php endwhile; ?>
<?php else : ?>
	<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>  

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>