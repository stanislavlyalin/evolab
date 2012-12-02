<?php get_header(); ?>
<div id="container">
<div id="content">
<div id="container_ad">Google</div>
<?php if (have_posts()) : ?>
	<?php $count = 0; ?>

	<?php while (have_posts()) : the_post(); ?>
		<?php $count++; ?>

	
		<?php if ($count == 1) : ?>
<div id="page_holder">
<h1><?php the_title(); ?></h1>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_content('Read more...'); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

</div>
</div>
<?php comments_template('', true); ?>     
<?php endif; ?>
	<?php endwhile; ?>
	<?php else : ?>
	<div id="notfound_holder"><h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p></div>
<?php endif; ?></div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>