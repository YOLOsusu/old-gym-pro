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
$sql="select * from hsports where ID=$TID";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();

?>
 <div class="d1">
  <div class="dmian2">
      <a href="../../index.php"><input type="button" name="button" class="bottun" value="返回"></a>
      <?php
      echo $row['Hconten'];
      ?>
  </div>
  <div class="d3">
     
      作者: <?php echo $row['Hwriter'];?></br>
      来源: <?php echo $row['Horigin'];?>
      <p></br></p>
      <?php
      $up=$TID-1;
      $sql1="select * from hsports where ID=$up";
      $rs1=$link->query($sql1);
      $row1=$rs1->fetch_assoc();
      ?>
      上一篇——></br>
      <a  class="a1" href="Hclass.php?ID=<?=$up?>">《<?php echo $row1['Hname']?>》</a></br>
      下一篇——></br>
      <?php
       $dm=$TID+1;
       $sql2="select * from hsports where ID=$dm";
       $rs2=$link->query($sql2);
       $row2=$rs2->fetch_assoc();
      ?>
      <a class="a1" href="Hclass.php?ID=<?=$dm?>">《<?php echo $row2['Hname']?>》</a> 
      <p></br></p>
      资讯热线电话</br><span style="color:red">0874-8693-453</span>
  </div>
 </div>
</body>
</html>