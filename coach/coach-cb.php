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
     
    <a href="coach-xx.php">  <div class="dli" style="background-color:#0EA8F3"> 教练信息</div> </a>
   	<a href="coach-tj.php">   <div class="dli" style="background-color:#0EA8F3" > 体检记录</div>  </a>
    <div  class="drr1"> 我的课表</div> 
    <a href="coach-xy.php">  <div  class="dli" style="background-color:#0EA8F3"> 续约</div> </a>
  	<a href="Cmoer.php">  <div class="dli"style="background-color:#0EA8F3" > 更多</div> </a>
    <a href="../../index.php">   <div class="dli"style="background-color:#0EA8F3" > 首页</div> </a>
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(167, 224, 250)" > 退出</div></a> 
	  
 </div>
     <div class="dright">
     <center>
      <?php
			 $sql1="select * from c_coach c join fteaching f on(c.CID=f.CID)
			join f_cla f1 on(f.FID=f1.FID)
			 where c.CID='$CID' and f.state='1'";
      $rs1=$link->query($sql1);
      //join m_study  ms on(f1.FID=ms.FID)
			//join  m_member m on(ms.MID=m.MID)
   ?>
   <p></p>
  <table width="600" style="text-align:center;" >
  <caption>正在教授课程</caption>
  <tbody>
    <tr  bgcolor="#0EA8F3">
      <td width="88" height="35">课程编号</td>
      <td width="77">课程名称</td>
      <td width="99">招募人数</td>
      <td width="99">上课人数</td>
      <td width="99">上课时间</td>
      <td width="120">上课地点</td>
      <td width="48">其他</td>
      <td width="48">操作</td>
    </tr>
	<?php
        while($row1=$rs1->fetch_assoc()) {
	  
	  $GID=$row1['GID'];
      $sql2="select Gname from g_gym where GID='$GID'";
      $rs2=$link->query($sql2);
      $row2=$rs2->fetch_assoc();
	  
	    $FID=$row1['FID'];
		$sql3="select count(*) from m_study where FID=$FID";
		$rs3=$link->query($sql3);
		/*$row2=$rs2->fetch_assoc();*/
		$row3=$rs3->fetch_array();
		
	  ?>
    <tr  class="linear2">
      <td height="38"><?=$row1['FID']?></td>
      <td><?=$row1['Fname']?></td>
      <td><?=$row1['Mcoute']?></td>
      <td><?=$row3['count(*)']?></td>
      <td><?=$row1['Ftime']?></td>
      <td><?=$row1['GID']?>|<?=$row2['Gname']?></td>
      <td><a href="../flow/Flass.php?ID=<?=$row1['FID']?>" >详情</a></td>
      <td><a href="coach-zt.php?ID=<?=$row1['FID']?>&kw=2"><input type="button" value="完成"></a></td>
    </tr>
    <?php
		}
	?>
  </tbody>
</table>
</center>
<center>

			
      <?php
			 $sql4="select * from c_coach c join fteaching f on(c.CID=f.CID)
			join f_cla f1 on(f.FID=f1.FID)
			 where c.CID='$CID' and f.state='0'";
      $rs4=$link->query($sql4);
      //join m_study  ms on(f1.FID=ms.FID)
      //join  m_member m on(ms.MID=m.MID)
   ?>
   <p></p>
  <table width="600" style="text-align:center;" >
  <caption>未开课课程</caption>
  <tbody>
    <tr  bgcolor="#0EA8F3">
      <td width="88" height="35">课程编号</td>
      <td width="77">课程名称</td>
      <td width="99">招募人数</td>
      <td width="99">报名人数</td>
      <td width="99">上课时间</td>
      <td width="120">上课地点</td>
      <td width="48">其他</td>
      <td width="48">操作</td>
    </tr> 
    <?php
        while($row4=$rs4->fetch_assoc()) {
	  
	  $GID=$row4['GID'];
      $sql5="select Gname from g_gym where GID='$GID'";
      $rs5=$link->query($sql5);
      $row5=$rs5->fetch_assoc();
	  
	    $FID=$row4['FID'];
		$sql6="select count(*) from m_study where FID=$FID";
		$rs6=$link->query($sql6);
		/*$row2=$rs2->fetch_assoc();*/
		$row6=$rs6->fetch_array();
		
	  ?>
    <tr  class="linear2">
      <td height="38"><?=$row4['FID']?></td>
      <td><?=$row4['Fname']?></td>
      <td><?=$row4['Mcoute']?></td>
      <td><?=$row6['count(*)']?><a href="Mjf.php?FID=<?=$row4['FID']?>"><input type="button" value="缴费详情"></a></td>
      <td><?=$row4['Ftime']?></td>
      <td><?=$row4['GID']?>|<?=$row5['Gname']?></td>
      <td><a href="../flow/Flass.php?ID=<?=$row4['FID']?>" >详情</a></td>
      <td><a href="coach-zt.php?ID=<?=$row4['FID']?>&kw=1"><input type="button" value="开课"></a></td>
    </tr>
    <?php
		}
	?>
  </tbody>
</table>
</center>
<center>
      <?php
			 $sql7="select * from c_coach c join fteaching f on(c.CID=f.CID)
			join f_cla f1 on(f.FID=f1.FID)
			 where c.CID='$CID' and f.state='2'";
      $rs7=$link->query($sql7);
      //join m_study  ms on(f1.FID=ms.FID)
			//join  m_member m on(ms.MID=m.MID)
   ?>
   <p></p>
  <table width="600" style="text-align:center;" >
  <caption>已完成课程</caption>
  <tbody>
    <tr  bgcolor="#0EA8F3">
      <td width="88" height="35">课程编号</td>
      <td width="77">课程名称</td>
      <td width="99">招募人数</td>
      <td width="99">上课人数</td>
      <td width="99">上课时间</td>
      <td width="120">上课地点</td>
      <td width="48">其他</td>
      <td width="48">操作</td>
    </tr>
	<?php
        while($row7=$rs7->fetch_assoc()) {
	  
	  $GID=$row7['GID'];
      $sql8="select Gname from g_gym where GID='$GID'";
      $rs8=$link->query($sql8);
      $row8=$rs8->fetch_assoc();
	  
	    $FID=$row7['FID'];
		$sql9="select count(*) from m_study where FID=$FID";
		$rs9=$link->query($sql9);
		/*$row2=$rs2->fetch_assoc();*/
		$row9=$rs9->fetch_array();
		
	  ?>
    <tr  class="linear2">
      <td height="38"><?=$row7['FID']?></td>
      <td><?=$row7['Fname']?></td>
      <td><?=$row7['Mcoute']?></td>
      <td><?=$row9['count(*)']?></td>
      <td><?=$row7['Ftime']?></td>
      <td><?=$row7['GID']?>|<?=$row8['Gname']?></td>
      <td><a href="../flow/Flass.php?ID=<?=$row7['FID']?>" >详情</a></td>
      <td><a href="C-Mscore.php?FID=<?=$row7['FID']?>"><input type="button" value="评分"></td>
    </tr>
    <?php
		}
	?>
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
