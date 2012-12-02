<div id="sidebar" class="grid_4">
  
  <?php 
  if ( ! dynamic_sidebar( 'infinity-primary-sidebar' ) ):
  $infinity_theme_data = infinity_theme_data();
  ?>
  
  <div class="widget widget_pages widget-widget_pages">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Pages</h2>
        <ul><?php wp_list_pages('title_li='); ?></ul>
    </div>
  </div>
  
  <div class="widget widget_categories widget-widget_categories">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Categories</h2>
        <ul><?php wp_list_categories('title_li='); ?></ul>
    </div>
  </div>
  
  <div class="widget widget_archive widget-widget_archive">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Archives</h2>
        <ul><?php wp_get_archives('type=monthly'); ?></ul>
    </div>
  </div>
  
  <div class="widget widget_calendar widget-widget_calendar">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Calendar</h2>
      <?php get_calendar(); ?>
    </div>
  </div>
  
  <div class="widget widget_recent_entries widget-widget_recent_entries">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Recent Posts</h2>
        <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
    </div>
  </div>
  
  <div class="widget widget_tag_cloud widget-widget_tag_cloud">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Tag Cloud</h2>
      <?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
    </div>
  </div>
  
  <div class="widget widget_text widget-widget_text">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">About Infinity</h2>
      <div class="textwidget"><?php echo $infinity_theme_data['Description']; ?></div>
    </div>
  </div>
  
  <div class="widget widget_links widget-widget_links">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Blogroll</h2>
        <ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
    </div>
  </div>
  
  <div class="widget widget_meta widget-widget_meta">
    <div class="widget-wrap widget-inside">
      <h2 class="widget-title">Meta</h2>
        <ul>
          <?php wp_register(); ?>
          <li><?php wp_loginout(); ?></li>
          <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
          <li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
          <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
          <?php wp_meta(); ?>
        </ul>
    </div>
  </div>
  
  <?php endif; ?>
  
</div>  <!-- end #sidebar -->
<div class="clear"></div>