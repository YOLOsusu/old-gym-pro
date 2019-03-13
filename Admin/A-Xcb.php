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
include('../fount/fount.php');
$FID=$_GET['FID'];
$sql="select * from f_cla where FID='$FID'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();
$GID=$row['GID'];
$sql1="select Gname form g_gym where GID='$GID'";
$rs1=$link->query($sql1);
$row1=$rs1->fetch_assoc();
  ?>


?>
<center>
<table width="578" border="1"  style="width:600px;"class="linear">
<caption>修改课程信息</caption>
  <tr>
    <td width="175" height="40" align="right">课程编号：</td>
    <td width="409"><?php  echo $row['FID'];?></td>
  </tr>
  <tr>
    <td height="40" align="right">课程名称：</td>
    <td><input name="Fname" type="text"  value="<?=$row['Fname']?>"/></td>
  </tr>
  <tr>
    <td height="40" align="right">上课时间：</td>
    <td>&nbsp;<input name="Ftime" type="text"  value="<?=$row['Ftime']?>"/></td>
  </tr>
  <tr>
    <td height="50" align="right">上课地点;</td>
    <td>&nbsp;<input name="address" type="text"  value="<?=$row1['Gname']?>"/></td>
  </tr>
  <tr>
    <td height="40" align="right">上课人数：</td>
    <td>&nbsp;<input name="Mcount" type="text"  value="<?=$row['Mcoute']?>"/></td>
  </tr>
  <tr> 
    <td height="40"align="right">课时：</td>
    <td>&nbsp;<input name="fdate" type="text"  value="<?=$row['Fdate']?>"/></td>
  </tr>
  <tr>
    <td height="40" align="right">学费：</td>
    <td>&nbsp;<input name="money" type="text"  value="<?=$row['Fmoney']?>"/></td>
  </tr>
  <tr>
    <td height="95" colspan="2" align="center"><input name="Xtj" type="submit" value="登录" />      &nbsp;&nbsp;&nbsp;&nbsp;
        <input name="Xcz" type="reset" value="重置" />    </td>
    </tr>
</table>
</center>

</body>
</html>
