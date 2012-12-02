<?php

// Set Content Width
if ( ! isset( $content_width ) )
	$content_width = 540;

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'themezee_enqueue_scripts');

if ( ! function_exists( 'themezee_enqueue_scripts' ) ):
function themezee_enqueue_scripts() { 
	
	// Register and Enqueue Stylesheet
	wp_register_style('zee_stylesheet', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('zee_stylesheet');
	
	// Enqueue jQuery Framework
	wp_enqueue_script('jquery');
	
	// Register and enqueue the Malsup Cycle Plugin
	wp_register_script('zee_jquery-cycle', get_template_directory_uri() .'/includes/js/jquery.cycle.all.min.js', array('jquery'));
	wp_enqueue_script('zee_jquery-cycle');
}
endif;


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'themezee_setup' );

if ( ! function_exists( 'themezee_setup' ) ):
function themezee_setup() { 
	
	// init Localization
	load_theme_textdomain('themezee_lang', get_template_directory() . '/includes/lang' );
	
	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_editor_style();
	
	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'eee'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'default-image' => get_template_directory_uri() . '/images/default_header.jpg',
		'header-text' => false,
		'width'	=> 920,
		'height' => 150,
		'flex-height' => true,
		'wp-head-callback' => 'themezee_header_style'));
		
	// Register Navigation Menus
	register_nav_menu( 'top_navi', 'Top Navigation' );
	register_nav_menu( 'main_navi', 'Main Navigation' );
}
endif;

// Defines extra CSS for Custom Header
function themezee_header_style() {
    ?><style type="text/css">
        #custom_header img {
			margin-top: 2px;
        }
    </style><?php
}


// Register Sidebars
add_action( 'widgets_init', 'themezee_register_sidebars' );

if ( ! function_exists( 'themezee_register_sidebars' ) ):
function themezee_register_sidebars() { 
	
	// Register Sidebars
	register_sidebar(array('name' => 'Sidebar Blog','id' => 'sidebar-blog'));
	register_sidebar(array('name' => 'Sidebar Pages','id' => 'sidebar-pages'));
}
endif;


/*==================================== INCLUDE FILES ====================================*/

// Includes all files needed for theme options, custom JS/CSS and Widgets
add_action( 'after_setup_theme', 'themezee_include_files' );

if ( ! function_exists( 'themezee_include_files' ) ):
function themezee_include_files() { 

	// include Admin Files
	locate_template('/includes/admin/theme-functions.php', true);
	locate_template('/includes/admin/theme-admin.php', true);

	// include custom Javascript and custom CSS Handler files
	locate_template('/includes/js/jscript.php', true);
	locate_template('/includes/css/csshandler.php', true);

	// include Widget Files
	locate_template('/includes/widgets/theme-widget-ads.php', true);
	locate_template('/includes/widgets/theme-widget-socialmedia.php', true);
}
endif;


/*==================================== THEME FUNCTIONS ====================================*/

// Add Default Menu Fallback Function
function themezee_default_menu() {
	echo '<ul id="nav" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Display Credit Link Function
function themezee_credit_link() { ?>
	<a href="http://themezee.com/"><?php _e('Wordpress Theme by ThemeZee', 'themezee_lang'); ?></a>
<?php
}


// Change Excerpt More
add_filter('excerpt_more', 'themezee_excerpt_more');
function themezee_excerpt_more($more) {
    return '';
}


// Add Postmeta Data
add_action( 'themezee_display_postmeta_index', 'themezee_postmeta_content' ); 
add_action( 'themezee_display_postmeta_single', 'themezee_postmeta_content' ); 

function themezee_postmeta_content() {
	echo '<span class="author">'; the_author_posts_link(); echo ' | </span>';
	echo '<span class="date"><a href="'. get_permalink() . '">' . get_the_time(get_option('date_format')) . '</a> | </span>';
	echo '<span class="comment">'; 
	comments_popup_link( __('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang') );
	echo '</span>';
	edit_post_link(__( 'Edit', 'themezee_lang' ), ' | ');
}


// Add Postinfo Data
add_action( 'themezee_display_postinfo_index', 'themezee_postinfo_content' ); 
add_action( 'themezee_display_postinfo_single', 'themezee_postinfo_content' );

function themezee_postinfo_content() { ?>
	<span class="folder"><?php _e('Category', 'themezee_lang'); ?>: <?php the_category(', ') ?></span>
	<span class="tag"><?php if (get_the_tags()) the_tags(__(' | Tags: ', 'themezee_lang'), ', '); ?></span>
<?php
}

?>