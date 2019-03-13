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
include("Atop.php");
?>

<div class="mindou">
   <div class="left">
	<table width="235">
  <tr>
    <td width="227" height="45"><div class="dl2"><a href="member-fee.php">收益详情</a></div>
    <div class="dl2" ><a href="Adj-tb.php">登记管理</a></div></td>
  </tr>
  <?php
      include("Tongji.php");
  ?>
  <tr>
    <td height="45"><div class="dli"><a href="A-mxx.php">会员列表</a></div>  
	    <div class="dli"><a href="A-cxx.php">教练列表</a></div></td>
  </tr>
  <tr>
  <td height="45"><div class="dli"><?php if($coun2>0){  ?><div class='dot'><?php echo $coun2;?></div><?php } ?><a href='pass.php'> 审核</a></div>
  <div class="dli"><?php if($coun5>0){  ?><div class='dot'><?php echo $coun5;?></div><?php } ?><a href="Infor.php">意见</a></div></td>
  </tr>
  <tr>
  <td height="45"><div class="dl2" ><a href="Admin-tb.php">管理员</a></div>
        <div class="dl2"><a href="emploee.php">员工管理</a></div></td>
</tr>
<tr>
  <td height="45"><div class="dli"><a href="A-clb.php">课表</a></div>
      <div class="dli"><a href="A-gymb.php">房间列表</a></div></td>
</tr>
<tr>
  <td height="45"><div class="drr">课程添加</div>
      <div class="dli"><a href="A-gmtan.php">房间分配</a></div></td>
</tr>
<tr>
  <td height="45"><div class="dl2" ><a href="M-tixx.php">体检信息</a></div>
      <div class="dl2" ><a href="column.php">栏目管理</a></div></td>
</tr>
<tr>
  <td height="45"><div class="dli"><a href="Ekit.php">器材详情</a></div>
        <div class="dli"><a href="acticle.php">文章管理</a></div></td>
</tr>
  <tr>
    <td height="50"><a href="../../index.php"><div class="dl3" >首页</div></a>
    <a href="../fount/DestroyCk.php" onClick="return confirm('真的要退出么？')"><div class="dl3" >退出</div></a></td>
  </tr>

</table>

   </div>
    

   
   <div class="right" >
   <center>
<form action="dispose/class-tan.php" method="post">
<table width="800" class="linear1" style="width:800px; border-radius:50px">  
    <caption>添加课程</caption>
     
   <tr>
     <td height="58" align="right">课程编号：</td>
     <td align="left">&nbsp;<input name="FID" type="text" size="12"/></td>
   </tr>
   <tr>
    <td width="168" height="38" align="right">课程名称：</td>
    <td width="520" align="left">&nbsp;<input name="fname" type="text"  size="20"/></td>
  </tr>
  <tr>
    <td height="77" align="right">简介：</td>
    <td align="left">&nbsp;<textarea name="content" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="38" align="right">上课时间：</td>
    <td align="left">&nbsp;<label for="datetime"></label><input type="datetime" name="datetime" id="datetime" size="20"></td>
  </tr>
  <tr>
    <td height="38"align="right">上课地点：</td>
    <td align="left">&nbsp;<select name="address"  style="height:30px; width:100px;"> 
	<?php
	include('../connect/connect.php');
	$sql="select * from g_gym ";
    $rs=$link->query($sql);
	while($row=$rs->fetch_assoc()){
	?>
    <option value="<?=$row['GID']?>" ><?=$row['Gname']?></option> 
    <?php
	}
	?>
    </select> </td>
  </tr>
  <tr>
    <td height="38"align="right">教练： </td>
    <td align="left">&nbsp;<select name="coach"  style="height:30px; width:100px;"> 
	<?php
	$sql1="select * from c_coach ";
    $rs1=$link->query($sql1);
	while($row1=$rs1->fetch_assoc()){
	?>
    <option value="<?=$row1['CID']?>" ><?=$row1['Cname']?></option> 
    <?php
	}
	?>
    </select></td>
  </tr>
  <tr>
    <td height="38"align="right">课时：</td>
    <td align="left">&nbsp;<input name="fdate" type="text"  size="20"/></td>
  </tr>
  <tr>
    <td height="38"align="right">人数：</td>
    <td align="left">&nbsp;<input name="mcount" type="text"  size="12"/></td>
  </tr>
  <tr>
    <td height="37"align="right">学费：</td>
    <td align="left">&nbsp;<input name="money" type="text"  size="15"/></td>
  </tr>
  <tr>
    <td height="37"align="right">立即开课：</td>
    <td align="left">&nbsp;<input name="state" type="radio" value="1" />是<input name="state" type="radio" value="0" />否
      </td>
  </tr>

  <tr>
    <td height="48" colspan="2" align="center"><input name="tancla" type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
    </tr>
</table>
 </center>
 </form>
   </div>
</div>

</body>
</html>
