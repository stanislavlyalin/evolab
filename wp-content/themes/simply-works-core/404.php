<?php
/*
Package: Simply Works Core
Title: Simply Works Core
Update: 04/10/12
Author: Jason Huber
Version 1.5.5
Description: 404 Template Page / Page Not Found = 404.php
 */
get_header();
?>
<div id="mainbody">
  <div class="wrapper">
   <div id="contentarea">
     <h2 class="contenttitle"><?php _e('Ошибка 404 - Страница не найдена', 'simplyworks') ?></h2>
        <?php _e('<p><strong>Похоже, запрашиваемая страница не существует или перенесена</strong><br />
Пожалуйста, убедитесь, что Вы ввели правильный URL</p>', 'simplyworks') ?>
   </div><!-- END contentarea -->
<?php get_sidebar(); ?>
     <div class="clear"></div>
    </div>  <!-- END wrapper class -->
   <div class="clear">&nbsp;</div> 
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>