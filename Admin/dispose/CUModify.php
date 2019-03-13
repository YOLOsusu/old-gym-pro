<body  bgcolor="#F1F1F1">
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=5;
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
		$ID=$_GET['ID'];
		if($_POST['name']!=""){
			$CUname=$_POST['name'];
			$sql="update column1 set CUname='$CUname' where ID='$ID'";
			$rs=$link->query($sql);

			$aff=$link->affected_rows;
			if($aff>0){
				$fc->alrt('修改栏目成功','../column.php');

			}else{
			$fc->alrt('修改栏目失败','../column.php');

			}
		}else{
			$fc->alrt('请将信息填写完整','../column.php');
		}
	}else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../column.php');
		}
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

?>
</body>