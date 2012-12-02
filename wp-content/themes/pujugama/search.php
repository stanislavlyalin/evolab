<?php /* The template for displaying Search Results pages. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

<?php if ( have_posts() ) : ?>
				<h1 class="pjgm-pagetitle"><?php printf( __( 'Search Results for: %s', 'pujugama' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="pjgm-posttitle"><?php _e( 'Nothing Found', 'pujugama' ); ?></h2>
					<div class="pjgm-postcontent">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'pujugama' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .pjgm-postcontent -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
