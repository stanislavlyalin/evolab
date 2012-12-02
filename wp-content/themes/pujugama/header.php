<?php /*** The theme header.*/ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'pujugama' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="pjgm-wrap">
	<div id="pjgm-header">
		<div id="pjgm-menubar">
			<a href="<?php echo home_url( '/' ); ?>" class="pjgm-home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo __( 'Home', 'pujugama' ); ?></a>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			<span class="pjgm-ender"></span>
			<a href="<?php bloginfo('comments_rss2_url'); ?>" class="pjgm-feed"><?php echo __( 'Comments Feed', 'pujugama' ); ?></a>
			<a href="<?php bloginfo('rss2_url'); ?>" class="pjgm-feed"><?php echo __( 'RSS Feed', 'pujugama' ); ?></a>	
		</div><!-- #pjgm-menubar -->					
		
		<div id="pjgm-bigtitle">
			<?php $pjgm_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<<?php echo $pjgm_tag; ?> id="pjgm-title">
				<span>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</<?php echo $pjgm_tag; ?>>
			<div id="pjgm-description"><?php bloginfo( 'description' ); ?></div>
		</div><!-- #pjgm-bigtitle -->			
	</div><!-- #pjgm-header -->

	<div id="pjgm-main">