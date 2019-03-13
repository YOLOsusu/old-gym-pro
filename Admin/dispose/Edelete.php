<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
//查看是否登录
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=4;//器材管理的编号
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
        $id=$_GET['ID'];
        $shan1="delete from apparatus where AID=$id";
        $resul=$link->query($shan1);
        $aff1=$link->affected_rows;
        if($aff1>0){
             $fc->alrt('删除器材信息成功！','../Ekit.php');
        }else{
             $fc->alrt('删除器材信息失败！','../Ekit.php');
        }
    }else{
        $fc->alrt('不好意思您没有使用该功能的权限!','../Ekit.php');
    }

}else{ 
      $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}




?>