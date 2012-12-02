<?php /* The template for displaying Category Archive pages. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

				<h1 class="pjgm-pagetitle"><?php
					printf( __( 'Category Archives: %s', 'pujugama' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="pjgm-catdesc">' . $category_description . '</div>';
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>