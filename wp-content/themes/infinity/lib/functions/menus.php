<?php
/**
 * The menus functions deal with registering nav menus within WordPress for the core framework.
 *
 * @package Infinity
 * @subpackage Functions
 */

/** Register nav menus. */
add_action( 'init', 'infinity_register_menus' );

/** Registers the the core menus */
function infinity_register_menus() {

	/** Get theme-supported menus. */
	$menus = get_theme_support( 'infinity-core-menus' );
	
	/** If there is no array of menus IDs, return. */
	if ( !is_array( $menus[0] ) ) {
		return;
	}
	
	/* Register the 'primary' menu. */
	if ( in_array( 'infinity-primary-menu', $menus[0] ) ) {
		register_nav_menu( 'infinity-primary-menu', __( 'Infinity Primary Menu', 'infinity' ) );
	}
	
}
?>