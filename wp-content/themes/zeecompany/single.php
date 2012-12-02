<?php get_header(); ?>

	<div id="wrap">
		
		<div id="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'loop', 'single' );

		endwhile; ?>

		<?php endif; ?>
			
		<?php comments_template(); ?>
		
		</div>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	