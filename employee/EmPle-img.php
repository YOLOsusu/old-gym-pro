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
    <a  href="EmPle-xx.php">  <div class="dli"> 员工信息</div> </a>
    <a href="EmPle-dj.php.php" >  <div class="dli" > 会员登记</div></a>  
      <a href="EmPle-mxx.php"  ><div class="dli" > 会员查询</div> </a>
	  <a href="Emoer.php"  ><div class="dli" > 更多</div> </a>
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 
 </div>

    <div  class="dright">
    <center><h3>修改头像</h3></center>
    <h4>原头像</h4>
    <div class="dimg1"> <img src="../image/<?=$row['img']?>" width="80" height="80"></div><br>
    <h4>新头像</h4>
    <form action="EmPle-img.php" method="post" enctype="multipart/form-data"><input type="file" name="myfile" id=""><input type="submit" value="预览"></from>
     <?php
     if(isset($_FILES["myfile"])&&$_FILES["myfile"]!=""){
         if(($_FILES["myfile"]["type"]=="image/jpeg" || $_FILES["myfile"]["type"]=="image/png"|| $_FILES["myfile"]["type"]=="image/jpg") && $_FILES["myfile"]["size"]<1024000)
        {
            //找到文件的名称
            $filename =$_FILES["myfile"]["name"];
            //转换编码格式
            $filename = iconv("UTF-8","gb2312",$filename);
            ?>
         <div   class="dimg1"> <img src="../image/<?=$filename?>" width="80" height="80"></div><br>
           <a href="EmPle-up.php?url=<?=$filename?>&ID=<?=$row['ID']?>"><input type="button" value="提交" class=""></a>

            <?php
            }else{?>
              </br><script>alert('请选择图片文件')</script>
         <?php
              }
        }
        ?>   


    
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
