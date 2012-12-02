<?php /* The template for displaying Tag Archive pages. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

				<h1 class="pjgm-pagetitle"><?php
					printf( __( 'Tag Archives: %s', 'pujugama' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

				<?php
					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo '<div class="pjgm-catdesc">' . $tag_description . '</div>';
 					get_template_part( 'loop', 'tag' );
				?>
			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>