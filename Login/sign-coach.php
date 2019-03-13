<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if($_POST['mname']!=""&&isset($_POST['msex'])&&$_POST['msex']!=""&&$_POST['date']!=""&&$_POST['phone']!=""
&&$_POST['Madress']!=""&&$_POST['Mhobby']!=""&&$_POST['pwd2']!=""&&$_POST['email']&&isset($_POST['experience'])&&$_POST['experience']!=""){
    $phone=$_POST['phone'];
    $sql1="select * from pscoach where phone=$phone";
    $rs1=$link->query($sql1);
    $aff1=$link->affected_rows;
    if($aff1>0){
        $fc->alrt('该手机号已经注册过，请等待通过','Login-coach.html');
    }else{
        $sql2="select * from c_coach where phone=$phone";
        $rs2=$link->query($sql2);
        $aff2=$link->affected_rows;
        if($aff2>0){
            $fc->alrt('该号已经是教练，请前去登录','Login.html');
        }else{
            $name=$_POST['mname'];
            $msex=$_POST['msex'];
            $date=$_POST['date'];
            $Madress=$_POST['Madress'];
            $Mhobby=$_POST['Mhobby'];
            $pwd2=$_POST['pwd2'];
            $email=$_POST['email'];
            $jy=$_POST['experience'];
            $sql="insert into pscoach(name,sex,bir,phone,pw,address,nice,email,experience) values('$name','$msex','$date','$phone','$pwd2','$Madress','$Mhobby','$email','$jy')";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('提交申成功！请等待一段时间经管理员审核,您可以逛逛我们的网站，多做些了解，谢谢！','Login.html');
            }else{
                $fc->alrt('提交失败！请您认真填写注册信息','Login-coach.html');
            }
        }
    }
}else{
    $fc->alrt('请将信息填写完整','Login-coach.html');
}



?>