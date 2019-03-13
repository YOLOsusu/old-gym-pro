
<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if($_POST['name']!=""&&$_POST['sex']!=""&&$_POST['bir']!=""&&$_POST['ph']!=""&&$_POST['address']!=""&&$_POST['hy']!=""){
    $CID=$_GET['ID'];
    $cname=$_POST['name'];
    $sex=$_POST['sex'];
    $bir=$_POST['bir'];
    $ph=$_POST['ph'];
    $add=$_POST['address'];
    $hy=$_POST['hy'];
    if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
        $sql1="update c_coach set Cname='$cname',Csex='$sex',Cbir='$bir',phone='$ph',Caddress='$add',Cnice='$hy' where CID=$CID ";
        $rs1=$link->query($sql1);
        $aff=$link->affected_rows;
        if($aff>0){
            $fc->alrt('提交成功','coach-xx.php');

        }else{
            $fc->alrt('提交失败','coach-xx.php');
        }
    }else{
        $fc->alrt('登录超时，请重新登录','../Login/Login.html');
    }
}else{
    $fc->alrt('请将信息填完整','coach-md.php');
}
?>



