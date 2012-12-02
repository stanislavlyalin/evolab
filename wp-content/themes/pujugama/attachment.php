<?php /*** The template for displaying attachments. */

get_header(); ?>

		<div id="pjgm-box" class="single-attachment">
			<div id="pjgm-content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php if ( ! empty( $post->post_parent ) ) : ?>
					<p class="pjgm-pagetitle"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( __( 'Return to %s', 'pujugama' ), get_the_title( $post->post_parent ) ) ); ?>">
					<?php
						/* translators: %s - title of parent post */
						printf( __( '<span class="pjgm-metanav">&larr;</span> %s', 'pujugama' ), get_the_title( $post->post_parent ) );
					?></a></p>
				<?php endif; ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="pjgm-posttitle"><?php the_title(); ?></h2>

					<div class="pjgm-postmeta">
						<?php
							printf(__('<span class="%1$s">By</span> %2$s', 'pujugama'),
								'meta-prep meta-prep-author',
								sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', 'pujugama' ), get_the_author() ),
									get_the_author()
								)
							);
						?>
						<span class="meta-sep">|</span>
						<?php
							printf( __('<span class="%1$s">Published</span> %2$s', 'pujugama'),
								'meta-prep meta-prep-entry-date',
								sprintf( '<span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span>',
									esc_attr( get_the_time() ),
									get_the_date()
								)
							);
							if ( wp_attachment_is_image() ) {
								echo ' <span class="meta-sep">|</span> ';
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Full size is %s pixels', 'pujugama'),
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr( __('Link to full-size image', 'pujugama') ),
										$metadata['width'],
										$metadata['height']
									)
								);
							}
						?>
						<?php edit_post_link( __( 'Edit', 'pujugama' ), '<span class="meta-sep">|</span> <span class="pjgm-editlink">', '</span>' ); ?>
					</div><!-- .pjgm-postmeta -->

					<div class="pjgm-postcontent">
						<div class="pjgm-postattachment">
<?php if ( wp_attachment_is_image() ) :
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image attachment, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
						<p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
							$attachment_size = apply_filters( 'pujugama_attachment_size', 900 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
						?></a></p>

						<div id="pjgm-navbelow" class="pjgm-navigation">
							<div class="pjgm-navpre"><?php previous_image_link( false ); ?></div>
							<div class="pjgm-navnex"><?php next_image_link( false ); ?></div>
						</div><!-- #pjgm-navbelow -->
<?php else : ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
<?php endif; ?>
						</div><!-- .pjgm-postattachment -->
						<div class="pjgm-postcaption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>

<?php the_content( __( 'Continue reading <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) ); ?>
<?php wp_link_pages( array( 'before' => '<div class="pjgm-pagelink">' . __( 'Pages:', 'pujugama' ), 'after' => '</div>' ) ); ?>

					</div><!-- .pjgm-postcontent -->

					<div class="pjgm-postutility">
						<?php pujugama_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'pujugama' ), ' <span class="pjgm-editlink">', '</span>' ); ?>
					</div><!-- .pjgm-postutility -->
				</div><!-- #post-## -->

<?php comments_template(); ?>

<?php endwhile; ?>

			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_footer(); ?>