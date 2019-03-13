
<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){ 
    $ID=$_COOKIE['ID'];
    $sql1="select * from m_member where MID=$ID";
    $rs1=$link->query($sql1);
    $row1=$rs1->fetch_assoc();
    $b=strtotime($row1['Medate']);//echo $row1['Medate'];//2018-01-03数据库内时间（date型数据）
    $b1=strtotime(date("Y-m-d"));
    $a=$b-$b1;
    $d=$a/(24*60*60);
    if($d>=0){
        if(isset($_POST['Mname'])&&$_POST['Mname']!=""&&isset($_POST['msex'])&&$_POST['msex']!=""
        &&isset($_POST['date2'])&&$_POST['date2']!=""&&isset($_POST['phone'])&&$_POST['phone']!=""
        &&isset($_POST['Maddress'])&&$_POST['Maddress']!=""&&isset($_POST['hobby'])&&$_POST['hobby']!=""){
            $name=$_POST['Mname'];
            $sex=$_POST['msex'];
            $bir=$_POST['date2'];
            $pho=$_POST['phone'];
            $address=$_POST['Maddress'];
            $hobby=$_POST['hobby'];
            //$sql="call Mxg('$ID','$name','$sex','$bir','$pho','$mjdate','$address','$hobby','$pw1')";
            $sql="update m_member set Mname='$name',Msex='$sex',Mbir='$bir',phone='$pho',Maddress='$address',Mhobby='$hobby' where MID='$ID'";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
                if($aff>0){
                    $fc->alrt('修改成功','member-xx.php?MID='.$ID);

                }else{
                $fc->alrt('修改失败','member-xx.php?MID='.$ID);
                }
        }else{
            $fc->alrt('请认真填完信息','M-modefy.php?MID='.$ID);  
        }
    }else{
        $fc->alrt('会员已过期，请续费','member-xf.php'); 
    }
}else{ 
    $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}
?>

