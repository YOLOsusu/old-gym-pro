<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css"  href="../css-php/Login.css"  rel="stylesheet" />
<title></title>
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

<body  bgcolor="#CCCCCC" >
    <div class="all">
      <div class="formm1">
            <div class="ka"><a href="../../index.php"><br>首页</a></div>
            <div class="ka"><a href="Login.html"><br>登录</a></div>
            <div class="ka1"><br>忘记密码</div>
            <div class="ka"><a href="Login-sign1.html"><br>会员注册</a></div>
            <div class="ka"><a  href="Login-coach.html"><br>教练注册</a></div> 
            <div class="ka"><a href="Ltrue.html"></br>开通会员</a></div>
      </div>
      <div class="formm">
          <?php
          if(isset($_POST['ph'])&&$_POST['ph']!=""){
              $ph=$_POST['ph'];
            ?>
            <form  action="Formm-up.php?ph=<?=$ph?>" method="post">
                <center>
                <h3><br>修改密码</h3><br>
                    请选择账号类型<br>
                    <input name="XZ" type="radio" value="1" />会员 &nbsp;
                    <input name="XZ" type="radio"  value="2" />教练 &nbsp;
                    <input name="XZ" type="radio" value="3" /> 员工 &nbsp;
                    <input name="XZ" type="radio" value="3" />管理员<br>
                    新的密码：<input type="password" name="pwd1" id="pwd1"><span style="color:#FD0105; font-size:16px">*</span><span id="spanPwd1" class="tisi">由6—24位字母、数字、字符组成</span><br><br>
                    确认密码：<input type="password" name="pwd2" id="pwd2"><span style="color:#FD0105; font-size:16px">*</span><span id="spanPwd2" class="tisi">由6—24位字母、数字、字符组成</span><br><br>
                   <input type="submit" value="提交">
                 </center>  
             </from>
            <?php
          }else{
              ?>
          <form action="Formm.php" method="POST">
            <center>
                <h3><br>修改密码</h3><br>
                手机号：<input type="text" name="ph" id=""><br><br>
                <input type="button" value="获取验证码"><br><br>
                输入验证码：<input type="text" name="yzm" id=""><br><br>
                <input type="submit" value="提交">
            </center>
          </form>
          <?php
          }
          ?>
      </div>
    </div>  
   
</body>
</html>
