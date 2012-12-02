<?php /* The template for displaying all pages. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="pjgm-posttitle"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="pjgm-posttitle"><?php the_title(); ?></h1>
					<?php } ?>

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

<?php get_sidebar(); ?>
<?php get_footer(); ?>