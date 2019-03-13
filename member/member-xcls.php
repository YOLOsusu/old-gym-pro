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
     <div   class="dimg"> <img src="<?=$row['img']?>" width="80" height="80"><a href="Mimg.php" class="now" ><span>修改</span></a></div>
        <a  href="member-xx.php">  <div class="dli"> 会员信息</div> </a>
      	<a href="memter-cls.php" >  <div class="dli" > 参与课程</div></a>  
        <div   class="drr"> 选课</div>
      	<a href="member-xf.php">  <div  class="dli"> 续费</div> </a>
	      <a href="Mmoer.php"  ><div class="dli" > 更多</div> </a>
        <a href="../../index.php">  <div class="dli" > 首页</div></a> 
        <p></br></p>
        <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a>  
 </div>
 <div  class="dright">
 <?php
 $sql1="SELECT * FROM `f_cla` f join fteaching f1 on(f.FID=f1.FID)  where f1.state='0'";
 $rs1=$link->query($sql1);
 ?>  
   <center>
   <p></p>
   <table width="623"  style="text-align:center">
   <caption>目前可报名课程</caption>
  <tbody>
    <tr bgcolor="#8080FF" style="color:#FFFFFF">
      <td width="66" height="31">课程编号</td>
      <td width="74">课程名称</td>
      <td width="103">上课时间</td>
      <td width="86">上课地点</td>
      <td width="67">课时</td>
      <td width="54">人数</td>
      <td width="61">学费</td>
      <td width="76">操作</td>
      </tr>
      <?php
    while($row1=$rs1->fetch_assoc()) {
	  
	  $GID=$row1['GID'];
      $sql2="select Gname from g_gym where GID='$GID'";
      $rs2=$link->query($sql2);
      $row2=$rs2->fetch_assoc();

	  ?>
      <form  action="M-tancla.php?MID=<?=$MID?>" method="post">
      
      <tr class="linear">
      <td height="46"><?=$row1['FID']?></td>
      <td><?=$row1['Fname']?></td>
      <td><?=$row1['Ftime']?></td>
      <td><?=$row2['Gname']?></td>
      <td><?=$row1['Fdate']?></td>
      <td><?=$row1['Mcoute']?></td>
      <td><?=$row1['Fmoney']?>元</td>
      <td><a href="../flow/Flass.php?ID=<?=$row1['FID']?>">详情</a>|<input type="checkbox" value="<?=$row1['FID']?>" name="class1" /></td>
      </tr>
      <?php
	}
      ?>
      
      <tr>
        <td height="46" colspan="8" align="right"><input type="submit" name="xctj" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </form>
  </tbody>
</table>
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
