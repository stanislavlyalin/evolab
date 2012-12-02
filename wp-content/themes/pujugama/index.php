<?php /* The main template file. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">
			<?php get_template_part( 'loop', 'index' );	?>
			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>