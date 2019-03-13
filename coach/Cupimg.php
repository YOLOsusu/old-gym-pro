<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
    $ID=$_COOKIE['ID'];
    if(isset($_GET['pw'])){
        if($_POST['jpw']!=""&&$_POST['pwd2']!=""&&$_POST['pwd1']!=""){
            $jpw=$_POST['jpw'];
            if($jpw==$_COOKIE['PW']){
                $pw2=$_POST['pwd2'];
                $sql3="update c_coach set password=$pw2 where CID=$ID";
                $rs3=$link->query($sql3);
                $aff3=$link->affected_rows;
                if($aff3>0){
                    $fc->alrt('修改密码成功','Cmoer.php');
        
                }else{
                $fc->alrt('修改密码失败','Cmoer.php');
                }

            }else{
                $fc->alrt('旧密码不正确','Cmoer.php');
            }
        }else{
            $fc->alrt('请将信息填完整','Cmoer.php');
        }
    }else if(isset($_GET['url'])){
        $url=$_GET['url'];
        $sql="update c_coach set img='$url' where CID=$ID";
        $rs=$link->query($sql);
        $aff=$link->affected_rows;
        if($aff>0){
            $fc->alrt('修改头像成功','Cimg.php');

        }else{
        $fc->alrt('修改头像失败','Cimg.pghp');
        }
    }   
}else{ 
    $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}
?>
