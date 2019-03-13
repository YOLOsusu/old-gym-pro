<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>健身中心登录界面</title>
</head>

<?php
include('../connect/connect.php');
include('../fount/fount.php');
session_start();
$fc = new func();

@$input_name=$_POST['XZ'];

if($input_name){
	$yzm=$_POST['yzm'];
    if($yzm==$_SESSION['vcode']){
		$input_UN=$_POST['zh'];
		$input_UP=$_POST['mm'];
		

		if($input_name=='mer'){
			$table='member';
			$wang='../member/member.php';
			$id='MID';
		}
		else if($input_name=='coa'){
			$table='coach';
			$wang='../coach/coach.php';
			$id='CID';
		}
		else if($input_name=='epl'){
		$table='employee';
		$wang='../employee/employee.php';
		$id='ID';
		}
		else if($input_name=='sta'){
			$table='staff';
			$wang='../Admin/Amian.php';
			$id='SID';
		}



		$sql="select * from $table where phone='$input_UN'";
		$rs=$link->query($sql);
		$row=$rs->fetch_assoc();
		$aff=$link->affected_rows;


		if($aff>0){
			if($input_UP==$row['password']){
				setcookie("ID",$row[$id],time()+3600,'/');
				setcookie("PW",$row['password'],time()+3600,'/');
				$fc->alrt1($wang);
				
			}else{
				$fc->alrt('密码错误','Login.html');
			}
		}else{
			$fc->alrt('账号错误','Login.html');
		}
	}else{
		$fc->alrt('验证码错误','Login.html');
	}		
}else{
      $fc->alrt('请选择用户类型','Login.html');
}




?>

</html>
