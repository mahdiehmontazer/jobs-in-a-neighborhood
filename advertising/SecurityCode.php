<?php
session_start();
$text='QWERTYUIOPASDFGHJKLZXCVBNM123456789';
$code='';
for($i=1;$i<=6;$i++)
{
$start=rand(0,strlen($text));
$code.=substr($text,$start,1);
}
$_SESSION['code']=$code;

$code=$_SESSION['code'];
$font_size=30;
$image_width=62;
$image_height=30;
$image=imagecreate($image_width,$image_height);
imagecolorallocate($image,220,220,220);
$text_color= imagecolorallocate($image,0,0,0);
imagestring($image,$font_size,5,6,$code,$text_color);
header('Content-type:image/jpeg');
imagejpeg($image);
?>
