<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<title><?php bloginfo('name'); if(is_home() || is_front_page()) { echo ' - '; bloginfo('description'); } else { wp_title(); } ?></title>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
<div id="wrapper">
	<div id="header">
	
		<div id="topnavi">
			<?php 
			// Get Top Navigation out of Theme Options
				wp_nav_menu(array('theme_location' => 'top_navi', 'container' => false, 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
			?>
			<div class="clear"></div>
		</div>

		<div id="logo">
				<?php 
				$options = get_option('themezee_options');
				if ( isset($options['themeZee_general_logo']) and $options['themeZee_general_logo'] <> "" ) { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($options['themeZee_general_logo']); ?>" alt="Logo" /></a>
				<?php } else { ?>
					<a href="<?php echo home_url(); ?>/"><h1><?php bloginfo('name'); ?></h1></a>
				<?php } ?>
		</div>
		<div class="clear"></div>
		
		<div id="navi">
			<?php 
			// Get Navigation out of Theme Options
				wp_nav_menu(array('theme_location' => 'main_navi', 'container' => false, 'menu_id' => 'nav', 'echo' => true, 'fallback_cb' => 'themezee_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
			?>
			<div class="clear"></div>
		</div>
		
	<?php if( get_header_image() != '' and !is_page_template('template-frontpage.php') ) : ?>
		<div id="custom_header">
			<img src="<?php echo get_header_image(); ?>" />
		</div>
	<?php endif; ?>

	</div>