<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
//判断是否已登录
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=6;
    $Jg=$ap->apover("$AD","$int");//权限查询
    //权限判断
    if($Jg==1){
        //删除操作
        if(isset($_GET['ID'])&&$_GET['ID']!=0){
            $id=$_GET['ID'];
            $shan="delete from suggest where ID=$id";
            $resul=$link->query($shan);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('删除已阅意见成功','../Infor.php');
            }else{
               $fc->alrt('删除意见失败','../Infor.php');
            }
        }else{
            $fc->alrt1('../Infor.php');
        }
    //未有权限立即返回上一页面
    }else{
        $fc->alrt('不好意思您没有使用该功能的权限！','../Infor.php');
    }
//未登录立即跳转登录页面
}else{ 
     $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
       

?>