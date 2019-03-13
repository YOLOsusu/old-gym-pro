<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php'); 
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=8;
    $Jg=$ap->apover("$AD","$int");//权限查询
    //权限判断
    if($Jg==1){
        if($_POST['MID']!=""&&$_POST['ys']!=""&&$_POST['yc']!=""&&$_POST['sj']!=""&&
        $_POST['sg']!=""&& $_POST['tz']!=""&& $_POST['tzzs']!=""&&
        $_POST['jxl']!=""&&$_POST['zfl']!=""&&$_POST['lb']!=""&&$_POST['rb']!=""&&
        $_POST['jw']!=""&& $_POST['yw']!=""&& $_POST['tw']!=""&&$_POST['ytb']!=""&&$_POST['dtl']!=""&&$_POST['dtr']!=""&&$_POST['cname']!=""){
            $MID=$_POST['MID'];
            $ys=$_POST['ys'];
            $yc=$_POST['yc'];
            $sj=$_POST['sj'];
            $sg=$_POST['sg'];
            $tz=$_POST['tz'];
            $tzzs=$_POST['tzzs'];
            $jxl=$_POST['jxl'];
            $zfl=$_POST['zfl'];
            $lb=$_POST['lb'];
            $rb=$_POST['rb'];
            $jw=$_POST['jw'];
            $yw=$_POST['yw'];
            $tw=$_POST['tw'];
            $ytb=$_POST['ytb'];
            $dtl=$_POST['dtl'];
            $dtr=$_POST['dtr'];
            $cname=$_POST['cname'];
            $sql1="insert into amedical(MID,YS,YC,SJ,SG,TZ,TZZS,ZFL,JXL,LB,RB,JW,YW,TW,YTB,DTR,DTL,Cname) 
            value('$MID','$ys','$yc','$sj','$sg','$tz','$tzzs','$zfl','$jxl','$lb','$rb','$jw','$yw','$tw','$ytb','$dtr','$dtl','$cname')";
            $rs1=$link->query($sql1);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('添加体检信息成功','../M-tixx.php');

            }else{
                $fc->alrt('添加体检信息失败','../MTJtan.php');
            }
        }else{
            $fc->alrt('请将信息填写完整','../MTJtan.php');
        }
    }else{
	    $fc->alrt('不好意思您没有使用该功能的权限！','../M-tixx.php');
	}
}else{ 
     $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}           
?>