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
   <div class="drr1">体检记录</div> 
   <a href="coach-cb.php">    <div  class="dli" style="background-color:#0EA8F3"> 课表</div> </a>
   <a href="coach-xy.php">  <div  class="dli" style="background-color:#0EA8F3"> 续约</div> </a>
	 <a href="Cmoer.php">              <div class="dli"style="background-color:#0EA8F3" > 更多</div> </a>
   <a href="../../index.php">    <div class="dli"style="background-color:#0EA8F3" > 首页</div> </a>
   <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(167, 224, 250)" > 退出</div></a> 
	 
 </div>
     <div class="dright"> 
      <center>
       <h2>我的学员</h2>
       <?php
        $sql1="select DISTINCT m.MID,m.Mname from c_coach c join fteaching f on(c.CID=f.CID)
        join f_cla f1 on(f.FID=f1.FID)
        join m_study  ms on(f1.FID=ms.FID)
        join  m_member m on(ms.MID=m.MID)  where c.CID='$CID'";
        $rs1=$link->query($sql1);
        ?>
       <table width="400" style="text-align:center;" >
       <tbody>
        <tr  bgcolor="#0EA8F3">
            <td width="88" height="35">学号</td>
            <td width="77">姓名</td>
            <td width="100">所属课程</td>
            <td width="40">操作</td>
        </tr>
	     <?php
        while($row1=$rs1->fetch_assoc()) {
           $MID=$row1['MID'];
           $string="";
           $i=0;
          $sql2="select f1.Fname from c_coach c join fteaching f on(c.CID=f.CID)
          join f_cla f1 on(f.FID=f1.FID)
          join m_study  ms on(f1.FID=ms.FID)
          join  m_member m on(ms.MID=m.MID)  where c.CID='$CID' and m.MID='$MID'";
          $rs2=$link->query($sql2);
          while($row2=$rs2->fetch_assoc()){
            $i++;
            if($i==1){
              $str="";
            }else{
              $str="/";
            }
            $string.=$str.$row2['Fname'];
          }
         
	     ?>
         <tr class="linear2">
            <td height="30"><?=$row1['MID']?></td>
            <td><?=$row1['Mname']?></td>
            <td><?=$string?></td>
            <td><a href="Tjlu.php?ID=<?=$row1['MID']?>">记录</a></td>
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
