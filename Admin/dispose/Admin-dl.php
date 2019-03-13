<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
    $id=$_GET['ID'];
    $sql="select * power where ID=$id";
    $rs=$link->query($sql);
    $af=$link->affected_rows;
    if($af>0){
        $shan="delete from s_staff where SID=$id";
        $resul=$link->query($shan);
        $aff=$link->affected_rows;
        $shan1="delete from power where ID=$id";
        $re=$link->query($shan1);
        $aff1=$link->affected_rows;
        if($aff>0&&$aff1){
            $fc->alrt('删除管理员成功','../Admin-tb.php');
        }else{
            $fc->alrt('删除管理员失败','../Admin-tb.php');
        }
    }else{
        $shan2="delete from s_staff where SID=$id";
        $resu2=$link->query($shan2);
        $aff2=$link->affected_rows;
        if($aff2>0){
            $fc->alrt('删除管理员成功','../Admin-tb.php');
        }else{
             $fc->alrt('删除管理员失败','../Admin-tb.php');
        }
    }
        
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

?>