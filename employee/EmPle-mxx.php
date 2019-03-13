<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link   href="../css-php/MCcss.css" rel="stylesheet" type="text/css" />
</head>
<?php

include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
  $phone=$_COOKIE['ID'];
$sql="select * from employee where ID='$phone'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();
?>

<body bgcolor="#CCCCCC">
<div class="all" >
  <div class="dtop" style="background: url(../image/top.png)">
  <marquee>
  <span style="font-size:24px; color:#8080FF; font-weight:bold;">欢迎员工<span style="color:rgb(187, 187, 250);">(<?=$row['name']?>)</span>登陆</span>
  </marquee>
  </div>
<div class="dmidou">
  <div  class="dleft">
     <div  class="dimg"> <img src="../image/<?=$row['img']?>" width="80" height="80"><a href="EmPle-img.php"  class="now"><span>修改</span></a></div>
    <a  href="EmPle-xx.php">  <div class="dli"> 员工信息</div> </a>
	   <a href="EmPle-dj.php"><div class="dli" > 会员登记</div></a>  
      <div class="drr" > 会员查询</div>
	  <a href="Emoer.php"  ><div class="dli" > 更多</div> </a>
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
 </div>

 <div  class="dright">
    <div class="MD">
    今日已登记会员<br>
    <?php
    $date=date('Y-m-d');
    $tj="select * from m_member m join checkin c on(m.MID=c.MID) where c.Jdate='$date' ";
    $jg=$link->query($tj); 
    $aff=$link->affected_rows;
    if($aff>0){
       
    ?>
        <div style="float:left;width:200px;height:300;">日期：<?=$date?></div>
        <div style="width:280px;height:300;float:left">
        <?php
        while($JGG=$jg->fetch_assoc()){
          echo $JGG['Mname']."、";

        }
        ?>
        </div>
    <?php
    }
    ?>
    
    </div>
    <div class="MD">
    <form action="EmPle-mxx.php" method="post">
      姓名：<input type="text" name="name"><input type="submit" value="查询">
    </form>
    <form action="EmPle-mxx.php" method="post">
      会员号：<input type="text" name="DID"><input type="submit" value="查询">
    </form>
    <hr>
    <?PHP
    if(isset($_POST['name'])&&$_POST['name']!=""){
      $name=$_POST['name'];
      $sql2="select * from m_member where Mname='$name'";
      $rs2=$link->query($sql2);
      $aff2=$link->affected_rows;
      if($aff2>0){
         $row2=$rs2->fetch_assoc();
         $b=strtotime($row2['Medate']);
         $b1=strtotime(date("Y-m-d"));
         $a=$b-$b1;
         $d=$a/(24*60*60);
         if($d>=0){
           $color="#000000";
           $str="距离过期还有".$d."天";
         }else{
          $color="red";
          $str="已过期";
         }
        
         ?>
         会员号：<?=$row2['MID']?><br>
         姓名：<?=$row2['Mname']?><br>
         性别：<?=$row2['Msex']?><br>
         号码：<?=$row2['phone']?><br>
         <span style="color:<?=$color?>"><?=$str?></span><br>
         <?php
      }else{
       echo "无该会员";

      }
    }else if(isset($_POST['DID'])&&$_POST['DID']!=""){
        $id=$_POST['DID'];
        $sql1="select * from m_member where MID=$id";
        $rs1=$link->query($sql1);
        $aff1=$link->affected_rows;
        if($aff1>0){
           $row1=$rs1->fetch_assoc();
           $b=strtotime($row1['Medate']);
           $b1=strtotime(date("Y-m-d"));
           $a=$b-$b1;
           $d=$a/(24*60*60);
           if($d>=0){
             $color="#000000";
             $str="距离过期还有".$d."天";
           }else{
            $color="red";
            $str="已过期";
           }
           ?>
           会员号：<?=$row1['MID']?><br>
           姓名：<?=$row1['Mname']?><br>
           性别：<?=$row1['Msex']?><br>
           号码：<?=$row1['phone']?><br>
           <span style="color:<?=$color?>"><?=$str?></span><br>
           <?php
        }else{
         echo "无该会员号";
  
        }
      }
    ?>

    </div>
        
  </div>
  </div>
 <div  class="down">
    <center>
    <hr color="#DDD8D8"   /> 
    技术支持：河池学院计算机与信息工程学院15计技班 徐舒玲
   </center>
  </div>
</div>
<?php
}else{
 
  $fc->alrt('登录超时，请重新登录','../Login/Login.html');
}
?>
</body>                                 
</html>
