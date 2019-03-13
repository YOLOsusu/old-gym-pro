<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
$ys=$_POST['ys'];
$yc=$_POST['yc'];
$sj=$_POST['sj'];
$sg=$_POST['sg'];
$tz=$_POST['tz'];
$tzzs=$_POST['tzzs'];
$zfl=$_POST['zfl'];
$jxl=$_POST['jxl'];
$lb=$_POST['lb'];
$rb=$_POST['rb'];
$jw=$_POST['jw'];
$yw=$_POST['yw'];
$tw=$_POST['tw'];
$ytb=$_POST['ytb'];
$dtl=$_POST['dtl'];
$dtr=$_POST['dtr'];
$cname=$_POST['cname'];
$MID=$_GET['ID'];
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $sql1="insert into amedical(MID,YS,YC,SJ,SG,TZ,TZZS,ZFL,JXL,LB,RB,JW,YW,TW,YTB,DTR,DTL,Cname) 
    value('$MID','$ys','$yc','$sj','$sg','$tz','$tzzs','$zfl','$jxl','$lb','$rb','$jw','$yw','$tw','$ytb','$dtr','$dtl','$cname')";
    $rs1=$link->query($sql1);
    $aff=$link->affected_rows;
    if($aff>0){
        $fc->alrt('提交成功','coach-tj.php');

    }else{
        $fc->alrt('提交失败','Tjlu.php?ID='.$MID);
    }
}else{
    $fc->alrt('登录超时，请重新登录','../Login/Login.html');
}
?>