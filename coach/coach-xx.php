<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/MCcss.css" rel="stylesheet" type="text/css" />
</head>
<?php

include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
$CID=$_COOKIE['ID'];
$sql="select * from coach where CID='$CID'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();

?>


<body bgcolor="#CCCCCC">

<div class="all" >
  <div class="dtop"  style="background: url(../image/11122.png)">
  <marquee>
  <span style="font-size:24px;font-weight:bold; color:#0EA8F3">欢迎教练<span style="color: #33FFFF; border-color:#000000;">(<?=$row['Cname']?>)</span>登陆</span>
  </marquee>
  </div>
<div class="dmidou">
  <div  class="dleft" >
     <div  class="dimg" style="border-color:#0EA8F3;"><img src="<?=$row['img']?>" width="80" height="80"><a href="Cimg.php"  class="now"><span>修改</span></a></div>
      <div class="drr"   >教练信息</div>
    	<a href="coach-tj.php"><div class="dli"  style="background-color:#0EA8F3" >体检记录</div>  </a>
      <a href="coach-cb.php"><div  class="dli" style="background-color:#0EA8F3"> 课表</div> </a>
      <a href="coach-xy.php"><div  class="dli" style="background-color:#0EA8F3"> 续约</div> </a>
	    <a href="Cmoer.php">   <div class="dli"  style="background-color:#0EA8F3" > 更多</div> </a>
      <a href="../../index.php"><div class="dli"   style="background-color:#0EA8F3" > 首页</div> </a>
      <p></br></p>
      <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(167, 224, 250)" > 退出</div></a> 
 </div>
  <div class="dright">
  <br />
 		<center>
    <table width="397"  cellspacing="0"  >
	<caption style="color:#0EA8F3;">账号信息</caption>
  <tbody>
    <tr>
      <td width="107" height="40" class="td1" style="color:#0EA8F3;">教练编号：</td>
      <td width="274" class="tdi2" style="border-bottom-color:#0EA8F3;"><?=$row['CID']?></td>
      </tr>
    <tr>
      <td height="40" class="td1" style="color:#0EA8F3;">教练姓名：</td>
      <td   class="tdi2" style="border-bottom-color:#0EA8F3;"><?=$row['Cname']?></td>
      </tr>
    <tr>
      <td height="40" class="td1" style="color:#0EA8F3;">性别：</td>
      <td class="tdi2"style="border-bottom-color:#0EA8F3;"><?=$row['Csex']?></td>
      </tr>
    <tr>
      <td height="40" class="td1" style="color:#0EA8F3;">出生年月：</td>
      <td class="tdi2" style="border-bottom-color:#0EA8F3;"><?=$row['Cbir']?></td>
      </tr>
    <tr>
      <td height="40" class="td1" style="color:#0EA8F3;" >预留手机号：</td>
      <td class="tdi2" style="border-bottom-color:#0EA8F3;"><?=$row['phone']?></td>
      </tr>
    <tr>
      <td height="40" class="td1" style="color:#0EA8F3;">注册时间：</td>
      <td class="tdi2" style="border-bottom-color:#0EA8F3;"><?=$row['Cjdate']?></td>
      </tr>
    <tr>
      <td height="50" class="td1" style="color:#0EA8F3;">家庭住址：</td>
      <td class="tdi2" style="border-bottom-color:#0EA8F3;"><?=$row['Caddress']?></td>
      </tr>
    <tr>
      <td height="50" class="td1" style="color:#0EA8F3;">擅长：</td>
      <td class="tdi2" style="border-bottom-color:#0EA8F3;" ><?=$row['Cnice']?></td>
      </tr>
	
    
  </tbody>
</table> 
 
       <p><a href="coach-md.php" ><input type="button" value="修改" class="bottun"></a></p>
     
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