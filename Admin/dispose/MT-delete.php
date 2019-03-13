<?php
include('GLpower.php'); 
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=8;
    $Jg=$ap->apover("$AD","$int");//权限查询
    //权限判断
    if($Jg==1){
        if(isset($_GET['ID'])&&$_GET['ID']!=0){
            $id=$_GET['ID'];
            $shan="delete from amedical where ID=$id";
            $resul=$link->query($shan);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('删除体检信息成功','../M-tixx.php');
    
            }else{
                $fc->alrt('删除体检信息失败','../M-tixx.php');
            }
        }else{
            $fc->alrt1('../M-tixx.php');
        }
    }else{
	    $fc->alrt('不好意思您没有使用该功能的权限！','../M-tixx.php');
	}
}else{ 
     $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}   
?>