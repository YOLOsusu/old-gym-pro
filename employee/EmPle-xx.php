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
     <div class="drr"> 员工信息</div> 
	   <a href="EmPle-dj.php.php" >  <div class="dli" > 会员登记</div></a>  
      <a href="EmPle-mxx.php"  ><div class="dli" > 会员查询</div> </a>
	  <a href="Emoer.php"  ><div class="dli" > 更多</div> </a>
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
 </div>

 <div  class="dright">
         
 <center>
    <table width="397"  cellspacing="0"  >
	<caption>账号信息</caption>
  <tbody>
    <tr>
      <td width="107" height="40" class="td1">员工号：</td>
      <td width="274" class="tdi2"><?=$row['ID']?></td>
      </tr>
    <tr>
      <td height="40" class="td1">姓名：</td>
      <td   class="tdi2"><?=$row['name']?></td>
      </tr>
    <tr>
      <td height="40" class="td1">性别：</td>
      <td class="tdi2"><?=$row['Esex']?></td>
      </tr>
    <tr>
      <td height="40" class="td1" >预留手机号：</td>
      <td class="tdi2"><?=$row['phone']?></td>
      </tr>
    <tr>
      <td height="50" class="td1">家庭住址：</td>
      <td class="tdi2"><?=$row['address']?></td>
    </tr>
  </tbody>
</table> 
<p><a href="EmPle-md.php"> <input name="mx" type="submit"  value="修改" class="bottun" /></a></p>
</center>

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
