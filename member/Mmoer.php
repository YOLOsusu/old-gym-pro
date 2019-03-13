<!DOCTYPE HTML>
<html lang="en-US">
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
$sql="select * from member where MID='$MID'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();

?>

<body bgcolor="#CCCCCC">

<div class="all" >
  <div class="dtop"  style="background: url(../image/top.png)">
  <marquee>
  <span style="font-size:24px; color:#8080FF; font-weight:bold;">欢迎会员<span style="color:rgb(187, 187, 250);">(<?=$row['Mname']?>)</span>登陆</span>
  </marquee>
  </div>
 <div class="dmidou">
  <div  class="dleft">
   <div   class="dimg"  > <img src="<?=$row['img']?>" width="80" height="80"><a href="Mimg.php"  class="now"><span>修改</span></a></div>
  <a  href="member-xx.php">  <div class="dli"> 会员信息</div> </a>
	<a href="memter-cls.php" >  <div class="dli" > 参与课程</div></a>  
    <a href="member-xcls.php"> <div  class="dli"> 选课</div> </a>
    <a href="member-xf.php">  <div  class="dli"> 续费</div> </a>
	   <div class="drr" > 更多</div> 
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
	 
 </div>
    <div  class="dright">
          <a href="Mtjlu.php"><input type="button" value="体检记录"  class="bottun"></a><br>
          <a href="Mpw-md.php"><input type="button" value="修改密码"  class="bottun"></a><br>
          
          
    </div>
  </div>
 <div  class="down">
    <center>
    <hr color="#DDD8D8"/> 
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
