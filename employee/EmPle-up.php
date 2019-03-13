
<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
    if(isset($_GET['url'])){
        $ID1=$_GET['ID'];
        $url=$_GET['url'];
        $sql2="update employee set img='$url' where ID=$ID1 ";
        $rs2=$link->query($sql2);
        $aff2=$link->affected_rows;
        if($aff2>0){
            $fc->alrt('修改头像成功','EmPle-img.php');

        }else{
        $fc->alrt('修改头像失败','EmPle-img.php');
        }
    }else if(isset($_GET['pw'])){
        $jpw=$_POST['jpw'];
        if($jpw==$_COOKIE['PW']){
            $pw2=$_POST['pwd2'];
            $sql3="update employee set password=$pw2";
            $rs3=$link->query($sql3);
            $aff3=$link->affected_rows;
            if($aff3>0){
                $fc->alrt('修改密码成功','Emoer.php');
    
            }else{
            $fc->alrt('修改密码失败','Emoer.php');
            }

        }else{
            $fc->alrt('旧密码不正确','Emoer.php');
        }
    }else{
        $ID=$_GET['ID'];
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $pho=$_POST['ph'];
        $address=$_POST['add'];
        $sql="update employee set name='$name',Esex='$sex',phone='$pho',address='$address' where ID=$ID";
        $rs=$link->query($sql);
        $aff=$link->affected_rows;
        if($aff>0){
            $fc->alrt('修改成功','EmPle-xx.php');

        }else{
        $fc->alrt('修改失败','EmPle-xx.php');
        }
    }
}else{ 
    $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}
?>

