<meta content="charset=utf-8" />
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
         $id=$_GET['ID'];
   if($_POST['hy']!=""&&$_POST['jl']!=""&&$_POST['cc']!=""&&$_POST['fj']!=""
   &&$_POST['qc']!=""&&$_POST['tm']!=""&&$_POST['yj']!=""&&$_POST['qx']!=""&&$_POST['tj']!=""&&
  $_POST['dj']!=""&&$_POST['jl']!=""){
        $hy=$_POST['hy'];
        $jl=$_POST['jl'];
        $cc=$_POST['cc'];
        $fj=$_POST['fj'];
        $qc=$_POST['qc'];
        $tm=$_POST['tm'];
        $yj=$_POST['yj'];
        $qx=$_POST['qx'];
        $tj=$_POST['tj'];
        $ad=$_GET['ad'];
        $dj=$_POST['dj'];
        $yg=$_POST['jl'];
        if($ad==1){
            $sql1="update power set Mgl='$hy',Cgl='$jl',Fgl='$cc',Ggl='$fj',Egl='$qc',Tgl='$tm',Sgl='$yj',Agl='$qx',TLu='$tj',DJgl='$dj',SEgl='$yg' where ID=$id";
            $rs1=$link->query($sql1);
            $aff1=$link->affected_rows;
            if($aff1>0){
                $fc->alrt('修改权限成功','../Admin-Po.php?ID='.$id);
            }else{
                $fc->alrt('修改权限失败，请注意认真填写信息','../Admin-tb.php');
            }
        }else if($ad==0){
            $sql="insert into power(ID,Mgl,Cgl,Fgl,Ggl,Egl,Tgl,Sgl,Agl,TLu,DJgl,SEgl) value('$id','$hy','$jl','$cc','$fj','$qc','$tm','$yj','$qx','$tj','$dj','$yg')";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('添加权限成功','../Admin-Po.php?ID='.$id);
            }else{
                $fc->alrt('添加权限失败，请注意认真填写信息','../Admin-tb.php');
            }
        }
    }else{
        $fc->alrt('请将信息填写完整','../Admin-Po.php?ID='.$id);
    }
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
