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
    $ID=$_COOKIE['ID'];
    $sql="select * from coach where CID='$ID'";
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
        <a href="coach-cb.php?>">    <div  class="dli" style="background-color:#0EA8F3"> 课表</div> </a>
        <a href="coach-xy.php?">  <div  class="dli" style="background-color:#0EA8F3"> 续约</div> </a>
        <a href="Cmoer.php">  <div class="dli"style="background-color:#0EA8F3" > 更多</div> </a>
        <a href="../../index.php">   <div class="dli"style="background-color:#0EA8F3" > 首页</div> </a>
        <p></br></p>
        <a href="../fount/DestroyCK.php" onClick="return confirm('真的要退出么？')">  <div class="dli" style="background-color:rgb(167, 224, 250)" > 退出</div></a> 
        
    </div>
        <div class="dright">
        <a href="coach-cb.php"><input type="button" value="返回" class="bottun"></a>
        <?php
            $FID=$_GET['FID'];
            $sql3="select Fname from  f_cla where FID=$FID";
            $rs3=$link->query($sql3);
            $row3=$rs3->fetch_assoc();
			$sql4="SELECT m.Mname,m.MID
            FROM m_study ms
            JOIN m_member m ON ( ms.MID = m.MID )
            WHERE FID =$FID
            AND (
            score IS NULL
            )";
            $rs4=$link->query($sql4);
   ?>  
    <center>
      <table  width="500" style="text-align:center;">
      <caption>选修<?=$row3['Fname']?>课的学生(未评价)</caption>
        <tbody>
            <tr  bgcolor="#0EA8F3">
                <td width="100">学员编号</td>
                <td width="150">学员</td>
                <td >评价</td>
            </tr>
            <?php
            
             while($row4=$rs4->fetch_assoc()){?>
            <tr class="linear2">
               <td><?=$row4['MID']?></td>
               <td><?=$row4['Mname']?></td>
               <td>
                <form action="Cmcore-UP.php?MID=<?=$row4['MID']?>&FID=<?=$FID?>" method="post">
                  <input type="text" name="score" ><input type="submit" value="提交">
                </form>
               </td>
            </tr>
             <?
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