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
$sql="select * from member where MID='$phone'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();
$FID=$_GET['FID'];
?>

<body bgcolor="#CCCCCC">

<div class="all" >
  <div class="dtop" style="background: url(../image/top.png)">
  <marquee>
  <span style="font-size:24px; color:#8080FF; font-weight:bold;">欢迎会员<span style="color:rgb(187, 187, 250);">(<?=$row['Mname']?>)</span>登陆</span>
  </marquee>
  </div>
<div class="dmidou">
  <div  class="dleft">
      <div  class="dimg"> <img src="<?=$row['img']?>" width="80" height="80"><a href="Mimg.php"  class="now"><span>修改</span></a></div>
      <a  href="member-xx.php">  <div class="dli"> 会员信息</div> </a>
	  <a href="memter-cls.php" >  <div class="dli" > 参与课程</div></a>  
      <a href="member-xcls.php"> <div  class="dli"> 选课</div> </a>
	  <a href="member-xf.php">  <div  class="dli"> 续费</div> </a>
	  <a href="Mmoer.php"  ><div class="dli" > 更多</div> </a>
      <a href="../../index.php">  <div class="dli" > 首页</div></a> 
      <p></br></p>
      <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
 </div>

 <div  class="dright">
      <div  class="Tjb1">
      <center style="color:#8080FF;">
           <form action="mjf-up.php?FID=<?=$FID?>" method="POST">
                <h3 style="font-size:24px; font-weight:bold;"><br>课程缴费</h3><br>
                <?php
                $sql1="select * from f_cla where FID=$FID";
                $rs1=$link->query($sql1);
                $row1=$rs1->fetch_assoc();
                ?>
                课程名：<?=$row1['Fname']?><br>
                费用：<?=$row1['Fmoney']?><br>
                输入登录密码：<input type="password" name="mm" id=""><br><br>
                <input type="submit" value="提交">
          </form>
          <p><br><br>
          如有选课成功的课程,<br>请在两天之内交费，否则系统自动会帮你退课！
          </p>
      </center>  

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
