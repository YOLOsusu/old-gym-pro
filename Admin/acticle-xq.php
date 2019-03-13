<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css-php/flow.css"  rel="stylesheet" type="text/css"/>

</head>
<body>
<?php
include("../connect/connect.php");
$TID=$_GET['ID'];
$sql="select * from article where TID=$TID";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();

?>
 <div class="d1">
  <div class="d2">
      <a href="acticle.php"> <input type="button" value="返回" class="CL"></a><br><br>
      <h3>封面</h3>
      <?php
      $url="../image/".basename($row['Cover']);
      ?>
      <img src="<?=$url?>" width="600"height="300" >
      <?php
      echo $row['ATCmain'];
      ?>
      <a href="T-modify.php?ID=<?=$row['TID']?>"> <input type="button" value="修改" class="CL"></a>
  </div>
  <div class="d3">
     
      作者: <?php echo $row['Writer'];?></br>
      来源: <?php echo $row['ATCorigin'];?></br>
      <p></br></p>
      <?php
      $up=$TID-1;
      $sql1="select * from article where TID=$up";
      $rs1=$link->query($sql1);
      $row1=$rs1->fetch_assoc();
      ?>
      上一篇——></br>
      <a  class="a1" href="CEarticle.php?ID=<?=$up?>">《<?php echo $row1['ATCname']?>》</a></br>
      下一篇——></br>
      <?php
       $dm=$TID+1;
       $sql2="select * from article where TID=$dm";
       $rs2=$link->query($sql2);
       $row2=$rs2->fetch_assoc();
      ?>
      <a class="a1" href="CEarticle.php?ID=<?=$dm?>">《<?php echo $row2['ATCname']?>》</a>    
     
  </div>
 </div>
</body>
</html>