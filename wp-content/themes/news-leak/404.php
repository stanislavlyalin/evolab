<?php
get_header(); ?>

	<div id="container">
		<div id="content">
<?php 
$adcontainertext = get_option('nt_adcontainertext');
if ($adcontainertext) {?> 
<div id="container_ad">Google</div><?php }?>
			<div id="page_holder">
				<h1><?php _e( 'Not Found', 'newsleak' ); ?></h1>
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'newsleak' ); ?></p>
			</div><!-- #post-0 -->

		</div>
	<?php get_sidebar(); ?></div>
<?php get_footer(); ?>