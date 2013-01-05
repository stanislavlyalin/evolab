<?php 
class collapsCatWidget extends WP_Widget {
  function collapsCatWidget() {
    $widget_ops = array('classname' => 'widget_collapscat', 'description' =>
    'Collapsible category listing' );
		$control_ops = array (
			'width' => '550', 
			'height' => '400'
			);
    $this->WP_Widget('collapscat', 'Collapsing Categories', $widget_ops,
    $control_ops);
  }
 
  function widget($args, $instance) {
    extract($args, EXTR_SKIP);
 
    $title = apply_filters('widget_title', $instance['title']);
    echo $before_widget;
    if (!empty($title))
      echo $before_title . $title . $after_title;
    $instance['number'] = $this->get_field_id('top');
    $instance['number'] = preg_replace('/[a-zA-Z-]/', '', $instance['number']);
    echo "<ul id='" .  $this->get_field_id('top') . 
        "' class='collapsing categories list'>\n";
    if( function_exists('collapsCat') ) {
     collapsCat($instance);
    } else {
     wp_list_categories();
    }
    echo "</ul>\n";
    echo $after_widget;
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    include('updateOptions.php');
    return $instance;
  }
 
  function form($instance) {
    include('defaults.php');
    include('collapsCatStyles.php');
    $options=wp_parse_args($instance, $defaults);
    extract($options);
?>
<?php
    include('options.txt');
?>
<?php
  }
}
function registerCollapsCatWidget() {
  register_widget('collapsCatWidget');
}
	add_action('widgets_init', 'registerCollapsCatWidget');
