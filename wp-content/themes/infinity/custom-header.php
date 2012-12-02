<div id="headimg" class="grid_12 alpha omega">	

<?php 
if ( get_header_image() ) :
	
	if ( function_exists( 'get_custom_header' ) ) {
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height;
	} else {
		$header_image_width  = HEADER_IMAGE_WIDTH;
		$header_image_height = HEADER_IMAGE_HEIGHT;
	}

?>

<div id="logo-image">
  <a href="<?php echo home_url( '/' ); ?>"><img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
</div><!-- end of #logo -->

<?php else: // header image was removed ?>

<div id="logo-text">
  <span class="site-name"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
  <span class="site-description"><?php bloginfo( 'description' ); ?></span>
</div><!-- end of #logo -->

<?php endif; // header image was removed (again) ?>
</div>