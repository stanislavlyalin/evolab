<?php get_header(); ?>

	<div class="content">

	<?php if (have_posts()) : ?>

		<h2 class="pageTitle"><?php _e("Search Results", "baza_noclegowa"); ?></h2>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'baza_noclegowa'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entryContent">
						    <?php the_post_thumbnail(); ?>
							<?php the_excerpt(); ?>
						</div>
						<p class="postmeta"><span class="cats"><?php the_category(', ') ?></span> <span class="tags"><?php the_tags( '', ', ', ''); ?></span>, <span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span> <?php edit_post_link(__('Edit', 'baza_noclegowa')); ?> </p>
						<p class="more"><a href="<?php the_permalink() ?>"></a></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignright prev"><?php next_posts_link(__('&laquo; Previous posts', 'baza_noclegowa')) ?></div>
			<div class="alignleft next"><?php previous_posts_link(__('Next posts &raquo;', 'baza_noclegowa')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="pageTitle"><?php _e("No posts found. Try a different search?", "baza_noclegowa"); ?></h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
<?php get_sidebar(); ?>	
<?php get_footer(); ?>