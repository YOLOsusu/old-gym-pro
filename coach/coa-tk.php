<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
$FID=$_GET['FID'];
$MID=$_GET['MID'];
$sql4="delete from m_study where MID='$MID' and FID='$FID'";
$rs4=$link->query($sql4);
$aff=$link->affected_rows;
if($aff>0){
  $fc->alrt('退课成功','Mjf.php?FID='.$FID);
}else{
  $fc->alrt('退课失败','Mjf.php?FID='.$FID);
}
?>