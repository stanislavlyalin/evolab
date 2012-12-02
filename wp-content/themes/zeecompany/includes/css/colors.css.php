<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			.post-title, .post-title a:link, .post-title a:visited
			{
				color: #'.esc_attr($options['themeZee_colors_font_two']).';
			}
			a, a:link, a:visited, #sidebar a:link, #sidebar a:visited , .post-title a:hover, .post-title a:active, #frontpage_posts h2,
			#comments h3, #respond h3, .comment-reply-link, .wp-pagenavi a, #frontpage_widgets a:link, #frontpage_widgets a:visited {
				color: #'.esc_attr($options['themeZee_colors_font_one']).';
			}
			a:hover, a:active, #sidebar .widgettitle, #sidebar a:hover, #sidebar a:active,
			.current_page_item a, .current-cat a, .current-menu-item a,.bypostauthor .fn,
			#frontpage_widgets .widgettitle, #frontpage_widgets a:hover, #frontpage_widgets a:active {
				color: #'.esc_attr($options['themeZee_colors_font_two']).';
			}
			.wp-pagenavi .current {
				background-color: #'.esc_attr($options['themeZee_colors_font_two']).';
			}
			.widget-tabnav li a {
				background: #'.esc_attr($options['themeZee_colors_font_one']).';
			}
			.widget-tabnavi li a:hover, .widget-tabnavi li a:active {
				background: #'.esc_attr($options['themeZee_colors_font_two']).';
			}
			#frontpage_pager a.activeSlide, #frontpage_slideshow .type-frontpage_slider .more-link {
				background: #'.esc_attr($options['themeZee_colors_font_one']).';
			}
			#frontpage_pager a:hover, #frontpage_slideshow .type-frontpage_slider .more-link:hover {
				background: #'.esc_attr($options['themeZee_colors_font_two']).';
			}
		';
		echo '</style>';
	}
}