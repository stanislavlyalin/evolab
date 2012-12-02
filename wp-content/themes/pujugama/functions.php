<?php

/* Set the content width.*/
if ( ! isset( $content_width ) )
	$content_width = 557;

/** Tell WordPress to run pujugama_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'pujugama_setup' );

if ( ! function_exists( 'pujugama_setup' ) ):
function pujugama_setup() {

	// Add theming for editor in dashboard.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'pujugama', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'pujugama' ),
	) );
}
endif;


/* Dont show home link. Its hard coded and have theming function.  */
function pujugama_page_menu_args( $args ) {
	$args['show_home'] = false;
	return $args;
}
add_filter( 'wp_page_menu_args', 'pujugama_page_menu_args' );

/* Post excerpt length to 40 characters. */
function pujugama_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'pujugama_excerpt_length' );

/* "Continue Reading" link for excerpts */
function pujugama_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="pjgm-metanav">&rarr;</span>', 'pujugama' ) . '</a>';
}

/* Replaces "[...]" */
function pujugama_auto_excerpt_more( $more ) {
	return ' &hellip;' . pujugama_continue_reading_link();
}
add_filter( 'excerpt_more', 'pujugama_auto_excerpt_more' );

/* Adds a pretty "Continue Reading" link to custom post excerpts. */
function pujugama_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= pujugama_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'pujugama_custom_excerpt_more' );

/* Remove inline styles printed when the gallery shortcode is used. */
function pujugama_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'pujugama_remove_gallery_css' );

/* Template for comments and pingbacks. */
if ( ! function_exists( 'pujugama_comment' ) ) :
function pujugama_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="commentholder">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'pujugama' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'pujugama' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'pujugama' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'pujugama' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'pujugama' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'pujugama'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/** Register widgetized areas, just one sidebars. */
function pujugama_widgets_init() {
	// Sidebar 1, located at the top, right of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'pujugama' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'pujugama' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
/** Register sidebars. */
add_action( 'widgets_init', 'pujugama_widgets_init' );

/* Removes the default styles that are packaged with the Recent Comments widget. */
function pujugama_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'pujugama_remove_recent_comments_style' );

/* Prints HTML with meta information for the current post—date/time and author. */
if ( ! function_exists( 'pujugama_posted_on' ) ) :
function pujugama_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'pujugama' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'pujugama' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

/* Prints HTML with meta information for the current post (category, tags and permalink). */
if ( ! function_exists( 'pujugama_posted_in' ) ) :
function pujugama_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'pujugama' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'pujugama' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'pujugama' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;