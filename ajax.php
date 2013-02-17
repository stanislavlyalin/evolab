<?php

require( dirname( __FILE__ ) . '/wp-load.php' );

if ( isset( $_GET['post_id'] ) ) {
  $post = get_post( $_GET['post_id'] );

  if ( $post != NULL ) {
    $thesis_pat = "/(?<=\[accordion title=\"Ключевые тезисы\"\]).*(?=\[\/accordion\])/sU";
    $matches    = array();
    preg_match( $thesis_pat, $post->post_content, $matches );
    echo ( count( $matches ) > 0 ) ? $matches[0] . "<br><br><br>" : "<br>Для данного вопроса ключевые тезисы не заданы<br><br><br>";
  }
  else {
    echo "Запрашиваемые данные не найдены";
  }
}
?>