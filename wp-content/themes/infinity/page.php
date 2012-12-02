<?php get_header();	?>
<div class="container_12_wrap">
  <div class="container_12_wrap_inside">

    <div class="container_12">
      <div id="content" class="grid_8">
      
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php get_template_part( 'content', 'page' ); ?>
        
        <?php endwhile; ?>
        
        <?php get_template_part( 'loop-nav' ); ?>
      
      </div> <!-- end #content -->
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>