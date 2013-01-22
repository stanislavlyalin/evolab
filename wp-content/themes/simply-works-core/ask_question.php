<?php
/*
 * Template Name: Задать вопрос
 */
get_header();
?>
<div id="mainbody"> <!-- START mainbody ID -->
  <div class="wrapper"> <!-- START wrapper CLASS -->
    <div id="contentarea"> <!-- START contentarea CLASS -->

      <?php
      
      $site_url = get_site_url();
      
      // форма доступна только для зарегистрированных пользователей
      if ( get_current_user_role() == '' ) {
        echo "<br/>Задавать вопросы могут только зарегистрированные пользователи. Пожалуйста, войдите или зарегистрируйтесь.<br/><br/>";
        echo "<a href='$site_url/discussion/'>Вернуться к обсуждению</a>";
        exit();
      }

      $title    = ( isset( $_GET['title'] ) ) ? $_GET['title'] : '';
      $question = ( isset( $_GET['question'] ) ) ? $_GET['question'] : '';

      $has_title = strlen( $title ) > 10;
      $has_text  = strlen( $question ) > 10;

      // форма с запросом ввода вопроса
      $form_html = <<<FORM_HTML
<form action="">
<div style="width: 80%">
	<label for="title">Заголовок вопроса (не менее 6 символов)</label>
	<input id="title" name="title" value="$title" style="width: 100%">

	<label for="question">Текст вопроса (не менее 6 символов):</label>
	<textarea id="question" name="question" style="width: 100%" rows="8">$question</textarea>
	<br>
	<input type="submit" value="Задать" style="float: right">
</div>
</form>
FORM_HTML;

      echo "<h1>Новый вопрос</h1>";

      // если есть заголовок и текст вопроса, добавляем вопрос в БД
      if ( isset( $_GET['title'] ) && isset( $_GET['title'] ) ) {
        if ( $has_title && $has_text ) {
          global $wpdb;

          // добавляем запись в БД
          $wpdb->insert(
                  'el_posts', array(
              post_author    => get_current_user_id(),
              post_date      => date( "Y-d-m H:i:s" ),
              post_date_gmt  => date( "Y-d-m H:i:s" ),
              post_content   => htmlspecialchars( $question, ENT_QUOTES ),
              post_title     => htmlspecialchars( $title, ENT_QUOTES ),
              post_status    => 'draft',
              comment_status => 'closed',
              post_type      => 'post',
              post_parent    => 0), array('%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d')
          );

          // добавляем ссылку на категорию
          $object_id        = $wpdb->insert_id;
          $term_taxonomy_id = 23;   // рубрика "Вопросы на очереди"

          $wpdb->insert(
                  'el_term_relationships', array(
              object_id        => $object_id,
              term_taxonomy_id => $term_taxonomy_id,
              term_order       => 0), array('%d', '%d', '%d')
          );

          // сообщение об успешном добавлении и ссылка назад к обсуждению
          echo "<br/><div class='message green'>Вопрос успешно добавлен</div><br/><br/>";
          echo "<a href='$site_url/disсussion/'>Вернуться к обсуждению</a>";
        }
        else {
          // сообщение о неверных параметрах и вывод формы для нового ввода
          echo "<div class='message red'>Ошибка в заголовке или тексте вопроса</div><br/>";
          echo $form_html;
        }
      }
      else {
        echo $form_html;
      }
      ?>

    </div> <!-- END contentarea CLASS -->
<?php get_sidebar(); ?>
    <div class="clear"></div> 
  </div>  <!-- END wrapper CLASS -->
  <div class="clear"></div> 
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>