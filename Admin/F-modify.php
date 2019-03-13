<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="../kindeditor/kindeditor-min.js"></script>   
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>   
<script>
   var editor;   
   KindEditor.ready(function(K) {   
   editor = K.create('textarea[name="content"]', {   
   allowFileManager : true   
   });   
});   
</script>
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
<table width="800" class="linear1" style="width:800px; border-radius:50px">  
    <caption>修改课程信息</caption>
   <tr>
     <td height="58" align="right">课程编号：</td>
     <td align="left">&nbsp;<?php echo $ID?></td>
   </tr>
   <tr>
    <td width="168" height="38" align="right">课程名称：</td>
    <td width="520" align="left">&nbsp;<input name="fname" type="text"  size="20" value="<?=$row['Fname']?>"/></td>
  </tr>
  <tr>
    <td height="120" align="right">简介：</td>
    <td align="left">&nbsp;<textarea name="content" cols="45" rows="10"><?php echo $row['Fconten']?></textarea></td>
  </tr>
  <tr>
    <td height="38" align="right">上课时间：</td>
    <td align="left">&nbsp;<label for="datetime"></label><input type="datetime" name="datetime" id="datetime" size="20" value="<?=$row['Ftime']?>"></td>
  </tr>
  <tr>
    <td height="38"align="right">上课地点：</td>
    <td align="left">&nbsp;<select name="address" style="height:30px; width:100px;"> 
	<?php
	$sql1="select * from g_gym ";
    $rs1=$link->query($sql1);
	while($row1=$rs1->fetch_assoc()){
	?>
    <option value="<?=$row1['GID']?>"><?=$row1['Gname']?></option> 
    <?php
	}
	?>
    </select>
	<?php
	$GID=$row['GID'];
	$sql3="select * from g_gym where GID=$GID";
    $rs3=$link->query($sql3);
	$row3=$rs3->fetch_assoc();
	?>
	原上课地点：<?php echo $row3['Gname']; ?>
	 </td>
  </tr>
  <tr>
    <td height="38"align="right">教练： </td>
    <td align="left">&nbsp;<select name="coach"  style="height:30px; width:100px;"> 
	<?php
	$sql2="select * from c_coach ";
    $rs2=$link->query($sql2);
	while($row2=$rs2->fetch_assoc()){
	?>
    <option value="<?=$row2['CID']?>" ><?=$row2['Cname']?></option> 
    <?php
	}
	?>
    </select>
	<?php
	$sql4="select * from f_cla f join f_tcing f1 on(f.FID=f1.FID)
	                             join c_coach c on(f1.CID=c.CID) ";
    $rs4=$link->query($sql4);
	$row4=$rs4->fetch_assoc();
	?>
	原教练：<?php echo $row4['Cname'] ?></td>
  </tr>
  <tr>
    <td height="38"align="right">课时：</td>
    <td align="left">&nbsp;<input name="fdate" type="text"  size="20" value="<?=$row['Fdate']?>"/></td>
  </tr>
  <tr>
    <td height="38"align="right">人数：</td>
    <td align="left">&nbsp;<input name="mcount" type="text"  size="12" value="<?=$row['Mcoute']?>"/></td>
  </tr>
  <tr>
    <td height="37"align="right">学费：</td>
    <td align="left">&nbsp;<input name="money" type="text"  size="15" value="<?=$row['Fmoney']?>"/></td>
  </tr>
  <tr>
    <td height="37"align="right">立即开课：</td>
    <td align="left">&nbsp;<input name="state" type="radio" value="1" />是<input name="state" type="radio" value="0" />否
      </td>
  </tr>

  <tr>
    <td height="48" colspan="2" align="center"><a href="A-clb.php"><input type="button" value="返回"></a>&nbsp;&nbsp;&nbsp;&nbsp;<input name="tancla" type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
    </tr>
</table>
</form> 
 </center>
</body>
</html>
