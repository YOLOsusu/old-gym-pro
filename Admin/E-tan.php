<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <center>
<form action="dispose/AEquipment.php" method="post" enctype="multipart/form-data">
<table width="404" class="linear1" style="width:700px; border-radius:50px">  
    <caption>添加器材信息</caption>
    <tr>
    <td width="168" height="38" align="right"></td>
    <td width="520" align="left"><a href="Ekit.php" style="float:right;"><input type="button" value="返回" style="border-radius:5px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
  </tr>
   <tr>
    <td width="168" height="38" align="right">器材名称：</td>
    <td width="520" align="left">&nbsp;<input name="name" type="text"  size="20" /></td>
  </tr>
  <tr>
    <td height="77" align="right">用途：</td>
    <td align="left">&nbsp;<textarea name="use" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="38"align="right">存放地点：</td>
    <td align="left">&nbsp;<select name="address" style="height:30px; width:100px;"> 
	<?php
   	include('../connect/connect.php');
	$sql1="select * from g_gym ";
    $rs1=$link->query($sql1);
	while($row1=$rs1->fetch_assoc()){
	?>
    <option value="<?=$row1['GID']?>"><?=$row1['Gname']?></option> 
    <?php
	}
	?>
    </select>
	 </td>
  </tr>
  <tr>
    <td height="38"align="right">购置时间:</td>
    <td align="left">&nbsp;<input type="date" name="Ajde" ></td>
  </tr>
  <tr>
    <td height="38"align="right">使用年限：</td>
    <td align="left">&nbsp;<input name="Udate" type="date"  size="20" /></td>
  </tr>
  <tr>
    <td height="38"align="right">使用情况：</td>
    <td align="left">&nbsp;<input name="Acon" type="text"  size="12" />1优质、2好、3良好、4一般、5差</td>
  </tr>
  <tr>
    <td height="37"align="right">使用状态：</td>
    <td align="left">&nbsp;<input name="state" type="text"  size="15" />使用填1、未使用填0</td>
  </tr>
  <tr>
    <td height="37"align="right">封面：</td>
    <td align="left">&nbsp;<input type="file" name="file"></td>
  </tr>

  <tr>
    <td height="48" colspan="2" align="center"><input name="tancla" type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置"/></td>
    </tr>
    <tr>
    <td width="168" height="38" align="right"></td>
    <td width="520" align="left"></td>
  </tr>
</table>
</form> 
 </center>
</body>
</html>
