<?php /* The template for displaying Author Archive pages. */

get_header(); ?>

		<div id="pjgm-box">
			<div id="pjgm-content">

<?php
	if ( have_posts() )
		the_post();
?>

	<h1 class="pjgm-pagetitle author"><?php printf( __( 'Author Archives: %s', 'pujugama' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>

<?php
// Author information as filled in user details.
if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="pjgm-postauthor">
						<div id="pjgm-authoravatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pujugama_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #pjgm-authoravatar -->
						<div id="pjgm-authordesc">
							<h2><?php printf( __( 'About %s', 'pujugama' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div><!-- #pjgm-authordesc	-->
					</div><!-- #pjgm-postauthor -->
<?php endif; ?>

<?php
	rewind_posts();
	 get_template_part( 'loop', 'author' );
?>
			</div><!-- #pjgm-content -->
		</div><!-- #pjgm-box -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>