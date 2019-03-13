<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func(); 
if(isset($_POST['ka'])&&$_POST['ka']!=""&&isset($_POST['ph'])&&$_POST['ph']!=""&&isset($_POST['mm'])&&$_POST['mm']!=""){
    $ka=$_POST['ka'];
    $ph=$_POST['ph']; 
    $mm=$_POST['mm'];
    $sql1="select * from m_member where phone='$ph'";
    $rs1=$link->query($sql1);
    $row1=$rs1->fetch_assoc();
    $aff1=$link->affected_rows;
    if($aff1>0){
        if($mm==$row1['password']){
            $sql3="select * from member_one";
            $rs3=$link->query($sql3);
            $row3=$rs3->fetch_assoc();
            $term=1;
            if($ka==1){
                $true="+1months";
                $fee=$row3['Mfee'];
            }else if($ka==2){
                $true="+3months";
                $fee=($row3['Mfee']*3)-100;
            }elseif($ka==3){
                 $true="+1years";
                 $fee=((($row3['Mfee']*3)-100)*2)-100;
            }
            $b=strtotime($row1['Medate']);//echo $row1['Medate'];//2018-01-03数据库内时间（date型数据）
            $b1=strtotime(date("Y-m-d"));
            $a=$b-$b1;
            $d=$a/(24*60*60);
            if($d>=0){
           // echo date("Y-m-d",$a);//2018-01-03转换为时间戳的时间
            $a1=strtotime("$true",$b);
            $a2=date("Y-m-d",$a1);
           // echo $a2;//2018-02-03增加一个月后的时间
            //die;
            }elseif($d<0){
                $a1=strtotime("$true",$b1);
                $a2=date("Y-m-d",$a1);
            }
            $sql="update m_member set Medate='$a2' where phone=$ph";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            $MID=$_COOKIE['ID'];
            $xfdate=date("Y-m-d G:i:s");
            $sql4="insert into member_fee(MID,term,Fee,XFdate) value('$MID','$term','$fee','$xfdate')";
            $rs4=$link->query($sql4);
            $aff4=$link->affected_rows;
            if($aff>0&&$aff4>0){

                $fc->alrt('续费成功，请查看到期时间','member-xf.php');

            }else{

                $fc->alrt('提交失败！请您认真填写续费信息','member-xf.php');

            }
        }else{
            $fc->alrt('密码错误！','member-xf.php');
        }
    }else{
        $fc->alrt('该手机号出错','member-xf.php');
        
    }
}else{
    $fc->alrt('请填写完毕信息','member-xf.php');
}
?>