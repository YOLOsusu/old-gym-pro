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
		if($_POST['GID']!=""&&$_POST['gname']!=""&&$_POST['gaddress']!=""&&$_POST['gcontent']!=""&&isset($_FILES["file"])&&$_FILES["file"]["name"]!=""){
			$ID=$_POST['GID'];
			$name=$_POST['gname'];
			$address=$_POST['gaddress'];
			$content=$_POST['gcontent'];
			if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png"|| $_FILES["file"]["type"]=="image/jpg") && $_FILES["file"]["size"]<1024000)
			{
				$filename = $_FILES["file"]["name"];
				//转换编码格式
				$filename = iconv("UTF-8","gb2312",$filename);
				$url="../image/".$filename;
			}
			$sql="select * from g_gym where GID='$ID'";
			$rs=$link->query($sql);
			$aff=$link->affected_rows;
			if($aff>0){
				$fc->alrt('该编号已被使用','../A-gmtan.php');
				die;
			}else {   
				$sql1="insert into g_gym(GID,Gname,Gcomten,Jaddress,img) values('$ID','$name','$content','$address','$url')" ;
				$rs1=$link->query($sql1);
				$aff1=$link->affected_rows;
				if($aff1>0){
					$fc->alrt('添加房间成功','../A-gymb.php');
				}else{
					$fc->alrt('添加房间失败，请注意认真填写信息','../A-gmtan.php');
				}		
			}
		}else{
			$fc->alrt('请将信息填写完毕','../A-gmtan.php');
		}
	}else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../A-gymb.php');
	}
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}	
	

?>