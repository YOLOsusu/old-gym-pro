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
$CID=$_GET['ID'];
$sql="select * from c_coach where CID='$CID'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();
?>
<form  action="dispose/Cmodify.php?ID=<?=$row['CID']?>" method="post" enctype="multipart/form-data">
<center>
    <table width="397"  cellspacing="0" class="linear1" style="width:700px; border-radius:50px" >
	<caption>修改教练信息</caption>
  <tbody>
    <tr>
      <td height="43" style="text-align:right" >&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="260" height="45" style="text-align:right" >教练编号：</td>
      <td width="434">&nbsp;<?=$row['CID']?></td>
      </tr>
    <tr>
      <td height="45" style="text-align:right" >姓名：</td>
      <td >&nbsp;<input name="Cname" type="text" value="<?=$row['Cname']?>" size="20" /></td>
      </tr>
    <tr>
      <td height="45" style="text-align:right" >性别：</td>
      <td >&nbsp;<input name="Csex" type="radio" value="男" />男<input name="Csex" type="radio" value="女" />女&nbsp;&nbsp;&nbsp;&nbsp;原性别：<?=$row['Csex']?></td>
      </tr>
	 <tr>
      <td height="45" style="text-align:right" >出生年月：</td>
      <td >&nbsp;<label for="date"></label><input type="date" name="date2" id="date2"  value="<?=$row['Cbir']?>"  size="15"/></td>
    </tr>
    <tr>
      <td height="45"  style="text-align:right" >预留手机号：</td>
      <td >&nbsp;<input name="phone" type="text"  value="<?=$row['phone']?>" size="20" /></td>
      </tr>	
    <tr>
      <td height="45" style="text-align:right" >注册时间：</td>
      <td >&nbsp;<?php echo $row['Cjdate']?></td>
      </tr>
    <tr>
      <td height="100"style="text-align:right"  >家庭住址：</td>
      <td >&nbsp;<textarea name="Caddress" cols="40" rows="5"><?php echo $row['Caddress']?></textarea></td>
      </tr>
    <tr>
      <td height="120" style="text-align:right" >擅长：</td>
      <td >&nbsp;<textarea name="cnice" cols="30" rows="5"><?php echo $row['Cnice']?></textarea></td>
    </tr>
    <tr>
      <td height="120" style="text-align:right" >头像：</td>
      <td >&nbsp;<input type="file" name="file" ></td>
    </tr>
    <tr>
      <td height="94" colspan="2" align="center" ><input name="mx" type="submit"  value="修改"  /></td>
      </tr>
  </tbody>
</table> 
 
  <p>&nbsp;</p>   
</center>
</form>
</body>
</html>
