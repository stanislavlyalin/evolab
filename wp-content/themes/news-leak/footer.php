<div id="footer">
<?php 
$adfooter = get_option('nt_adfooter'); 
if ($adfooter) {?>
<div id="footer_ad_holder">
<div id="footer_ad"><?php echo stripslashes($adfooter); ?></div></div><?php }?>

<div id="footer_bellow">
<div id="footerbar">
<?php dynamic_sidebar( 'Sidebar 2' ); ?>
</div>
<?php $about = get_option('nt_about'); if ($about) {?> <div id="description"><h3>About</h3><p> <?php echo stripslashes($about); ?></p></div><?php } ?>

<p class="copyright">&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved, <br /><a href="<?php echo esc_url( __( 'http://www.archystudio.com/website-design/', 'news-leak' ) ); ?>">News Leak theme by Archy Studio</a></p>
</div>

</div>
<hr class="hidden" /></div>
<?php 
$adcontainertext = get_option('nt_adcontainertext');
if ($adcontainertext) {?> 
<div id="container_ad_loader" style="display:none;"><?php echo stripslashes($adcontainertext); ?></div>
<?php }?>
<?php wp_footer(); ?>
</body>
</html>
