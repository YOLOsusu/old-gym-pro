<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link   href="../css-php/MCcss.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"   src="../jquery-2.1.1/jquery-2.1.1.min.js"></script>
<script type="text/javascript"   src="../jquery-2.1.1/jquery-2.1.1.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {

    $("#pwd1").blur(function(e){
var pwd1=$("#pwd1").val();
if(pwd1==''){
$("#spanPwd1").html("密码不能为空");
$("#spanPwd1").css({"color":"#F00"});
}else if(pwd1.length<6){
$("#spanPwd1").html("密码不能少于6位");
$("#spanPwd1").css({"color":"#F00"});
}else if(pwd1.length>24){
$("#spanPwd1").html("密码不能大于24位");
$("#spanPwd1").css({"color":"#F00"});
}else{
$("#spanPwd1").hide();
}
});
$("#pwd2").blur(function(e){
var pwd2=$("#pwd2").val();
if(pwd2==''){
$("#spanPwd2").html("密码不能为空");
$("#spanPwd2").css({"color":"#F00"});
}else if(pwd2!=$("#pwd1").val()){
$("#spanPwd2").html("两次密码不一致");
$("#spanPwd2").css({"color":"#F00"});
}else{
$("#spanPwd2").hide();
}
});

});

</script>
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
    <div class="MD">
         <center>
            <h3>修改密码</h3><br>
         </center>
        <form action="upimg.php?pw=1&ID=<?=$row['ID']?>" method="post">
          旧密码 <input type="password" name="jpw" id="jpw"><br>
          新密码 <input type="password" name="pwd1" id="pwd1">
          <span style="color:#FD0105; font-size:16px">*</span><span id="spanPwd1">由6—24位字母、数字、字符组成</span><br>
          确认密码<input type="password" name="pwd2" id="pwd2"><span style="color:#FD0105; font-size:16px">*</span><span id="spanPwd2">由6—24位字母、数字、字符组成</span><br><br><br>
          <center><input type="submit" value="提交" class="bottun"><input type="reset" value="重置" class="bottun"></center>
        </form>
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
