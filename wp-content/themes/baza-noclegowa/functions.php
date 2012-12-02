<?php
if ( ! isset( $content_width ) )
	$content_width = 700;

    register_sidebar(array(
		'name' => __( 'Sidebar Widget Area', "baza_noclegowa" ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', "baza_noclegowa" ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',        
    ));	

    
register_nav_menus(
	array(
	  'primary' => 'Header Menu',
	  'footer-menu' => 'Footer Menu'
	)
);

//Multi-level pages menu
function baza_noclegowa_page_menu() {
	if (is_page()) { $highlight = "page_item"; } else {$highlight = "menu-item current-menu-item"; }
	echo '<ul class="menu">';
	wp_list_pages('sort_column=menu_order&title_li=&link_before=<span>&link_after=</span>&depth=3');
	echo '</ul>';
}

//Single-level pages menu
function baza_noclegowa_page_menu_flat() {
	if (is_page()) { $highlight = "page_item"; } else {$highlight = "menu-item current-menu-item"; }
	echo '<ul class="menu">';
	wp_list_pages('sort_column=menu_order&title_li=&link_before=&link_after=&depth=1');
	echo '</ul>';
}

add_editor_style();
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

set_post_thumbnail_size( 110, 110, true ); // Default size
remove_action("wp_head", "wp_generator");

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain('baza_noclegowa', get_template_directory() . '/languages');
?>