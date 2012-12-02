<?php get_header(); ?>

	<div class="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
			<div class="entryContent">
				<?php the_content(); ?>	
				<div class="clear"></div>			
				<?php edit_post_link(__("Edit this entry", "baza_noclegowa"), '<p>', '</p>'); ?>
			</div>
		</div>
		
		<?php comments_template(); ?>
		
		<?php endwhile; endif; ?>
	
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>