<?php
/*
* myWebNotCaptcha 1.3.1
* Created by WebJema 2009
* See notcaptcha_config.php for customizing
* www.webjema.com
*/

require(dirname(__FILE__).'/notcaptcha_config.php');
if ($_SESSION['nc_session'] != session_id()) {
	die('session error');
}

$imgNum = (int)$_REQUEST['i'];
$angles = $notcaptcha['notcaptcha_angles'];
// set random start position
// no shuffle for consequentially rotation
$end = rand(0,count($angles));
for ($i=0;$i < $end;$i++) {
	$val = array_shift($angles);
	$angles[] = $val;
}
// save correct answer
$_SESSION['nc_answer_' . $imgNum] = array_search(0, $angles);
$_SESSION['nc_tries'] = 0;

// load images from gallery
$images = array();
$imgdir_absolute = dirname(__FILE__).'/../'.$notcaptcha['notcaptcha_imgdir'];
if ($handle = opendir($imgdir_absolute)) {
	while (false !== ($file = readdir($handle))) {
		if (preg_match('/\.png$/i', $file)) {
			$images[]=$imgdir_absolute.'/'.$file;
		}
	} // while
    closedir($handle);
} // if

// shuffle it
if (is_array($images) && count($images) > 0) {
	shuffle($images);
}

// find not used image
if (!is_array($_SESSION['nc_used_images'])) {
	$_SESSION['nc_used_images'] = array();
}
while (count($_SESSION['nc_used_images']) > 3) {
	array_shift($_SESSION['nc_used_images']);
} // while
do {
	$img_file = array_shift($images);
} while (in_array($img_file, $_SESSION['nc_used_images']) === true);
$_SESSION['nc_used_images'][] = $img_file;

// calculate frame size
$start = strrpos($img_file, '_');
$end = strrpos($img_file, '.');
$imginfo = explode('x', substr($img_file, $start + 1, $end - $start - 1) );
$key = rand(1, $imginfo[0]);
$size = $imginfo[1];
$startPos = ($key-1) * $size + ($key-1);

$imgf=imagecreatefrompng($img_file);
imagealphablending($imgf, true);

$img=imagecreatetruecolor($size, $size);
imagealphablending($img, true);
$background	=	imagecolorallocate($img, $_SESSION['nc_back_r'], $_SESSION['nc_back_g'], $_SESSION['nc_back_b']);
$delim		=	imagecolorallocate($img, $notcaptcha['notcaptcha_delim_color'][0], $notcaptcha['notcaptcha_delim_color'][1], $notcaptcha['notcaptcha_delim_color'][2]);

// draw image
imagefilledrectangle($img, 0, 0, $size, $size, $background);
// add noise under image

if ($_SESSION['nc_addnoise'] == 'true') {
	$x1 = rand(0, $notcaptcha['notcaptcha_imagesize']);
	$x2 = rand(0, $notcaptcha['notcaptcha_imagesize']);
	$y1 = rand(0, round($notcaptcha['notcaptcha_imagesize']/2));
	$y2 = rand(round($notcaptcha['notcaptcha_imagesize']/2), $notcaptcha['notcaptcha_imagesize']);	
	$w = rand(1,5);
	for ($i = 0; $i <= $w; $i++) {
		imageline ( $img , $x1+$i , $y1+$i , $x2+$i , $y2+$i , imagecolorallocate($img, rand(50,150), rand(50,150), rand(50,150)) );
	}
}

imagecopy($img, $imgf, 1, 1, $startPos, 1, $size, $size);

$pos = 0;
$counter = 1;
$imgRes=imagecreatetruecolor($notcaptcha['notcaptcha_imagesize']*count($notcaptcha['notcaptcha_angles'])+count($notcaptcha['notcaptcha_angles'])-1, $notcaptcha['notcaptcha_imagesize']);
foreach ($angles as $angle) {
	$img2 = imagerotate( $img, $angle, $background );
	$width = imagesx($img2);
	$height = imagesy($img2);
	imagecopyresampled( $imgRes, $img2, $pos, 0, abs(round(($size - $width)/2)), abs(round(($size - $height)/2)), $notcaptcha['notcaptcha_imagesize'], $notcaptcha['notcaptcha_imagesize'], $size, $size);
	imageline( $imgRes, $pos+$notcaptcha['notcaptcha_imagesize'], 1, $pos+$notcaptcha['notcaptcha_imagesize'], $notcaptcha['notcaptcha_imagesize'], $delim);
	
	if ($_SESSION['nc_addnoise'] == 'true') {
		// noise block
		$x1 = rand(0, $notcaptcha['notcaptcha_imagesize']);
		$x2 = rand(0, $notcaptcha['notcaptcha_imagesize']);
		$y1 = rand(0, round($notcaptcha['notcaptcha_imagesize']/2));
		$y2 = rand(round($notcaptcha['notcaptcha_imagesize']/2), $notcaptcha['notcaptcha_imagesize']);	
		$w = rand(3,6);
		for ($i = 0; $i <= $w; $i++) {
			imageline ( $imgRes , $pos + $x1+$i , $y1+round($i/2) , $pos + $x2+$i , $y2+round($i/2) , 
				imagecolorallocate($imgRes, rand(200,250), rand(200,250), rand(200,250)) );
		}
		
		$dx = rand(0, $notcaptcha['notcaptcha_imagesize'] / 3);
		$dw = round($dx + rand(0, $notcaptcha['notcaptcha_imagesize'] / 3));
		if (rand(1,10) > 5) $dx = -$dx;
		$dy = rand(0, $notcaptcha['notcaptcha_imagesize'] / 2);
		$dh = round($dy + rand(0, $notcaptcha['notcaptcha_imagesize'] / 2));
		if (rand(1,10) > 5) $dy = -$dy;
		imagefilledellipse ( $imgRes , $pos + round($notcaptcha['notcaptcha_imagesize']/2) + $dx , round($notcaptcha['notcaptcha_imagesize']/2) + $dy , $dw , $dh, imagecolorallocatealpha($imgRes, rand(100,250), rand(100,250), rand(100,250), rand(30, 80)));
		// end of noise block
	} // nc_addnoise
	
	if ($_REQUEST['r']) {
		imagestring($imgRes, 2, $pos + 3, 1, $counter, $delim);
		$counter++;
	}
	$pos += $notcaptcha['notcaptcha_imagesize'] + 1;
} // foreach

if(function_exists("imagejpeg")){
	header("Content-Type: image/jpeg");
	imagejpeg($imgRes, null, $notcaptcha['notcaptcha_jpeg_quality']);
}else if(function_exists("imagegif")){
	header("Content-Type: image/gif");
	imagegif($imgRes);
}else if(function_exists("imagepng")){
	header("Content-Type: image/x-png");
	imagepng($imgRes);
}

/* end of notcaptcha.php */