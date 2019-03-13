<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
</head>
<?php
include('../connect/connect.php');
$GID=$_GET['ID'];
$sql="select * from g_gym where GID=$GID";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();
?>
<body>
<center>
<form action="dispose/Gmodify.php?ID=<?=$GID?>" method="post" enctype="multipart/form-data">
  <table width="404" class="linear1" style="width:700px; border-radius:50px">  
   <caption>添加房间</caption>
     <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td height="42" align="right">房间编号：</td>
     <td align="left">&nbsp;<?php echo $row['GID'];?></td>
   </tr>
   <tr>
    <td width="160" height="38" align="right">房间名称：</td>
    <td width="528" align="left">&nbsp;<input name="gname" type="text"  size="20" value="<?=$row['Gname']?>"/></td>
  </tr>
     <tr>
    <td width="160" height="38" align="right">具体地点：</td>
    <td width="528" align="left">&nbsp;<input name="gaddress" type="text"  size="40" value="<?=$row['Jaddress']?>"/></td>
  </tr>
  <tr>
    <td height="77" align="right">简&nbsp;&nbsp;介：</td>
    <td align="left">&nbsp;<textarea name="gcontent" cols="45" rows="5"><?php echo $row['Gcomten'];?></textarea></td>
  </tr>
  <tr>
    <td height="77" align="right">封&nbsp;&nbsp;面：</td>
    <td align="left">&nbsp;<input type="file" name="file" ></td>
  </tr>
  <tr>
    <td height="75" colspan="2" align="center"><input name="tancla" type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
    </tr>
</table>
</form>
   </center>
   
   </div>
</div>
</body>
</html>
