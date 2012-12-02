<?php get_header(); ?>
<div id="container">
<div id="content">
<?php 
$adcontainertext = get_option('nt_adcontainertext');
if ($adcontainertext) {?> 
<div id="container_ad">Google</div><?php }?>
<?php if (have_posts()) : ?>
	<?php $count = 0; ?>

	<?php while (have_posts()) : the_post(); ?>
		<?php $count++; ?>

	
		<?php if ($count == 1) : ?>
<div id="post_holder">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="post_dets">
<div class="post_author"><?php if(get_the_author_meta('userimg') != ""): ?>
<img src="<?php the_author_meta( 'userimg' ); ?>" width="40" height="40" />
<?php else: ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no_user_img.jpg" alt="<?php the_title(); ?>" width="40" height="40" />
<?php endif; ?>
<span>Written by:</span><span class="post_details"><?php the_author_posts_link(); ?></span></div>
<div class="post_time"><span>Written on:</span><span class="post_details"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('F j, Y') ?>
 </a></span></div>

<?php if (!empty($post->post_password)) {?><?php }else { ?><?php if ( comments_open() ) : ?><div id="comments_option">Comments<br  /><a href="<?php the_permalink() ?>/#leave-comment">Add One</a><div class="comments-counter"><?php comments_popup_link('0', '1', '%', '', ''); ?></div></div><?php ; else : ?><div id="comments_option">Comments are closed</div><?php endif; ?><?php } ?></div>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_content('Read more...'); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link">' . __( 'Pages:' ), 'after' => '</p>' ) ); ?>

<div class="post_category"><span>In category:</span> <?php the_category(', ' ) ?><?php the_tags('<br /><span>Tags:</span>',' , ','<br />'); ?>    </div>

</div>

</div>
    <?php get_template_part( 'adsbellowpost', 'index' );?>
<?php else : ?>
<div class="posts_bellow">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="post_dets">
<div class="post_author"><span>Written by:</span><span class="post_details"><?php the_author_posts_link(); ?></span></div><div class="post_time"><span>Written on:</span><span class="post_details"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('F j, Y') ?>
 </a></span></div>

<?php if (!empty($post->post_password)) { ?><?php }else { ?>
<?php if ( comments_open() ) : ?><div class="comments-counter"><?php comments_popup_link('0', '1', '%', '', ''); ?></div><?php ; else : ?><div class="comments-off">Comments <br />are closed</div><?php endif; ?>
<?php } ?>
</div>
<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
   if ( has_post_thumbnail() ) {?>
       <?php the_post_thumbnail(); ?><?php } else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="290" height="180" /><?php } ?></a><div class="post_bellow_text"><?php the_excerpt(); ?>
<a class="read_more" href="<?php the_permalink() ?>">Read more...</a>

</div>
<div class="post_category"><span>In category:</span> <?php the_category(', ') ?><?php the_tags('<br /><span>Tags:</span>',' , ','<br />'); ?>    </div>
</div>
<?php endif; ?>
	<?php endwhile; ?>



<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {?><div class="navhold"><?php posts_nav_link(' &#183; ', '<< Newer posts', 'Older posts >>'); ?></div>
<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
<?php } ?> 
	<?php else : ?>
	<div id="notfound_holder"><h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p></div>
<?php endif; ?>

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>