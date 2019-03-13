<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_POST['XZ'])&&$_POST['XZ']!=""&&$_POST['pwd2']!=""){
    $input_UN=$_GET['ph'];
    $input_name=$_POST['XZ'];
    $pw=$_POST['pwd2'];
	if($input_name=='1'){
        $table='member';
    }
    else if($input_name=='2'){
        $table='coach';
    }
    else if($input_name=='3'){
    $table='employee';
    }
    else if($input_name=='4'){
        $table='staff';
    }
    $sql="select * from $table where phone='$input_UN'";
    $rs=$link->query($sql);
    $row=$rs->fetch_assoc();
    $aff=$link->affected_rows;
    if($aff>0){
        $sql1="update $table set password='$pw' where phone='$input_UN'";
        $rs1=$link->query($sql1);
        $aff1=$link->affected_rows;
        if($aff1>0){
            $fc->alrt('修改成功，请登录','Login.html');
        }else{
            $fc->alrt('修改失败','Formm.php'); 
        }
    }else{
        $fc->alrt('账号与用户类型不符','Formm.php');

    }
}else{
    $fc->alrt('请将信息填写完整','Formm.php');
}



?>