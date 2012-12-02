<?php 
$adpost1 = get_option('nt_adpost1');
$adpost2 = get_option('nt_adpost2'); 
$adpost3 = get_option('nt_adpost3'); 
if ($adpost1 || $adpost2 || $adpost3) {?> 
<div id="ad_bellow_post"><div class="ad_bellow_post_item"><?php echo stripslashes($adpost1); ?></div>
<div class="ad_bellow_post_item"><?php echo stripslashes($adpost2); ?></div>
<div class="ad_bellow_post_item"><?php echo stripslashes($adpost3); ?></div></div><?php }?>