<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	include('../connect/connect.php');
	$ID=$_GET['ID'];
	$sql="select * from f_cla where FID=$ID";
    $rs=$link->query($sql);
    $row=$rs->fetch_assoc();

?>
 <center>
<form action="dispose/Fmodify.php?ID=<?=$ID?>" method="post">
<table width="404" class="linear1" style="width:700px; border-radius:50px">  
    <caption>课程信息详情</caption>
     
   <tr>
     <td height="58" align="right">课程编号：</td>
     <td align="left">&nbsp;<?php echo $ID?></td>
   </tr>
   <tr>
    <td width="168" height="38" align="right">课程名称：</td>
    <td width="520" align="left">&nbsp;<?=$row['Fname']?></td>
  </tr>
  <tr>
    <td height="77" align="right">简介：</td>
    <td align="left">&nbsp;<textarea name="content" cols="45" rows="5"><?php echo $row['Fconten']?></textarea></td>
  </tr>
  <tr>
    <td height="38" align="right">上课时间：</td>
    <td align="left">&nbsp;<?=$row['Ftime']?></td>
  </tr>
  <tr>
    <td height="38"align="right">上课地点：</td>
    <td align="left">&nbsp;
	<?php
	$GID=$row['GID'];
	$sql3="select * from g_gym where GID=$GID";
    $rs3=$link->query($sql3);
	$row3=$rs3->fetch_assoc();
	?>
	<?php echo $row3['Gname']; ?>
	 </td>
  </tr>
  <tr>
    <td height="38"align="right">教练： </td>
    <td align="left">&nbsp;
	<?php
	$sql4="select * from f_cla f join f_tcing f1 on(f.FID=f1.FID)
	                             join c_coach c on(f1.CID=c.CID) ";
    $rs4=$link->query($sql4);
    $aff=$link->affected_rows;
    if($aff>0){
	 $row4=$rs4->fetch_assoc();
     echo $row4['Cname'];
     }else{
         echo "目前无任课教练";
     }?></td>
  </tr>
  <tr>
    <td height="38"align="right">课时：</td>
    <td align="left">&nbsp;<?=$row['Fdate']?></td>
  </tr>
  <tr>
    <td height="38"align="right">人数：</td>
    <td align="left">&nbsp;<?=$row['Mcoute']?></td>
  </tr>
  <tr>
    <td height="37"align="right">学费：</td>
    <td align="left">&nbsp;<?=$row['Fmoney']?></td>
  </tr>
  <tr>
    <td height="37"align="right">开课状态：</td>
    <td><?php
	$sql5="select * from f_cla f join f_tcing f1 on(f.FID=f1.FID) where f.FID=$ID";
    $rs5=$link->query($sql5);
    $row5=$rs5->fetch_assoc();
    if($row5['state']==0){
	   echo "未开课";
     }elseif($row5['state']==1){
         echo "已开课";
     }elseif($row5['state']==2){
        echo "完成授课";
    }?></td>
  </tr>

  <tr>
    <td height="48" colspan="2" align="center"><a href="A-clb.php"><input type="button" value="返回"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="F-modify.php?ID=<?=$row['FID']?>"><input type="button" value="修改"></a></td>
    </tr>
</table>
</form> 
 </center>
</body>
</html>
