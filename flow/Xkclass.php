<?php
include("../connect/connect.php");
include("../fount/fount.php");
$fc = new func();
  $FID=$_GET['FID'];
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $id=$_COOKIE['ID'];
    $sql="select * from m_member where MID=$id";
    $rs=$link->query($sql);
    $aff=$link->affected_rows;
    if($aff>0){
        $row=$rs->fetch_assoc();  
        $b=strtotime($row['Medate']);//echo $row1['Medate'];//2018-01-03数据库内时间（date型数据）
        $b1=strtotime(date("Y-m-d"));
        $a=$b-$b1;
        $d=$a/(24*60*60);
        if($d>=0){ 
                $sql1="select * from m_study where MID=$id and FID=$FID";
                $rs1=$link->query($sql1);
                $aff1=$link->affected_rows;
                if($aff1>0){
                    $fc->alrt('该课程已选','Flass.php?ID='.$FID);
                    die;
                }else{
                    $sql3="select * from f_cla f join fteaching f1 on(f.FID=f1.FID) where f.FID=$FID and f1.state='0'";
                    $rs3=$link->query($sql3);
                    $aff3=$link->affected_rows;
                    if($aff3>0){
                        $row3=$rs3->fetch_assoc();
                        $Fdate=$row3['Fdate'];
                        $week=$Fdate/6;
                        $num=$week*7;
                        if($d>$num){
                            $sql4="select count(*) from m_study where FID=$FID";
                            $rs4=$link->query($sql4);
                            $row4=$rs4->fetch_assoc();  
                            if($row4['count(*)']==$row3['Mcoute']){
                                $fc->alrt('人数已满','Flass.php?ID='.$FID);
                            }else{
                                $sql2="insert into m_study(FID,MID) values('$FID','$id')";
                                $rs2=$link->query($sql2);
                                $aff2=$link->affected_rows;
                                if($aff2>0){
                                    $fc->alrt('选课成功','../member/memter-cls.php?MID='.$id);
                                }else{
                                        $fc->alrt('选课失败','Flass.php?ID='.$FID);
                                }
                            }
                        }else{
                            $fc->alrt('按每周最多6个课时，你的会员天数不够，请续费','../member/member-xf.php');
                        }
                    }else{
                        $fc->alrt('该课程已开或已上完，请选择未开课程','Flass.php?ID='.$FID);
                    }
                }
        }else{
             $fc->alrt('会员已过期，请续费','../member/member-xf.php'); 
        }

    }else{

        $fc->alrt('请使用会员账号报名','Flass.php?ID='.$FID);
    }
}else{
    $fc->alrt('请先登录','../Login/Login.html');
}



?>
