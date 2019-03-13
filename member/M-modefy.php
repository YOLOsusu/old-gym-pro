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
$MID=$_COOKIE['ID'];
$sql="call mcx($MID);";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();
?>

<body>

<div class="all" >
  <div class="dtop"  style="background: url(../image/top.png)">
  <marquee>
  <span style="font-size:24px; color:#8080FF; font-weight:bold;">欢迎会员<span style="color:rgb(187, 187, 250);">(<?=$row['Mname']?>)</span>登陆</span>
  </marquee>
  </div>
<div class="dmidou">
  <div  class="dleft">
   <div   class="dimg" > <img src="<?=$row['img']?>" width="80" height="80"><a href="Mimg.php" class="now"><span>修改</span></a></div>
     <a  href="member-xx.php" >  <div class="dli" >会员信息</div></a>
	<a href="memter-cls.php" >  <div class="dli" > 参与课程</div></a>  
    <a href="member-xcls.php"> <div  class="dli"> 选课</div> </a>
	<a href="member-xf.php">  <div  class="dli"> 续费</div> </a>
	<a href="Mmoer.php"><div class="dli" > 更多</div> </a>
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
 </div>

 
 
 <div  class="dright" style="border-radius:20px;">
 <br />

 <form  action="updete.php?mj=<?=$row['Mjdate']?>" method="post">
<center>
    <table width="398"  cellspacing="0" class="linear1" style="width:667px;border-radius:20px;" >
	<caption>修改会员信息</caption>
  <tbody>
    <tr>
      <td height="33" colspan="2" style="text-align:right"></td>
      </tr>
    <tr>
      <td width="260" height="45" style="text-align:right" >会员编号：</td>
      <td width="434">&nbsp;<?=$row['MID']?></td>
      </tr>
    <tr>
      <td height="45" style="text-align:right" >姓名：</td>
      <td >&nbsp;<input name="Mname" type="text" value="<?=$row['Mname']?>" size="20" /></td>
      </tr>
    <tr>
      <td height="45" style="text-align:right" >性别：</td>
      <td >&nbsp;<input name="msex" type="radio" value="男" />男<input name="msex" type="radio" value="女" />女&nbsp;&nbsp;&nbsp;&nbsp;原性别：<?=$row['Msex']?></td>
      </tr>
    <tr>
      <td height="45" style="text-align:right" >出生年月：</td>
      <td >&nbsp;<label for="date"></label><input type="date" name="date2" id="date2"  value="<?=$row['Mbir']?>"  size="15"/></td>
    </tr>
    <tr>
      <td height="45"  style="text-align:right" >预留手机号：</td>
      <td >&nbsp;<input name="phone" type="text"  value="<?=$row['phone']?>" size="20" /></td>
      </tr>	
    <tr>
      <td height="45" style="text-align:right" >注册时间：</td>
      <td >&nbsp;<?php echo $row['Mjdate']?></td>
      </tr>
    <tr>
      <td height="54"style="text-align:right"  >家庭住址：</td>
      <td >&nbsp;<textarea name="Maddress" cols="40" rows="3"><?php echo $row['Maddress']?></textarea></td>
      </tr>
    <tr>
      <td height="59" style="text-align:right" >爱好：</td>
      <td >&nbsp;<textarea name="hobby" cols="30" rows="2"><?php echo $row['Mhobby']?></textarea></td>
    </tr>  
    <tr>
      <td height="179" colspan="2" align="center" ><input name="mx" type="submit"  value="修改"  /></td>
    </tr>
    <tr>
      <td height="92"></td>
    </tr>
 
  </tbody>
</table> 
 
  <p>&nbsp;</p>   
</center>
</form>
         
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
