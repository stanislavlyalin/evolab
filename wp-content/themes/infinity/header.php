<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container_main">
  <div id="header">
    
    <div class="container_head_menu_wrap">
      <div class="container_12_head">
      <?php get_template_part( 'primary', 'menu' ); ?>
      <?php get_template_part( 'search', 'form' ); ?>
      <div class="clear"></div>
      </div>
    </div>
    
    <div class="container_12_head">
	<?php get_template_part( 'custom', 'header' ); ?>
    <div class="clear"></div>
    </div>
  
  </div>