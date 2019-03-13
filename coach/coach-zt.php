
<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();

if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $CID=$_COOKIE['ID'];
    $FID=$_GET['ID'];
    $state=$_GET['kw'];
    $sql1="update fteaching set state='$state' where CID='$CID' and FID='$FID'";
    $rs1=$link->query($sql1);
    $aff=$link->affected_rows;
    if($aff>0){
        $fc->alrt('操作成功','coach-cb.php');

    }else{
        $fc->alrt('操作失败','coach-cb.php');
    }
}else{
    $fc->alrt('登录超时，请重新登录','../Login/Login.html');
}
?>

