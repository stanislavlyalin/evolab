<?php get_header(); ?>

	<!-- Start: Left Panel -->
	<div class="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>

			<div class="entryContent">
				<?php the_content('<p class="serif">'.__("Read the rest of this entry", "baza_noclegowa").' &raquo;</p>'); ?>
                <div class="clear"></div>
				<?php wp_link_pages(array('before' => '<p><strong>'.__("Pages", "baza_noclegowa").':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p class="postmeta"><span class="tags">', ', ', '</span></p>'); ?>
				<p class="postmeta"><span class="cats"><?php the_category(', ') ?></span></p>
				<?php edit_post_link(__("Edit this entry", "baza_noclegowa"), '<p>', '</p>'); ?>
				
			<p><?php posts_nav_link(); ?></p>
		
			<div class="navigation2">
				<div class="alignright prev"><?php previous_post_link('%link'); ?></div>
				<div class="alignleft next"><?php next_post_link('%link'); ?></div>
			</div>		

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

	</div>
<?php get_sidebar(); ?>	
<?php get_footer(); ?>
