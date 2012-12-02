<?php /* The loop that displays posts. */ ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="pjgm-posttitle"><?php _e( 'Not Found', 'pujugama' ); ?></h1>
		<div class="pjgm-postcontent">
			<p><?php _e( 'Sorry, but the page you requested could not be found. Try to search the site using the form below.', 'pujugama' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .pjgm-postcontent -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php /* Start the Loop. */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'pujugama') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="pjgm-posttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'pujugama' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="pjgm-postmeta">
				<?php pujugama_posted_on(); ?>
			</div><!-- .pjgm-postmeta -->

			<div class="pjgm-postcontent">
			<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
			<?php else : ?>			
				<?php 
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'pujugama' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'pujugama' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								$total_images
							); ?></em></p>
					<?php endif; ?>
						<?php the_excerpt(); ?>
			<?php endif; ?>
			</div><!-- .pjgm-postcontent -->

			<div class="pjgm-postutility">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'pujugama'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'pujugama' ); ?>"><?php _e( 'More Galleries', 'pujugama' ); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pujugama' ), __( '1 Comment', 'pujugama' ), __( '% Comments', 'pujugama' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'pujugama' ), '<span class="meta-sep">|</span> <span class="pjgm-editlink">', '</span>' ); ?>
			</div><!-- .pjgm-postutility -->
		</div><!-- #post-## -->

		<?php /* How to display posts in the asides category */ ?>

		<?php elseif ( in_category( _x('asides', 'asides category slug', 'pujugama') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="pjgm-postcontent">
				<?php the_content( __( 'Continue reading <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) ); ?>
			</div><!-- .pjgm-postcontent -->
		<?php endif; ?>

			<div class="pjgm-postutility">
				<?php pujugama_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pujugama' ), __( '1 Comment', 'pujugama' ), __( '% Comments', 'pujugama' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'pujugama' ), '<span class="meta-sep">|</span> <span class="pjgm-editlink">', '</span>' ); ?>
			</div><!-- .pjgm-postutility -->
		</div><!-- #post-## -->

		<?php /* How to display all other posts. */ ?>

		<?php else : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="pjgm-posttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'pujugama' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="pjgm-postmeta">
				<?php pujugama_posted_on(); ?>
			</div><!-- .pjgm-postmeta -->

		<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="pjgm-postcontent">
				<?php the_content( __( 'Continue reading <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="pjgm-pagelink">' . __( 'Pages:', 'pujugama' ), 'after' => '</div>' ) ); ?>
			</div><!-- .pjgm-postcontent -->
		<?php endif; ?>

			<div class="pjgm-postutility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'pujugama' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'pujugama' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pujugama' ), __( '1 Comment', 'pujugama' ), __( '% Comments', 'pujugama' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'pujugama' ), '<span class="meta-sep">|</span> <span class="pjgm-editlink">', '</span>' ); ?>
			</div><!-- .pjgm-postutility -->
		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

		<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="pjgm-navbelow" class="pjgm-navigation">
					<div class="pjgm-navpre"><?php next_posts_link( __( '<span class="pjgm-metanav">&larr;</span> Older posts', 'pujugama' ) ); ?></div>
					<div class="pjgm-navnex"><?php previous_posts_link( __( 'Newer posts <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) ); ?></div>
				</div><!-- #pjgm-navbelow -->
<?php endif; ?>