<?php
/*
 * Template Name: Обсуждение
 */
get_header();
?>
<div id="mainbody"> <!-- START mainbody ID -->
  <div class="wrapper"> <!-- START wrapper CLASS -->
    <div id="contentarea"> <!-- START contentarea CLASS -->

      <p>Для того, чтобы найти интересующий материал, можете выбрать одну из исследуемых категорий из
        списка ниже или воспользоваться тегом. Чтобы ознакомиться с вопросами, обсуждаемыми в клубе,
        можете перейти по этой странице ниже.</p>

      <!-- вывод списка категорий и облака тегов -->
      <table class="no_border">
        <tr class="no_border">
          <td><h2>Список категорий</h2></td>
          <td><h2>Облако тегов</h2></td>
        </tr>
        <tr style="vertical-align: top">
          <td style="width: 60%">
            <?php wp_list_categories( 'exclude=1,4,5,19,22,23&hide_empty=0&title_li=&show_count=1' ); ?>
          </td>
          <td style="width: 40%">
            <?php $args = array('separator' => '&nbsp;', 'smallest'  => 12, 'largest'   => 15); ?>
            <?php wp_tag_cloud( $args ); ?>
          </td>
        </tr>
      </table>

      <!-- форма поиска -->
      Кроме того, для поиска нужного материала можете воспользоваться формой поиска
      <?php get_search_form(); ?>

      <!-- предложение задать свой вопрос -->
      <?php if ( get_current_user_role() != '' ) : ?>
        Не нашли интересующий вопрос в списке ниже?&nbsp;&nbsp;
        <a href="<?php echo get_site_url(); ?>/ask_question/"><span style="font-size: 130%">Задайте свой вопрос</span></a>
      <?php endif; ?>

      <!-- пагинация вверху страницы -->
      <?php
      $current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $questions_cat = 23;  // Вопросы на очереди
      $posts_per_page = 20; // постов на странице
      // wp_corenavi( $questions_cat , $posts_per_page, $current_page );
      ?>

      <!-- вывод списка вопросов -->
      <h2>Список вопросов для обсуждения</h2>
      <?php $posts = query_posts( array( 'cat' => 23, 'paged' => $current_page, 'posts_per_page' => 2 ) ); ?>
      <?php foreach ( $posts as $post ) : ?>
        <div>
          <p><b><?php echo $post->post_title; ?></b></p>
          <div class="category_content"><?php echo substr( $post->post_content, 0, 1000 ) . '...'; ?></div>
        </div>
      <?php endforeach; ?>
      
      <!-- пагинация внизу страницы -->
      <?php wp_corenavi( $questions_cat, $posts_per_page, $current_page ); ?>

    </div> <!-- END contentarea CLASS -->
    <?php get_sidebar(); ?>
    <div class="clear"></div>
  </div>  <!-- END wrapper CLASS -->
  <div class="clear"></div>
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>