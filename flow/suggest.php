<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
@$moer=$_POST['cla'];
@$better=$_POST['ccap'];
$qb=$_GET['qb'];
$who=$_POST['shfe'];
$sql="insert into suggest(more,better,lebe,who) values('$moer','$better','$qb','$who')";
$rs=$link->query($sql);
$aff=$link->affected_rows;
if($aff>0){
    $fc->alrt('提交成功','moer.php?me='.$qb);
}else{
    $fc->alrt('提交失败','moer.php?me='.$qb);

}




?>