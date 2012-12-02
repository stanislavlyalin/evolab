<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( is_front_page()) { ?><title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title><?php }
else { ?><title><?php wp_title(' | ',true,'right'); ?><?php bloginfo('name'); ?></title><?php } ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">
<div id="header">
<div id="header-bar">
<div id="top-nav">
<ul id="pagenav">
<li <?php if(is_front_page()){?> class="current_page_item" <?php } else {}?>><a href="<?php echo home_url(); ?>/">Home</a></li>
<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
</ul>
</div>
<div id="account"><ul>
<?php global $user_ID, $user_identity, $user_level ?>
		<?php if ( $user_ID ) : ?>
		<span>Identified as <strong><?php echo $user_identity ?></strong>.</span>
				<?php if ( $user_level >= 10 ) : ?>
				<li class="line"><a href="<?php echo home_url() ?>/wp-admin/">Dashboard</a></li>
				<li class="line"><a href="<?php echo home_url() ?>/wp-admin/post-new.php">Write an article</a></li>
				<?php endif // $user_level >= 10 ?>

				<li class="line"><a href="<?php echo home_url() ?>/wp-admin/profile.php">Profile</a></li>
				<li><a href="<?php echo home_url() ?>/wp-login.php?action=logout&amp;redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>">Log Out</a></li>
			

		<?php else:?>
	<li class="line"><a href="<?php echo home_url() ?>/wp-register.php">Register</a></li>
<li><a href="<?php echo home_url() ?>/wp-login.php">Login</a></li>	
<?php endif // get_option('users_can_register') ?>
</ul></div></div>

<div id="logo">
    	  <h1><a href="<?php echo home_url(); ?>/"><?php 
$logo = get_option('nt_logo'); if ($logo) {?><img src="<?php echo stripslashes($logo); ?>"><?php } else {?><?php bloginfo('name'); ?><?php } ?></a></h1>
<?php bloginfo('description'); ?>
</div>
<div id="navigation">
<?php wp_nav_menu( array('menu' => 'categorynav' , 'container' => '' , 'container_class' => 'false', 'menu_id' => 'catnav', 'menu_class' => 'dropdown dropdown-horizontal', 'echo' => true )); ?>
<div id="search_wrap">
<?php get_search_form(); ?>

</div></div></div>