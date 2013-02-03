<?php
/*
 * Template Name: Обсуждение
 */
get_header();
?>
<div id="mainbody"> <!-- START mainbody ID -->
  <div class="wrapper"> <!-- START wrapper CLASS -->
    <div id="contentarea"> <!-- START contentarea CLASS -->
      
      <!-- пагинация вверху страницы -->
      <?php
      $current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $questions_cat = 23;  // Вопросы на очереди
      $posts_per_page = 20; // постов на странице
      // wp_corenavi( $questions_cat , $posts_per_page, $current_page );
      ?>      
      
      <!-- выбор категории и облако тегов -->
      <table style="border: none;" cellspacing="10px">
        <tr style="border: none">
          <td style="border: none; width: 400px"><h2>Выберите категорию...</h2></td>
          <td style="border: none; width: 300px"><h2>...или интересный тег</h2></td>
        </tr>
        <tr>
          <td style="vertical-align: top" class="info_border">
              <?php wp_list_categories( 'exclude=1,4,5,19,22,23&hide_empty=0&title_li=&show_count=1' ); ?>
          </td>
          <td style="vertical-align: top" class="info_border">
              <?php $args = array('separator' => ' ', 'smallest'  => 12, 'largest'   => 15); ?>
              <?php wp_tag_cloud( $args ); ?>
          </td>
        </tr>
      </table>

      <!-- форма поиска -->
      <div style="position: relative; left: 170px; width: 330px; padding: 10px;"">
        <h2>Воспользуйтесь поиском</h2>
        <div class="info_border">
          <?php get_search_form(); ?>
          <p style="color: gray; font-size: 80%"><i>Полнотекстовый поиск по всем материалам сайта и комментариям</i></p>
        </div>
      </div>

      <!-- предложение задать свой вопрос -->
      <?php if ( get_current_user_role() != '' ) : ?>
        <br/><br/>
        Если у Вас есть вопрос, и Вы не нашли его в Списке вопросов для обсуждения ниже, можете
        <br/>
        <a ref="<?php echo get_site_url(); ?>/ask_question/"><div class="add_question_btn">Задать свой вопрос</div></a>
        <br/>
      <?php endif; ?>
      
      <!-- вывод списка вопросов -->
      <h2>Список вопросов для обсуждения</h2>
      <?php $posts = query_posts( array( 'cat' => 23, 'paged' => $current_page, 'posts_per_page' => 2 ) ); ?>
      <?php foreach ( $posts as $post ) : ?>
        <div>
          <p><b><?php echo $post->post_title; ?></b></p>
          <div class="category_content"><?php echo substr( $post->post_content, 0, 1000 ) . '...'; ?></div>
        </div>
        <br>
      <?php endforeach; ?>
      <br><br>
      
      <!-- пагинация внизу страницы -->
      <?php wp_corenavi( $questions_cat, $posts_per_page, $current_page ); ?>

    </div> <!-- END contentarea CLASS -->
    <?php get_sidebar(); ?>
    <div class="clear"></div>
  </div>  <!-- END wrapper CLASS -->
  <div class="clear"></div>
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>