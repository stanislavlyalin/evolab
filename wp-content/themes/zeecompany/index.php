<?php get_header(); ?>

	<div id="wrap">
		
		<div id="content">
		
		<?php 
		$options = get_option('themezee_options');
		if(is_home() and isset($options['themeZee_show_slider']) and $options['themeZee_show_slider'] == 'true') {
				locate_template('/slide.php', true);
			}
		?>
		 
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'loop', 'index' );
		
		endwhile; ?>
			
			
			
			<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
				<div class="more_posts">
					<?php wp_pagenavi(); ?>
				</div>
			<?php } else { // Otherwise, use traditional Navigation ?>
				<div class="more_posts">
					<span class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'themezee_lang')) ?></span>
					<span class="alignright"><?php previous_posts_link (__('Recent Entries &raquo;', 'themezee_lang')) ?></span>
				</div>
				<div class="clear"></div>
			<?php }?>

		<?php endif; ?>
			
		</div>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	