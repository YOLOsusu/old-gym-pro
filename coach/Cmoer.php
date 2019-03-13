<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/MCcss.css" rel="stylesheet" type="text/css" />
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
            
            <a href="coach-xx.php"><div class="dli" style="background-color:#0EA8F3"> 教练信息</div> </a>
            <a href="coach-tj.php"><div class="dli" style="background-color:#0EA8F3" >体检记录</div>  </a>
            <a href="coach-cb.php"><div  class="dli" style="background-color:#0EA8F3"> 课表</div> </a>
            <a href="coach-xy.php"><div class="dli" style="background-color:#0EA8F3" > 续约</div> </a>  
            <div  class="drr" >更多</div>
            <a href="../../index.php"> <div class="dli"style="background-color:#0EA8F3" > 首页</div> </a>
            <p></br></p>
            <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')"><div class="dli" style="background-color:rgb(167, 224, 250)" > 退出</div></a> 
            
        </div>
        <div class="dright">
            <div class="MD">
                    <center>
                    <h3>修改密码</h3><br>
                    </center>
                    <form action="Cupimg.php?pw=1&ID=<?=$row['ID']?>" method="post">
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
