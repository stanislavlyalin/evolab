<?php
/** Load the Core Files */
require_once( trailingslashit( get_template_directory() ) . 'lib/init.php' );
new Infinity();

/** Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'infinity_theme_setup' );

/** Theme setup function. */
function infinity_theme_setup() {
	
	/** Add theme support for core framework features. */
	add_theme_support( 'infinity-core-menus', array( 'infinity-primary-menu' ) );
	add_theme_support( 'infinity-core-sidebars', array( 'infinity-primary-sidebar' ) );
	add_theme_support( 'infinity-core-featured-image' );
	add_theme_support( 'infinity-core-custom-header' );
	
	/** Add theme support for WordPress features. */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background', array( 'default-color' => 'fafafa' ) );
	
	/** Set content width. */
	infinity_set_content_width( 600 );
	
	/** Add custom image sizes. */
	add_action( 'init', 'infinity_add_image_sizes' );	

}

/** Adds custom image sizes */
function infinity_add_image_sizes() {
	add_image_size( 'featured', 200, 200, true );
}
?>