<?php /* Template Name: One column, no sidebar */

get_header(); ?>

		<div id="pjgm-box" class="one-column">
			<div id="pjgm-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="pjgm-posttitle"><?php the_title(); ?></h1>
					<div class="pjgm-postcontent">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pjgm-pagelink">' . __( 'Pages:', 'pujugama' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'pujugama' ), '<span class="pjgm-editlink">', '</span>' ); ?>
					</div><!-- .pjgm-postcontent -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_footer(); ?>