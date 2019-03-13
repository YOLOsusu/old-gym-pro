<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
            $ID=$_GET['ID'];
            $AD=$_COOKIE['ID'];
            $int=0;
            $Jg=$ap->apover("$AD","$int");
            if($Jg==1){
                if($_POST['Mname']!=""&&isset($_POST['msex'])&&$_POST['msex']!=""&&$_POST['date2']!=""&&$_POST['phone']!=""&&$_POST['Maddress']!=""&&$_POST['hobby']!=""
                &&$_POST['mjdate']!=""&&$_POST['medate']!=""){
                    $name=$_POST['Mname'];
                    $sex=$_POST['msex'];
                    $bir=$_POST['date2'];
                    $pho=$_POST['phone'];
                    $mjdate=date("Y-m-d G:i:s");
                    $address=$_POST['Maddress'];
                    $hobby=$_POST['hobby'];
                    $pw=substr($pho,-4,4);
                    $mjdate=$_POST['mjdate'];
                    $medate=$_POST['medate'];
                    //修改会员信息
                    $sql="update m_member set Mname='$name',Msex='$sex',Mbir='$bir',phone='$pho',Mjdate='$mjdate',Maddress='$address',Mhobby='$hobby',password='$pw',Mjdate='$mjdate',Medate='$medate' where MID='$ID'";
                    //$sql="call Mxg('$ID','$name','$sex','$bir','$pho','$mjdate','$address','$hobby','$pw')";
                    $rs=$link->query($sql);
                    $aff=$link->affected_rows;
                    if($aff>0){
                        $fc->alrt('修改会员成功','../A-mxx.php');

                    }else{
                    $fc->alrt('修改会员失败','../M-modify.php?ID='.$ID);
                    }
                }else{
                    $fc->alrt('请将信息填写完整','../M-modify.php?ID='.$ID);
                }
            }else{
                $fc->alrt('不好意思您没有使用该功能的权限','../A-mxx.php');
            }
}else{ 
     $fc->alrt('登录超时，请重新登录','../../Login/Login.html');
}
?>