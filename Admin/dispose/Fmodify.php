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
		$ID=$_GET['ID'];
		if($_POST['fname']!=""&&$_POST['content']!=""&&$_POST['datetime']!=""&&isset($_POST['address'])&&$_POST['address']!=""&&
		isset($_POST['coach'])&&$_POST['coach']!=""&&$_POST['fdate']!=""&&$_POST['mcount']!=""&&$_POST['money']!=""&&
		isset($_POST['state'])&&$_POST['state']!=""){	
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
				$fc->alrt('该地点该时间段已有安排课程！','../F-modify.php?ID='.$ID);
				die;
			}else{   
				$sql1="update f_cla set Fname='$name',Fconten='$content',Ftime='$datetime',GID='$address',Fdate='$fdate',Mcoute='$mcount',Fmoney='$money'  where FID='$ID' " ;
				$rs1=$link->query($sql1);
				$aff1=$link->affected_rows;
				if($aff1>0){
					$sql2="update f_tcing set CID='$coach',state='$state' where FID='$ID'";
					$rs2=$link->query($sql2);
					$aff2=$link->affected_rows;
					if($aff2>0){
						$fc->alrt('修改课程信息成功！','../A-clb.php');
					}else{
						$fc->alrt('该课程未添加教练！','../F-modify.php?ID='.$ID);
					}			
				}else{
					$fc->alrt('添加失败,请认真填写修改信息！','../A-cbtan.php?ID='.$ID);
				}
			}
		}else{
			$fc->alrt('请将信息填写完整','../F-modify.php?ID='.$ID);
		}
    }else{
	$fc->alrt('不好意思您没有使用该功能的权限！','../A-clb.php');
    }
}else{ 
 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}	

?>
