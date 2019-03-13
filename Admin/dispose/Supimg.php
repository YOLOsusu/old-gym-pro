<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
$ID=$_COOKIE['ID'];
$url=$_GET['url'];
$sql="update s_staff set img='$url'";
$rs=$link->query($sql);
$aff=$link->affected_rows;
if($aff>0){
	$fc->alrt('修改头像成功','../A-Smodify.php');

}else{
 $fc->alrt('修改头像失败','../A-Smodify.php');
 }
 
}else{ 
    $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
?>
