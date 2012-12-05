<?php
/*
* myWebNotCaptcha 1.3.1
* Created by WebJema 2009
* www.webjema.com
*/

if(!isset($_SESSION)) {
	session_start();
}

# gallery folder
$notcaptcha['notcaptcha_imgdir'] = 'gallery';

# angles of images
$notcaptcha['notcaptcha_angles'] = array(0, 60, 90, 135, 180, 225, 270, 300);

# NOTCAPTCHA image size (width and height)
$notcaptcha['notcaptcha_imagesize'] = 60;

# NOTCAPTCHA colors (RGB, 0-255)
$notcaptcha['notcaptcha_delim_color'] = array(0, 0, 0);

# JPEG quality of NOTCAPTCHA image (bigger is better quality, but larger file (image) size)
$notcaptcha['notcaptcha_jpeg_quality'] = 80;

/* end of notcaptcha_config.php */