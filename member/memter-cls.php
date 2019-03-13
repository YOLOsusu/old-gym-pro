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
  if(isset($_GET['FID'])&&$_GET['FID']!=""){
    $FID=$_GET['FID'];
    $sql3="select * from f_tcing where FID='$FID'";
    $r3=$link->query($sql3);
    $row3=$r3->fetch_assoc();
    if($row3['state']=='1'){
      $fc->alrt('该课已开，已无法退课','memter-cls.php');
    }else if($row3['state']==='0'){
      $sql4="delete from m_study where MID='$MID' and FID='$FID'";
      $rs4=$link->query($sql4);
      $aff=$link->affected_rows;
      if($aff>0){
        $fc->alrt('退课成功','memter-cls.php');
      }else{
        $fc->alrt('退课失败','memter-cls.php');
      }

    }

  }

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
     <div   class="dimg"> <img src="<?=$row['img']?>" width="80" height="80"><a href="Mimg.php"  class="now"><span>修改</span></a></div>
    <a  href="member-xx.php">  <div class="dli"> 会员信息</div> </a>
            <div  class="drr" > 参与课程</div> 
    <a href="member-xcls.php"> <div  class="dli"> 选课</div> </a>
  	<a href="member-xf.php">  <div  class="dli"> 续费</div> </a>
  	<a href="Mmoer.php"  ><div class="dli" > 更多</div> </a>
    <a href="../../index.php">  <div class="dli" > 首页</div></a> 
    <p></br></p>
    <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(187, 187, 250)" > 退出</div></a> 

  </div>
 <div  class="dright" >
      <p></p>
      <?php
      $sql1="select * from m_member m join m_study ms on(m.MID=ms.MID)
      join f_cla f on(ms.FID=f.FID)
      join f_tcing f1 on(f.FID=f1.FID)
      join c_coach c on(f1.CID=c.CID) where m.MID=$MID and f1.state='1'";
      $rs1=$link->query($sql1);
      ?>
      <center>
        <table width="568"  style="text-align:center">
        <caption>目前正在上课课程</caption>
        <tr  bgcolor="#8080FF" style="color:#FFFFFF">
          <td width="70" height="28" >课程号</td>
          <td width="108">课程</td>
          <td width="100">教练 </td>
          <td width="103">上课时间</td>
          <td width="114">地点</td>
        </tr>
        <?php
        while($row1=$rs1->fetch_assoc()){

      $GID=$row1['GID'];
      $sql2="select * from g_gym where GID=$GID";
      $rs2=$link->query($sql2);
      $row2=$rs2->fetch_assoc();
        
        
        ?>
        <tr class="linear">
          <td height="38"><?=$row1['FID']?></td>
          <td><a href="../flow/Flass.php?ID=<?=$row1['FID']?>"><?=$row1['Fname']?></a></td>
          <td><a href="../flow/CoaLe.php?na=<?=$row1['Cnice']?>"><?=$row1['Cname']?></a></td>
          <td><?=$row1['Ftime']?></td>
          <td><?=$row2['GID']?>号|<?=$row2['Gname']?></td>
        </tr>
        <?php
      }
        ?>
      </table>
    </center>



    <p></p>
      <?php
      $sql5="select * from m_member m join m_study ms on(m.MID=ms.MID)
      join f_cla f on(ms.FID=f.FID)
      join f_tcing f1 on(f.FID=f1.FID)
      join c_coach c on(f1.CID=c.CID) where m.MID=$MID and f1.state='0'";
      $rs5=$link->query($sql5);
      ?>
      <center>
        <table width="568"  style="text-align:center">
        <caption>报名未开课课程</caption>
        <tr>
          <td colspan="8">选课成功的课程,请在两天之内交费，否则系统自动会帮你退课！</td>
        </tr>
        <tr  bgcolor="#8080FF" style="color:#FFFFFF">
          <td width="92" height="28" >课程号</td>
          <td width="108">课程</td>
          <td width="100">教练 </td>
          <td width="60">人数</td>
          <td width="103">已报名</td>
          <td width="103">上课时间</td>
          <td width="114">地点</td>
          <td width="60">操作</td>
        </tr>
        <?php
        while($row5=$rs5->fetch_assoc()){

      $GID=$row5['GID'];
      $sql6="select * from g_gym where GID=$GID";
      $rs6=$link->query($sql6);
      $row6=$rs6->fetch_assoc();
      	  
	    $FID=$row5['FID'];
      $sql7="select count(*) from m_study where FID=$FID";
      $rs7=$link->query($sql7);
      /*$row2=$rs2->fetch_assoc();*/
      $row7=$rs7->fetch_array();
        
        
        ?>
        <tr class="linear">
          <td height="38"><?=$row5['FID']?></td>
          <td><a href="../flow/Flass.php?ID=<?=$row5['FID']?>"><?=$row5['Fname']?></a></td>
          <td><a href="../flow/CoaLe.php?na=<?=$row5['Cnice']?>"><?=$row5['Cname']?></a></td>
          <td><?=$row5['Mcoute']?></td>
          <td><?=$row7['count(*)']?></td>
          <td><?=$row5['Ftime']?></td>
          <td><?=$row5['GID']?>号|<?=$row6['Gname']?></td>
          <td width="60">
            <?php
               $ke=$row5['FID'];
               $fei="select * from m_study where FID=$ke and MID=$MID";
               $feij=$link->query($fei);
               $feijg=$feij->fetch_assoc();
               if($feijg['Fei']>0){
                 echo "已缴费";
               }else{
           ?>
           <a href="memter-cls.php?FID=<?=$row5['FID']?>" onClick="return confirm('真要退课么？健康生活从取消退课开始')"><input type="button" value="退课"></a>
           <a href="memter-jf.php?FID=<?=$row5['FID']?>" onClick="return confirm('缴费后不可退课，健康健身，请点击确认！')"><input type="button" value="缴费"> 
          <?php
               }
          ?></a>
        </td>
      </tr>
        <?php
      }
        ?>
      </table>
    </center>

    <p></p>
      <?php
      $sql8="select * from m_member m join m_study ms on(m.MID=ms.MID)
      join f_cla f on(ms.FID=f.FID)
      join f_tcing f1 on(f.FID=f1.FID)
      join c_coach c on(f1.CID=c.CID) where m.MID=$MID and f1.state='2'";
      $rs8=$link->query($sql8);
      ?>
      <center>
        <table width="568"  style="text-align:center">
        <caption>已完成课程</caption>
        <tr  bgcolor="#8080FF" style="color:#FFFFFF">
          <td width="92" height="28" >课程号</td>
          <td width="108">课程</td>
          <td width="100">教练 </td>
          <td width="60">人数</td>
          <td width="103">上课时间</td>
          <td width="114">地点</td>
          <td width="114">学习成果</td>
        </tr>
        <?php
        while($row8=$rs8->fetch_assoc()){

      $GID=$row8['GID'];
      $sql9="select * from g_gym where GID=$GID";
      $rs9=$link->query($sql9);
      $row9=$rs9->fetch_assoc();
      	  

        ?>
        <tr class="linear">
          <td height="38"><?=$row8['FID']?></td>
          <td><a href="../flow/Flass.php?ID=<?=$row8['FID']?>"><?=$row8['Fname']?></a></td>
          <td><a href="../flow/CoaLe.php?na=<?=$row8['Cnice']?>"><?=$row8['Cname']?></a></td>
          <td><?=$row8['Mcoute']?></td>
          <td><?=$row8['Ftime']?></td>
          <td><?=$row8['GID']?>号|<?=$row9['Gname']?></td>
          <td><?=$row8['score']?></td>
        </tr>
        <?php
      }
        ?>
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
