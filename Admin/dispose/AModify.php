<meta content="charset=utf-8" />
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
        $id=$_GET['ID'];
        $qb=$_GET['qb'];
        if($qb==1){
            $url='../Admin-Md.php?ID='.$id;
        }else if($qb==0){
            $url='../A-Smodify.php?fe=2';
        }
        if($_POST['Sname']!=""&&$_POST['sex']!=""&&$_POST['phone']!=""&&$_POST['pw']!=""){
            $name=$_POST['Sname'];
            $sex=$_POST['sex'];
            $ph=$_POST['phone'];
            $pw=$_POST['pw'];
            $sql1="update s_staff set Sname='$name',Ssex='$sex',phone='$ph',password='$pw' where SID=$id";
            $rs1=$link->query($sql1);
            $aff1=$link->affected_rows;
            if($aff1>0){
                $fc->alrt('修改管理员成功',$url);
            }else{
                $fc->alrt('修改管理员失败，请注意认真填写信息',$url);
            }
        }else{
            $fc->alrt('请将信息填写完整',$url);
        }
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
