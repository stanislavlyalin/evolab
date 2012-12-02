<?php get_header(); ?>

				<!-- content -->
			<div class="content">

			<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
					<!-- Start: Post -->
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<p class="postmeta"><span class="date"><?php the_time( get_option( 'date_format' ) ) ?></span>, <span class="author"><?php the_author() ?></span></p>		
						<div class="entryContent">
						    <?php the_post_thumbnail(); ?>
							<?php the_excerpt(); ?>
						</div>
						<p class="postmeta"><span class="cats"><?php the_category(', ') ?></span> <span class="tags"><?php the_tags( '', ', ', ''); ?></span>, <span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span> <?php edit_post_link('Edit'); ?> </p>
						<p class="more"><a href="<?php the_permalink() ?>"></a></p>
					</div>
					<!-- End: Post -->
				<?php endwhile; ?>
		
				<div class="navigation">
					<div class="alignright prev"><?php next_posts_link(__('&laquo; Previous posts', 'baza_noclegowa')) ?></div>
					<div class="alignleft next"><?php previous_posts_link(__('Next posts &raquo;', 'baza_noclegowa')) ?></div>
				</div>
		
			<?php else : ?>
		
				<h2><?php _e("Not Found", "baza_noclegowa"); ?></h2>
				<p><?php _e("Sorry, but you are looking for something that isn't here.", "baza_noclegowa") ?></p>
				<?php get_search_form(); ?>
		
			<?php endif; ?>
			</div>
<?php get_sidebar(); ?>		      
<?php get_footer(); ?>
