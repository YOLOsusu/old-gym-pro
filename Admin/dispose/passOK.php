<body  bgcolor="#F1F1F1">
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php'); 
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
            $AD=$_COOKIE['ID'];
            $int=0;
            $Jg=$ap->apover("$AD","$int");
            if($Jg==1){
                if($_POST['MID']!=""){
                    $MID=$_POST['MID'];
                    $ID=$_GET['ID'];
                    $url="../image/7777.png";
                    $sql="select * from m-member where MID='$MID'";
                    $rs=$link->query($sql);
                    $aff=$link->affected_rows;
                    if($aff>0){
                        $fc->alrt('改会员号已被占用','../pass.php');
                        die;
                    }else{
                        $sql1="select * from enroll where ID='$ID'";
                        $rs1=$link->query($sql1);
                        $row=$rs1->fetch_assoc();
                        $mjdate=date("Y-m-d G:i:s");
                        $name=$row['name'];
                        $sex=$row['sex'];
                        $bir=$row['bir'];
                        $pho=$row['phone'];
                        $pw=$row['pw'];
                        $add=$row['address'];
                        $hb=$row['hobby'];
                        $ka=$row['Mtrue'];
                        $sql3="select * from member_one";
                        $rs3=$link->query($sql3);
                        $row3=$rs3->fetch_assoc();
                        $term=0;
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
                        //echo $row1['Medate'];//2018-01-03正式成为会员的时间（date型数据）
                        $a=strtotime($mjdate);
                       // echo date("Y-m-d",$a);//2018-01-03转换为时间戳的时间
                        $a1=strtotime("$true",$a);
                        $a2=date("Y-m-d",$a1);
                       // echo $a2;//2018-02-03增加一个月后的时间
                        //die;
                        $sql2="insert into m_member(MID,Mname,Msex,Mbir,phone,Mjdate,password,Maddress,Mhobby,img,Medate) values('$MID','$name','$sex','$bir','$pho','$mjdate','$pw','$add','$hb','$url','$a2')";
                        $rs2=$link->query($sql2);
                        $aff2=$link->affected_rows;
                        $sql4="insert into member_fee(MID,term,Fee,XFdate) value('$MID','$term','$fee','$mjdate')";
                        $rs4=$link->query($sql4);
                        $aff4=$link->affected_rows;
                        if($aff2>0&&$aff4>0){
                            $sql3="delete from enroll where ID='$ID'";
                            $rs3=$link->query($sql3);
                            $fc->alrt('通过验证','../A-mxx.php');
                            }else{
                                $fc->alrt('验证失败，请注意认真填写信息','../pass.php');
                             }
                     }
                }else{
                    $fc->alrt('验证失败，请输入会员号','../pass.php');
                }
             }else{
                 $fc->alrt('不好意思您没有使用该功能的权限','../A-mxx.php');
             }
 }else{ 
    $fc->alrt('登录超时，请重新登录','../../Login/Login.html');
}

?>
</body>
