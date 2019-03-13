<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=3;
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
		$ID=$_GET['ID'];
		$name=$_POST['gname'];
		$address=$_POST['gaddress'];
		$content=$_POST['gcontent'];
		/*$sql="select * from g_gym where Gname='$name'";
		$rs=$link->query($sql);
		$aff=$link->affected_rows;
		if($aff>0){
			$fc->alrt('该名称已被使用','../A-gmtan.php');
			die;
		}else {  */ 


		if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png"|| $_FILES["file"]["type"]=="image/jpg") && $_FILES["file"]["size"]<1024000)
		{
			
			$filename = $_FILES["file"]["name"];
			//转换编码格式
			$filename = iconv("UTF-8","gb2312",$filename);
			$url="../image/".$filename;
		}

        $sql1="update g_gym set Gname='$name',Gcomten='$content',Jaddress='$address',img='$url' where GID='$ID'";
		$rs1=$link->query($sql1);
		$aff1=$link->affected_rows;
		if($aff1>0){
			$fc->alrt('修改房间成功','../A-gymb.php.php');
		}else{
			$fc->alrt('修改房间失败，请注意认真填写信息','../G-modify.php?ID='.$ID);
		}
			/*			
			}
			*/
	}else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../A-gymb.php');
	}
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

?>