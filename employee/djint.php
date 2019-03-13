<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
        $ID=$_COOKIE['ID'];
        $MID=$_GET['ID'];
        $date=date('Y-m-d');
        $sql="select * from checkin where Jdate='$date' and MID=$MID";
        $rs=$link->query($sql);
        $aff=$link->affected_rows;
        if($aff>0){
            $fc->alrt('今日该会员已经登记','EmPle-dj.php');
        }else{
            $sql2="insert into checkin(MID,Jdate,ID) value('$MID','$date','$ID')";
            $rs2=$link->query($sql2);
            $aff2=$link->affected_rows;
            if($aff2>0){
                $fc->alrt1('EmPle-dj.php');

            }else{
                $fc->alrt('登记失败','EmPle-dj.php');
            }
        }
    
}else{ 
     $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}
?>