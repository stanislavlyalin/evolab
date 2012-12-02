<?php
/**
 * Functions for dealing with theme settings on both the front end of the site and the admin.
 *
 * @package Infinity
 * @subpackage Functions
 */

/** Loads the Infinity theme setting. */
function infinity_get_settings() {
	global $infinity;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $infinity->settings ) ) {
		$infinity->settings = get_option( 'infinity_options' );
	}
	
	/** return settings. */
	return $infinity->settings;
}
?>