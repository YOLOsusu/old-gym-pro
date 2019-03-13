
<div  class="top">
<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
    $dd=$_COOKIE['ID'];
    $cun="select * from s_staff where SID=$dd";
    $cun1=$link->query($cun);
    $guo=$cun1->fetch_array();
?>
     <div class="dimg"><img src="../image/<?=$guo["img"]?>" width="90" height="90"><a href="A-Smodify.php" class="now" > <span>修改</span></a></div> 
	 <h1>健身中心会员管理系统后台管理&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

</div>
<?php
}else{ 
    $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}
?>