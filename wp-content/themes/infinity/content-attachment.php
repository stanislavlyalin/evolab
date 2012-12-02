<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">
    
	<?php if ( 'attachment' == get_post_type() ) : ?>
	<?php echo infinity_post_date() . infinity_post_comments() . infinity_post_author(); ?>
    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> / </span> <span class="entry-meta-featured">%1$s</span>', __( 'Featured', 'infinity' ) ); endif; ?>
    <?php endif; ?>      
    
	<?php echo infinity_post_edit_link(); ?>
    
  </div><!-- .entry-meta -->
  
  <?php infinity_loop_nav_singular(); ?>
  
  <div class="entry-content entry-attachment">
  	<p><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
    <?php the_excerpt(); ?>
	<div class="clear"></div>				
  </div> <!-- end .entry-content -->
  
  <?php echo infinity_link_pages(); ?>

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php infinity_loop_nav_singular_attachment(); ?>

<?php comments_template( '', true ); ?>