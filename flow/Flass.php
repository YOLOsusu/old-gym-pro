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
$ID=$_GET['ID'];
$sql="select * from f_cla f join f_tcing f1 on f.FID=f1.FID
                           join c_coach c on f1.CID=c.CID where f.FID=$ID";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();

?>
 <div class="d1">

  <div class="D2"> 
     <div class="d21">
       <a href="../../index.php"><input type="button" name="button" class="bottun" value="返回"></a>  
       <h1><?php echo $row['Fname'];?></h1></br>
       开课时间：<?php echo $row['Ftime'];?>&nbsp;&nbsp;&nbsp;&nbsp;教练：<a href="CoaLe.php?na=<?=$row['Cnice']?>"><?php echo $row['Cname']?></a></br>
       开课地点：健身中心&nbsp;&nbsp;&nbsp;&nbsp;课程状态：   
       <?php
       if($row['state']==1){
        ?>
        <span style="color:red">已开课</span> 
      <?php
       }elseif($row['state']==2){
      ?>
      <span style="color:red">课程已上完</span>
      <?php
       }elseif($row['state']==0){
        $sql5="select count(*) from f_cla where FID=$ID";
        $rs5=$link->query($sql5);
        $row5=$rs5->fetch_assoc();
        if($row5['count(*)']==$row['Mcoute']){
          $str="人数已满";
        }else{
          $str="已报名".$row5['count(*)']."人";
        }
        ?>
        火热报名中-><span style="color:blue"><?=$str?></span>
       <?php
       }
       
       ?>
       <a href="XKclass.php?FID=<?=$ID?>" class="d4" onClick="return confirm('真的要报名么？')" ><div>火热报名</div></a>
</div>
 
    <div class="d22">
      <h3>主要内容</h3>
      <?php
      echo $row['Fconten'];
      ?>
    </div>
  </div>


  <div class="d3">
     <center style="color:#FF99CC;flon-weight:bold">其他信息</center>
      课时: <?php echo $row['Fdate'];?></br>
      学费 : <?php echo $row['Fmoney'];?></br>
      招募学员: <?php echo $row['Mcoute'];?></br>
      <p></br></p>
      <?php
        $up=$ID-1;
        $sql1="select * from f_cla  where FID=$up";
        $rs1=$link->query($sql1);
        $row1=$rs1->fetch_assoc();
      ?>
      上一门课—></br>
      <a  class="a1" href="Flass.php?ID=<?=$up?>">《<?php echo $row1['Fname']?>》</a></br>
      下一门课—></br>
      <?php
         $dm=$ID+1;
         $sql2="select * from f_cla where FID=$dm";
         $rs2=$link->query($sql2);
         $row2=$rs2->fetch_assoc();
      ?>
      <a class="a1" href="Flass.php?ID=<?=$dm?>">《<?php echo $row2['Fname']?>》</a>   
      <p><br></p> 
      <?php
      if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
        $id=$_COOKIE['ID'];
        $sql3="select * from m_member where MID=$id";
        $rs3=$link->query($sql3);
        $aff3=$link->affected_rows;  
        if($aff3>0){
          ?>
          <a href="../member/memter-cls.php?MID=<?=$id?>" class="d5">我的课表</a>
          <?php
        }else{
          $sql4="select * from c_coach where CID=$id";
          $rs4=$link->query($sql4);
          $aff4=$link->affected_rows;  
          if($aff4>0){
            ?>
            <a href="../coach/coach-cb.php?MID=<?=$id?>" class="d5">我的备课</a>
            <?php
          }

        }
      }
      ?>
      
     
  </div>
 </div>
</body>
</html>