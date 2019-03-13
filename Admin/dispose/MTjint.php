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
        $ID=$_GET['ID'];
        if($_POST['ys']!=""&&$_POST['yc']!=""&&$_POST['sj']!=""&&
        $_POST['sg']!=""&& $_POST['tz']!=""&& $_POST['tzzs']!=""&&
        $_POST['jxl']!=""&&$_POST['zfl']!=""&&$_POST['lb']!=""&&$_POST['rb']!=""&&
        $_POST['jw']!=""&& $_POST['yw']!=""&& $_POST['tw']!=""&&$_POST['ytb']!=""&&$_POST['dtl']!=""&&$_POST['dtr']!=""&&$_POST['cname']!=""){
            $ys=$_POST['ys'];
            $yc=$_POST['yc'];
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
            $sql1="update amedical set YS='$ys',YC='$yc',SG='$sg',TZ='$tz',TZZS='$tzzs',
            ZFL='$zfl',JXL='$jxl',LB='$lb',RB='$rb',JW='$jw',YW='$yw',TW='$tw',YTB='$ytb',DTR='$dtr',DTL='$dtl',Cname='$cname' where ID=$ID";
            $rs1=$link->query($sql1);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('修改体检表成功','../TJ-Modify.php?ID='.$ID);
            }else{
                $fc->alrt('修改体检表失败失败','../TJ-Modify.php?ID='.$ID);
            }
        }else{
            $fc->alrt('请将信息填写完整','../TJ-Modify.php?ID='.$ID);
        }
    }else{
	    $fc->alrt('不好意思您没有使用该功能的权限！','../M-tixx.php');
	}
}else{ 
     $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}        
?>