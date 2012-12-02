<?php
/**
 * Theme administration functions.
 *
 * @package Infinity
 * @subpackage Admin
 */

class InfinityAdmin {
		
		/** Constructor Method */
		function __construct() {
	
			/** Load the admin_init functions. */
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			
			/* Hook the settings page function to 'admin_menu'. */
			add_action( 'admin_menu', array( &$this, 'settings_page_init' ) );		
	
		}
		
		/** Initializes any admin-related features needed for the framework. */
		function admin_init() {
			
			/** Registers admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts' ), 1 );
		
			/** Loads admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
			
		}
		
		/** Registers admin JavaScript and Stylesheet files for the framework. */
		function admin_register_scripts() {
			
			/** Register Admin Stylesheet */
			wp_register_style( 'infinity-admin-css-style', esc_url( trailingslashit( INFINITY_ADMIN_URI ) . 'style.css' ) );
			wp_register_style( 'infinity-admin-css-ui-smoothness', esc_url( trailingslashit( INFINITY_JS_URI ) . 'ui/css/smoothness/jquery-ui-1.8.20.custom.css' ) );
			
			/** Register Admin Scripts */
			wp_register_script( 'infinity-admin-js-infinity', esc_url( trailingslashit( INFINITY_ADMIN_URI ) . 'infinity.js' ), array( 'jquery-ui-tabs' ) );
			wp_register_script( 'infinity-admin-js-jquery-cookie', esc_url( trailingslashit( INFINITY_JS_URI ) . 'jquery.cookie.js' ), array( 'jquery' ) );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for the framework. */
		function admin_enqueue_scripts() {			
		}
		
		/** Initializes all the theme settings page functionality. This function is used to create the theme settings page */
		function settings_page_init() {
			
			global $infinity;
			
			/** Register theme settings. */
			register_setting( 'infinity_options_group', 'infinity_options', array( &$this, 'infinity_options_validate' ) );
			
			/* Create the theme settings page. */
			$infinity->settings_page = add_theme_page( 
				esc_html( __( 'Infinity Options', 'infinity' ) ),	/** Settings page name. */
				esc_html( __( 'Infinity Options', 'infinity' ) ),	/** Menu item name. */
				$this->settings_page_capability(),				/** Required capability */
				'infinity-options', 								/** Screen name */
				array( &$this, 'settings_page' )				/** Callback function */
			);
			
			/* Check if the settings page is being shown before running any functions for it. */
			if ( !empty( $infinity->settings_page ) ) {
				
				/** Add contextual help to the theme settings page. */
				add_action( 'load-'. $infinity->settings_page, array( &$this, 'settings_page_contextual_help' ) );
				
				/* Load the JavaScript and stylesheets needed for the theme settings screen. */
				add_action( 'admin_enqueue_scripts', array( &$this, 'settings_page_enqueue_scripts' ) );
				
				/** Configure settings Sections and Fileds. */
				$this->settings_sections();
				
				/** Configure default settings. */
				$this->settings_default();				
				
			}
			
		}
		
		/** Returns the required capability for viewing and saving theme settings. */
		function settings_page_capability() {
			return 'edit_theme_options';
		}
		
		/** Displays the theme settings page. */
		function settings_page() {
			require( trailingslashit( INFINITY_ADMIN_DIR ) . 'page.php' );
		}
		
		/** Text for the contextual help for the theme settings page in the admin. */
		function settings_page_contextual_help() {
			
			/** Get the parent theme data. */
			$theme = infinity_theme_data();
			$AuthorURI = $theme['AuthorURI'];
			$ThemeURI = $theme['ThemeURI'];
		
			/** Get the current screen */
			$screen = get_current_screen();
			
			/** Help Tab */
			$screen->add_help_tab( array(
				
				'id' => 'theme-settings-support',
				'title' => __( 'Theme Support', 'infinity' ),
				'content' => implode( '', file( trailingslashit( INFINITY_ADMIN_DIR ) . 'help/support.html' ) ),				
				
				)
			);
			
			/** Help Sidebar */
			$sidebar = '<p><strong>' . __( 'For more information:', 'infinity' ) . '</strong></p>';
			if ( !empty( $AuthorURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Infinity Project', 'infinity' ) . '</a></p>';
			}
			if ( !empty( $ThemeURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $ThemeURI ) . '" target="_blank">' . __( 'Infinity Official Page', 'infinity' ) . '</a></p>';
			}			
			$screen->set_help_sidebar( $sidebar );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for displaying the theme settings page in the WordPress admin. */
		function settings_page_enqueue_scripts( $hook ) {
			
			/** Load Scripts For Infinity Options Page */
			if( $hook === 'appearance_page_infinity-options' ) {
				
				/** Load Admin Stylesheet */
				wp_enqueue_style( 'infinity-admin-css-style' );
				wp_enqueue_style( 'infinity-admin-css-ui-smoothness' );
				
				/** Load Admin Scripts */
				wp_enqueue_script( 'infinity-admin-js-infinity' );
				wp_enqueue_script( 'infinity-admin-js-jquery-cookie' );
				
			}
				
		}
		
		/** Configure settings Sections and Fileds */		
		function settings_sections() {
		
			/** Blog Section */
			add_settings_section( 'infinity_section_blog', 'Blog Options', array( &$this, 'infinity_section_blog_fn' ), 'infinity_section_blog_page' );			
			
			add_settings_field( 'infinity_field_post_style', __( 'Post Style', 'infinity' ), array( &$this, 'infinity_field_post_style_fn' ), 'infinity_section_blog_page', 'infinity_section_blog' );
			add_settings_field( 'infinity_field_post_nav_style', __( 'Post Navigation Style', 'infinity' ), array( &$this, 'infinity_field_post_nav_style_fn' ), 'infinity_section_blog_page', 'infinity_section_blog' );
			
			/** General Section */
			add_settings_section( 'infinity_section_general', 'General Options', array( &$this, 'infinity_section_general_fn' ), 'infinity_section_general_page' );
			
			add_settings_field( 'infinity_field_analytic', __( 'Use Analytic', 'infinity' ), array( &$this, 'infinity_field_analytic_fn' ), 'infinity_section_general_page', 'infinity_section_general' );
			add_settings_field( 'infinity_field_analytic_code', __( 'Enter Analytic Code', 'infinity' ), array( &$this, 'infinity_field_analytic_code_fn' ), 'infinity_section_general_page', 'infinity_section_general' );
			add_settings_field( 'infinity_field_copyright', __( 'Enter Copyright Text', 'infinity' ), array( &$this, 'infinity_field_copyright_fn' ), 'infinity_section_general_page', 'infinity_section_general' );
			add_settings_field('infinity_field_reset', __( 'Reset Theme Options', 'infinity' ), array( &$this, 'infinity_field_reset_fn' ), 'infinity_section_general_page', 'infinity_section_general' );
		
		}
		
		/** Configure default settings. */		
		function settings_default() {
			global $infinity;
			
			$infinity_reset = false;
			$infinity_options = infinity_get_settings();
			
			/** Infinity Reset Logic */
			if ( !is_array( $infinity_options ) ) {			
				$infinity_reset = true;			
			} 						
			elseif ( $infinity_options['infinity_reset'] == 1 ) {			
				$infinity_reset = true;			
			}			
			
			/** Let Reset Infinity */
			if( $infinity_reset == true ) {
				
				$default = array(
					
					'infinity_post_style' => 'content',
					'infinity_post_nav_style' => 'numeric',
					
					'infinity_analytic' => 0,
					'infinity_analytic_code' => 'Analytic Code',
					
					'infinity_copyright' => '&copy; Copyright '. date( 'Y' ) .' - <a href="'. home_url( '/' ) .'">'. get_bloginfo( 'name' ) .'</a>',
					
					'infinity_reset' => 0,
					
				);
				
				update_option( 'infinity_options' , $default );
			
			}
		
		}
		
		/** Infinity Pre-defined Range */
		
		/* Boolean Yes | No */		
		function infinity_pd_boolean() {			
			return array( 1 => __( 'yes', 'infinity' ), 0 => __( 'no', 'infinity' ) );		
		}
		
		/* Post Style Range */		
		function infinity_pd_post_style() {			
			return array( 'content' => __( 'Content', 'infinity' ), 'excerpt' => __( 'Excerpt (Magazine Style)', 'infinity' ) );			
		}
		
		/* Post Navigation Style Range */		
		function infinity_pd_post_nav_style() {			
			return array( 'numeric' => __( 'Numeric', 'infinity' ), 'older-newer' => __( 'Older / Newer', 'infinity' ) );			
		}
		
		/** Infinity Options Validation */				
		function infinity_options_validate( $input ) {
			
			/* Validation: infinity_post_style */
			$infinity_pd_post_style = $this->infinity_pd_post_style();
			if ( ! array_key_exists( $input['infinity_post_style'], $infinity_pd_post_style ) ) {
				 $input['infinity_post_style'] = 'excerpt';
			}
			
			/* Validation: infinity_post_nav_style */
			$infinity_pd_post_nav_style = $this->infinity_pd_post_nav_style();
			if ( ! array_key_exists( $input['infinity_post_nav_style'], $infinity_pd_post_nav_style ) ) {
				 $input['infinity_post_nav_style'] = 'numeric';
			}								
			
			/* Validation: infinity_analytic */
			$infinity_pd_boolean = $this->infinity_pd_boolean();
			if ( ! array_key_exists( $input['infinity_analytic'], $infinity_pd_boolean ) ) {
				 $input['infinity_analytic'] = 0;
			}
			
			/* Validation: infinity_analytic_code */
			if( !empty( $input['infinity_analytic_code'] ) ) {
				$input['infinity_analytic_code'] = htmlspecialchars ( $input['infinity_analytic_code'] );
			}
			
			/* Validation: infinity_copyright */
			if( !empty( $input['infinity_copyright'] ) ) {
				$input['infinity_copyright'] = esc_html ( $input['infinity_copyright'] );
			}
			
			/* Validation: infinity_reset */
			$infinity_pd_boolean = $this->infinity_pd_boolean();
			//if ( ! array_key_exists( infinity_undefined_index_fix ( $input['infinity_reset'] ), $infinity_pd_boolean ) ) {
			if ( ! array_key_exists( $input['infinity_reset'], $infinity_pd_boolean ) ) {
				 $input['infinity_reset'] = 0;
			}
			
			add_settings_error( 'infinity_options', 'infinity_options', __( 'Settings Saved.', 'infinity' ), 'updated' );
			
			return $input;
		
		}
		
		/** Blog Section Callback */				
		function infinity_section_blog_fn() {
			_e( 'Infinity Blog Options', 'infinity' );
		}
		
		/* Post Style Callback */		
		function infinity_field_post_style_fn() {
			
			$infinity_options = get_option('infinity_options');
			$items = $this->infinity_pd_post_style();			
			
			foreach( $items as $key => $val ) {
			?>
            <label><input type="radio" id="infinity_post_style[]" name="infinity_options[infinity_post_style]" value="<?php echo $key; ?>" <?php checked( $key, $infinity_options['infinity_post_style'] ); ?> /> <?php echo $val; ?></label><br />
            <?php
			}		
		
		}
		
		/* Post Style Navigaiton Callback */		
		function infinity_field_post_nav_style_fn() {
			
			$infinity_options = get_option('infinity_options');
			$items = $this->infinity_pd_post_nav_style();			
			
			foreach( $items as $key => $val ) {
			?>
            <label><input type="radio" id="infinity_post_nav_style[]" name="infinity_options[infinity_post_nav_style]" value="<?php echo $key; ?>" <?php checked( $key, $infinity_options['infinity_post_nav_style'] ); ?> /> <?php echo $val; ?></label><br />
            <?php
			}
		
		}
		
		/** General Section Callback */				
		function infinity_section_general_fn() {
			_e( 'Infinity General Options', 'infinity' );
		}
		
		/* Analytic Callback */		
		function  infinity_field_analytic_fn() {
			
			$infinity_options = get_option( 'infinity_options' );
			$items = $this->infinity_pd_boolean();
			
			echo '<select id="infinity_analytic" name="infinity_options[infinity_analytic]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $infinity_options['infinity_analytic'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select yes to add your Analytic code.', 'infinity' ) .'</small></div>';
		
		}
		
		function infinity_field_analytic_code_fn() {
			
			$infinity_options = get_option('infinity_options');
			echo '<textarea type="textarea" id="infinity_analytic_code" name="infinity_options[infinity_analytic_code]" rows="7" cols="50">'. htmlspecialchars_decode ( $infinity_options['infinity_analytic_code'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter the Analytic code.', 'infinity' ) .'</small></div>';
		
		}
		
		/* Copyright Text Callback */		
		function infinity_field_copyright_fn() {
			
			$infinity_options = get_option('infinity_options');
			echo '<textarea type="textarea" id="infinity_copyright" name="infinity_options[infinity_copyright]" rows="7" cols="50">'. esc_html ( $infinity_options['infinity_copyright'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter Copyright Text.', 'infinity' ) .'</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. home_url( '/' ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}		
		
		/* Theme Reset Callback */		
		function infinity_field_reset_fn() {
			
			$infinity_options = get_option('infinity_options');			
			$items = $this->infinity_pd_boolean();			
			echo '<label><input type="checkbox" id="infinity_reset" name="infinity_options[infinity_reset]" value="1" /> '. __( 'Reset Theme Options.', 'infinity' ) .'</label>';
		
		}
}

/** Initiate Admin */
new InfinityAdmin();
?>