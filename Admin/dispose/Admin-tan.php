<meta content="charset=utf-8" />
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
            $AD=$_COOKIE['ID'];
            $int=7;
            $Jg=$ap->apover("$AD","$int");
			if($Jg==1){
                if($_POST['ID']!=""&&$_POST['Sname']!=""&&$_POST['sex']!=""&&$_POST['phone']!=""&&$_POST['pw']!=""){
                    $id=$_POST['ID'];
                    $name=$_POST['Sname'];
                    $sex=$_POST['sex'];
                    $ph=$_POST['phone'];
                    $pw=$_POST['pw'];
                    $url="../image/777.jpg";
                    $sql1="insert into s_staff(Sname,Ssex,phone,password,SID,img) values('$name','$sex','$ph','$pw','$id','$url')";
                    $rs1=$link->query($sql1);
                    $aff1=$link->affected_rows;
                    if($aff1>0){
                        $fc->alrt('添加管理员成功','../Admin-tb.php');
                    }else{
                        $fc->alrt('添加管理员失败，请注意认真填写信息','../Admin-tb.php');
                    }
                }else{
                    $fc->alrt('请将信息填写完整','../Admin-tb.php');
                }
            }else{
                $fc->alrt('不好意思您没有使用该功能的权限','../Adj-tb.php');
            }
}else{ 
    $fc->alrt('登录超时，请重新登录','../../Login/Login.html');
}
