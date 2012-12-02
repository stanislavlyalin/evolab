<?php get_header(); ?>

<!-- Start: Left Panel -->
	<div class="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<p><?php printf( __( '<a href="%1$s">%2$s</a>', 'baza_noclegowa' ), get_permalink( $post->post_parent ), get_the_title( $post->post_parent ));?></p>
			<div class="entryContent">
				<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
				<?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
				<?php edit_post_link(__("Edit this entry", "baza_noclegowa"), '<p>', '</p>'); ?>
				<p class="navigation">
					<span class="alignleft"><?php previous_image_link() ?></span>
					<span class="alignright"><?php next_image_link() ?></span>
				</p>
			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

	</div>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>
