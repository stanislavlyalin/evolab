<?php
/*
* myWebNotCaptcha 1.3.1
* Created by WebJema 2009
* See notcaptcha_config.php for customizing
* www.webjema.com
*/

require_once(dirname(__FILE__).'/notcaptcha_config.php');

$notcaptcha['size'] 	 = $notcaptcha['notcaptcha_imagesize'];
$notcaptcha['anglescnt'] = count($notcaptcha['notcaptcha_angles']);
$_SESSION['nc_used_images'] = array();

/* end of initcaptcha.php */