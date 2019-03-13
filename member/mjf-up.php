<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func(); 
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
    if(isset($_POST['mm'])&&$_POST['mm']!=""){
        $FID=$_GET['FID'];
        $mm=$_POST['mm'];
            if($mm==$_COOKIE['PW']){
                $MID=$_COOKIE['ID'];
                $sq2="select * from f_tcing where FID=$FID and state=0";
                $rs2=$link->query($sq2);
                $aff2=$link->affected_rows;
                if($aff2>0){
                    $a2=1;
                    $sql="update m_study set Fei='$a2' where MID=$MID and FID=$FID";
                    $rs=$link->query($sql);
                    $aff=$link->affected_rows;
                    if($aff>0){

                        $fc->alrt('缴费成功','memter-cls.php');

                    }else{

                        $fc->alrt('提交失败！请您认真填写缴费信息','memter-cls.php?FID='.$FID);

                    }
                }else{
                    $fc->alrt('该课已经开，已无法进行缴费','memter-cls.php');
                }
            }else{
                $fc->alrt('密码错误！','memter-jf.php?FID='.$FID);
            }
    }else{
        $fc->alrt('请填写完毕信息','memter-jf.php?FID='.$FID);
    }
}else{ 
    $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}