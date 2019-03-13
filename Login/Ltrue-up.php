<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
$ph=$_POST['ph'];
$mm=$_POST['mm'];
$sql1="select * from enroll where phone='$ph'";
$rs1=$link->query($sql1);
$row1=$rs1->fetch_assoc();
$aff1=$link->affected_rows;
if($aff1>0){
    if($mm==$row1['pw']){
        $ka=$_POST['ka'];
        $sql="update enroll set Mtrue='$ka' where phone=$ph";
        $rs=$link->query($sql);
        $aff=$link->affected_rows;
        if($aff>0){

            $fc->alrt('提交成功！请等待审核！','Ltrue.html');

        }else{

            $fc->alrt('提交失败！请您认真填写注册信息','Login-sign1.html');

        }
    }else{
        $fc->alrt('密码错误！','Ltrue.html');
    }
}else{
    $fc->alrt('该手机号还未注册，请前往注册','Login-sign1.html');
    
}



?>