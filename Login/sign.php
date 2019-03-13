<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if($_POST['mname']!=""&&isset($_POST['msex'])&&$_POST['msex']!=""&&$_POST['date']!=""&&$_POST['phone']!=""
&&$_POST['Madress']!=""&&$_POST['Mhobby']!=""&&$_POST['pwd2']!=""&&$_POST['email']){
    $phone=$_POST['phone'];
    $sql1="select * from enroll where phone=$phone";
    $rs1=$link->query($sql1);
    $aff1=$link->affected_rows;
    if($aff1>0){
        $fc->alrt('该手机号已经注册过，请前往支付费用','Ltrue.html');
    }else{
        $sql2="select * from m_member where phone=$phone";
        $rs2=$link->query($sql2);
        $aff2=$link->affected_rows;
        if($aff2>0){
            $fc->alrt('该号已经是会员，请前去登录','Login.html');
        }else{
            $name=$_POST['mname'];
            $msex=$_POST['msex'];
            $date=$_POST['date'];
            $Madress=$_POST['Madress'];
            $Mhobby=$_POST['Mhobby'];
            $pwd2=$_POST['pwd2'];
            $email=$_POST['email'];
            $time=date('Y-m-d');
            $sql="insert into enroll(name,sex,phone,address,hobby,pw,email,bir,Medate) values('$name','$msex','$phone','$Madress','$Mhobby','$pwd2','$email','$date','$time')";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('提交申成功！请前往支付费用','Ltrue.html');
            }else{
                $fc->alrt('提交失败！请您认真填写注册信息','Login-sign1.html');
            }
        }
    }
}else{
    $fc->alrt('请将信息填写完整','Login-sign1.html');
}



?>