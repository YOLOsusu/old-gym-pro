
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
		if($_POST['lm']!=""){
			$name=$_POST['lm'];
			$sql="select * from column1 where CUname=$name";
			$rs=$link->query($sql);
			$aff=$link->affected_rows;
			if($aff>0){
				$fc->alrt('该栏目名重复','../column.php');
				die;
			}else {   
				$sql1="insert into column1(CUname) values('$name')" ;
				$rs1=$link->query($sql1);
				$aff1=$link->affected_rows;
				if($aff1>0){
					$fc->alrt('添加栏目成功','../column.php');
				}else{
					$fc->alrt('添加栏目失败，请注意认真填写信息','../column.php');
				}
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