
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
        if(isset($_GET['pw'])&&$_GET['pw']==1){
        if(isset($_POST['jpw'])&&$_POST['jpw']!=""&&isset($_POST['pwd1'])&&$_POST['pwd1']!=""&&isset($_POST['pwd2'])&&$_POST['pwd2']!=""){
                $jpw=$_POST['jpw'];
                if($jpw==$_COOKIE['PW']){
                    $pw2=$_POST['pwd2'];
                    $sql3="update m_member set password=$pw2 where MID=$ID";
                    $rs3=$link->query($sql3);
                    $aff3=$link->affected_rows;
                    if($aff3>0){
                        $fc->alrt('修改密码成功','Mmoer.php');
            
                    }else{
                    $fc->alrt('修改密码失败','Mmoer.php');
                    }
                }else{
                    $fc->alrt('旧密码不正确','Mmoer.php');
                }
            }else{
                $fc->alrt('请将填写完整的信息','Mmoer.php');
            }
        }elseif(isset($_GET['url'])&&$_GET['url']!=""){
            $url=$_GET['url'];
            $sql="update m_member set img='$url' where MID=$ID";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('修改头像成功','Mimg.php');

            }else{
            $fc->alrt('修改头像失败','Mimg.php');
            }
        }
    }else{
        $fc->alrt('会员已过期，请续费','member-xf.php'); 
    }
}else{ 
    $fc->alrt('登录超时，请重新登录!','../Login/Login.html');
}
?>
