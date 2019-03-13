<body  bgcolor="#F1F1F1">
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
//账号登录判断
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=1;
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
        if($_POST['CID']!=""){
            $CID=$_POST['CID'];
            $ID=$_GET['CID'];
            $sql="select * from c_coach where CID='$CID'";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('改教练号已被占用','../pass.php');
                die;
            }else{
                $sql1="select * from pscoach where ID='$ID'";
                $rs1=$link->query($sql1);
                $row=$rs1->fetch_assoc();
                $mjdate=date("Y-m-d G:i:s");
                $name=$row['name'];
                $sex=$row['sex'];
                $bir=$row['bir'];
                $pho=$row['phone'];
                $pw=$row['pw'];
                $add=$row['address'];
                $hb=$row['nice'];
                if($sex=="男"){
                    $url="../image/jianshen.jpg";
                }else{
                    $url="../image/jianshen1.jpg";
                }
                $sql2="insert into c_coach(CID,Cname,Csex,Cbir,phone,Cjdate,password,Caddress,Cnice,img) values('$CID','$name','$sex','$bir','$pho','$mjdate','$pw','$add','$hb','$url')";
                $rs2=$link->query($sql2);
                $aff1=$link->affected_rows;
                if($aff1>0){
                    $sql3="delete from pscoach where ID='$ID'";
                    $rs3=$link->query($sql3);
                    $fc->alrt('通过验证','../A-cxx.php');
                }else{
                    $fc->alrt('验证失败，请注意认真填写信息','../pass.php');                   
                }
            }
        }else{
            $fc->alrt('请填写教练编号','../pass.php');   
        }
    }else{
        $fc->alrt('不好意思您没有使用该功能的权限！','../A-cxx.php');
    }
}else{ 
$fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}


?>
</body>