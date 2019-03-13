<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=2;
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
		if($_POST['fname']!=""&&$_POST['content']!=""&&$_POST['datetime']!=""&&isset($_POST['address'])&&$_POST['address']!=""&&
		isset($_POST['coach'])&&$_POST['coach']!=""&&$_POST['fdate']!=""&&$_POST['mcount']!=""&&$_POST['money']!=""&&
		isset($_POST['state'])&&$_POST['state']!=""&&$ID=$_POST['FID']!=""){	
			$ID=$_POST['FID'];
			$name=$_POST['fname'];
			$content=$_POST['content'];
			$datetime=$_POST['datetime'];
			$address=$_POST['address'];
			$coach=$_POST['coach'];
			$fdate=$_POST['fdate'];
			$mcount=$_POST['mcount'];
			$money=$_POST['money'];
			$state=$_POST['state'];
			$sql="select * from f_cla where Ftime='$datetime' and GID='$address'";
			$rs=$link->query($sql);
			$aff=$link->affected_rows;
			if($aff>0){
				$fc->alrt('该地点该时间段已有安排课程','../A-cbtan.php');
				die;
			}else {   
				$sql1="insert into f_cla(FID,Fname,Fconten,Ftime,GID,Fdate,Mcoute,Fmoney) values('$ID','$name','$content','$datetime','$address','$fdate','$mcount','$money')" ;
				$rs1=$link->query($sql1);
				$aff1=$link->affected_rows;
				if($aff1>0){
					$sql2="insert into f_tcing(FID,CID,state) values('$ID','$coach','$state')";
					$rs2=$link->query($sql2);
					$aff2=$link->affected_rows;
					if($aff2>0){
						$fc->alrt('添加成功','../A-clb.php');
					}else{
						$fc->alrt('该课程未添加教练','../A-cbtan.php');		
					}
				}else{
					$fc->alrt('添加失败,课程号不可重复','../A-cbtan.php');
				}
			}
		}else{
			$fc->alrt('请将信息填写完毕','../A-cbtan.php');		
		}
    }else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../A-clb.php');
		}
}else{ 
     $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}	
?>