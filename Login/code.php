<?php
session_start();
header("Content_type:image/png");
$im=imagecreate(44,18);
$bg=imagecolorallocate($im,0,0,0);
imagefill($im,0,0,$bg);
$vcodes="";
for($i=0;$i<4;$i++){
$fontc=imagecolorallocate($im,255,255,255);
$autonum=rand(1,9);
imagestring($im,5,2+$i*10,1,$autonum,$fontc);
$vcodes=$vcodes.$autonum;

}
$_SESSION['vcode']=$vcodes;
imagepng($im);
imagedestroy($im);




?>