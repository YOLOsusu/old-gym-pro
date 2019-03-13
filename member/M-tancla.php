<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
session_start();
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func(); 
$MID=$_GET['MID'];
$sql1="select * from m_member where MID=$MID";
$rs1=$link->query($sql1);
$row1=$rs1->fetch_assoc();
$b=strtotime($row1['Medate']);//echo $row1['Medate'];//2018-01-03数据库内时间（date型数据）
$b1=strtotime(date("Y-m-d"));
$a=$b-$b1;
$d=$a/(24*60*60);
if($d>=0){
	if(isset($_POST['class1'])&&$_POST['class1']!=""){
		$FID=$_POST['class1'];
		$sql="select * from m_study where MID=$MID and FID=$FID";
			$rs=$link->query($sql);
			$aff=$link->affected_rows;
			if($aff>0){
				$fc->alrt('该课程已选','member-xcls.php?MID='.$MID);
				die;
			}else{  
				$sql3="select * from f_cla where FID=$FID";
				$rs3=$link->query($sql3);
				$row3=$rs3->fetch_assoc();
				$Fdate=$row3['Fdate'];
				$week=$Fdate/6;
				$num=$week*7;
				if($d>$num){
					$date=date("Y-m-d G:i:s");
					$sql2="insert into m_study(FID,MID,FBtime) values('$FID','$MID',$date)";
					$rs2=$link->query($sql2);
					$aff2=$link->affected_rows;
					if($aff2>0){
						$fc->alrt('选课成功，请前去缴费','memter-jf.php?FID='.$FID);
					}else{
							$fc->alrt('选课失败','member-xcls.php');
					}
				}else{
					$fc->alrt('按每周最多6个课时，你的会员天数不够，请续费','member-xf.php');
				}
			}
	}else{
		$fc->alrt('请购选课程','member-xcls.php?');
	}
}else{
	$fc->alrt('会员已过期，请续费','member-xf.php'); 
}
?>
</body>
</html>