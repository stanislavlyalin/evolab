<?php
/*
Plugin Name: NotCaptcha
Plugin URI: http://notcaptcha.webjema.com
Description: A NotCaptcha to protect comment posts and/or registrations in WordPress. <a href="plugins.php?page=wp-notcaptcha/not-captcha.php">NotCaptcha Options</a>
Version: 1.3.1
Author: WebJema
Author URI: http://www.webjema.com
*/

/*  Copyright (C) 2009 WebJema  (http://www.webjema.com/)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if (!class_exists('notCaptcha')) {

class notCaptcha {
var $notcaptcha_init = array();

function add_tabs() {
    //add_options_page('Captcha Options', 'Captcha', 9, __FILE__,array(&$this,'options_page'));
    add_submenu_page('plugins.php', __('NotCaptcha Options', 'not-captcha'), __('NotCaptcha Options', 'not-captcha'), 'manage_options', __FILE__,array(&$this,'options_page'));
} // add_tabs

function get_settings($value) {
	// gets the settings, providing defaults if need be
	if (!get_option($value)) {
	        $defaults = array(
	         'not_captcha_perm' => 'true',
	         'not_captcha_perm_level' => 'read',
	         'not_captcha_comment' => 'true',
	         'not_captcha_comment_class' => '',
	         'not_captcha_register' => 'true',
	         'not_captcha_rearrange' => 'false',
	         'not_captcha_addnoise' => 'true',
	         'not_captcha_back_r' => 255,
	         'not_captcha_back_g' => 255,
	         'not_captcha_back_b' => 255,
	         );
	        update_option($value,$defaults[$value]);
	        return $defaults[$value];
	} else {
	        return get_option($value);
	}
} //end get_settings

function options_page() {
  global $not_captcha_nonce;
  if ($_POST['submit']) {
    if ( function_exists('current_user_can') && !current_user_can('manage_options') )
                        die(__('You do not have permission for managing this option', 'not-captcha'));

    $possible_options = array_keys($_POST);
    //if the options are part of an array
        foreach($possible_options as $option) {
                update_option($option,trim($_POST[$option]));
        }

    if ( isset( $_POST['not_captcha_perm'] ) )
         update_option( 'not_captcha_perm', 'true' );
        else
         update_option( 'not_captcha_perm', 'false' );

    if ( isset( $_POST['not_captcha_comment'] ) )
         update_option( 'not_captcha_comment', 'true' );
        else
         update_option( 'not_captcha_comment', 'false' );

    if ( !isset( $_POST['not_captcha_comment_class'] ) )
         update_option( 'not_captcha_comment_class', '' );

    if ( isset( $_POST['not_captcha_register'] ) )
         update_option( 'not_captcha_register', 'true' );
        else
         update_option( 'not_captcha_register', 'false' );

    if ( isset( $_POST['not_captcha_rearrange'] ) )
         update_option( 'not_captcha_rearrange', 'true' );
        else
         update_option( 'not_captcha_rearrange', 'false' );

    if ( isset( $_POST['not_captcha_addnoise'] ) )
         update_option( 'not_captcha_addnoise', 'true' );
        else
         update_option( 'not_captcha_addnoise', 'false' );

    if ( isset( $_POST['not_captcha_back_r'] ) )
         update_option( 'not_captcha_back_r', (int)$_POST['not_captcha_back_r'] );
        else
         update_option( 'not_captcha_back_r', 255 );
         
    if ( isset( $_POST['not_captcha_back_g'] ) )
         update_option( 'not_captcha_back_g', (int)$_POST['not_captcha_back_g'] );
        else
         update_option( 'not_captcha_back_g', 255 );
         
    if ( isset( $_POST['not_captcha_back_b'] ) )
         update_option( 'not_captcha_back_b', (int)$_POST['not_captcha_back_b'] );
        else
         update_option( 'not_captcha_back_b', 255 );
  }
?>
<?php if ( !empty($_POST ) ) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.', 'not-captcha') ?></strong></p></div>
<?php endif; ?>
<div class="wrap">
<h2><?php _e('NotCaptcha Options', 'not-captcha') ?></h2>

<p>
<?php _e('Your theme must have a', 'not-captcha') ?> &lt;?php do_action('comment_form', $post->ID); ?&gt; <?php _e('tag inside your comments.php form. Most themes do.', 'not-captcha'); echo ' '; ?>
<?php _e('The best place to locate the tag is before the comment textarea, you may want to move it if it is below the comment textarea, or the captcha image and captcha code entry might display after the submit button.', 'not-captcha') ?>
</p>

<form name="formoptions" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>&amp;updated=true">
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="form_type" value="upload_options" />

        <fieldset class="options">

        <table width="100%" cellspacing="2" cellpadding="5" class="form-table">

        <tr>
            <th scope="row"><label for="not_captcha_register"><?php _e('NotCaptcha on Register Form:', 'not-captcha') ?></label></th>
        <td>
    <input name="not_captcha_register" id="not_captcha_register" type="checkbox"
    <?php if ( $this->get_settings('not_captcha_register') == 'true' ) echo ' checked="checked" '; ?> />
    <?php _e('Enable NotCaptcha on the register form.', 'not-captcha') ?><br />
    </td>
        </tr>

        <tr>
            <th scope="row"><label for="not_captcha_comment"><?php _e('NotCaptcha on Comment Form:', 'not-captcha') ?></label></th>
        <td>
    <input name="not_captcha_comment" id="not_captcha_comment" type="checkbox" <?php if ( $this->get_settings('not_captcha_comment') == 'true' ) echo ' checked="checked" '; ?> />
    <?php _e('Enable NotCaptcha on the comment form.', 'not-captcha') ?><br />

        <input name="not_captcha_perm" id="not_captcha_perm" type="checkbox" <?php if( $this->get_settings('not_captcha_perm') == 'true' ) echo 'checked="checked"'; ?> />
        <label name="not_captcha_perm" for="not_captcha_perm"><?php _e('Hide NotCaptcha for', 'not-captcha') ?>
        <strong><?php _e('registered', 'not-captcha') ?></strong>
         <?php _e('users who can:', 'not-captcha') ?></label>
        <?php $this->not_captcha_perm_dropdown('not_captcha_perm_level', $this->get_settings('not_captcha_perm_level'));  ?><br />

    </td>
        </tr>
        
        <tr>
            <th scope="row"><label for="not_captcha_addnoise"><?php _e('Add noise to image:', 'not-captcha') ?></label></th>
        <td>
    <input name="not_captcha_addnoise" id="not_captcha_addnoise" type="checkbox" <?php if ( $this->get_settings('not_captcha_addnoise') == 'true' ) echo ' checked="checked" '; ?> />
    <?php _e('Add some shapes to protect the image from recognition', 'not-captcha') ?><br />
    </td>
        </tr>

        <tr>
            <th scope="row"><label for="not_captcha_back_r"><?php _e('Background color (RGB):', 'not-captcha') ?></label></th>
        <td>
    R=<input name="not_captcha_back_r" id="not_captcha_back_r" type="input" value="<?php echo (int)$this->get_settings('not_captcha_back_r'); ?>" size="3" /><br />
        G=<input name="not_captcha_back_g" id="not_captcha_back_g" type="input" value="<?php echo (int)$this->get_settings('not_captcha_back_g'); ?>" size="3" /><br />
            B=<input name="not_captcha_back_b" id="not_captcha_back_b" type="input" value="<?php echo (int)$this->get_settings('not_captcha_back_b'); ?>" size="3" /><br />
    </td>
        </tr>

        </table>
        </fieldset>

<p><strong><?php _e('Problem:', 'not-captcha') ?></strong>
<?php _e('Sometimes the captcha image and captcha input field are displayed AFTER the submit button on the comment form.', 'not-captcha') ?><br />
<strong><?php _e('Fix:', 'not-captcha') ?></strong>
<?php _e('Edit your current theme comments.php file and locate this line:', 'not-captcha') ?><br />
&lt;?php do_action('comment_form', $post->ID); ?&gt;<br />
<?php _e('This tag is exactly where the captcha image and captcha code entry will be displayed on the form, so move the line BEFORE the comment textarea and the problem should be fixed.', 'not-captcha') ?><br />
</p>
        <p class="submit">
                <input type="submit" name="submit" value="<?php _e('Update Options', 'not-captcha') ?> &raquo;" />
        </p>
</form>
</div>
<?php
}// end options_page

function not_captcha_perm_dropdown($select_name, $checked_value='') {
        // choices: Display text => permission_level
        $choices = array (
                 __('All registered users', 'not-captcha') => 'read',
                 __('Edit posts', 'not-captcha') => 'edit_posts',
                 __('Publish Posts', 'not-captcha') => 'publish_posts',
                 __('Moderate Comments', 'not-captcha') => 'moderate_comments',
                 __('Administer site', 'not-captcha') => 'level_10'
                 );
        // print the <select> and loop through <options>
        echo '<select name="' . $select_name . '" id="' . $select_name . '">' . "\n";
        foreach ($choices as $text => $capability) :
                if ($capability == $checked_value) $checked = ' selected="selected" ';
                echo "\t". '<option value="' . $capability . '"' . $checked . ">$text</option> \n";
                $checked = '';
        endforeach;
        echo "\t</select>\n";
 } // not_captcha_perm_dropdown

function captchaCheckRequires() {
  global $notcaptcha_path;

  $ok = 'ok';
  // Test for some required things, print error message if not OK.
  if ( !extension_loaded('gd') || !function_exists('gd_info') ) {
       echo '<p style="color:maroon">'.__('ERROR: not-captcha.php plugin says GD image support not detected in PHP!', 'not-captcha').'</p>';
       echo '<p>'.__('Contact your web host and ask them why GD image support is not enabled for PHP.', 'not-captcha').'</p>';
      $ok = 'no';
  }
  if ( !function_exists('imagepng') ) {
       echo '<p style="color:maroon">'.__('ERROR: not-captcha.php plugin says imagepng function not detected in PHP!', 'not-captcha').'</p>';
       echo '<p>'.__('Contact your web host and ask them why imagepng function is not enabled for PHP.', 'not-captcha').'</p>';
      $ok = 'no';
  }
  if ( !file_exists("$notcaptcha_path/lib/notcaptcha.php") ) {
       echo '<p style="color:maroon">'.__('ERROR: not-captcha.php plugin says captcha_library not found.', 'not-captcha').'</p>';
       $ok = 'no';
  }
  if ($ok == 'no')  return false;
  return true;
} // captchaCheckRequires

function add_css() {
	global $user_ID, $notcaptcha_url;
	
	if ($this->get_settings('not_captcha_register') != 'true') {
        return true; // captcha setting is disabled for registration
   	}
   
	if (isset($user_ID) && intval($user_ID) > 0 && $this->get_settings('not_captcha_perm') == 'true') {
       // skip the NotCaptcha display if the minimum capability is met
       if ( current_user_can( $this->get_settings('not_captcha_perm_level') ) ) {
               // skip capthca
               return true;
        }
    }

	echo '
	<!-- NotCaptcha HEAD start -->
	<script type="text/javascript">
		var NC_PLUGIN_URL = "'.WP_PLUGIN_URL.'";
	</script>
	<script type="text/javascript" src="'.$notcaptcha_url.'lib/trackbar.js"></script>
	<style>
	#captchaImgDiv img {padding:0;margin:0;border:0;display:inline;float:none}
	#captchaImgDiv td {padding:0;margin:0;border:0}
	#captchaImgDiv div {padding:0;margin:0;border:0}
	#captchaImgDiv span {padding:0;margin:0;border:0}
	.imgunit {
		width:'.$this->notcaptcha_init['size'].'px;
		height:'.$this->notcaptcha_init['size'].'px;
		overflow:hidden;
		padding:0;
		margin:0;
		margin-left:'.round((($this->notcaptcha_init['anglescnt']-1)*10-$this->notcaptcha_init['size'])/2).'px;
		position: relative; /* IE fix */
	}
	.imgunit img {padding:0;margin:0;position:relative}
	.captchablock {width:'.(($this->notcaptcha_init['anglescnt']-1)*10+4).'px; float:left; padding:2px; margin:0;}
	.captchablock img {padding:0;margin:0;border:0;display: inline;}
	/* Reset */
	table.trackbar div, table.trackbar td {margin:0; padding:0;}
	table.trackbar {border-collapse:collapse;border-spacing:0;}
	table.trackbar img{border:0;display: inline;}
	
	/* Styles */
	table.trackbar {width:'.(($this->notcaptcha_init['anglescnt']-1)*10).'px; background:repeat-x url('.$notcaptcha_url.'/imgtrackbar/b_bg_on.gif) top left;}
	table.trackbar .l {width:1%; text-align: right; font-size: 1px; background:repeat-x url('.$notcaptcha_url.'/imgtrackbar/b_bg_off.gif) top left;}
	table.trackbar .l div {position:relative; width:0; text-align: right; z-index:500; white-space:nowrap;}
	table.trackbar .l div img {cursor:pointer;}
	table.trackbar .l div span {position:absolute;top:-12px; right:6px; z-index:1000; font:11px tahoma; color:#000;}
	table.trackbar .l div span.limit {text-align:left; position:absolute;top:-12px; right:100%; z-index:100; font:11px tahoma; color:#D0D0D0;}
	table.trackbar .r {position:relative; width:1%; text-align: left; font-size: 1px; background:repeat-x url('.$notcaptcha_url.'/imgtrackbar/b_bg_off.gif) top right; cursor:default;}
	table.trackbar .r div {position:relative; width:0; text-align: left; z-index:500; white-space:nowrap;}
	table.trackbar .r div img {cursor:pointer;}
	table.trackbar .r div span {position:absolute;top:-12px; left:6px; z-index:1000; font:11px tahoma; color:#000;}
	table.trackbar .r div span.limit {position:absolute;top:-12px; left:100%; z-index:100; font:11px tahoma; color:#D0D0D0;}
	table.trackbar .c {font-size:1px; width:100%;}
	</style>
	<!-- NotCaptcha HEAD end -->	
	';
	
} // add_css

// this function adds the captcha to the comment form
function addCaptchaToCommentForm() {
    global $user_ID, $notcaptcha_url, $notcaptcha_path;
    // skip the captcha if user is logged in and the settings allow
    if (isset($user_ID) && intval($user_ID) > 0 && $this->get_settings('not_captcha_perm') == 'true') {
       // skip the NotCaptcha display if the minimum capability is met
       if ( current_user_can( $this->get_settings('not_captcha_perm_level') ) ) {
               // skip capthca
               return true;
        }
    }

    $captcha_rearrange = $this->get_settings('not_captcha_rearrange');

// the captcha html
echo '
<div style="display:block;padding-bottom:5px;" id="captchaImgDiv">
';

// Test for some required things, print error message right here if not OK.
if ($this->captchaCheckRequires()) {

echo '
<!-- NotCaptcha FORM start -->
<small>'.__('Before you submit form:', 'not-captcha').'</small><br />
<script language="javascript">
	document.write(\'<div style="clear:both"><small>'.__('Place this icons <b>vertical</b>', 'not-captcha').' <img src="'.$notcaptcha_url.'lib/vertical_sign.png" alt="^" border="0" /></small></div>\');
	document.write(\'<div style="clear:both">\');
	function setCaptchaValue(id, val) {
		document.getElementById(id+"Field").value = val/10;
		val = -val/10*'.$this->notcaptcha_init['size'].' - (val/10);
		document.getElementById(id+"Pict").style.left = val + "px";
	}
	
	// mobile start
	function setCaptchaValueMobile(id) {
		val = document.getElementById(id+"Field").value;
		val++;
		if (val >= '.$this->notcaptcha_init['anglescnt'].') {
			val = 0;
		}
		document.getElementById(id+"Field").value = val;
		val *= 10;
		val = -val/10*'.$this->notcaptcha_init['size'].' - (val/10);
		document.getElementById(id+"Pict").style.left = val + "px";
	}
	// mobile end

	var img1 = "imgone";
	document.write(\'<div class="captchablock">\');
	document.write(\'<div id="imgoneUnit" class="imgunit"><img id="imgonePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?i=1&r='.time().'" onclick = "setCaptchaValueMobile(img1)" /></div>\');
	document.write(\'<input type="hidden" id="imgoneField" name="imgoneField" value="0" />\');
	//<![CDATA[
	trackbar.getObject(img1).init({
		onMove : function() {
			setCaptchaValue(img1, this.leftValue);
		},
		dual : false, // two intervals
		width : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // px
		roundUp: 10,
		leftLimit : 0, // unit of value
		leftValue : 0, // unit of value
		rightLimit : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		rightValue : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		clearLimits: 1,
		clearValues: 1 });
	// -->
	document.write(\'</div>\');

	var img2 = "imgtwo";
	document.write(\'<div class="captchablock">\');
	document.write(\'<div id="imgtwoUnit" class="imgunit"><img id="imgtwoPict" src="'.$notcaptcha_url.'lib/notcaptcha.php?i=2&r='.time().'" onclick = "setCaptchaValueMobile(img2)" /></div>\');
	document.write(\'<input type="hidden" id="imgtwoField" name="imgtwoField" value="0">\');
	//<![CDATA[
	trackbar.getObject(img2).init({
		onMove : function() {
			setCaptchaValue(img2, this.leftValue);
		},
		dual : false, // two intervals
		width : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // px
		roundUp: 10,
		leftLimit : 0, // unit of value
		leftValue : 0, // unit of value
		rightLimit : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		rightValue : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		clearLimits: 1,
		clearValues: 1 });
	// -->
	document.write(\'</div>\');

	var img3 = "imgthree";
	document.write(\'<div class="captchablock">\');
	document.write(\'<div id="imgthreeUnit" class="imgunit"><img id="imgthreePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?i=3&r='.time().'" onclick = "setCaptchaValueMobile(img3)" /></div>\');
	document.write(\'<input type="hidden" id="imgthreeField" name="imgthreeField" value="0">\');

	//<![CDATA[
	trackbar.getObject(img3).init({
		onMove : function() {
			setCaptchaValue(img3, this.leftValue);
		},
		dual : false, // two intervals
		width : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // px
		roundUp: 10,
		leftLimit : 0, // unit of value
		leftValue : 0, // unit of value
		rightLimit : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		rightValue : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		clearLimits: 1,
		clearValues: 1 });
	// -->
	document.write(\'</div>\');
	document.write(\'</div>\');
	document.write(\'<div style="clear:both"><small>'.__('Move the sliders to change angle of images', 'not-captcha').' '.__('or just click on images', 'not-captcha').'</small><br />\');
	document.write(\'<small><b style="cursor:pointer; padding:2px; border-bottom: 1px dashed" onclick="refresh_security_image()">'.__('Reload images', 'not-captcha').'</b></small></div>\');
</script>
<noscript>
	<div style="clear:both"><small>'.__('Please, choose number of <b>vertical</b> image', 'not-captcha').' <img src="'.$notcaptcha_url.'lib/vertical_sign.png" alt="^" border="0" /></small></div>
	<div style="clear:both;padding:4px;">
		<img id="imgonePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?n=1&i=1&r='.time().'" align="left" />
		<select name="imgoneField">
			<option value="">'.__('- select -', 'not-captcha').'</option>' . "\n";
				for ($i = 1; $i <= $this->notcaptcha_init['anglescnt']; $i++) {
					echo '<option value='.($i-1).'>'.$i.'</option>' . "\n";
				}
echo '
		</select>
	</div>
	<div style="clear:both;padding:4px;">
		<img id="imgtwoPict" src="'.$notcaptcha_url.'lib/notcaptcha.php?n=1&i=2&r='.time().'" align="left" />
		<select name="imgtwoField">
			<option value="">'.__('- select -', 'not-captcha').'</option>' . "\n";
				for ($i = 1; $i <= $this->notcaptcha_init['anglescnt']; $i++) {
					echo '<option value='.($i-1).'>'.$i.'</option>' . "\n";
				}
echo '
		</select>
	</div>
	<div style="clear:both;padding:4px;">
		<img id="imgthreePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?n=1&i=3&r='.time().'" align="left" />
		<select name="imgthreeField">
			<option value="">'.__('- select -', 'not-captcha').'</option>' . "\n";
				for ($i = 1; $i <= $this->notcaptcha_init['anglescnt']; $i++) {
					echo '<option value='.($i-1).'>'.$i.'</option>' . "\n";
				}
echo '
		</select>
	</div>
	</div>
</noscript>
<img src="'.$notcaptcha_url.'lib/blank.gif" width="1" height="1" />
<!-- Leave the link - make internet cleaner! -->
<small>Human test by <a href="http://notcaptcha.webjema.com/">Not Captcha</a></small>
<!-- Оставьте ссылку - сделайте интернет чище! -->
<!-- NotCaptcha FORM end -->

<script type="text/javascript">
  <!--
  function refresh_security_image() {

	var blank = new String("'.$notcaptcha_url.'lib/blank.gif");
	document.getElementById("imgonePict").src = blank;
	document.getElementById("imgtwoPict").src = blank;
	document.getElementById("imgthreePict").src = blank;
	
  	var new_url1 = new String("'.$notcaptcha_url.'lib/notcaptcha.php?i=1&r='.time().'");
  	var new_url2 = new String("'.$notcaptcha_url.'lib/notcaptcha.php?i=2&r='.time().'");
  	var new_url3 = new String("'.$notcaptcha_url.'lib/notcaptcha.php?i=3&r='.time().'");

	// we need a random new url so this refreshes
	new_url1 = new_url1 + Math.floor(Math.random() * 1000);
	new_url2 = new_url2 + Math.floor(Math.random() * 1000);
	new_url3 = new_url3 + Math.floor(Math.random() * 1000);
	
	document.getElementById("imgonePict").src = new_url1;
	document.getElementById("imgtwoPict").src = new_url2;
	document.getElementById("imgthreePict").src = new_url3;
  }
  -->
 </script>
';
echo '</div>';

// rearrange submit button display order
if ($captcha_rearrange == 'true') {
     print  <<<EOT
      <script type='text/javascript'>
          var sUrlInput = document.getElementById("url");
                  var oParent = sUrlInput.parentNode;
          var sSubstitue = document.getElementById("captchaImgDiv");
                  oParent.appendChild(sSubstitue, sUrlInput);
      </script>
            <noscript>
          <style type='text/css'>#submit {display:none;}</style><br />
EOT;
  echo '           <input name="submit" type="submit" id="submit-alt" tabindex="6" value="'.__('Submit Comment', 'not-captcha').'" />
          </noscript>
  ';

}
} else {
 echo '</div>';
}
        return true;
} // addCaptchaToCommentForm

// this function adds the captcha to the comment form
function addCaptchaToRegisterForm() {
   global $notcaptcha_url, $notcaptcha_path;

   if ($this->get_settings('not_captcha_register') != 'true') {
        return true; // captcha setting is disabled for registration
   }

// Test for some required things, print error message right here if not OK.
if ($this->captchaCheckRequires()) {

// the captch html
echo '
<div style="display:block;padding-bottom:5px;" id="captchaImgDiv">
';

echo '
<!-- NotCaptcha FORM start -->
<small>'.__('Before you submit form:', 'not-captcha').'</small><br />

<script language="javascript">
	document.write(\'<div style="clear:both"><small>'.__('Place this icons <b>vertical</b>', 'not-captcha').' <img src="'.$notcaptcha_url.'lib/vertical_sign.png" alt="^" border="0" /></small></div>\');
	document.write(\'<div style="clear:both">\');
	function setCaptchaValue(id, val) {
		document.getElementById(id+"Field").value = val/10;
		val = -val/10*'.$this->notcaptcha_init['size'].' - (val/10);
		document.getElementById(id+"Pict").style.left = val + "px";
	}
	
	// mobile start
	function setCaptchaValueMobile(id) {
		val = document.getElementById(id+"Field").value;
		val++;
		if (val >= '.$this->notcaptcha_init['anglescnt'].') {
			val = 0;
		}
		document.getElementById(id+"Field").value = val;
		val *= 10;
		val = -val/10*'.$this->notcaptcha_init['size'].' - (val/10);
		document.getElementById(id+"Pict").style.left = val + "px";
	}
	// mobile end

	var img1 = "imgone";
	document.write(\'<div class="captchablock">\');
	document.write(\'<div id="imgoneUnit" class="imgunit"><img id="imgonePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?i=1&r='.time().'" onclick = "setCaptchaValueMobile(img1)" /></div>\');
	document.write(\'<input type="hidden" id="imgoneField" name="imgoneField" value="0" />\');
	//<![CDATA[
	trackbar.getObject(img1).init({
		onMove : function() {
			setCaptchaValue(img1, this.leftValue);
		},
		dual : false, // two intervals
		width : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // px
		roundUp: 10,
		leftLimit : 0, // unit of value
		leftValue : 0, // unit of value
		rightLimit : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		rightValue : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		clearLimits: 1,
		clearValues: 1 });
	// -->
	document.write(\'</div>\');

	var img2 = "imgtwo";
	document.write(\'<div class="captchablock">\');
	document.write(\'<div id="imgtwoUnit" class="imgunit"><img id="imgtwoPict" src="'.$notcaptcha_url.'lib/notcaptcha.php?i=2&r='.time().'" onclick = "setCaptchaValueMobile(img2)" /></div>\');
	document.write(\'<input type="hidden" id="imgtwoField" name="imgtwoField" value="0">\');
	//<![CDATA[
	trackbar.getObject(img2).init({
		onMove : function() {
			setCaptchaValue(img2, this.leftValue);
		},
		dual : false, // two intervals
		width : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // px
		roundUp: 10,
		leftLimit : 0, // unit of value
		leftValue : 0, // unit of value
		rightLimit : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		rightValue : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		clearLimits: 1,
		clearValues: 1 });
	// -->
	document.write(\'</div>\');

	var img3 = "imgthree";
	document.write(\'<div class="captchablock">\');
	document.write(\'<div id="imgthreeUnit" class="imgunit"><img id="imgthreePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?i=3&r='.time().'" onclick = "setCaptchaValueMobile(img3)" /></div>\');
	document.write(\'<input type="hidden" id="imgthreeField" name="imgthreeField" value="0">\');

	//<![CDATA[
	trackbar.getObject(img3).init({
		onMove : function() {
			setCaptchaValue(img3, this.leftValue);
		},
		dual : false, // two intervals
		width : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // px
		roundUp: 10,
		leftLimit : 0, // unit of value
		leftValue : 0, // unit of value
		rightLimit : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		rightValue : '.(($this->notcaptcha_init['anglescnt']-1)*10).', // unit of value
		clearLimits: 1,
		clearValues: 1 });
	// -->
	document.write(\'</div>\');
	document.write(\'</div>\');
	document.write(\'<div style="clear:both"><small>'.__('Move the sliders to change angle of images', 'not-captcha').' '.__('or just click on images', 'not-captcha').'</small><br />\');
	document.write(\'<small><b style="cursor:pointer; padding:2px; border-bottom: 1px dashed" onclick="refresh_security_image()">'.__('Reload images', 'not-captcha').'</b></small></div>\');
</script>
<noscript>
	<div style="clear:both"><small>'.__('Please, choose number of <b>vertical</b> image', 'not-captcha').' <img src="'.$notcaptcha_url.'lib/vertical_sign.png" alt="^" border="0" /></small></div>
	<div style="clear:both;padding:4px;">
		<img id="imgonePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?n=1&i=1&r='.time().'" align="left" />
		<select name="imgoneField">
			<option value="">'.__('- select -', 'not-captcha').'</option>' . "\n";
				for ($i = 1; $i <= $this->notcaptcha_init['anglescnt']; $i++) {
					echo '<option value='.($i-1).'>'.$i.'</option>' . "\n";
				}
echo '
		</select>
	</div>
	<div style="clear:both;padding:4px;">
		<img id="imgtwoPict" src="'.$notcaptcha_url.'lib/notcaptcha.php?n=1&i=2&r='.time().'" align="left" />
		<select name="imgtwoField">
			<option value="">'.__('- select -', 'not-captcha').'</option>' . "\n";
				for ($i = 1; $i <= $this->notcaptcha_init['anglescnt']; $i++) {
					echo '<option value='.($i-1).'>'.$i.'</option>' . "\n";
				}
echo '
		</select>
	</div>
	<div style="clear:both;padding:4px;">
		<img id="imgthreePict" src="'.$notcaptcha_url.'lib/notcaptcha.php?n=1&i=3&r='.time().'" align="left" />
		<select name="imgthreeField">
			<option value="">'.__('- select -', 'not-captcha').'</option>' . "\n";
				for ($i = 1; $i <= $this->notcaptcha_init['anglescnt']; $i++) {
					echo '<option value='.($i-1).'>'.$i.'</option>' . "\n";
				}
echo '
		</select>
	</div>
	</div>
</noscript>
<img src="'.$notcaptcha_url.'lib/blank.gif" width="1" height="1" />
<!-- Leave the link - make internet cleaner! -->
<small>Human test by <a href="http://notcaptcha.webjema.com/">Not Captcha</a></small>
<!-- Оставьте ссылку - сделайте интернет чище! -->
<!-- NotCaptcha FORM end -->

<script type="text/javascript">
  <!--
  function refresh_security_image() {

	var blank = new String("'.$notcaptcha_url.'lib/blank.gif");
	document.getElementById("imgonePict").src = blank;
	document.getElementById("imgtwoPict").src = blank;
	document.getElementById("imgthreePict").src = blank;
	
  	var new_url1 = new String("'.$notcaptcha_url.'lib/notcaptcha.php?i=1&r='.time().'");
  	var new_url2 = new String("'.$notcaptcha_url.'lib/notcaptcha.php?i=2&r='.time().'");
  	var new_url3 = new String("'.$notcaptcha_url.'lib/notcaptcha.php?i=3&r='.time().'");

	// we need a random new url so this refreshes
	new_url1 = new_url1 + Math.floor(Math.random() * 1000);
	new_url2 = new_url2 + Math.floor(Math.random() * 1000);
	new_url3 = new_url3 + Math.floor(Math.random() * 1000);
	
	document.getElementById("imgonePict").src = new_url1;
	document.getElementById("imgtwoPict").src = new_url2;
	document.getElementById("imgthreePict").src = new_url3;
  }
  -->
 </script>
 
';
echo '</div>';
}

        return true;
} // addCaptchaToRegisterForm

// this function checks the captcha posted with registration on vers 2.5+
function checkCaptchaRegisterPostNew($errors) {
   global $notcaptcha_path;

   if (strlen($_POST['imgoneField']) < 1) {
                $errors->add('captcha_blank', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('Please complete the Captcha.'));
                return $errors;
   } else {
        $captcha_code = trim(strip_tags($_POST['captcha_code']));
   }
   
   if ($_SESSION['nc_tries'] > 3) {
		$_SESSION['nc_tries']++;
    	$errors->add('captcha_wrong', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('You have made too many attempts to enter Captcha. Press your browser`s back button, <b>reload images</b> and try again.', 'not-captcha'));
   }
   
   	if ($_SESSION['nc_session'] != session_id()) {
		$errors->add('captcha_wrong', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('Incorrect session. Please, reload web-page.', 'not-captcha'));
	}

   if (($_REQUEST['imgoneField'] == $_SESSION['nc_answer_1']) &&
	   ($_REQUEST['imgtwoField'] == $_SESSION['nc_answer_2']) &&
	   ($_REQUEST['imgthreeField'] == $_SESSION['nc_answer_3'])) 
   {
	  // ok can continue
	  	unset($_SESSION['nc_session']);
	  	unset($_SESSION['nc_answer_1']);
	  	unset($_SESSION['nc_answer_2']);
	  	unset($_SESSION['nc_answer_3']);
	  	unset($_SESSION['nc_tries']);
	  	unset($_SESSION['nc_used_images']);
   } else {
   		$_SESSION['nc_tries']++;
    	$errors->add('captcha_wrong', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('That Captcha was incorrect.'));
   }
   return($errors);
} // checkCaptchaRegisterPostNew

// this function checks the captcha posted with registration pre vers 2.5
function checkCaptchaRegisterPost() {
   global $errors, $notcaptcha_path;

   if (strlen($_POST['imgoneField']) < 1) {
                $errors['captcha_blank'] = '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('Please complete the Captcha.');
                return $errors;
   } else {
       $captcha_code = trim(strip_tags($_POST['captcha_code']));
       
   if ($_SESSION['nc_tries'] > 3) {
		$_SESSION['nc_tries']++;
    	$errors->add('captcha_wrong', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('You have made too many attempts to enter Captcha. Press your browser`s back button, <b>reload images</b> and try again.', 'not-captcha'));
   }
   
   	if ($_SESSION['nc_session'] != session_id()) {
		$errors->add('captcha_wrong', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('Incorrect session. Please, reload web-page.', 'not-captcha'));
	}

      if (($_REQUEST['imgoneField'] == $_SESSION['nc_answer_1']) &&
	   ($_REQUEST['imgtwoField'] == $_SESSION['nc_answer_2']) &&
	   ($_REQUEST['imgthreeField'] == $_SESSION['nc_answer_3'])) 
   		{
	  	// ok can continue
	  	unset($_SESSION['nc_session']);
	  	unset($_SESSION['nc_answer_1']);
	  	unset($_SESSION['nc_answer_2']);
	  	unset($_SESSION['nc_answer_3']);
	  	unset($_SESSION['nc_tries']);
	  	unset($_SESSION['nc_used_images']);
   		} else {
 	  		$_SESSION['nc_tries']++;
    		$errors->add('captcha_wrong', '<strong>'.__('ERROR', 'not-captcha').'</strong>: '.__('That Captcha was incorrect.', 'not-captcha'));
   		}
   }

} // checkCaptchaRegisterPost


// this function checks the captcha posted with the comment
function checkCaptchaCommentPost($comment) {
    global $user_ID, $notcaptcha_path;

    // added for compatibility with WP Wall plugin
    // this does NOT add NotCaptcha to WP Wall plugin,
    // it just prevents the "Error: You did not enter a Captcha phrase." when submitting a WP Wall comment
    if ( function_exists('WPWall_Widget') && isset($_POST['wpwall_comment']) ) {
        // skip capthca
        return $comment;
    }

    // skip the captcha if user is loggged in and the settings allow
    if (isset($user_ID) && intval($user_ID) > 0 && $this->get_settings('not_captcha_perm') == 'true') {
       // skip the NotCaptcha display if the minimum capability is met
       if ( current_user_can( $this->get_settings('not_captcha_perm_level') ) ) {
               // skip capthca
               return $comment;
        }
    }

    // Skip captcha for trackback or pingback
    if ( $comment['comment_type'] != '' && $comment['comment_type'] != 'comment' ) {
               // skip capthca
               return $comment;
    }

    if (strlen($_POST['imgoneField']) < 1) {
        wp_die( __('Error: You did not enter a Captcha. Press your browsers back button and try again.', 'not-captcha'));
    }
    
    if ($_SESSION['nc_tries'] > 3) {
		$_SESSION['nc_tries']++;
    	wp_die( __('Error: You have made too many attempts to enter Captcha. Press your browser`s back button, <b>reload images</b> and try again.', 'not-captcha'));
	}
	
	if ($_SESSION['nc_session'] != session_id()) {
		wp_die( __('Error: Incorrect session. Please, reload web-page.', 'not-captcha'));
	}
    
    if (($_REQUEST['imgoneField'] == $_SESSION['nc_answer_1']) &&
	   ($_REQUEST['imgtwoField'] == $_SESSION['nc_answer_2']) &&
	   ($_REQUEST['imgthreeField'] == $_SESSION['nc_answer_3'])) 
     {
	  // ok can continue
	  	unset($_SESSION['nc_session']);
	  	unset($_SESSION['nc_answer_1']);
	  	unset($_SESSION['nc_answer_2']);
	  	unset($_SESSION['nc_answer_3']);
	  	unset($_SESSION['nc_tries']);
	  	unset($_SESSION['nc_used_images']);
		return($comment);
     } else {
     	$_SESSION['nc_tries']++;
    	wp_die( __('Error: You entered in the wrong Captcha. Press your browsers back button and try again.', 'not-captcha'));
   	 }
} // checkCaptchaCommentPost

function unset_not_captcha_options () {
  delete_option('not_captcha_perm');
  delete_option('not_captcha_perm_level');
  delete_option('not_captcha_comment');
  delete_option('not_captcha_comment_class');
  delete_option('not_captcha_register');
  delete_option('not_captcha_rearrange');
} // unset_not_captcha_options


/*** INIT ***/
function init() {
	global $notcaptcha_path;
   	if (function_exists('load_plugin_textdomain')) {
      	load_plugin_textdomain('not-captcha', false, dirname(plugin_basename(__FILE__)) );
   	}
   	require_once($notcaptcha_path.'/lib/initcaptcha.php');
   	$this->notcaptcha_init = $notcaptcha;
   	$_SESSION['nc_addnoise'] = $this->get_settings('not_captcha_addnoise');
   	
   	$_SESSION['nc_back_r'] = $this->get_settings('not_captcha_back_r');
   	$_SESSION['nc_back_g'] = $this->get_settings('not_captcha_back_g');
   	$_SESSION['nc_back_b'] = $this->get_settings('not_captcha_back_b');
   	
   	if (!isset($_SESSION['nc_answer_1'])) {
   		$_SESSION['nc_session'] = session_id();
   	}
} // init

} // end of class
} // end of if class

// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );


if (class_exists("notCaptcha")) {
 $not_captcha_obj = new notCaptcha();
}


if (isset($not_captcha_obj)) {

	$notcaptcha_url = WP_PLUGIN_URL . '/wp-notcaptcha/';
  	$notcaptcha_path = WP_PLUGIN_DIR . '/wp-notcaptcha';


  //Actions
  add_action('init', array(&$not_captcha_obj, 'init'));
  add_action('wp_head', array(&$not_captcha_obj, 'add_css')); // include the stylesheet and JS
  add_action('login_head', array(&$not_captcha_obj, 'add_css')); // include the stylesheet and JS
  add_action('admin_menu', array(&$not_captcha_obj,'add_tabs'),1);


  if ($not_captcha_obj->get_settings('not_captcha_comment') == 'true') {
     // set the minimum capability needed to skip the captcha if there is one
     add_action('comment_form', array(&$not_captcha_obj, 'addCaptchaToCommentForm'), 1);
     add_filter('preprocess_comment', array(&$not_captcha_obj, 'checkCaptchaCommentPost'), 1);
  }


  if ($not_captcha_obj->get_settings('not_captcha_register') == 'true') {
    add_action('register_form', array(&$not_captcha_obj, 'addCaptchaToRegisterForm'), 1);

    if (version_compare(get_bloginfo('version'), '2.5' ) >= 0)
       add_filter('registration_errors', array(&$not_captcha_obj, 'checkCaptchaRegisterPostNew'), 1);
    else
       add_filter('registration_errors', array(&$not_captcha_obj, 'checkCaptchaRegisterPost'), 1);
  }

  // uncomment if you want the settings deleted when this plugin is deactivated
  //register_deactivation_hook(__FILE__, array(&$not_captcha_obj, 'unset_not_captcha_options'), 1);
} // if (isset($not_captcha_obj))

?>