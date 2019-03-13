<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/MCcss.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function $(id){return document.getElementById(id);}
function show1(){
  var a1=parseFloat($("ka1").value);
  if(a1>0 && a1!="" ){
      if(a1==1){
        $("mn").value=200;
      }
  }else{
  alert("请选择开通卡项");
  }

}
function show2(){
  var a1=parseFloat($("ka2").value);
  if(a1>0 && a1!="" ){
      if(a1==2){
        $("mn").value=500;
      }
  }else{
  alert("请选择开通卡项");
  }

}
function show3(){
  var a1=parseFloat($("ka3").value);
  if(a1>0 && a1!="" ){
      if(a1==3){
        $("mn").value=900;
      }
  }else{
  alert("请选择开通卡项");
  }

}
</script>
</head>
<?php
ini_set('date.timezone','Asia/Shanghai');
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
      <div   class="drr"> 续费</div> 
      <a href="Mmoer.php"  ><div class="dli" > 更多</div> </a>
      <a href="../../index.php">  <div class="dli" > 首页</div></a> 
      <p></br></p>
      <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
  </div>

  <div  class="dright">
    <center>
    <?php 
    //echo date("Y-m-d",$b);
    ///echo date("Y-m-d",$b1);
    date_default_timezone_set("PRC");
    $b=strtotime($row['Medate']);
    $b1=strtotime(date("Y-m-d"));
    $a=$b-$b1;
    $d=$a/(24*60*60);

    if($d<10&&$d>=0){
      $color="red";
    }elseif($d<=20&&$d>=10){
     $color="#FF99CC";
    }elseif($d>20){
      $color="#8080FF";
    }elseif($d<0){
      $color="red";
    }
    ?>
    <div style="color:<?=$color?>;font-weight:bold;"><br>
      <?php
      if($d>=0){
        ?>
        距离到期日<?=$row['Medate']?><br>还有<?=$d?>天
      <?php
      }else{
      ?>
      会员已过期
      <?php
      }
      ?>
    </div>
    </center>
    <div  class="Tjb1">
          <form action="mxf-up.php" method="POST">
            <center style="color:#8080FF;">
                <h3 style="font-size:24px; font-weight:bold;"><br>续费开通支付会费</h3><br>
                   请选择续费的选项<br>
                   <input type="radio" value="1" name="ka" id="ka1" onclick="show1();" >月卡 <input type="radio" value="2" name="ka" id="ka2" onclick="show2();">季卡
                 <input type="radio" value="3" name="ka" id="ka3" onclick="show3();">年卡<br>
                费用：<input type="text" name="mn" style="color:red;font-weight:bold;width:30px" id="mn">(人民币)<br><br>
                输入手机号：<input type="text" name="ph" id=""><br><br>
                输入登录密码：<input type="password" name="mm" id=""><br><br>
                <input type="submit" value="提交">
            </center>
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
