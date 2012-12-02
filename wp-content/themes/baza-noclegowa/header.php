<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'baza_noclegowa'), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>	
<!--[if IE 6]><script src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG.js"></script><![endif]-->
</head>
<body <?php body_class(); ?>>
	<div class="all-page">
		
		<div class="container">
			
			<!-- HEADER -->
			<div id="header">
			    <div class="website-name"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></div>
				<div class="slogan"><?php bloginfo('description'); ?></div>
			</div>
			<div class="clear"></div>
			<!-- /HEADER -->

			<!-- main NAVIGATION -->
			<div id="mainNav">
				<div class="wrap">
    <?php wp_nav_menu( array('fallback_cb' => 'baza_noclegowa_page_menu', 'container'=>false, 'menu'  => 'primary', 'depth' => 3, 'theme_location' => 'primary', 'link_before' => '<span>', 'link_after' => '</span>') ); ?>
    <div class="clear"><!-- --></div>
				</div>
			</div>
			<!-- /main NAVIGATION -->
			<div class="clear"></div>


			<!-- CONTENT -->
			<div id="content">