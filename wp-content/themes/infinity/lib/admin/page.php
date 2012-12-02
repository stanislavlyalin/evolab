<div class="wrap">
  
  <?php 
  /** Get the parent theme data. */
  $infinity_theme_data = infinity_theme_data();
  screen_icon();
  ?>
  <h2><?php echo sprintf( __( '%1$s Theme Settings', 'infinity' ), $infinity_theme_data['Name'] ); ?></h2>    
  
  <?php settings_errors( 'infinity_options' ); ?>
  
  <form action="options.php" method="post">
    
    <?php settings_fields('infinity_options_group'); ?>
    
    <div id="infinity_tabs" class="infinity-tabs">
    
      <ul>
        <li><a href="#infinity_section_blog_tab"><?php _e( 'Blog Options', 'infinity' ); ?></a></li>
        <li><a href="#infinity_section_general_tab"><?php _e( 'General Options', 'infinity' ); ?></a></li>        
      </ul>
      
      <div id="infinity_section_blog_tab"><?php do_settings_sections( 'infinity_section_blog_page' ); ?></div>
      <div id="infinity_section_general_tab"><?php do_settings_sections( 'infinity_section_general_page' ); ?></div>      
    
    </div>
    
    <p class="submit">
      <input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'infinity' ); ?>" />
    </p>
  
  </form>

</div>