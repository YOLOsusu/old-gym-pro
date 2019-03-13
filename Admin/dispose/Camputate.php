<body  bgcolor="#F1F1F1">
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=1;
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
		$ID=$_GET['ID'];
		$sql="delete from c_coach where CID=$ID";
		//$sql="call Cout($ID);";
		$rs=$link->query($sql);
		$aff=$link->affected_rows;
		if($aff>0){
			$fc->alrt('删除成功','../A-cxx.php');
        }else{
		    $fc->alrt('删除失败','../A-cxx.php');
		}
	}else{
        $fc->alrt('不好意思您没有使用该功能的权限!','../A-cxx.php');
    }
}else{ 
$fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

?>
</body>
