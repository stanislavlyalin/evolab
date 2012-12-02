<?php /* The template for displaying 404 pages (Not Found). */

get_header(); ?>

	<div id="pjgm-box">
		<div id="pjgm-content">
			<div id="post-0" class="post error404 not-found">
				<h1 class="pjgm-posttitle"><?php _e( 'Not Found', 'pujugama' ); ?></h1>
				<div class="pjgm-postcontent">
					<p><?php _e( 'Sorry, but the page you requested could not be found. Try to search the site using the form below.', 'pujugama' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .pjgm-postcontent -->
			</div><!-- #post-0 -->

		</div><!-- #pjgm-content -->
	</div><!-- #pjgm-box -->
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>