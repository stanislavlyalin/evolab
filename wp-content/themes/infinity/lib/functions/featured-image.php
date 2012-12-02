<?php
/**
 * Get featured image for the post.
 *
 * @package Infinity
 * @subpackage Functions
 */

/* Adds theme support for WordPress 'featured images'. */
add_theme_support( 'post-thumbnails' );

/** Infinity Get Image Id */
function infinity_get_image_id( $num = 0 ) {
	global $post;

	$image_ids = array_keys(
		get_children(
			array(
				'post_parent' => $post->ID,
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			)
		)
	);

	if ( isset( $image_ids[$num] ) ) {
		return $image_ids[$num];
	}

	return false;
}

/** Infinity Get Image*/
function infinity_get_image( $args = array() ) {
	
	global $post;

	/** Arguments */
	$defaults = array( 'format' => 'html', 'size' => 'full', 'num' => 0, 'attr' => '' );	
	$args = wp_parse_args( $args, $defaults );

	/** WordPress built-in method */
	if ( has_post_thumbnail() && ( $args['num'] === 0 ) ) {
		
		$id = get_post_thumbnail_id();
		$html = wp_get_attachment_image( $id, $args['size'], false, $args['attr'] );
		list( $url ) = wp_get_attachment_image_src( $id, $args['size'], false, $args['attr'] );
	
	}
	
	/** Grab the first attachment image */		
	else {
		
		$id = infinity_get_image_id( $args['num'] );
		$html = wp_get_attachment_image( $id, $args['size'], false, $args['attr'] );
		list( $url ) = wp_get_attachment_image_src( $id, $args['size'], false, $args['attr'] );
	
	}

	/** Source path, relative to the root */
	$src = str_replace( home_url(), '', $url );

	/** Output Logic */
	if ( strtolower( $args['format'] ) == 'html' ) {
		$output = $html;
	} else if ( strtolower( $args['format'] ) == 'url' ) {
		$output = $url;
	} else {
		$output = $src;
	}

	/** return FALSE if $url is blank */
	if ( empty( $url ) ) {
		$output = FALSE;
	}

	/** return output */
	return $output;
}
?>