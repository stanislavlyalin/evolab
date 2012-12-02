<?php get_header();	?>
<div class="container_12_wrap">
  <div class="container_12_wrap_inside">

    <div class="container_12">
      <div id="content" class="grid_8">
          
        <div id="loop-meta">
          <h1 class="loop-meta-title"><?php _e( '404', 'infinity' ); ?></h1>
          <div class="loop-meta-description"><?php _e( 'Whoah! You broke something!', 'infinity' ); ?></div>
        </div> <!-- #loop-meta -->
        
        <div id="post-0" class="post-0 post type-post error404 not-found">
        
          <div class="entry-content">
      
            <p><?php printf( __( "Just kidding! You tried going to %s, which doesn't exist, so that means I probably broke something.", 'infinity' ), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?></p>
            
            <p><?php _e( "The following is a list of the latest posts from the blog. Maybe it will help you find what you're looking for.", 'infinity' ); ?></p>
      
            <ul>
              <?php wp_get_archives( array( 'limit' => 20, 'type' => 'postbypost' ) ); ?>
            </ul>                   
      
          </div><!-- end .entry-content -->
      
        </div><!-- end #post-0 -->  
      </div> <!-- end #content -->
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>