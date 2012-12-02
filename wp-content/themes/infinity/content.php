<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php $entry_title = ( 'page' == get_post_type() && infinity_post_edit_link() == "" )? 'entry-title entry-title-page' : 'entry-title'; ?>
  <h1 class="<?php echo $entry_title; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  
  <div class="entry-meta">    
	<?php echo infinity_post_date() . infinity_post_comments() . infinity_post_author(); ?>
    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> / </span> <span class="entry-meta-featured">%1$s</span>', __( 'Featured', 'infinity' ) ); endif; ?>    
	<?php echo infinity_post_edit_link(); ?>  
  </div><!-- .entry-meta -->
  
  <?php elseif ( 'page' == get_post_type() && infinity_post_edit_link() != "" ) : ?>
  
  <div class="entry-meta"> 
    <?php echo infinity_post_edit_link(); ?> 
  </div>
  
  <?php endif;?>  
  
  <div class="entry-content">
  	<?php infinity_featured_image(); ?>
	<?php infinity_post_style(); ?>
    <?php echo infinity_link_pages(); ?>
  <div class="clear"></div>
  </div> <!-- end .entry-content -->
  
  <div class="entry-meta-bottom">
  <?php if ( 'post' == get_post_type() ) : ?>  
  <?php echo infinity_post_category() . infinity_post_tags(); ?>  
  <?php endif; ?>
  </div><!-- .entry-meta-bottom -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->