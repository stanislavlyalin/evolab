<?php
/**
 * The core functions file for the Infinity framework. Functions defined here are generally
 * used across the entire framework to make various tasks faster. This file should be loaded
 * prior to any other files because its functions are needed to run the framework.
 *
 * @package Infinity
 * @subpackage Functions
 */

/** Function for setting the content width of a theme. */
function infinity_set_content_width( $width = '' ) {
	global $content_width;
	$content_width = absint( $width );
}

/** Function for getting the theme's data */
function infinity_theme_data( $path = 'template' ) {
	global $infinity;
	
	/* If 'template' is requested, get the parent theme data. */
	if ( 'template' == $path ) {

		/* If the parent theme data isn't set, let grab it. */
		if ( empty( $infinity->theme_data ) ) {
			
			$infinity_theme_data = array();
			if( function_exists( 'wp_get_theme' ) ) {
			
				$theme_data = wp_get_theme();
				$infinity_theme_data['Name'] = $theme_data->get( 'Name' );
				$infinity_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );
				$infinity_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );
				$infinity_theme_data['Description'] = $theme_data->get( 'Description' );
				
				$infinity->theme_data = $infinity_theme_data;				
			
			} else {
			
				$theme_data = get_theme_data( trailingslashit( INFINITY_DIR ) . 'style.css' );
				$infinity_theme_data['Name'] = $theme_data['Name'];
				$infinity_theme_data['ThemeURI'] = $theme_data['URI'];
				$infinity_theme_data['AuthorURI'] = $theme_data['AuthorURI'];
				$infinity_theme_data['Description'] = $theme_data['Description'];
				
				$infinity->theme_data = $infinity_theme_data;				
			
			}
		
		}

		/* Return the parent theme data. */
		return $infinity->theme_data;
	}	

	/* Return false for everything else. */
	return false;
}
?>