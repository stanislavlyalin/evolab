<?php /* The Template for displaying all single posts. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="pjgm-posttitle"><?php the_title(); ?></h1>

					<div class="pjgm-postmeta">
						<?php pujugama_posted_on(); ?>
					</div><!-- .pjgm-postmeta -->

					<div class="pjgm-postcontent">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pjgm-pagelink">' . __( 'Pages:', 'pujugama' ), 'after' => '</div>' ) ); ?>
					</div><!-- .pjgm-postcontent -->

<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="pjgm-postauthor">
						<div id="pjgm-authoravatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pujugama_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #pjgm-authoravatar -->
						<div id="pjgm-authordesc">
							<h2><?php printf( esc_attr__( 'About %s', 'pujugama' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #pjgm-authordesc -->
					</div><!-- #pjgm-postauthor -->
<?php endif; ?>

					<div class="pjgm-postutility">
						<?php pujugama_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'pujugama' ), '<span class="pjgm-editlink">', '</span>' ); ?>
					</div><!-- .pjgm-postutility -->
				</div><!-- #post-## -->

				<div id="pjgm-navbelow" class="pjgm-navigation">
					<div class="pjgm-navpre"><?php previous_post_link( '%link', '<span class="pjgm-metanav">' . _x( '&larr;', 'Previous post link', 'pujugama' ) . '</span> %title' ); ?></div>
					<div class="pjgm-navnex"><?php next_post_link( '%link', '%title <span class="pjgm-metanav">' . _x( '&rarr;', 'Next post link', 'pujugama' ) . '</span>' ); ?></div>
				</div><!-- #pjgm-navbelow -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>