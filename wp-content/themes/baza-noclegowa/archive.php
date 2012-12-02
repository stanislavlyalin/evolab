<?php get_header(); ?>
	<!-- Start: Left Panel -->
	<div class="content">

	  <?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pageTitle"><?php single_cat_title(); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pageTitle"><?php single_tag_title(); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pageTitle"><?php echo get_the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pageTitle"><?php echo get_the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pageTitle"><?php echo get_the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pageTitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pageTitle">Blog Archives</h2>
 	  <?php } ?>


		<!--div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'baza_noclegowa')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'baza_noclegowa')) ?></div>
		</div-->

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'baza_noclegowa'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entryContent">
						    <?php the_post_thumbnail(); ?>
							<?php the_excerpt(); ?>
						</div>
						<p class="postmeta"><span class="cats"><?php the_category(', ') ?></span> <span class="tags"><?php the_tags( '', ', ', ''); ?></span>, <span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span> <?php edit_post_link('Edit'); ?> </p>
						<p class="more"><a href="<?php the_permalink() ?>"></a></p>
			</div>

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