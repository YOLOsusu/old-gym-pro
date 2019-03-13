<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=5;
    $Jg=$ap->apover("$AD","$int");//权限查询
    //权限判断
    if($Jg==1){
        if(isset($_GET['ID'])&&$_GET['ID']!=0){
            $id=$_GET['ID'];
            $shan="delete from hsports where ID=$id";
            $resul=$link->query($shan);
            $aff1=$link->affected_rows;
            if($aff1>0){
                $fc->alrt('删除热门课程文章成功','../acticle.php');
            }else{
                 $fc->alrt('删除热门课程文章失败','../acticle.php');
            }
        }
    }else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../acticle.php');
		}
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

?>