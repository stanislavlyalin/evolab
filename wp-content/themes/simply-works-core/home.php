<?php
/*
 * Template Name: Главная
 */
get_header();
?>
<div id="mainbody"> <!-- START mainbody ID -->
  <div class="wrapper"> <!-- START wrapper CLASS -->
    <div id="contentarea"> <!-- START contentarea CLASS -->

      <?php
      if ( function_exists( 'vslider' ) ) {
        vslider( 'homeslider' );
      }
      ?>

      <h1>Цели и задачи клуба</h1>
      <div class="rounded_div">
        Основной целью клуба является осмысление процессов, происходящих вокруг. Обмениваясь
        знаниями и опытом, мы пытаемся понять место человека в мире и его роль в эволюционном
        процессе. Через открытый диалог мы учимся дисциплине мышления и объективности в оценке
        происходящих явлений. Проводя аналогии и обобщая накопленные знания, мы пытаемся проследить
        основные закономерности и представить многогранную картину будущего мира.
      </div>
      <br>

    </div> <!-- END contentarea CLASS -->
<?php get_sidebar(); ?>
    <div class="clear"></div> 
  </div>  <!-- END wrapper CLASS -->
  <div class="clear"></div> 
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>