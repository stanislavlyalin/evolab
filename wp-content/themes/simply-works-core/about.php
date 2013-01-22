<?php
/*
 * Template Name: О клубе
 */
get_header();

// HTML-код, предваряющий описание участника клуба
function club_member_begin( $avatar, $name, $latin ) {
  $html = <<<HTML
<table class="no_border">
  <tr>
    <td class="member_photo_cell">
      <img src="$avatar" class="member_photo"/>
    </td>
    <td class="valign_top">
      <h3><a name="$latin">$name</a></h3>
HTML;
  echo $html;
}

// HTML-код, завершающий описание участника клуба
function club_member_end() {
  $html = <<<HTML
    </td>
  </tr>
</table>
HTML;
  echo $html;
}
?>
<div id="mainbody"> <!-- START mainbody ID -->
  <div class="wrapper"> <!-- START wrapper CLASS -->
    <div id="contentarea"> <!-- START contentarea CLASS -->

      <!-- оглавление -->
      <a href="#about">О клубе</a><br>
      <a href="#history">История</a><br>
      <a href="#members">Участники</a><br>
      <a href="#experts">Эксперты</a><br>

      <h2 id="about">О клубе</h2>
      Несколько слов о клубе, чем мы занимаемся, о наших ценностях, взглядах, целях.

      <h2 id="history">История</h2>
      История возникновения и первые два года его существования.

      <h2 id="members">Участники</h2>
      <?php club_member_begin( get_site_url() . "/wp-content/uploads/2013/01/elena_egorova.png", "Елена Егорова", "elena_egorova" ); ?>
      Описание<br>
      Представительство в интернете: <a href="http://helenrokken.livejournal.com/">Живой Журнал</a>
      <?php club_member_end(); ?>

      <?php club_member_begin( get_site_url() . "/wp-content/uploads/2013/01/aleksey_borisov.png", "Алексей Борисов", "aleksey_borisov" ); ?>
      Описание<br>
      Представительство в интернете: <a href="http://alex-artha.livejournal.com/">Живой Журнал</a>
      <?php club_member_end(); ?>

      <?php club_member_begin( get_site_url() . "/wp-content/uploads/2013/01/lydmila_izmestyeva.png", "Людмила Изместьева", "lydmila_izmestieva" ); ?>
      Описание<br>
      Представительство в интернете: <a href="http://enigma-vita.livejournal.com/">Живой Журнал</a>
      <?php club_member_end(); ?>

      <?php club_member_begin( get_site_url() . "/wp-content/uploads/2013/01/stanislav_lyalin.png", "Станислав Лялин", "stanislav_lyalin" ); ?>
      Описание<br>
      Представительство в интернете: <a href="http://stanislavlyalin.livejournal.com/">Живой Журнал</a>
      <?php club_member_end(); ?>

      <?php club_member_begin( get_site_url() . "/wp-content/uploads/2013/01/milozar_laptev.png", "Милозар Лаптев", "milozar_laptev" ); ?>
      Описание
      <?php club_member_end(); ?>

      <h2 id="experts">Эксперты</h2>
      <?php club_member_begin( get_site_url() . "/wp-content/uploads/2013/01/nikolai_smirnov.png", "Николай Смирнов", "nikolai_smirnov" ); ?>
      Описание
      <?php club_member_end(); ?>

    </div> <!-- END contentarea CLASS -->
    <?php get_sidebar(); ?>
    <div class="clear"></div> 
  </div>  <!-- END wrapper CLASS -->
  <div class="clear"></div> 
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>