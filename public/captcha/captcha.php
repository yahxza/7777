<?php
	session_start();
	$string = "";
	for ($i = 0; $i < 7; $i++)
		$string .= chr(rand(97, 122));
	
	$_SESSION['rand_code'] = $string;

	$dir = "fonts/";
	
	$image = imagecreatetruecolor(135, 62);
	
	$color = imagecolorallocate($image, 255, 255, 255);
	$white = imagecolorallocate($image, 255, 74, 74);

	imagefilledrectangle($image,0,0,399,99,$white);
	imagettftext ($image, 20, 0, 7, 37, $color, $dir."verdana.ttf", $_SESSION['rand_code']);

	header("Content-type: image/png");
	imagepng($image);
?>