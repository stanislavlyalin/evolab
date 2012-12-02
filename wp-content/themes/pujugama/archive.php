<?php /*** The template for displaying Archive pages.**/

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

<?php
	if ( have_posts() )
		the_post();
?>

			<h1 class="pjgm-pagetitle">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'pujugama' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'pujugama' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'pujugama' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'pujugama' ); ?>
<?php endif; ?>
			</h1>

<?php
	rewind_posts();
	get_template_part( 'loop', 'archive' );
?>

			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>