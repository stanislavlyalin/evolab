<?php get_header(); ?>
<div id="container">
<div id="content">
<div id="container_ad">Google</div>
<span class="category_heading">Current archive: <?php the_time('F j, Y') ?></span>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
<div class="category_posts">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="post_dets">
<div class="post_author"><span>Written by:</span><span class="post_details"><?php the_author_posts_link(); ?></span></div><div class="post_time"><span>Written on:</span><span class="post_details"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('F j, Y') ?>
 </a></span></div>

   <?php if (!empty($post->post_password)) { ?><?php }else { ?> <?php if ( comments_open() ) : ?><div class="comments-counter"><?php comments_popup_link('0', '1', '%', '', ''); ?></div><?php ; else : ?><div class="comments-off">Comments <br />are closed</div><?php endif; ?><?php } ?></div>
<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
   if ( has_post_thumbnail() ) {?>
       <?php the_post_thumbnail(); ?><?php } else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="290" height="180" /><?php } ?></a><div class="post_category_text"> <?php the_excerpt(); ?>
<a class="read_more" href="<?php the_permalink() ?>">Read more...</a></div>
<div class="post_category"><span>In category:</span> <?php the_category(', ') ?><?php the_tags('<br /><span>Tags:</span>',' , ','<br />'); ?>    </div>

</div>

	<?php endwhile; ?>
    <?php get_template_part( 'adsbellowpost', 'index' );?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {?><div class="navhold"><?php posts_nav_link(' &#183; ', '<< Newer posts', 'Older posts >>'); ?></div><?php } ?>
	<?php else : ?>
	<div id="notfound_holder"><h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p></div>
<?php endif; ?></div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>