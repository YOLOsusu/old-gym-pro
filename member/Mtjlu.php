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
    <a href="Mmoer.php"  ><div class="dli" > 更多</div> </a>
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
	 
 </div>
  <div  class="dright">
      <div style="float:left;margin:15px">
      <h3>会员<br>体检<br>信息</h3>
      </div>
    <div class="Mtj"> 
     次数<br><hr>学号<br><hr>运动史<br><hr>运动系统伤病<br><hr>体检时间<br><hr>身高(cm)<br><hr>体重(kg) <br> <hr>体重指数<br><hr> 脂肪率<br><hr>
      静心率<br><hr> 上臂(左)(cm)<br> <hr>上臂(右)(cm)<br><hr> 肩围(cm)<br><hr> 腰围(cm)<br> <hr>臀围(cm)<br><hr> 腰臀比 <br><hr>大腿(左(cm))<br> <hr>大腿(右)(cm)<br><hr> 体检教练<br><hr>
     <d></d><br>
   </div>
    <?php
    $sql1="select * from amedical where MID='$MID'";
    $rs1=$link->query($sql1);
    while($row1=$rs1->fetch_assoc()){
    ?>
    <div class="Mtj">
    <?php
    foreach($row1 as $b){//依次取出数组中元素，$a是元素的键名$b是键值
    echo $b.'<br><hr>';
    } 
   
     ?>
     <a href="daying.php?ID=<?=$row1['ID']?>"><input type="button" value="去打印"></a>
     </div>
     <?php
     } 
     ?>
       
    
    
  


     
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
