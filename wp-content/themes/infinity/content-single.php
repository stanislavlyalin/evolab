<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">
    
	<?php if ( 'post' == get_post_type() ) : ?>
	<?php echo infinity_post_date() . infinity_post_comments() . infinity_post_author(); ?>
    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> / </span> <span class="entry-meta-featured">%1$s</span>', __( 'Featured', 'infinity' ) ); endif; ?>
    <?php endif; ?>      
    
	<?php echo infinity_post_edit_link(); ?>
  
  </div><!-- .entry-meta -->
  
  <div class="entry-content">
  	<?php the_content(); ?>
	<div class="clear"></div>				
  </div> <!-- end .entry-content -->
  
  <?php echo infinity_link_pages(); ?>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <div class="entry-meta-bottom">
  <?php echo infinity_post_category() . infinity_post_tags(); ?>
  </div><!-- .entry-meta -->
  <?php endif; ?>     

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php infinity_author(); ?> 

<?php comments_template( '', true ); ?>