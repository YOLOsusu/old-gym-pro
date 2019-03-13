<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("Atop.php");
?>

<div class="mindou">
  
   <div class="left">

	<table width="235">
  <tr>
    <td width="227" height="45"><div class="dl2"  ><a href="member-fee.php">收益详情</a></div>
    <div class="dl2" ><a href="Adj-tb.php">登记管理</a></div></td>
  </tr>
  <tr>
    <td height="45"><div class="dli"><a href="A-mxx.php">会员列表</a></div>  
	    <div class="dli"><a href="A-cxx.php">教练列表</a></div></td>
  </tr>
  <?php
  include("Tongji.php");
 ?>
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
    <td height="45"><div class="dli"><a href="A-cbtan.php">课程添加</a></div>
    <div class="drr">房间分配</div></td>
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
   <p></p>
   </br>
   <p></p>
<form action="dispose/gym-tan.php" method="post" enctype="multipart/form-data">
  <table width="404" class="linear1" style="width:700px; border-radius:50px">  
   <caption>添加房间</caption>
     <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td height="42" align="right">房间编号：</td>
     <td align="left">&nbsp;<input name="GID" type="text" size="12"/></td>
   </tr>
   <tr>
    <td width="160" height="38" align="right">房间名称：</td>
    <td width="528" align="left">&nbsp;<input name="gname" type="text"  size="20"/></td>
  </tr>
     <tr>
    <td width="160" height="38" align="right">具体地点：</td>
    <td width="528" align="left">&nbsp;<input name="gaddress" type="text"  size="40"/></td>
  </tr>
  <tr>
    <td height="77" align="right">简&nbsp;&nbsp;介：</td>
    <td align="left">&nbsp;<textarea name="gcontent" cols="45" rows="5"></textarea></td>
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