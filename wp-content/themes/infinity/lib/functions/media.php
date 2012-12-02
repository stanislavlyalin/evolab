<?php
/**
 * Functions file for loading scripts and stylesheets.
 *
 * @package Infinity
 * @subpackage Functions
 */

/** Register Infinity Core scripts. */
add_action( 'wp_enqueue_scripts', 'infinity_register_scripts', 1 );

/** Load Infinity Core scripts. */
add_action( 'wp_enqueue_scripts', 'infinity_enqueue_scripts' );

/** Register JavaScript and Stylesheet files for the framework. */
function infinity_register_scripts() {

	/* Register the 'drop-downs' scripts if the current theme supports 'infinity-core-menus'. */
	if ( current_theme_supports( 'infinity-core-menus' ) ) {
		wp_register_script( 'infinity-js-hoverintent', esc_url( trailingslashit( INFINITY_JS_URI ) . 'hoverintent.min.js' ), array( 'jquery' ), '5', true );
		wp_register_script( 'infinity-js-superfish', esc_url( trailingslashit( INFINITY_JS_URI ) . 'superfish.min.js' ), array( 'jquery' ), '1.4.8', true );
		wp_register_script( 'infinity-js-supersubs', esc_url( trailingslashit( INFINITY_JS_URI ) . 'supersubs.min.js' ), array( 'jquery' ), '0.2', true );
		wp_register_script( 'infinity-js-drop-downs', esc_url( trailingslashit( INFINITY_JS_URI ) . 'drop-downs.js' ), array( 'jquery' ), '1.0', true );
	}
	
	/** Register '960.css' for grid. */
	wp_register_style( 'infinity-css-960', esc_url( trailingslashit( INFINITY_CSS_URI ) . '960.css' ) );
	
	/** Register Google Fonts. */
	wp_register_style( 'infinity-google-fonts', esc_url( 'http://fonts.googleapis.com/css?family=Droid+Sans|Oswald' ) );
}

/** Tells WordPress to load the scripts needed for the framework using the wp_enqueue_script() function. */
function infinity_enqueue_scripts() {

	/** Load the comment reply script on singular posts with open comments if threaded comments are supported. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Load the 'drop-downs' script if the current theme supports 'infinity-drop-downs'. */
	if ( current_theme_supports( 'infinity-core-menus' ) ) {
		wp_enqueue_script( 'infinity-js-hoverintent' );
		wp_enqueue_script( 'infinity-js-superfish' );
		wp_enqueue_script( 'infinity-js-supersubs' );
		wp_enqueue_script( 'infinity-js-drop-downs' );
	}
	
	/** Load '960.css' for grid. */
	wp_enqueue_style( 'infinity-css-960' );
	
	/** Load Google Fonts. */
	wp_enqueue_style( 'infinity-google-fonts' );
}

/** Analytic Code */
add_action( 'wp_footer', 'infinity_analytic_code_init' );
function infinity_analytic_code_init() {
	
	$infinity_options = infinity_get_settings();
	
	if( $infinity_options['infinity_analytic'] == 1 ) :	
	echo htmlspecialchars_decode ( $infinity_options['infinity_analytic_code'] );	
	echo '<!-- end analytic-code -->';	
	endif;

}
?>